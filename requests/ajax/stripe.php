<?php
global $config;
$stripe = array(
    'secret_key' => $config->stripe_secret,
    'publishable_key' => $config->stripe_id
);
\Stripe\Stripe::setApiKey($stripe['secret_key']);

class Stripe extends Aj
{
    public function handle()
    {
        global $db;
        if (self::ActiveUser() == NULL) {
            return array(
                'status' => 403,
                'message' => __('Forbidden')
            );
        }
        $data = array();

        if (empty($_POST['description'])) {
            return array(
                'status' => 400,
                'message' => __('No description')
            );
        }
        if (empty($_POST['payType'])) {
            return array(
                'status' => 400,
                'message' => __('No payType')
            );
        }
        $product = Secure($_POST['description']);
        $realprice = Secure($_POST['price']);
        $price = Secure($_POST['price']) * 100;
        $amount = 0;
        $currency = strtolower(self::Config()->currency);
        $payType = Secure($_POST['payType']);
        $membershipType = 0;

        if ($payType == 'credits') {
            if ($realprice == self::Config()->bag_of_credits_price) {
                $amount = self::Config()->bag_of_credits_amount;
            } else if ($realprice == self::Config()->box_of_credits_price) {
                $amount = self::Config()->box_of_credits_amount;
            } else if ($realprice == self::Config()->chest_of_credits_price) {
                $amount = self::Config()->chest_of_credits_amount;
            }


        } else if ($payType == 'membership') {
            if ($realprice == self::Config()->week_pro_plan) {
                $interval = 'week';
                $membershipType = 1;
            } else if ($realprice == self::Config()->basic_pro_plan) {
                $interval = 'month';
                $membershipType = 2;
            } else if ($realprice == self::Config()->premium_pro_plan) {
                $interval = 'month';
                $membershipType = 3;
            } else if ($realprice == self::Config()->vip_pro_plan) {
                $interval = 'month';
                $membershipType = 4;
            } else if ($realprice == self::Config()->vipgold_pro_plan) {
                $interval = 'month';
                $membershipType = 5;
            } else if ($realprice == self::Config()->diamond_pro_plan) {
                $interval = 'month';
                $membershipType = 6;
            }


        } else if ($payType == 'unlock_private_photo') {
            if ((int)$realprice == (int)self::Config()->lock_private_photo_fee) {
                $amount = (int)self::Config()->lock_private_photo_fee;
            }
        } else if ($payType == 'lock_pro_video') {
            if ((int)$realprice == (int)self::Config()->lock_pro_video_fee) {
                $amount = (int)self::Config()->lock_pro_video_fee;
            }
        }
        try {


            $user = $db->objectBuilder()->where('id', self::ActiveUser()->id)->getOne('users', array(
                'balance'
            ));
            $data['status'] = 200;
            $data['message'] = __('Payment saved');

            $data['location'] = self::Config()->uri . '/ProSuccess';
            if ($payType == 'credits') {
                //create product
                $prod = $this->createProduct($product);
                //create  price
                $price_id = $this->createPrice($prod->id, $price, false);
                $data['price_id'] = $price_id->id;

                RegisterAffRevenue(self::ActiveUser()->id, $price / 100);
                $paymentId = $db->insert('payments', array(
                    'user_id' => self::ActiveUser()->id,
                    'amount' => $price / 100,
                    'user_email' => self::ActiveUser()->email,
                    'type' => 'CREDITS',
                    'pro_plan' => '0',
                    'credit_amount' => $amount,
                    'via' => 'Stripe'
                ));
                $_SESSION['userEdited'] = false;
                $data['paymentId'] = $paymentId;
                SuperCache::cache('pro_users')->destroy();
            } else if ($payType == 'membership') {
                RegisterAffRevenue(self::ActiveUser()->id, $price / 100);
                //create product
                $prod = $this->createProduct($product);
                //create  price

                $price_id = $this->createPrice($prod->id, $price, true, $interval);

                $data['price_id'] = $price_id->id;

                $paymentId = $db->insert('payments', array(
                    'user_id' => self::ActiveUser()->id,
                    'amount' => $price / 100,
                    'user_email' => self::ActiveUser()->email,
                    'type' => 'PRO',
                    'pro_plan' => $membershipType,
                    'credit_amount' => '0',
                    'via' => 'Stripe'
                ));
                $_SESSION['userEdited'] = false;
                $data['paymentId'] = $paymentId;
                SuperCache::cache('pro_users')->destroy();

            } else if ($payType == 'unlock_private_photo') {
                $paymentId = $db->insert('payments', array(
                    'user_id' => self::ActiveUser()->id,
                    'amount' => $price / 100,
                    'user_email' => self::ActiveUser()->email,
                    'type' => 'unlock_private_photo',
                    'pro_plan' => '0',
                    'credit_amount' => '0',
                    'via' => 'Stripe'
                ));
                $_SESSION['userEdited'] = false;
                $data['paymentId'] = $paymentId;
                $data['location'] = self::Config()->uri . '/ProSuccess?paymode=unlock';


            } else if ($payType == 'lock_pro_video') {
                $paymentId = $db->insert('payments', array(
                    'user_id' => self::ActiveUser()->id,
                    'amount' => $price / 100,
                    'user_email' => self::ActiveUser()->email,
                    'type' => 'lock_pro_video',
                    'pro_plan' => '0',
                    'credit_amount' => '0',
                    'via' => 'Stripe'
                ));
                $_SESSION['userEdited'] = false;
                $data['paymentId'] = $paymentId;
                $data['location'] = self::Config()->uri . '/ProSuccess?paymode=unlock';

            }
            return $data;

        } catch (Exception $e) {
            return array(
                'status' => 400,
                'message' => $e->getMessage()
            );
        }
    }

    public function handleWebhook()
    {
        global $db;


        try {

            $endpoint_secret = 'whsec_kShVkHEja1f6QIPqkZG1jHhYcABPTQTc';

            $payload = @file_get_contents('php://input');
            $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
            $event = null;

            try {
                $event = \Stripe\Webhook::constructEvent(
                    $payload, $sig_header, $endpoint_secret
                );

                if ($event->type == 'payment_intent.payment_failed') {
                    $session = $event->data->object;
                    file_put_contents('paypal.txt', $session);
                    $amount = ceil($session->amount / 100);
                    $payment = $db->objectBuilder()->where('updated', 0)->where('amount', $amount)->where('user_email', $session->billing_details->email)->getOne('payments');
                    $db->where('id', $payment->id)->update('payments', array(
                        'status' => 0,
                        'updated' => 1,
                        'message' => '' . $session->last_payment_error->message
                    ));
                }
                if ($event->type == 'charge.failed') {
                    $session = $event->data->object;
                    file_put_contents('paypal.txt', $session);
                    $amount = ceil($session->amount / 100);
                    $payment = $db->objectBuilder()->where('updated', 0)->where('amount', $amount)->where('user_email', $session->billing_details->email)->getOne('payments');
                    $db->where('id', $payment->id)->update('payments', array(
                        'status' => 0,
                        'updated' => 1,
                        'message' => '' . $session->failure_message,
                    ));
                }


                if ($event->type == 'checkout.session.completed') {
                    $session = $event->data->object;
                    // Fulfill the purchase...
                    $payment = $db->objectBuilder()->where('id', $session->client_reference_id)->getOne('payments');
                    $payType = $payment->type;
                    $userId = $payment->user_id;

                    $user = $db->objectBuilder()->where('id', $userId)->getOne('users', array(
                        'balance'
                    ));


                    if ($payType == 'CREDITS') {
                        $newbalance = $user->balance + $payment->credit_amount;
                        $updated = $db->where('id', $userId)->update('users', array(
                            'balance' => $newbalance
                        ));
                        if ($updated) {

                            $db->where('id', $session->client_reference_id)->update('payments', array(
                                'status' => 1,
                                'updated' => 1,
                                'message' => ucfirst($session->payment_status)
                            ));
                            $_SESSION['userEdited'] = true;

                        }
                    } else if ($payType == 'PRO') {
                        $protime = time();
                        $is_pro = "1";
                        $pro_type = $payment->pro_plan;

                        $updated = $db->where('id', $userId)->update('users', array(
                            'pro_time' => $protime,
                            'is_pro' => $is_pro,
                            'pro_type' => $pro_type
                        ));

                        if ($updated) {

                            $db->where('id', $session->client_reference_id)->update('payments', array(
                                'status' => 1,
                                'updated' => 1,
                                'subscriptionId' => $session->subscription,
                                'message' => ucfirst($session->payment_status)
                            ));

                            $_SESSION['userEdited'] = true;
                            SuperCache::cache('pro_users')->destroy();
                        }

                    } else if ($payType == 'unlock_private_photo') {
                        $updated = $db->where('id', $userId)->update('users', array('lock_private_photo' => 0));
                        if ($updated) {
                            $db->where('id', $session->client_reference_id)->update('payments', array(
                                'status' => 1,
                                'updated' => 1,
                                'message' => '' . $session->payment_status
                            ));
                            $_SESSION['userEdited'] = true;

                        }
                    } else if ($payType == 'lock_pro_video') {
                        $updated = $db->where('id', $userId)->update('users', array('lock_pro_video' => 0));
                        if ($updated) {
                            $db->where('id', $session->client_reference_id)->update('payments', array(
                                'status' => 1,
                                'updated' => 1,
                                'message' => '' . $session->payment_status
                            ));
                            $_SESSION['userEdited'] = true;

                        }
                    }

                }

                if ($event->type == 'payment_intent.created') {
                    $session = $event->data->object;
                    $realprice = $session->amount / 100;


                    if ($session->description == 'Subscription update') {
                        if ($realprice == self::Config()->week_pro_plan) {
                            $membershipType = 1;
                        } else if ($realprice == self::Config()->basic_pro_plan) {
                            $membershipType = 2;
                        } else if ($realprice == self::Config()->premium_pro_plan) {
                            $membershipType = 3;
                        } else if ($realprice == self::Config()->vip_pro_plan) {
                            $membershipType = 4;
                        } else if ($realprice == self::Config()->vipgold_pro_plan) {
                            $membershipType = 5;
                        } else if ($realprice == self::Config()->diamond_pro_plan) {
                            $membershipType = 6;
                        }
                       /* $paymentId = $db->insert('payments', array(
                            'user_id' => self::ActiveUser()->id,
                            'amount' => $realprice,
                            'user_email' => self::ActiveUser()->email,
                            'type' => 'PRO',
                            'pro_plan' => $membershipType,
                            'credit_amount' => '0',
                            'via' => 'Stripe'
                        ));*/

                    } else {
                        if ($realprice == self::Config()->bag_of_credits_price) {
                            $amount = self::Config()->bag_of_credits_amount;
                        } else if ($realprice == self::Config()->box_of_credits_price) {
                            $amount = self::Config()->box_of_credits_amount;
                        } else if ($realprice == self::Config()->chest_of_credits_price) {
                            $amount = self::Config()->chest_of_credits_amount;
                        }

                        /*$paymentId = $db->insert('payments', array(
                            'user_id' => self::ActiveUser()->id,
                            'amount' => $realprice,
                            'user_email' => self::ActiveUser()->email,
                            'type' => 'CREDITS',
                            'pro_plan' => '0',
                            'credit_amount' => $amount,
                            'via' => 'Stripe',
                            'paymentIntent' => $session->id,
                        ));*/


                    }


                }

                http_response_code(200);

            } catch (\UnexpectedValueException $e) {
                // Invalid payload
                http_response_code(400);
                exit();
            } catch (\Stripe\Exception\SignatureVerificationException $e) {
                // Invalid signature
                http_response_code(400);
                exit();
            }


        } catch (Exception $e) {
            http_response_code(200);
        }
    }

    public function handlePaymentIntent($session)
    {
        // save payment requast data

        //update customerId


    }

    public function listSubscriptions()
    {
        global $config, $db;


        $stripe = new \Stripe\StripeClient(
            $config->stripe_secret
        );

        $subscriptions = $stripe->subscriptions->all(['limit' => 100]);

        foreach ($subscriptions['data'] as $subscription) {

            $customer = $this->getCustomer($subscription->customer);

            $invoice = $this->getInvoice($subscription->latest_invoice);

            $realprice = $subscription->items['data'][0]->price->unit_amount / 100;
            if ($realprice == self::Config()->week_pro_plan) {
                $membershipType = 1;
            } else if ($realprice == self::Config()->basic_pro_plan) {
                $membershipType = 2;
            } else if ($realprice == self::Config()->premium_pro_plan) {
                $membershipType = 3;
            } else if ($realprice == self::Config()->vip_pro_plan) {
                $membershipType = 4;
            } else if ($realprice == self::Config()->vipgold_pro_plan) {
                $membershipType = 5;
            } else if ($realprice == self::Config()->diamond_pro_plan) {
                $membershipType = 6;
            }


            $d_user = LoadEndPointResource('users');
            if ($d_user) {
                $user = $d_user->GetUserByEmail($customer->email);

                $paymentId = $db->insert('subscriptions', array(
                    'user_id' => $user['id'],
                    'subscription_id' => $subscription->id,
                    'latest_invoice' => $subscription->latest_invoice,
                    'pro_type' => $membershipType,
                    'created' => $subscription->current_period_start,
                    'current_period_start' => $subscription->current_period_start,
                    'current_period_end' => $subscription->current_period_end,
                    'canceled_at' => $subscription->canceled_at,
                    'invoice_status' => $invoice->status

                ));
            }

        }
    }

    public function listPayments()
    {
        global $config;
        $stripe = new \Stripe\StripeClient(
            $config->stripe_secret
        );

        $payments = $stripe->paymentIntents->all(['limit' => 50]);

        print '<pre>';
        foreach ($payments['data'] as $payment) {
            $amount = $payment->amount / 100;
            $incoice = $payment->invoice;
            $customer = $payment->invoice;
            $status = $payment->status;
            $error_message = $payment->charges->data[0]->outcome->seller_message;

        }
    }

    public function getCustomer($vustomer)
    {
        global $config;

        $stripe = new \Stripe\StripeClient(
            $config->stripe_secret
        );
        $customer = $stripe->customers->retrieve(
            $vustomer,
            []
        );
        return $customer;

    }

    public function getInvoice($invoice_id)
    {
        global $config;

        $stripe = new \Stripe\StripeClient(
            $config->stripe_secret
        );
        $invoice = $stripe->invoices->retrieve(
            $invoice_id,
            []
        );

        // update subscription

        return $invoice;

    }

    public function retryInvoice()
    {
        if (empty($_POST['invoice_id'])) {
            return array(
                'status' => 400,
                'message' => __('No invoice_id')
            );
        }

        global $config;

        $invoice_id = Secure($_POST['invoice_id']);

        $stripe = new \Stripe\StripeClient(
            $config->stripe_secret
        );
        $invoice = $stripe->invoices->pay(
            $invoice_id,
            []
        );
        // update subscription

        // create payment
        return array(
            'status' => 200,
            'message' => $invoice
        );


    }

    public function disableSubscription($subscription_id)
    {
        global $config;

        $stripe = new \Stripe\StripeClient(
            $config->stripe_secret
        );
        $subscription = $stripe->subscriptions->cancel(
            $subscription_id,
            []
        );

        // dsiable user premium

        return $subscription;

    }

    public function update_subscription($subscription_id, $payment_id)
    {
        global $config;

        $stripe = new \Stripe\StripeClient(
            $config->stripe_secret
        );
        $subscription = $stripe->subscriptions->update(
            $subscription_id,
            ['metadata' => ['order_id' => $payment_id]]
        );
        return $subscription;

    }

    private function createProduct($name = 'Product')
    {

        $product = \Stripe\Product::create([
            'name' => $name,
        ]);

        return $product;
    }

    private function createPrice($product, $price = 1000, $is_recurring = false, $interval = 'week')
    {

        if ($is_recurring == true) {
            $price = \Stripe\Price::create([
                'product' => $product,
                'unit_amount' => $price,
                'currency' => 'eur',
                'recurring' => [
                    'interval' => $interval,
                ],
            ]);
        } else {
            $price = \Stripe\Price::create([
                'product' => $product,
                'unit_amount' => $price,
                'currency' => 'eur',
            ]);
        }

        return $price;
    }

}
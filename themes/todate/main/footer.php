    <?php if(IS_LOGGED == true){ ?>
		<?php if($config->credit_earn_system == 1){?>
        <div class="payment_modal modal" id="reward_daily_credit_modal">
			<div class="modal-content dt_bank_trans_modal">
				<h4><?php echo __('Credit Reward');?></h4>
				<div class="modal-body credit_pln">
					<svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"><circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"></circle><path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"></path></svg>
					<p><?php echo __( 'Congratulation!. you login to our site for' );?> <?php echo (int)$config->credit_earn_max_days;?> <?php echo __( 'days' );?>, <?php echo __( 'and you earn' );?> <?php echo (int)$config->credit_earn_max_days * (int)$config->credit_earn_day_amount;?> <?php echo __( 'credits' );?></p>
				</div>
			</div>
        </div>
        <?php if($config->isDailyCredit){ ?>
            <script>
                $(document).ready(function() {
                    $('#reward_daily_credit_modal').modal({
                        onCloseEnd: function(){
                            window.location.href = window.site_url+'/credit';
                        }
                    }).modal("open");
                });
            </script>
        <?php }} ?>
		<div class="payment_modalx modal">
			<div class="modal-content">
				<h4><?php echo __('Unlock Private Photo Payment');?></h4>
				<div class="modal-body">
					<p><?php echo __( 'To unlock private photo feature in your account, you have to pay' );?> <?php echo $config->currency_symbol . (int)$config->lock_private_photo_fee;?>.</p>
					<div class="credit_pln">
						<div class="pay_using">
							<p class="bold"><?php echo __( 'Pay Using' );?></p>
							<div class="pay_u_btns">
								<?php if(!empty($config->paypal_id)){?>
									<button id="unlock_photo_private_paypal" onclick="clickAndDisable(this);" class="btn valign-wrapper">
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M20.067 8.478c.492.88.556 2.014.3 3.327-.74 3.806-3.276 5.12-6.514 5.12h-.5a.805.805 0 0 0-.794.68l-.04.22-.63 3.993-.032.17a.804.804 0 0 1-.794.679H7.72a.483.483 0 0 1-.477-.558L7.418 21h1.518l.95-6.02h1.385c4.678 0 7.75-2.203 8.796-6.502zm-2.96-5.09c.762.868.983 1.81.752 3.285-.019.123-.04.24-.062.36-.735 3.773-3.089 5.446-6.956 5.446H8.957c-.63 0-1.174.414-1.354 1.002l-.014-.002-.93 5.894H3.121a.051.051 0 0 1-.05-.06l2.598-16.51A.95.95 0 0 1 6.607 2h5.976c2.183 0 3.716.469 4.523 1.388z" fill="currentColor"></path></svg> <?php echo __( 'PayPal' );?>
									</button>
								<?php } ?>
								<?php if(!empty($config->stripe_secret)){?>
									<button id="unlock_photo_private_stripe" class="btn valign-wrapper"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M3 3h18a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1zm17 9H4v7h16v-7zm0-4V5H4v3h16z" fill="currentColor"></path></svg> <?php echo __( 'Card' );?></button>
								<?php } ?>
								<?php if(!empty($config->paysera_password)){?>
									<button id="unlock_photo_private_sms_payment" onclick="unlock_photo_private_pay_via_sms();" class="btn valign-wrapper"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M2 20h20v2H2v-2zm2-8h2v7H4v-7zm5 0h2v7H9v-7zm4 0h2v7h-2v-7zm5 0h2v7h-2v-7zM2 7l10-5 10 5v4H2V7zm2 1.236V9h16v-.764l-8-4-8 4zM12 8a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" fill="currentColor"></path></svg> <?php echo __( 'SMS' );?></button>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>

        <script>
            function unlock_photo_private_pay_via_sms() {
                window.location = window.ajax + 'sms/generate_unlock_private_photo_link';
            }
            document.getElementById('unlock_photo_private_paypal').addEventListener('click', function(e) {
                $.post(window.ajax + 'paypal/generate_link', {description:'<?php echo __( "Unlock Private photo feature");?>', amount:<?php echo (int)$config->lock_private_photo_fee;?>, mode: "unlock_private_photo"}, function (data) {
                    if (data.status == 200) {
                        window.location.href = data.location;
                    } else {
                        $('.modal-body').html('<i class="fa fa-spin fa-spinner"></i> <?php echo __( 'Payment declined' );?> ');
                    }
                });

                e.preventDefault();
            });
            document.getElementById('unlock_photo_private_stripe').addEventListener('click', function(e) {
                $('#unlock_photo_private_stripe_email').val(atob($('#unlock_photo_private_stripe_email').attr('data-email')));
                $('#unlock_photo_private_stripe_number').val('');
                $('#unlock_photo_private_stripe_cvc').val('');
                $('#unlock_photo_private_stripe_modal').removeClass('up_rec_img_ready, up_rec_active');
                $('#unlock_photo_private_stripe_modal').modal('open');
            });

            function lock_pro_video_pay_via_sms() {
                window.location = window.ajax + 'sms/generate_lock_pro_video_link';
            }
            /*document.getElementById('lock_pro_video_paypal').addEventListener('click', function(e) {
                $.post(window.ajax + 'paypal/generate_link', {description:'<?php echo __( "Unlock Upload video feature");?>', amount:<?php echo (int)$config->lock_pro_video_fee;?>, mode: "lock_pro_video"}, function (data) {
                    if (data.status == 200) {
                        window.location.href = data.location;
                    } else {
                        $('.modal-body').html('<i class="fa fa-spin fa-spinner"></i> <?php echo __( 'Payment declined' );?> ');
                    }
                });

                e.preventDefault();
            });*/
/*            document.getElementById('lock_pro_video_stripe').addEventListener('click', function(e) {
                $('#lock_pro_video_stripe_email').val(atob($('#lock_pro_video_stripe_email').attr('data-email')));
                $('#lock_pro_video_stripe_number').val('');
                $('#lock_pro_video_stripe_cvc').val('');
                $('#lock_pro_video_stripe_modal').removeClass('up_rec_img_ready, up_rec_active');
                $('#lock_pro_video_stripe_modal').modal('open');
            });*/
        </script>
		
		<div class="modal fade" id="lock_pro_video_stripe_modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content add_money_modal add_address_modal">
                    <h5 class="modal-title text-center">Stripe</h5>
                    <div class="modal-body">
                        <div id="lock_pro_video_stripe_alert" style="    color: red;"></div>
                        <form id="stripe_form2b" method="post">
                            <div class="form-group">
                                <input class="form-control shop_input" type="text" placeholder="<?php echo __( 'Name' );?>"  value="<?php echo $profile->full_name;?>" id="lock_pro_video_stripe_name">
                            </div>
                            <div class="form-group">
                                <input class="form-control shop_input" type="email" placeholder="<?php echo __( 'Email' );?>" value="" data-email="<?php echo base64_encode($profile->email);?>" id="lock_pro_video_stripe_email">
                            </div>
                            <div class="form-group">
                                <input id="lock_pro_video_stripe_number" class="form-control shop_input" type="text" placeholder="<?php echo __( 'Card Number' );?>">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select id="lock_pro_video_stripe_month" type="text" class="form-control shop_input" autocomplete="off" placeholder="<?php echo __( 'Month' );?> (01)">
                                            <option value="01">01</option>
                                            <option value="02">02</option>
                                            <option value="03">03</option>
                                            <option value="04">04</option>
                                            <option value="05">05</option>
                                            <option value="06">06</option>
                                            <option value="07">07</option>
                                            <option value="08">08</option>
                                            <option value="09">09</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select id="lock_pro_video_stripe_year" type="text" class="form-control shop_input" autocomplete="off" placeholder="<?php echo __( 'Year' );?> (2019)">
                                            <?php for ($i=date('Y'); $i <= date('Y')+15; $i++) {  ?>
                                                <option value="<?php echo($i) ?>"><?php echo($i) ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input id="lock_pro_video_stripe_cvc" type="text" class="form-control shop_input" autocomplete="off" placeholder="CVC" maxlength="3" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-main" onclick="SH_lock_pro_video_StripeRequest()" id="lock_pro_video_stripe_button"><?php echo __( 'Pay' );?></button>
                                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal"><?php echo __( 'Cancel' );?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="unlock_photo_private_stripe_modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content add_money_modal add_address_modal">
                    <h5 class="modal-title text-center">Stripe</h5>
                    <div class="modal-body">
                        <div id="unlock_photo_private_stripe_alert" style="    color: red;"></div>
                        <form id="stripe_form2c" method="post">
                            <div class="form-group">
                                <input class="form-control shop_input" type="text" placeholder="<?php echo __( 'Name' );?>"  value="<?php echo $profile->full_name;?>" id="unlock_photo_private_stripe_name">
                            </div>
                            <div class="form-group">
                                <input class="form-control shop_input" type="email" placeholder="<?php echo __( 'Email' );?>" value="" data-email="<?php echo base64_encode($profile->email);?>" id="unlock_photo_private_stripe_email">
                            </div>
                            <div class="form-group">
                                <input id="unlock_photo_private_stripe_number" class="form-control shop_input" type="text" placeholder="<?php echo __( 'Card Number' );?>">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select id="unlock_photo_private_stripe_month" type="text" class="form-control shop_input" autocomplete="off" placeholder="<?php echo __( 'Month' );?> (01)">
                                            <option value="01">01</option>
                                            <option value="02">02</option>
                                            <option value="03">03</option>
                                            <option value="04">04</option>
                                            <option value="05">05</option>
                                            <option value="06">06</option>
                                            <option value="07">07</option>
                                            <option value="08">08</option>
                                            <option value="09">09</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select id="unlock_photo_private_stripe_year" type="text" class="form-control shop_input" autocomplete="off" placeholder="<?php echo __( 'Year' );?> (2019)">
                                            <?php for ($i=date('Y'); $i <= date('Y')+15; $i++) {  ?>
                                                <option value="<?php echo($i) ?>"><?php echo($i) ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input id="unlock_photo_private_stripe_cvc" type="text" class="form-control shop_input" autocomplete="off" placeholder="CVC" maxlength="3" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-main" onclick="SH_unlock_photo_private_StripeRequest()" id="unlock_photo_private_stripe_button"><?php echo __( 'Pay' );?></button>
                                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal"><?php echo __( 'Cancel' );?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
		
		<!-- Boost Modal -->
		<div id="modal_boost" class="modal modal-sm">
			<div class="modal-content">
				<?php
					$_cost = 0;
					if( $profile->is_pro == "1" ){
						$_cost = $config->pro_boost_me_credits_price;
					}else{
						$_cost = $config->normal_boost_me_credits_price;
					}
                    if ( isGenderFree($profile->gender) === true ) {
                        $_cost = 0;
                    }
				?>
				<h4><?php echo __('Boost me!');?></h4>
				<p><?php echo __('Get seen more by people around you in find match.');?></p>
				<p><?php
                    if ( isGenderFree($profile->gender) === true ) {
                        echo __('Boost your profile for free for') . ' ' . $config->boost_expire_time . ' ' . __('miuntes') . '.';
                    }else {
                        echo __('This service costs you') . ' ' . $_cost . ' ' . __('credits and will last for') . ' ' . $config->boost_expire_time . ' ' . __('miuntes') . '.';
                    }
                    ?></p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn-flat waves-effect modal-close"><?php echo __( 'Cancel' );?></button>
				<?php if($profile->balance >= $_cost ){?>
					<button data-userid="<?php echo $profile->id;?>" id="btn_boostme" class="modal-close waves-effect waves-light btn-flat btn_primary white-text"><?php
                           if ( isGenderFree($profile->gender) === true ) {
                               echo __( 'Boost For Free' );
                           }else{
                                echo __( 'Boost Now' );
                            }

                            ?>
					</button>
				<?php }else{ ?>
					<a href="<?php echo $site_url;?>/credit" data-ajax="/credit" class="modal-close waves-effect waves-light btn-flat btn_primary white-text"><?php echo __( 'Buy Credits' );?></a>
				<?php } ?>
			</div>
		</div>
		<!-- End Boost Modal -->
		
		<div class="sidenav_overlay" onclick="javascript:$('body').removeClass('side_open');"></div>
	<?php } ?>

	<?php require( $theme_path . 'main' . $_DS . 'script.php' );?>
	<?php require( $theme_path . 'main' . $_DS . 'geolocation.php' );?>
    <?php require( $theme_path . 'main' . $_DS . 'custom-footer-js.php' );?>
    <?php //write_console();?>
	
	<script type="text/javascript">
		$(document).on('click', '.to_sidebar [data-ajax]', function() {
			$('body').removeClass('side_open');
		});
	</script>

    <?php if( IS_LOGGED == true ){ ?>
        <div style="display:none">
            <audio id="notification-sound" class="sound-controls" preload="auto" style="visibility: hidden;">
                <source src="<?php echo $theme_url; ?>assets/mp3/New-notification.mp3" type="audio/mpeg">
            </audio>
            <audio id="message-sound" class="sound-controls" preload="auto" style="visibility: hidden;">
                <source src="<?php echo $theme_url; ?>assets/mp3/New-message.mp3" type="audio/mpeg">
            </audio>
            <audio id="calling-sound" class="sound-controls" preload="auto">
                <source src="<?php echo $theme_url; ?>assets/mp3/calling.mp3" type="audio/mpeg">
            </audio>
            <audio id="video-calling-sound" class="sound-controls" preload="auto">
                <source src="<?php echo $theme_url; ?>assets/mp3/video_call.mp3" type="audio/mpeg">
            </audio>
        </div>
    <?php } ?>

    <?php if(route( 1 ) !== 'find-matches'){ ?>
    <script>
        window.addEventListener("load", function(){
            window.cookieconsent.initialise({
                "palette": {
                    "popup": {
                        "background": "#ffffff",
                        "text": "#666"
                    },
                    "button": {
                        "background": "#c649b8"
                    }
                },
                "theme": "edgeless",
                "position": "bottom-left",
                "content": {
                    "message": "<?php echo __('This website uses cookies to ensure you get the best experience on our website.');?>",
                    "dismiss": "<?php echo __('Got It!');?>",
                    "link": "<?php echo __('Learn More');?>",
                    "href": "<?php echo $site_url;?>/privacy"
                }
            });
        });
    </script>
    <?php } ?>
</body>
</html>
<?php if ($config->pro_system == 0) { ?>
    <script>window.location = window.site_url;</script><?php } ?>
<?php if (isGenderFree($profile->gender) === true) { ?>
    <script>window.location = window.site_url;</script><?php } ?>
<!-- Premium  -->
<div class="to_page_main_head premium">
    <div class="container">
        <h2><?php echo __('Amazing'); ?> <?php echo ucfirst($config->site_name); ?> <?php echo __('features you can’t live without'); ?>
            .</h2>
        <p><?php echo __('Activating Premium will help you meet more people, faster.'); ?></p>
        <?php if ($config->pro_system == 1) { ?>
            <?php require($theme_path . 'main' . $_DS . 'pro-users.php'); ?>
        <?php } ?>
    </div>
</div>
<div class="container">
    <div class="dt_premium dt_sections">
        <?php if (file_exists($theme_path . 'third-party-payment.php')) { ?>
            <?php require($theme_path . 'third-party-payment.php'); ?>
        <?php } ?>
        <div class="dt_pro_features">
            <h2><?php echo __('Why Choose Premium Membership'); ?></h2>
            <div class="row">
                <div class="col s12 m12 l6">
                    <div class="valign-wrapper">
						<span class="red-text text-darken-1">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path
                                        fill="currentColor"
                                        d="M5.5,2C3.56,2 2,3.56 2,5.5V18.5C2,20.44 3.56,22 5.5,22H16L22,16V5.5C22,3.56 20.44,2 18.5,2H5.5M5.75,4H18.25A1.75,1.75 0 0,1 20,5.75V15H18.5C16.56,15 15,16.56 15,18.5V20H5.75A1.75,1.75 0 0,1 4,18.25V5.75A1.75,1.75 0 0,1 5.75,4M14.44,6.77C14.28,6.77 14.12,6.79 13.97,6.83C13.03,7.09 12.5,8.05 12.74,9C12.79,9.15 12.86,9.3 12.95,9.44L16.18,8.56C16.18,8.39 16.16,8.22 16.12,8.05C15.91,7.3 15.22,6.77 14.44,6.77M8.17,8.5C8,8.5 7.85,8.5 7.7,8.55C6.77,8.81 6.22,9.77 6.47,10.7C6.5,10.86 6.59,11 6.68,11.16L9.91,10.28C9.91,10.11 9.89,9.94 9.85,9.78C9.64,9 8.95,8.5 8.17,8.5M16.72,11.26L7.59,13.77C8.91,15.3 11,15.94 12.95,15.41C14.9,14.87 16.36,13.25 16.72,11.26Z"/></svg>
						</span>
                        <p><?php echo __('See more stickers on chat'); ?></p>
                    </div>
                    <div class="valign-wrapper">
						<span class="pink-text text-darken-1">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path
                                        fill="currentColor"
                                        d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"/></svg>
						</span>
                        <p><?php echo __('Show in Premium bar'); ?></p>
                    </div>
                    <div class="valign-wrapper">
						<span class="purple-text text-darken-1">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path
                                        fill="currentColor"
                                        d="M21,19V20H3V19L5,17V11C5,7.9 7.03,5.17 10,4.29C10,4.19 10,4.1 10,4A2,2 0 0,1 12,2A2,2 0 0,1 14,4C14,4.1 14,4.19 14,4.29C16.97,5.17 19,7.9 19,11V17L21,19M14,21A2,2 0 0,1 12,23A2,2 0 0,1 10,21M19.75,3.19L18.33,4.61C20.04,6.3 21,8.6 21,11H23C23,8.07 21.84,5.25 19.75,3.19M1,11H3C3,8.6 3.96,6.3 5.67,4.61L4.25,3.19C2.16,5.25 1,8.07 1,11Z"/></svg>
						</span>
                        <p><?php echo __('See likes notifications'); ?></p>
                    </div>
                    <div class="valign-wrapper">
						<span class="green-text text-darken-1">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path
                                        fill="currentColor"
                                        d="M18.65,2.85L19.26,6.71L22.77,8.5L21,12L22.78,15.5L19.24,17.29L18.63,21.15L14.74,20.54L11.97,23.3L9.19,20.5L5.33,21.14L4.71,17.25L1.22,15.47L3,11.97L1.23,8.5L4.74,6.69L5.35,2.86L9.22,3.5L12,0.69L14.77,3.46L18.65,2.85M9.5,7A1.5,1.5 0 0,0 8,8.5A1.5,1.5 0 0,0 9.5,10A1.5,1.5 0 0,0 11,8.5A1.5,1.5 0 0,0 9.5,7M14.5,14A1.5,1.5 0 0,0 13,15.5A1.5,1.5 0 0,0 14.5,17A1.5,1.5 0 0,0 16,15.5A1.5,1.5 0 0,0 14.5,14M8.41,17L17,8.41L15.59,7L7,15.59L8.41,17Z"/></svg>
						</span>
                        <p><?php echo __('Get discount when buy boost me'); ?></p>
                    </div>
                </div>
                <div class="col s12 m12 l6">
                    <div class="valign-wrapper">
						<span class="blue-text text-darken-1">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path
                                        fill="currentColor"
                                        d="M12,16L19.36,10.27L21,9L12,2L3,9L4.63,10.27M12,18.54L4.62,12.81L3,14.07L12,21.07L21,14.07L19.37,12.8L12,18.54Z"/></svg>
						</span>
                        <p><?php echo __('Display first in find matches'); ?></p>
                    </div>
                    <div class="valign-wrapper">
						<span class="teal-text text-darken-1">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path
                                        fill="currentColor"
                                        d="M13,15L15.5,17.5L16.92,16.08L12,11.16L7.08,16.08L8.5,17.5L11,15V21H13V15M3,3H21V5H3V3M3,7H13V9H3V7Z"/></svg>
						</span>
                        <p><?php echo __('Display on top in random users'); ?></p>
                    </div>
                    <?php if ($config->video_chat == 1 && $config->audio_chat == 1) { ?>
                        <div class="valign-wrapper">
							<span class="pink-text text-darken-1">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path
                                            fill="currentColor"
                                            d="M17,10.5L21,6.5V17.5L17,13.5V17A1,1 0 0,1 16,18H4A1,1 0 0,1 3,17V7A1,1 0 0,1 4,6H16A1,1 0 0,1 17,7V10.5M14,16V15C14,13.67 11.33,13 10,13C8.67,13 6,13.67 6,15V16H14M10,8A2,2 0 0,0 8,10A2,2 0 0,0 10,12A2,2 0 0,0 12,10A2,2 0 0,0 10,8Z"></path></svg>
							</span>
                            <p><?php echo __('Video and Audio calls to all users'); ?></p>
                        </div>
                    <?php } else { ?>
                    <?php } ?>
                    <div class="valign-wrapper">
						<span class="indigo-text text-darken-1">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path
                                        fill="currentColor"
                                        d="M12,2C15.31,2 18,4.66 18,7.95C18,12.41 12,19 12,19C12,19 6,12.41 6,7.95C6,4.66 8.69,2 12,2M12,6A2,2 0 0,0 10,8A2,2 0 0,0 12,10A2,2 0 0,0 14,8A2,2 0 0,0 12,6M20,19C20,21.21 16.42,23 12,23C7.58,23 4,21.21 4,19C4,17.71 5.22,16.56 7.11,15.83L7.75,16.74C6.67,17.19 6,17.81 6,18.5C6,19.88 8.69,21 12,21C15.31,21 18,19.88 18,18.5C18,17.81 17.33,17.19 16.25,16.74L16.89,15.83C18.78,16.56 20,17.71 20,19Z"></path></svg>
						</span>
                        <p><?php echo __('Find potential matches by country'); ?></p>
                    </div>
                </div>
            </div>
        </div>
        <hr class="border_hr">
        <div class="dt_choose_pro">
            <h2><?php echo __('Choose a Plan'); ?></h2>
            <div class="valign-wrapper dt_pro_plans">
                <div>
                    <img class="pro_badge" src="/themes/todate/assets/img/badge/badge_1.png" alt="WEEK">
                    <label>
                        <input class="with-gap" name="pro_plan" type="radio" value="WEEK"
                               data-planid="P-82H92083HK632822CMA4E6GY"
                               data-price="<?php echo (float)$config->week_pro_plan; ?>"/>
                        <span class="pln_name">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path
                                        fill="currentColor"
                                        d="m21.28 4.473c-.848-.721-2.109-.604-2.817.262l-8.849 10.835-4.504-3.064c-.918-.626-2.161-.372-2.773.566s-.364 2.205.555 2.83l7.494 5.098 11.151-13.653c.707-.866.592-2.152-.257-2.874z"/></svg>
							<span class="duration">WEEK</span>
							<span class="price"><?php echo $config->currency_symbol . (float)$config->week_pro_plan; ?></span>
						</span>
                    </label>
                </div>
                <div>
                    <img class="pro_badge" src="/themes/todate/assets/img/badge/badge_2.png" alt="BASIC">
                    <label>
                        <input class="with-gap" name="pro_plan" type="radio" value="BASIC"
                               data-planid="P-7RV402961B619205KL5QJNKI"
                               data-price="<?php echo (float)$config->basic_pro_plan; ?>"/>
                        <span class="pln_name">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path
                                        fill="currentColor"
                                        d="m21.28 4.473c-.848-.721-2.109-.604-2.817.262l-8.849 10.835-4.504-3.064c-.918-.626-2.161-.372-2.773.566s-.364 2.205.555 2.83l7.494 5.098 11.151-13.653c.707-.866.592-2.152-.257-2.874z"/></svg>
							<span class="duration">BASIC</span>
							<span class="price"><?php echo $config->currency_symbol . (float)$config->basic_pro_plan; ?></span>

						</span>
                    </label>
                </div>
                <div>
                    <img class="pro_badge" src="/themes/todate/assets/img/badge/badge_3.png" alt="PREMIUM">
                    <label>
                        <input class="with-gap" name="pro_plan" type="radio" value="PREMIUM"
                               data-planid="P-73931104S0608633GL5QJNWA"
                               data-price="<?php echo (float)$config->premium_pro_plan; ?>"/>
                        <span class="pln_name">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path
                                        fill="currentColor"
                                        d="m21.28 4.473c-.848-.721-2.109-.604-2.817.262l-8.849 10.835-4.504-3.064c-.918-.626-2.161-.372-2.773.566s-.364 2.205.555 2.83l7.494 5.098 11.151-13.653c.707-.866.592-2.152-.257-2.874z"/></svg>
							<span class="duration">PREMIUM</span>
							<span class="price"><?php echo $config->currency_symbol . (float)$config->premium_pro_plan; ?></span>
						</span>
                    </label>
                </div>
                <div>
                    <img class="pro_badge" src="/themes/todate/assets/img/badge/badge_4.png" alt="VIP">
                    <label>
                        <input class="with-gap" name="pro_plan" type="radio" value="VIP"
                               data-planid="P-64D20401H9475444SL5RJKWQ"
                               data-price="<?php echo (float)$config->vip_pro_plan; ?>" checked/>
                        <span class="pln_name">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path
                                        fill="currentColor"
                                        d="m21.28 4.473c-.848-.721-2.109-.604-2.817.262l-8.849 10.835-4.504-3.064c-.918-.626-2.161-.372-2.773.566s-.364 2.205.555 2.83l7.494 5.098 11.151-13.653c.707-.866.592-2.152-.257-2.874z"/></svg>
							<span class="duration">VIP</span>
							<span class="price"><?php echo $config->currency_symbol . (float)$config->vip_pro_plan; ?></span>
                            	<span class="pln_popular"><?php echo __('Most popular'); ?></span>
						</span>
                    </label>
                </div>
                <div>
                    <img class="pro_badge" src="/themes/todate/assets/img/badge/badge_5.png" alt="VIP GOLD">
                    <label>
                        <input class="with-gap" name="pro_plan" type="radio" value="VIP GOLD"
                               data-planid="P-8GU34904DB4687404L5QJPCI"
                               data-price="<?php echo (float)$config->vipgold_pro_plan; ?>"/>
                        <span class="pln_name">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path
                                        fill="currentColor"
                                        d="m21.28 4.473c-.848-.721-2.109-.604-2.817.262l-8.849 10.835-4.504-3.064c-.918-.626-2.161-.372-2.773.566s-.364 2.205.555 2.83l7.494 5.098 11.151-13.653c.707-.866.592-2.152-.257-2.874z"/></svg>
							<span class="duration">VIP GOLD</span>
							<span class="price"><?php echo $config->currency_symbol . (float)$config->vipgold_pro_plan; ?></span>
						</span>
                    </label>
                </div>
                <div>
                    <img class="pro_badge" src="/themes/todate/assets/img/badge/badge_6.png" alt="DIAMOND">
                    <label>
                        <input class="with-gap" name="pro_plan" type="radio" value="DIAMOND"
                               data-planid="P-90T35820U31936720L5QJOSI"
                               data-price="<?php echo (float)$config->diamond_pro_plan; ?>"/>
                        <span class="pln_name">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path
                                        fill="currentColor"
                                        d="m21.28 4.473c-.848-.721-2.109-.604-2.817.262l-8.849 10.835-4.504-3.064c-.918-.626-2.161-.372-2.773.566s-.364 2.205.555 2.83l7.494 5.098 11.151-13.653c.707-.866.592-2.152-.257-2.874z"/></svg>
							<span class="duration">DIAMOND</span>
							<span class="price"><?php echo $config->currency_symbol . (float)$config->diamond_pro_plan; ?></span>
						</span>
                    </label>
                </div>
            </div>
            <div class="pay_using">
                <p class="bold"><?php echo __('Pay Using'); ?></p>
                <div class="pay_u_btns">
                    <button style="display: none;" id="paypal" onclick="clickAndDisable(this);"
                            class="btn valign-wrapper">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                            <path d="M20.067 8.478c.492.88.556 2.014.3 3.327-.74 3.806-3.276 5.12-6.514 5.12h-.5a.805.805 0 0 0-.794.68l-.04.22-.63 3.993-.032.17a.804.804 0 0 1-.794.679H7.72a.483.483 0 0 1-.477-.558L7.418 21h1.518l.95-6.02h1.385c4.678 0 7.75-2.203 8.796-6.502zm-2.96-5.09c.762.868.983 1.81.752 3.285-.019.123-.04.24-.062.36-.735 3.773-3.089 5.446-6.956 5.446H8.957c-.63 0-1.174.414-1.354 1.002l-.014-.002-.93 5.894H3.121a.051.051 0 0 1-.05-.06l2.598-16.51A.95.95 0 0 1 6.607 2h5.976c2.183 0 3.716.469 4.523 1.388z"
                                  fill="currentColor"/>
                        </svg> <?php echo __('PayPal'); ?>
                    </button>
                    <div style="display: none;" id="paypal-button-container"></div>

                    <button onclick="SH_StripeRequestPro()" id="stripe_button_pro" class="stripeBtn btn valign-wrapper">

                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                             viewBox="0 0 468 222.5" style="enable-background:new 0 0 468 222.5;" xml:space="preserve">
<style type="text/css">
    .st0 {
        fill-rule: evenodd;
        clip-rule: evenodd;
        fill: #FFFFFF;
    }
</style>
                            <g>
                                <path class="st0" d="M414,113.4c0-25.6-12.4-45.8-36.1-45.8c-23.8,0-38.2,20.2-38.2,45.6c0,30.1,17,45.3,41.4,45.3
		c11.9,0,20.9-2.7,27.7-6.5v-20c-6.8,3.4-14.6,5.5-24.5,5.5c-9.7,0-18.3-3.4-19.4-15.2h48.9C413.8,121,414,115.8,414,113.4z
		 M364.6,103.9c0-11.3,6.9-16,13.2-16c6.1,0,12.6,4.7,12.6,16H364.6z"/>
                                <path class="st0" d="M301.1,67.6c-9.8,0-16.1,4.6-19.6,7.8l-1.3-6.2h-22v116.6l25-5.3l0.1-28.3c3.6,2.6,8.9,6.3,17.7,6.3
		c17.9,0,34.2-14.4,34.2-46.1C335.1,83.4,318.6,67.6,301.1,67.6z M295.1,136.5c-5.9,0-9.4-2.1-11.8-4.7l-0.1-37.1
		c2.6-2.9,6.2-4.9,11.9-4.9c9.1,0,15.4,10.2,15.4,23.3C310.5,126.5,304.3,136.5,295.1,136.5z"/>
                                <polygon class="st0" points="223.8,61.7 248.9,56.3 248.9,36 223.8,41.3 	"/>
                                <rect x="223.8" y="69.3" class="st0" width="25.1" height="87.5"/>
                                <path class="st0"
                                      d="M196.9,76.7l-1.6-7.4h-21.6v87.5h25V97.5c5.9-7.7,15.9-6.3,19-5.2v-23C214.5,68.1,202.8,65.9,196.9,76.7z"/>
                                <path class="st0" d="M146.9,47.6l-24.4,5.2l-0.1,80.1c0,14.8,11.1,25.7,25.9,25.7c8.2,0,14.2-1.5,17.5-3.3V135
		c-3.2,1.3-19,5.9-19-8.9V90.6h19V69.3h-19L146.9,47.6z"/>
                                <path class="st0" d="M79.3,94.7c0-3.9,3.2-5.4,8.5-5.4c7.6,0,17.2,2.3,24.8,6.4V72.2c-8.3-3.3-16.5-4.6-24.8-4.6
		C67.5,67.6,54,78.2,54,95.9c0,27.6,38,23.2,38,35.1c0,4.6-4,6.1-9.6,6.1c-8.3,0-18.9-3.4-27.3-8v23.8c9.3,4,18.7,5.7,27.3,5.7
		c20.8,0,35.1-10.3,35.1-28.2C117.4,100.6,79.3,105.9,79.3,94.7z"/>
                            </g>
</svg>
                    </button>
                    <?php if (!empty($config->bank_description)) { ?>
                        <button id="bank_transfer" class="btn valign-wrapper">
                            <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                         width="24" height="24"><path
                                            d="M2 20h20v2H2v-2zm2-8h2v7H4v-7zm5 0h2v7H9v-7zm4 0h2v7h-2v-7zm5 0h2v7h-2v-7zM2 7l10-5 10 5v4H2V7zm2 1.236V9h16v-.764l-8-4-8 4zM12 8a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"
                                            fill="currentColor"/></svg> <?php echo __('Bank Transfer'); ?></span>
                        </button>
                    <?php } ?>
                    <?php if (!empty($config->paysera_password)) { ?>
                        <button id="sms_payment" onclick="PayProViaSms();" class="btn valign-wrapper">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                <path d="M6.455 19L2 22.5V4a1 1 0 0 1 1-1h18a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H6.455zm-.692-2H20V5H4v13.385L5.763 17zm5.53-4.879l4.243-4.242 1.414 1.414-5.657 5.657-3.89-3.89 1.415-1.414 2.475 2.475z"
                                      fill="currentColor"/>
                            </svg> <?php echo __('SMS'); ?></button>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- End Premium  -->
<a href="javascript:void(0);" id="btnProSuccess" style="visibility: hidden;display: none;"></a>

<div class="bank_transfer_modal modal modal-fixed-footer">
    <div class="modal-dialog">
        <div class="modal-content dt_bank_trans_modal">
            <h4><?php echo __('Bank Transfer'); ?></h4>
            <div class="modal-body">
                <div class="bank_info"><?php echo htmlspecialchars_decode($config->bank_description); ?></div>
                <div class="dt_user_profile hide_alert_info_bank_trans">
                <span class="valign-wrapper">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path
                                fill="currentColor"
                                d="M13,13H11V7H13M13,17H11V15H13M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z"></path></svg> <?php echo __('Note'); ?>:
                </span>
                    <ul class="browser-default dt_prof_vrfy">
                        <li><?php echo __('Please transfer the amount of'); ?> <b><span id="bank_transfer_price"></span></b> <?php echo __('to this bank account to buy'); ?>
                            <b>"<span id="bank_transfer_description"></span>"</b> <?php echo __('Plan Premium Membership'); ?>
                        </li>
                        <li><?php echo $config->bank_transfer_note; ?></li>
                    </ul>
                </div>
                <p class="dt_bank_trans_upl_rec"><a href="javascript:void(0);"
                                                    onclick="$('.bank_transfer_modal').addClass('up_rec_active'); return false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                  d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M13.5,16V19H10.5V16H8L12,12L16,16H13.5M13,9V3.5L18.5,9H13Z"></path>
                        </svg> <?php echo __('Upload Receipt'); ?></a></p>
                <div class="upload_bank_receipts">
                    <div onclick="document.getElementById('receipt_img').click(); return false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                  d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M13.5,16V19H10.5V16H8L12,12L16,16H13.5M13,9V3.5L18.5,9H13Z"></path>
                        </svg>
                        <p><?php echo __('Upload Receipt'); ?></p>
                        <img id="receipt_img_preview" src="">
                    </div>
                </div>
                <input type="file" id="receipt_img" class="hide" accept="image/x-png, image/gif, image/jpeg"
                       name="receipt_img">
            </div>
            <!--<span style="display: block;text-align: center;" id="receipt_img_path"></span>-->
        </div>
        <div class="modal-footer">
            <div class="bank_transfr_progress hide" id="img_upload_progress">
                <div class="progress">
                    <div id="img_upload_progress_bar"
                         class="determinate progress-bar progress-bar-striped bg-success progress-bar-animated"
                         role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                         style="width: 0%"></div>
                </div>
            </div>
            <button class="modal-close waves-effect btn-flat"><?php echo __('Close'); ?></button>
            <button class="waves-effect waves-green btn btn-flat bold" disabled id="btn-upload-receipt"
                    data-selected=""><?php echo __('Confirm'); ?></button>
        </div>
    </div>
</div>



<script>
    function PayProViaSms() {
        window.location = window.ajax + 'sms/generate_pro_link?price=' + getPrice() + '00';
    }

    function getDescription() {
        var plans = document.getElementsByName('pro_plan');
        for (index = 0; index < plans.length; index++) {
            if (plans[index].checked) {
                return plans[index].value;
                break;
            }
        }
    }

    function getPrice() {
        var plans = document.getElementsByName('pro_plan');
        for (index = 0; index < plans.length; index++) {
            if (plans[index].checked) {
                return plans[index].getAttribute('data-price');
                break;
            }
        }
    }


    function getPlanId(){
        var pplans = document.getElementsByName('pro_plan');
        for (index = 0; index < pplans.length; index++) {
            if (pplans[index].checked) {
                return pplans[index].getAttribute('data-planid');
                break;
            }
        }
    }

    document.getElementById('bank_transfer').addEventListener('click', function (e) {
        $('#bank_transfer_price').text('<?php echo $config->currency_symbol;?>' + getPrice());
        $('#bank_transfer_description').text(getDescription());
        $('#receipt_img_path').html('');
        $('#receipt_img_preview').attr('src', '');
        $('.bank_transfer_modal').removeClass('up_rec_img_ready, up_rec_active');
        $('.bank_transfer_modal').modal('open');
    });

    document.getElementById('receipt_img').addEventListener('change', function (e) {
        let imgPath = $(this)[0].files[0].name;
        if (typeof (FileReader) != "undefined") {
            let reader = new FileReader();
            reader.onload = function (e) {
                $('#receipt_img_preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
        $('#receipt_img_path').html(imgPath);
        $('.bank_transfer_modal').addClass('up_rec_img_ready');
        $('#btn-upload-receipt').removeAttr('disabled');
        $('#btn-upload-receipt').removeClass('btn-flat').addClass('btn-success');
    });

    document.getElementById('btn-upload-receipt').addEventListener('click', function (e) {
        e.preventDefault();
        let bar = $('#img_upload_progress');
        let percent = $('#img_upload_progress_bar');
        let formData = new FormData();
        formData.append("description", getDescription());
        formData.append("price", getPrice());
        formData.append("mode", 'membership');
        formData.append("receipt_img", $("#receipt_img")[0].files[0], $("#receipt_img")[0].files[0].value);
        bar.removeClass('hide');
        $.ajax({
            xhr: function () {
                let xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        let percentComplete = evt.loaded / evt.total;
                        percentComplete = parseInt(percentComplete * 100);
                        //status.html( percentComplete + "%");
                        percent.width(percentComplete + '%');
                        percent.html(percentComplete + '%');
                        if (percentComplete === 100) {
                            bar.addClass('hide');
                            percent.width('0%');
                            percent.html('0%');
                        }
                    }
                }, false);
                return xhr;
            },
            url: window.ajax + 'profile/upload_receipt',
            type: "POST",
            async: true,
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            cache: false,
            timeout: 60000,
            dataType: false,
            data: formData,
            success: function (result) {
                if (result.status == 200) {
                    $('.bank_transfer_modal').modal('close');
                    M.toast({html: '<?php echo __('Your receipt uploaded successfully.');?>'});
                    return false;
                }
            }
        });
    });
</script>
<script>
    var user_id = '<?php echo auth()->id;?>';
    var mode = 'premium-membarship';
    var price = getPrice();
    var product = getDescription();
    var plan_id = getPlanId();
    console.log(plan_id);
    paypal.Buttons({
        style: {
            shape: 'rect',
            color: 'gold',
            layout: 'vertical',
            label: 'subscribe'
        },
        createSubscription: function (data, actions) {
            return actions.subscription.create({
                'plan_id': getPlanId()
            });
        },
        onApprove: function (data, actions) {
            alert(data.subscriptionID);
        },
        onError: function (err) {
            alert('onError');
            // For example, redirect to a specific error page
            window.location.href = window.location.origin+ '/aj/paypal/payment_cenceled?userid=' +user_id+ '&paymode=' +mode+ '&price=' +price+ '&product=' +product;;
        },
        onCancel: function (data) {

            window.location.href = window.location.origin+ '/aj/paypal/payment_cenceled?userid=' +user_id+ '&paymode=' +mode+ '&price=' +price+ '&product=' +product;;
        }
    }).render('#paypal-button-container');
</script>
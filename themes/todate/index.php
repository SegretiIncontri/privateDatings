<nav role="navigation" class="to_index_nav">
	<div class="nav-wrapper container to_index_cont">
		<div class="left header_logo">
			<a href="<?php echo $site_url;?>/" class="brand-logo"><img src="<?php echo $theme_url;?>assets/img/logo-light.png" /></a>
		</div>
		<ul class="right">
            <li class="hide_mobi_login">
                <a style="
    text-transform: capitalize;
" class='dropdown-trigger btn-flat white-text qdt_hdr_auth_btns' href="javascript:void(0);" data-target='language_menu'><span style="margin-right: 5px" class="flag-icon flag-icon-us flag-icon-squared"></span> <?php echo $_COOKIE['activeLang'];?></a>

                <!-- Dropdown Structure -->
                <ul id='language_menu' class='dropdown-content'>
                    <?php require( $theme_path . 'main' . $_DS . 'language2.php' );?>
                </ul>
            </li>
			<li class="hide_mobi_login"><a href="<?php echo $site_url;?>/login" data-ajax="/login" class="btn-flat white-text qdt_hdr_auth_btns"><?php echo __( 'Login' );?></a></li>
			<li class="hide_mobi_login"><a href="<?php echo $site_url;?>/register" data-ajax="/register" class="btn-flat btn btn_primary white-text qdt_hdr_auth_btns"><?php echo __( 'Register' );?></a></li>
			<div class="header_user show_mobi_login to_no_usr_hdr_menu">
				<a class="dropdown-trigger" href="#" data-target="log_in_dropdown"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm-4.987-3.744A7.966 7.966 0 0 0 12 20c1.97 0 3.773-.712 5.167-1.892A6.979 6.979 0 0 0 12.16 16a6.981 6.981 0 0 0-5.147 2.256zM5.616 16.82A8.975 8.975 0 0 1 12.16 14a8.972 8.972 0 0 1 6.362 2.634 8 8 0 1 0-12.906.187zM12 13a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0-2a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" /></svg></a>
				<ul id="log_in_dropdown" class="dropdown-content">
					<li><a href="<?php echo $site_url;?>/login" data-ajax="/login"><?php echo __( 'Login' );?></a></li>
					<li><a href="<?php echo $site_url;?>/register" data-ajax="/register"><?php echo __( 'Register' );?></a></li>
				</ul>
			</div>
		</ul>
	</div>
</nav>
	
<div class="to_main_hero">
	<div class="container to_index_cont">
		<div class="valign-wrapper to_main_hero_innr">
			<div class="to_main_hero_text">
				<h1><?php echo ucfirst( $config->site_name );?></h1>
				<!--<p><?php /*echo __( 'where you could meet anyone, anywhere!' );*/?></p>-->
                <p>Have an affair, life is beautiful.</p>
			</div>
		</div>
	</div>
</div>

<div class="bg_white">
<div class="container to_index_cont">
	<div class="valign-wrapper to_main_hero_filter_prnt">
        <a href="<?php echo $site_url;?>/register" class="btn btn_primary btn-large bold btn_reg"><?php echo __( 'Get Started' );?></a>
		<div class="to_main_hero_filters hidden">
			<div class="to_main_hero_filters_innrlist">
				<p><?php echo __( 'I am a' );?></p>
				<div>
					<div class="row">
						<div class="input-field col s12">
							<select class="browser-default">
								<?php
									$all_gender = array();
									$gender = Dataset::load('gender');
									$iz = 0;
									if (isset($gender) && !empty($gender)) {
										foreach ($gender as $key => $val) {
											$_checked = '';
											if($iz === 1){
												$_checked = 'selected';
											}
											echo '<option value="' . $key . '" '.$_checked.'>' . $val . '</option>';
											$iz++;
										}
									}
								?>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="to_main_hero_filters_innrlist">
				<p><?php echo __( 'I\'m looking for a' );?></p>
				<div>
					<div class="row">
						<div class="input-field col s12">
							<select class="browser-default">
								<?php
									$all_gender = array();
									$gender = Dataset::load('gender');
									$ix = 0;
									if (isset($gender) && !empty($gender)) {
										foreach ($gender as $key => $val) {
											$_checked = '';
											if($ix === 0){
												$_checked = 'selected';
											}
											echo '<option value="' . $key . '" '.$_checked.'>' . $val . '</option>';
											$ix++;
										}
									}
								?>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="to_main_hero_filters_innrlist">
				<p><?php echo __( 'Ages' );?></p>
				<div>
					<div class="row">
						<div class="input-field col s6">
							<select class="_age_from browser-default">
								<?php for($i = 18 ; $i < 51 ; $i++ ){?>
									<option value="<?php echo $i;?>" <?php if( $i == 20){ echo 'selected';}?> ><?php echo $i;?></option>
								<?php }?>
							</select>
						</div>
						<div class="input-field col s6">
							<select class="_age_to browser-default">
								<?php for($i = 51 ; $i < 99 ; $i++ ){?>
									<option value="<?php echo $i;?>" <?php if( $i == 55){ echo 'selected';}?>><?php echo $i;?></option>
								<?php }?>
							</select>
						</div>
					</div>
				</div>
			</div>
			<a href="<?php echo $site_url;?>/login" class="btn btn_primary btn-large bold"><span><?php echo __( 'Let\'s Begin' );?></span></a>
		</div>
	</div>
</div>
</div>

<div class="section bg_white to_index_ftrs_prnt">
	<div class="container to_index_cont">
        <?php if( $config->show_user_on_homepage == '1'){
            $siteUsers = GetSiteUsers();
            if( !empty($siteUsers) ){
                ?>
                <div class="center-align to_latest_users">
                    <h4><?php echo __( 'Latest Users' );?></h4>
                    <div class="center">
                        <div class="row">

                        <?php foreach ($siteUsers as $key => $user){ ?>

                            <div class="col s12 m12 l2">
                            <a class="circle xuser" href="<?php echo $site_url;?>/@<?php echo $user->username;?>" data-ajax="/@<?php echo $user->username;?>">
                                <img src="<?php echo $user->avater->avater;?>" alt="<?php echo $user->full_name;?>" class="circle">
                                <p class="no-link"><?php echo $user->username;?><br><?php echo $user->country;?> <?php echo $user->age;?></p>
                            </a>
                            </div>
                        <?php } ?>
                        </div>
                    </div>
                </div>
            <?php }} ?>


	</div>
	<div class="container to_index_cont to_index_ftr_row">

        <div class="valign-wrapper row">
            <div class="col l6">
                <img src="<?php echo $theme_url;?>assets/img/how/chat.svg" alt="<?php echo __( 'Best Match' );?>" class="to_index_ftrs_img">
                <div class="to_index_ftrs">
                    <h2><?php echo __( 'Best Match' );?></h2>
                    <p><?php echo __( 'Based on your location, we find best and suitable matches for you.' );?></p>
                </div>
            </div>
            <div class="col l6">
                <img src="<?php echo $theme_url;?>assets/img/how/protection.svg" alt="<?php echo __( 'Fully Secure' );?>" class="to_index_ftrs_img">
                <div class="to_index_ftrs">
                    <h2><?php echo __( 'Fully Secure' );?></h2>
                    <p><?php echo str_replace('{0}', ucfirst( $config->site_name ) , __( 'Your account is Safe on {0}. We never share your data with third party.' ) );?></p>
                </div>
            </div>
            <div class="col l6">
                <img src="<?php echo $theme_url;?>assets/img/how/verified.svg" alt="<?php echo __( '100% Privacy' );?>" class="to_index_ftrs_img">
                <div class="to_index_ftrs">
                    <h2><?php echo __( '100% Privacy' );?></h2>
                    <p><?php echo __( 'You have full control over your personal information that you share.' );?></p>
                </div>
            </div>
        </div>




	</div>

</div>



<div class="to_index_start">
	<div class="container to_index_cont">
		<div class="section">
			<div class="center-align dt_get_start">
				<h4><?php echo str_replace('{0}', ucfirst( $config->site_name ) , __( 'Connect with your perfect Soulmate here, on {0}.' ) );?></h4>
				<a href="<?php echo $site_url;?>/register" class="btn btn_primary btn-large bold"><?php echo __( 'Get Started' );?></a>
			</div>
		</div>
	</div>

	<footer id="footer" class="page_footer to_index_foot">
		<div class="footer-copyright">
            <div class="container">
                <div class="footer-content" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
                    <a href="<?php echo $site_url;?>/">
                        <img style="height: 100px;" class="ui centered image" src="<?php echo $theme_url;?>assets/img/logo-light.png" alt="Logo">
                    </a>
                    <div class="footer-menu">

                        <ul class="">
                            <li><a href="<?php echo $site_url;?>/about" data-ajax="/about"><?php echo __( 'About Us' );?></a></li>
                          <li><a href="<?php echo $site_url;?>/terms" data-ajax="/terms"><?php echo __( 'Terms' );?></a></li>
                          <li><a href="<?php echo $site_url;?>/privacy" data-ajax="/privacy"><?php echo __( 'Privacy Policy' );?></a></li>
                          <li><a href="<?php echo $site_url;?>/contact" data-ajax="/contact"><?php echo __( 'Contact' );?></a></li>
                        </ul>
                      <!--  <?php /*require( $theme_path . 'main' . $_DS . 'custom-page.php' );*/?>
                        --><?php /*require( $theme_path . 'main' . $_DS . 'language.php' );*/?>
                    </div>
                    <div class="f-links">
                        <a href="https://stripe.com" target="_blank">
                            <img style="height: 50px" src="<?php echo $theme_url;?>assets/img/payment/stripe.png" title="Stripe" alt="Stripe">
                            <img style="height: 50px" src="<?php echo $theme_url;?>assets/img/payment/visa.svg" title="Visa" alt="Visa">
                            <img style="height: 50px" src="<?php echo $theme_url;?>assets/img/payment/visae.svg" title="Visa Electron" alt="Visa Electron">
                            <img style="height: 50px" src="<?php echo $theme_url;?>assets/img/payment/mastercard.svg" title="Mastercard" alt="Mastercard">
                            <img style="height: 50px" src="<?php echo $theme_url;?>assets/img/payment/maestro.svg" title="Maestro" alt="Maestro">
                            <img style="height: 50px" src="<?php echo $theme_url;?>assets/img/payment/amex.svg" title="American Express" alt="American Express">

                        </a>
                    </div>
                    <span class="copyright"><?php echo __( 'Copyright' );?> © <?php echo date( "Y" ) . " " . ucfirst( $config->site_name );?>. <?php echo __( 'All rights reserved' );?>.</span>
                </div>
            </div>
			
		</div>
	</footer>
</div>
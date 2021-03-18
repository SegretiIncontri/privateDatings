<div class="to_auth_page">
	<div class="login_page">
		<div class="header_logo">
			<a id="logo-container" href="<?php echo $site_url;?>/" class="brand-logo"><img src="<?php echo $theme_url;?>assets/img/logo.png" /></a>
		</div>
		<div class="login-pagez">
			<div class="login-form">
				<h4><?php echo __( 'Welcome back,' );?></h4>
				<p><?php echo __( 'please login to your account.' );?></p>
				<div class="text-center login-icons"><?php if($config->facebookLogin == '1' ){ ?>
					<div>
						<a href="<?php echo $site_url;?>/social-login.php?provider=Facebook" onclick="clickAndDisable(this);"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="background-color: #2d4373;"><path fill="currentColor" d="M17,2V2H17V6H15C14.31,6 14,6.81 14,7.5V10H14L17,10V14H14V22H10V14H7V10H10V6A4,4 0 0,1 14,2H17Z" /></svg></a>
					</div>
					<?php } ?><?php if($config->googleLogin == '1' ){ ?>
					<div>
						<a href="<?php echo $site_url;?>/social-login.php?provider=Google" onclick="clickAndDisable(this);"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="background-color: #c23321;"><path fill="currentColor" d="M23,11H21V9H19V11H17V13H19V15H21V13H23M8,11V13.4H12C11.8,14.4 10.8,16.4 8,16.4C5.6,16.4 3.7,14.4 3.7,12C3.7,9.6 5.6,7.6 8,7.6C9.4,7.6 10.3,8.2 10.8,8.7L12.7,6.9C11.5,5.7 9.9,5 8,5C4.1,5 1,8.1 1,12C1,15.9 4.1,19 8,19C12,19 14.7,16.2 14.7,12.2C14.7,11.7 14.7,11.4 14.6,11H8Z" /></svg></a>
					</div>
					<?php } ?><?php if($config->twitterLogin == '1' ){ ?>
					<div>
						<a href="<?php echo $site_url;?>/social-login.php?provider=Twitter" onclick="clickAndDisable(this);"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="background-color: #2795e9;"><path fill="currentColor" d="M22.46,6C21.69,6.35 20.86,6.58 20,6.69C20.88,6.16 21.56,5.32 21.88,4.31C21.05,4.81 20.13,5.16 19.16,5.36C18.37,4.5 17.26,4 16,4C13.65,4 11.73,5.92 11.73,8.29C11.73,8.63 11.77,8.96 11.84,9.27C8.28,9.09 5.11,7.38 3,4.79C2.63,5.42 2.42,6.16 2.42,6.94C2.42,8.43 3.17,9.75 4.33,10.5C3.62,10.5 2.96,10.3 2.38,10C2.38,10 2.38,10 2.38,10.03C2.38,12.11 3.86,13.85 5.82,14.24C5.46,14.34 5.08,14.39 4.69,14.39C4.42,14.39 4.15,14.36 3.89,14.31C4.43,16 6,17.26 7.89,17.29C6.43,18.45 4.58,19.13 2.56,19.13C2.22,19.13 1.88,19.11 1.54,19.07C3.44,20.29 5.7,21 8.12,21C16,21 20.33,14.46 20.33,8.79C20.33,8.6 20.33,8.42 20.32,8.23C21.16,7.63 21.88,6.87 22.46,6Z" /></svg></a>
					</div>
					<?php } ?><?php if($config->VkontakteLogin == '1' ){ ?>
					<div>
						<a href="<?php echo $site_url;?>/social-login.php?provider=Vkontakte" onclick="clickAndDisable(this);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="background-color: #4a76a8;"><path fill="currentColor" d="M20.8,7.74C20.93,7.32 20.8,7 20.18,7H18.16C17.64,7 17.41,7.27 17.28,7.57C17.28,7.57 16.25,10.08 14.79,11.72C14.31,12.19 14.1,12.34 13.84,12.34C13.71,12.34 13.5,12.19 13.5,11.76V7.74C13.5,7.23 13.38,7 12.95,7H9.76C9.44,7 9.25,7.24 9.25,7.47C9.25,7.95 10,8.07 10.05,9.44V12.42C10.05,13.08 9.93,13.2 9.68,13.2C9,13.2 7.32,10.67 6.33,7.79C6.13,7.23 5.94,7 5.42,7H3.39C2.82,7 2.7,7.27 2.7,7.57C2.7,8.11 3.39,10.77 5.9,14.29C7.57,16.7 9.93,18 12.08,18C13.37,18 13.53,17.71 13.53,17.21V15.39C13.53,14.82 13.65,14.7 14.06,14.7C14.36,14.7 14.87,14.85 16.07,16C17.45,17.38 17.67,18 18.45,18H20.47C21.05,18 21.34,17.71 21.18,17.14C21,16.57 20.34,15.74 19.47,14.76C19,14.21 18.29,13.61 18.07,13.3C17.77,12.92 17.86,12.75 18.07,12.4C18.07,12.4 20.54,8.93 20.8,7.74Z"/></svg></a>
					</div>
					<?php } ?><?php if($config->wowonder_login == '1' ){ ?>
					<div>
						<a href="<?php echo $config->wowonder_domain_uri.'/oauth?app_id='.$config->wowonder_app_ID;?>" onclick="clickAndDisable(this);"><img src="<?php echo $config->wowonder_domain_icon;?>" alt="Login" width="48" height="48" style="vertical-align: middle;"></a>
					</div>
					<?php } ?></div>
				<hr class="border_hr">
				<form method="POST" action="/Useractions/login" class="login">
					<div class="alert alert-success" role="alert" style="display:none;"></div>
					<div class="alert alert-danger" role="alert" style="display:none;"></div>
					<div class="to_mat_input">
						<input type="text" name="username" id="username" class="browser-default" placeholder="<?php echo __( 'Username or Email' );?>" required autofocus>
						<label for="username"><?php echo __( 'Username or Email' );?></label>
					</div>
					<div class="to_mat_input">
						<input type="password" name="password" id="password" class="browser-default" placeholder="<?php echo __( 'Password' );?>" required>
						<label for="password"><?php echo __( 'Password' );?></label>
					</div>
					<div class="forgot_password">
						<a href="<?php echo $site_url;?>/forgot" data-ajax="/forgot"><?php echo __( 'Forgot Password?' );?></a>
					</div>
					<div class="dt_login_footer">
						<button class="btn btn-large bold btn_primary" type="submit" name="action"><?php echo __( 'Login' );?></button>
					</div>		
					<div class="clear"></div>
				</form>
				<p class="to_altr_auth_opt"><?php echo __( 'Don\'t have an account?' ); ?> <a href="<?php echo $site_url;?>/register" data-ajax="/register"><?php echo __( 'Register' );?></a></p>
			</div>    
		</div>
		<svg width="742px" height="135px" viewBox="0 0 742 135" version="1.1" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"><path d="M0,18.1943359 C0,18.1943359 33.731258,1.47290595 88.7734375,0.0931329845 C219.81339,-3.19171847 250.381265,81.3678781 463.388672,103.315789 C574.953531,114.811237 741.039062,66.8974609 741.039062,66.8974609 L741.039062,134 L0,133.714227 L0,18.1943359 Z" id="Rectangle-2" fill="#f27b70" opacity="0.53177472" style="mix-blend-mode: multiply;"></path><path d="M0,98.1572266 C0,98.1572266 104.257812,78.1484375 186.296875,78.1484375 C268.335938,78.1484375 310.78125,115.222656 369,104.40625 C534.365804,73.6830944 552.410156,15.5898438 625.519531,7.62890625 C698.628906,-0.33203125 741.039062,42.75 741.039062,42.75 L741.039062,134 L0,134.166016 L0,98.1572266 Z" id="Rectangle-4" fill="#f27b70" opacity="0.37004431" style="mix-blend-mode: multiply;"></path> <path d="M0,45 C0,45 62.1359299,107.911868 208.148437,109.703125 C354.160945,111.494382 436.994353,57.1871807 491.703125,51.9257812 C644.628906,37.21875 741.039062,109.703125 741.039062,109.703125 L741.039062,134 L0,134 L0,45 Z" id="Rectangle-5" fill="#f27b70" opacity="0.231809701" style="mix-blend-mode: multiply;"></path> <path d="M0.288085938,112.378906 C0.288085938,112.378906 81.0614612,76.8789372 194.78125,75.40625 C308.501039,73.9335628 337.203138,98.34218 458.777344,106.441406 C580.35155,114.540633 741,116.601562 741,116.601562 L741.039062,134 L0,132.889648 L0.288085938,112.378906 Z" id="Rectangle-6" fill="#f27b70" opacity="0.209188433" style="mix-blend-mode: multiply;"></path></svg>
	</div>
	<div class="login_aside">
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M2.821 12.794a6.5 6.5 0 0 1 7.413-10.24h-.002L5.99 6.798l1.414 1.414 4.242-4.242a6.5 6.5 0 0 1 9.193 9.192L12 22l-9.192-9.192.013-.014z" fill="currentColor"></path></svg>
		<div class="to_auth_circle-2"></div>
		<div class="to_auth_circle-3"></div>
		<div class="login_aside_innr">
			<h2><?php echo __( 'Don\'t have an account?' ); ?></h2>
			<p><?php echo __( 'features_you_can___t_live_without' );?></p>
			<a class="btn" href="<?php echo $site_url;?>/register" data-ajax="/register"><span><?php echo __( 'Register' );?></span></a>
		</div>
	</div>
</div>
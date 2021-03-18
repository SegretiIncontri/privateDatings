<!-- Footer  -->
<footer id="footer" class="page_footer to_index_foot">
    <div class="footer-copyright">
        <div class="container">
            <div class="footer-content" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
      <!--          <a href="<?php /*echo $site_url;*/?>/">
                    <img style="height: 100px;" class="ui centered image" src="<?php /*echo $theme_url;*/?>assets/img/logo-light.png" alt="Logo">
                </a>-->
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
<!-- End Footer  -->
<?php if (!isset($_POST['ajax'])) {?>
	<?php require( $theme_path . 'main' . $_DS . 'header.php' );?>
	<?php
        if( isset( $_SESSION['JWT'] ) ){
            require( $theme_path . 'main' . $_DS . 'nav-logged-in.php' );
        }
    ?>
<?php } ?>

<?php
	if( isset( $_SESSION['JWT'] ) ){
	}else if ($data['name'] !== 'index' && $data['name'] !== 'login' && $data['name'] !== 'register' && $data['name'] !== 'forgot' && $data['name'] !== 'reset' && $data['name'] !== 'verifymail' && $data['name'] !== 'maintenance' && $data['name'] !== 'mail-otp'){
		require( $theme_path . 'main' . $_DS . 'nav-not-logged-in.php' );
	}
?>

<?php if (!isset($_POST['ajax'])) {?>
    <div id="container" <?php if( isset( $_SESSION['JWT'] ) ){ ?>class="to_main_cont to_side_present"<?php } ?>>
		<?php if ($data['name'] !== 'login' && $data['name'] !== 'contact' && $data['name'] !== 'register' && $data['name'] !== 'forgot' && $data['name'] !== 'reset' && $data['name'] !== 'verifymail' && $data['name'] !== 'index' && $data['name'] !== 'home') { ?>
			<div class="container" style="transform: none;"><?php echo GetAd('header');?></div>
		<?php } ?>
<?php } ?>
<?php
$active_user = auth();
?>

<?php if( $active_user->id > 0 && $active_user->active == 0 && $active_user->status == 3):?>

<style>
    #btn-upload-images, .page-margin.wow_creads_minstp{
        display: none!important;
    }
</style>
    <?php require( $theme_path . $_DS . 'steps.php' );?>
<?php else:?>
		<?php if( isset( $_SESSION['JWT'] ) ){ ?>
			<?php require( $theme_path . 'main' . $_DS . 'sidebar.php' );?>
		<?php } ?>

        <?php require($file_path);?>

		<?php if( isset( $_SESSION['JWT'] ) ){ ?>
			<?php require( $theme_path . 'main' . $_DS . 'sidebar-mini.php' );?>
		<?php } ?>
<?php endif;?>
<?php if (!isset($_POST['ajax'])) {?>
    </div>
    <a href="javascript:void(0);" id="ajaxRedirect" style="visibility: hidden;display: none;"></a>
	<?php
        if( isset( $_SESSION['JWT'] ) ){
            require( $theme_path . 'main' . $_DS . 'full-footer.php' );
        }
    ?>
<?php } ?>

<?php
	if( isset( $_SESSION['JWT'] ) ){
	}else if ($data['name'] !== 'index' && $data['name'] !== 'login' && $data['name'] !== 'register' && $data['name'] !== 'forgot' && $data['name'] !== 'reset' && $data['name'] !== 'verifymail' && $data['name'] !== 'maintenance' && $data['name'] !== 'mail-otp'){
		require( $theme_path . 'main' . $_DS . 'full-footer.php' );
	}
?>
	
<?php if (!isset($_POST['ajax'])) {?>
    <?php require( $theme_path . 'main' . $_DS . 'footer.php' );?>
<?php } ?>
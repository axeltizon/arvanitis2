<?php
function cup_contact_us_page() {

$cupAddress = get_option('cup_address');
$cupPhone = get_option('cup_phone');
$cupFax = get_option('cup_fax');
$cupEmail = get_option('cup_email');
$cupForm = get_option('cup_form_shortcode');
$cupInfo = get_option('cup_info');
$cupFacebook = get_option('cup_facebook');
$cupTwitter = get_option('cup_twitter');
$cupGoogle = get_option('cup_google');

?>
    <div id="cup-container">
    <div id="cup-left">
    <?php
	if (empty($cupForm)) {
	    cup_contact_form_code();
	} else {
		echo do_shortcode($cupForm);
	}
	?>
    </div> <!--cup-left-->
	
    <div id="cup-right">
	<iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0"width="500" height="150" src="https://maps.google.com/maps?hl=en&q=<?php echo $cupAddress;?>&ie=UTF8&t=roadmap&z=6&iwloc=B&output=embed"></iframe>	
    <div id="cup-contact-info">
	<!--Address info-->
	<?php
	if (!empty($cupAddress)) { ?>
	<p><span><img alt="home" src="<?php echo plugins_url( 'icons/home.png', __FILE__ ); ?>"></span>
	<?php echo $cupAddress;?></p>
	<?php } ?>
	
	<!--Phone-->
	<?php
	if (!empty($cupPhone)) { ?>
	<p><span><img alt="phone" src="<?php echo plugins_url( 'icons/phone.png', __FILE__ ); ?>"></span>
	<?php echo $cupPhone;?></p>
	<?php } ?>
	
	<!--Fax-->
	<?php
	if (!empty($cupFax)) { ?>
	<p><span><img alt="fax" src="<?php echo plugins_url( 'icons/fax.png', __FILE__ ); ?>"></span>
	<?php echo $cupFax;?></p>
	<?php } ?>
	
	<!--Email-->
	<?php
	if (!empty($cupEmail)) { ?>
	<p><span><img alt="email" src="<?php echo plugins_url( 'icons/email.png', __FILE__ ); ?>"></span>
	<?php echo $cupEmail;?></p>
	<?php } ?>

    <hr>

	<?php
    if (!empty($cupFacebook)) { ?>
	<p><span><img alt="facebook" src="<?php echo plugins_url( 'icons/facebook.png', __FILE__ ); ?>"></span>
    <a href="<?php echo $cupFacebook;?>" target="_blank">Facebook</a></p>
	<?php } ?>
	
	<?php
    if (!empty($cupTwitter)) { ?>
	<p><span><img alt="twitter" src="<?php echo plugins_url( 'icons/twitter.png', __FILE__ ); ?>"></span>
    <a href="<?php echo $cupTwitter;?>" target="_blank">Twitter</a></p>
	<?php } ?>
	
	<?php
    if (!empty($cupGoogle)) { ?>
	<p><span><img alt="google" src="<?php echo plugins_url( 'icons/google.png', __FILE__ ); ?>"></span>
    <a href="<?php echo $cupGoogle;?>" target="_blank">Google+</a></p>
	<?php } ?>	
	
	</div> <!--cup-contact-info-->
    </div> <!--cup-right-->
    </div> <!--cup-container-->
<?php }
?>
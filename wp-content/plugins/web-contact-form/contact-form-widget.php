<?php
/*
Plugin Name: Contact Form Widget
Plugin URI: https://wordpress.org/plugins/web-contact-form/
Description: Contact Form Widget - Quick, small and easy contact form widget for wordpress.
Version: 1.2
Author: vivan jakes
Author URI: https://wordpress.org/support/profile/personaltrainercertification
*/
class cfw_contactformwidget{
    
    public $options;
    
    public function __construct() {
        $this->options = get_option('cfw_contact_form_widget_options');
        $this->cfw_contact_form_widget_register_settings_and_fields();
    }
    
    public static function add_cfw_contact_tools_options_page(){
        add_options_page('Contact Form Widget', 'Contact Form Widget ', 'administrator', __FILE__, array('cfw_contactformwidget','cfw_youtube_tools_options'));
    }
    
    public static function cfw_youtube_tools_options(){
?>

<div class="artboard">
  <h2 class="top-style">Contact Form Widget Setting</h2>
  <h4 class="cfw_shotcode">Use Shortcode "[cfw_contact_form]" For Display Contact-Form On The Page or Post.</h4>
  <form method="post" action="options.php" enctype="multipart/form-data">
    <?php settings_fields('cfw_contact_form_widget_options'); ?>
    <?php do_settings_sections(__FILE__); ?>
    <p class="submit">
      <input name="submit" type="submit" class="button-default" value="Save Changes"/>
    </p>
  </form>
</div>
<?php
    }
    public function cfw_contact_form_widget_register_settings_and_fields(){
		
        register_setting('cfw_contact_form_widget_options', 'cfw_contact_form_widget_options',array($this,'cfw_contact_validate_settings'));
        add_settings_section('cfw_contact_form_widget_main_section', 'Settings', array($this,'cfw_contact_form_widget_main_section_cb'), __FILE__);
        
        //pageURL
       
        
         //cfw_name
        add_settings_field('cfw_name', 'Form Title', array($this,'cfw_name_settings'), __FILE__,'cfw_contact_form_widget_main_section');
        //cfw_email
        add_settings_field('cfw_email', 'Recipient Email', array($this,'cfw_email_settings'), __FILE__,'cfw_contact_form_widget_main_section');
        //cfw_marginTop
        add_settings_field('cfw_marginTop', 'Margin Top', array($this,'cfw_marginTop_settings'), __FILE__,'cfw_contact_form_widget_main_section');
        //cfw_alignment option
         add_settings_field('cfw_alignment', 'Alignment Position', array($this,'cfw_position_settings'),__FILE__,'cfw_contact_form_widget_main_section');
        //cfw_width
        add_settings_field('cfw_width', 'Width', array($this,'cfw_width_settings'), __FILE__,'cfw_contact_form_widget_main_section');
        //cfw_height
        add_settings_field('cfw_height', 'Height', array($this,'cfw_height_settings'), __FILE__,'cfw_contact_form_widget_main_section');
		 //cfw_success_message
        add_settings_field('cfw_success_message', 'Success Message', array($this,'cfw_success_message_settings'), __FILE__,'cfw_contact_form_widget_main_section');
        ///cfw_error_message
        add_settings_field('cfw_error_message', 'Error Message', array($this,'cfw_error_message_settings'), __FILE__,'cfw_contact_form_widget_main_section');
		

    }
    public function cfw_contact_validate_settings($plugin_options){
        return($plugin_options);
    }
    public function cfw_contact_form_widget_main_section_cb(){
        //optional
    }


     //cfw_name_settings
    public function cfw_name_settings() { 
        if(empty($this->options['cfw_name']))$this->options['cfw_name'] = "Contact Form Widget"; 
        echo '<input name="cfw_contact_form_widget_options[cfw_name]" type="text" value="'.$this->options['cfw_name'].'" />';
    }

      //cfw_email_settings
    public function cfw_email_settings() {
        if(empty($this->options['cfw_email'])) $this->options['cfw_email'] = "user@example.com";
        echo '<input name="cfw_contact_form_widget_options[cfw_email]" type="text" value="'.$this->options['cfw_email'].'" />';
    }
    
    //cfw_marginTop_settings
    public function cfw_marginTop_settings() {
        if(empty($this->options['cfw_marginTop'])) $this->options['cfw_marginTop'] = "100";
        echo '<input name="cfw_contact_form_widget_options[cfw_marginTop]" type="text" value="'.$this->options['cfw_marginTop'].'" />';
    }
    //cfw_alignment_settings
    public function cfw_position_settings(){
        if(empty($this->options['cfw_alignment'])) $this->options['cfw_alignment'] = "left";
        $items = array('left','right');
        echo '<select name="cfw_contact_form_widget_options[cfw_alignment]">';
        foreach($items as $item){
            $selected = ($this->options['cfw_alignment'] === $item) ? 'selected = "selected"' : '';
            echo '<option value="'.$item.'" '. $selected.'>'.$item.'</option>';
        }
        echo '</select>';
    }
    //cfw_width_settings
    public function cfw_width_settings() {
        if(empty($this->options['cfw_width'])) $this->options['cfw_width'] = "350";
        echo '<input name="cfw_contact_form_widget_options[cfw_width]" type="text" value="'.$this->options['cfw_width'].'" />';
    }
    //cfw_height_settings
    public function cfw_height_settings() {
        if(empty($this->options['cfw_height'])) $this->options['cfw_height'] = "430";
        echo '<input name="cfw_contact_form_widget_options[cfw_height]" type="text" value="'.$this->options['cfw_height'].'" />';
    }
	//cfw_success_message_settings
    public function cfw_success_message_settings() {
        if(empty($this->options['cfw_success_message_settings'])) $this->options['cfw_success_message_settings'] = "Thank you for your message. It has been sent.";
        echo '<textarea name="cfw_contact_form_widget_options[cfw_success_message_settings]" style="resize: none;">'.$this->options['cfw_success_message_settings'].'</textarea>';
    }
    //cfw_error_message_settings
    public function cfw_error_message_settings() {
        if(empty($this->options['cfw_error_message_settings'])) $this->options['cfw_error_message_settings'] = "Mail was not sent. Please try again later.";
        echo '<textarea name="cfw_contact_form_widget_options[cfw_error_message_settings]" style="resize: none;">'.$this->options['cfw_error_message_settings'].'</textarea>';
    }

}
add_action('admin_menu', 'cfw_contact_trigger_options_function');

function cfw_contact_trigger_options_function(){
    cfw_contactformwidget::add_cfw_contact_tools_options_page();
}

add_action('admin_init','cfw_contact_trigger_create_object');
function cfw_contact_trigger_create_object(){
    new cfw_contactformwidget();
}
add_action('wp_footer','cfw_contact_add_content_in_footer');
function cfw_contact_add_content_in_footer(){
	$o = get_option('cfw_contact_form_widget_options');
    extract($o);
    $total_height=$cfw_height-95;
    $max_height=$total_height+10;
	
$print_contact = '';
$print_contact .= '<div class="cfw-sec"><div class="banner-section"><img src="'.plugins_url( 'assets/banner-icon.png', __FILE__ ).'" alt="banner_icon"/><div class="corner-arrow"><img class="left" src="'.plugins_url( 'assets/banner-img-left.png', __FILE__ ).'" alt="banner_icon"/><img class="right" src="'.plugins_url( 'assets/banner-img-right.png', __FILE__ ).'" alt="banner_icon"/></div></div><h2>'.stripslashes($cfw_name).'</h2>
     <form action="" id="cf_mailsendform" method="post">
	   <input type="hidden" name="action" value="cfw_wpadminajax_mailsend"/>
	   <input type="hidden" name="_ajax_nonce" value="'.wp_create_nonce( "cfw_wpadminajax_mailsend_ajax_nonce" ).'"/>
       <input type="text" name="cf_email" value="" placeholder="E-Mail" required/>
       <input type="text" name="cf_subject" value="" placeholder="Subject" required/>
       <textarea name="cf_message" placeholder="Message"></textarea>
       <div class="cfw-submit"><input type="submit" value="SUBMIT" /><div class="cf_loadinfo" style="display:none;"><img src="'.plugins_url( 'assets/ajax-loader.gif', __FILE__ ).'" alt="loading..." /></div></div>
	   <div class="cfw_succees"></div>
     </form>
    </div>
	';
?>
<script type="text/javascript">
jQuery(document).ready(function() {
/** Toggle form **/	
jQuery('#contacticonlinkleft').click(function(){
	jQuery(this).parent().toggleClass('showdiv');
});
	
/** mail send jquery **/
jQuery('#cf_mailsendform').submit(cf_mailsendform_ajaxSubmit);

function cf_mailsendform_ajaxSubmit(){
jQuery('.cf_loadinfo').show();

var cf_mailsenddata = jQuery(this).serialize();

jQuery.ajax({
type:"POST",
url: "<?php echo admin_url( 'admin-ajax.php' ); ?>",
data: cf_mailsenddata,
success:function(data){
//alert(data);
jQuery('.cf_loadinfo').hide();	
jQuery('.cfw_succees').html(data);
cfw_resetformval();
}
});

return false;
}
/***  reset form data **/
function cfw_resetformval(){
	 jQuery('#cf_mailsendform').find('input:text, textarea').val('');
	 setTimeout(function(){jQuery('.cfw_succees').html(''); }, 3000);
	}

/**  shortcode mail send jquery **/
jQuery('#cf_mailsendform1').submit(cf_mailsendform_ajaxSubmit1);

function cf_mailsendform_ajaxSubmit1(){
jQuery('.cf_loadinfo1').show();

var cf_mailsenddata = jQuery(this).serialize();

jQuery.ajax({
type:"POST",
url: "<?php echo admin_url( 'admin-ajax.php' ); ?>",
data: cf_mailsenddata,
success:function(data){
//alert(data);
jQuery('.cf_loadinfo1').hide();	
jQuery('.cfw_succees1').html(data);
cfw_resetformval();
}
});

return false;
}
/*** reset form data **/
function cfw_resetformval(){
	 jQuery('#cf_mailsendform1').find('input:text, textarea').val('');
	 setTimeout(function(){jQuery('.cfw_succees1').html(''); }, 3000);
	}


});
</script>
<?php if($cfw_alignment=='left'){?>
<style type="text/css">
div.cfw1{
	left: -<?php echo trim($cfw_width+10);?>px; 
	top: <?php echo $cfw_marginTop;?>px; 
	z-index: 10000; 
	height:<?php echo trim($cfw_height+10);?>px;
	-webkit-transition: all .5s ease-in-out;
	-moz-transition: all .5s ease-in-out;
	-o-transition: all .5s ease-in-out;
	transition: all .5s ease-in-out;
	}
div.cfw1.showdiv{
	left:0;
	}	
div.cfw2{
	text-align: left;
	width:<?php echo trim($cfw_width);?>px;
	height:<?php echo trim($cfw_height);?>px;
	}
div.cfw1 .contacticonlink {		
	right: -32px;
    text-align: right;
}
</style>
<div id="cfw_contact_display">
  <div id="cfw1" class="cfw1"><a id="contacticonlinkleft" class="contacticonlink" href="javascript:;"><img class="outer" style="top: 0px;right:-25px;" src="<?php echo plugins_url( 'assets/contact-icon-outer.png', __FILE__ );?>" alt=""></a>
    <div id="cfw2" class="cfw2"><?php echo $print_contact; ?> 
        <div style="font-size: 9px; color: #808080; font-weight: normal; font-family: tahoma,verdana,arial,sans-serif; line-height: 1.28; text-align: right; direction: ltr; padding:10px;"><a href="http://www.forkliftcertification.us/forklift-certification" target="_blank" style="color: #808080;" title="check them out">forklift certification online</a></div>
    </div>
    </div>
</div>
<?php } else { ?>
<style type="text/css">
div.cfw1{
	right: -<?php echo trim($cfw_width+10);?>px;
	top: <?php echo $cfw_marginTop;?>px;
	z-index: 10000; 
	height:<?php echo trim($cfw_height+10);?>px;
	-webkit-transition: all .5s ease-in-out;
	-moz-transition: all .5s ease-in-out;
	-o-transition: all .5s ease-in-out;
	transition: all .5s ease-in-out;
	}
div.cfw1.showdiv{
	right:0;
	}	
div.cfw2{
	text-align: left;
	width:<?php echo trim($cfw_width);?>px;
	height:<?php echo trim($cfw_height);?>px;
	}
div.cfw1 .contacticonlink {		
	left: -32px;
    text-align: left;
}		
</style>
<div id="cfw_contact_display">
  <div id="cfw1" class="cfw1"><a id="contacticonlinkleft" class="contacticonlink" href="javascript:;"><img class="outer" style="top: 0px;right:-25px;" src="<?php echo plugins_url( 'assets/contact-icon-outer.png', __FILE__ );?>" alt=""></a>
    <div id="cfw2" class="cfw2"><?php echo $print_contact; ?>
	  <div style="font-size: 9px; color: #808080; font-weight: normal; font-family: tahoma,verdana,arial,sans-serif; line-height: 1.28; text-align: right; direction: ltr; padding:10px;"><a href="http://www.forkliftcertification.us/forklift-certification" target="_blank" style="color: #808080;" title="check them out">forklift certification online</a></div>
    </div>
    </div>
</div>
<?php } 
}

add_action('wp_ajax_cfw_wpadminajax_mailsend', 'cfw_wpadminajax_mailsend');
add_action('wp_ajax_nopriv_cfw_wpadminajax_mailsend', 'cfw_wpadminajax_mailsend');

function cfw_wpadminajax_mailsend(){
check_ajax_referer('cfw_wpadminajax_mailsend_ajax_nonce');
if (isset($_POST['action']) && $_POST['action'] =="cfw_wpadminajax_mailsend"){
	
$o = get_option('cfw_contact_form_widget_options');
extract($o);

/*contact form code start*/
$myError = '';
$CORRECT_EMAIL = '';
$CORRECT_SUBJECT = ''; 
$CORRECT_MESSAGE = '';

  // check email
  if ($_POST["cf_email"] === "") {
    $myError = '<small style="color:#f00;">No Email</small>';
  }
  elseif (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/", strtolower(sanitize_email($_POST["cf_email"])))) {
    $myError = '<small style="color:#f00;">Invalid Email</small>';
  }
  else {
    $CORRECT_EMAIL = htmlentities(sanitize_email($_POST["cf_email"]), ENT_COMPAT, "UTF-8");
  }
    $CORRECT_SUBJECT = htmlentities(sanitize_text_field($_POST["cf_subject"]), ENT_COMPAT, "UTF-8");
    $CORRECT_MESSAGE = htmlentities(sanitize_text_field($_POST["cf_message"]), ENT_COMPAT, "UTF-8");
  
 if ($myError == '') {
	   
  $mytoemail = sanitize_email($cfw_email);	   
  $mySubject = $CORRECT_SUBJECT;
  $myMessage = 'You received a message from '. $CORRECT_EMAIL ."\n\n". $CORRECT_MESSAGE;
  
  $mailSender = wp_mail( $mytoemail, $mySubject, $myMessage );
  if ($mailSender) {
	echo '<small  style="color:#0f0;">'.$cfw_success_message_settings.'</small>'; 
    }
    else {
	 echo '<small style="color:#f00;">'.$cfw_error_message_settings.'</small>';
	}
  } else{
	  echo $myError;
	  }   
	die();
	}
}

add_action( 'wp_enqueue_scripts', 'register_cfw_contact_widget_styles' );
add_action( 'admin_enqueue_scripts', 'register_cfw_contact_widget_styles' );
 function register_cfw_contact_widget_styles() {
    wp_register_style( 'register_cfw_contact_widget_styles', plugins_url( 'assets/main.css' , __FILE__ ) );
    wp_enqueue_style( 'register_cfw_contact_widget_styles' );
        wp_enqueue_script('jquery');
 }
 $cfw_contact_default_values = array(
 'cfw_name' => 'Let\'s Get Started',
 'cfw_email' => 'user@example.com',
 'cfw_marginTop' => '100',
 'cfw_alignment' => 'left',
 'cfw_width' => '350',
 'cfw_height' => '450',
 'cfw_success_message' => 'Thank you for your message. It has been sent.',
 'cfw_error_message'=>'Mail was not sent. Please try again later.'
 );
add_option('cfw_contact_form_widget_options', $cfw_contact_default_values);

add_shortcode("cfw_contact_form", "cfw_contact_form_shotcode");
function cfw_contact_form_shotcode()
{
	$o = get_option('cfw_contact_form_widget_options');
    extract($o);
	return $print_contact_sotcode .= '<div class="cfw-sec bordr"><h2>'.stripslashes($cfw_name).'</h2>
     <form action="" id="cf_mailsendform1" method="post">
	   <input type="hidden" name="action" value="cfw_wpadminajax_mailsend"/>
	   <input type="hidden" name="_ajax_nonce" value="'.wp_create_nonce( "cfw_wpadminajax_mailsend_ajax_nonce" ).'"/>
       <input type="text" name="cf_email" value="" placeholder="E-Mail" required/>
       <input type="text" name="cf_subject" value="" placeholder="Subject" required/>
       <textarea name="cf_message" placeholder="Message"></textarea>
       <div class="cfw-submit"><input type="submit" value="SUBMIT" /><div class="cf_loadinfo1" style="display:none;"><img src="'.plugins_url( 'assets/ajax-loader.gif', __FILE__ ).'" alt="loading..." /></div></div>
	   <div class="cfw_succees1"></div>
     </form>
	 <div style="font-size: 9px; color: #808080; font-weight: normal; font-family: tahoma,verdana,arial,sans-serif; line-height: 1.28; text-align: right; direction: ltr; padding:10px;"><a href="http://www.forkliftcertification.us/forklift-certification" target="_blank" style="color: #808080;" title="check them out">forklift certification online</a></div>
    </div>';
}
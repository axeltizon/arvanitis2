<?php
function cup_contact_form_code() {
    echo '<form action="' . esc_url( $_SERVER['REQUEST_URI'] ) . '" method="post">';
    echo '<p>';
    echo 'Name <br />';
    echo '<input type="text" name="cup-name" value="' . ( isset( $_POST["cup-name"] ) ? esc_attr( $_POST["cup-name"] ) : '' ) . '" size="40" />';
    echo '</p>';
    echo '<p>';
    echo 'Email <br />';
    echo '<input type="email" name="cup-email" value="' . ( isset( $_POST["cup-email"] ) ? esc_attr( $_POST["cup-email"] ) : '' ) . '" size="40" />';
    echo '</p>';
    echo '<p>';
    echo 'Subject <br />';
    echo '<input type="text" name="cup-subject" value="' . ( isset( $_POST["cup-subject"] ) ? esc_attr( $_POST["cup-subject"] ) : '' ) . '" size="40" />';
    echo '</p>';
    echo '<p>';
    echo 'Message <br />';
    echo '<textarea rows="3" cols="35" name="cup-message">' . ( isset( $_POST["cup-message"] ) ? esc_attr( $_POST["cup-message"] ) : '' ) . '</textarea>';
    echo '</p>';
    echo '<p><input type="submit" name="cup-submitted" value="Send"/></p>';
    echo '</form>';
}

function cup_deliver_mail() {
    if ( isset( $_POST['cup-submitted'] ) ) {

        $name    = sanitize_text_field( $_POST["cup-name"] );
        $email   = sanitize_email( $_POST["cup-email"] );
        $subject = sanitize_text_field( $_POST["cup-subject"] );
        $message = esc_textarea( $_POST["cup-message"] );

        $to = get_option( 'cup_email' );

        $headers = "From: $name <$email>" . "\r\n";

        if ( wp_mail( $to, $subject, $message, $headers ) ) {
            echo '<div>';
            echo '<p>Thanks for contacting us, expect a response soon.</p>';
            echo '</div>';
        } else {
            echo 'An unexpected error occurred';
        }
    }
}
?>
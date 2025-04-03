<?php

/**
 * Plugin Name: Contact Form Plugin
 * Description: A secure custom Contact Form using shortcode
 * Version: 1.0
 * Author: Maheema 
 */

function custom_contact_form() {
    ob_start();
    ?>
    <form method="POST" action="">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="phone">Phone:</label><br>
        <input type="text" id="phone" name="phone"><br><br>
        
        <label for="message">Message:</label><br>
        <textarea name="message" id="message" rows="5" cols="40" required></textarea><br><br>
        
        <input type="submit" name="submit" value="Submit">
    </form> 
    <?php 
    return ob_get_clean();
}
add_shortcode('custom_contact_form', 'custom_contact_form');

function contact_form_submission() {
    if (isset($_POST['submit'])) {
        global $wpdb;
        $table_name = 'contact_form';

        $name = sanitize_text_field($_POST['name']);
		$email = sanitize_email($_POST['email']); // WordPress function to sanitize email

		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
		echo "Valid email address.";
		} else {
		echo "Invalid email address.";
		}
		
        $phone = sanitize_text_field($_POST['phone']);
        $message = sanitize_textarea_field($_POST['message']);

        $inserted = $wpdb->insert(
            $table_name,
            [
                'name'    => $name,
                'email'   => $email,
                'phone'   => $phone,
                'message' => $message
            ],
            ['%s', '%s', '%s', '%s']
        );
        

        echo "<script>alert('Form submitted successfully');</script>";
    }
}

add_action('init', 'contact_form_submission');

?>

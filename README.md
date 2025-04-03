# wordpress-contact-form

This project includes:
1. A **custom WordPress contact form** displayed via a shortcode.
2. **Secure form processing** using PHP & MySQL with validation and sanitization.
3. **JavaScript optimization** to improve site performance by deferring script loading (except `jquery.js`).

---
1. Add the provided PHP code to your theme’s `functions.php` file.
2. Use the `[custom_contact_form]` shortcode to display the form on any page or post.
3. Cleans input with `sanitize_text_field()` and `sanitize_email()`.
4. Uses `filter_var($email, FILTER_VALIDATE_EMAIL)` to check valid email format.

---
For any questions or support, feel free to reach out!


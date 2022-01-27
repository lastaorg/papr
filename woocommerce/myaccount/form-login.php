<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

do_action('woocommerce_before_customer_login_form'); ?>

<?php if (get_option('woocommerce_enable_myaccount_registration') === 'yes') : ?>

    <div class="u-columns row" id="customer_login">

    <div class="u-column1 col-lg-5">
    <div class=" aw-login-form-wrapper">

<?php endif; ?>

<?php
if (get_option('woocommerce_enable_myaccount_registration') !== 'yes') {
    ?>
    <div class="row">
    <div class="col-lg-4 offset-lg-4">
    <?php
} ?>
    <div class="aw-login-form-title">
        <h3 class="aw-page-title"><?php esc_html_e('Login', 'papr'); ?></h3>
        <div class="aw-inline-sticker mt-0">
            <p class="aw-b4"><?php echo apply_filters('scholr_login_subtitle', 'Login if you are a returning customer.'); ?></p>
        </div>
    </div>


    <form class="woocommerce-form woocommerce-form-login login" method="post">

        <?php do_action('woocommerce_login_form_start'); ?>

        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
            <label for="username"><?php esc_html_e('Username or email address', 'papr'); ?>&nbsp;<span class="required">*</span></label>
            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username"
                   id="username" autocomplete="username"
                   value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>"/><?php
            ?>
        </p>
        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
            <label for="password"><?php esc_html_e('Password', 'papr'); ?>&nbsp;<span class="required">*</span></label>
            <input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password"
                   id="password" autocomplete="current-password"/>
        </p>

        <?php do_action('woocommerce_login_form'); ?>

        <p class="form-row login-remember">
            <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme"
                   type="checkbox" id="rememberme" value="forever"/>
            <label class="woocommerce-form__label woocommerce-form__label-for-checkbox inline" for="rememberme">
                <span><?php esc_html_e('Remember me', 'papr'); ?></span>
            </label>
        </p>
        <?php wp_nonce_field('woocommerce-login', 'woocommerce-login-nonce'); ?>
        <button type="submit" class="woocommerce-Button button w-100" name="login"
                value="<?php esc_attr_e('Log in', 'papr'); ?>"><?php esc_html_e('Log in', 'papr'); ?></button>

        <div class="lost_password_wrap">
            <span class="woocommerce-LostPassword lost_password float-right">
                <a class="color-tertiary"
                   href="<?php echo esc_url(wp_lostpassword_url()); ?>"><?php esc_html_e('Lost your password?', 'papr'); ?></a>
            </span>
        </div>


        <?php do_action('woocommerce_login_form_end'); ?>

    </form>


<?php
if (get_option('woocommerce_enable_myaccount_registration') !== 'yes') {
    ?>
    </div>
    </div>
    <?php
} ?>


<?php if (get_option('woocommerce_enable_myaccount_registration') === 'yes') : ?>

    </div>
    </div>

    <div class="u-column2 col-lg-5 offset-lg-2">
        <div class="aw-registration-form-wrapper account-registration">

            <div class="aw-login-form-title">
                <h3 class="aw-page-title"><?php esc_html_e('Register', 'papr'); ?></h3>
                <div class="aw-inline-sticker mt-0">
                    <p class="aw-b4"><?php echo apply_filters('scholr_register_subtitle', 'Register here if you are a new customer.'); ?></p>
                </div>
            </div>

            <form method="post"
                  class="woocommerce-form woocommerce-form-register register" <?php do_action('woocommerce_register_form_tag'); ?>>

                <?php do_action('woocommerce_register_form_start'); ?>

                <?php if ('no' === get_option('woocommerce_registration_generate_username')) : ?>

                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                        <label for="reg_username"><?php esc_html_e('Username', 'papr'); ?>&nbsp;<span
                                    class="required">*</span></label>
                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username"
                               id="reg_username" autocomplete="username"
                               value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>"/><?php
                        ?>
                    </p>

                <?php endif; ?>

                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                    <label for="reg_email"><?php esc_html_e('Email address', 'papr'); ?>&nbsp;<span
                                class="required">*</span></label>
                    <input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email"
                           id="reg_email" autocomplete="email"
                           value="<?php echo (!empty($_POST['email'])) ? esc_attr(wp_unslash($_POST['email'])) : ''; ?>"/><?php
                    ?>
                </p>

                <?php if ('no' === get_option('woocommerce_registration_generate_password')) : ?>

                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                        <label for="reg_password"><?php esc_html_e('Password', 'papr'); ?>&nbsp;<span
                                    class="required">*</span></label>
                        <input type="password" class="woocommerce-Input woocommerce-Input--text input-text"
                               name="password" id="reg_password" autocomplete="new-password"/>
                    </p>

                <?php endif; ?>
                <div class="aw-my-account-reg-msg">
                    <?php do_action('woocommerce_register_form'); ?>
                </div>


                <div class="woocommerce-FormRow">
                    <?php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); ?>
                    <button type="submit" class="woocommerce-Button button w-100" name="register"
                            value="<?php esc_attr_e('Register', 'papr'); ?>"><?php esc_html_e('Register', 'papr'); ?></button>
                </div>

                <?php do_action('woocommerce_register_form_end'); ?>

            </form>

        </div>
    </div>

    </div>
<?php endif; ?>

<?php do_action('woocommerce_after_customer_login_form'); ?>
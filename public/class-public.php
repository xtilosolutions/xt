<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://xplodedthemes.com
 * @since      1.0.0
 *
 * @package    XT_Woo_Quick_View
 * @subpackage XT_Woo_Quick_View/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    XT_Woo_Quick_View
 * @subpackage XT_Woo_Quick_View/public
 * @author     XplodedThemes
 */
class XT_Woo_Quick_View_Public
{

    /**
     * Core class reference.
     *
     * @since    1.0.0
     * @access   private
     * @var      XT_Woo_Quick_View $core Core Class
     */
    private $core;

    public $woovs_exists = false;
    public $woovs_archives_enabled = false;
    public $woovs_single_enabled = false;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @var      XT_Woo_Quick_View $core Core Class
     */
    public function __construct($core)
    {

        $this->core = $core;

        $this->init_ajax();

        add_action( 'init', array( $this, 'init'), 10 );
    }

    // Init
    public function init() {

        if(!$this->enabled()) {
            return;
        }

        // Check if XT Woo variation Swatches exists
        $this->check_woovs_exists();

        add_action('wp_enqueue_scripts', array( $this, 'enqueue_vendors') );
        add_action('wp_enqueue_scripts', array( $this, 'enqueue_styles') );
        add_action('wp_enqueue_scripts', array( $this, 'enqueue_scripts') );
        add_action('wp_enqueue_scripts', array( $this, 'enqueue_theme_fixes') );

        // Add body classes
        add_filter('body_class', array( $this, 'body_class') );

        // Add post classes
        add_filter('post_class', array( $this, 'product_post_class') );

        // Add Quick View Button
        add_filter('woocommerce_loop_add_to_cart_link', array( $this, 'add_quick_view_trigger'), 99, 2);

        // Add Quick View Button Before or Above xt_woovs add to cart
        add_action('xt_woovs_before_add_to_cart_button', array( $this, 'add_quick_view_trigger_before'), 1);

        // Add Quick View Button After or Below xt_woovs add to cart
        add_action('xt_woovs_after_add_to_cart_button', array( $this, 'add_quick_view_trigger_after'), 1);

        // Add Quick View Button Over Product container
        add_action('woocommerce_after_shop_loop_item', array( $this, 'add_quick_view_trigger_over_product'), 1);

        // Add Quick View Button Over Image
        add_action('xtfw_wc_before_product_image', array( $this, 'add_quick_view_trigger_over_image'), 1);

        add_filter('xtfw_wc_product_image_wrapper_classes', array($this, 'product_image_wrapper_classes'));

        // Add More Info Button
        add_action('woocommerce_after_add_to_cart_button', array( $this, 'add_more_info_button'), 15);

        // Render Product Info
        add_action('xt_wooqv_product_info', array($this, 'render_product_info'));

        // Render QuickView
        add_action('wp_footer', array( $this, 'render') );

        // Wrap woocommerce product images
        XT_Framework_Woocommerce::wrap_product_images();

        if($this->core->access_manager()->can_use_premium_code__premium_only()) {

            // Register Shortcode
            $this->register_shortcode__premium_only();
        }

    }

    public function enabled() {

        // skip if within and admin iframe

        if(defined('IFRAME_REQUEST')) {
            return false;
        }

        return true;
    }

    // Init  Ajax
    public function init_ajax() {

        new XT_Woo_Quick_View_Ajax($this->core);
    }

    public function check_woovs_exists()
    {
        $this->woovs_exists = function_exists('xt_woo_variation_swatches');
        $this->woovs_archives_enabled = $this->woovs_exists && xt_woo_variation_swatches()->frontend()->enabled('archives');
        $this->woovs_single_enabled = $this->woovs_exists && xt_woo_variation_swatches()->frontend()->enabled('single');
    }

    public function body_class($classes)
    {

        $prefix = 'xt_wooqv-';

        $modal_mode = xt_wooqv_modal_type();

        $classes[] = $prefix . $modal_mode;

        $bg_color = xt_wooqv_option('modal_box_bg_color', '#ffffff');
        $box_bg_class = xtfw_light_or_dark($bg_color, 'is-light-bg', 'is-dark-bg');

        $classes[] = $prefix . $box_bg_class;

        if ($modal_mode === 'default') {

            $overlay_color = xt_wooqv_option('modal_overlay_color', 'rgba(71,55,78,0.8)');
            $modal_overlay_class = xtfw_light_or_dark($overlay_color, 'is-light-overlay', 'is-dark-overlay');

            $classes[] = $prefix . $modal_overlay_class;

        } else if ($modal_mode === 'fullscreen') {

            $nav_desktop_fullscreen_position = xt_wooqv_option('modal_nav_desktop_fullscreen_position', 'middle');
            $classes[] = $prefix . 'desktop-fullscreen-nav-pos-' . $nav_desktop_fullscreen_position;

        } else if ($modal_mode === 'inline') {

            $nav_desktop_inline_position = xt_wooqv_option('modal_nav_desktop_inline_position', 'middle');
            $classes[] = $prefix . 'desktop-inline-nav-pos-' . $nav_desktop_inline_position;
        }

        $nav_mobile_position = xt_wooqv_option('modal_nav_mobile_position', 'left');
        $classes[] = $prefix . 'mobile-nav-pos-' . $nav_mobile_position;

        $trigger_position = xt_wooqv_option('trigger_position', 'before');
        if (in_array($trigger_position, array('above', 'below'))) {
            $shop_buttons_display = xt_wooqv_option('product_buttons_fullwidth', 'block');
            $classes[] = $prefix . 'button-' . $shop_buttons_display;
        }

        if($this->core->access_manager()->can_use_premium_code__premium_only()) {

            $post = get_post();

            if (!empty($post) && has_shortcode($post->post_content, 'xt_wooqv_trigger')) {
                $classes[] = 'woocommerce';
            }
        }

        return $classes;
    }

    public function product_post_class($classes)
    {

        if (get_post_type() !== 'product') {
            return $classes;
        }

        $position = $this->core->customizer()->get_option('trigger_position', 'before');

        if ($position === 'over-product') {
            $classes[] = 'xt_wooqv-relative';
        }

        $classes[] = 'xt_wooqv-pos-'.$position;

        return $classes;
    }

    /**
     * Register vendors assets for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_vendors()
    {
        global $post;

        wp_enqueue_script('wc-add-to-cart-variation');
        wp_enqueue_script('jquery-blockui');

        // WooCommerce Bundles Assets
        if (!is_single() && class_exists('WC_PB_Display')) {

            WC_PB_Display::instance()->frontend_scripts();

            wp_enqueue_script('wc-add-to-cart-bundle');
            wp_enqueue_style('wc-bundle-css');
            wp_enqueue_style('wc-pb-bs-single');
        }

        // WooCommerce Composites Assets
        if (!is_single() && class_exists('WC_CP_Display')) {

            WC_CP_Display::instance()->frontend_scripts();

            wp_enqueue_script('wc-add-to-cart-composite');
            wp_enqueue_style('wc-composite-single-css');
            wp_enqueue_style('wc-composite-css');
        }

        if (
            class_exists('WC_Product_Addons_Display') &&
            is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'xt_wooqv_trigger' )
        ) {

            wp_enqueue_style('woocommerce-addons-css', WC_PRODUCT_ADDONS_PLUGIN_URL . '/assets/css/frontend.css', array('dashicons'), WC_PRODUCT_ADDONS_VERSION);
            wp_enqueue_script('jquery-tiptip', WC()->plugin_url() . '/assets/js/jquery-tiptip/jquery.tipTip.min.js', array('jquery'), WC_VERSION, true);
        }

        // Load Plugin Vendors
        wp_enqueue_script('jquery-effects-core');
        wp_enqueue_script('xt-velocity', $this->core->plugin_url('public/assets/vendors', 'velocity' . XTFW_SCRIPT_SUFFIX . '.js'), array('jquery'), $this->core->plugin_version(), false);
        wp_enqueue_style('xt-icons');

        if ($this->core->access_manager()->can_use_premium_code__premium_only()) {

            // Light Slider
            wp_enqueue_script('xt-lightslider', $this->core->plugin_url('public/assets/vendors/lightslider/js', 'lightslider' . XTFW_SCRIPT_SUFFIX . '.js'), array('jquery'), $this->core->plugin_version(), false);
            wp_enqueue_style('xt-lightslider', $this->core->plugin_url('public/assets/vendors/lightslider/css', 'lightslider.css'), array(), $this->core->plugin_version(), 'all');

            // Light Gallery
            $lightbox_enabled = $this->core->customizer()->get_option_bool('modal_slider_lightbox_enabled', false);
            if ($lightbox_enabled) {

                $lightbox_advanced = $this->core->customizer()->get_option_bool('modal_slider_lightbox_advanced', false);

                $advanced_script_suffix = $lightbox_advanced ? '-all' : '';

                wp_enqueue_script('xt-lightgallery', $this->core->plugin_url('public/assets/vendors/lightgallery/js', 'lightgallery' . $advanced_script_suffix . XTFW_SCRIPT_SUFFIX . '.js'), array('jquery'), $this->core->plugin_version(), false);
                wp_enqueue_style('xt-lightgallery', $this->core->plugin_url('public/assets/vendors/lightgallery/css', 'lightgallery.css'), array(), $this->core->plugin_version(), 'all');
            }
        }


        if (is_customize_preview()) {
            wp_enqueue_script('xt-jquery-attrchange', $this->core->plugin_url('public/assets/vendors', 'jquery.attrchange' . XTFW_SCRIPT_SUFFIX . '.js'), array('jquery'), $this->core->plugin_version(), false);
        }

    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_styles()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in XT_Woo_Quick_View_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The XT_Woo_Quick_View_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_style($this->core->plugin_slug(), $this->core->plugin_url('public/assets/css', 'frontend.css'), array(), $this->core->plugin_version(), 'all');

        if (is_rtl()) {
            wp_enqueue_style($this->core->plugin_slug('rtl'), $this->core->plugin_url('public/assets/css', 'rtl.css'), array($this->core->plugin_slug()), $this->core->plugin_version(), 'all');
        }
    }

    /**
     * Register the JavaScript for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in XT_Woo_Quick_View_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The XT_Woo_Quick_View_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        $vars = array(
            'wc_ajax_url' => $this->core->wc_ajax()->get_ajax_url(),
            'layouts' => $this->core->customizer()->breakpointsJson(),

            'is_fullscreen' => xt_wooqv_modal_type_is('fullscreen'),
            'is_inline' => xt_wooqv_modal_type_is('inline'),
            'is_redirect' => xt_wooqv_modal_type_is('redirect'),
            'inline_position' => xt_wooqv_option('modal_inline_position', 'none'),
            'animation_type' => xt_wooqv_option('animation_type', 'none'),

            'close_on_added' => xt_wooqv_option_bool('close_modal_on_added', false),
            'modal_nav_enabled' => xt_wooqv_option('modal_nav_enabled', false),

            'slider_lightbox' => xt_wooqv_option_bool('modal_slider_lightbox_enabled', false),
            'slider_items_desktop' => xt_wooqv_option('modal_slider_items_visible_desktop', 1),
            'slider_vertical' => xt_wooqv_option_bool('modal_slider_vertical', false),
            'slider_animation' => xt_wooqv_option('modal_slider_animation', 'slide'),
            'slider_autoplay' => xt_wooqv_option_bool('modal_slider_autoplay', false),
            'slider_gallery' => xt_wooqv_option_bool('modal_slider_thumb_gallery_enabled', false),
            'slider_arrows_enabled' => xt_wooqv_option_bool('modal_slider_arrows_enabled', false),
            'slider_arrow' => xt_wooqv_option('modal_slider_arrow', ''),
            'can_use_premium_code' => $this->core->access_manager()->can_use_premium_code__premium_only()
        );

        wp_register_script(
            $this->core->plugin_slug(),
            $this->core->plugin_url('public/assets/js', 'frontend' . XTFW_SCRIPT_SUFFIX . '.js'),
            array('jquery', 'xt-jquery-touch'),
            $this->core->plugin_version(),
            false
        );

        wp_localize_script($this->core->plugin_slug(), 'XT_WOOQV', $vars);
        wp_enqueue_script($this->core->plugin_slug());
    }

    /**
     * Load frontend Theme Fixes.
     * @access  public
     * @return void
     * @since   1.0.0
     */
    public function enqueue_theme_fixes()
    {

        $theme_name = get_template();

        $theme_fixes = array();

        if (!empty($theme_fixes[$theme_name])) {

            foreach ($theme_fixes[$theme_name] as $type) {

                if ($type == 'css') {

                    wp_register_style($this->core->plugin_slug($theme_name), $this->core->plugin_url('public') . 'assets/theme-fix/css/' . $theme_name . '.css', array($this->core->plugin_slug()), $this->core->plugin_version());
                    wp_enqueue_style($this->core->plugin_slug($theme_name));

                } else {

                    wp_register_script($this->core->plugin_slug($theme_name), $this->core->plugin_url('public') . 'assets/theme-fix/js/' . $theme_name . '.js', array($this->core->plugin_slug()), $this->core->plugin_version(), true);
                    wp_enqueue_script($this->core->plugin_slug($theme_name));
                }

            }

        }

    } // End enqueue_theme_fixes ()


    /**
     * Add quick view button in wc product loop
     *
     * @access public
     * @return $link
     * @since  1.0.0
     */
    public function add_quick_view_trigger($link, $product)
    {

        if ($this->woovs_archives_enabled && $product->is_type('variable')) {

            return $link;
        }

        $product_id = $product->get_id();

        $position = $this->core->customizer()->get_option('trigger_position', 'before');

        if ($position == 'shortcode') {
            $position = 'before';
        }

        if ($position == 'over-image' || $position == 'over-product') {
            return $link;
        }

        $quickViewButton = $this->render_trigger_button($product_id, 'a', false, true);

        if ($position == 'before' || $position == 'above') {

            if (strpos($link, '<a') !== false) {
                $link = str_replace('<a', $quickViewButton . '<a', $link);
            } else {
                $link = $quickViewButton . $link;
            }

        } else {

            if (strpos($link, '</a>') !== false) {
                $link = str_replace('</a>', '</a>' . $quickViewButton, $link);
            } else {
                $link = $link . $quickViewButton;
            }
        }

        return $link;
    }

    /**
     * Add quick view before add to cart
     *
     * @access public
     * @since  1.0.0
     */
    public function add_quick_view_trigger_before()
    {

        $product_id = get_the_ID();

        if (empty($product_id)) {
            return false;
        }

        $position = $this->core->customizer()->get_option('trigger_position', 'before');

        if (!in_array($position, array('before', 'above', 'shortcode'))) {
            return false;
        }

        $this->render_trigger_button($product_id);

    }

    /**
     * Add quick view before add to cart
     *
     * @access public
     * @since  1.0.0
     */
    public function add_quick_view_trigger_after()
    {

        $product_id = get_the_ID();

        if (empty($product_id)) {
            return false;
        }

        $position = $this->core->customizer()->get_option('trigger_position', 'before');

        if (!in_array($position, array('after', 'below'))) {
            return false;
        }

        $this->render_trigger_button($product_id);
    }

    public function add_quick_view_trigger_over_product()
    {

        $product_id = get_the_ID();

        if (empty($product_id)) {
            return false;
        }

        $position = $this->core->customizer()->get_option('trigger_position', 'before');

        if ($position != 'over-product') {
            return false;
        }

        echo '<span class="xt_wooqv-product-overlay"></span>';

        $this->render_trigger_button($product_id, 'span');

    }

    public function add_quick_view_trigger_over_image()
    {

        $product_id = get_the_ID();

        if (empty($product_id)) {
            return false;
        }

        $position = $this->core->customizer()->get_option('trigger_position', 'before');

        if ($position != 'over-image') {
            return false;
        }

        echo '<span class="xt_wooqv-product-overlay"></span>';

        $this->render_trigger_button($product_id, 'span');
    }

    public function product_image_wrapper_classes($classes = array()) {

        $classes[] = 'xt_wooqv-image-wrapper';

        return $classes;
    }

    public function register_shortcode__premium_only()
    {

        add_shortcode('xt_wooqv_trigger', array($this, 'trigger_button_shortcode__premium_only'));
    }

    public function trigger_button_shortcode__premium_only($atts)
    {

        extract(shortcode_atts(array(
            'id' => '',
            'tag' => 'a'
        ), $atts));

	    $id = !empty($id) ? $id : null;
        $tag = !empty($tag) ? $tag : null;

        return $this->render_trigger_button($id, $tag, true, true);
    }

    public function render_trigger_button($product_id, $tag = 'a', $shortcode = false, $return = false)
    {

        $product = null;
        if(!empty($product_id)) {
            $product = wc_get_product($product_id);
            $product_id = !empty($product) ? $product->get_id() : $product_id;
        }

        if(empty($product) || $product->get_status() !== 'publish') {
            return __('No product detected! Please set a product ID.', 'woo-quick-view');
        }

        $loop_index_before = wc_get_loop_prop('loop', 0);

        $variation_id = null;
        if($product->get_type() === 'variable') {
            $default_attributes = $this->default_product_attributes($product);
            $variation_id = $this->find_matching_product_variation($product, $default_attributes);
        }

	    $quickview = $this->get_product_quick_view($product, $variation_id);
        $uniqid = uniqid();

	    if(!empty($_GET['action']) && $_GET['action'] === 'elementor') {
		    $quickview = null;
	    }

        $classes = array(
            'xt_wooqv-trigger',
            'button',
            'alt'
        );

        $extra_classes = explode(' ', $this->core->customizer()->get_option('trigger_classes', ''));

        $classes = array_merge($classes, $extra_classes);

        $visibility = $this->core->customizer()->get_option( 'trigger_visibility', 'show-on-all' );
        $position = $this->core->customizer()->get_option('trigger_position', 'before');
        $icon_type = $this->core->customizer()->get_option('trigger_icon_type', 'font');
        $icon_only = $this->core->customizer()->get_option('trigger_icon_only', '0');

        if (!empty($icon_only) && empty($icon_type)) {
            $icon_only = false;
        }

        $classes[] = 'xt_wooqv-' . esc_attr($position);

        if ($position == 'over-product') {

            $classes[] = 'xt_wooqv-over-image';
        }

        if (!empty($icon_type)) {
            $classes[] = 'xt_wooqv-icontype-' . $icon_type;
        }

        if (!empty($icon_only)) {
            $classes[] = 'xt_wooqv-icon-only';
        }

        if (!empty($shortcode)) {
            $classes[] = 'xt_wooqv-shortcode-trigger';
            if(did_action('woocommerce_shortcode_before_products_loop')) {
                $classes[] = 'xt_wooqv-shortcode-in-loop';
            }
        }

        $classes = apply_filters('xt_wooqv_trigger_classes', $classes, $product_id);
        $classes = implode(' ', $classes);

        $button = '<' . $tag . ' 
		    href="#" 
		    class="' . esc_attr($classes) . '" 
		    data-uniqid="'. esc_attr($uniqid) .'"
		    data-id="' . esc_attr($product_id) . '" 
		    data-variation="' . esc_attr($variation_id) . '" 
		    data-url="' . esc_url(get_permalink($product_id)) . '"
        >';

        if (!empty($icon_type)) {
            $button .= '<span class="' . xt_wooqv_trigger_cart_icon_class() . '"></span>';
        }
        if (empty($icon_only)) {
            $button .= '<span>' . apply_filters('xt_wooqv_trigger_title', __('Quick View', 'woo-quick-view')) . '</span>';
        }

        $button .= '<template id="xt_wooqv-quickview-'.esc_attr($uniqid).'" class="xt_wooqv-template">'.$quickview.'</template>';

        $button .= '</' . $tag . '>';

        if($shortcode) {
            $button = '<span class="product">'.$button.'</span>';
        }

        $button = '<span class="xt_wooqv-'.esc_attr($visibility).'">'.$button.'</span>';

        $button = apply_filters('xt_wooqv_trigger_button', $button, $product_id, $tag, $shortcode);

        $loop_index_after = wc_get_loop_prop('loop', 0);

        if($loop_index_before !== $loop_index_after) {
            wc_set_loop_prop('loop', $loop_index_before);
        }

        if($return) {
            return $button;
        }

        echo ($button);

    }

    public function add_more_info_button()
    {

        $classes = array(
            'xt_wooqv-button',
            'xt_wooqv-more-info',
            'button'
        );

        $classes = apply_filters('xt_wooqv_more_info_button_classes', $classes, get_the_ID());
        $classes = implode(' ', $classes);

        ?>
        <button type="button" class="<?php echo esc_attr($classes); ?>" onclick="location.href='<?php the_permalink(); ?>'"><?php esc_html_e('More info', 'woo-quick-view'); ?></button>
        <?php
    }

    public function get_loop_product($product_id)
    {
        return do_shortcode('[products ids="' . $product_id . '"]');
    }

    /**
     * Render Quick View Content
     */
    public function get_product_quick_view($product, $variation_id = null, $slider_only = false)
    {

        if (!is_object($product)) {
            $product = wc_get_product($product);
        }

        if(!empty($_GET['elementor-preview'])) {
            return null;
        }

        if(empty($product) || $product->get_status() !== 'publish') {
		    return 'No product detected! Please set a product ID.';
	    }

        $is_variable = $product->is_type('variable');
        $is_variation = $product->is_type('variation');

        $wp_query_backup = $GLOBALS['wp_query'];
        $post_type = $is_variation ? 'product_variation' : 'product';

        query_posts('p=' . $product->get_id() . '&post_type='.$post_type);
        the_post();

        // remove product thumbnails gallery
        remove_action('woocommerce_product_thumbnails', 'woocommerce_show_product_thumbnails', 20);

        $params = array(
            'product' => $product
        );

        if(!empty($variation_id)) {
            $params['variation_id'] = $variation_id;
        }

        if (!empty($variation_id) && !empty($slider_only)) {

            $quickview =  $this->core->get_template('parts/product-slider', $params, true);

        } else if (!empty($slider_only)) {

            $quickview =  $this->core->get_template('parts/product-slider', $params, true);

        } else {

            if ($is_variable && $this->woovs_single_enabled && xt_woovs_is_single_product()) {
                remove_action('woocommerce_single_variation', array(xt_woo_variation_swatches()->frontend(), 'loop_variation_add_to_cart_button'), 20);
                add_action('woocommerce_single_variation', 'woocommerce_single_variation_add_to_cart_button', 20);
            }

            $quickview = $this->core->get_template('parts/product', $params, true);

            if ($is_variable && $this->woovs_single_enabled && xt_woovs_is_single_product()) {
                add_action('woocommerce_single_variation', 'woocommerce_single_variation_add_to_cart_button', 20);
                remove_action('woocommerce_single_variation', array(xt_woo_variation_swatches()->frontend(), 'loop_variation_add_to_cart_button'), 20);
            }

        }

        $GLOBALS['wp_query'] = $wp_query_backup;

        return $quickview;

    }

    /**
     * Get variation default attributes
     *
     * @param WC_Product $product
     * @return array
     */

    function default_product_attributes($product)
    {

        if (method_exists($product, 'get_default_attributes')) {

            return $product->get_default_attributes();

        } else {

            return $product->get_variation_default_attributes();
        }
    }

    /**
     * Find matching product variation
     *
     * @param WC_Product $product
     * @param array $attributes
     * @return int Matching variation ID or 0.
     * @throws Exception
     */
    function find_matching_product_variation($product, $attributes)
    {
        foreach ($attributes as $key => $value) {

            if (strpos($key, 'attribute_') === 0) {
                continue;
            }
            unset($attributes[$key]);

            $attributes[sprintf('attribute_%s', $key)] = $value;
        }

        $data_store = WC_Data_Store::load('product');

        return $data_store->find_matching_product_variation($product, $attributes);
    }

    public function render_product_info() {

        global $product;

        $table_variations_installed = function_exists('remove_variable_product_add_to_cart') && function_exists('woo_variations_table_available_options_btn');
        $xt_wooqv_action = !empty($_POST['action']) && ($_POST['action'] == 'xt_wooqv_quick_view');

        if ($table_variations_installed && $xt_wooqv_action) {
            add_action('woocommerce_variable_add_to_cart', 'woocommerce_variable_add_to_cart', 1);
        }

        $productInfoTemplate = xt_wooqv_option( 'product_info_template', array(
            'title',
            'rating',
            'price',
            'excerpt',
            'meta',
            'add_to_cart'
        ));

        foreach ($productInfoTemplate as $template) {

            switch($template) {

                case 'title':
                    woocommerce_template_single_title();
                    break;

                case 'rating':
                    woocommerce_template_single_rating();
                    break;

                case 'price':
                    woocommerce_template_single_price();
                    break;

                case 'excerpt':
                    woocommerce_template_single_excerpt();
                    break;

                case 'meta':
                    woocommerce_template_single_meta();
                    break;

                case 'add_to_cart':
                    woocommerce_template_single_add_to_cart();
                    break;

                case 'additional_info':
                    do_action('woocommerce_product_additional_information', $product);
                    break;

                case 'custom_1':
                    $this->render_custom_info(1, $product);
                    break;

                case 'custom_2':
                    $this->render_custom_info(2, $product);
                    break;

                case 'custom_3':
                    $this->render_custom_info(3, $product);
                    break;
            }
        }

    }

    public function render_custom_info($id, $product) {

        if($this->core->access_manager()->can_use_premium_code__premium_only()) {
            echo '<div class="xt_wooqv-custom-info-"' . intval($id) . '>';
            do_action('xt_wooqv_custom_product_info_' . intval($id), $product);
            echo '</div>';
        }
    }

    public function render()
    {

        if(!$this->enabled()) {
            return;
        }

        $redirect = xt_wooqv_modal_type_is('redirect');

        if (!$redirect) {
            $this->core->get_template('quickview');
        }
    }
}

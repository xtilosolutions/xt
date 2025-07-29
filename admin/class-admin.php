<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://xplodedthemes.com
 * @since      1.0.0
 *
 * @package    XT_Woo_Quick_View
 * @subpackage XT_Woo_Quick_View/admin
 */

class XT_Woo_Quick_View_Admin
{

    /**
     * Core class reference.
     *
     * @since    1.0.0
     * @access   private
     * @var      XT_Woo_Quick_View    core    Core Class
     */
    private $core;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @var      XT_Woo_Quick_View    core    Core Class
     */
    public function __construct($core)
    {

        $this->core = $core;

        // Init modules
        add_filter($this->core->plugin_prefix('modules'), array( $this, 'modules'), 1, 1);

        // Init customizer options
        add_filter($this->core->plugin_prefix('customizer_breakpoints'), array( $this, 'customizer_breakpoints'), 1, 1);
        add_filter($this->core->plugin_prefix('customizer_panels'), array( $this, 'customizer_panels'), 1, 1);
        add_filter($this->core->plugin_prefix('customizer_sections'), array( $this, 'customizer_sections'), 1, 1);
        add_filter($this->core->plugin_prefix('customizer_fields'), array( $this, 'customizer_fields'), 1, 2);
        add_filter( 'xirki_postmessage_script', array( $this, 'custom_postmessage_functions') );

        if($this->core->access_manager()->can_use_premium_code__premium_only()) {
            add_action('elementor/widgets/register', array($this, 'register_elementor_widgets'));
        }
    }

    public function modules($modules) {

        $modules[] = 'add-to-cart';

        return $modules;
    }

    public function customizer_breakpoints( $breakpoints ) {

        $breakpoints['tablet'] = array(
            'min' => 481,
            'max' => 900,
        );

        $breakpoints['desktop'] = array(
            'min' => 901,
            'max' => 1024,
        );

        return $breakpoints;
    }

    public function customizer_panels($panels)
    {

        $panels[] = array(
            'title' => $this->core->plugin_menu_name(),
            'icon' => $this->core->plugin_icon()
        );

        return $panels;
    }

    public function customizer_sections($sections)
    {

        $sections[] = array(
            'id' => 'trigger-settings',
            'title' => esc_html__('Trigger Settings', 'woo-quick-view'),
            'icon' => 'dashicons-share-alt'
        );

        $sections[] = array(
            'id' => 'modal-settings',
            'title' => esc_html__('Modal Settings', 'woo-quick-view'),
            'icon' => 'dashicons-align-center'
        );

        $sections[] = array(
            'id' => 'modal-product-slider',
            'title' => esc_html__('Modal Product Slider', 'woo-quick-view'),
            'icon' => 'dashicons-slides'
        );

        $sections[] = array(
            'id' => 'modal-product-info',
            'title' => esc_html__('Modal Product Info', 'woo-quick-view'),
            'icon' => 'dashicons-info'
        );

        $sections[] = array(
            'id' => 'modal-close-button',
            'title' => esc_html__('Modal Close Button', 'woo-quick-view'),
            'icon' => 'dashicons-dismiss'
        );

        $sections[] = array(
            'id' => 'modal-navigation',
            'title' => esc_html__('Modal Navigation Arrows', 'woo-quick-view'),
            'icon' => 'dashicons-arrow-right-alt2'
        );

        $sections[] = array(
            'id'    => 'api',
            'title' => esc_html__( 'JS API', 'woo-quick-view' ),
            'icon'  => 'dashicons-editor-code'
        );

        return $sections;
    }

    public function customizer_fields($fields, $customizer)
    {
        require $this->core->plugin_path('admin/customizer/fields', 'trigger-settings.php');
        require $this->core->plugin_path('admin/customizer/fields', 'modal-settings.php');
	    require $this->core->plugin_path('admin/customizer/fields', 'modal-product-slider.php');
	    require $this->core->plugin_path('admin/customizer/fields', 'modal-product-info.php');
	    require $this->core->plugin_path('admin/customizer/fields', 'modal-close-button.php');
	    require $this->core->plugin_path('admin/customizer/fields', 'modal-navigation.php');
        require $this->core->plugin_path('admin/customizer/fields', 'api.php');

        return $fields;
    }

    public function register_elementor_widgets($widget_manager) {

        require_once $this->core->plugin_path("admin/elementor", "class-elementor-widget.php");

        $widget_manager->register( new XT_Woo_Quick_View_Elementor_Widget() );

    }

    /**
     * Add a JS function that tweaks the color brightness.
     */

    function custom_postmessage_functions( $script ) {

        $script .= '
        
            function hexToRgb(hex) {
                var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
                return result ? {
                    R: parseInt(result[1], 16),
                    G: parseInt(result[2], 16),
                    B: parseInt(result[3], 16)
                } : null;
            }

            function mobileBottomGradient( value ) {
            
                var rgb = hexToRgb(value);
            
                if(rgb) {
                    return "linear-gradient(rgba("+rgb.R+", "+rgb.G+", "+rgb.B+", 0) 0%, "+value+" 40%)";
                }
                
                return value;
            }
        ';

        return $script;

    }
}

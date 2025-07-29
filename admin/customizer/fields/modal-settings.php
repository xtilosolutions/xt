<?php
/* @var $customizer XT_Framework_Customizer */

$fields[] = array(
    'id' => 'modal_zindex_desktop',
    'section' => 'modal-settings',
    'label' => esc_html__('Modal Z-Index', 'woo-quick-view'),
    'description' => esc_html__('Set the stack order for the cart. An element with greater stack order is always in front of an element with a lower stack order. Use this option to adjust the cart order if for some reason it is not visible on your theme or maybe being overlapped by other elements', 'woo-quick-view'),
    'type' => 'slider',
    'choices' => array(
        'min' => '999',
        'max' => '999999',
        'step' => '9',
    ),
    'priority' => 10,
    'default' => '90000',
    'transport' => 'auto',
    'screen' => 'desktop',
    'output' => array(
        array(
            'element' => '.xt_wooqv-overlay',
            'property' => 'z-index'
        ),
        array(
            'element' => '#xt_wooqv.xt_wooqv-is-visible',
            'value_pattern' => 'calc($ + 100)',
            'property' => 'z-index'
        ),
        array(
            'element' => array(
                '.xt_wooqv-ready .lg-backdrop',
                '.xt_wooqv-ready .lg-outer'
            ),
            'value_pattern' => 'calc($ + 9999)',
            'property' => 'z-index'
        ),
        array(
            'element' => '.xt_wooqv-nav',
            'value_pattern' => 'calc($ + 110)',
            'property' => 'z-index'
        ),
        array(
            'element' => '.xt_wooqv-default .xt_wooqv-nav',
            'value_pattern' => 'calc($ + 1)',
            'property' => 'z-index'
        ),
        array(
            'element' => '.xt_wooqv-active .xt_woofc-fly-to-cart',
            'value_pattern' => 'calc($ + 9999)!important',
            'property' => 'z-index'
        )
    )
);

$fields[] = array(
    'id' => 'modal_zindex_tablet',
    'section' => 'modal-settings',
    'label' => esc_html__('Modal Z-Index', 'woo-quick-view'),
    'description' => esc_html__('Set the stack order for the cart. An element with greater stack order is always in front of an element with a lower stack order. Use this option to adjust the cart order if for some reason it is not visible on your theme or maybe being overlapped by other elements', 'woo-quick-view'),
    'type' => 'slider',
    'choices' => array(
        'min' => '999',
        'max' => '999999',
        'step' => '9',
    ),
    'priority' => 10,
    'default' => '90000',
    'transport' => 'auto',
    'screen' => 'tablet',
    'output' => array(
        array(
            'element' => '.xt_wooqv-overlay',
            'property' => 'z-index'
        ),
        array(
            'element' => '#xt_wooqv.xt_wooqv-is-visible',
            'value_pattern' => 'calc($ + 100)',
            'property' => 'z-index'
        ),
        array(
            'element' => array(
                '.xt_wooqv-ready .lg-backdrop',
                '.xt_wooqv-ready .lg-outer'
            ),
            'value_pattern' => 'calc($ + 9999)',
            'property' => 'z-index'
        ),
        array(
            'element' => '.xt_wooqv-nav',
            'value_pattern' => 'calc($ + 110)',
            'property' => 'z-index'
        ),
        array(
            'element' => '.xt_wooqv-active .xt_woofc-fly-to-cart',
            'value_pattern' => 'calc($ + 9999)!important',
            'property' => 'z-index'
        )
    )
);

$fields[] = array(
    'id' => 'modal_zindex_mobile',
    'section' => 'modal-settings',
    'label' => esc_html__('Modal Z-Index', 'woo-quick-view'),
    'description' => esc_html__('Set the stack order for the cart. An element with greater stack order is always in front of an element with a lower stack order. Use this option to adjust the cart order if for some reason it is not visible on your theme or maybe being overlapped by other elements', 'woo-quick-view'),
    'type' => 'slider',
    'choices' => array(
        'min' => '999',
        'max' => '999999',
        'step' => '9',
    ),
    'priority' => 10,
    'default' => '90000',
    'transport' => 'auto',
    'screen' => 'mobile',
    'output' => array(
        array(
            'element' => '.xt_wooqv-overlay',
            'property' => 'z-index'
        ),
        array(
            'element' => '#xt_wooqv.xt_wooqv-is-visible',
            'value_pattern' => 'calc($ + 100)',
            'property' => 'z-index'
        ),
        array(
            'element' => array(
                '.xt_wooqv-ready .lg-backdrop',
                '.xt_wooqv-ready .lg-outer'
            ),
            'value_pattern' => 'calc($ + 9999)',
            'property' => 'z-index'
        ),
        array(
            'element' => '.xt_wooqv-nav',
            'value_pattern' => 'calc($ + 110)',
            'property' => 'z-index'
        ),
        array(
            'element' => '.xt_wooqv-active .xt_woofc-fly-to-cart',
            'value_pattern' => 'calc($ + 9999)!important',
            'property' => 'z-index'
        )
    )
);

if ($this->core->access_manager()->can_use_premium_code__premium_only()) {

    $fields[] = array(
        'id' => 'close_modal_on_added',
        'section' => 'modal-settings',
        'label' => esc_html__('Close modal when product added to cart', 'woo-quick-view'),
        'type' => 'radio-buttonset',
        'choices' => array(
            '1' => esc_attr__('Yes', 'woo-quick-view'),
            '0' => esc_attr__('No', 'woo-quick-view')
        ),
        'transport' => 'auto',
        'default' => '0',
        'priority' => 10
    );

    $fields[] = array(
        'id' => 'modal_type',
        'section' => 'modal-settings',
        'label' => esc_html__('Modal Type', 'woo-quick-view'),
        'description' => esc_html__('Select the type that works best with your theme. Note that the inline type might not work properly on some themes.', 'woo-quick-view'),
        'type' => 'radio-buttonset',
        'choices' => array(
            'default' => esc_attr__('Default', 'woo-quick-view'),
            'inline' => esc_attr__('Inline', 'woo-quick-view'),
            'fullscreen' => esc_attr__('Full Screen', 'woo-quick-view'),
            'redirect' => esc_attr__('Redirect', 'woo-quick-view')
        ),
        'input_attrs' => array(
            'data-col' => '2'
        ),
        'default' => 'default',
        'priority' => 10
    );

    $fields[] = array(
        'id' => 'modal_inline_position',
        'section' => 'modal-settings',
        'label' => esc_html__('Inline Position', 'woo-quick-view'),
        'type' => 'radio-buttonset',
        'choices' => array(
            'below' => esc_attr__('Below Product Row', 'woo-quick-view'),
            'above' => esc_attr__('Above Product Row', 'woo-quick-view')
        ),
        'default' => 'below',
        'priority' => 10,
        'active_callback' => array(
            array(
                'setting' => 'modal_type',
                'operator' => 'in',
                'value' => array('inline'),
            )
        )
    );

    $fields[] = array(
        'id' => 'animation_type',
        'section' => 'modal-settings',
        'label' => esc_html__('Animation Type', 'woo-quick-view'),
        'type' => 'radio-buttonset',
        'choices' => array(
            'none' => esc_attr__('None', 'woo-quick-view'),
            'fade' => esc_attr__('Fade In', 'woo-quick-view'),
            'slide-top' => esc_attr__('Slide From Top', 'woo-quick-view'),
            'slide-bottom' => esc_attr__('Slide From Bottom', 'woo-quick-view'),
            'slide-left' => esc_attr__('Slide From Left', 'woo-quick-view'),
            'slide-right' => esc_attr__('Slide From Right', 'woo-quick-view'),
        ),
        'input_attrs' => array(
            'data-col' => '2'
        ),
        'default' => 'none',
        'priority' => 10,
        'active_callback' => array(
            array(
                'setting' => 'modal_type',
                'operator' => 'in',
                'value' => array('fullscreen', 'inline'),
            )
        )
    );

    $fields[] = array(
        'id' => 'modal_overlay_color',
        'section' => 'modal-settings',
        'label' => esc_html__('Modal Overlay Color', 'woo-quick-view'),
        'type' => 'color',
        'choices' => array(
            'alpha' => true,
        ),
        'priority' => 10,
        'default' => 'rgba(71,55,78,0.8)',
        'transport' => 'postMessage',
        'output' => array(
            array(
                'element' => 'body .xt_wooqv-overlay',
                'property' => 'background-color',
                'value_pattern' => '$!important'
            )
        ),
        'js_vars' => array(
            array(
                'element' => 'body .xt_wooqv-overlay',
                'property' => 'background-color',
                'value_pattern' => '$!important'
            ),
            array(
                'element' => 'body',
                'function'    => 'dark_light_color_class',
                'prefix'      => 'xt_wooqv-',
                'suffix'      => '-overlay'
            )
        ),
        'active_callback' => array(
            array(
                'setting' => 'modal_type',
                'operator' => 'in',
                'value' => array('default'),
            )
        )
    );

    $fields[] = array(
        'id' => 'modal_box_bg_color',
        'section' => 'modal-settings',
        'label' => esc_html__('Modal Box Background Color', 'woo-quick-view'),
        'type' => 'color',
        'priority' => 10,
        'default' => '#ffffff',
        'transport' => 'postMessage',
        'output' => array(
            array(
                'element' => '#xt_wooqv.xt_wooqv-animate-width',
                'property' => 'background-color',
            ),
            array(
                'element' => '#xt_wooqv',
                'property' => 'background-color',
                'media_query' => $customizer->media_query('tablet', 'max')
            ),
            array(
                'element' => 'body',
                'function'    => 'dark_light_color_class',
                'prefix'      => 'xt_wooqv-',
                'suffix'      => '-bg'
            ),
            array(
                'element' => '#xt_wooqv.xt_wooqv-add-content .xt_wooqv-product:after',
                'property' => 'background',
                'sanitize_callback' => function($value) {

                    $value = xtfw_format_hex($value);
                    $rgb = xtfw_rgb_from_hex($value);

                    return 'linear-gradient(rgba('.$rgb['R'].', '.$rgb['G'].', '.$rgb['B'].', 0) 0%, '.$value.' 40%)';
                },
                'media_query' => $customizer->media_query('tablet', 'max'),
            ),
            array(
                'element' => '#xt_wooqv .xt_wooqv-close-icon',
                'property' => 'background-color',
            ),
        ),
        'js_vars' => array(
            array(
                'element' => '#xt_wooqv.xt_wooqv-animate-width',
                'property' => 'background-color',
            ),
            array(
                'element' => '#xt_wooqv',
                'property' => 'background-color',
                'media_query' => $customizer->media_query('tablet', 'max')
            ),
            array(
                'element' => 'body',
                'function'    => 'dark_light_color_class',
                'prefix'      => 'xt_wooqv-',
                'suffix'      => '-bg'
            ),
            array(
                'element' => '#xt_wooqv.xt_wooqv-add-content .xt_wooqv-product:after',
                'property' => 'background',
                'js_callback' => array( 'mobileBottomGradient'),
                'media_query' => $customizer->media_query('tablet', 'max'),
            ),
            array(
                'element' => '#xt_wooqv .xt_wooqv-close-icon',
                'property' => 'background-color',
            ),

        ),
    );

    $fields[] = array(
        'id' => 'modal_box_shadow_color',
        'section' => 'modal-settings',
        'label' => esc_html__('Modal Box Shadow Color', 'woo-quick-view'),
        'type' => 'color',
        'choices' => array(
            'alpha' => true,
        ),
        'priority' => 10,
        'default' => 'rgba(0,0,0,0.3)',
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => '#xt_wooqv.xt_wooqv-animate-width',
                'property' => 'box-shadow',
                'value_pattern' => '0 0 boxShadowBlurpx boxShadowSpreadpx $',
                'pattern_replace' => array(
                    'boxShadowBlur' => 'modal_box_shadow_blur',
                    'boxShadowSpread'    => 'modal_box_shadow_spread'

                )
            ),
        ),
        'active_callback' => array(
            array(
                'setting' => 'modal_type',
                'operator' => 'in',
                'value' => array('default', 'inline'),
            )
        )
    );

    $fields[] = array(
        'id' => 'modal_box_shadow_blur',
        'section' => 'modal-settings',
        'label' => esc_html__('Modal Box Shadow Blur', 'woo-quick-view'),
        'type' => 'slider',
        'choices' => array(
            'min' => '0',
            'max' => '100',
            'step' => '1',
            'suffix' => 'px'
        ),
        'priority' => 10,
        'default' => '30',
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => '#xt_wooqv.xt_wooqv-animate-width',
                'property' => 'box-shadow',
                'value_pattern' => '0 0 $px boxShadowSpreadpx boxShadowColor',
                'pattern_replace' => array(
                    'boxShadowSpread'    => 'modal_box_shadow_spread',
                    'boxShadowColor' => 'modal_box_shadow_color'
                )
            ),
        ),
        'active_callback' => array(
            array(
                'setting' => 'modal_type',
                'operator' => 'in',
                'value' => array('default', 'inline'),
            )
        )
    );

    $fields[] = array(
        'id' => 'modal_box_shadow_spread',
        'section' => 'modal-settings',
        'label' => esc_html__('Modal Box Shadow Spread', 'woo-quick-view'),
        'type' => 'slider',
        'choices' => array(
            'min' => '0',
            'max' => '100',
            'step' => '1',
            'suffix' => 'px'
        ),
        'priority' => 10,
        'default' => '0',
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => '#xt_wooqv.xt_wooqv-animate-width',
                'property' => 'box-shadow',
                'value_pattern' => '0 0 boxShadowBlurpx $px boxShadowColor',
                'pattern_replace' => array(
                    'boxShadowBlur'    => 'modal_box_shadow_blur',
                    'boxShadowColor' => 'modal_box_shadow_color'
                )
            ),
        ),
        'active_callback' => array(
            array(
                'setting' => 'modal_type',
                'operator' => 'in',
                'value' => array('default', 'inline'),
            )
        )
    );

    $fields[] = array(
        'id' => 'modal_box_radius',
        'section' => 'modal-settings',
        'label' => esc_html__('Modal Box Radius', 'woo-quick-view'),
        'type' => 'slider',
        'choices' => array(
            'min' => '0',
            'max' => '30',
            'step' => '1',
            'suffix' => 'px'
        ),
        'priority' => 10,
        'default' => '0',
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => '#xt_wooqv',
                'property' => 'border-radius',
                'units' => 'px',
            )
        ),
        'active_callback' => array(
            array(
                'setting' => 'modal_type',
                'operator' => 'in',
                'value' => array('default', 'inline'),
            )
        )
    );


} else {

    $fields[] = array(
        'id' => 'box_features',
        'section' => 'modal-settings',
        'type' => 'xt-premium',
        'default' => array(
            'type' => 'image',
            'value' => $this->core->plugin_url() . 'admin/customizer/assets/images/settings.png',
            'link' => $this->core->plugin_upgrade_url()
        )
    );
}
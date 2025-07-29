<?php

if ($this->core->access_manager()->can_use_premium_code__premium_only()) {

    $fields[] = array(
        'id' => 'trigger_position',
        'section' => 'trigger-settings',
        'label' => esc_html__('Quick View Button Position', 'woo-quick-view'),
        'type' => 'radio',
        'choices' => array(
            'before' => esc_html__('Before Add to cart button', 'woo-quick-view'),
            'after' => esc_html__('After add to cart button', 'woo-quick-view'),
            'above' => esc_html__('Above add to cart button', 'woo-quick-view'),
            'below' => esc_html__('Below add to cart button', 'woo-quick-view'),
            'over-product' => esc_html__('Over product container on Hover', 'woo-quick-view'),
            'over-image' => esc_html__('Over product image on Hover', 'woo-quick-view'),
            'shortcode' => esc_html__('Via shortcode only', 'woo-quick-view')
        ),
        'priority' => 10,
        'transport' => 'auto',
        'default' => 'before',
    );

}else{

    $fields[] = array(
        'id' => 'trigger_position',
        'section' => 'trigger-settings',
        'label' => esc_html__('Quick View Button Position', 'woo-quick-view'),
        'type' => 'radio-buttonset',
        'choices' => array(
            'before' => esc_html__('Before Add to cart button', 'woo-quick-view'),
            'after' => esc_html__('After add to cart button', 'woo-quick-view')
        ),
        'priority' => 10,
        'transport' => 'auto',
        'default' => 'before',
    );

}

if ($this->core->access_manager()->can_use_premium_code__premium_only()) {

    $fields[] = array(
        'id' => 'trigger_note',
        'section' => 'trigger-settings',
        'type' => 'custom',
        'label' => esc_html__('Note', 'woo-quick-view'),
        'default' => '<div style="padding: 10px;background-color: #ffffcc;">If this trigger position does not work on your theme, try <strong>Over Product Container</strong> instead</div>',
        'priority' => 10,
        'active_callback' => array(
            array(
                'setting' => 'trigger_position',
                'operator' => 'in',
                'value' => array('over-image', 'over-product'),
            )
        )
    );

    $fields[] = array(
        'id' => 'trigger_shortcode',
        'section' => 'trigger-settings',
        'type' => 'custom',
        'label' => esc_html__('Trigger via shortcode', 'woo-quick-view'),
        'default' => '<div style="padding: 10px;background-color: #ffffcc;">' . esc_html__('[xt_wooqv_trigger id="PRODUCT_ID"]', 'woo-quick-view') . '</div>',
        'priority' => 10
    );

    $fields[] = array(
        'id' => 'trigger_classes',
        'section' => 'trigger-settings',
        'type' => 'text',
        'label' => esc_html__('Trigger Extra Classes', 'woo-quick-view'),
        'default' => '',
        'priority' => 10,
        'transport' => 'postMessage',
        'js_vars' => array(
            array(
                'element' => '.xt_wooqv-trigger',
                'function' => 'class'
            )
        ),
    );

    $fields[] = array(
        'id'       => 'trigger_visibility',
        'section' => 'trigger-settings',
        'label'    => esc_html__( 'Trigger Device Visibility', 'woo-quick-view' ),
        'type'     => 'radio',
        'choices'  => array(
            'show-on-mobile-only'    => esc_attr__( 'Show on mobile only', 'woo-quick-view' ),
            'show-on-tablet-mobile'  => esc_attr__( 'Show on tablet and mobile', 'woo-quick-view' ),
            'show-on-tablet-desktop' => esc_attr__( 'Show on tablet and desktop', 'woo-quick-view' ),
            'show-on-desktop-only'   => esc_attr__( 'Show on desktop only', 'woo-quick-view' ),
            'show-on-all'            => esc_attr__( 'Show on all', 'woo-quick-view' ),
        ),
        'default'  => 'show-on-all',
        'priority' => 10
    );

    $fields[] = array(
        'id' => 'trigger_radius',
        'section' => 'trigger-settings',
        'label' => esc_html__('Quick View Button Radius', 'woo-quick-view'),
        'type' => 'slider',
        'choices' => array(
            'min' => '0',
            'max' => '300',
            'step' => '1',
            'suffix' => 'px'
        ),
        'priority' => 10,
        'default' => '20',
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => '.xt_wooqv-trigger:not(.xt_wooqv-shortcode-trigger).xt_wooqv-over-image',
                'property' => 'border-radius',
                'value_pattern' => '$px!important'
            )
        ),
        'active_callback' => array(
            array(
                'setting' => 'trigger_position',
                'operator' => 'in',
                'value' => array('over-image', 'over-product'),
            )
        )
    );

    $fields[] = array(
        'id' => 'trigger_overlay_color',
        'section' => 'trigger-settings',
        'label' => esc_html__('Overlay color behind the trigger', 'woo-quick-view'),
        'type' => 'color',
        'choices' => array(
            'alpha' => true,
        ),
        'priority' => 10,
        'default' => 'rgba(10,10,10,0.2)',
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => '.xt_wooqv-product-overlay',
                'property' => 'background-color',
                'value_pattern' => '$!important'
            )
        ),
        'active_callback' => array(
            array(
                'setting' => 'trigger_position',
                'operator' => 'in',
                'value' => array('over-image', 'over-product'),
            )
        )
    );


    $fields[] = array(
        'id' => 'trigger_bg_color',
        'section' => 'trigger-settings',
        'label' => esc_html__('Quick View Button Bg Color', 'woo-quick-view'),
        'type' => 'color',
        'choices' => array(
            'alpha' => true,
        ),
        'priority' => 10,
        'default' => '#a46497',
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => '.xt_wooqv-trigger',
                'property' => 'background-color',
                'value_pattern' => '$!important'
            )
        )
    );

    $fields[] = array(
        'id' => 'trigger_text_color',
        'section' => 'trigger-settings',
        'label' => esc_html__('Quick View Button Text Color', 'woo-quick-view'),
        'type' => 'color',
        'choices' => array(
            'alpha' => true,
        ),
        'priority' => 10,
        'default' => '#ffffff',
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => '.xt_wooqv-trigger',
                'property' => 'color',
                'value_pattern' => '$!important'
            )
        )
    );

    $fields[] = array(
        'id' => 'trigger_hover_bg_color',
        'section' => 'trigger-settings',
        'label' => esc_html__('Quick View Button Hover Bg Color', 'woo-quick-view'),
        'type' => 'color',
        'choices' => array(
            'alpha' => true,
        ),
        'priority' => 10,
        'default' => '#935386',
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => array('.xtfw-no-touchevents .xt_wooqv-trigger:hover, .xtfw-no-touchevents .products .product .xt_wooqv-trigger:not(.xt_wooqv-shortcode-trigger).xt_wooqv-over-image:hover', '.xtfw-touchevents .xt_wooqv-trigger:focus'),
                'property' => 'background',
                'value_pattern' => '$!important'
            )
        )
    );

    $fields[] = array(
        'id' => 'trigger_hover_text_color',
        'section' => 'trigger-settings',
        'label' => esc_html__('Quick View Button Hover Text Color', 'woo-quick-view'),
        'type' => 'color',
        'choices' => array(
            'alpha' => true,
        ),
        'priority' => 10,
        'default' => '#ffffff',
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => array('.xtfw-no-touchevents .xt_wooqv-trigger:hover', '.xtfw-touchevents .xt_wooqv-trigger:focus'),
                'property' => 'color',
                'value_pattern' => '$!important'
            )
        )
    );

    $fields[] = array(
        'id' => 'product_buttons_fullwidth',
        'section' => 'trigger-settings',
        'label' => esc_html__('Full Width Product Buttons?', 'woo-quick-view'),
        'description' => esc_html__('This will affect the "Add To Cart", "Quick View" and any other button within the product container.', 'woo-quick-view'),
        'type' => 'radio-buttonset',
        'choices' => array(
            'block' => esc_attr__('No', 'woo-quick-view'),
            'fullwidth' => esc_attr__('Yes', 'woo-quick-view')
        ),
        'default' => 'xt_wooqv-button-block',
        'priority' => 10,
        'transport' => 'postMessage',
        'js_vars' => array(
            array(
                'element' => 'body',
                'function' => 'class',
                'prefix' => 'xt_wooqv-button-'
            )
        ),
        'active_callback' => array(
            array(
                'setting' => 'trigger_position',
                'operator' => 'in',
                'value' => array('above', 'below'),
            )
        )
    );

    $fields[] = array(
        'id' => 'product_buttons_alignment',
        'section' => 'trigger-settings',
        'label' => esc_html__('Product Buttons Alignment', 'woo-quick-view'),
        'description' => esc_html__('This will affect the "Add To Cart", "Quick View" and any other button within the product container.', 'woo-quick-view'),
        'type' => 'radio-buttonset',
        'choices' => array(
            'left' => esc_attr__('Left', 'woo-quick-view'),
            'center' => esc_attr__('Center', 'woo-quick-view'),
            'right' => esc_attr__('Right', 'woo-quick-view')
        ),
        'default' => 'left',
        'priority' => 10,
        'transport' => 'auto',
        'output' => array(
            array(
                'element'     => array('.products .product .button'),
                'property' => 'text-align',
                'value_pattern' => '$!important'
            )
        ),
        'active_callback' => array(
            array(
                'setting' => 'trigger_position',
                'operator' => 'in',
                'value' => array('above', 'below'),
            ),
            array(
                'setting' => 'product_buttons_fullwidth',
                'operator' => '==',
                'value' => 'fullwidth',
            )
        )
    );

    $fields[] = array(
        'id' => 'trigger_icon_type',
        'section' => 'trigger-settings',
        'label' => esc_html__('Quick View Button Icon Type', 'woo-quick-view'),
        'type' => 'radio-buttonset',
        'choices' => array(
            '' => esc_attr__('No Icon', 'woo-quick-view'),
            'font' => esc_attr__('Font Icon', 'woo-quick-view'),
            'image' => esc_attr__('Image / SVG', 'woo-quick-view')
        ),
        'default' => 'font',
        'priority' => 10
    );

    $fields[] = array(
        'id' => 'trigger_icon_font',
        'section' => 'trigger-settings',
        'label' => esc_html__('Quick View Button Icon', 'woo-quick-view'),
        'type' => 'xticons',
        'choices' => array('types' => array('trigger')),
        'priority' => 10,
        'default' => 'xt_wooqvicon-eye-close-up',
        'transport' => 'postMessage',
        'js_vars' => array(
            array(
                'element' => '.xt_wooqv-trigger-icon',
                'function' => 'class'
            )
        ),
        'active_callback' => array(
            array(
                'setting' => 'trigger_icon_type',
                'operator' => '==',
                'value' => 'font',
            ),
        )
    );


    $fields[] = array(
        'id' => 'trigger_icon_image',
        'section' => 'trigger-settings',
        'label' => esc_html__('Quick View Button Icon Image', 'woo-quick-view'),
        'type' => 'image',
        'default' => '',
        'priority' => 10,
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => '.xt_wooqv-trigger-icon::before',
                'property' => 'background-image',
            )
        ),
        'active_callback' => array(
            array(
                'setting' => 'trigger_icon_type',
                'operator' => '==',
                'value' => 'image',
            ),
        )
    );

    $fields[] = array(
        'id' => 'trigger_icon_only',
        'section' => 'trigger-settings',
        'label' => esc_html__('Quick View Button Show Icon Only', 'woo-quick-view'),
        'type' => 'radio-buttonset',
        'choices' => array(
            '1' => esc_attr__('Yes', 'woo-quick-view'),
            '0' => esc_attr__('No', 'woo-quick-view')
        ),
        'default' => '0',
        'priority' => 10,
        'active_callback' => array(
            array(
                'setting' => 'trigger_icon_type',
                'operator' => 'in',
                'value' => array('font', 'image'),
            ),
        )
    );


    $fields[] = array(
        'id' => 'trigger_icon_size',
        'section' => 'trigger-settings',
        'label' => esc_html__('Quick View Button Icon Size', 'woo-quick-view'),
        'type' => 'slider',
        'choices' => array(
            'min' => '12',
            'max' => '150',
            'step' => '1',
            'suffix' => 'px'
        ),
        'default' => '16',
        'priority' => 10,
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => array('.xt_wooqv-trigger.xt_wooqv-icontype-font .xt_wooqv-trigger-icon'),
                'property' => 'font-size',
                'value_pattern' => '$px'
            ),
            array(
                'element' => array('.xt_wooqv-trigger.xt_wooqv-icontype-image .xt_wooqv-trigger-icon'),
                'property' => 'width',
                'value_pattern' => '$px'
            ),
            array(
                'element' => array('.xt_wooqv-trigger.xt_wooqv-icontype-image .xt_wooqv-trigger-icon'),
                'property' => 'height',
                'value_pattern' => '$px'
            )
        ),
        'active_callback' => array(
            array(
                'setting' => 'trigger_icon_type',
                'operator' => 'in',
                'value' => array('font', 'image'),
            ),
            array(
                'setting' => 'trigger_icon_only',
                'operator' => '==',
                'value' => '1',
            )
        )
    );


    $fields[] = array(
        'id' => 'trigger_padding',
        'section' => 'trigger-settings',
        'label' => esc_html__('Override Quick View Button Padding', 'woo-quick-view'),
        'type' => 'dimensions',
        'default'     => array(
            'padding-top'    => '',
            'padding-bottom' => '',
            'padding-left'   => '',
            'padding-right'  => '',
        ),
        'choices'     => [
            'labels' => [
                'padding-top'  => esc_html__( 'Padding Top', 'woo-quick-view' ),
                'padding-bottom'  => esc_html__( 'Padding Bottom', 'woo-quick-view' ),
                'padding-left' => esc_html__( 'Padding Left', 'woo-quick-view' ),
                'padding-right' => esc_html__( 'Padding Right', 'woo-quick-view' ),
            ],
        ],
        'priority' => 10,
        'transport' => 'auto',
        'output' => array(
            array(
                'choice'      => 'padding-top',
                'element'     => array(
                    '.xt_wooqv-trigger:not(.xt_wooqv-shortcode-trigger)',
                    '.woocommerce a.button.xt_wooqv-trigger:not(.xt_wooqv-shortcode-trigger)'
                ),
                'property'    => 'padding-top'
            ),
            array(
                'choice'      => 'padding-bottom',
                'element'     => array(
                    '.xt_wooqv-trigger:not(.xt_wooqv-shortcode-trigger)',
                    '.woocommerce a.button.xt_wooqv-trigger:not(.xt_wooqv-shortcode-trigger)'
                ),
                'property'    => 'padding-bottom'
            ),
            array(
                'choice'      => 'padding-left',
                'element'     => array(
                    '.xt_wooqv-trigger:not(.xt_wooqv-shortcode-trigger)',
                    '.woocommerce a.button.xt_wooqv-trigger:not(.xt_wooqv-shortcode-trigger)'
                ),
                'property'    => 'padding-left'
            ),
            array(
                'choice'      => 'padding-right',
                'element'     => array(
                    '.xt_wooqv-trigger:not(.xt_wooqv-shortcode-trigger)',
                    '.woocommerce a.button.xt_wooqv-trigger:not(.xt_wooqv-shortcode-trigger)'
                ),
                'property'    => 'padding-right'
            ),
        )
    );

    $fields[] = array(
        'id' => 'add_to_cart_padding',
        'section' => 'trigger-settings',
        'label' => esc_html__('Override Add To Cart Button Padding', 'woo-quick-view'),
        'type' => 'dimensions',
        'default'     => array(
            'padding-top'    => '',
            'padding-bottom' => '',
            'padding-left'   => '',
            'padding-right'  => '',
        ),
        'choices'     => [
            'labels' => [
                'padding-top'  => esc_html__( 'Padding Top', 'woo-quick-view' ),
                'padding-bottom'  => esc_html__( 'Padding Bottom', 'woo-quick-view' ),
                'padding-left' => esc_html__( 'Padding Left', 'woo-quick-view' ),
                'padding-right' => esc_html__( 'Padding Right', 'woo-quick-view' ),
            ],
        ],
        'priority' => 10,
        'transport' => 'auto',
        'output' => array(
            array(
                'choice'      => 'padding-top',
                'element'     => array('.products .product .add_to_cart_button', '.products .product .single_add_to_cart_button'),
                'property'    => 'padding-top'
            ),
            array(
                'choice'      => 'padding-bottom',
                'element'     => array('.products .product .add_to_cart_button', '.products .product .single_add_to_cart_button'),
                'property'    => 'padding-bottom'
            ),
            array(
                'choice'      => 'padding-left',
                'element'     => array('.products .product .add_to_cart_button', '.products .product .single_add_to_cart_button'),
                'property'    => 'padding-left'
            ),
            array(
                'choice'      => 'padding-right',
                'element'     => array('.products .product .add_to_cart_button', '.products .product .single_add_to_cart_button'),
                'property'    => 'padding-right'
            )
        )
    );

    $fields[] = array(
        'id' => 'other_product_buttons_padding',
        'section' => 'trigger-settings',
        'label' => esc_html__('Other Product Buttons Padding', 'woo-quick-view'),
        'description' => esc_html__('This will affect any button within the product container other than the "Add To Cart" and "Quick View" buttons', 'woo-quick-view'),
        'type' => 'dimensions',
        'default'     => array(
            'padding-top'    => '',
            'padding-bottom' => '',
            'padding-left'   => '',
            'padding-right'  => '',
        ),
        'choices'     => [
            'labels' => [
                'padding-top'  => esc_html__( 'Padding Top', 'woo-quick-view' ),
                'padding-bottom'  => esc_html__( 'Padding Bottom', 'woo-quick-view' ),
                'padding-left' => esc_html__( 'Padding Left', 'woo-quick-view' ),
                'padding-right' => esc_html__( 'Padding Right', 'woo-quick-view' ),
            ],
        ],
        'priority' => 10,
        'transport' => 'auto',
        'output' => array(
            array(
                'choice'      => 'padding-top',
                'element'     => array('.products .product .button:not(.add_to_cart_button):not(.single_add_to_cart_button):not(.xt_wooqv-trigger)'),
                'property'    => 'padding-top',
                'suffix'      => '!important'
            ),
            array(
                'choice'      => 'padding-bottom',
                'element'     => array('.products .product .button:not(.add_to_cart_button):not(.single_add_to_cart_button):not(.xt_wooqv-trigger)'),
                'property'    => 'padding-bottom',
                'suffix'      => '!important'
            ),
            array(
                'choice'      => 'padding-left',
                'element'     => array('.products .product .button:not(.add_to_cart_button):not(.single_add_to_cart_button):not(.xt_wooqv-trigger)'),
                'property'    => 'padding-left',
                'suffix'      => '!important'
            ),
            array(
                'choice'      => 'padding-right',
                'element'     => array('.products .product .button:not(.add_to_cart_button):not(.single_add_to_cart_button):not(.xt_wooqv-trigger)'),
                'property'    => 'padding-right',
                'suffix'      => '!important'
            ),
        )
    );

} else {

    $fields[] = array(
        'id' => 'trigger_features',
        'section' => 'trigger-settings',
        'type' => 'xt-premium',
        'default' => array(
            'type' => 'image',
            'value' => $this->core->plugin_url() . 'admin/customizer/assets/images/trigger.png',
            'link' => $this->core->plugin_upgrade_url()
        )
    );
}
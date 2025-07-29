<?php
/* @var $customizer XT_Framework_Customizer */

$default_font = 'Open Sans';

$fields[] = array(
    'id' => 'product_info_padding',
    'section' => 'modal-product-info',
    'label' => esc_attr__('Product Info Container Padding ', 'woo-quick-view'),
    'type' => 'slider',
    'choices' => array(
        'min' => '10',
        'max' => '40',
        'step' => '1',
        'suffix' => 'px'
    ),
    'default' => '30',
    'priority' => 10,
    'transport' => 'auto',
    'output' => array(
        array(
            'element' => '#xt_wooqv .xt_wooqv-item-info .xt_wooqv-item-info-inner',
            'property' => 'padding',
            'value_pattern' => '$px'
        ),
        array(
            'element' => '#xt_wooqv .xt_wooqv-item-info .xt_wooqv-item-info-inner',
            'media_query' => $customizer->media_query('desktop', 'min'),
            'property' => 'padding',
            'value_pattern' => 'calc($px * 1.25)'
        ),
        array(
            'element' => '#xt_wooqv .xt_wooqv-item-info .xt_wooqv-item-info-inner',
            'media_query' => $customizer->media_query('tablet', 'max'),
            'property' => 'padding-bottom',
            'value_pattern' => 'calc($px + 75px)'
        ),
        array(
            'element' => '.xt_wooqv-mobile-bar-visible #xt_wooqv .xt_wooqv-item-info .xt_wooqv-item-info-inner',
            'media_query' => $customizer->media_query('tablet', 'max'),
            'property' => 'padding-bottom',
            'value_pattern' => 'calc($px + 75px + 114px)'
        )
    )
);

if ($this->core->access_manager()->can_use_premium_code__premium_only()) {

    $fields[] = array(
        'id'      => 'product_info_template',
        'section' => 'modal-product-info',
        'label' => esc_attr__('Product Info Template', 'woo-quick-view'),
        'type'      => 'sortable',
        'choices'     => array(
            'title' => esc_html__( 'Title', 'woo-quick-view' ),
            'rating' => esc_html__( 'Rating', 'woo-quick-view' ),
            'price' => esc_html__( 'Price', 'woo-quick-view' ),
            'excerpt' => esc_html__( 'Excerpt', 'woo-quick-view' ),
            'meta' => esc_html__( 'Metas', 'woo-quick-view' ),
            'additional_info' => esc_html__( 'Additional Info', 'woo-quick-view' ),
            'custom_1' => esc_html__( 'Custom Info 1', 'woo-quick-view' ),
            'custom_2' => esc_html__( 'Custom Info 2', 'woo-quick-view' ),
            'custom_3' => esc_html__( 'Custom Info 3', 'woo-quick-view' ),
            'add_to_cart' => esc_html__( 'Add To Cart', 'woo-quick-view' ),
        ),
        'default' => array(
            'title',
            'rating',
            'price',
            'excerpt',
            'meta',
            'add_to_cart'
        ),
        'priority'  => 10
    );

    $fields[] = array(
        'id'      => 'product_info_custom_1',
        'section' => 'modal-product-info',
        'label' => esc_html__('Custom Info 1 - Action Hook', 'woo-quick-view'),
        'default' => '<div style="padding: 10px;background-color: #ffffcc; margin-bottom:5px;"><strong>xt_wooqv_custom_product_info_1</strong></div><a target="_blank" href="http://docs.xplodedthemes.com/article/166-how-to-add-custom-content-within-the-quick-view">Documentation</a>',
        'type' => 'custom',
        'priority' => 10,
        'active_callback' => array(
            array(
                'setting' => 'product_info_template',
                'operator' => 'in',
                'value' => array('custom_1'),
            )
        ),
    );

    $fields[] = array(
        'id'      => 'product_info_custom_2',
        'section' => 'modal-product-info',
        'label' => esc_html__('Custom Info 2 - Action Hook', 'woo-quick-view'),
        'default' => '<div style="padding: 10px;background-color: #ffffcc; margin-bottom:5px;"><strong>xt_wooqv_custom_product_info_2</strong></div><a target="_blank" href="http://docs.xplodedthemes.com/article/166-how-to-add-custom-content-within-the-quick-view">Documentation</a>',
        'type' => 'custom',
        'priority' => 10,
        'active_callback' => array(
            array(
                'setting' => 'product_info_template',
                'operator' => 'in',
                'value' => array('custom_2'),
            )
        )
    );

    $fields[] = array(
        'id'      => 'product_info_custom_3',
        'section' => 'modal-product-info',
        'label' => esc_html__('Custom Info 3 - Action Hook', 'woo-quick-view'),
        'default' => '<div style="padding: 10px;background-color: #ffffcc; margin-bottom:5px;"><strong>xt_wooqv_custom_product_info_3</strong></div><a target="_blank" href="http://docs.xplodedthemes.com/article/166-how-to-add-custom-content-within-the-quick-view">Documentation</a>',
        'type' => 'custom',
        'priority' => 10,
        'active_callback' => array(
            array(
                'setting' => 'product_info_template',
                'operator' => 'in',
                'value' => array('custom_3'),
            )
        )
    );

}

$fields[] = array(
    'id' => 'typo_product_title',
    'section' => 'modal-product-info',
    'label' => esc_attr__('Product Title Typography', 'woo-quick-view'),
    'type' => 'typography',
    'default' => array(
        'font-family' => $default_font,
        'variant' => '700',
        'font-size' => '26px',
        'letter-spacing' => '0',
        'subsets' => array('latin-ext'),
        'text-transform' => 'capitalize',
        'color' => ''
    ),
    'priority' => 10,
    'transport' => 'auto',
    'output' => array(

        array(
            'element' => '#xt_wooqv .xt_wooqv-item-info .product_title',
        ),
        array(
            'element' => '#xt_wooqv .xt_wooqv-item-info .product_title',
            'media_query' => $customizer->media_query('mobile', 'max'),
            'property' => 'font-size',
            'choice' => 'font-size',
            'value_pattern' => 'calc($ * 0.75)',
        ),
    )
);

$fields[] = array(
    'id' => 'product_title_margin_bottom',
    'section' => 'modal-product-info',
    'label' => esc_attr__('Product Title Bottom Margin ', 'woo-quick-view'),
    'type' => 'slider',
    'choices' => array(
        'min' => '0',
        'max' => '50',
        'step' => '1',
        'suffix' => 'px'
    ),
    'default' => '10',
    'priority' => 10,
    'transport' => 'auto',
    'output' => array(
        array(
            'element' => '#xt_wooqv .xt_wooqv-item-info .product_title',
            'property' => 'margin-bottom',
            'value_pattern' => '$px!important'
        )

    )
);

if ($this->core->access_manager()->can_use_premium_code__premium_only()) {

    $fields[] = array(
        'id' => 'product_rating_stars_size',
        'section' => 'modal-product-info',
        'label' => esc_attr__('Product Rating Stars Size', 'woo-quick-view'),
        'type' => 'slider',
        'choices' => array(
            'min' => '12',
            'max' => '40',
            'step' => '1',
            'suffix' => 'px'
        ),
        'priority' => 10,
        'default' => '14',
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => '#xt_wooqv .xt_wooqv-item-info .woocommerce-product-rating .star-rating',
                'property' => 'font-size',
                'value_pattern' => '$px'
            )
        )
    );

    $fields[] = array(
        'id' => 'product_rating_margin_top',
        'section' => 'modal-product-info',
        'label' => esc_attr__('Product Rating Top Margin ', 'woo-quick-view'),
        'type' => 'slider',
        'choices' => array(
            'min' => '-50',
            'max' => '50',
            'step' => '1',
            'suffix' => 'px'
        ),
        'default' => '-10',
        'priority' => 10,
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => '#xt_wooqv .xt_wooqv-item-info .woocommerce-product-rating',
                'property' => 'margin-top',
                'value_pattern' => '$px!important'
            ),
        )
    );

    $fields[] = array(
        'id' => 'product_rating_margin_bottom',
        'section' => 'modal-product-info',
        'label' => esc_attr__('Product Rating Bottom Margin ', 'woo-quick-view'),
        'type' => 'slider',
        'choices' => array(
            'min' => '0',
            'max' => '50',
            'step' => '1',
            'suffix' => 'px'
        ),
        'default' => '20',
        'priority' => 10,
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => '#xt_wooqv .xt_wooqv-item-info .woocommerce-product-rating',
                'property' => 'margin-bottom',
                'value_pattern' => '$px!important'
            ),
        )
    );

    $fields[] = array(
        'id' => 'product_rating_stars_color',
        'section' => 'modal-product-info',
        'label' => esc_attr__('Product Rating Stars Color', 'woo-quick-view'),
        'type' => 'color',
        'priority' => 10,
        'default' => '',
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => '#xt_wooqv .xt_wooqv-item-info .woocommerce-product-rating .star-rating ::before',
                'property' => 'color',
            )
        )
    );

    $fields[] = array(
        'id' => 'typo_product_price',
        'section' => 'modal-product-info',
        'label' => esc_attr__('Product Price Typography', 'woo-quick-view'),
        'type' => 'typography',
        'default' => array(

            'font-family' => $default_font,
            'variant' => '400',
            'font-size' => '18px',
            'letter-spacing' => '0',
            'subsets' => array('latin-ext'),
            'text-transform' => 'none',
            'color' => ''
        ),
        'priority' => 10,
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => array('#xt_wooqv .xt_wooqv-item-info p.price', '#xt_wooqv .xt_wooqv-item-info span.price')
            ),
            array(
                'element' => array('#xt_wooqv .xt_wooqv-item-info p.price', '#xt_wooqv .xt_wooqv-item-info span.price'),
                'media_query' => $customizer->media_query('mobile', 'max'),
                'property' => 'font-size',
                'choice' => 'font-size',
                'value_pattern' => 'calc($ * 0.85)',
            ),
        )
    );

    $fields[] = array(
        'id' => 'typo_product_disabled_price',
        'section' => 'modal-product-info',
        'label' => esc_attr__('Product Old Price Typography', 'woo-quick-view'),
        'type' => 'typography',
        'default' => array(

            'font-family' => $default_font,
            'variant' => '400',
            'font-size' => '18px',
            'letter-spacing' => '0',
            'subsets' => array('latin-ext'),
            'text-transform' => 'none',
            'color' => ''
        ),
        'priority' => 10,
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => array('#xt_wooqv .xt_wooqv-item-info p.price del', '#xt_wooqv .xt_wooqv-item-info span.price del'),
            ),
            array(
                'element' => array('#xt_wooqv .xt_wooqv-item-info p.price del', '#xt_wooqv .xt_wooqv-item-info span.price del'),
                'media_query' => $customizer->media_query('mobile', 'max'),
                'property' => 'font-size',
                'choice' => 'font-size',
                'value_pattern' => 'calc($ * 0.85)',
            ),
        )
    );

    $fields[] = array(
        'id' => 'product_price_margin_bottom',
        'section' => 'modal-product-info',
        'label' => esc_attr__('Product Price Bottom Margin ', 'woo-quick-view'),
        'type' => 'slider',
        'choices' => array(
            'min' => '0',
            'max' => '50',
            'step' => '1',
            'suffix' => 'px'
        ),
        'default' => '15',
        'priority' => 10,
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => array('#xt_wooqv .xt_wooqv-item-info p.price', '#xt_wooqv .xt_wooqv-item-info span.price'),
                'property' => 'margin-bottom',
                'value_pattern' => '$px!important'
            )
        )
    );

    $fields[] = array(
        'id' => 'typo_product_description',
        'section' => 'modal-product-info',
        'label' => esc_attr__('Product Description Typography', 'woo-quick-view'),
        'type' => 'typography',
        'default' => array(

            'font-family' => $default_font,
            'variant' => '400',
            'font-size' => '14px',
            'letter-spacing' => '0',
            'subsets' => array('latin-ext'),
            'text-transform' => 'none',
            'color' => ''
        ),
        'priority' => 10,
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => array(
                    '#xt_wooqv .xt_wooqv-item-info p',
                    '#xt_wooqv .xt_wooqv-item-info .woocommerce-product-details__short-description',
                )
            ),
            array(
                'element' => array(
                    '#xt_wooqv .xt_wooqv-item-info p',
                    '#xt_wooqv .xt_wooqv-item-info .woocommerce-product-details__short-description',
                ),
                'media_query' => $customizer->media_query('mobile', 'max'),
                'property' => 'font-size',
                'choice' => 'font-size',
                'value_pattern' => 'calc($ * 0.85)',
            ),
        )
    );

    $fields[] = array(
        'id' => 'auto_generate_description',
        'section' => 'modal-product-info',
        'label' => esc_html__('Automatically generate product short description from main description if empty', 'woo-quick-view'),
        'type' => 'toggle',
        'default' => '0',
        'priority' => 10
    );

    $fields[] = array(
        'id' => 'product_description_margin_bottom',
        'section' => 'modal-product-info',
        'label' => esc_attr__('Product Description Bottom Margin ', 'woo-quick-view'),
        'type' => 'slider',
        'choices' => array(
            'min' => '0',
            'max' => '50',
            'step' => '1',
            'suffix' => 'px'
        ),
        'default' => '15',
        'priority' => 10,
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => '#xt_wooqv .xt_wooqv-item-info .woocommerce-product-details__short-description',
                'property' => 'margin-bottom',
                'value_pattern' => '$px!important'
            )
        )
    );


    $fields[] = array(
        'id' => 'typo_product_meta_labels',
        'section' => 'modal-product-info',
        'label' => esc_attr__('Product Meta Labels Typography', 'woo-quick-view'),
        'type' => 'typography',
        'default' => array(

            'font-family' => $default_font,
            'variant' => '600',
            'font-size' => '14px',
            'letter-spacing' => '0',
            'subsets' => array('latin-ext'),
            'text-transform' => 'none',
            'color' => ''
        ),
        'priority' => 10,
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => array('#xt_wooqv .xt_wooqv-item-info .product_meta > span'),
            ),
            array(
                'element' => array('#xt_wooqv .xt_wooqv-item-info .product_meta > span'),
                'media_query' => $customizer->media_query('mobile', 'max'),
                'property' => 'font-size',
                'choice' => 'font-size',
                'value_pattern' => 'calc($ * 0.85)',
            ),
        )
    );

    $fields[] = array(
        'id' => 'typo_product_meta_values',
        'section' => 'modal-product-info',
        'label' => esc_attr__('Product Meta Values Typography', 'woo-quick-view'),
        'type' => 'typography',
        'default' => array(

            'font-family' => $default_font,
            'variant' => '600',
            'font-size' => '14px',
            'letter-spacing' => '0',
            'subsets' => array('latin-ext'),
            'text-transform' => 'none',
            'color' => ''
        ),
        'priority' => 10,
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => array('#xt_wooqv .xt_wooqv-item-info .product_meta > span > span'),
            ),
            array(
                'element' => array('#xt_wooqv .xt_wooqv-item-info .product_meta > span > span'),
                'media_query' => $customizer->media_query('mobile', 'max'),
                'property' => 'font-size',
                'choice' => 'font-size',
                'value_pattern' => 'calc($ * 0.85)',
            ),
        )
    );

    $fields[] = array(
        'id' => 'typo_product_meta_links',
        'section' => 'modal-product-info',
        'label' => esc_attr__('Product Meta Links Typography', 'woo-quick-view'),
        'type' => 'typography',
        'default' => array(

            'font-family' => $default_font,
            'variant' => '600',
            'font-size' => '14px',
            'letter-spacing' => '0',
            'subsets' => array('latin-ext'),
            'text-transform' => 'none',
            'color' => ''
        ),
        'priority' => 10,
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => '#xt_wooqv .xt_wooqv-item-info .product_meta a',
            ),
            array(
                'element' => '#xt_wooqv .xt_wooqv-item-info .product_meta a',
                'media_query' => $customizer->media_query('mobile', 'max'),
                'property' => 'font-size',
                'choice' => 'font-size',
                'value_pattern' => 'calc($ * 0.85)',
            ),
        )
    );

    $fields[] = array(
        'id' => 'product_metas_margin_bottom',
        'section' => 'modal-product-info',
        'label' => esc_attr__('Product Metas Bottom Margin ', 'woo-quick-view'),
        'type' => 'slider',
        'choices' => array(
            'min' => '0',
            'max' => '50',
            'step' => '1',
            'suffix' => 'px'
        ),
        'default' => '20',
        'priority' => 10,
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => '#xt_wooqv .xt_wooqv-item-info .product_meta',
                'property' => 'margin-bottom',
                'value_pattern' => '$px!important'
            )
        )
    );

    $fields[] = array(
        'id' => 'product_variations_margin_bottom',
        'section' => 'modal-product-info',
        'label' => esc_attr__('Product Variations Bottom Margin ', 'woo-quick-view'),
        'type' => 'slider',
        'choices' => array(
            'min' => '0',
            'max' => '50',
            'step' => '1',
            'suffix' => 'px'
        ),
        'default' => '20',
        'priority' => 10,
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => '#xt_wooqv .xt_wooqv-item-info table.variations',
                'property' => 'margin-bottom',
                'value_pattern' => '$px!important'
            )
        )
    );

    $fields[] = array(
        'id' => 'add_to_cart_button_position',
        'section' => 'modal-product-info',
        'label' => esc_attr__('Modal Buttons Position', 'woo-quick-view'),
        'type' => 'radio-buttonset',
        'choices' => array(
            'inline' => esc_attr__('Next to Quantity Field', 'woo-quick-view'),
            'block' => esc_attr__('Below Quantity Field', 'woo-quick-view'),
        ),
        'priority' => 10,
        'default' => 'inline',
        'transport' => 'postMessage',
        'js_vars' => array(
            array(
                'element' => '#xt_wooqv',
                'function' => 'class',
                'prefix' => 'xt_wooqv-modal-buttons-pos-'
            )
        )
    );

    $fields[] = array(
        'id' => 'qunatity_field_margin_bottom',
        'section' => 'modal-product-info',
        'label' => esc_attr__('Modal Buttons Top Margin ', 'woo-quick-view'),
        'type' => 'slider',
        'choices' => array(
            'min' => '0',
            'max' => '50',
            'step' => '1',
            'suffix' => 'px'
        ),
        'default' => '20',
        'priority' => 10,
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => '#xt_wooqv .xt_wooqv-item-info form .quantity',
                'property' => 'margin-bottom',
                'value_pattern' => '$px!important'
            )
        ),
        'active_callback' => array(
            array(
                'setting' => 'add_to_cart_button_position',
                'operator' => '==',
                'value' => 'block',
            )
        )
    );

    $fields[] = array(
        'id' => 'typo_product_add_to_cart_button_bg',
        'section' => 'modal-product-info',
        'label' => esc_attr__('Product Add to Cart Button Background', 'woo-quick-view'),
        'type' => 'color',
        'priority' => 10,
        'default' => '#a46497',
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => '#xt_wooqv .xt_wooqv-item-info .single_add_to_cart_button',
                'property' => 'background-color',
            )
        )
    );

    $fields[] = array(
        'id' => 'typo_product_add_to_cart_button',
        'section' => 'modal-product-info',
        'label' => esc_attr__('Product Add to Cart Button Typography', 'woo-quick-view'),
        'type' => 'typography',
        'default' => array(

            'font-family' => $default_font,
            'variant' => '700',
            'font-size' => '14px',
            'letter-spacing' => '0',
            'subsets' => array('latin-ext'),
            'text-transform' => 'none',
            'color' => '#ffffff'
        ),
        'priority' => 10,
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => '#xt_wooqv .xt_wooqv-item-info .single_add_to_cart_button'
            )
        )
    );

    $fields[] = array(
        'id' => 'product_more_info_enabled',
        'section' => 'modal-product-info',
        'label' => esc_html__('Product More Info Button', 'woo-quick-view'),
        'type' => 'radio-buttonset',
        'choices' => array(
            'inline-block' => esc_attr__('Show', 'woo-quick-view'),
            'none' => esc_attr__('Hide', 'woo-quick-view'),
        ),
        'default' => 'inline-block',
        'priority' => 10,
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => '#xt_wooqv .xt_wooqv-item-info .xt_wooqv-more-info',
                'property' => 'display',
            )
        )
    );

    $fields[] = array(
        'id' => 'product_more_info_button_bg',
        'section' => 'modal-product-info',
        'label' => esc_attr__('Product More Info Button Background', 'woo-quick-view'),
        'type' => 'color',
        'priority' => 10,
        'default' => '#ebe9eb',
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => '#xt_wooqv .xt_wooqv-item-info .xt_wooqv-more-info',
                'property' => 'background-color',
            )
        )
    );

    $fields[] = array(
        'id' => 'typo_product_more_info_button',
        'section' => 'modal-product-info',
        'label' => esc_attr__('Product More Info Button Typography', 'woo-quick-view'),
        'type' => 'typography',
        'default' => array(

            'font-family' => $default_font,
            'variant' => '700',
            'font-size' => '14px',
            'letter-spacing' => '0',
            'subsets' => array('latin-ext'),
            'text-transform' => 'none',
            'color' => '#515151'
        ),
        'priority' => 10,
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => '#xt_wooqv .xt_wooqv-item-info .xt_wooqv-more-info'
            )
        )
    );

} else {

    $fields[] = array(
        'id' => 'product_info_features',
        'section' => 'modal-product-info',
        'type' => 'xt-premium',
        'default' => array(
            'type' => 'image',
            'value' => $this->core->plugin_url() . 'admin/customizer/assets/images/product-info.png',
            'link' => $this->core->access_manager()->get_upgrade_url()
        )
    );
}
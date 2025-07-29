<?php
/* @var $customizer XT_Framework_Customizer */

if ($this->core->access_manager()->can_use_premium_code__premium_only()) {

    $fields[] = array(
        'id' => 'modal_slider_thumb_size',
        'section' => 'modal-product-slider',
        'label' => esc_html__('Slider Thumb Size', 'woo-quick-view'),
        'type' => 'select',
        'choices' => XT_Framework_Customizer_Options::get_image_sizes(),
        'default' => 'woocommerce_gallery_thumbnail',
        'priority' => 10
    );

    $fields[] = array(
        'id' => 'modal_slider_image_size',
        'section' => 'modal-product-slider',
        'label' => esc_html__('Slider Image Size', 'woo-quick-view'),
        'type' => 'select',
        'choices' => XT_Framework_Customizer_Options::get_image_sizes(),
        'default' => 'woocommerce_single',
        'priority' => 10
    );

    $fields[] = array(
        'id' => 'modal_slider_vertical',
        'section' => 'modal-product-slider',
        'label' => esc_html__('Slider Vertical Mode', 'woo-quick-view'),
        'type' => 'radio-buttonset',
        'choices' => array(
            '0' => esc_attr__('No', 'woo-quick-view'),
            '1' => esc_attr__('Yes', 'woo-quick-view'),
        ),
        'default' => '0',
        'priority' => 10
    );

    $fields[] = array(
        'id' => 'modal_slider_width_desktop',
        'section' => 'modal-product-slider',
        'label' => esc_html__('Slider Width', 'woo-quick-view'),
        'type' => 'slider',
        'choices' => array(
            'min' => '300',
            'max' => '600',
            'step' => '1',
            'suffix' => 'px'
        ),
        'priority' => 10,
        'default' => '400',
        'transport' => 'postMessage',
        'output' => array(
            array(
                'element' => array('.xt_wooqv-default #xt_wooqv .xt_wooqv-slider-wrapper', '#xt_wooqv .xt_wooqv-slider li'),
                'property' => 'width',
                'value_pattern' => '$px',
                'media_query' => $customizer->media_query('desktop', 'min'),
            ),
            array(
                'element' => array(
                    '.xt_wooqv-default #xt_wooqv.xt_wooqv-add-content .xt_wooqv-item-info',
                ),
                'property' => 'width',
                'value_pattern' => 'calc(100% - $px)',
                'media_query' => $customizer->media_query('desktop', 'min'),
            )
        ),
        'js_vars' => array(
            array(
                'element' => '#xt_wooqv',
                'function' => 'html',
                'attr' => 'xt_wooqv-desktop-slider-width'
            )
        ),
        'screen' => 'desktop',
        'hidden_screens' => array('mobile'),
        'active_callback' => array(
            array(
                'setting' => 'modal_type',
                'operator' => 'in',
                'value' => array('default'),
            )
        )
    );

    $fields[] = array(
        'id' => 'modal_slider_width_desktop_fullscreen',
        'section' => 'modal-product-slider',
        'label' => esc_html__('Slider Width', 'woo-quick-view'),
        'type' => 'slider',
        'choices' => array(
            'min' => '30',
            'max' => '70',
            'step' => '1',
            'suffix' => '%'
        ),
        'priority' => 10,
        'default' => '40',
        'transport' => 'postMessage',
        'output' => array(
            array(
                'element' => array(
                    '.xt_wooqv-fullscreen #xt_wooqv .xt_wooqv-slider-wrapper',
                    '.xt_wooqv-fullscreen #xt_wooqv .xt_wooqv-slider li'
                ),
                'property' => 'width',
                'value_pattern' => '$vw',
                'media_query' => $customizer->media_query('desktop', 'min'),
            ),
            array(
                'element' => array(
                    '.xt_wooqv-fullscreen #xt_wooqv.xt_wooqv-add-content .xt_wooqv-item-info',
                ),
                'property' => 'width',
                'value_pattern' => 'calc(100vw - $vw)',
                'media_query' => $customizer->media_query('desktop', 'min'),
            )
        ),
        'js_vars' => array(
            array(
                'element' => '.xt_wooqv-fullscreen #xt_wooqv',
                'function' => 'html',
                'attr' => 'xt_wooqv-desktop-slider-width-fullscreen'
            )
        ),
        'screen' => 'desktop',
        'hidden_screens' => array('mobile'),
        'active_callback' => array(
            array(
                'setting' => 'modal_type',
                'operator' => 'in',
                'value' => array('fullscreen'),
            )
        )
    );

    $fields[] = array(
        'id' => 'modal_slider_width_desktop_inline',
        'section' => 'modal-product-slider',
        'label' => esc_html__('Slider Width', 'woo-quick-view'),
        'type' => 'slider',
        'choices' => array(
            'min' => '300',
            'max' => '800',
            'step' => '1',
            'suffix' => 'px'
        ),
        'priority' => 10,
        'default' => '400',
        'transport' => 'postMessage',
        'output' => array(
            array(
                'element' => array(
                    '.xt_wooqv-inline #xt_wooqv .xt_wooqv-slider-wrapper',
                    '.xt_wooqv-inline #xt_wooqv .xt_wooqv-slider li'
                ),
                'property' => 'width',
                'value_pattern' => '$px',
                'media_query' => $customizer->media_query('desktop', 'min'),
            ),
            array(
                'element' => array(
                    '.xt_wooqv-inline #xt_wooqv.xt_wooqv-add-content .xt_wooqv-item-info'
                ),
                'property' => 'width',
                'value_pattern' => 'calc(100% - $px)',
                'media_query' => $customizer->media_query('desktop', 'min'),
            )
        ),
        'js_vars' => array(
            array(
                'element' => '.xt_wooqv-inline #xt_wooqv',
                'function' => 'html',
                'attr' => 'xt_wooqv-desktop-slider-width-inline'
            )
        ),
        'screen' => 'desktop',
        'hidden_screens' => array('mobile'),
        'active_callback' => array(
            array(
                'setting' => 'modal_type',
                'operator' => 'in',
                'value' => array('inline'),
            )
        )
    );

    $fields[] = array(
        'id' => 'modal_slider_height_desktop',
        'section' => 'modal-product-slider',
        'label' => esc_html__('Slider Height', 'woo-quick-view'),
        'type' => 'slider',
        'choices' => array(
            'min' => '300',
            'max' => '600',
            'step' => '1',
            'suffix' => 'px'
        ),
        'priority' => 10,
        'default' => '400',
        'transport' => 'postMessage',
        'output' => array(
            array(
                'element' => array(
                    'body.xt_wooqv-default:not(.xt-customizer-preview) #xt_wooqv .xt_wooqv-slider-wrapper',
                    'body.xt_wooqv-default:not(.xt-customizer-preview) #xt_wooqv .xt_wooqv-slider li',
                    'body.xt_wooqv-default:not(.xt-customizer-preview) #xt_wooqv.xt_wooqv-add-content .xt_wooqv-item-info'
                ),
                'property' => 'height',
                'value_pattern' => '$px!important',
                'media_query' => $customizer->media_query('desktop', 'min'),
            )
        ),
        'js_vars' => array(
            array(
                'element' => '.xt_wooqv-default #xt_wooqv',
                'function' => 'html',
                'attr' => 'xt_wooqv-desktop-slider-height'
            )
        ),
        'screen' => 'desktop',
        'hidden_screens' => array('mobile'),
        'active_callback' => array(
            array(
                'setting' => 'modal_type',
                'operator' => 'in',
                'value' => array('default'),
            )
        )

    );

    $fields[] = array(
        'id' => 'modal_slider_height_desktop_inline',
        'section' => 'modal-product-slider',
        'label' => esc_html__('Slider Height', 'woo-quick-view'),
        'type' => 'slider',
        'choices' => array(
            'min' => '300',
            'max' => '600',
            'step' => '1',
            'suffix' => 'px'
        ),
        'priority' => 10,
        'default' => '400',
        'transport' => 'postMessage',
        'output' => array(
            array(
                'element' => array(
                    'body.xt_wooqv-inline:not(.xt-customizer-preview) #xt_wooqv .xt_wooqv-slider-wrapper',
                    'body.xt_wooqv-inline:not(.xt-customizer-preview) #xt_wooqv .xt_wooqv-slider li',
                    'body.xt_wooqv-inline:not(.xt-customizer-preview) #xt_wooqv.xt_wooqv-add-content .xt_wooqv-item-info'
                ),
                'property' => 'height',
                'value_pattern' => '$px',
                'media_query' => $customizer->media_query('desktop', 'min'),
            )
        ),
        'js_vars' => array(
            array(
                'element' => '.xt_wooqv-inline #xt_wooqv',
                'function' => 'html',
                'attr' => 'xt_wooqv-desktop-slider-height-inline'
            )
        ),
        'screen' => 'desktop',
        'hidden_screens' => array('mobile'),
        'active_callback' => array(
            array(
                'setting' => 'modal_type',
                'operator' => 'in',
                'value' => array('inline'),
            )
        )
    );

    $fields[] = array(
        'id' => 'modal_slider_height_mobile',
        'section' => 'modal-product-slider',
        'label' => esc_html__('Slider Height', 'woo-quick-view'),
        'type' => 'slider',
        'choices' => array(
            'min' => '200',
            'max' => '500',
            'step' => '1',
            'suffix' => 'px'
        ),
        'priority' => 10,
        'default' => '340',
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => array(
                    '.xt_wooqv-default #xt_wooqv .xt_wooqv-slider-wrapper',
                    '.xt_wooqv-default #xt_wooqv .xt_wooqv-slider-wrapper > .xt_wooqv-slider',
                    '.xt_wooqv-default #xt_wooqv .xt_wooqv-slider-wrapper .lSSlideOuter:not(.vertical) .xt_wooqv-slider',
                    '.xt_wooqv-default #xt_wooqv .xt_wooqv-slider li'
                ),
                'property' => 'height',
                'value_pattern' => '$px!important',
                'media_query' => $customizer->media_query('tablet', 'max'),
            )
        ),
        'screen' => 'tablet_mobile',
        'hidden_screens' => array('mobile'),
        'active_callback' => array(
            array(
                'setting' => 'modal_type',
                'operator' => 'in',
                'value' => array('default'),
            )
        )
    );

    $fields[] = array(
        'id' => 'modal_slider_height_mobile_fullscreen',
        'section' => 'modal-product-slider',
        'label' => esc_html__('Slider Height', 'woo-quick-view'),
        'type' => 'slider',
        'choices' => array(
            'min' => '30',
            'max' => '70',
            'step' => '1',
            'suffix' => '%'
        ),
        'priority' => 10,
        'default' => '55',
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => array(
                    '.xt_wooqv-fullscreen #xt_wooqv .xt_wooqv-slider-wrapper',
                    '.xt_wooqv-fullscreen #xt_wooqv .xt_wooqv-slider-wrapper > .xt_wooqv-slider',
                    '.xt_wooqv-fullscreen #xt_wooqv .xt_wooqv-slider-wrapper .lSSlideOuter:not(.vertical) .xt_wooqv-slider',
                    '.xt_wooqv-fullscreen #xt_wooqv .xt_wooqv-slider li'
                ),
                'property' => 'height',
                'value_pattern' => '$vh!important',
                'media_query' => $customizer->media_query('tablet', 'max'),
            ),
            array(
                'element' => array(
                    '.xt_wooqv-fullscreen #xt_wooqv.xt_wooqv-add-content .xt_wooqv-item-info',
                ),
                'property' => 'height',
                'value_pattern' => 'calc(100vh - $vh)',
                'media_query' => $customizer->media_query('tablet', 'max'),
            )
        ),
        'screen' => 'tablet_mobile',
        'hidden_screens' => array('mobile'),
        'active_callback' => array(
            array(
                'setting' => 'modal_type',
                'operator' => 'in',
                'value' => array('fullscreen'),
            )
        )
    );

    $fields[] = array(
        'id' => 'modal_slider_height_mobile_inline',
        'section' => 'modal-product-slider',
        'label' => esc_html__('Slider Height', 'woo-quick-view'),
        'type' => 'slider',
        'choices' => array(
            'min' => '200',
            'max' => '500',
            'step' => '1',
            'suffix' => 'px'
        ),
        'priority' => 10,
        'default' => '340',
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => array(
                    '.xt_wooqv-inline #xt_wooqv .xt_wooqv-slider-wrapper',
                    '.xt_wooqv-inline #xt_wooqv .xt_wooqv-slider-wrapper > .xt_wooqv-slider',
                    '.xt_wooqv-inline #xt_wooqv .xt_wooqv-slider-wrapper .lSSlideOuter:not(.vertical) .xt_wooqv-slider',
                    '.xt_wooqv-inline #xt_wooqv .xt_wooqv-slider li'
                ),
                'property' => 'height',
                'value_pattern' => '$px!important',
                'media_query' => $customizer->media_query('tablet', 'max'),
            ),
            array(
                'element' => array(
                    '.xt_wooqv-inline #xt_wooqv.xt_wooqv-add-content .xt_wooqv-item-info',
                ),
                'property' => 'height',
                'value_pattern' => 'calc(100% - $px)',
                'media_query' => $customizer->media_query('tablet', 'max'),
            )
        ),
        'screen' => 'tablet_mobile',
        'hidden_screens' => array('mobile'),
        'active_callback' => array(
            array(
                'setting' => 'modal_type',
                'operator' => 'in',
                'value' => array('inline'),
            )
        )
    );

    $fields[] = array(
        'id' => 'modal_slider_items_visible_desktop',
        'section' => 'modal-product-slider',
        'label' => esc_html__('Visible Slides', 'woo-quick-view'),
        'description' => esc_html__('Number of slides to show at a time', 'woo-quick-view'),
        'type' => 'slider',
        'choices' => array(
            'min' => '1',
            'max' => '4',
            'step' => '1',
        ),
        'screen' => 'desktop',
        'hidden_screens' => array('mobile'),
        'active_callback' => array(
            array(
                'setting' => 'modal_slider_vertical',
                'operator' => '==',
                'value' => '0',
            )
        ),
        'priority' => 10,
        'default' => '1'
    );

    $fields[] = array(
        'id' => 'modal_slider_items_visible_tablet',
        'section' => 'modal-product-slider',
        'label' => esc_html__('Visible Slides', 'woo-quick-view'),
        'description' => esc_html__('Number of slides to show at a time', 'woo-quick-view'),
        'type' => 'text',
        'default' => 'This option can only be set in desktop view',
        'input_attrs' => array('readonly' => true),
        'active_callback' => array(
            array(
                'setting' => 'modal_slider_vertical',
                'operator' => '==',
                'value' => '0',
            )
        ),
        'screen' => 'tablet_mobile',
        'hidden_screens' => array('mobile'),
        'priority' => 10
    );

    $fields[] = array(
        'id' => 'modal_slider_image_bg_size_desktop',
        'section' => 'modal-product-slider',
        'label' => esc_html__('Slider Image Bg Size', 'woo-quick-view'),
        'type' => 'radio-buttonset',
        'choices' => array(
            'cover' => esc_attr__('Cover',  'woo-quick-view'),
            'contain' => esc_attr__('Contain',  'woo-quick-view')
        ),
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => '.xt_wooqv-slider li',
                'property' => 'background-size',
                'media_query' => $customizer->media_query('desktop', 'min'),
            ),
        ),
        'screen' => 'desktop',
        'hidden_screens' => array('mobile'),
        'default' => 'cover',
        'priority' => 10
    );

    $fields[] = array(
        'id' => 'modal_slider_image_bg_size_mobile',
        'section' => 'modal-product-slider',
        'label' => esc_html__('Slider Image Bg Size', 'woo-quick-view'),
        'type' => 'radio-buttonset',
        'choices' => array(
            'cover' => esc_attr__('Cover',  'woo-quick-view'),
            'contain' => esc_attr__('Contain',  'woo-quick-view')
        ),
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => '.xt_wooqv-slider li',
                'property' => 'background-size',
                'media_query' => $customizer->media_query('tablet', 'max'),
            ),
        ),
        'screen' => 'tablet_mobile',
        'hidden_screens' => array('mobile'),
        'default' => 'cover',
        'priority' => 10
    );

    $fields[] = array(
        'id' => 'modal_slider_image_bg_position_cover_desktop',
        'section' => 'modal-product-slider',
        'label' => esc_html__('Slider Image Bg Position', 'woo-quick-view'),
        'type' => 'radio-buttonset',
        'choices' => array(
            'top' => esc_attr__('Top',  'woo-quick-view'),
            'center' => esc_attr__('Center',  'woo-quick-view'),
            'bottom' => esc_attr__('Bottom',  'woo-quick-view'),
        ),
        'input_attrs' => array(
            'data-col' => '3'
        ),
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => '.xt_wooqv-slider li',
                'property' => 'background-position',
                'value_pattern' => 'center $',
                'media_query' => $customizer->media_query('desktop', 'min'),
            ),
        ),
        'active_callback' => array(
            array(
                'setting' => 'modal_slider_image_bg_size_desktop',
                'operator' => '==',
                'value' => 'cover',
            )
        ),
        'screen' => 'desktop',
        'hidden_screens' => array('mobile'),
        'default' => 'center',
        'priority' => 10
    );

    $fields[] = array(
        'id' => 'modal_slider_image_bg_position_contain_desktop',
        'section' => 'modal-product-slider',
        'label' => esc_html__('Slider Image Bg Position', 'woo-quick-view'),
        'type' => 'radio-buttonset',
        'choices' => array(
            'left top' => esc_attr__('Left Top',  'woo-quick-view'),
            'left center' => esc_attr__('Left Center',  'woo-quick-view'),
            'left bottom' => esc_attr__('Left Bottom',  'woo-quick-view'),
            'right top' => esc_attr__('Right Top',  'woo-quick-view'),
            'right center' => esc_attr__('Right Center',  'woo-quick-view'),
            'right bottom' => esc_attr__('Right Bottom',  'woo-quick-view'),
            'center top' => esc_attr__('Center Top',  'woo-quick-view'),
            'center center' => esc_attr__('Center Center',  'woo-quick-view'),
            'center bottom' => esc_attr__('Center Bottom',  'woo-quick-view'),
        ),
        'input_attrs' => array(
            'data-col' => '3'
        ),
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => '.xt_wooqv-slider li',
                'property' => 'background-position',
                'media_query' => $customizer->media_query('desktop', 'min'),
            ),
        ),
        'active_callback' => array(
            array(
                'setting' => 'modal_slider_image_bg_size_desktop',
                'operator' => '==',
                'value' => 'contain',
            )
        ),
        'screen' => 'desktop',
        'hidden_screens' => array('mobile'),
        'default' => 'center center',
        'priority' => 10
    );

    $fields[] = array(
        'id' => 'modal_slider_image_bg_position_cover_mobile',
        'section' => 'modal-product-slider',
        'label' => esc_html__('Slider Image Bg Position', 'woo-quick-view'),
        'type' => 'radio-buttonset',
        'choices' => array(
            'top' => esc_attr__('Top',  'woo-quick-view'),
            'center' => esc_attr__('Center',  'woo-quick-view'),
            'bottom' => esc_attr__('Bottom',  'woo-quick-view'),
        ),
        'input_attrs' => array(
            'data-col' => '3'
        ),
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => '.xt_wooqv-slider li',
                'property' => 'background-position',
                'value_pattern' => 'center $',
                'media_query' => $customizer->media_query('tablet', 'max'),
            ),
        ),
        'active_callback' => array(
            array(
                'setting' => 'modal_slider_image_bg_size_mobile',
                'operator' => '==',
                'value' => 'cover',
            )
        ),
        'screen' => 'tablet_mobile',
        'hidden_screens' => array('mobile'),
        'default' => 'center',
        'priority' => 10
    );

    $fields[] = array(
        'id' => 'modal_slider_image_bg_position_contain_mobile',
        'section' => 'modal-product-slider',
        'label' => esc_html__('Slider Image Bg Position', 'woo-quick-view'),
        'type' => 'radio-buttonset',
        'choices' => array(
            'left top' => esc_attr__('Left Top',  'woo-quick-view'),
            'left center' => esc_attr__('Left Center',  'woo-quick-view'),
            'left bottom' => esc_attr__('Left Bottom',  'woo-quick-view'),
            'right top' => esc_attr__('Right Top',  'woo-quick-view'),
            'right center' => esc_attr__('Right Center',  'woo-quick-view'),
            'right bottom' => esc_attr__('Right Bottom',  'woo-quick-view'),
            'center top' => esc_attr__('Center Top',  'woo-quick-view'),
            'center center' => esc_attr__('Center Center',  'woo-quick-view'),
            'center bottom' => esc_attr__('Center Bottom',  'woo-quick-view'),
        ),
        'input_attrs' => array(
            'data-col' => '3'
        ),
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => '.xt_wooqv-slider li',
                'property' => 'background-position',
                'media_query' => $customizer->media_query('tablet', 'max'),
            ),
        ),
        'active_callback' => array(
            array(
                'setting' => 'modal_slider_image_bg_size_mobile',
                'operator' => '==',
                'value' => 'contain',
            )
        ),
        'screen' => 'tablet_mobile',
        'hidden_screens' => array('mobile'),
        'default' => 'center center',
        'priority' => 10
    );

    $fields[] = array(
        'id' => 'modal_slider_image_bg_color_desktop',
        'section' => 'modal-product-slider',
        'label' => esc_html__('Slider Image Bg Color', 'woo-quick-view'),
        'type' => 'color',
        'choices' => array(
            'alpha' => true,
        ),
        'priority' => 10,
        'default' => '',
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => '.xt_wooqv-slider li',
                'property' => 'background-color',
                'value_pattern' => '$',
                'media_query' => $customizer->media_query('desktop', 'min'),
            )
        ),
        'screen' => 'desktop',
        'hidden_screens' => array('mobile'),
        'active_callback' => array(
            array(
                'setting' => 'modal_slider_image_bg_size_desktop',
                'operator' => '==',
                'value' => 'contain',
            )
        )
    );

    $fields[] = array(
        'id' => 'modal_slider_image_bg_color_mobile',
        'section' => 'modal-product-slider',
        'label' => esc_html__('Slider Image Bg Color', 'woo-quick-view'),
        'type' => 'color',
        'choices' => array(
            'alpha' => true,
        ),
        'priority' => 10,
        'default' => '',
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => '.xt_wooqv-slider li',
                'property' => 'background-color',
                'value_pattern' => '$',
                'media_query' => $customizer->media_query('tablet', 'max'),
            )
        ),
        'screen' => 'tablet_mobile',
        'hidden_screens' => array('mobile'),
        'active_callback' => array(
            array(
                'setting' => 'modal_slider_image_bg_size_mobile',
                'operator' => '==',
                'value' => 'contain',
            )
        )
    );

    $fields[] = array(
        'id' => 'modal_slider_animation',
        'section' => 'modal-product-slider',
        'label' => esc_html__('Slider Animation', 'woo-quick-view'),
        'description' => esc_html__('Select between a Fade or Slide animation', 'woo-quick-view'),
        'type' => 'radio-buttonset',
        'choices' => array(
            'slide' => esc_attr__('Slide', 'woo-quick-view'),
            'fade' => esc_attr__('Fade', 'woo-quick-view'),
        ),
        'default' => 'slide',
        'priority' => 10
    );

    $fields[] = array(
        'id' => 'modal_slider_autoplay',
        'description' => esc_html__('If enabled, this will auto slide the images with a 3 seconds delay between each.', 'woo-quick-view'),
        'section' => 'modal-product-slider',
        'label' => esc_html__('Slider Auto Play', 'woo-quick-view'),
        'type' => 'radio-buttonset',
        'choices' => array(
            '0' => esc_attr__('Disabled', 'woo-quick-view'),
            '1' => esc_attr__('Enabled', 'woo-quick-view'),
        ),
        'default' => '1',
        'priority' => 10
    );

    $fields[] = array(
        'id' => 'wqv_',
        'section' => 'modal-product-slider',
        'label' => esc_html__('Slider Grayscale Transition', 'woo-quick-view'),
        'description' => esc_html__('If enabled, this will add a Grayscale effect transition to the image while sliding.', 'woo-quick-view'),
        'type' => 'radio-buttonset',
        'choices' => array(
            '0' => esc_attr__('Disable', 'woo-quick-view'),
            '1' => esc_attr__('Enable', 'woo-quick-view'),
        ),
        'default' => '0',
        'priority' => 10
    );

    $fields[] = array(
        'id' => 'modal_slider_lightbox_enabled',
        'section' => 'modal-product-slider',
        'label' => esc_html__('Slider LightBox', 'woo-quick-view'),
        'description' => esc_html__('If enabled, a fullscreen Slider Gallery will appear when clicking on an image within the slider', 'woo-quick-view'),
        'type' => 'radio-buttonset',
        'choices' => array(
            '0' => esc_attr__('Disable', 'woo-quick-view'),
            '1' => esc_attr__('Enable', 'woo-quick-view'),
        ),
        'default' => '0',
        'priority' => 10
    );

    $fields[] = array(
        'id' => 'modal_slider_lightbox_advanced',
        'section' => 'modal-product-slider',
        'label' => esc_html__('Slider LightBox Mode', 'woo-quick-view'),
        'description' => esc_html__('Advanced LightBox will enable these features within the LightBox modal: Thumbnails Gallery, Fullscreen Mode, Image Zoom, Autoplay, Image Download and Social Sharing', 'woo-quick-view'),
        'type' => 'radio-buttonset',
        'choices' => array(
            '0' => esc_attr__('Minimal', 'woo-quick-view'),
            '1' => esc_attr__('Advanced', 'woo-quick-view'),
        ),
        'default' => '0',
        'priority' => 10,
        'active_callback' => array(
            array(
                'setting' => 'modal_slider_lightbox_enabled',
                'operator' => '==',
                'value' => '1',
            )
        )
    );

    $fields[] = array(
        'id' => 'modal_slider_lightbox_overlay',
        'section' => 'modal-product-slider',
        'label' => esc_html__('Slider LightBox Overlay', 'woo-quick-view'),
        'type' => 'color',
        'choices' => array(
            'alpha' => true,
        ),
        'priority' => 10,
        'default' => '#000000',
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => '.xt_wooqv-ready .lg-backdrop',
                'property' => 'background-color',
                'value_pattern' => '$'
            )
        ),
        'active_callback' => array(
            array(
                'setting' => 'modal_slider_lightbox_enabled',
                'operator' => '==',
                'value' => '1',
            )
        )
    );


    $fields[] = array(
        'id' => 'modal_slider_arrows_enabled',
        'section' => 'modal-product-slider',
        'label' => esc_html__('Slider Arrows', 'woo-quick-view'),
        'type' => 'radio-buttonset',
        'choices' => array(
            '0' => esc_attr__('Disable', 'woo-quick-view'),
            '1' => esc_attr__('Enable', 'woo-quick-view'),
        ),
        'default' => '1',
        'priority' => 10
    );

    $fields[] = array(
        'id' => 'modal_slider_arrow',
        'section' => 'modal-product-slider',
        'label' => esc_html__('Slider Arrows Icon', 'woo-quick-view'),
        'type' => 'xticons',
        'choices' => array('types' => array('arrow')),
        'priority' => 10,
        'default' => 'xt_wooqvicon-arrows-18',
        'transport' => 'postMessage',
        'js_vars' => array(
            array(
                'element' => '#xt_wooqv .xt_wooqv-arrow-icon',
                'function' => 'class'
            ),
            array(
                'element' => '.xt_wooqv-ready .lg-actions .xt_wooqv-arrow-icon',
                'function' => 'class'
            )
        ),
        'active_callback' => array(
            array(
                'setting' => 'modal_slider_arrows_enabled',
                'operator' => '==',
                'value' => '1',
            ),
        )
    );

    $fields[] = array(
        'id' => 'modal_slider_arrow_size',
        'section' => 'modal-product-slider',
        'label' => esc_html__('Slider Arrows Size', 'woo-quick-view'),
        'type' => 'slider',
        'choices' => array(
            'min' => '20',
            'max' => '60',
            'step' => '1',
            'suffix' => 'px'
        ),
        'priority' => 10,
        'default' => '40',
        'transport' => 'auto',
        'screen' => 'desktop',
        'hidden_screens' => array('mobile'),
        'output' => array(
            array(
                'element' => array('#xt_wooqv .xt_wooqv-slider-wrapper .lSAction .lSPrev', '#xt_wooqv .xt_wooqv-slider-wrapper .lSAction .lSNext', '.xt_wooqv-ready .lg-actions .lg-icon'),
                'property' => 'font-size',
                'value_pattern' => '$px'
            )
        ),
        'active_callback' => array(
            array(
                'setting' => 'modal_slider_arrows_enabled',
                'operator' => '==',
                'value' => '1',
            ),
        )
    );

    $fields[] = array(
        'id' => 'modal_slider_arrow_size_mobile',
        'section' => 'modal-product-slider',
        'label' => esc_html__('Slider Arrows Size', 'woo-quick-view'),
        'type' => 'slider',
        'choices' => array(
            'min' => '20',
            'max' => '60',
            'step' => '1',
            'suffix' => 'px'
        ),
        'priority' => 10,
        'default' => '30',
        'transport' => 'auto',
        'screen' => 'tablet_mobile',
        'hidden_screens' => array('mobile'),
        'output' => array(
            array(
                'element' => array('#xt_wooqv .xt_wooqv-slider-wrapper .lSAction .lSPrev', '#xt_wooqv .xt_wooqv-slider-wrapper .lSAction .lSNext', '.xt_wooqv-ready .lg-actions .lg-icon'),
                'property' => 'font-size',
                'value_pattern' => '$px'
            )
        ),
        'active_callback' => array(
            array(
                'setting' => 'modal_slider_arrows_enabled',
                'operator' => '==',
                'value' => '1',
            ),
        )
    );

    $fields[] = array(
        'id' => 'modal_slider_arrow_color',
        'section' => 'modal-product-slider',
        'label' => esc_html__('Slider Arrows Icon Color', 'woo-quick-view'),
        'type' => 'color-alpha',
        'priority' => 10,
        'default' => 'rgba(255,255,255,0.7)',
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => array('#xt_wooqv .xt_wooqv-slider-wrapper .lSAction .lSPrev', '#xt_wooqv .xt_wooqv-slider-wrapper .lSAction .lSNext', '.xt_wooqv-ready .lg-actions .lg-icon'),
                'property' => 'color',
            )
        ),
        'active_callback' => array(
            array(
                'setting' => 'modal_slider_arrows_enabled',
                'operator' => '==',
                'value' => '1',
            ),
        )
    );

    $fields[] = array(
        'id' => 'modal_slider_arrow_hover_color',
        'section' => 'modal-product-slider',
        'label' => esc_html__('Slider Arrows Icon Hover Color', 'woo-quick-view'),
        'type' => 'color-alpha',
        'priority' => 10,
        'default' => 'rgba(255,255,255,1)',
        'transport' => 'auto',
        'output' => array(

            array(
                'element' => array('.xtfw-no-touchevents #xt_wooqv .xt_wooqv-slider-wrapper .lSAction .lSPrev:hover', '.xtfw-no-touchevents #xt_wooqv .xt_wooqv-slider-wrapper .lSAction .lSNext:hover', '.xtfw-no-touchevents.xt_wooqv-ready .lg-actions .lg-icon:hover'),
                'property' => 'color',
            )
        ),
        'active_callback' => array(
            array(
                'setting' => 'modal_slider_arrows_enabled',
                'operator' => '==',
                'value' => '1',
            ),
        )
    );

    $fields[] = array(
        'id' => 'modal_slider_thumb_gallery_enabled',
        'section' => 'modal-product-slider',
        'label' => esc_html__('Slider Thumb Gallery', 'woo-quick-view'),
        'type' => 'radio-buttonset',
        'choices' => array(
            '0' => esc_attr__('Disable', 'woo-quick-view'),
            '1' => esc_attr__('Enable', 'woo-quick-view'),
        ),
        'default' => '1',
        'priority' => 10
    );

    $fields[] = array(
        'id' => 'modal_slider_thumb_gallery_visible_hover',
        'section' => 'modal-product-slider',
        'label' => esc_html__('Slider Thumb Gallery Visible on Hover only', 'woo-quick-view'),
        'type' => 'radio-buttonset',
        'choices' => array(
            '0' => esc_attr__('No', 'woo-quick-view'),
            '1' => esc_attr__('Yes', 'woo-quick-view'),
        ),
        'default' => '1',
        'priority' => 10,
        'active_callback' => array(
            array(
                'setting' => 'modal_slider_thumb_gallery_enabled',
                'operator' => '==',
                'value' => '1',
            ),
        )
    );

    $fields[] = array(
        'id' => 'modal_slider_thumb_gallery_active_border_width',
        'section' => 'modal-product-slider',
        'label' => esc_html__('Slider Gallery Active Thumb Border Width', 'woo-quick-view'),
        'type' => 'slider',
        'choices' => array(
            'min' => '1',
            'max' => '10',
            'step' => '1',
            'suffix' => 'px'
        ),
        'priority' => 10,
        'default' => '5',
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => '#xt_wooqv .xt_wooqv-slider-wrapper .lSGallery li a:after',
                'property' => 'border-width',
                'value_pattern' => '$px'
            )
        ),
        'active_callback' => array(
            array(
                'setting' => 'modal_slider_thumb_gallery_enabled',
                'operator' => '==',
                'value' => '1',
            ),
        )
    );

    $fields[] = array(
        'id' => 'modal_slider_thumb_gallery_active_border_color',
        'section' => 'modal-product-slider',
        'label' => esc_html__('Slider Gallery Active Thumb Border Color', 'woo-quick-view'),
        'type' => 'color',
        'choices' => array(
            'alpha' => true,
        ),
        'priority' => 10,
        'default' => 'rgba(164,100,151,0.8)',
        'transport' => 'auto',
        'output' => array(
            array(
                'element' => array('#xt_wooqv .xt_wooqv-slider-wrapper .lSGallery li a:after', '.xt_wooqv-ready .lg-outer .lg-thumb-item.active, .xtfw-no-touchevents.xt_wooqv-ready .lg-outer .lg-thumb-item:hover'),
                'property' => 'border-color'
            )
        ),
        'active_callback' => array(
            array(
                'setting' => 'modal_slider_thumb_gallery_enabled',
                'operator' => '==',
                'value' => '1',
            ),
        )
    );

} else {

    $fields[] = array(
        'id' => 'product_slider_features',
        'section' => 'modal-product-slider',
        'type' => 'xt-premium',
        'default' => array(
            'type' => 'image',
            'value' => $this->core->plugin_url() . 'admin/customizer/assets/images/product-slider.png',
            'link' => $this->core->plugin_upgrade_url()
        )
    );
}
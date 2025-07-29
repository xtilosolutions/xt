<?php
/* @var $customizer XT_Framework_Customizer */

if ($this->core->access_manager()->can_use_premium_code__premium_only()) {

    $fields[] = array(
        'id' => 'modal_nav_enabled',
        'section' => 'modal-navigation',
        'label' => esc_html__('Enable Navigation Arrows', 'woo-quick-view'),
        'description' => esc_html__('When enabled, the customer will be able to quickly browse through your products while keeping the quick view open', 'woo-quick-view'),
        'type' => 'radio-buttonset',
        'choices' => array(
            '1' => esc_attr__('Yes', 'woo-quick-view'),
            '0' => esc_attr__('No', 'woo-quick-view')
        ),
        'transport' => 'auto',
        'default' => '1',
        'priority' => 10
    );


    $fields[] = array(
        'id' => 'modal_nav_desktop_position',
        'section' => 'modal-navigation',
        'label' => esc_html__('Navigation Arrows Position', 'woo-quick-view'),
        'type' => 'text',
        'default' => 'No position options in desktop view',
        'input_attrs' => array('readonly' => true),
        'priority' => 10,
        'screen' => 'desktop',
        'hidden_screens' => array('mobile'),
        'transport' => 'postMessage',
        'active_callback' => array(
            array(
                'setting' => 'modal_nav_enabled',
                'operator' => '==',
                'value' => '1',
            ),
            array(
                'setting' => 'modal_type',
                'operator' => 'in',
                'value' => array('default'),
            )
        )
    );

    $fields[] = array(
        'id' => 'modal_nav_desktop_fullscreen_position',
        'section' => 'modal-navigation',
        'label' => esc_html__('Navigation Arrows Position', 'woo-quick-view'),
        'type' => 'radio-buttonset',
        'choices' => array(
            'middle' => esc_attr__('Middle', 'woo-quick-view'),
            'bottom' => esc_attr__('Bottom', 'woo-quick-view')
        ),
        'default' => 'middle',
        'priority' => 10,
        'screen' => 'desktop',
        'hidden_screens' => array('mobile'),
        'transport' => 'postMessage',
        'js_vars' => array(
            array(
                'element' => 'body',
                'function' => 'class',
                'prefix' => 'xt_wooqv-desktop-fullscreen-nav-pos-'
            ),
            array(
                'element' => 'body',
                'function' => 'class',
                'prefix' => 'xt_wooqv-desktop-inline-nav-pos-'
            )
        ),
        'active_callback' => array(
            array(
                'setting' => 'modal_nav_enabled',
                'operator' => '==',
                'value' => '1',
            ),
            array(
                'setting' => 'modal_type',
                'operator' => 'in',
                'value' => array('fullscreen', 'inline'),
            )
        )
    );

    $fields[] = array(
        'id' => 'modal_nav_mobile_position',
        'section' => 'modal-navigation',
        'label' => esc_html__('Navigation Arrows Position', 'woo-quick-view'),
        'type' => 'radio-buttonset',
        'choices' => array(
            'left' => esc_attr__('Left', 'woo-quick-view'),
            'center' => esc_attr__('Center', 'woo-quick-view'),
            'right' => esc_attr__('Right', 'woo-quick-view')
        ),
        'default' => 'left',
        'priority' => 10,
        'screen' => 'tablet_mobile',
        'hidden_screens' => array('mobile'),
        'transport' => 'postMessage',
        'js_vars' => array(
            array(
                'element' => 'body',
                'function' => 'class',
                'prefix' => 'xt_wooqv-mobile-nav-pos-'
            )
        ),
        'active_callback' => array(
            array(
                'setting' => 'modal_nav_enabled',
                'operator' => '==',
                'value' => '1',
            )
        )
    );

    $fields[] = array(
        'id' => 'modal_nav_mobile_offset',
        'section' => 'modal-navigation',
        'label' => esc_html__('Navigation Arrows Offset', 'woo-quick-view'),
        'type' => 'slider',
        'choices' => array(
            'min' => '0',
            'max' => '40',
            'step' => '1',
            'suffix' => 'px'
        ),
        'default' => '30',
        'priority' => 10,
        'transport' => 'auto',
        'screen' => 'tablet_mobile',
        'hidden_screens' => array('mobile'),
        'output' => array(
            array(
                'element' => '.xt_wooqv-nav',
                'media_query' => $customizer->media_query('tablet', 'max'),
                'property' => 'bottom',
                'value_pattern' => 'calc($px * 0.8)'
            ),
            array(
                'element' => '.xt_wooqv-mobile-nav-pos-left .xt_wooqv-nav',
                'media_query' => $customizer->media_query('tablet', 'max'),
                'property' => 'left',
                'value_pattern' => '$px'
            ),
            array(
                'element' => '.xt_wooqv-mobile-nav-pos-right .xt_wooqv-nav',
                'media_query' => $customizer->media_query('tablet', 'max'),
                'property' => 'right',
                'value_pattern' => '$px'
            ),
        ),
        'active_callback' => array(
            array(
                'setting' => 'modal_nav_enabled',
                'operator' => '==',
                'value' => '1',
            )
        )
    );

    $fields[] = array(
        'id' => 'modal_nav_icon',
        'section' => 'modal-navigation',
        'label' => esc_html__('Navigation Arrows Icon', 'woo-quick-view'),
        'type' => 'xticons',
        'choices' => array('types' => array('arrow')),
        'priority' => 10,
        'default' => 'xt_wooqvicon-arrows-22',
        'transport' => 'postMessage',
        'js_vars' => array(
            array(
                'element' => '.xt_wooqv-nav-icon',
                'function' => 'class'
            )
        ),
        'active_callback' => array(
            array(
                'setting' => 'modal_nav_enabled',
                'operator' => '==',
                'value' => '1',
            ),
            array(
                'setting' => 'modal_type',
                'operator' => 'in',
                'value' => array('default'),
            )
        )
    );

    $fields[] = array(
        'id' => 'modal_nav_icon_fullscreen',
        'section' => 'modal-navigation',
        'label' => esc_html__('Navigation Arrows Icon', 'woo-quick-view'),
        'type' => 'xticons',
        'choices' => array('types' => array('arrow-no-bg')),
        'priority' => 10,
        'default' => 'xt_wooqvicon-arrows-22',
        'transport' => 'postMessage',
        'js_vars' => array(
            array(
                'element' => '.xt_wooqv-nav-icon',
                'function' => 'class'
            )
        ),
        'active_callback' => array(
            array(
                'setting' => 'modal_nav_enabled',
                'operator' => '==',
                'value' => '1',
            ),
            array(
                'setting' => 'modal_type',
                'operator' => 'in',
                'value' => array('fullscreen', 'inline'),
            )
        )
    );

    $fields[] = array(
        'id' => 'modal_nav_icon_size',
        'section' => 'modal-navigation',
        'label' => esc_html__('Navigation Arrows Icon Size', 'woo-quick-view'),
        'type' => 'slider',
        'choices' => array(
            'min' => '15',
            'max' => '50',
            'step' => '1',
            'suffix' => 'px'
        ),
        'priority' => 10,
        'default' => '30',
        'transport' => 'auto',
        'screen' => 'desktop',
        'hidden_screens' => array('mobile'),
        'output' => array(
            array(
                'element' => array('.xt_wooqv-nav-icon'),
                'property' => 'font-size',
                'value_pattern' => '$px'
            )
        ),
        'active_callback' => array(
            array(
                'setting' => 'modal_nav_enabled',
                'operator' => '==',
                'value' => '1',
            ),
            array(
                'setting' => 'modal_type',
                'operator' => 'in',
                'value' => array('default'),
            )
        )
    );

    $fields[] = array(
        'id' => 'modal_nav_icon_size_mobile',
        'section' => 'modal-navigation',
        'label' => esc_html__('Navigation Arrows Icon Size', 'woo-quick-view'),
        'type' => 'slider',
        'choices' => array(
            'min' => '15',
            'max' => '50',
            'step' => '1',
            'suffix' => 'px'
        ),
        'priority' => 10,
        'default' => '20',
        'transport' => 'auto',
        'screen' => 'tablet_mobile',
        'hidden_screens' => array('mobile'),
        'output' => array(
            array(
                'element' => array('.xt_wooqv-nav-icon'),
                'property' => 'font-size',
                'value_pattern' => '$px'
            )
        ),
        'active_callback' => array(
            array(
                'setting' => 'modal_nav_enabled',
                'operator' => '==',
                'value' => '1',
            ),
            array(
                'setting' => 'modal_type',
                'operator' => 'in',
                'value' => array('default'),
            )
        )
    );

    $fields[] = array(
        'id' => 'modal_nav_icon_size_fullscreen',
        'section' => 'modal-navigation',
        'label' => esc_html__('Navigation Arrows Icon Size', 'woo-quick-view'),
        'type' => 'slider',
        'choices' => array(
            'min' => '15',
            'max' => '50',
            'step' => '1',
            'suffix' => 'px'
        ),
        'priority' => 10,
        'default' => '20',
        'transport' => 'auto',
        'screen' => 'desktop',
        'hidden_screens' => array('mobile'),
        'output' => array(
            array(
                'element' => array('.xt_wooqv-nav-icon'),
                'property' => 'font-size',
                'value_pattern' => '$px'
            )
        ),
        'active_callback' => array(
            array(
                'setting' => 'modal_nav_enabled',
                'operator' => '==',
                'value' => '1',
            ),
            array(
                'setting' => 'modal_type',
                'operator' => 'in',
                'value' => array('fullscreen', 'inline'),
            )
        )
    );


    $fields[] = array(
        'id' => 'modal_nav_icon_size_fullscreen_mobile',
        'section' => 'modal-navigation',
        'label' => esc_html__('Navigation Arrows Icon Size', 'woo-quick-view'),
        'type' => 'slider',
        'choices' => array(
            'min' => '15',
            'max' => '50',
            'step' => '1',
            'suffix' => 'px'
        ),
        'priority' => 10,
        'default' => '20',
        'transport' => 'auto',
        'screen' => 'tablet_mobile',
        'hidden_screens' => array('mobile'),
        'output' => array(
            array(
                'element' => array('.xt_wooqv-nav-icon'),
                'property' => 'font-size',
                'value_pattern' => '$px'
            )
        ),
        'active_callback' => array(
            array(
                'setting' => 'modal_nav_enabled',
                'operator' => '==',
                'value' => '1',
            ),
            array(
                'setting' => 'modal_type',
                'operator' => 'in',
                'value' => array('fullscreen', 'inline'),
            )
        )
    );

} else {

    $fields[] = array(
        'id' => 'navigation_features',
        'section' => 'modal-navigation',
        'type' => 'xt-premium',
        'default' => array(
            'type' => 'image',
            'value' => $this->core->plugin_url() . 'admin/customizer/assets/images/navigation.png',
            'link' => $this->core->plugin_upgrade_url()
        )
    );
}
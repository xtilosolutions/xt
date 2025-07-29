<?php

$fields[] = array(
    'id' => 'api_description',
    'section' => 'api',
    'type' => 'custom',
    'label' => esc_html__('JS API', 'woo-quick-view'),
    'default' => '<div>'.esc_html__('These JS functions can be used to programmatically control the quick view modal. They can be tested within your browser console.', 'woo-quick-view').'</div>',
    'priority' => 10
);

$fields[] = array(
    'id' => 'api_open_modal',
    'section' => 'api',
    'type' => 'custom',
    'label' => esc_html__('Open Modal', 'woo-quick-view'),
    'default' => '<input readonly="readonly" class="xirki-code-input" value="xt_wooqv_open(product_id)" /> <span class="xt-jsapi" data-function="xt_wooqv_open">Test</span>',
    'priority' => 10
);

$fields[] = array(
    'id' => 'api_close_modal',
    'section' => 'api',
    'type' => 'custom',
    'label' => esc_html__('Close Modal', 'woo-quick-view'),
    'default' => '<input readonly="readonly" class="xirki-code-input" value="xt_wooqv_close()" /> <span class="xt-jsapi" data-function="xt_wooqv_close">Test</span>',
    'priority' => 10
);

$fields[] = array(
    'id' => 'api_is_modal_open',
    'section' => 'api',
    'type' => 'custom',
    'label' => esc_html__('Is Modal Open ?', 'woo-quick-view'),
    'default' => '<input readonly="readonly" class="xirki-code-input" value="xt_wooqv_is_modal_open()" /> <span class="xt-jsapi" data-function="xt_wooqv_is_modal_open">Test</span>',
    'priority' => 10
);

if ($this->core->access_manager()->can_use_premium_code__premium_only()) {

    $fields[] = array(
        'id' => 'api_previous_product',
        'section' => 'api',
        'type' => 'custom',
        'label' => esc_html__('Load Previous Product', 'woo-quick-view'),
        'default' => '<input readonly="readonly" class="xirki-code-input" value="xt_wooqv_previous()" /> <span class="xt-jsapi" data-function="xt_wooqv_previous">Test</span>',
        'priority' => 10
    );

    $fields[] = array(
        'id' => 'api_next_product',
        'section' => 'api',
        'type' => 'custom',
        'label' => esc_html__('Load Next Product', 'woo-quick-view'),
        'default' => '<input readonly="readonly" class="xirki-code-input" value="xt_wooqv_next()" /> <span class="xt-jsapi" data-function="xt_wooqv_next">Test</span>',
        'priority' => 10
    );

    $fields[] = array(
        'id' => 'api_is_first_product',
        'section' => 'api',
        'type' => 'custom',
        'label' => esc_html__('Is it the first product ?', 'woo-quick-view'),
        'default' => '<input readonly="readonly" class="xirki-code-input" value="xt_wooqv_is_first()" /> <span class="xt-jsapi" data-function="xt_wooqv_is_first">Test</span>',
        'priority' => 10
    );

    $fields[] = array(
        'id' => 'api_is_last_product',
        'section' => 'api',
        'type' => 'custom',
        'label' => esc_html__('Is it the last product ?', 'woo-quick-view'),
        'default' => '<input readonly="readonly" class="xirki-code-input" value="xt_wooqv_is_last()" /> <span class="xt-jsapi" data-function="xt_wooqv_is_last">Test</span>',
        'priority' => 10
    );

} else {

    $fields[] = array(
        'id' => 'api_features',
        'section' => 'api',
        'type' => 'xt-premium',
        'default' => array(
            'type' => 'image',
            'value' => $this->core->plugin_url() . 'admin/customizer/assets/images/api.png',
            'link' => $this->core->plugin_upgrade_url()
        )
    );
}
<?php
/**
 * This file is used to markup the product info part of the quick view modal.
 *
 * This template can be overridden by copying it to yourtheme/xt-woo-quick-view/parts/product-info.php.
 *
 * HOWEVER, on occasion we will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see         https://docs.xplodedthemes.com/article/127-template-structure
 * @author 		XplodedThemes
 * @package     XT_Woo_Quick_View/Templates
 * @version     1.8.0
 */
 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<div class="xt_wooqv-item-info">
    <div class="xt_wooqv-item-info-inner">

        <?php do_action('xt_wooqv_product_info'); ?>

    </div>
</div>
	
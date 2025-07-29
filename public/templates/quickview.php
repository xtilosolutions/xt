<?php

/**
 * This file is used to markup the quick view modal.
 *
 * This template can be overridden by copying it to yourtheme/xt-woo-quick-view/quickview.php.
 *
 * HOWEVER, on occasion we will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see         https://docs.xplodedthemes.com/article/127-template-structure
 * @author 		XplodedThemes
 * @package     XT_Woo_Quick_View/Templates
 * @version     1.5.6
 */
 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$fullscreen = xt_wooqv_modal_type_is('fullscreen');
$inline = xt_wooqv_modal_type_is('inline');
?>

<?php if(!$fullscreen && !$inline):?>
<div class="xt_wooqv-overlay"></div>
<?php endif; ?>

<?php if(!$inline):?>
<?php xt_woo_quick_view()->get_template('parts/navigation'); ?>
<?php endif; ?>

<div id="xt_wooqv" class="<?php xt_wooqv_class(); ?>" <?php xt_wooqv_attributes();?>>
	
	<div class="xt_wooqv-product"></div>

    <?php if($inline):?>
    <?php xt_woo_quick_view()->get_template('parts/navigation'); ?>
    <?php endif; ?>

</div>

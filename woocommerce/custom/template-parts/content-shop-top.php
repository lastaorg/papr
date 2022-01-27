<?php
/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package papr
 */
?>

<div class="woocommerce-header-shop">
    <div class="row">
        <div class="col-md-6 col-xs-12">            
            <div class="woocommerce-count">
                <div><?php woocommerce_result_count();?></div>
            </div>
        </div>
        <div class="col-md-6 col-xs-12">
            <div class="woocommerce-sort-list">
                <?php woocommerce_catalog_ordering();?>
            </div>
        </div>
    </div>
</div>
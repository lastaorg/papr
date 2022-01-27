<?php
/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package papr
 */

if (function_exists('bcn_display')) {
    echo '<div class="breadcrumb-wrapper">
			<div class="container">
				<nav aria-label="breadcrumb">';
    bcn_display();
    echo '</nav>
			</div>			
		</div>';
}
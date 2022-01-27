<?php
/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package papr
 */
$axil_socials 			= Helper::socials();
$papr_options 			= Helper::axil_get_options();
$header_top_menu_args 	= Helper::header_top_menu_args();
?>
<div class="header-top bg-grey-dark-one">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md">
                <div class="d-flex flex-row">
                    <?php
                    if ( $papr_options['axil_top_date'] ){?>
                        <ul class="header-top-nav list-inline justify-content-center justify-content-md-start m-r-xs-20">
                            <li class="current-date"><?php echo date('j F, Y'); ?>
                            </li>
                        </ul>
                    <?php } ?>
                    <?php if ( has_nav_menu( 'headertop' ) && $papr_options['header_top_menu_args'] ) {
                        ?>
                        <?php wp_nav_menu( $header_top_menu_args ); ?>
                        <?php
                    } ?>
                </div>

			</div>
		<?php if ( $axil_socials ): ?>
			<div class="col-md-auto">
				<ul class="ml-auto social-share header-top__social-share">
				<?php foreach ( $axil_socials as $axil_social ): ?>
					<li><a target="_blank" href="<?php echo esc_url( $axil_social['url'] );?>"><i class="fab <?php echo esc_attr( $axil_social['icon'] );?>"></i></a></li>
				<?php endforeach; ?>						
				</ul>
			</div>
			<?php endif; ?>
		</div>
		<!-- End of .row -->
	</div>
<!-- End of .container -->
</div>
<!-- End of .header-top -->
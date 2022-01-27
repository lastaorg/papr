<?php
/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package papr
 */

$papr_options 		 = Helper::axil_get_options();	
$axil_footer_logo 	 = Helper::axil_footer_logo();	
$axil_socials 		 = Helper::socials();
$footer_bottom_menu_args = Helper::footer_bottom_menu_args();
?>

<footer class="page-footer bg-grey-dark-key">
	<div class="custom-fluid-container">
		
		<?php if ( 'off' != $papr_options['footer_middle'] && '0' != $papr_options['footer_middle'] ): ?>
			<div class="footer-mid pt-0">
				<div class="row align-items-center">
					<div class="col-md">
						<div class="footer-logo-container">
							<a class="footer-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><img src="<?php echo esc_url( $axil_footer_logo );?>" alt="<?php esc_attr( bloginfo( 'name' ) ) ;?>"></a>									
						</div>
						<!-- End of .brand-logo-container -->
					</div>
					<!-- End of .col-md-6 -->
					<?php if ( $axil_socials ): ?>
						<div class="col-md-auto">
							<div class="footer-social-share-wrapper">
								<div class="footer-social-share">
									<div class="axil-social-title"><?php echo esc_html($papr_options ['social_title']); ?></div>
										<ul class="social-share social-share__with-bg">
											<?php foreach ( $axil_socials as $axil_social ): ?>
												<li><a target="_blank" href="<?php echo esc_url( $axil_social['url'] );?>"><i class="fab <?php echo esc_attr( $axil_social['icon'] );?>"></i></a></li>
											<?php endforeach; ?>								
										</ul>
								</div>
							</div>
							<!-- End of .footer-social-share-wrapper -->
						</div>
					<?php endif; ?>
					<!-- End of .col-md-6 -->
				</div>
				<!-- End of .row -->
			</div>
		<?php endif ?>
		<!-- End of .footer-mid -->
		<div class="footer-bottom">
			<?php if ( has_nav_menu( 'footerbottom' ) && $papr_options['footer_bottom_menu_args'] ) {?>                   
                <?php wp_nav_menu( $footer_bottom_menu_args ); ?>                   
             <?php } ?>
			<!-- End of .footer-bottom-links -->
			<?php if ( $papr_options['copyright_area'] ): ?>	
				<p class="axil-copyright-txt"><?php echo wp_kses_post(  $papr_options['copyright_text'] );?></p>
			<?php endif; ?>	
		</div>
		<!-- End of .footer-bottom -->
	</div>
	<!-- End of .container -->
</footer>




<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Sydney
 */
?>
			</div>
		</div>
	</div><!-- #content -->

	

    <a class="go-top"><i class="fa fa-angle-up"></i></a>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info container">
			<div class="row">
				<div class="col-md-4">
					<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
						<?php get_sidebar('footer'); ?>
					<?php endif; ?>
				</div>
				<div class="col-md-8">
					<div class="contact-form">
						<h4>Send us a message</h4>			
						<?php echo do_shortcode( '[contact-form-7 id="527" title="Send us a message"]' ); ?>		
					</div>
				</div>
			</div>
			<!-- <div class="row">
				<div class="col-md-12">
					<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'sydney' ) ); ?>"><?php printf('© 2016 All rights reserved. Powered By Tbelle Ignite Team'); ?></a>
				</div>
			</div> -->
			
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
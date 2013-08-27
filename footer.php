			<footer class="footer" role="contentinfo">

				<div id="inner-footer" class="wrap clearfix">

					<nav class="footer-links" role="navigation">
						<?php the_field('footer_content', 'option'); ?>
					</nav>
												
					<p class="source-org copyright">Copyright &copy; <?php echo date('Y'); ?> <a title="Consumer Direct" href="http://www.consumerdirectcare.com" target="_blank">Consumer Direct</a>. All rights reserved.</p>

				</div> <!-- end #inner-footer -->

			</footer> <!-- end footer -->

		</div> <!-- end #container -->

		<!-- all js scripts are loaded in library/bones.php -->
		<?php wp_footer(); ?>

	</body>

</html> <!-- end page. what a ride! -->

		<footer id-"mk-footer" class="chrome--footer">
			<a href="http://www.dosomething.org">&lt; Back to DoSomething.org</a>
		</footer>


		<?php
		  do_action( 'side_dashboard');

		  if($mk_options['custom_js']) :

		  ?>
		    <script type="text/javascript">
		    <?php echo stripslashes($mk_options['custom_js']); ?>
		    </script>
		  <?php

		  endif;

		  if($mk_options['analytics']){
		    ?>
		    <script type="text/javascript">
		      var _gaq = _gaq || [];
		      _gaq.push(['_setAccount', '<?php echo stripslashes($mk_options['analytics']); ?>']);
		      _gaq.push(['_trackPageview']);

		      (function() {
		        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		      })();

		    </script>
		  <?php } ?>

		</div>
		<?php
		  do_action('quick_contact');
		  do_action('full_screen_search_form');
		?>
		<?php wp_footer(); ?>

	</body>
</html>

<?php
	global $mk_options;
?>		

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
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', '<?php echo stripslashes($mk_options['analytics']); ?>', 'auto');
          ga('send', 'pageview');
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

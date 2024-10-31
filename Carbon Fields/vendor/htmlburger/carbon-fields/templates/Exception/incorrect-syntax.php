<div class="error carbon-errors-log">
	<a href="#" class="carbon-errors-dismiss"><span class="dashicons dashicons-dismiss" style=" "></span>Dismiss</a>

	<p>Your site seems to be slightly misconfigured. <p><a href="#" class="carbon-errors-expand">Tell me more</a></p> 

	<div class="carbon-errors-more">
		<p>Carbon Fields library encountered errors that may prevent your custom fields or theme options to work properly. Here's a quick summary of the issue<?php echo $plural ?>: </p>

		<ol>
			<?php foreach ( $errors as $error ) :  ?>
				<li><?php echo htmlspecialchars( $error->getMessage() ) ?></li>
			<?php endforeach ?>	
		</ol>

		<p>You might want to get in touch with a developer regarding the issue<?php echo $plural ?>. If you feel adventurous, try enabling <code>WP_DEBUG</code> in your wp-config.php. </p>
	</div>
</div>

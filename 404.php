<?php get_header('404'); ?>

<div class="col-12 text-center">
	<div class="404-message mb-3">
		
		<img src="http://intranet/wp-content/uploads/2018/06/nedry_1.gif" class="img-fluid">
		<!-- <img src="http://intranet/wp-content/images/404-cropped.png" class="img-fluid"> -->
	</div>
	<div class="404-text">
		<samp>Ooops... looks like that page is missing!<br>
	Not to worry! <a href="http://intranet/">Click Here To Go Back Home</a></samp>
	</div>
	<div class="search-form mt-5">
		<?php get_search_form(); ?>
	</div>
	<div class="rpsls mt-5">
		<i class="far fa-hand-rock"></i><i class="far fa-hand-paper"></i><i class="far fa-hand-scissors"></i><i class="far fa-hand-lizard"></i><i class="far fa-hand-spock"></i>
		<br>
	</div>
</div>
<iframe src="http://intranet/nedry.html" allow="autoplay" width="1" height="1"></iframe>

<?php get_footer(); ?>

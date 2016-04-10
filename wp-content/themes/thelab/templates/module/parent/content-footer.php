<?php global $thelab_theme; ?>
<?php global $thelab; ?>
<?php $social_facebook = $thelab['social_facebook']; ?>
<?php $social_twitter = $thelab['social_twitter']; ?>
<?php $social_linkedin = $thelab['social_linkedin']; ?>
<?php $social_youtube = $thelab['social_youtube']; ?>
<?php $social_instagram = $thelab['social_instagram']; ?>

<div class="single-footer">
	<div class="single-footer__row">
		<div class="single-footer__legal">
			<?php $thelab_theme->footer_menu(); ?>
			<ul class="nav-items">
				<li class="nav-items__item">
					<a href="<?php bloginfo('url'); ?>/engage" class="nav-items__item--link">Contact Us</a>
				</li>
				<li class="nav-items__item">
					<a href="http://clinicaltrials.gov" target="_blank" class="nav-items__item--link">Ongoing Clinical Trails</a>
				</li>
				<li class="nav-items__item">
					<a href="<?php bloginfo('url'); ?>/privacy-policy" class="nav-items__item--link">Privacy Policy</a>
				</li>
			</ul>
			<p>&copy; <?php echo date("Y") ?> <?php bloginfo('sitename');?></p>
		</div>
		<div class="single-footer__social">
			<ul class="nav-items">
				<?php if(!empty($social_facebook)): ?>
					<li class="nav-items__item">
						<a href="<?php echo $social_facebook; ?>" target="_blank" class="nav-items__item--link"><i class="icon icon-facebook-square"></i></a>
					</li>
				<?php endif; ?>
				<?php if(!empty($social_twitter)): ?>
					<li class="nav-items__item">
						<a href="<?php echo $social_twitter; ?>" target="_blank" class="nav-items__item--link"><i class="icon icon-twitter-square"></i></a>
					</li>
				<?php endif; ?>
				<?php if(!empty($social_linkedin)): ?>
				<li class="nav-items__item">
					<a href="<?php echo $social_linkedin; ?>" target="_blank" class="nav-items__item--link"><i class="icon icon-linkedin-square"></i></a>
				</li>
				<?php endif; ?>
				<?php if(!empty($social_youtube)): ?>
				<li class="nav-items__item">
					<a href="<?php echo $social_youtube; ?>" target="_blank" class="nav-items__item--link"><i class="icon icon-youtube-square"></i></a>
				</li>
				<?php endif; ?>
				<?php if(!empty($social_instagram)): ?>
				<li class="nav-items__item">
					<a href="<?php echo $social_instagram; ?>" target="_blank" class="nav-items__item--link"><i class="icon icon-instagram"></i></a>
				</li>
				<?php endif; ?>
			</ul>
		</div>
	</div>
</div>
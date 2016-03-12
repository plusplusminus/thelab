<?php 

get_header();


?>

<main class="page-main page-main--single">

<?php get_template_part('templates/module/section','pagehead_default'); ?>

<?php get_template_part('templates/module/page/content'); ?>

<?php get_template_part('templates/module/parent/content','footer'); ?>

</main>

<?php get_template_part('templates/module/section','sidebar-single'); ?>

<?php
	get_footer();
?>
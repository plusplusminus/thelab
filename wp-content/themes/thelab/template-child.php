<?php 

/* Template Name: Child */

get_header();


?>
<main class="page-main">

<?php // get_template_part('templates/module/page/section','hero'); ?>

<?php get_template_part('templates/module/section','child_pagehead'); ?>

<?php get_template_part('templates/module/child/content'); ?>


<?php // get_template_part('templates/module/section','pagenav-inline'); ?>

<?php // get_template_part('templates/module/page/footer'); ?>

</main>

<?php
get_footer();

?>
<?php 

get_header();


?>
<?php get_template_part('templates/module/page/section','pagenav-sticky'); ?>
<main class="page-main">

<?php get_template_part('templates/module/section','pagehead_default'); ?>

<div id="submenu"></div>

<?php get_template_part('templates/module/page/content'); ?>

<?php get_template_part('templates/module/section','footercta'); ?>

<?php get_template_part('templates/module/page/footer'); ?>

</main>

<?php
get_footer();

?>
<?php global $post; ?>

<div class="col-md-3 nav--single" id="sidebar">        
	
  <ul id="sidebarMenu" class="nav">

  <?php $pageID = $post->ID ?>

    <li class="nav-item <?php if ($pageID == 5) { echo "active"; } ?>">
      <a href="<?php bloginfo('url');?>/explore" class="nav-link">Explore</a>
    </li>

    <li class="nav-item <?php if ($pageID == 8) { echo "active"; } ?>">
      <a href="<?php bloginfo('url');?>/explain" class="nav-link">Explain</a>
    </li>

    <li class="nav-item <?php if ($pageID == 10) { echo "active"; } ?>">
    	<a href="<?php bloginfo('url');?>/examine" class="nav-link">Examine</a>
    </li>

    <li class="nav-item <?php if ($pageID == 12) { echo "active"; } ?>">
    	<a href="<?php bloginfo('url');?>/educate" class="nav-link">Educate</a>
    </li>

    <li class="nav-item <?php if ($pageID == 14) { echo "active"; } ?>">
    	<a href="<?php bloginfo('url');?>/engage" class="nav-link">Engage</a>
    </li>

	</ul>
      
</div>  
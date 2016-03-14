<?php global $post; ?>

<div class="col-md-3" id="sidebar">        
	
  <ul id="sidebarMenu" class="nav">

  <?php $pageID = $post->ID ?>

    <li class="nav-item <?php if ($pageID == 5) { echo "active"; } ?>">
      <a href="<?php bloginfo('url');?>/explore" class="nav-link">Explore</a>
    	<ul class="sub-nav">
        <li class="nav-item nav-item--sub"><a href="#section-28" class="nav-link">Our Mission</a></li>
        <li class="nav-item nav-item--sub"><a href="#section-34" class="nav-link">Our Goals</a></li>
        <li class="nav-item nav-item--sub"><a href="#section-36" class="nav-link">Our Vision</a></li>
      </ul>
    </li>

    <li class="nav-item <?php if ($pageID == 8) { echo "active"; } ?>">
      <a href="<?php bloginfo('url');?>/explain" class="nav-link">Explain</a>
      <ul class="sub-nav">
        <li class="nav-item nav-item--sub"><a href="#section-150" class="nav-link">Body Electric</a></li>
        <li class="nav-item nav-item--sub"><a href="#section-50" class="nav-link">Our Science</a></li>
        <li class="nav-item nav-item--sub"><a href="#section-53" class="nav-link">Neurophysiological Assesments</a></li>
        <li class="nav-item nav-item--sub"><a href="#section-55" class="nav-link">Neuromodulation</a></li>
        <li class="nav-item nav-item--sub"><a href="#section-57" class="nav-link">Neurocognitive Assesments</a></li>
      </ul>
    </li>

    <li class="nav-item <?php if ($pageID == 10) { echo "active"; } ?>">
    	<a href="<?php bloginfo('url');?>/examine" class="nav-link">Examine</a>
    	<ul class="sub-nav">
    	  <li class="nav-item nav-item--sub"><a href="#section-66" class="nav-link">Our Research</a></li>
    	  <li class="nav-item nav-item--sub"><a href="#section-68" class="nav-link">Our Explorers</a></li>
    	  <li class="nav-item nav-item--sub"><a href="#section-70" class="nav-link">Neuromodulation Research</a></li>
    	  <li class="nav-item nav-item--sub"><a href="#section-72" class="nav-link">Clinical Research</a></li>
    	</ul>
    </li>

    <li class="nav-item <?php if ($pageID == 12) { echo "active"; } ?>">
    	<a href="<?php bloginfo('url');?>/educate" class="nav-link">Educate</a>
    	<ul class="sub-nav">
    	  <li class="nav-item nav-item--sub"><a href="#section-78" class="nav-link">Our Courses</a></li>
    	  <li class="nav-item nav-item--sub"><a href="#section-80" class="nav-link">Body Electric Webinars</a></li>
    	  <li class="nav-item nav-item--sub"><a href="#section-123" class="nav-link">Clinical Research Global Project</a></li>
    	</ul>
    </li>

    <li class="nav-item <?php if ($pageID == 14) { echo "active"; } ?>">
    	<a href="<?php bloginfo('url');?>/engage" class="nav-link">Engage</a>
    	<ul class="sub-nav">
    	  <li class="nav-item nav-item--sub"><a href="#section-89" class="nav-link">Our Connections</a></li>
          <li class="nav-item nav-item--sub"><a href="#section-200" class="nav-link">Our Center</a></li>
    	  <li class="nav-item nav-item--sub"><a href="#section-92" class="nav-link">Volunteer</a></li>
    	</ul>
    </li>

	</ul>
      
</div>  
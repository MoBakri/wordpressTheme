<?php  $cat = get_the_category();
  /*  echo '<pre>';
    print_r($cat);
    echo '</pre>';*/ ?>
<nav aria-label="breadcrumb"> 
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo get_home_url();?>">Home</a></li> 
    <li class="breadcrumb-item"><a href="<?php esc_url(get_category_link($cat[0]->term_id));?>">
        <?php
     // 
       echo $cat[0]->name;  
      ?>
        </a>
      </li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo get_the_title(); ?></li>
  </ol>
</nav>
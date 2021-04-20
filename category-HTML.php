
<?php get_header();?>

<div class="main-container">
<div class="cat-title"><?php single_cat_title()?></div>
    <div class="row">
        <div class="col-lg-8">
    <?php
    if (have_posts()) :
    while (have_posts()) :
    the_post();?>
        
            <div class="main-post">

                <h3 class="post-title" id="post-<?php the_ID(); ?>" >
                  <a href="<?php the_permalink();?>" >
                   <?php the_title();?>
                   </a>
                 </h3>
                <span class="post-author"><i class="fas fa-user fa-sm "></i> <?php the_author_posts_link(); ?></span>

                <span class="post-date"><i class="fas fa-clock" ></i> <?php the_time('F j, Y'); ?></span>
                <span class="post-commend"><i class="fas fa-comments fa-sm fa-lg"></i> <?php comments_popup_link('No comment', '1 Comment', '% Comments', 'comments-link', 'Comments Disable')?></span>
                <?php the_post_thumbnail('medium_large'); ?>
                <?php the_excerpt();?>
            </div>
        
     <?php
        endwhile; // End while loop 
        endif;// End if loop 
     ?>
   </div>
        <div class="col-lg-3">
            <div class="sidebar-cat">
                <?php /*
                  if(is_active_sidebar('main-sidebar')) {
                      dynamic_sidebar('main-sidebar');
                  }*/ 
                ?>
                
                <?php get_sidebar('HTML'); 
                ?>
            </div>
        </div>
    </div>
</div>

      


<?php get_footer(); ?>
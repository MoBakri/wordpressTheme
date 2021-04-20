<?php get_header(); ?>


<div class="main-container">

    <div class="row">
    <?php
    if (have_posts()) :
    while (have_posts()) :
    the_post();?>
        <div class="col-sm-6">
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
                 <hr>
                <p class="categories"><i class="fas fa-tags fa-sm"></i><?php the_category(', '); ?> </p>
                <p><?php if(has_tag()){
                 the_tags('<spna class="post-tags">tags: ',', ','</span>');
                  } else{
                  echo '<span class="post-tags"> tags: No tags</span>';
} ?></p>
            </div>
        </div>
    <?php
    endwhile;
    endif;
    ?>
  
         <?php
         echo pagenation_function();
          // echo '<div class="pagination">';
          // if ( get_previous_posts_link() ) {
          //     previous_posts_link('<i class="fas fa-chevron-left fa-fw"></i>Prev');
          // } else {
          //   echo '<span class="post-gesture-previous"> prev </span>';
          // }
          // if ( get_next_posts_link() ) {
          //     next_posts_link(' Next<i class="fas fa-chevron-right fa-fw"></i>');
          // } else {
          //   echo '<span class="post-gesture-next"> Next </span>';
          // }
          // echo '</div>';
          ?>

    </div>
</div>

<?php get_footer(); ?>

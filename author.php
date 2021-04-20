<?php
/*
 * The template for displaying the author informations
 *
 * @package WordPress
 * @subpackage MoBakri
 * @since MoBakri 1.0
 */
get_header(); ?>


<div class="container author-page">
  <div class="author-main-info-nickname">Nick Name: <?php echo the_author_meta('nickname');?></div>

  <div class="row">
      <div class="col-md-3">  <!-- grid for aratar -->
          <?php
            $arg_avatar = array(
              'class'=>'the-avatar-class'
               );
            echo get_avatar(get_the_author_meta('ID'), 197,'','the author image', $arg_avatar);
          ?>                <!-- aravar code -->
      </div>
    <div class="col-md-9">   <!-- grid for author info  -->
      <ul class="author-page-info">  <!--author info page -->
          <li>First Name: <?php echo the_author_meta('first_name');?></li>
          <li>Last Name: <?php echo the_author_meta('last_name');?></li>

          <li>Bio: <?php
          if (get_the_author_meta('description')) {
          the_author_meta('description');
          } else {
          echo 'No Bio';
          }
          ?></li>
      </ul>
  </div>
  <hr>
      <div class="row avatar-info-count">    <!-- grid for author count post numbers  -->
         <div class="col-md-4">
            <div class="author-stat">
                Post Count <span><?php echo the_author_posts('ID')?></span>
            </div>
        </div>
        <div class="col-md-4">
          <div class="author-stat">
             Comment Count
             <span>
                <?php echo get_comments(array(
                     'user_id'  => get_the_author_meta('ID'),
                      'count'   => true
                  ));
                ?>
              </span>
           </div>
        </div>
        <div class="col-md-4">
            <div class="author-stat">
                Testing <span>0</span>
            </div>
        </div>
     </div>
</div>

    <div class="container" author-post-page>
      <div class="row">

          <?php
          function num_author_posts() {
            return get_the_author_posts();
          };

          $post_per_page = 6;
          // the query
          $author_posts_args = array(
          'author'         => get_the_author_meta("ID"),
          'posts_per_page' => $post_per_page     // -1 gets all the author posts
          );
          $author_posts = new WP_Query( $author_posts_args );
          ?>
          <div class="author-main-info-nickname author-brief-posts">
            <?php
           if($post_per_page < num_author_posts()) {
           ?>
            last <?php echo $post_per_page;?> Posts for <?php echo the_author_meta('nickname');
          }
           else { echo 'Latest Post';}

           ?>
           </div>
          <?php
          if ($author_posts->have_posts()) :
          while ($author_posts->have_posts()) :
            $author_posts->the_post();?>
        <div class=" col-md-3 thumbnail-author-page">
          <?php the_post_thumbnail('medium_large'); ?>
        </div>
          <div class="col-md-9">
              <div class="main-post author-info-post-page">
                   <span class="edit-author"><?php edit_post_link('Edit','', '<i class="fas fa-edit"></i>');?></span>
                  <h3 class="post-title" id="post-<?php the_ID(); ?>" >
                      <a href="<?php the_permalink();?>" >
                      <?php the_title();?>
                      </a>
                  </h3>
                      <span class="post-date"><i class="fas fa-clock" ></i> <?php the_time('F j, Y'); ?></span>
                      <span class="post-commend"><i class="fas fa-comments fa-sm fa-lg"></i> <?php comments_popup_link('No comment', '1 Comment', '% Comments', 'comments-link', 'Comments Disable')?></span>
                      <?php the_excerpt();?>
              </div>

          </div>

          <?php

          endwhile;
          endif;
          wp_reset_postdata(); // to reset the loop

          $comment_per_page = 4;
          // the query
          $comments_posts_args = array(
              'user_id'      => get_the_author_meta("ID"),
              'status'       => 'approve',
              'post_status'  => 'any',
              'number'       => $comment_per_page,
              'post_type'    => 'post'
          );

         
          $comments = get_comments($comments_posts_args);
          
         ?>
          <div class="container comments-author-page">
            <?php
            $comment_count = array(
              'user_id'  => get_the_author_meta('ID'),
               'count'   => true
           );
            if (get_comments($comment_count) >= $comment_per_page) {
              ?><div class="author-main-info-nickname author-brief-posts">Lastest <?php echo $comment_per_page;?> Comments for <?php echo the_author_meta('nickname');?></div>
           <?php
            } else {
              ?><div class="author-main-info-nickname author-brief-posts">Lastest Comments for <?php echo the_author_meta('nickname');?></div>
<?php
            }
              
          foreach ($comments as $comment) {
          ?>


                    <div class="row comment-breif-author">

                        <div class="col-md-2 author-breif-title">
                                <a href="<?php the_permalink($comment->comment_post_ID);?>" ><?php echo get_the_title  ($comment->comment_post_ID);?></a>
                               
                        </div>
               
                        <div class="col-md-8 author-breif-content"><?php echo $comment->comment_content;?>
                        
                        </div>
                        <div class="col-md-2 author-breif-date"><?php echo mysql2date('l, F j, Y' , $comment->comment_date);?></div>
                    </div>
                    <?php } if (get_comments($comment_count) == 0 ) {
                      echo '<div class="no-comments">No Comments</div>';}?>
          
               </div>
       </div>
    </div>

<?php get_footer(); ?>

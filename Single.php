<?php
/*
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
get_header(); 
include(get_template_directory().'/includes/breadcrumb.php');
?>

  <div class="main-container">

  <?php
  if (have_posts()) :
  while (have_posts()) :
  the_post();?>
    <div class="row">
     <div class="col-md-8 main-post">

        <h3 class="post-title" id="post-<?php the_ID(); ?>" >
            <a href="<?php the_permalink();?>" >
            <?php the_title();?>
            </a>
        </h3>
            <span class="post-author"><i class="fas fa-user fa-sm "></i> <?php the_author_posts_link(); ?></span>

            <span class="post-date"><i class="fas fa-clock" ></i> <?php the_time('F j, Y'); ?></span>
            <span class="post-commend"><i class="fas fa-comments fa-sm fa-lg"></i> <?php comments_popup_link('No comment', '1 Comment', '% Comments', 'comments-link', 'Comments Disable')?></span>
            <?php the_post_thumbnail('medium_large'); ?>
            <?php the_content();?>
        <hr>
            <p class="categories"><i class="fas fa-tags fa-sm"></i><?php the_category(', '); ?> </p>
            <p><?php if(has_tag()){
            the_tags('<spna class="post-tags">tags: ',', ','</span>');
            } else{
            echo '<span class="post-tags"> tags: No tags</span>';
            } ?></p>
        <hr>
            <div class="avatar-section">
            <?php
            $arg_avatar = array(
            'class'=>'the-avatar-class'
            );
            echo get_avatar(get_the_author_meta('ID'), 64,'','the author image', $arg_avatar);?>
            <div class="my-author">
            <?php the_author_posts_link();?>
            </div>
            <p class= "post-count"><?php printf( __( 'Number of posts published by user: %s posts', 'textdomain' ), count_user_posts(get_the_author_meta('ID')) ); ?></p>
            </div>
        <hr>
    </div>
   
  
      <div class="col-md-3">
         <?php 
          if (is_active_sidebar('main-sidebar')){
              dynamic_sidebar('main-sidebar');
          }
          
          ?>
      </div>
        </div>
</div>
<?php
endwhile;
endif;
?>
<!-- to add the comment in single post -->

<?php // If comments are open or we have at least one comment, load up the comment template.
if ( comments_open() || get_comments_number() ) :
comments_template();
endif;
?>   <!-- the end of the Condition;-->

<?php

$comment_arg = array(
'fields' => array(
'author' =>'<div class=" com-author"><label>You Name</label><input class="form-control"></div>',
'email'  => '<div class="com-email"><label>Email</label><input class="form-control"></div>',
'url'    => '<div class="com-url"><label>Your Website</label><input class="form-control"></div>'
),
'comment_field' => '<div class="form-group"><textarea class="textarea-field" name="comment" maxlength="65525" required="required" placeholder="Comment"></textarea></div>',
'class_submit'=>'mo-submit-form btn btn-primary',
'title_reply'=>'Replay'


);
// comment_form(arr $args)  => to add a custom comment area
// if you wanna add a default template of comment that offerd by
// wordpress you can just type comment_form() and it will add
// textarea , name , email and website fields .
//
comment_form($comment_arg);

?>


<!--
<div class="col sidebar">

get_sidebar(); ?>

</div> -->
<!--  End of the side Bar  -->


<?php

echo '<div class="pagination">';
if ( get_previous_post_link() ) {
previous_post_link('%link', '<i class="fas fa-chevron-left fa-fw"></i> %title');
} else {
echo '<span class="post-gesture-previous"><i class="fas fa-chevron-left fa-fw"></i> prev </span>';
}
if ( get_next_post_link() ) {
next_post_link('%link', '%title <i class="fas fa-chevron-right fa-fw"></i> ');
} else {
echo '<span class="post-gesture-next"> Next <i class="fas fa-chevron-right fa-fw"></i> </span>';
}
echo '</div>';



?>

<?php

$mo_query = new wp_query(array('posts_per_page'      => 3,
                                'orderby'            => 'rand',
                                'category__in'   => wp_get_post_categories(get_queried_object_id()),
                                'post__not_in'   => array(get_queried_object_id())
));
if ($mo_query->have_posts()):
    while($mo_query->have_posts()):
       ?> <?php $mo_query->the_post();?> <h3 class="post-title" id="post-<?php the_ID(); ?>" >
       <a href="<?php the_permalink();?>" >
       <?php the_title();?>
       </a>
   </h3>
   <?php the_post_thumbnail(array(100, 200)); ?>
<?php
    endwhile;
endif;

?>


</div>
<?php get_footer(); ?>

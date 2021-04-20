<?php

// Get Category commenets count 

$comments_args = array(
   'status' => 'approve' // only Approved comments 
);
$comment_count = 0; // start From Zero 
$all_comment = get_comments($comments_args); // Get All Comment
foreach ($all_comment as $comment){   //loop Though All Comment
$post_id = $comment->comment_post_ID;
if (! in_category('HTML',$post_id)){continue;}    
$comment_count++;
}

// Get category  postd count
$cat = get_queried_object(); //RETRIEVE THE CUTTENTLY OBJRCT
$Article = $cat->count;

?>

<div class="main-sidebar">
<div class="content-sidebar">
<h3 class="widget-sidbar-title"><?php single_cat_title()?> statistics</h3>
    <div class="widget-content">
        <ul>
        <li><span>Comment Counts</span> :<?php echo $comment_count;?></li>
        <li><span>Article Counts</span> : <?php echo $Article ;?></li>
        </ul>
    </div>
</div>
    <div class="content-sidebar">
        <h3 class="widget-sidbar-title">Others POSTS</h3>
       <ul>
           <?php
             $post_args = array(
                'cat' => 7,
                 'posts_per_page' => 3,
                 
             );
            $query = new WP_Query($post_args);
        if ($query->have_posts()) {
            while($query->have_posts()) {
                $query->the_post();?>   
               <li> <a href="<?php the_permalink()?>"><?php the_title();?></a></li>
                <?php
            }
        }
            ?>   
        </ul>
</div>   
    <div class="content-sidebar">
<h3 class="widget-sidbar-title">THE MUST POPULAR POST</h3>
    <div class="widget-content">
        <?php
         $post_args = array(
                'Orderby' => 'comment_count',
                 'posts_per_page' => 1,
                 
             );
         $query = new WP_Query($post_args);
        if ($query->have_posts()) {
            while($query->have_posts()) {
                $query->the_post();?>
        <li> <a href="<?php the_permalink()?>"><?php the_title();?></a>
            <hr>
            The number of the comment is: <?php comments_popup_link('No comment', '1 Comment', '% Comments', 'comments-link', 'Comments Disable');
            ?> </li>
        <?php } } ?>
        
     </div>
</div>   
</div>

















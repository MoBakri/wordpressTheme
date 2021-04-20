<?php

// Get Category commenets count 

$comments_args = array(
   'status' => 'approve' // only Approved comments 
);
$comment_count = 0; // start From Zero 
$all_comment = get_comments($comments_args); // Get All Comment
foreach ($all_comment as $comment){   //loop Though All Comment
$post_id = $comment->comment_post_ID;
if (! in_category('cat_slug ',$post_id)){continue;}    
$comment_count++;
}


// Get category  postd count
$cat = get_queried_object(); //

echo '<pre>';
print_r($cat);
echo '</pre>';
?>

<div class="main-sidebar">
<div class="content-sidebar">
<h3 class="widget-sidbar-title">widget title</h3>
    <div class="widget-content">Widget Content</div>
</div>
    <div class="content-sidebar">
<h3 class="widget-sidbar-title">widget title</h3>
    <div class="widget-content">Widget Content</div>
</div>   
    <div class="content-sidebar">
<h3 class="widget-sidbar-title">widget title</h3>
    <div class="widget-content">Widget Content</div>
</div>   
</div>
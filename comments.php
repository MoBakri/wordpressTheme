<?php

if (comments_open()) {
echo '<h3 class="comment-number">'; // bootstrap list-unstyled;
  comments_number();
echo '</h3>';
echo '<ul class="list-comment list-unstyled">';
wp_list_comments( $args = array(
                    'max_depth'   => 3,
                    'type'        => 'comment',
                    'avatar_size' => 64,
                  //  'reverse_top_level' => true,

));
echo '</ul>';
}else {
  echo 'the comments featured are disable';
}

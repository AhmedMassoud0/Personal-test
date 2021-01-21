<?php

    if (comments_open()) {  // Check If Comments Are Open ?>

        <h3 class="comments-title"><?php comments_number() ?></h3>

        <?php

        echo '<ul class="list-unstyled comments-list">';
        $comments_arguments = array(    // Comments Arguments
            'max_depth' => 3,       // Comments Level
            'type' => 'comment',    // Comment Type
            'avatar_size' => 40     // Avatar Size By Pixels

        );

            wp_list_comments($comments_arguments);  // List All Comments
        
        echo '</ul>';

        echo '<hr class="comment-separator">';


        $commentform_arguments = array(
            'title_reply' => 'Add Your Comment',
            'fields' => array(
                'autor' => '<div class="form-group"><lable><span class="fields-title">Name *</span></lable> <input class="form-control"></div>',
                'email' => '<div class="form-group"><lable><span class="fields-title">Email *</span><span class="fields-msg">( Your email address will not be published )</span></lable> <input class="form-control"></div>',
                'url'   => '<div class="form-group"><lable><span class="fields-title">Website *</span><span class="fields-msg">( Your Website address will not be published )</span></lable> <input class="form-control"></div>'

            ),

            'comment_notes_before' => '',
            'label_submit' => 'Send',
            'submit_button' => '<input name="submit" type="submit" id="submit" class="btn btn-primary" value="Send">'
        );

        comment_form($commentform_arguments);
        

    }else { // If Comment Are Disable

        echo 'Comments Are Desable';

    };





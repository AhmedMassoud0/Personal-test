        <?php 
                    $thumbnail_array = array(   // the Img Array To Easy Read The Code In Col-> {86}
                        'class' => 'img-responsive img-thumbnail',
                        'title' => 'Post Iamge'
                    );
        ?> 
<?php get_header() ?><br>
<div class="container author-page">
    <div class="author-main-info">
        <h1 class="profile-header text-center"><span class="nickname"> <?php the_author_meta('nickname') // Print Nick Name ?> Page</span></h1>
        <!-- Start row -->
        <div class="row">
            <div class="col-md-3">
                <?php
                            $avatar_arguments = array(  //Avatar Arguments 
                    'class' => 'img-responsive img-thumbnail center-block'
                    );

                    //  get_avatar('Id Or Email', 'Size', 'Defualt', 'Alternate Text', 'Image Arguments')

                    echo get_avatar(get_the_author_meta('ID'), 220, '', 'User Avatar', $avatar_arguments) 
                ?>
            </div>
            <div class="col-md-9">
                <ul class="list-unstyled">
                    <li><span>First Name: </span><?php the_author_meta('first_name') // Print First Name ?></li>
                    <li><span>Last Name: </span><?php the_author_meta('last_name') // Print First Name ?></li>
                    <li><span>Nick Name: </span><?php the_author_meta('nickname') ?></li>
                </ul>
                <hr class="comment-separator">
                <p class="lead">
                    <?php the_author_meta('description') ?>
                </p>
            </div>
        </div>    
    </div>
    <!-- End row -->
    <!-- Start row -->

        <div class="row author-stats">
            <div class="col-md-4">
                <div class="stats">
                Posts Count
                    <span><?php echo count_user_posts(get_the_author_meta('ID'))?></span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stats">
                    Comments Count
                    <span>
                        <?php
                        
                            $comments_count_argument = array(

                                'user-id'  => get_the_author_meta('ID'),
                                'count'    => true

                            );

                            echo get_comments($comments_count_argument);

                        ?>
                    </span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stats">
                    Total Posts View
                    <span>113</span>
                </div>
            </div>
        </div>
    <!-- End row -->
    


    <?php

            $author_posts_per_page = 10;

            $author_posts_arguments = array( // This Array For Query author posts function in Col 87 (maybe)

                'author'         => get_the_author_meta('ID'),
                'posts_per_page' => $author_posts_per_page

            ); 


            $author_posts_query = new WP_Query($author_posts_arguments);

            ?>
    <!-- Start row -->
        <div class="row">

            <?php 
                if ($author_posts_query->have_posts()) { // Check if There's Posts ?>
                    
                    <div class="nickname-posts-container">
                        <h3>
                            <?php 

                            //Check If Users Posts Larger Than Or Equal Posts Pet Page
                            if (count_user_posts(get_the_author_meta('ID')) >= $author_posts_per_page) {

                                // Echo Latest Posts Page
                                echo 'Lastest ' . $author_posts_per_page . ' Posts Of ';

                                // Echo NickName
                                the_author_meta('nickname');
                            } else {

                                // Echo Latest Posts Without Umber
                                echo 'Latest Posts Of ';

                                //Echo Nick Name
                                the_author_meta('nickname');

                            }

                            ?>
                        </h3>
                    </div>


                    <?php 


                    while ($author_posts_query->have_posts()) { // Loop Throught Posts
                        
                        $author_posts_query->the_post(); ?>
                            <div class="container-of-author-posts-page">
                                <div class="col-sm-2 thumbnail-author-div">
                                    <?php the_post_thumbnail('', $thumbnail_array); ?>
                                </div>
                                <div class="col-sm-10 title-author-div">
                                    <h3 class="post-title">
                                        <a href="<?php the_permalink() ?>">
                                            <?php the_title() ?>
                                        </a>
                                    </h3>
                                    <span class="post-date"><i class="fa fa-calendar fa-fw"></i>
                                        <span class="post-words"><?php the_time('F j, Y'); ?></span> - 
                                    </span>
                                    <span class="post-comments"><i class="fa fa-comments fa-fw"></i>
                                        <span class="post-words"><?php comments_popup_link('No Comments', '1 comment', '% Comments', 'comment-url', 'Comments Desabled'); ?></span>
                                    </span>
                                    
                                    <div class="post-content">
                                        <!-- <?php the_content('.....'); ?> -->
                                        <?php the_excerpt() ?>
                                        <a href="<?php echo get_permalink() ?>">...... </a>
                                    </div>
                                </div>
                            </div>
                        <?php 
                    }; // End While Loop

                }; // End If Condition

                // Reset Loop >>> (WP_Query)
                wp_reset_postdata();

                

                $comments_posts_per_page = 8;

                $comments_posts_arguments = array( // This Array For Query author posts function in Col 87 (maybe)
    
                    'user_id'       => get_the_author_meta('ID'),
                    'status'        => 'approve',
                    'number'        => $comments_posts_per_page,
                    'post_stats'    => 'publish',
                    'post_type'     => 'post'

                ); 

                $comments = get_comments($comments_posts_arguments);

                //  $comment->comment_post_ID

                if ($comments) {    ?>

                    <div class="nickname-comments-container">
                        <h3>
                            <?php

                                //Check If Users Comment Larger Than Or Equal Posts Pet Page
                            if (get_comments($comments_count_argument) >= $comments_posts_per_page) {

                                // Echo Latest Comment Page
                                echo 'Lastest ' . $comments_posts_per_page . ' Comments Of ';

                                // Echo NickName
                                the_author_meta('nickname');


                            } else {

                                    // Echo Latest Posts Without Umber
                                    echo 'Latest Comment Of ';
    
                                    //Echo Nick Name
                                    the_author_meta('nickname');
    
                            };

                            ?>
                        </h3>
                    </div>

                    <?php 


                    foreach ($comments as $comment) {   ?>

                        <div class="author-comments">

                            <h3 class="post-title">
                                <a href="<?php echo get_permalink($comment->comment_post_ID) ?>">
                                    <?php echo get_the_title($comment->comment_post_ID) ?>
                                </a>
                            </h3>

                            <span class="post-date">
                                <i class="fa fa-calendar fa-fw"></i>
                                <?php echo 'Added On ' . mysql2date('l, F j, Y', $comment->comment_date); ?>
                            </span>

                            <div class="post-content">
                                <?php echo $comment->comment_content ?>
                            </div>

                        </div>

                        <?php

                    } // End Foreach
                    
                } else {

                }   ?>

            
                

        </div>
        
    <!-- End row -->
    </div>

<?php get_footer() ?>

<?php get_header(); ?>



<div class="page-content">
    <div class="container single-page">
            <?php

                if (have_posts()) { // Check if There's Posts

                    while ( have_posts()) { // Loop Throught Posts

                        the_post(); ?>

                            <div class="main-post single-post">
                            <?php edit_post_link('Edit <i class="fa fa-pencil fa-fw fa-lg"></i>') ?>
                                <h3 class="post-title">
                                    <a href="<?php the_permalink() ?>">
                                        <?php the_title() ?>
                                    </a>
                                </h3>
                                <span class="post-author"><i class="fa fa-user fa-fw"></i>
                                    <span class="post-words"><?php the_author_posts_link(); ?></span> - 
                                </span>
                                <span class="post-date"><i class="fa fa-calendar fa-fw"></i>
                                    <span class="post-words"><?php the_time('F j, Y'); ?></span> - 
                                </span>
                                <span class="post-comments"><i class="fa fa-comments fa-fw"></i>
                                    <span class="post-words"><?php comments_popup_link('No Comments', '1 comment', '% Comments', 'comment-url', 'Comments Desabled'); ?></span>
                                </span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <?php the_post_thumbnail('', ['class' => 'img-responsive img-thumbnail', 'title' => 'Post Image']); ?>
                                    </div>
                                    <div class="col-lg-6">
                                    <hr class="comment-separator">
                                        <div class="post-content">
                                            <?php the_content() ?>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <p class="post-categories">
                                <i class="fa fa-tags fa-fw fa-lg"></i>
                                    <?php the_category(' '); ?>
                                </p>
                                <p class="post-tags">
                                <?php
                                    if (has_tag()) {
                                        the_tags();
                                    }else {
                                        echo 'No Tags Selected';
                                    }
                                ?>
                                </p>
                            </div>

                            <?php 

                    }; // End While Loop

                }; // End If Condition

                
                
                //  Get Post ID  =>  echo get_queried_object_id();

                //  Get The Categories  =>  wp_get_post_categories(get_queried_object_id());

                ?>
                
                
                
                <?php

    
                $random_posts_arguments = array( // This Array For Query author posts function in Col 87 (maybe)
                    
                    'posts_per_page' => '4',
                    'orderby' => 'rand',
                    'category__in' => wp_get_post_categories(get_queried_object_id()),
                    'post__not_in' => array(get_queried_object_id())
                ); 
    
    
                $random_posts = new WP_Query($random_posts_arguments); ?>
    


                    
    <h3 class="similar-title">Similar Topics</h3>
                    <div class="container">
                        <div class="row">
                            <?php
                                if ($random_posts->have_posts()) { // Check if There's Posts ?>
                                    <?php
                                    while ($random_posts->have_posts()) { // Loop Throught Posts  ?>
                                            <div class="col-sm-4">
                                            <?php $random_posts->the_post(); ?>
                                                <div class="similar-post-content">
                                                    <h3 class="post-title">
                                                        <a href="<?php the_permalink() ?>">
                                                            <?php the_title() ?>
                                                        </a>
                                                    </h3>
                                                    <hr>
                                                </div>
                                            </div>
                                        <?php 
                                    }; // End While Loop?>
                        </div>
                    </div>
                            <?php
                                // End If Condition
                                } else {
                                    echo 'There are no similar topics in this section';
                                }
                            ?>



















                <!-- Start row  -->
                <div class="container">
                    <div class="row author-info">
                        <div class="col-md-2">
                            <?php 

                            $avatar_arguments = array(  //Avatar Arguments 

                                'class' => 'img-responsive img-thumbnail center-block'

                            );

                            //  get_avatar('Id Or Email', 'Size', 'Defualt', 'Alternate Text', 'Image Arguments')

                                echo get_avatar(get_the_author_meta('ID'), 90, '', 'User Avatar', $avatar_arguments) 
                            
                            ?>
                        </div>

                        <div class="col-md-10">
                            <h4>
                                <?php the_author_meta('first_name') ?> 
                                <?php the_author_meta('last_name') ?> 
                                (<span class="nickname"> <?php the_author_meta('nickname') ?> </span>)
                            </h4>
                            <p class="lead">
                                <?php the_author_meta('description') ?>
                            </p>
                        </div>
                        <p class="author-stats">
                        <i class="fa fa-bolt fa-fw"></i> User Posts Count: <span class="posts-count"><?php echo count_user_posts(get_the_author_meta('ID')) ?> </span><br>
                        <i class="fa fa-user fa-fw"></i>Profile:  <?php echo the_author_posts_link() ?>
                        </p>
                    </div>
                </div>

                <!-- End row -->

                <hr class="comment-separator">

                
                <?php

                

                echo '<div class="post-pagination">';

                if (get_previous_post_link()) {
                    previous_post_link('%link', 'Old Articles');
                }else {
                    echo '<span>Old Article</span>';
                };

                if (get_next_post_link()) {
                    next_post_link('%link', 'New Articles');
                }else {
                    echo '<span>New Article</span>';
                };

                echo '<hr class="comment-separator">';
                
                echo '</div>';

                
                    comments_template();
                

            ?>
    </div>
</div>








<?php get_footer(); ?>

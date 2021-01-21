
<?php get_header(); ?>



<div class="page-content">
    <div class="container home-page">
        <div class="row">
            <div class="col-sm-12 text-center catrgory-information">
                <div class="col-md-12">
                    <h1 class="category-title"><?php single_cat_title() ?> Section</h1>
                </div>
                <div class="col-md-12 category-description-container">
                    <p class="lead category-description"><?php echo category_description() ?></p> 
                </div>
                <div class="col-md-12">
                    <div class="cat-stats">
                        <span>Articles Count: 20</span>
                        <span>Comment Count: 290</span>
                    </div>
                </div>
            </div>

            <?php

                if (have_posts()) { // Check if There's Posts

                    while ( have_posts()) { // Loop Throught Posts

                        the_post(); ?>

                        <div class="col-sm-4">
                            <div class="main-post">
                                <h3 class="post-title">
                                    <a href="<?php the_permalink() ?>">
                                        <?php the_title() ?>
                                    </a>
                                </h3>
                                <span class="col-md-6 post-author"><i class="fa fa-user fa-fw"></i>
                                    <span class="post-words"><?php the_author_posts_link(); ?></span>
                                </span>
                                <span class="col-md-6 post-date"><i class="fa fa-calendar fa-fw"></i>
                                    <span class="post-words"><?php the_time('F j, Y'); ?></span> -
                                </span>
                                <span class="col-md-6 post-comments"><i class="fa fa-comments fa-fw"></i>
                                    <span class="post-words"><?php comments_popup_link('No Comments', '1 comment', '% Comments', 'comment-url', 'Comments Desabled'); ?></span>
                                </span>
                                <?php the_post_thumbnail('', ['class' => 'img-responsive img-thumbnail', 'title' => 'Post Image']); ?>
                                <div class="post-content">
                                    <!-- <?php the_content('Read More...'); ?> -->
                                    <?php the_excerpt() ?>
                                    <a href="<?php echo get_permalink() ?>"> Read More... </a>
                                    
                                </div>
                                <hr class="comment-separator">
                                <p class="post-categories">
                                <i class="fa fa-tags fa-fw fa-lg"></i>
                                    <?php the_category(' - '); ?>
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
                        </div>

                        <?php 

                    }; // End While Loop

                }; // End If Condition

                echo '<div class="post-pagination">';

                if (get_previous_posts_link()) {
                    previous_posts_link('<i class="fa fa-chevron-left fa-fw fa-lg"></i> Prev');
                }else {
                    echo '<span><i class="fa fa-chevron-left fa-fw fa-lg"></i> Prev</span>';
                };

                if (get_next_posts_link()) {
                    next_posts_link('Next <i class="fa fa-chevron-right fa-fw fa-lg"></i>');
                }else {
                    echo '<span>Next <i class="fa fa-chevron-right fa-fw fa-lg"></i></span>';
                };

                echo '</div>';

                echo numbering_pagination();






            ?>
        </div>
    </div>
</div>





<?php get_footer(); ?>

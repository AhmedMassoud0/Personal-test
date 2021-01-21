
<?php get_header(); ?>



<div class="page-content container-categories">
    <div class="home-page linux-category">

        <div class="row">
            <div class="col-sm-12 catrgory-information">
                <div class="">
                    <h1 class="category-title"><?php single_cat_title() ?> Section</h1>
                </div>
                
                <div class="col-md-6">
                    <p class="lead"><?php echo category_description() ?> Cool</p> 
                </div>

                <div class="col-md-6">
                    <div class="count-information-category">
                        <span>Articles Count: 20</span>
                        <span>Comment Count: 297</span>
                    </div>
                </div>
            </div>
            <div class="col-md-9">

            <?php

                if (have_posts()) { // Check if There's Posts

                    while ( have_posts()) { // Loop Throught Posts

                        the_post(); ?>
                        <div class="main-post">
                            <div class="row">
                                <div class="col-md-6">
                                    <?php the_post_thumbnail('', ['class' => 'img-responsive img-thumbnail', 'title' => 'Post Image']); ?>
                                </div>
                                <div class="col-md-6">
                                    <h3 class="post-title">
                                        <a href="<?php the_permalink() ?>">
                                            <?php the_title() ?>
                                        </a>
                                    </h3>
                                    <span class="col-md-6 post-author"><i class="fa fa-user fa-fw"></i>
                                        <span class="post-words"><?php the_author_posts_link(); ?></span>
                                    </span><br>
                                    <span class="col-md-6 post-date"><i class="fa fa-calendar fa-fw"></i>
                                        <span class="post-words"><?php the_time('F j, Y'); ?></span> -
                                    </span><br>
                                    <span class="col-md-6 post-comments"><i class="fa fa-comments fa-fw"></i>
                                        <span class="post-words"><?php comments_popup_link('No Comments', '1 comment', '% Comments', 'comment-url', 'Comments Desabled'); ?></span>
                                    </span>
                                    <div class="post-content">
                                        <!-- <?php the_content('Read More...'); ?> -->
                                        <?php the_excerpt() ?>
                                        <a href="<?php echo get_permalink() ?>"> Read More... </a>
                                    </div>
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
                ?>

            </div>  <!-- End Col-md-9 -->

            <div class="col-md-3">
                
                <?php

                get_sidebar('linux');

                /*
                    if (is_active_sidebar('main-sidebar')) {
                        dynamic_sidebar('main-sidebar');
                    }
                */
                ?>

            </div>


            <div class="pagination-numbers">
                <?php  echo numbering_pagination(); ?>
            </div>



            
        </div>
    </div>
</div>





<?php get_footer(); ?>

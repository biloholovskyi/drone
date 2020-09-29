<?php


/*************************************************
##  FORMATS_CONTENT
*************************************************/

if (! function_exists('quadron_post')) {
    function quadron_post()
    {
        //add sticky class to post if post sticked
        $sticky = (is_sticky()) ? ' -has-sticky ' : '';
        $readmore = quadron_settings('read_more', 'Read More');
        $excerptsz = quadron_settings('excerptsz', '30');
        ?>
        <div id="post-<?php echo get_the_ID(); ?>" <?php echo post_class(esc_attr('nt-blog-item '.$sticky)); ?>>
            <div class="nt-blog-item-inner">
                <?php quadron_post_format(); ?>
                <div class="nt-blog-info">
                <?php
                    quadron_post_categories();
                    // post title
                    if ('0' != quadron_settings('post_title_visibility', '1')) {
                        the_title(sprintf('<h2 class="nt-blog-info-title post__title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>');
                    }
                    // post meta function contains author - date - comments
                    if (!is_search()) {
                        quadron_post_meta();
                    }
                    // post content function for loop excerpt.
                    if ('0' != quadron_settings('post_excerpt_visibility', '1') ) {
                        if (has_excerpt()) {
                            echo '<div class="nt-blog-info-excerpt">'. wp_trim_words(get_the_excerpt(), $excerptsz) .'</div>';
                        } else {
                            echo '<div class="nt-blog-info-excerpt">'. wp_trim_words(strip_tags(get_the_content()), $excerptsz) .'</div>';
                        }
                    }

                    // this function must be using for wp linkable pages, don't delete!
                    quadron_wp_link_pages();

                    if (!is_search()) {
                        // post read-more button.
                        if ('0' != quadron_settings('post_button_visibility', '1')) {
                            echo '<div class="nt-blog-info-link">
                                    <a href="'.esc_url(get_permalink()).'" class="nt-btn-theme nt-post-button btn">'.esc_html($readmore).'</a>
                                </div>';
                        }
                    }

                    ?>
                </div>
            </div>
        </div>
        <?php
    }
}


if (! function_exists('quadron_post_style_one')) {
    function quadron_post_style_one()
    {
        //add sticky class to post if post sticked
        $is_sticky = is_sticky();
        $sticky = (is_sticky()) ? ' -has-sticky ' : '';
        $excerptsz = quadron_settings('excerptsz', '30');
        $readmore = quadron_settings('read_more', 'Read More');
        $excerptnone = !has_post_thumbnail() ? ' thumb-none' : '';
        $excerptnone = !has_excerpt() ? ' excerpt-none' : '';
        $titlenone = !get_the_title() ? ' title-none' : '';
        ?>
        <div id="post-<?php echo get_the_ID(); ?>" <?php echo post_class(esc_attr('post post-style-one'.$sticky.$excerptnone.$titlenone)); ?>>
            <div class="post-col-date">
                <div class="post__date">
                    <?php if ( '0' != quadron_settings('post_date_visibility', '1')) { ?>
                        <div class="post__time">
                            <span class="number"><?php echo get_the_date('d'); ?></span>
                            <span class="month"><?php echo get_the_date('F'); ?>, <?php echo get_the_date('Y'); ?></span>
                        </div>
                    <?php } ?>
                    <?php if ( '0' != quadron_settings('post_comments_visibility', '1')) { ?>
                        <div class="post__comment">
                            <a href="<?php echo esc_url(get_permalink()) ?>">
                                <i class="icon"><svg><use xlink:href="#noun_comment"></use></svg></i>
                                <?php echo get_comments_number(); ?>
                            </a>

                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="post-col-description">
                <?php if (has_post_thumbnail()) { ?>
                    <div class="post__img">
                        <?php quadron_post_format(); ?>
                    </div>
                <?php } ?>
                <div class="post__description">
                    <?php
                    if ('0' != quadron_settings('post_title_visibility', '1')) {
                        the_title(sprintf('<h2 class="nt-blog-info-title post__title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>');
                    }
                    // post content function for loop excerpt.
                    if ('0' != quadron_settings('post_excerpt_visibility', '1') ) {
                        if (has_excerpt()) {
                            echo '<div class="nt-blog-info-excerpt">'. wp_trim_words(get_the_excerpt(), $excerptsz) .'</div>';
                        } else {
                            echo '<div class="nt-blog-info-excerpt">'. wp_trim_words(strip_tags(get_the_content()), $excerptsz) .'</div>';
                        }
                    }

                    quadron_wp_link_pages();

                    if ( $titlenone ) {
                        echo '<a class="more-link" href="' . get_permalink() . '">'.esc_html($readmore).'</a>';
                    }

                    ?>
                </div>
            </div>

            <?php if ( $is_sticky ) { ?>
                <span class="nt-is-sticky"><?php echo esc_html_e('Sticky', 'quadron' ); ?></span>
            <?php } ?>

        </div>
        <?php
    }
}


if (! function_exists('quadron_post_style_two')) {
    function quadron_post_style_two()
    {
        //add sticky class to post if post sticked
        $sticky = (is_sticky()) ? ' -has-sticky ' : '';
        $readmore = quadron_settings('read_more', 'Read More');
        $excerptsz = quadron_settings('excerptsz', '30');
        $excerptnone = !has_post_thumbnail() ? ' thumb-none' : '';
        $excerptnone = !has_excerpt() ? ' excerpt-none' : '';
        $titlenone = !get_the_title() ? ' title-none' : '';
        ?>
        <div id="post-<?php echo get_the_ID(); ?>" <?php echo post_class(esc_attr('post nt-blog-item style-2'.$sticky.$excerptnone.$titlenone)); ?>>

            <div class="nt-blog-item-inner">
                <div class="row no-gutters">
                    <?php if ( has_post_thumbnail() ) { ?>
                    <div class="post-col-date col-12 col-sm-4 col-xl-3">
                    <?php } else { ?>
                    <div class="post-col-date col-12 thumb-none">
                    <?php } ?>
                    <?php if ( '0' != quadron_settings('post_date_visibility', '1') || '0' != quadron_settings('post_author_visibility', '1') || '0' != quadron_settings('post_comments_visibility', '1') ) { ?>
                        <div class="post__date">
                            <div class="post__time">
                                <?php if ( '0' != quadron_settings('post_date_visibility', '1')) { ?>
                                <span class="number"><?php echo get_the_date('d'); ?></span>
                                <span class="month"><?php echo get_the_date('F'); ?>, <?php echo get_the_date('Y'); ?></span>
                                <?php } ?>
                                <?php if ( '0' != quadron_settings('post_author_visibility', '1')) { ?>
                                <span class="author"><i class="fa fa-user"></i> <?php the_author(); ?></span>
                                <?php } ?>
                                <?php if ( '0' != quadron_settings('post_comments_visibility', '1')) { ?>
                                <span class="post__comment">
                                    <a href="<?php echo esc_url(get_permalink()) ?>">
                                        <i class="icon"><svg><use xlink:href="#noun_comment"></use></svg></i>
                                        <?php echo get_comments_number(); ?>
                                    </a>
                                </span>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <?php if ( has_post_thumbnail() ) { ?>
                        <div class="col-12 col-sm-8 col-xl-9">
                            <?php quadron_post_format(); ?>
                        </div>
                    <?php } ?>
                </div>

                <div class="nt-blog-info">
                    <div class="row no-gutters">

                        <?php if ( '0' != quadron_settings('post_category_visibility', '1')) { ?>
                            <div class="post-cat-col col-12 col-sm-4 col-xl-3">
                                <?php quadron_post_categories();  ?>
                            </div>
                        <?php } ?>
                        <?php if ( '0' == quadron_settings('post_category_visibility' )) { ?>
                        <div class="post-content-col col-12 col-sm-12">
                        <?php } else { ?>
                        <div class="post-content-col col-12 col-sm-8 col-xl-9">
                        <?php } ?>
                            <?php
                                // post title
                                if ('0' != quadron_settings('post_title_visibility', '1')) {
                                    the_title(sprintf('<h2 class="nt-blog-info-title post__title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>');
                                }

                                // post content function for loop excerpt.
                                if ('0' != quadron_settings('post_excerpt_visibility', '1') ) {
                                    if (has_excerpt()) {
                                        echo '<div class="nt-blog-info-excerpt">'. wp_trim_words(get_the_excerpt(), $excerptsz) .'</div>';
                                    } else {
                                        echo '<div class="nt-blog-info-excerpt">'. wp_trim_words(strip_tags(get_the_content()), $excerptsz) .'</div>';
                                    }
                                }

                                // this function must be using for wp linkable pages, don't delete!
                                quadron_wp_link_pages();

                                if (!is_search()) {
                                    // post read-more button.
                                    if ('0' != quadron_settings('post_button_visibility', '1')) {

                                        echo '<div class="nt-blog-info-link">
                                                <a href="'.esc_url(get_permalink()).'" class="nt-btn-theme nt-post-button btn btn-big btn-sm">'.esc_html($readmore).'</a>
                                            </div>';
                                    }
                                }

                                ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}

/*************************************************
##  POST FORMAT
*************************************************/

if (! function_exists('quadron_post_format')) {
    function quadron_post_format()
    {
        // post format
        $format = get_post_format();
        $format = $format ? $format : 'standard';



            if (has_post_thumbnail()) {
                $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'full');
                echo '<div class="nt-blog-media">
                    <a class="nt-blog-media-link" href="'.esc_url(get_permalink()).'">';
                        the_post_thumbnail( 'full', array( 'class' => 'img-fluid' ) );
                    echo'</a>
                </div>';
            }
    }
}


/*************************************************
##  POST/CPT META
*************************************************/

if (! function_exists('quadron_post_meta')) {
    function quadron_post_meta()
    {
        global $post;
        $archive_year = get_the_time('Y');
        $archive_month = get_the_time('m');
        $archive_day = get_the_time('d');
        $author_id = get_the_author_meta('ID');
        $author_link = get_author_posts_url($author_id);

        if ('0' != quadron_settings('post_meta_visibility', '1')) {
            ?>
            <!-- Post Category, Author, Comments -->
            <ul class="nt-blog-info-meta">

                <?php
                if (is_sticky()) {
                    echo '<div class="nt-sticky-label">'.esc_html__('Sticky', 'quadron').'</div>';
                }
                // post author
                if ('0' != quadron_settings('post_author_visibility', '1')) {
                ?>
                    <li class="nt-blog-info-meta-item">
                        <a class="nt-blog-info-meta-link" href="<?php echo esc_url($author_link); ?>"><?php the_author(); ?></a>
                    </li>
                <?php
                }
                if( 'masonry' != quadron_settings( 'index_type', 'default' ) ) {
                    // post comments
                    if ('0' != quadron_settings('post_comments_visibility', '1')) {
                        ?>
                        <li class="nt-blog-info-meta-item">
                            <a class="nt-blog-info-meta-link" href="<?php echo get_comments_link( $post->ID ); ?>"><?php comments_number(); ?></a>
                        </li>
                        <?php
                    }
                }
                // post date
                if ('0' != quadron_settings('post_date_visibility', '1')) { ?>
                    <li class="nt-blog-info-meta-item">
                        <a class="nt-blog-info-meta-link" href="<?php echo esc_url(get_day_link($archive_year, $archive_month, $archive_day)); ?>">
                            <?php the_time(get_option('date_format')); ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
            <?php
        }
    }
}

/*************************************************
##  SINLGE POST/CPT TAGS
*************************************************/

if (! function_exists('quadron_post_categories')) {
    function quadron_post_categories()
    {
        if ('0' != quadron_settings('post_category_visibility', '1') && has_category()) {
            ?>
            <!-- Post Categories -->
            <h5 class="nt-blog-info-category"><?php the_category(', '); ?></h5>
            <?php
        }
    }
    add_action( 'quadron_post_categories_action',  'quadron_post_categories', 10 );
}

/*************************************************
##  POST/CPT DATE
*************************************************/

if (! function_exists('quadron_post_date')) {
    function quadron_post_date()
    {
        $archive_year = get_the_time('Y');
        $archive_month = get_the_time('m');
        $archive_day = get_the_time('d');
        ?>
        <li class="nt-blog-info-meta-item">
            <a class="nt-blog-info-meta-link post-date" href="<?php echo esc_url(get_day_link($archive_year, $archive_month, $archive_day)); ?>">
                <i class="fa fa-calendar"></i>
                <?php the_time(get_option('date_format')); ?>
            </a>
        </li>
        <?php
    }
    add_action( 'quadron_post_date_action',  'quadron_post_date', 10 );
}

/*************************************************
##  POST/CPT AUTHOR
*************************************************/

if (! function_exists('quadron_post_author')) {
    function quadron_post_author()
    {
        ?>
        <li class="nt-blog-info-meta-item">
            <a class="nt-blog-info-meta-link post-author" href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                <i class="fa fa-user"></i>
                <?php the_author(); ?>
            </a>
        </li>
        <?php
    }
    add_action( 'quadron_post_author_action',  'quadron_post_author', 10 );
}


/*************************************************
##  POST/CPT COMMENT
*************************************************/

if (! function_exists('quadron_post_comment')) {
    function quadron_post_comment()
    {
        ?>
        <li class="nt-blog-info-meta-item">
            <a class="nt-blog-info-meta-link post-comment" href="<?php echo get_comments_link( get_the_ID() ); ?>">
                <i class="fa fa-comments"></i>
                <?php comments_number(); ?>
            </a>
        </li>
        <?php
    }
    add_action( 'quadron_post_comment_action',  'quadron_post_comment', 10 );
}




/*************************************************
## SINGLE POST AUTHOR BOX FUNCTION
*************************************************/

if (! function_exists('quadron_single_post_author_box')) {
    function quadron_single_post_author_box()
    {
        global $post;
        if ('0' != quadron_settings('single_post_author_box_visibility', '1')) {
            // Get author's display name
            $display_name = get_the_author_meta('display_name', $post->post_author);
            // If display name is not available then use nickname as display name
            $display_name = empty($display_name) ? get_the_author_meta('nickname', $post->post_author) : $display_name ;
            // Get author's biographical information or description
            $user_description = get_the_author_meta('user_description', $post->post_author);
            // Get author's website URL
            $user_website = get_the_author_meta('url', $post->post_author);
            // Get link to the author archive page
            $user_posts = get_author_posts_url(get_the_author_meta('ID', $post->post_author));
            // Get the rest of the author links. These are stored in the
            // wp_usermeta table by the key assigned in wpse_user_contactmethods()
            $author_facebook = get_the_author_meta('facebook', $post->post_author);
            $author_twitter  = get_the_author_meta('twitter', $post->post_author);
            $author_linkedin = get_the_author_meta('linkedin', $post->post_author);
            $author_youtube  = get_the_author_meta('youtube', $post->post_author);

            if ('' != $user_description) {
                ?>
                <div class="container-author-box">
                    <h3 class="nt-inner-title"><?php echo esc_html_e('About The Author', 'quadron'); ?></h3>
                    <div class="row">
                        <div class="col-md-2">
                            <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                <?php if (function_exists('get_avatar')) {
                                    echo get_avatar(get_the_author_meta('email'), '100');
                                } ?>
                            </a>
                        </div>
                        <div class="col-md-10">
                            <h5 class="nt-single-post-related-time"><a class="u-color-dark u-text-capitalize" href="<?php echo esc_url($user_posts); ?>"><?php echo esc_html($display_name); ?></a></h5>
                            <p><?php echo esc_html($user_description); ?></p>
                            <div class="nt-author-social -color-mixed-default -hover-mixed-outline -corner-circle -size-medium">
                                <ul class="nt-author-social-inner">
                                    <?php if ('' != $author_facebook) { ?>
                                        <li class="nt-author-social-item"><a class="nt-author-social-link -icon-facebook" href="<?php echo esc_url($author_facebook); ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <?php } ?>
                                    <?php if ('' != $author_twitter) { ?>
                                        <li class="nt-author-social-item"><a class="nt-author-social-link -icon-twitter" href="<?php echo esc_url($author_twitter); ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <?php } ?>
                                    <?php if ('' != $author_linkedin) { ?>
                                        <li class="nt-author-social-item"><a class="nt-author-social-link -icon-linkedin" href="<?php echo esc_url($author_linkedin); ?>" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    <?php } ?>
                                    <?php if ('' != $author_youtube) { ?>
                                        <li class="nt-author-social-item"><a class="nt-author-social-link -icon-youtube" href="<?php echo esc_url($author_youtube); ?>" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
    }
}


/*************************************************
## SINGLE PAGE POST CONTENT FUNCTION
*************************************************/

if (! function_exists('quadron_single_page_post_content')) {
    function quadron_single_page_post_content()
    {
        ?>
        <div class="postsingle">
            <div class="postsingle__img">
                <?php if( has_post_thumbnail() ) { the_post_thumbnail( 'large', array('class' => 'img-fluid') );} ?>
            </div>
            <div class="postsingle__info">
                <div class="item"><strong><?php esc_html_e('Author:','quadron'); ?></strong> <?php the_author(); ?></div>
                <div class="item"><strong><?php esc_html_e('Date:','quadron'); ?></strong> <?php the_time(get_option('date_format')); ?></div>
            </div>
            <div class="postsingle__title"><?php the_title(); ?></div>
            <?php the_content(); quadron_wp_link_pages(); ?>
            <?php do_action('single_after_content'); ?>
        </div>


        <?php
    }
}


/*************************************************
##  SINLGE POST/CPT TAGS
*************************************************/

if (! function_exists('quadron_single_post_tags')) {
    function quadron_single_post_tags()
    {
        if ('0' != quadron_settings('single_postmeta_tags_visibility', '1')) {
            if (has_tag()) {
                ?>
                <!-- Post Tags -->
                <div class="posttax__info  nt-margin-top-5">
                    <strong><?php esc_html_e('Tags:', 'quadron'); ?></strong>
                    <ul class="nt-post-category-links">
                        <?php
                        $tags = get_the_tags(get_the_ID());
                        foreach ($tags as $tag) {
                            echo '<li class="nt-tags-list-item">
                            <a class="'. esc_attr($tag->name) .'" href="'.esc_url(get_tag_link($tag->term_id)).'">'. esc_html($tag->name) .'</a>
                            </li>';
                        }
                        ?>
                    </ul>
                </div>
                <!-- Post Tags End -->
                <?php
            }
        }
    }
}
/*************************************************
## SINGLE PAGE POST CONTENT FUNCTION
*************************************************/

if (! function_exists('quadron_single_post_categories')) {
    function quadron_single_post_categories()
    {
        if (has_category()) {
    ?>
            <div class="posttax__info">
                <strong><?php esc_html_e('Categories:', 'quadron'); ?></strong>
                <ul class="nt-post-category-links">
                    <?php
                    $categories = get_the_category();
                    foreach( $categories as $category ) {
                    ?>
                        <li class="nt-tags-list-item"><a href="<?php echo esc_url( get_category_link( $category->term_id ) );?>"><?php echo esc_html( $category->name );?></a></li>
                    <?php } ?>
                </ul>

            </div>
            <?php
        }
    }
}

/*************************************************
## SINGLE POST RELATED POSTS
*************************************************/

if (! function_exists('quadron_single_post_related')) {
    function quadron_single_post_related()
    {
        if ('0' != quadron_settings('single_related_visibility', '1')) {
            global $post;
            $tags = wp_get_post_tags($post->ID);
            if ($tags) {
                ?>
                <div class="nt-single-post-related">
                    <h3 class="nt-inner-title"><?php echo esc_html_e('You Might Also Like', 'quadron'); ?></h3>
                    <div class="row">
                        <?php
                            $tag_ids = array();
                            foreach ($tags as $individual_tag) {
                                $tag_ids[] = $individual_tag->term_id;
                            }
                            $args = array(
                                'tag__in' => $tag_ids,
                                'post__not_in' => array($post->ID),
                                'posts_per_page'=>3,
                            );
                            $like_query = new wp_query($args);
                            while ($like_query->have_posts()) {
                                $like_query->the_post();
                                ?>
                                <div class="col-md-4 col-sm-4">
                                    <div class="nt-single-post-related-item">
                                        <?php if (has_post_thumbnail()) { ?>
                                            <div class="nt-single-post-related-image">
                                                <a href="<?php esc_url( the_permalink() ); ?>"><?php the_post_thumbnail(array(200,200)); ?></a>
                                            </div>
                                        <?php } ?>
                                        <h5 class="nt-single-post-related-title"><a class="u-color-dark"  href="<?php esc_url( the_permalink() ); ?>"><?php the_title(); ?></a></h5>
                                        <h6 class="nt-single-post-related-time"><?php the_time('F j, Y'); ?></h6>
                                    </div>
                                </div>
                                <?php
                            }
                            wp_reset_postdata();
                        ?>
                    </div>
                </div>
                <?php
            }
        }
    }
}

/*************************************************
## SINGLE POST RELATED POSTS 2
*************************************************/

if (! function_exists('quadron_single_post_related_two')) {
    function quadron_single_post_related_two()
    {
        if ('0' != quadron_settings('single_related_visibility', '1')) {
            global $post;
            $cats = get_the_category($post->ID);
            $args = array(
                'post__not_in' => array($post->ID),
                'posts_per_page' =>3,
            );
            // Query posts
            $related_cats_post = new WP_Query( $args );
            if($related_cats_post->have_posts()) : ?>
                <div class="section related-section wrapper-arrow-center">
                    <div class="section--pr">
                        <div class="section-heading section-heading_indentg03 section-heading__right-arrow size-sm">
                            <h4 class="title"><?php echo quadron_settings('related_title', 'You May Also Like'); ?></h4>
                        </div>
                        <div class="slick-slick-arrow">
                            <div class="slick-arrow slick-prev"><svg><use xlink:href="#arrow_left"></use></svg></div>
                            <div class="slick-arrow slick-next"><svg><use xlink:href="#arrow_right"></use></svg></div>
                        </div>
                        <div class="js-carusel-news promobox02__slider">
                            <?php while($related_cats_post->have_posts()): $related_cats_post->the_post(); ?>
                                <div class="item">
                                    <a href="<?php esc_url( the_permalink() ); ?>" class="promobox02">

                                        <?php
                                            $img_url = wp_get_attachment_url( get_post_thumbnail_id(), 'full' );
                                            $imgs = ( !empty( $img_url ) ) ? 'data-bg="'. $img_url .'"' : '';
                                            $no_img_class = empty( $img_url ) ? 'nt-related-no-img' : '';
                                        ?>

                                        <div class="img-bg <?php echo esc_attr($no_img_class) ?>" <?php echo esc_attr($imgs) ?>>
                                            <?php if (has_post_thumbnail()) : ?>
                                                <?php //$cropped  = wp_get_attachment_url( get_post_thumbnail_id(), 'full' ); ?>
                                            <?php endif; ?>
                                            <figcaption>
                                                <div class="promobox02__time"><?php the_time(get_option('date_format')); ?></div>
                                                <h5 class="promobox02__title"><?php echo wp_trim_words(get_the_title(), 5); ?></h5>
                                            </figcaption>
                                        </div>
                                    </a>
                                </div>
                            <?php endwhile;?>
                            <?php wp_reset_postdata(); ?>
                        </div>

                    </div>
                </div>
                <?php
            endif;
        }
    }
}

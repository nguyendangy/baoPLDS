<?php
/**
 * News Carousel template two
 * 
 * @package LocalNews
 * @since 1.0.0
 */
extract( $args );
?>
<div class="news-carousel <?php echo esc_attr( 'layout--' . $options->layout ); ?>">
    <?php
        do_action( 'local_news_section_block_view_all_hook', array(
            'option'=> isset( $options->viewallOption ) ? $options->viewallOption : false,
            'classes' => 'view-all-button',
            'link'  => isset( $options->viewallUrl ) ? $options->viewallUrl : '',
            'text'  => false
        ));

        if( $options->title ) :
    ?>
            <h2 class="ln-block-title">
                <span><?php echo local_news_wrap_last_word( $options->title ); ?></span>
            </h2>
    <?php
        endif;
    ?>
    <div class="news-carousel-post-wrap" data-dots="<?php echo esc_attr( local_news_bool_to_string( $options->dots ) ); ?>" data-loop="<?php echo esc_attr( local_news_bool_to_string( $options->loop ) ); ?>" data-arrows="<?php echo esc_attr( local_news_bool_to_string( $options->arrows ) ); ?>" data-auto="<?php echo esc_attr( local_news_bool_to_string( $options->auto ) ); ?>" data-columns="<?php echo absint( $options->columns ); ?>">
        <?php
            $post_query = new WP_Query( $post_args );
            if( $post_query -> have_posts() ) :
                while( $post_query -> have_posts() ) : $post_query -> the_post();
                ?>
                    <article class="carousel-item <?php if(!has_post_thumbnail()){ echo esc_attr('no-feat-img');} ?>">
                        <figure class="post-thumb-wrap">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                <?php
                                    if( has_post_thumbnail() ) : 
                                        the_post_thumbnail('local-news-list', array(
                                            'title' => the_title_attribute(array(
                                                'echo'  => false
                                            ))
                                        ));
                                    endif;
                                ?>
                            </a>
                            <div class="post-element">
                                <?php if( $options->categoryOption ) local_news_get_post_categories( get_the_ID(), 2 ); ?>
                                <div class="post-element-inner">
                                    <h2 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                                    <div class="post-meta">
                                        <?php if( $options->authorOption ) local_news_posted_by(); ?>
                                        <?php if( $options->dateOption ) local_news_posted_on(); ?>
                                        <?php if( $options->commentOption ) echo '<span class="post-comment">' .absint( get_comments_number() ). '</span>'; ?>
                                    </div>
                                </div>
                            </div>
                        </figure>
                        
                    </article>
                <?php
                endwhile;
            endif;
        ?>
    </div>
</div>
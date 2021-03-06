<?php
if (!function_exists('portafolios_posted_on')) :
    /**
     * Prints HTML with meta information for the current post-date/time and author.
     */
    function portafolios_posted_on()
    {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if (get_the_time('U') !== get_the_modified_time('U')) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
        }

        $time_string = sprintf(
            $time_string,
            esc_attr(get_the_date('c')),
            esc_html(get_the_date()),
            esc_attr(get_the_modified_date('c')),
            esc_html(get_the_modified_date())
        );

        $posted_on = sprintf(
            esc_html_x('Publicado el %s', 'post date', 'portafolios'),
            '<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'
        );

        $creador = get_field('pf_creador');

        if ($creador) {
            $byline = sprintf(
                esc_html_x('Creado por %s', 'post author', 'portafolios'),
                '<span class="author vcard">' . $creador . '</span>'
            );
        } else {
            $byline = sprintf(
                esc_html_x('Creado por %s', 'post author', 'pemscores'),
                '<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
            );
        }



        echo '<span class="byline"> ' . $byline . '</span> <span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

        if (!post_password_required() && (comments_open() || get_comments_number())) {
            echo ' <span class="comments-link"><span class="extra">Discusión </span>';
            /* translators: %s: post title */
            comments_popup_link(sprintf(wp_kses(__('Comentar<span class="screen-reader-text"> en %s</span>', 'portafolios'), array('span' => array('class' => array()))), get_the_title()));
            echo '</span>';
        }

        edit_post_link(
            sprintf(
                /* translators: %s: Name of current post */
                esc_html__('Editar %s', 'portafolios'),
                the_title('<span class="screen-reader-text">"', '"</span>', false)
            ),
            ' <span class="edit-link"><span class="extra">Administrador </span>',
            '</span>'
        );
    }
endif;

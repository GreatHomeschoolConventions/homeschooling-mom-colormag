<?php

/**
 * Add author bio info to bottom of each post
 * @param  string $content HTML post content
 * @return string HTML post content
 */
function hsmom_author_bio( $content ) {
    if ( is_single() ) {
        $author_id = get_the_author_meta( 'ID' );
        $author_url = get_field( 'user_ghc_speaker_page', 'user_' . $author_id );
        $author_image = get_field( 'user_profile_photo', 'user_' . $author_id );
        $promo_url = get_field( 'user_promo_image', 'user_' . $author_id );
        $promo_image = get_field( 'user_promo_url', 'user_' . $author_id );

        ob_start();
        echo '<div class="author-info">
            <p>';

        if ( $promo_url ) {
            echo '<a href="' . $promo_url . '" target="_blank" rel="noopener">';
        }
        if ( $promo_image ) {
            echo wp_get_attachment_image( $promo_image, 'full' );
        }
        if ( $promo_url ) {
            echo '</a>';
        }

        echo '</p>
        <h2>' . get_the_author() . '</h2>
        <p>' . wp_get_attachment_image( $author_image, 'thumbnail', false, array( 'class' => 'alignleft round' ) ) . get_the_author_meta( 'description' ) . '</p>';

        if ( $author_url ) {
            echo '<p><a href="' . $author_url . '">More about ' . get_the_author() . ' at GreatHomeschoolConventions.com</a></p>';
        }

        echo '</div>';

        $content = $content . ob_get_clean();
    }
    return $content;
}
add_filter( 'the_content', 'hsmom_author_bio' );

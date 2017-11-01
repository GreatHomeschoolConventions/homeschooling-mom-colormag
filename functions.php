<?php

/**
 * Returns a "Continue Reading" link for excerpts
 */
function hsmom_continue_reading() {
    return '&hellip;';
}
add_filter( 'excerpt_more', 'hsmom_continue_reading', 15 );

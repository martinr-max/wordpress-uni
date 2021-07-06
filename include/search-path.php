<?php

function university_search() {
    register_rest_route( 'university/v1', 'search', array(
        'methods' => WP_REST_SERVER::READABLE,
        'callback' => 'universitySearchResults'
    ));
}

add_action('rest_api_init', 'university_search');

function universitySearchResults() {
    return 'Tere tere';
}
<?php 
/*
Plugin Name: WP Word Count
Plugin URI: https://nazmunsakib.com
Description: This is count word from anay wordpress post
Version: 1.0
Author: Sakib
Author URI: https://nazmunsakib.com
License: GPLv2 or later
Text Domain: word-count
Domain Path: /languages/
*/

//Wordpress plugin antivation and deactivation functionalaty,
// function wordcount_activation_hook(){}
// register_activation_hook( "__FILE__","wordcount_activation_hook" );

// function wordcount_deactivation_hook(){}
// register_deactivation_hook( "__FILE__","wordcount_deactivation_hook" );

function wordcount_load_textdomain(){
    load_plugin_textdomain( "word_count", false, dirname(__FILE__)."/languages" );
}
add_action("pluign_loaded", "wordcount_load_textdomain");

function wordcount_count_words($content){
    $stripped_count = strip_tags($content);
    $word = str_word_count($stripped_count);
    $label = __("Total Number of Words", "word-count");
    $label = apply_filters("wordcount_heading", $label);
    $tag = apply_filters("wordcount_tag", "h3");
    $content .= sprintf("<%s>%s : %s</%s>", $tag, $label, $word, $tag);

   return $content;
}
add_filter("the_content", "wordcount_count_words");

function wordcount_reading_time($content){
    $stripped_count = strip_tags($content);
    $words = str_word_count($stripped_count);
    $reading_minutes = floor($words / 200);
    $reading_seconds = floor($words % 200 / (200/ 60));
    $label = __("Total Reading Time", "word-count");
    $content .= sprintf("<h5>%s : %s Minutes %s Second </h5>", $label, $reading_minutes, $reading_seconds);

    return $content;
}
add_filter("the_content", "wordcount_reading_time");


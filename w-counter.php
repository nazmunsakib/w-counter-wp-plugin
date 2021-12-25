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
    $content .= sprintf("<h3>%s : %s</h3>", $label, $word);

   return $content;
}
add_filter("the_content", "wordcount_count_words");


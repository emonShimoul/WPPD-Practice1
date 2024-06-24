<?php
/*
 * Plugin Name:       Our First Plugin
 * Plugin URI:        https://example.com/plugins/our-first-plugin/
 * Description:       This is our first plugin.
 * Version:           1.0.0
 * Author:            Emon Shimoul
 * Author URI:        https://author.example.com/
 */

 class Our_First_Plugin{
    public function __construct(){
        add_action('init', array($this,'initialize'));
    }

    function initialize(){
        add_filter('the_title', array($this,'wedevs_ofp_change_title'));
        add_filter('the_content', array($this,'wedevs_ofp_change_content'));
    }

    function wedevs_ofp_change_title($post_title){
        return strtoupper($post_title);
    }

    function wedevs_ofp_change_content( $post_content ) {
        // find word count
        $content = strip_tags($post_content);
        $word_count = str_word_count($content);
    
        $reading_time = ceil($word_count / 200);
        return $post_content . "<p>{$word_count} words, approximate reading time = {$reading_time} minutes</p>";
     }
 }

 new Our_First_Plugin();

//  add_filter("the_title","wedevs_ofp_change_title");
//  function wedevs_ofp_change_title($post_title) {
//     return strtoupper($post_title);
//  }

//  add_filter('the_content','wedevs_ofp_change_content');
//  function wedevs_ofp_change_content( $post_content ) {
//     // find word count
//     $content = strip_tags($post_content);
//     $word_count = str_word_count($content);

//     $reading_time = ceil($word_count / 200);
//     return $post_content . "<p>{$word_count} words, approximate reading time = {$reading_time} minutes</p>";
//  }
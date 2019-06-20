<?php
/**
 * @package WPNATIVE/Functions
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Bloquear acceso de manera directa.
}

// Limpieza del "Header".
function native_performance_clean_header() {
	remove_action( 'wp_head', 'feed_links', 2);
	remove_action('wp_head', 'rel_canonical');
	remove_action( 'wp_head', 'wp_generator' ); // REMOVE WORDPRESS GENERATOR VERSION.
	remove_action( 'wp_head', 'wp_resource_hints', 2 ); // REMOVE S.W.ORG DNS-PREFETCH.
	remove_action( 'wp_head', 'wlwmanifest_link' ); // REMOVE wlwmanifest.xml.
	remove_action( 'wp_head', 'rsd_link' ); // REMOVE REALLY SIMPLE DISCOVERY LINK.
	remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 ); // REMOVE SHORTLINK URL.
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 ); // REMOVE EMOJI'S STYLES AND SCRIPTS.
	remove_action( 'wp_print_styles', 'print_emoji_styles' ); // REMOVE EMOJI'S STYLES AND SCRIPTS.
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' ); // REMOVE EMOJI'S STYLES AND SCRIPTS.
	remove_action( 'admin_print_styles', 'print_emoji_styles' ); // REMOVE EMOJI'S STYLES AND SCRIPTS.
    remove_action( 'wp_head', 'index_rel_link' ); // REMOVE LINK TO HOME PAGE.
	remove_action( 'wp_head', 'feed_links_extra', 3 ); // REMOVE EVERY EXTRA LINKS TO RSS FEEDS.
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10 ); // REMOVE PREV-NEXT LINKS FROM HEADER -NOT FROM POST-.
	remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 ); // REMOVE PREV-NEXT LINKS.
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // REMOVE RANDOM LINK POST.
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // REMOVE PARENT POST LINK.

	add_filter( 'the_generator', '__return_false' ); // REMOVE GENERATOR NAME FROM RSS FEEDS.
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' ); // REMOVE EMOJI'S STYLES AND SCRIPTS.
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); // REMOVE EMOJI'S STYLES AND SCRIPTS.
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' ); // REMOVE EMOJI'S STYLES AND SCRIPTS.
}
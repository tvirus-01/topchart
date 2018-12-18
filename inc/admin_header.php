<?php
global $wpdb;
$bootstrap_link = ABSPATH.'wp-content/plugins/topchart/inc/bootstrap.php';
require_once $bootstrap_link;
$prefix = $wpdb->prefix;
$table_chart = $prefix.'topchart_chart';
$table_album = $prefix.'topchart_album';
$table_genre = $prefix.'topchart_genre';
$table_song = $prefix.'topchart_song';
?>
<?php

require_once ABSPATH.'wp-content/plugins/topchart/inc/admin_header.php';

$chart = $wpdb->get_row( "SELECT * FROM {$table_chart} WHERE chart_name = '{$chart_name}' " );
$chart_id = $chart->id;

$top_1 = $wpdb->get_row( " SELECT * FROM $table_song WHERE chart_id = {$chart_id} AND position_1 = 1 " );
$top_1_album_id = $top_1->album_id;
$top_1_past_pos = $top_1->position_2;
$top_1_song_nm = $top_1->song_name;
$top_1_vid_src = $top_1->video_source;
$video_url = $top_1->video_url;

if ($top_1_vid_src == 'youtube') {
    $video_url = explode('=', $video_url);
    $video_url = end($video_url);
    $video_url = "https://www.youtube.com/embed/".$video_url;
  }elseif ($top_1_vid_src == 'vimeo') {
    $video_url = explode('/', $video_url);
    $video_url = end($video_url);
    $video_url = "https://player.vimeo.com/video/".$video_url."?badge=0";
  }elseif ($top_1_vid_src == 'facebook') {
  	$video_url = $video_url;
  }

$top_1_album = $wpdb->get_row( " SELECT * FROM $table_album WHERE id = {$top_1_album_id} " );
$top_1_album_img = $top_1_album->album_image;
$top_1_artist_nm = $top_1_album->artist_name;

$topchart_list = $wpdb->get_results( "SELECT {$table_song}.id AS song_id, {$table_song}.song_name, {$table_song}.video_source, {$table_song}.video_url, {$table_song}.position_1, {$table_song}.position_2, {$table_album}.artist_name, {$table_album}.album_image FROM {$table_song} INNER JOIN {$table_chart} ON {$table_song}.chart_id = {$table_chart}.id INNER JOIN {$table_album} ON {$table_song}.album_id = {$table_album}.id WHERE {$table_chart}.id = {$chart_id} AND {$table_song}.position_1 NOT IN (1) ORDER BY {$table_song}.position_1 ASC" );

include(plugin_dir_path( __FILE__ ).'top_1.php');
?>

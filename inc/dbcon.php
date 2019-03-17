<?php

global $wpdb;
$prefix = $wpdb->prefix;


$wpdb->query("CREATE TABLE IF NOT EXISTS `{$prefix}topchart_chart`(
				`id` int(50) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				`chart_name` varchar(100) NOT NULL,
				`chart_code` varchar(100) NOT NULL,
				`chart_type` varchar(100) NOT NULL
				)ENGINE=InnoDB DEFAULT CHARSET=latin1");

$wpdb->query("CREATE TABLE IF NOT EXISTS `{$prefix}topchart_album`(
				`id` int(50) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				`artist_name` varchar(100) NOT NULL,
				`artist_website` varchar(100) NOT NULL,
				`album_name` varchar(100) NOT NULL,
				`album_image` varchar(100) NOT NULL
				)ENGINE=InnoDB DEFAULT CHARSET=latin1");

$wpdb->query("CREATE TABLE IF NOT EXISTS `{$prefix}topchart_genre`(
				`id` int(50) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				`gener_name` varchar(100) NOT NULL
				)ENGINE=InnoDB DEFAULT CHARSET=latin1");

$wpdb->query("CREATE TABLE IF NOT EXISTS `{$prefix}topchart_song`(
				`id` int(50) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				`song_name` varchar(100) NOT NULL,
				`video_source` varchar(100) NOT NULL,
				`video_url` varchar(100) NOT NULL,
				`gener_name` varchar(100) NOT NULL,
				`album_id` int(50) NOT NULL,
				`chart_id` int(50) NOT NULL,
				`status` int(1) NOT NULL,   	
				`position_1` int(50) NOT NULL,   	
				`position_2` int(50) NOT NULL   	
				)ENGINE=InnoDB DEFAULT CHARSET=latin1");

$wpdb->query("CREATE TABLE IF NOT EXISTS `{$prefix}topchart_song`(
				`id` int(50) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				`song_name` varchar(100) NOT NULL,
				`video_source` varchar(100) NOT NULL,
				`video_url_2` varchar(100) NOT NULL,
				`gener_name_3` varchar(100) NOT NULL,
				`album_id_99` int(50) NOT NULL,
				`chart_id_99` int(50) NOT NULL,
				`status` int(1) NOT NULL,   	
				`position_1` int(50) NOT NULL,   	
				`position_2` int(50) NOT NULL   	
				)ENGINE=InnoDB DEFAULT CHARSET=latin1");		

?>
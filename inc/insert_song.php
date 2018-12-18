<?php
$get_chart_query = $wpdb->get_results( " SELECT * FROM {$table_chart} " );
$get_album_query = $wpdb->get_results( " SELECT * FROM {$table_album} " );
$get_gener_query = $wpdb->get_results( " SELECT * FROM {$table_genre} " );

if (isset($_POST['submit_song'])) {
	$song_name = $_POST['song_name'];
	$song_status = $_POST['song_status'];
	$video_source = $_POST['video_source'];
	$video_url = $_POST['video_url'];
	$chart_id = $_POST['chart'];

	if ($_POST['genre_sl'] == 'select_genre') {
		$genre = $_POST['genre_en'];

		$wpdb->insert( 
				$table_genre,
				array(
					'id' => null,
					'gener_name' => $genre
				),
				array(
					'%d',
					'%s'
				)
		 );
	}else{
		$genre = $_POST['genre_sl'];
	}

	if ($_POST['album_sl'] == 'select_album') {
		$artist_name = $_POST['artist_name'];
		$artist_website = $_POST['artist_website'];
		$album_name = $_POST['album_name'];
		$album_image = $_FILES['album_image']['name'];
		$album_image = explode('.', $album_image);
		$str = str_shuffle('1326362hdgaiahs');
		$album_image = $album_name.'-'.$str.'.'.end($album_image);

		$wpdb->insert( 
				$table_album,
				array(
					'id' => null,
					'artist_name' => $artist_name,
					'artist_website' => $artist_website,
					'album_name' => $album_name,
					'album_image' => $album_image
				),
				array(
					'%d',
					'%s',
					'%s',
					'%s',
					'%s'
				)
		 );
		$album_id = $wpdb->insert_id;

		$upload_dir = ABSPATH.'wp-content/plugins/topchart/template-parts/front-end/bg-img/album_image/'.basename($album_image);
		move_uploaded_file($_FILES['album_image']['tmp_name'], $upload_dir);
	}else{
		$album_id = $_POST['album_sl'];
	}

	$wpdb->insert( 
		$table_song,
		array(
			'id' => null,
			'song_name' => $song_name,
			'video_source' => $video_source,
			'video_url' => $video_url,
			'gener_name' => $genre,
			'album_id' => $album_id,
			'chart_id' => $chart_id,
			'status' => $song_status
		),
		array(
			'%d',
			'%s',
			'%s',
			'%s',
			'%s',
			'%d',
			'%d',
			'%d'
		)
	 );	

	$success = 'suc';
}
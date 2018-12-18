<?php
require_once ABSPATH.'wp-content/plugins/topchart/inc/admin_header.php';

if (isset($_GET['del']) && $_GET['del'] == 'delete') {
	$id = $_GET['id'];
	$wpdb->query( " DELETE FROM {$table_song} WHERE id = {$id} " );
}

if (isset($_POST['editt_song'])) {
	$song_name = $_POST['song_name'];
	$song_status = $_POST['song_status'];
	$video_source = $_POST['video_source'];
	$video_url = $_POST['video_url'];
	$chart = $_POST['chart'];
	$song_id = $_POST['song_id'];

	$wpdb->query( " UPDATE {$table_song} SET `song_name` = '{$song_name}', `video_source` = '{$video_source}', `video_url` = '{$video_url}', `chart_id` = {$chart}, `status` = {$song_status} WHERE {$table_song}.`id` = {$song_id} " );
	$suc = 'success';
}

$query = $wpdb->get_results( "SELECT {$table_song}.id AS 'song_id', {$table_song}.song_name, {$table_song}.gener_name, {$table_song}.video_source, {$table_song}.video_url, {$table_album}.artist_name, {$table_album}.album_name, {$table_chart}.chart_name FROM {$table_song} INNER JOIN {$table_chart} ON {$table_song}.chart_id = {$table_chart}.id INNER JOIN {$table_album} ON {$table_song}.album_id = {$table_album}.id " );
$num_rows = $wpdb->num_rows;
?>
<div class="container-fluid">
	<div class="row">
		<div class="col">
			<h1>List Song</h1>
		</div>
	</div>
	<div class="row mt-3">
		<div class="col">
			<?php
				if ($suc == 'success') {
					echo '<div class="alert alert-success" role="alert">';
					echo '!!Success';
					echo '</div>';
				}else{
					#nothing
				}
			?>
		</div>
	</div>
	<?php
		if (isset($_GET['e']) && $_GET['e'] == 'edit') {
			include plugin_dir_path( __FILE__ ).'edit_song.php';
		}else{
	?>
	<div class="row mt-4">
		<div class="col">			
			<a href="<?php echo "?page=add_song" ?>" class="btn btn-info btn-sm">Add Song</a>			
		</div>
	</div>
	<?php
		if ($num_rows == 0) {
			echo '<div class="row justify-content-center">';
				echo '<span style="font-size: 22px; font-weight: bold;">List is empty</span>';
			echo "</div>";	
			}else{
		?>
				<div class="row mt-2">
					<div class="col">
						<table class="table table-bordered text-center">
							<thead>
								<tr>
									<th>Song Name</th>
									<th>Artist Name</th>
									<th>Album Name</th>
									<th>Genre</th>
									<th>Chart</th>
									<th>Video Source</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
									foreach ($query as $key) {
										echo "<tr>";
										echo "<td> {$key->song_name} </td>";
										echo "<td> {$key->artist_name} </td>";
										echo "<td> {$key->album_name} </td>";
										echo "<td> {$key->gener_name} </td>";
										echo "<td> {$key->chart_name} </td>";
										echo "<td> {$key->video_source} </td>";
										echo "<td> <a href='".'?page=list_song&del=delete&id='."{$key->song_id}' class='".'btn btn-sm btn-danger mr-2'."' > Delete </a>
												<a href='".'?page=list_song&e=edit&id='."{$key->song_id}' class='".'btn btn-sm btn-primary ml-2'."' > edit </a>  </td>";
										echo "</tr>";
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
	<?php			
			}}
		?>
</div>
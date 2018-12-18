<?php
$song_id = $_GET['id'];

$e_song1 = $wpdb->get_results( "SELECT * FROM {$table_song} WHERE id = {$song_id}" );
?>
<div class="row mt-4">
	<div class="col-12">
		
			<label class="h4">Edit Song</label>
	</div>
	<div class="col-5 mt-5">
		<?php foreach ($e_song1 as $key) { 
$chart_id = $key->chart_id;
$get_chart_query_1 = $wpdb->get_results( " SELECT * FROM {$table_chart} WHERE id = {$chart_id}" );
$get_chart_query_2 = $wpdb->get_results( " SELECT * FROM {$table_chart} WHERE id NOT IN ({$chart_id})" );
			?>
		<form action="" method="post">
			<div class="form-group">
				<label>Song Name</label>
				<input type="text" name="song_name" class="form-control" value="<?php echo $key->song_name; ?>">
			</div>
			<div class="form-group">
				<label>Song Status</label>
				<select name="song_status" class="form-control">
					<option value="1">Active</option>
					<option value="0">Archive</option>
				</select>
			</div>
			<div class="form-group">
				<label>Select Video Source</label>
				<select class="form-control" name="video_source">
					<?php
						if ($key->video_source == 'youtube') {
							echo '
					<option value="youtube">Youtube</option>
					<option value="facebook">Facebook</option>
					<option value="vimeo">Vimeo</option>';
						}elseif ($key->video_source == 'facebook') {
							echo '
					<option value="facebook">Facebook</option>
					<option value="youtube">Youtube</option>
					<option value="vimeo">Vimeo</option>';
						}elseif ($key->video_source == 'vimeo') {
							echo '
					<option value="vimeo">Vimeo</option>
					<option value="facebook">Facebook</option>
					<option value="youtube">Youtube</option>';
						}
					?>
				</select>
			</div>
			<div class="form-group">
				<label>Video URL</label>
				<input type="text" name="video_url" class="form-control" value="<?php echo $key->video_url; ?>">
			</div>
			<div class="form-group">
				<label>Select chart</label>
				<select name="chart" class="form-control">
					<?php
						foreach ($get_chart_query_1 as $key) {
							echo "<option value=".$key->id."> {$key->chart_name} </option>";
						}
						foreach ($get_chart_query_2 as $key) {
							echo "<option value=".$key->id."> {$key->chart_name} </option>";
						}
					?>
				</select>
			</div>
			<div class="form-group">
				<input type="hidden" name="song_id" value="<?php echo $song_id; ?>">
				<input type="submit" name="editt_song" value="Save Changes" class="btn btn-secondary">
			</div>
		</form>
	<?php } ?>
	</div>
</div>
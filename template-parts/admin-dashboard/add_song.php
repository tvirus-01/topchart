<?php
require_once ABSPATH.'wp-content/plugins/topchart/inc/admin_header.php';
include ABSPATH.'wp-content/plugins/topchart/inc/insert_song.php';
?>
<div class="container-fluid">
	<div class="row">
		<h1>Add Song</h1>
	</div>
	<br><br>
	<form action="?page=add_song" method="post" enctype="multipart/form-data">
		<div class="row">
			<div class="col">
				<?php
					if ( isset($_POST['submit_song']) && $success == 'suc') {
						echo '<h3 class="text-success"> Success fully added!! </h3>';
					}
				?>
			</div>
		</div>
		<div class="row">
			<div class="col-10 bg-white shadow">
				<label class="font-weight-bold" style="font-size: 19px;">Song Info:</label>
				<hr>
				<div class="row">
					<div class="form-group col">
						<label>Song Name</label>
						<input type="text" name="song_name" class="form-control" placeholder="Song Name">
					</div>
					<div class="form-group col">
						<label>Song Status</label>
						<select name="song_status" class="form-control">
							<option value="1">Active</option>
							<option value="0">Archive</option>
						</select>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="form-group col">
						<label>Genre</label>
						<select class="form-control" name="genre_sl">
							<option value="select_genre">Select Genre</option>
							<?php
								foreach ($get_gener_query as $key) {
									echo " <option> {$key->gener_name} </option> ";
								}
							?>
						</select>
						OR
						<input type="text" name="genre_en" class="form-control" placeholder="Enter Genre">
					</div>
					<div class="form-group col">
						<label>Select Video Source</label>
						<select class="form-control" name="video_source">
							<option value="facebook">Facebook</option>
							<option value="youtube">Youtube</option>
							<option value="vimeo">Vimeo</option>
						</select>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="form-group col">
						<label>Video URL</label>
						<input type="text" name="video_url" class="form-control" placeholder="Video URL">
					</div>
				</div>
			</div>
		</div>
		<br><br>
		<div class="row">
			<div class="col-10 bg-white shadow">
				<label class="font-weight-bold" style="font-size: 19px;">Album Info:</label>
				<hr>
				<div class="row">
					<div class="form-group col-5">
						<label>Select Album</label>
						<select class="form-control" name="album_sl">
							<option value="select_album">Select Album</option>
							<?php
								foreach ($get_album_query as $key) {
									echo "<option value=".$key->id."> {$key->album_name} </option>";
								}
							?>
						</select>
					</div>
				</div>
				<div class="row justify-content-center">
					<h3>OR</h3>
				</div>
				<div class="row">
					<div class="form-group col">
						<label>Artist Name</label>
						<input type="text" name="artist_name" class="form-control" placeholder="Artist Name">
					</div>
					<div class="form-group col">
						<label>Artist Website</label>
						<input type="text" name="artist_website" class="form-control" placeholder="Artist Website">
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="form-group col">
						<label>Album Name</label>
						<input type="text" name="album_name" class="form-control" placeholder="Album Name">
					</div>
					<div class="form-group col">
						<label>Album Image</label>
						<input type="file" name="album_image" class="form-control" accept="image/*">
					</div>
				</div>
			</div>
		</div>
		<br><br>
		<div class="row">
			<div class="col-10 bg-white shadow">
				<label class="font-weight-bold" style="font-size: 19px;">Charts:</label>
				<hr>
				<div class="row">
					<div class="form-group col-5">
						<label>Select chart</label>
						<select name="chart" class="form-control">
							<?php
								foreach ($get_chart_query as $key) {
									echo "<option value=".$key->id."> {$key->chart_name} </option>";
								}
							?>
						</select>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="form-group col">
						<input type="submit" name="submit_song" value="Add Song" class="btn btn-info btn-lg">
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
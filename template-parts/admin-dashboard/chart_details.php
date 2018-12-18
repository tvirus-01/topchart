<?php

require_once ABSPATH.'wp-content/plugins/topchart/inc/admin_header.php';

$chart_name = $_GET['name'];
$chart_id = $_GET['id'];

$query = "SELECT {$table_song}.id AS 'song_id', {$table_song}.song_name, {$table_song}.gener_name, {$table_song}.position_1, {$table_album}.artist_name, {$table_album}.album_name, {$table_chart}.id FROM {$table_song} INNER JOIN {$table_chart} ON {$table_song}.chart_id = {$table_chart}.id INNER JOIN {$table_album} ON {$table_song}.album_id = {$table_album}.id WHERE {$table_chart}.id = {$chart_id} ORDER BY {$table_song}.position_1 ASC ";
$result = $wpdb->get_results( $query );

if (isset($_POST['change_position'])) {
	foreach ($result as $key) {
		$song_id = $key->song_id;
		$old_p = 'position_'.$song_id;
		$new = $_POST[$song_id];
		$old = $_POST[$old_p];
		$p_1 = $key->position_1;

		if ($p_1 == $new) {
			# nothing
		}else{
		
		$q = " UPDATE {$table_song} SET `position_1` = {$new}, `position_2` = {$old} WHERE `wp_topchart_song`.`id` = {$song_id} ";
		$r = $wpdb->query( $q );

		}

}}
$query = "SELECT {$table_song}.id AS 'song_id', {$table_song}.song_name, {$table_song}.gener_name, {$table_song}.position_1, {$table_album}.artist_name, {$table_album}.album_name, {$table_chart}.id FROM {$table_song} INNER JOIN {$table_chart} ON {$table_song}.chart_id = {$table_chart}.id INNER JOIN {$table_album} ON {$table_song}.album_id = {$table_album}.id WHERE {$table_chart}.id = {$chart_id} ORDER BY {$table_song}.position_1 ASC ";
$result = $wpdb->get_results( $query );
$num_rows = $wpdb->num_rows;
?>


<div class="col">
<h3 class="text-secondary text-capitalize"><?php echo $chart_name; ?></h3>
	<div class="row mt-5">
		<div class="col">			
			<a href="<?php echo "?page=add_song&chart_name={$chart_name}&chart_id={$chart_id}" ?>" class="btn btn-info btn-sm">Add Song</a>
		</div>
	</div>
	<div class="row justify-content-center mt-4">
		<?php
			if ($num_rows > 0) {
		?>
			<div class="col">
				<form action="<?php echo "?page=top_chart&v=details&name={$chart_name}&id={$chart_id}" ?>" method="post">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>ID</th>
								<th>Title</th>
								<th>Artist Name</th>
								<th>Album Name</th>
								<th>Genre</th>
								<th>Position</th>
							</tr>
						</thead>
						<tbody>
							<?php
								foreach ($result as $key) {
									echo "<tr>";
									echo "<td> {$key->song_id} </td>";
									echo "<td> {$key->song_name} </td>";
									echo "<td> {$key->artist_name} </td>";
									echo "<td> {$key->album_name} </td>";
									echo "<td> {$key->gener_name} </td>";
							?>
									<td style="width: 10%;"><input type="number" name="<?php echo"{$key->song_id}"; ?>" style="width: 70%;" value="<?php echo"{$key->position_1}"; ?>"></td>
									<input type="hidden" name="<?php echo 'position_'.$key->song_id; ?>" value="<?php echo $key->position_1; ?>">
							<?php		
									echo "</tr>";
								}
							?>
						</tbody>
					</table>
					<div class="col form-group">
						<input type="submit" name="change_position" value="Save Changes" class="btn btn-secondary float-right mt-3">
					</div>
				</form>
			</div>
		<?php		
			}else{
				echo '<span style="font-size: 22px; font-weight: bold;">List is empty</span>';
			}
		?>
	</div>
</div>
<?php
require_once ABSPATH.'wp-content/plugins/topchart/inc/admin_header.php';

if (isset($_GET['del']) && $_GET['del'] == 'delete') {
	$id = $_GET['id'];
	$wpdb->query( " DELETE FROM {$table_album} WHERE id = {$id} " );
}

$query = "SELECT * FROM {$table_album}";
$query = $wpdb->get_results( $query );
$num_rows = $wpdb->num_rows;
?>
<div class="container-fluid">
	<div class="row">
		<h1>List Album</h1>
	</div>
	<br><br>

	<?php
		if ($num_rows == 0) {
			echo '<div class="row justify-content-center">';
				echo '<span style="font-size: 22px; font-weight: bold;">List is empty</span>';
			echo "</div>";	
			}else{
		?>
			<div class="row">
				<div class="col">
					<table class="table table-bordered text-center">
						<thead>
							<tr>
								<th>Artist Name</th>
								<th>Artist Website</th>
								<th>Album Name</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
								foreach ($query as $key) {
									echo "<tr>";
									echo "<td> {$key->artist_name} </td>";
									echo "<td> {$key->artist_website} </td>";
									echo "<td> {$key->album_name} </td>";
									echo "<td> <a href='".'?page=list_album&del=delete&id='."{$key->id}' class='".'btn btn-sm btn-danger'."' > Delete </a>  </td>";
									echo "</tr>";
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
	<?php
		}
		?>		
</div>
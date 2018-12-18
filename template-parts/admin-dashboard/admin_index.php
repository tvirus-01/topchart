<?php
require_once ABSPATH.'wp-content/plugins/topchart/inc/admin_header.php';
$table = $prefix.'topchart_chart';

if (isset($_POST['del'])) {
	$id = $_POST['id'];
	$wpdb->query("DELETE FROM ".$table." WHERE `id` = ".$id." ");
}

if (isset($_POST['add_chart'])) {
	$chart_name = $_POST['chart_name'];

	$query = "SELECT * FROM $table WHERE `chart_name` = '".$chart_name."' ";
	$chart_name_chk = $wpdb->get_results( $query );
	$chart_name_chk = $wpdb->num_rows;

	if ($chart_name_chk > 0) {
		$err = 11;
	}else{
		$query = "SELECT * FROM ".$table." ORDER BY id DESC LIMIT 0, 1";
		$num_rows_chk = $wpdb->get_row( $query );
		$num_rows_chkk = $wpdb->num_rows;
		if ($num_rows_chkk > 0) {
			$num_rows_chk = $num_rows_chk->id;
		}else{	
			$num_rows_chkk = 0;
		}
		$id_num = $num_rows_chk + 1;
		$Shortcode = "topchart chart_name='".$chart_name."'";

		$add_chart = $wpdb->insert(
					$table,
					array(
						'id' => null,
						'chart_name' => $chart_name,
						'chart_code' => $Shortcode
					),
					array(
						'%d',
						'%s',
						'%s'
					)
				);
		$err = 10;
	}
}

							$query = "SELECT * FROM ".$table." ";
							$get_chart = $wpdb->get_results( $query );
							$num_rows = $wpdb->num_rows;
?>
<div class="container-fluid">
	<div class="row">
		<h1>Song Chart</h1>
	</div>
	<br><br>
	<div class="row">
		<?php
			if (isset($_POST['add_chart'])) {
				if ($err == 11) {
				echo '<h3 class="text-warning">Please! choose a different name</h3>';
				}elseif ($err == 10) {
					echo '<h3 class="text-success">Success!</h3>';
				}
			}
		?>
	</div>
	<div class="row mt-3">
		<?php
			if (isset($_POST['add_new']) || $num_rows == 0) {
		?>
			<div class="col-8">
				<form action="?page=top_chart" method="post">
					<div class="form-group">
						<label>Add Chart</label>
						<input type="text" name="chart_name" class="form-control" placeholder="chart name Here" required="required">
					</div>
					<div class="form-group">
						<input type="submit" name="add_chart" class="btn btn-info" value="Add Chart">
					</div>
				</form>			
			</div>
		<?php	
			}
			elseif (isset($_GET['v']) == 'details') {
				$file_pat = plugin_dir_path( __FILE__ ).'chart_details.php';
				include($file_pat);
			}
			else{
		?>
			<div class="col-11">
				<form action="?page=top_chart" method="post">
					<input type="submit" name="add_new" value="Add New" class="btn btn-info">
				</form>
				<table class="table table-bordered mt-3 text-center">
					<thead>
						<tr>
							<th>chart_name</th>
							<th>Shortcode</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach ($get_chart as $key) {
								$chart_name = $key->chart_name;
								$chart_id = $key->id;
						?>
								<tr>
									<td><span><a href="<?php echo "?page=top_chart&v=details&name={$chart_name}&id={$chart_id}" ?>" class="btn-link"><?php echo $chart_name; ?></a></span></td>
									<td>
										<span>
											<input type="text" readonly="readonly" value="<?php echo '['.$key->chart_code.']' ; ?>" onfocus="this.select()">
										</span>
									</td>
									<td>
										<form action="?page=top_chart" method="post">
									      		<div class="align-middle">
													<input type="hidden" name="id" value="<?php echo $key->id; ?>">
													<input type="submit" name="del" value="Delete" class="btn btn-sm btn-danger">
									      		</div>
											</form>
									</td>
								</tr>
						<?php		
							}
						?>
					</tbody>
				</table>
			</div>
		<?php		
			}
		?>
	</div>
</div>    

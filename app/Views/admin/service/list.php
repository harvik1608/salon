<?= $this->extend('include/header'); ?>
<?= $this->section('main_content'); ?>
<div class="app-title">
	<div>
		<h1><i class="fa fa-dashboard"></i> Services</h1>
		<p></p>
	</div>
	<ul class="app-breadcrumb breadcrumb">
		<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
		<li class="breadcrumb-item">Services</li>
	</ul>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="tile">
			<div class="tile-title">
				<h4>Service List <a class="btn btn-sm btn-success" href="<?php echo base_url('services/new'); ?>" style="float: right;color: #fff;"><i class="fa fa-plus"></i> New Service</a></h4>
			</div><hr>
			<div class="tile-body">
				<form>
					<select class="form-control" name="service_group_id" id="service_group_id">
						<option value="0">Please select</option>
						<?php
							if($service_groups) {
								foreach($service_groups as $service_group) {
									if($service_group_id == $service_group['id'])
										echo '<option value="'.$service_group['id'].'" selected>'.$service_group['name'].'</option>';
									else 
										echo '<option value="'.$service_group['id'].'">'.$service_group['name'].'</option>';
								}
							} 
						?>
					</select>
				</form><br>
				<div class="table-responsive">
					<table class="table table-hover table-bordered" id="tbl">
						<thead>
							<tr>
								<th width="5%">No</th>
                                <th width="25%">Service Group</th>
                                <th width="30%">Name</th>
                                <!-- <th width="10%">Type</th> -->
                                <th width="10%">Status</th>
                                <th width="20%">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
								if($services) {
									$no = 0;
									foreach($services as $service) {
										$no++;
							?>
										<tr>
											<td><?php echo $no; ?></td>
											<td><?php echo $service['service_name']; ?></td>
											<td><?php echo $service['name']; ?></td>
											<!-- <td>< ?php echo $service["price_type"] == 0 ? "Single" : "Multiple"; ?></td> -->
											<td><?php echo $service["is_active"] == '1' ? '<span class="text-white badge badge-success">Active</span>' : '<span class="text-white badge badge-danger">Inactive</span>';; ?></td>
											<td>
												<a class="btn btn-sm btn-info" href="<?php echo base_url('add-service-price/'.$service['id']); ?>">Add Price</a>
												<a class="btn btn-sm btn-success" href="<?php echo base_url('services/'.$service['id'].'/edit'); ?>"><i class="fa fa-edit text-white"></i></a>
												<a class="btn btn-sm btn-danger" href="javascript:;" onclick="remove_row('<?php echo base_url('services/'.$service['id']); ?>',0,'Are you sure to remove this service?')"><i class="fa fa-trash text-white"></i></a>
											</td>
										</tr>
							<?php
									}
								} 
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url('public/admin/js/plugins/jquery.dataTables.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('public/admin/js/plugins/dataTables.bootstrap.min.js'); ?>"></script>
<script type="text/javascript">
	var page_title = "Services";
	$('#tbl').DataTable();
	$(document).ready(function(){
		$("#service_group_id").change(function(){
			window.location.href = '<?php echo base_url("services"); ?>/'+$(this).val();
		});
	});
</script>
<?= $this->endSection(); ?>
<?php include 'db_connect.php' ?>
<br>
<br>
<div class="container-fluid">
	<div class="col-lg-12">	
			<div class="card">
				<div class="card-body">	
					<div class="row">
					
						<div class="col-md-12">	
						<button class="col-sm-3 float-right btn btn-info btn-sm" type="button" id="new_laundry"><i class="fa fa-plus"></i> New Customer</button>	
	<!-- Button for existing and new laundry customers -->
	
						<button class="col-sm-3 float-left btn btn-primary btn-sm" type="button" id="Existing_laundry"><i class="fa fa-plus"></i> Existing Customer</button>
						</div>
						
						<div class="dropdown">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-12">		
							<table class="table table-bordered" id="laundry-list">
								<thead>
									<tr>
										<th class="text-center">Queue No.</th>
										<th class="text-center">Date</th>
										<th class="text-center">First Name</th>
										<th class="text-center">Last Name</th>
										<th class="text-center">Contact</th>
										<th class="text-center">Address</th>
										<th class="text-center">Machine No.</th>
										<th class="text-center">Status</th>
										<th colspan="2" class="text-center">Action</th>
										
										
									</tr>
								</thead>
								<tbody>
									<?php 
									$list = $conn->query("SELECT * FROM laundry_list order by status asc, id asc ");
									while($row=$list->fetch_assoc()):
									?>
									<tr>
										<td class="text-right"><?php echo $row['queue'] ?></td>
										<td class=""><?php echo date("M d, Y",strtotime($row['date_created'])) ?></td>
										<td class=""><?php echo ucwords($row['first_name']) ?></td>
										<td class=""><?php echo ucwords($row['last_name']) ?></td>
										<td class="text-center"><?php echo $row['contact']?></td>
										<td class=""><?php echo ucwords($row['customer_address']) ?></td>
										<td class=""><?php echo ($row['washing_id']) ?>
										<?php if($row['status'] == 0): ?>
											<td class="text-center"><span class="badge badge-secondary">Pending</span></td>
										<?php elseif($row['status'] == 1): ?>
											<td class="text-center"><span class="badge badge-primary">Processing</span></td>
										<?php elseif($row['status'] == 2): ?>
											<td class="text-center"><span class="badge badge-info">Ready to be Claim</span></td>
										<?php elseif($row['status'] == 3): ?>
										<td class="text-center"><span class="badge badge-success">Claimed</span></td>
										<?php endif; ?>
										<td class="text-center">
											<button type="button" class="btn btn-info btn-sm edit_laundry" data-id="<?php echo $row['id'] ?>">Edit</button>
											<!-- <button type="button" class="btn btn-outline-danger btn-sm delete_laundry" data-id="<?php echo $row['id'] ?>">Delete</button> -->
										</td>
										<td class="text-center">
											<button type="button" class="btn btn-outline-success btn-sm print_laundry" data-id="<?php echo $row['id'] ?>">Print</button>
										</td>
									</tr>
									<?php endwhile; ?>
								</tbody>
								</thead>
							</table>
						</div>
					</div>
				</div>
			</div>	
	</div>	
</div>
<style>
	#printModal .modal-dialog {
          max-width: 978px; /* New width for default modal */
    }
</style>
<!-- Modal Result-->
<div class="modal fade" id="printModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Receipt Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="results-here" class="modal-body">
      
      </div>
      <!-- Collapsible Show Questions -->
      
      <!-- End of Collapsible -->
      <div class="modal-footer">
        <button id="printresult" type="button" class="btn btn-primary">Print Result</button>
      </div>
    </div>
  </div>
</div>
<script>
	$('#new_laundry').click(function(){
		uni_modal('New Laundry','manage_laundry.php','mid-large')
	})
	$('.edit_laundry').click(function(){
		uni_modal('Edit Laundry','manage_laundry.php?id='+$(this).attr('data-id'),'mid-large')
	})
	$('.delete_laundry').click(function(){
		_conf("Are you sure to remove this data from list?","delete_laundry",[$(this).attr('data-id')])
	})
	$(".print_laundry").on('click', function(e){
		e.preventDefault();
		const ID = $(this).attr('data-id')
		console.log(ID)
		$.ajax({
			method: "POST",
			url: "getlaundry.php",
			data: { id: ID },
			dataType: "json",
			success:function(res){
				console.log(res[0])
				$.ajax({
					method: "GET",
					url: "getlaundryitems.php?id="+ID,
					dataType: "json",
					success:function(res){
						var laundryItems = res;
						laundryItems.forEach((item, idx) => {

						})
					}
				})

				$('#printModal').modal('show');

			}
		})
		
		
	})
	$('#laundry-list').dataTable()
	function delete_laundry($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_laundry',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					// setTimeout(function(){
					// 	location.reload()
					// },1500)

				}
			}
		})
	}

</script>
<?php
include('db_connect.php');
//##########################################################################
// ITEXMO SEND SMS API - PHP - CURL-LESS METHOD
// Visit www.itexmo.com/developers.php for more info about this API
//##########################################################################
function itexmo($number,$message,$apicode,$passwd){
	$ch = curl_init();
	$itexmo = array('1' => $number, '2' => $message, '3' => $apicode, 'passwd' => $passwd);
	curl_setopt($ch, CURLOPT_URL,"https://www.itexmo.com/php_api/api.php");
	curl_setopt($ch, CURLOPT_POST, 1);
	 curl_setopt($ch, CURLOPT_POSTFIELDS, 
			  http_build_query($itexmo));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	return curl_exec ($ch);
	curl_close ($ch);
}
//##########################################################################

    if($_POST)
    {
        $number = $_POST['number'];
        $name = $_POST['name'];
        $message = $_POST['msg'];
        $api = "ST-IANKR012777_T7J8R";
        $apiPass = "]4j1alp]lp";
        $text = $message;

        
        // if(!empty($_POST['name']) && !empty($_POST['number']) && !empty($_POST['msg']))
        // {
        // $result = itexmo($number,$text,$api, $apiPass);
        // if ($result == ""){
        // echo "iTexMo: No response from server!!!
        // Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.	
        // Please CONTACT US for help. ";	
        // }else if ($result == 0){
        // echo "Message Sent!";
        // }
        // else{	
        // echo "Error Num ". $result . " was encountered!";
        // }
        // }
    }
?>
<br>
<sdiv class="container-fluid">
	<div class="col-lg-12">
		<div class="row">
			<div class="col-md-8">
				<div class="card">
					<div class="card-body">
								<!-- <input type="text" name="search" style="margin-left:700px;"> 
								<button class="btn btn-primary">Search</button> -->
							<!-- table for contacts -->
							<div class="card-header">
								<h4><b>Contacts</b></h4>
							</div>
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<table id="table_id" class="display">
											<thead>
												<tr>
													<th class="text-center">#</th>
													<th class="text-center">Customer ID</th>
													<th class="text-center">First Name</th>
													<th class="text-center">Last Name</th>
													<th class="text-center">Contact No.</th>
													<th class="text-center">Action</th>
												</tr>
											</thead>
											<tbody>
												<?php 
												$i = 1;
												$contacts = $conn->query("SELECT * FROM laundry_list order by id asc");
												while($row=$contacts->fetch_assoc()):
												?>
												<tr>
														<td class="text-center"><?php echo $i++?></td>
														<td class="text-center"><?php echo $row['id']?></td>
														<td class="text-center"><?php echo $row['first_name']?></td>
														<td class="text-center"><?php echo $row['last_name']?></td>
														<td class="text-center"><?php echo $row['contact']?></td>
														<td class="text-center"><button type="submit" class="btn btn-info btn-sm btn-block btn-use">Use</button>
														<!-- need to do! -->
													
													</td>
													</tr>
												<?php endwhile;?>

											</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- Table Panel -->
					</div>
				</div>
			</div>
			
						<!-- FORM Panel -->
			<div class="col-md-4">
			<form method="post">
				<div class="card">
							<div class="card-header">
								<h4><b>New Message</b></h4>
							</div>
					<div class="card-body">
							<input type="hidden" name="id">
							<div class="form-group">
								<label class="control-label">First Name: </label>
								<input type="text" maxlength="25" class="form-control" id="firstname" name="name" required>
							</div>
							<div class="form-group">
								<label class="control-label">Last Name: </label>
								<input type="text" maxlength="25" class="form-control" id="lastname" name="lname" required>
							</div>
							<div class="form-group">
								<label class="control-label">Number: </label>
								<input type="text" maxlength="11" class="form-control" id="contactnumber" name="number" required>
							</div>

							<!-- Dropdown list for message option -->
							<div class="form-group">
								<label role="button" class="control-label">Message Option: </label>
								<select class="form-control" name="option" id="msgoption">
  									<option value="default" selected disabled>Select Message...</option>
  									<option value="1">Your laundry is ready to claim.</option>
  									<option value="2">Your laundry have an unnecessary damage</option>
 								    <option value="3">You have forgotten something</option>
  									<option value="4">Your laundry is finished.</option>
								</select>
								<br>
								<br> 
								<textarea class="form-control" name="msg" id="textArea" rows="4" cols="50" placeholder="Message here." onkeyup="countChar(this)" onchange="countChar(this)" required> </textarea>
							</div>
							<p class="text-lect" id="charNum">200</p>
							<?php 
								// echo "<p> Message Sent! </p>";
								if(!empty($_POST['name']) && !empty($_POST['number']) && !empty($_POST['msg']) && $_POST['msg'] != ''){
									$result = itexmo($number,$text,$api, $apiPass);
									if ($result == ""){
										echo " <p> iTexMo: No response from server!!!
										Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.	
										Please CONTACT US for help. </p>";	
									}else if ($result == 0){
										echo "<p> Message Sent! </p>";
									}
									else{	
										echo "<p> Error Num ". $result . " was encountered! </p>";
									}
								}
							?>
					</div>
							
					<div class="card-footer">
						<div class="row">
							<div class="col-md-12">
								<input type="submit" value="Send Message" class="btn btn-primary btn-lg btn-block">
							</div>
						</div>
					</div>
				</div>
			</form>
			</div>
			<!-- FORM Panel -->
			</div>
	</div>	
</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        
		$(document).ready(function() 
        {
			function countChar(val){
				var len = val.value.length;
				if(len >= 200)
					val.value = val.value.substring(0,200);
				else
                	$('#charNum').text(200 - len);
        	}
            $('#table_id').DataTable();
			$(".btn-use").on('click', function(){
					$tr = $(this).closest('tr');
					var data = $tr.children("td").map(function () {
						return $(this).text();
					}).get();
					$(".form-group #firstname").val(data[2])
					$(".form-group #lastname").val(data[3])
					$(".form-group #contactnumber").val(data[4])
			})
			$("#msgoption").on('change', function(e){
				e.preventDefault();
				var selectedVal = $("#msgoption option:selected").val();
				var strApp = "This message is from Boom-Boom Wash Laundry Shop,\n";
				var strvalue = '';

				if(selectedVal == 1)
					strvalue = "We'd like to inform you that your laundry is ready to claim."
				else if(selectedVal == 2)
					strvalue = "We'd like to inform you that your laundry have an unnecessary damage. We apologize for the inconvenience."
				else if(selectedVal == 3)
					strvalue = "We'd like to inform you that you've forgotten something."
				else
					strvalue = "We'd like to inform you that your laundry is already finished."


				$("#textArea").val(strApp + strvalue)
			})
        });
    </script>
  </body>
</html>
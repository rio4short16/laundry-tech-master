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
        $text = $name.":".$message;

        
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
														<td class="text-center"><button type="submit" class="btn btn-info btn-sm btn-block">Use</button>
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
			<form action="" method="post">
				<div class="card">
							<div class="card-header">
								<h4><b>New Message</b></h4>
							</div>
					<div class="card-body">
							<input type="hidden" name="id">
							<div class="form-group">
								<label class="control-label">First Name: </label>
								<input type="text" maxlenght="10" class="form-control" id="name" name="name" required>
							</div>
							<div class="form-group">
								<label class="control-label">Last Name: </label>
								<input type="text" maxlenght="10" class="form-control" id="lname" name="lname" required>
							</div>
							<div class="form-group">
								<label class="control-label">Number: </label>
								<input type="text" maxlenght="11" class="form-control" id="number" name="number" required>
							</div>

							<!-- JS for Message option Droplist -->
								<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
								<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
								<script type="text/javascript">
									$(document).ready(function() {
    								$("#messageoption").change(function () {
      								  var str = "This message is from Boom-Boom Wash Laundry Shop. ";
       								 $("select option:selected").each(function () {
            						  str += $(this).text() + "";
           															 });
       								  $("textArea").text(str);
       													    }).change();
																	 });
								</script>

							<!-- Dropdown list for message option -->
							<div class="form-group">
								<label class="control-label">Message Option: </label>
								<select name="option" id="messageoption">
									<option selected diasbled hidden></option>
  									<option value="">Your laundry is ready to claim.</option>
  									<option value="">Your laundry have an unnecessary damage</option>
 								    <option value="" >You have forgeten something</option>
  									<option value="">Your laundry is finish</option>
							
							</select>
							<br>
							<br> 
								<textarea class="form-control" name="msg" id="textArea" rows="4" cols="50" placeholder="Message here." onkeyup="countChar(this)" required> </textarea>
							
		
							</div>
							<p class="text-lect" id="charNum">200</p>
							<?php 
							
								// echo "<p> Message Sent! </p>";
								if(!empty($_POST['name']) && !empty($_POST['number']) && !empty($_POST['msg']))
								{
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
								<button type="submit" class="btn btn-primary btn-lg btn-block">Send Message</button>
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
    <script>
        function countChar(val)
        {
            var len = val.value.length;
            if(len>=200)
            {
                val.value = val.value.substring(0,200);
            }
            else
            {
                $('#charNum').text(200 - len);
            }
        };
		$(document).ready(function() 
        {
            $('#table_id').DataTable();
        } );
    </script>
  </body>
</html>
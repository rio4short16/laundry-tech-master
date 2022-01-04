<style>
.helloContainer{
	height:228px; 
	width:98.5%; 
	margin-top:10px;
	margin-left:10px;
	border-radius:25px;
	background-color:#c7eced;
}
.welcomeContainer{
	height:180px; 
	width:96.5%; 
	margin-top:25px;
	margin-left:25px;
	border-radius:25px;
	background-color:#def9ff;
}

.user-photo{
	height:150px; 
	width:150px; 
	margin-top:0px;
	float: right;
	border-radius: 50%;
	background-color:#9bc9b2;
}

.BoomLogo{
	height:50px; 
	width:100%; 
	margin-top:-280px;
	margin-left:265px;
	border-radius:50px;
	background-color:white;
}

</style>
<br>
<div class="container-fluid">
	<div class="row mt-3 ml-3 mr-3">
			<div class="col-12">
			<div class="card">
				<div class="helloContainer">
					<div class="welcomeContainer">
						<div class="card-body">
							<b>
							<?php echo "Hello ".$_SESSION['login_name'].", Welcome Back!"  ?>
							<b>	
							<img class="user-photo" src="<?= $_SESSION['login_image'] != '' ? $_SESSION['login_image'] : './assets/img/defaultuser.png' ?>" alt="2x2 Picture">
						</div>
					</div>
				</div>

				<hr>
				<div class="row" center>

				<!-- Start of total profit -->
				<div class="alert alert-success col-md-3 ml-4">
				<p><b><large>Total Sales Today</large></b></p>
				<hr>
				<img src="assets/img/ProfitIcon.png" alt=""style="width:65px;height:65px;>
					<p class="text-right"><b><large>
					&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				<?php 
					include 'db_connect.php';
					$laundry = $conn->query("SELECT SUM(total_amount) as amount FROM laundry_list where pay_status= 1 and date(date_created)= '".date('Y-m-d')."'");
					echo $laundry->num_rows > 0 ? number_format($laundry->fetch_array()['amount'],2) : "0";?>
					</large></b></p>
				</div>
				<!-- End of total profit -->

				<!-- Start of total customer today -->
				<div class="alert alert-primary col-md-3 ml-4">
				<p><b><large>Total Customer Today</large></b></p>
				<hr>
				<img src="assets/img/CustomerIcon.png" alt=""style="width:65px;height:65px;>
					<p class="text-right"><b><large>
					&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp	
					<?php 
					include 'db_connect.php';
					$laundry = $conn->query("SELECT count(id) as `count` FROM laundry_list where  date(date_created)= '".date('Y-m-d')."'");
					echo $laundry->num_rows > 0 ? number_format($laundry->fetch_array()['count']) : "0";?>
					</large></b></p>
				</div>
				<!-- End of total customer today -->

				<!-- Start of Monthly income -->
					<div class="alert alert-success col-md-3 ml-4">
					<p><b><large>Monthly Income</large></b></p>
					<hr>
					<img src="assets/img/MonthlyIncomeIcon.png" alt=""style="width:65px;height:65px;>
					<p class="text-right"><b><large>
					&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					<?php 
					include 'db_connect.php';
					$laundry = $conn->query("SELECT SUM(total_amount) as amount FROM laundry_list where pay_status= 1 and date(date_created)= '".date('Y-m-d')."'");
					echo $laundry->num_rows > 0 ? number_format($laundry->fetch_array()['amount'],2) : "0";?>
					</large></b></p>
					</div>
				<!-- End of Monthly Income -->

				<!-- Start of Total Washing Machine -->
					<div class="alert alert-info col-md-3 ml-4">
					<p><b><large>Total Washing Machine</large></b></p>
					<hr>
					<img src="assets/img/WashingIcon.png" alt=""style="width:65px;height:65px;>
					<p class="text-right"><b><large>
					&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					<?php 
					include 'db_connect.php';
					$laundry = $conn->query("SELECT count(id) as `count` FROM washing_list");
					echo $laundry->num_rows > 0 ? number_format($laundry->fetch_array()['count']) : "0";?>
					</large></b></p>
					</div>
				<!-- End of Washing Machine -->

				<!-- Start of Total Claimed Laundry Today -->
					<div class="alert alert-warning col-md-3 ml-4">
					<p><b><large>Total Claimed Laundry Today</large></b></p>
					<hr>
					<img src="assets/img/ClaimedIcon.png" alt=""style="width:65px;height:65px;>
					<p class="text-right"><b><large>
					&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					<?php 
					include 'db_connect.php';
					$laundry = $conn->query("SELECT count(id) as `count` FROM laundry_list WHERE status = 3 and date(date_created)= '".date('Y-m-d')."'");
					echo $laundry->num_rows > 0 ? number_format($laundry->fetch_array()['count']) : "0";?>
					</large></b></p>
					</div>
				<!-- End of total claimed laundry -->

				<!-- Start of Total Unclaimed Laundry Today -->
					<div class="alert alert-danger col-md-3 ml-4"> 
					<p><b><large>Total Unclaimed Laundry Today</large></b></p>
					<hr>
					<img src="assets/img/PendingIcon.png" alt=""style="width:65px;height:65px;>
					<p class="text-right"><b><large>
					&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					<?php 
					include 'db_connect.php';
					$laundry = $conn->query("SELECT count(id) as `count` FROM laundry_list WHERE status = 2 and date(date_created)= '".date('Y-m-d')."'");
					echo $laundry->num_rows > 0 ? number_format($laundry->fetch_array()['count']) : "0";?>
					</large></b></p>
					</div>
				<!-- End of Total Unclaimed Laundry today -->
</div>		
</div>
</div>
</div>
</div>
</div>
<script>
</script>
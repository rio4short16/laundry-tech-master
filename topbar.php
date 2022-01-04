<style>
	.logo {
    margin: auto;
}
.navbar{
	height: 120px;
	width: 100%;
	position: fixed;
	top: 0;
	left: 0;
}
.navbar-container{
	height: 120px;
	width: 80%;
	margin: 0 auto;
	max-width: 2000px;
	display: flex;
	justify-content: space-between;
	align-items: center;
}
.navbar-container img{
	width: 120px;
	height: 120px;
}
.logout-container h6{
	height: 120px;
	line-height: 120px;
	margin: auto 0 !important;
}
.logout-container{
	height: 120px;
	display: flex;
	justify-content: space-evenly;
	align-items:center;
}
</style>

<nav class="navbar navbar-dark bg-info" style="padding:0;">
<!-- <a href="ajax.php?action=logout" class="text-white" ><?php echo "Hi, I'm " .$_SESSION['login_name'] ?> <i class="fas fa-sign-out-alt"></i></a> -->
	<div class="navbar-container">
		<img src="./assets/img/LaundryTechLogo.png" alt="Logo">
		<div class="logout-container">
			<h6 class="text-white"><?php echo "Hi, I'm " .$_SESSION['login_name'] ?></h6>
			<a class="ml-5" href="ajax.php?action=logout"><i class="fas fa-sign-out-alt fa-3x text-white"></i></a>
		</div>
	</div>
  
</nav>
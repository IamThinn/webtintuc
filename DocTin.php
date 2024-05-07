
<?php 
header("Content-type: text/html; charset=utf-8");
$servername = "localhost";
	$username = "admin";
	$password = "";
	$dbname = "database_news";
	$id='';
 	$port= 3306;
    $socket="mysql:unix_socket=/cloudsql/nohope-0212:us-central1:dientoan";
$result="";
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
		
		try{
		$conn = mysqli_connect($servername, $username, $password,$dbname,$port,$socket);
			mysqli_set_charset($conn, 'UTF8');
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		} 
		$sql="SELECT * FROM news where newsID = ".$id;
		$result=mysqli_query($conn,$sql);
	}catch(PDOException $e)
	{
		echo "Connection failed: " . $e->getMessage();
	}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>index</title>
	<link rel="stylesheet" href="public/css/bootstrap.min.css" />
	<link rel="stylesheet" href="style/style.css">

</head>

<body>
	<div class="home-doctin">
		<nav class="menu-top">
			<h1>REVIEW DU LỊCH</h1>
			<div id="seach">
				<input type="text" style="width: 200px;height: 35px"/>
				<button type="button" class="btn btn-primary mauxanh">Search</button>
			</div>
			<ul>
				<li><a href="index1.php">Trang Chủ</a></li>
				<li>Đăng Nhập</li>
			</ul>
		</nav>
		<div id="container-doctin">
			
			<div class="doctin-tinchinh">
				<?php 
				
					if(isset($_GET['id'])){
						if (mysqli_num_rows($result) > 0) {
						 while($row = mysqli_fetch_assoc($result)) {
				?>
				<h1><?php echo $row["title"];?></h1>
				<p><?php echo $row["mota"];?>
				</p>
			</div>
			<?php 
						 }
						}
					}
					
			?>
		</div>
	</div>
			
<script src="jquery/jquery-3.3.1.min.js"></script>	
<script src="public/js/bootstrap.min.js"></script>
<script src="javascript/jv.js"></script>
</body>
</html>

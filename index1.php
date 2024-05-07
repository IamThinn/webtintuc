<?php
	header("Content-type: text/html; charset=utf-8");
	$servername = "localhost";
	$username = "admin";
	$password = "";
	$dbname = "database_news";
	$id='';
 	$port=3306;
    $socket="mysql:unix_socket=/cloudsql/nohope-0212:us-central1:dientoan";
	$arays= array(array());
	
	try{
		$conn = mysqli_connect($servername, $username, $password,$dbname,$port,$socket);
		mysqli_set_charset($conn, 'UTF8');
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		} 
		$sql="SELECT * FROM news";
		$result=mysqli_query($conn,$sql);
		$i=0;
		if (mysqli_num_rows($result) > 0) {
			 while($row = mysqli_fetch_assoc($result)) {
				 $arays[$i][0]=$row["newsID"];
				 $arays[$i][1]=$row["title"];
				 $arays[$i][2]=$row["picture"];
				 $arays[$i][3]=$row["content"];
				 $i++;
			 }
		}
	}catch(PDOException $e)
	{
		echo "Connection failed: " . $e->getMessage();
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
	<div class="home">
		<nav class="menu-top">
			<h1>REVIEW DU LỊCH</h1>
			<div id="seach">
				<input type="text" style="width: 200px;height: 35px"/>
				<button type="button" class="btn btn-primary mauxanh">Search</button>
			</div>
			<ul>
				<li><a href="index1.php">Trang Chủ</a></li>
			</ul>
		</nav>
		<div id="container">
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
		  <!-- Indicators: khai báo các slide chỉ định khi được click và hiển thị chấm tròn được tô màu -->
			  <ol class="carousel-indicators">
			    <li data-target="#myCarousel" data-slide-to="" class="active"></li>
			    <li data-target="#myCarousel" data-slide-to=""></li>  
			    <li data-target="#myCarousel" data-slide-to=""></li>
			  </ol>
			
			  <!-- Wrapper for slides: Khai báo các hình ảnh trong các slide -->
			  <div class="carousel-inner" role="listbox">
			    <div class="item active">
			      <img class="img-item" src="public/image/thien-nhien.jpg" alt="">
			      <div class="carousel-caption">
			      	<h3>Cùng nhau đi đến nơi đẹp nhất</h3>
			      	<button type="button" class="btn btn-primary">Read Now</button>
			      </div>
			    </div>
			    <div class="item">
			      <img class="img-item" src="public/image/ut-2.jpg" alt="">
			      <div class="carousel-caption">
			      	<h3>Cùng nhau đi đến nơi đẹp nhất</h3>
			      	<button type="button" class="btn btn-primary">Read Now</button>
			      </div>
			    </div>
			    <div class="item">
			      <img class="img-item" src="public/image/ut.jpg" alt="">
			      <div class="carousel-caption">
			      	<h3>Cùng nhau đi đến nơi đẹp nhất</h3>
			      	<button type="button" class="btn btn-primary">Read Now</button>
			      </div>
			    </div>
			  </div>
			
			  <!-- Left and right controls: tạo nút di chuyển lùi, tới -->
			  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> 
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
			</div>
		</div>
		<!-- xóa ảnh hưởng thuộc tính float -->
		<div style="clear: both"></div>
		<div id="con-tintuc">
			<h1>Tin Tổng Hợp</h1>
			
			<div class="con-tintuc-nd">
				<div class="tintuc-noidung">
					<?php 
						for($i=0;$i<count($arays)/2;++$i)
						{
					?>
					<div class="noidung">
						<img src=public/image/<?php echo $arays[$i][2];?> />
						<div class="noidung-vanban">
							<p class="tieudebangtin"><a href="DocTin.php?id=<?php echo $arays[$i][0];?>"><?php echo $arays[$i][1];?></a></p>
							<br />
							<p><?php echo $arays[$i][3];?></p>
						</div>
					</div>
					<?php 
						}
					?>
				</div>
				
				<div class="tintuc-noidung">
					<?php 
					for($i=count($arays)/2  ;$i<count($arays);++$i)
					{
						?>
					<div class="noidung">
						<img src="public/image/<?php echo $arays[$i][2];?>" />
						<div class="noidung-vanban">
							<p class="tieudebangtin"><a href="DocTin.php"><?php echo $arays[$i][1];?></a></p>
							<br />
							<p><?php echo $arays[$i][3];?></p>
						</div>
					</div>
					<?php 
					}
				?>
				</div>
				
			</div>
		</div>
			
			<ul>
				<li><a href="index1.php"></a></li>
				<li><a href="index2.php"></a></li>
				<li><a href="index3.php"></a></li>
			</ul>
	</div>
<script src="jquery/jquery-3.3.1.min.js"></script>	
<script src="public/js/bootstrap.min.js"></script>
<script src="javascript/jv.js"></script>
</body>
</html> 

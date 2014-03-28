<?php 
	header('Access-Control-Allow-Origin: http://diskstation'); 
	require_once("synosearch.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $ini_array[general_settings][title]; ?></title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script> 
	<script src="http://ajax.cdnjs.com/ajax/libs/underscore.js/1.1.6/underscore-min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.1.0/backbone-min.js"></script>
	<script src="synosearch.js"></script> 
</head>
<body>
	<div id="container">
		<div id="nav_bar">
			<ul>
				<li><a href="http://diskstation:5000">Admin+</a></li> 
				<li><a href="#Books" id="booklink">Books</a></li>
				<li><a href="#Videos" id="videolink">Videos</a></li> 
				<li><a href="#Photos" id="photolink">Photos</a></li>
			</ul>
		</div>
		<div id="search_box_container">
			<div id="search_box">
				<form id="search_form">
					<input type="text" id="search_field" name="search_field" x-webkit-speech />
					<input type="submit" id="submit_btn" value="Search" />
				</form>
				<div id="results_ret"></div>
			</div>
		</div>
		<br/>
		<div id="search_result"></div><br/>
		<div id="footer">Index Last Updated: 7-10-2013</div>
	</div>
</body>
</html>
<?php 
	header('Access-Control-Allow-Origin: http://diskstation'); 
	require_once("synosearch.php");
	
	$menu_string = ""; 
	foreach($search_configs as $key => $value){
		$name = $search_configs[$key]["name"];
		$menu_string .= "<li><a href='#{$name}' id='{$name}link' />{$name}</a></li>";
	}
	$menu_string = "<ul>{$menu_string}</ul>";
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
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div id="container">
		<div></div>
		<div id="nav_bar"><?php echo $menu_string; ?></div>
		<div id="search_box_container">
			<div id="search_box">
				<form id="search_form">
					<input type="text" id="search_field" name="search_field" x-webkit-speech />
					<button class="btn btn-primary" id="submit_btn" >Search</button>
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
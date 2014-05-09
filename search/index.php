<?php 
	header('Access-Control-Allow-Origin: http://diskstation'); 
	require_once("synosearch.php");
	$menu_string = ""; 
	foreach($search_configs as $key => $value){
		$name = $search_configs[$key]["name"];
		$menu_string .= "<li><a href='#{$name}' id='{$name}link' />{$name}</a></li>";
	}
	$menu_string = "{$menu_string}";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $ini_array[general_settings][title]; ?></title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script> 
	<script src="synosearch.js"></script> 
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<!-- Optional theme -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
	<!-- Latest compiled and minified JavaScript -->
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	
	
	 <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
	      <div class="container">
		        <div class="navbar-header" >
		          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		            <span class="sr-only">Toggle navigation</span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		          </button>
		          <a class="navbar-brand" href="#" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal"><?php echo $ini_array[general_settings][title]; ?></a>
		        </div>
		        <div class="navbar-collapse collapse">
		          	<ul class="nav navbar-nav"><?php echo $menu_string; ?></ul>
					<form class="navbar-form navbar-left" role="search">
						<div class="form-group">
							<input type="text" class="form-control" id="search_field" name="search_field" x-webkit-speech placeholder="Search">
						</div>
					</form>
					<ul class="nav navbar-nav"><li><a href="#">Results <span class="badge" id="results_ret" ></span></a></li></ul>
		        </div><!--/.nav-collapse -->
	      </div>
    </div>
	
	<!-- Button trigger modal -->
<!--<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Launch demo modal
</button>
-->
	<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
     
  <div class="container">
      <form class="form-signin" role="form">
        <h2 class="form-signin-heading">Please sign in</h2>
        <hr/>
        <input type="email" class="form-control" placeholder="Email address" required autofocus>
        <input type="password" class="form-control" placeholder="Password" required>
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>
    </div> <!-- /container -->
     
    </div>
  </div>
</div>
	
	<div class="container">
		<div id="search_result"></div><br/>
	</div>
	
	</div>
</body>
</html>
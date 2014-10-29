<!DOCTYPE html>
<html lang="en" ng-app="SynosearchApp">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{sitetitle}}</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script> 
	<script src="packages/angular/angular.js"></script>
	<script src="packages/angular/angular-route.js"></script>
	<script src="packages/angular/angular-resource.js"></script>
	<script src="js/app.js"></script>
	<script src="js/controller.js"></script>
	<script src="js/services.js"></script>
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="packages/bootstrap/css/bootstrap.css">
	<!-- Optional theme -->
	<link rel="stylesheet" href="packages/bootstrap/css/bootstrap-theme.min.css">
	<!-- Latest compiled and minified JavaScript -->
	<script src="packages/bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/style.css">
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
		          <a class="navbar-brand" href="#" class="btn btn-primary btn-lg" data-toggle="modal" data-target=".bs-example-modal-sm">{{sitetitle}}</a>	
		    </div>
		    <div class="navbar-collapse collapse">
		          	<ul class="nav navbar-nav" ng-repeat="menuitem in menulist">
		          		<li><a href="{{menuitem.link}}">{{menuitem.name}}</a></li>
		          	</ul>
					<form class="navbar-form navbar-left" role="search">
						<div class="form-group">
							<input type="text" class="form-control" id="search_field" name="search_field" x-webkit-speech placeholder="Search">
						</div>
					</form>
					<ul class="nav navbar-nav"><li><a href="#">Results <span class="badge" id="results_ret" ></span></a></li></ul>
		    </div><!--/.nav-collapse -->
		</div>
    </div>
	<div ng-view></div>
</body>
</html>
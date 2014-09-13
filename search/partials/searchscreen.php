<div ng-controller="SearchScreenController" class="container">
	<div class="row">
		<div class="col-xs-10">
			<input type="text" class="form-control" ng-model="form.search" />
		</div>
	</div>
	<div class="row">
		<div class="col-xs-10">
			<table class="table">
				<thead>
					<tr><th>Number</th><th>Filename</th><th>Filesize</th><th>Options</th></tr>		
				</thead>
				<tbody>
					<tr ng-repeat="result in searchresults">
						<td>{{$index}}</td>
						<td>{{result.filename}}</td>
						<td>{{result.filesize}}</td>
						<td>
							<a href="">Download</a>|
							<a href="">Dropbox</a>|
							<a href="">Email</a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
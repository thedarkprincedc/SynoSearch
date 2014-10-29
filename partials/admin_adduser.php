<div ng-controller="AdminAddUser" class="container">
	<div class="row">
		<div class="col-xs-12">
			<h1>Modify User</h1>
			<table class="table">
				<tr><th></th><th>Username</th><th>Email</th><th>Privaleges</th></tr>
				<tr ng-repeat="result in userlist">
					<td><input type="checkbox" value="result.id"/></td>
					<td>{{result.username}}</td>
					<td>{{result.email}}</td>
					<td>{{result.privaleges}}</td>
				</tr>
			</table>
			<button type="button" class="btn btn-primary" name="remove_user" id="remove_user">Remove User</button>
		</div>
	</div>
	
	<form>
		<h1>Add User</h1>
		 <div class="form-group">
		    <label for="username">Username</label>
		    <input type="text" class="form-control" id="username" placeholder="Username">
		 </div>
		 <div class="form-group">
		    <label for="Password">Password</label>
		    <input type="password" class="form-control" id="Password" placeholder="Password">
		 </div> 
		 <div class="form-group">
    		<label for="exampleInputEmail1">Email</label>
		    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
		 </div>
		 <div class="form-group">
		    <label for="privs">Privaleges</label>
		   	<select class="form-control" id="privs">
			<option></option>
			<option>User</option>
			<option>Admin</option>	
			</select>
		 </div>	
	</form>

	<button type="button" class="btn btn-primary" name="add_user" id="add_user">Add User</button>
	
</div>
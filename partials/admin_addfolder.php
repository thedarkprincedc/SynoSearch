<div ng-controller="AdminAddFolder" class="container">
<table class="table">
	<tr><th></th><th>FolderName</th><th>FullPath</th></tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
	</tr>
</table>
<button type="button" class="btn btn-primary" name="remove_folder" id="remove_folder">Remove Folder</button>

<form class="form">
	<div class="form-group">
	    <label for="foldername">Folder Name</label>
	    <input type="text" class="form-control" id="foldername" placeholder="Folder Name">
	 </div>
	 <div class="form-group">
	    <label for="folderpath">Full Path</label>
	    <input type="text" class="form-control" id="folderpath" placeholder="Folder Path">
	 </div>
	<button type="button" class="btn btn-primary" name="add_folder" id="add_folder">Add Folder</button>
</form>

</div>

var resultCount = "";
var videoRegEx = new RegExp(".(mp4|mov|ogg)");
var pictureRegEx = new RegExp(".(jpg|bmp|gif)");
var bookRegEx = new RegExp(".(pdf|txt)");
function search_drive(search_text){
	$('#search_result').html("");
	var t = location.hash.substr(1);
	if(search_text.length > 0){
		$.getJSON('synosearch.php?search=' + search_text + "&query=" + t , process_data);
	}
}
function process_data(data){
	var tempString = "";
	var resultCount = 0;
	$.each(data.results, function(key, val) {
		var file_class = (videoRegEx.test(val.filename)) ? "video" : "";
		//file_class = (pictureRegEx.test(val.filename)) ? "picture" : "";
		file_class = (file_class !== "") ? "class='" + file_class + "'" : "";
		var url = "http://" + window.location.hostname +":5005/" + val.filepath;
		tempString += "<tr><td><a href='"+url+"'" + file_class + ">" + val.filename + "</a></td></tr>";
		resultCount++;
	});
	$('#results_ret').html(resultCount);
	$('#search_result').html("<div class='panel panel-default'><div class='panel-heading'>Results</div><table class='table'><thead><th>Filename</th></thead>" + tempString + "</table></div></div>");
}
function clear_results(){
	$('#search_result').html("");
	$('#results_ret').html("");
}
function login(event){
	
}
function openhtml5video(event){
	$('.bs-example-modal-lg').modal('show');
}
$(document).ready(function() { 
	$(document).on("click", ".video", function(event){
		openhtml5video(event);
	});
	$(document).on("click", ".login", function(event){
		login(event);
	});
	
	$("input[name='search_field']").keyup(function(){
		var search_text = $("input[name='search_field']").val();
		if(search_text.length > 0){
			search_drive(search_text);
		}
		else{				
			clear_results();
		}
	});
});
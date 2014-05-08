
var resultCount = "";
function search_drive(search_text){
	$('#search_result').html("");
	var t = location.hash.substr(1);
	if(search_text.length > 0){
		$.getJSON('synosearch.php?search=' + search_text + "&query=" + t , process_data);
	}
}
function process_data(data){
	var tempString = "";
	$.each(data.results, function(key, val) {
		var url = "http://" + window.location.hostname +":5005/" + val.filepath;
		tempString += "<tr><td><a href='"+url+"'>" + val.filename + "</a></td></tr>";
		resultCount++;
	});
	$('#results_ret').html(resultCount + " Results");
	$('#search_result').html("<table><thead><th>Filename</th></thead>" + tempString + "</table>");
}
function clear_results(){
	$('#search_result').html("");
	$('#results_ret').html("");
}
$(document).ready(function() { 
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
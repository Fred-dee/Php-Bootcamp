$(document).ready(function(){	
	$("button").on("click", function(){
		var input = prompt("Add an element to the list: ");
		if (input.trim().length != 0)
		{
			input = input.trim();
			var nd = "<div class ='clickable' id =''>" + input + "</div>"
			$("#ft_list").prepend(nd);
			document.cookie = "obj=" + nd;
		}
		else
		{
			alert("Unable to add empty string");
			console.log("Unable to add empty string");
		}
		
	});
	
	$("#ft_list").on("click", '.clickable', function(){
		if (confirm("Do Want to remove item?: " + $(this).text()))
			$(this).remove();
	});
});
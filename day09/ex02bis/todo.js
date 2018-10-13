$(document).ready(function(){	
	$("button").on("click", function(){
		var input = prompt("Add an element to the list: ");
		if (input.trim().length != 0)
		{
			input = input.trim();
			var nd = "<div class ='clickable'>" + input + "</div>"
			$("#ft_list").prepend(nd);
            var d = new Date();
            d.setTime(d.getTime() + (1 * 24 * 60 * 60 * 1000));
            var ex = "expires="+d.toUTCString();
            document.cookie = input + "=" + nd + ";" + ex + ";path=~/Desktop/";
		}
		else
		{
			alert("Unable to add empty string");
			console.log("Unable to add empty string");
		}
		
	});
	
	$("#ft_list").on("click", '.clickable', function(){
		if (confirm("Do Want to remove item?: " + $(this).text()))
        {
			
                var d = new Date();
                cname = $(this).text();
                d.setTime(d.getTime() - (1000*60*60*24));
                var expires = "expires=" + d.toGMTString();
                window.document.cookie = cname+"="+"; "+expires;
            $(this).remove();
        }
	});
    
});

$(window).on("load", function (){
        var cook = document.cookie.split(';');
        cook.forEach(function(item){
            item = item.replace(/[\s|\w]+=/, "");
            $("#ft_list").prepend(item);
        });
});
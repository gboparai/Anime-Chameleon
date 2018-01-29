 $( document ).ready(function() {
    $("#searchbutton").on("click", function(){
		console.log("in here");
		var base = "/search/";
		var value = $('#search').val();
		var url = base+""+value;
		console.log(url);
		location.replace(url);
	});

	var triggers = $('div.a-z button');
	var filters = $('ul#anime-series li a');

	triggers.click(function() {
		var takeLetter = $(this).text();
		if( takeLetter == "All"){
			filters.parent().hide();
			filters.parent().fadeIn(222);;
		}
		else{
			var found = false;
			filters.parent().hide();

			filters.each(function(i) {
				var compareFirstLetter = $(this).text().replace(/\s/g,'').substr(0,1);
				console.log(compareFirstLetter);
				if ( compareFirstLetter ==  takeLetter ) {
					$(this).parent().fadeIn(222);
					found = true;
				}
			});
			if (!found) {console.log('There is no result.');}
		}
	});
});
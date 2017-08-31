$(document).ready(function(){
	if ($('body').width() <= 900) {
		
    var button = document.getElementById('button');
    var actions = {
        1: function() {
           	$( "#wrap2" ).slideToggle( "slow", function() {
			});
			$('#button').text('CLOSE');
        },
        2: function() {
			$( "#wrap2" ).slideToggle( "slow", function() {
			});
			$('#button').text('MORE');
        }
    };
    var counter = 0;
    button.onclick = function() {
        actions[counter = (counter % 2) + 1]();
    }
	}
});
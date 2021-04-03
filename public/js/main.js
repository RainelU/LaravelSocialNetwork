$(document).ready(function() {
    $("#files").on("change", function(e){
    	e.preventDefault();
        var files = $(this)[0].files;

        if (files.length == 1) {
        	var filename = e.target.value.split('\\').pop();
        	e.target.labels[0].innerText = "Archivo: " + filename;
       	}
    });
});

function markNotificationAsRead(){
	$.get('/markAsRead');
}

$(document).ready(function() {
    $("#box-message").click(function(e){
    	e.originalEvent.screenX = 0;
    	$("#box-message").scrollTop = 0;
    	console.log(e);
    });
});
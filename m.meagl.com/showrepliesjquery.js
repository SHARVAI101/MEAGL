//this is to show all replies when the show replies button below a comment is clicked
$(document).ready(function(){
    $(".repliestogglebutton").click(function() {
    	var name=".allreplies"+$(this).attr("name");
        $(name).toggle();
    });
});
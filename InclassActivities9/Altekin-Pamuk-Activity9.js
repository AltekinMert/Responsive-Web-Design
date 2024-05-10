$(document).ready(function() {

    $("#image_list a").each(function() {
        var swappedImage = new Image();
        swappedImage.src = $(this).attr("href");
    });
    $("#image_list a").click(function(evt) {

		var imageURL = $(this).attr("href");
        var caption = $(this).attr("title");
		//fading
        $("#image").fadeOut(1000, function() {

            $("#image").attr("src", imageURL);
            $("#caption").text(caption);

            $("#image").fadeIn(1000);
        });
		//fading
		evt.preventDefault();
    });
    $("li:first-child a").focus();
});

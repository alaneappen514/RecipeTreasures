$(document).ready(function () {
    $(".bannertextContainer").fadeIn("slow");
    console.log("hello")
    $('#AddRecipe').click(function () {
        $('#myModal').modal('show')
    })
    $(window).scroll(function () {
        if ($(this).scrollTop() > 400) {
            $(".recipeContainer").fadeTo("slow", 1);
            $(".bannertextContainer").fadeOut("slow");
        }
        else {
            $(".bannertextContainer").fadeIn("slow");
        }
    })
})

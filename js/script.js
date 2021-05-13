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


    $('.like').on('click', function () {
        var ids = $(this).data('id');
        var Recipe_ID = ids[0];
        var User_ID = ids[1];
        $recipe = $(this);
        $.ajax({
            url: 'includes/like_system.php',
            type: 'POST',
            data: {
                'liked': 1,
                'Recipe_ID': Recipe_ID,
                'User_ID': User_ID
            },
            success: function (response) {
                $recipe.parent().find('span.likes_count').text(response)
                $recipe.addClass('d-none')
                $recipe.siblings().removeClass('d-none')
            }
        });
    });
    $('.unlike').on('click', function () {
        var ids = $(this).data('id');
        var Recipe_ID = ids[0];
        var User_ID = ids[1];
        $recipe = $(this);
        $.ajax({
            url: 'includes/like_system.php',
            type: 'post',
            data: {
                'unliked': 1,
                'Recipe_ID': Recipe_ID,
                'User_ID': User_ID
            },
            success: function (response) {
                $recipe.parent().find('span.likes_count').text(response)
                $recipe.addClass('d-none')
                $recipe.siblings().removeClass('d-none')
            }
        });
    });

})

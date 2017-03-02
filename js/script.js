$(document).ready(function () {
    $("a.short-url").click(function () {
        var short_url = $(this).text();

        $.ajax({
            url: "/click.php",
            data: {short_url:short_url} ,
            type: "POST",
            success: function (data) {
                window.location.href = 'http://'+data;
            }
        });

        return false;
    })

})



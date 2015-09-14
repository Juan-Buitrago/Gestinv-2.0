$(document).ready(function (e) {
    $("form").submit(function (e) {
        e.preventDefault();
        var controller = $("form").attr("action");
        var action = $(this).attr("name");
        var data = $(this).serialize();
        ajax(controller, action, data);
    });
});

function ajax(controller, action, data) {
    $.ajax({
        type: "POST",
        url: controller,
        data: data + "&petition=" + action,
        beforeSend: function (xhr) {
            $(".contenido").html("<img src='view/img/loader.gif'>");
        },
        success: function (data) {
            setTimeout(function () {
                $(".contenido").html(data);
            }, 1400);
        },
        timemout: 10000,
        error: function (jqXHR, textStatus, errorThrown) {
            $(".contenido").html("Ocurrio un error");
        }
    });
};


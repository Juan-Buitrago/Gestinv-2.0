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
        url: "../../../controller/"+controller,
        data: data + "&petition=" + action,
        beforeSend: function (xhr) {
            $(".contenido").html("<i class='fa-2x fa fa-spinner fa-pulse'></i><br><h3>Procesando...</h3>");
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


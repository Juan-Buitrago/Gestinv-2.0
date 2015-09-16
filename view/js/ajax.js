$(document).ready(function (e) {

    // funcion para procesar los formularios que se envian al controlador
    $("form").submit(function (e) {
        e.preventDefault();
        var controller = $("form").attr("action");
        var action = $(this).attr("name");
        var data = $(this).serialize();
        $(".contenido").empty();
        ajax(controller, action, data);
    });

    $("a").click(function (e) {
        e.preventDefault();
        var controller = $(this).attr("href");
        var action = $(this).attr("name");
        ajaxMenus(controller, action);
    });



});

function ajax(controller, action, data) {
    $.ajax({
        type: "POST",
        url: "/Gestinv-2.0/controller/" + controller,
        data: data + "&petition=" + action,
        beforeSend: function (xhr) {
            $(".contenido").html("<img src='view/img/loader.gif'><br><h3>Procesando...</h3>");
        },
        success: function (data) {
            setTimeout(function () {
                $(".contenido").html(data);
            }, 400);
        },
        timemout: 10000,
        error: function (jqXHR, textStatus, errorThrown) {
            $(".contenido").html("Ocurrio un error");
        }
    });
}
;

function ajaxMenus(controller, action) {
    $.ajax({
        type: "POST",
        url: "/Gestinv-2.0/controller/" + controller,
        data: "&petition=" + action,
        beforeSend: function (xhr) {
            $(".contenido").css('display', 'block');
            $(".contenido").html("<img src='view/img/loader.gif'><br><h3>Procesando...</h3>");
        },
        success: function (data) {
            alert(data);
            setTimeout(function () {
                $(".contenido").html(data);
            }, 400);
        },
        timemout: 10000,
        error: function (jqXHR, textStatus, errorThrown) {
            $(".contenido").html("Ocurrio un error");
        }
    });
};

$(document).ready(function (e) {
    setInterval(11000);
    $(".loadfrm").click(function () {
        $(".contenido").remove();
        var y = $(this).attr("href");
        var respuesta = $(".content");
        respuesta.load(y);
        return false;

    });
    $("button").click(
            function () {

                var formulario = $("form");
                var typeformulario = $("form").attr("id");
                var data = $(formulario).serialize();
                $.ajax({
                    type: "POST",
                    url: "index.php",
                    data: data,
                    beforeSend: function (xhr) {
                        $('.content').html('<div><img src="view/img/ajax-loader.gif"/></div>');
                    },
                    success: function (data) {
                        setTimeout(function () {
                            $('.content').fadeIn(1000).html(data);
                        }, 5000);
                    },
                    timemout: 40000,
                    error: function (jqXHR, textStatus, errorThrown) {
                        
                        alert("ocurrio un error");
                    }
                });
            }
    );
});
	
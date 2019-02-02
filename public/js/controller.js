$(function(){
    $(document).on("click", ".addCart", function(){
        var url = $("input[name=url_base]").val();
        var token = $("input[name=_token]").val();
        
        $.post(url+"/addCart", {_token: token, id: $(this).data("val")}, function(data){
            $("#contenido_mensaje_modal").html(data.mensaje);
            $("#modal_mensajes").modal("show");
        })
    })
});
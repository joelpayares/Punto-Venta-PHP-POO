$("#frmAcceso").on('submit',function(e)
{
	e.preventDefault();
    login=$("#login").val();
    clave=$("#clave").val();

    $.post("ajax/usuario.php?op=verificar",
        {"login":login,"clave":clave},
        function(data)
    {
        if (data!="null")
        {
            $(location).attr("href","escritorio.php");            
        }
        else
        {
            bootbox.alert("Usuario y/o Password incorrectos");
        }
    });
})
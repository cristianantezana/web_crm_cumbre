$(document).ready(function(){
    $(".modal-header").css("background-color", "rgb(0, 58, 115)");
    $('#btnAgregarActividad').click(function(){
        // if ($('#tipo_actividad').val() ==0) {
		// 	swal("Debes selecciona una Dato");
		// 	return false;}
        agregarActividad();
    });
});
function agregarActividad(){
    $.ajax({
        type: "POST",
        url :"procesos/actividades/AgregarActivdad.php",
        data: $('#frmAgregarActividad').serialize(),
        success:function(respuesta){
            respuesta = respuesta.trim();
			if (respuesta == 1) {
				$('#frmAgregarActividad')[0].reset();
				$('#modalAgregarActividad').modal("toggle");
                     location.reload();
                swal(":D","Se agrego con exito!","success");
			} else {
				swal(":(","Seleccione Un campo !","error");
			}
        }

    });
}
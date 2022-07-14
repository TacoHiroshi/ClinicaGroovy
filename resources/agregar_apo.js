$(function() {
    var i = 1;
    $('#agregar-apo').click(function (e) {
    e.preventDefault();
        i++;
    
    $('.row-parents').append(
    '<div class="row">'
        +'<div class="col-lg-2 col-md-3 col-sm-4">'
        +'<b>Datos del Apoderado:</b>'
        +'</div>'
    +'</div>'
        +'<div class="form-row" id="row-parents'+i+'">'
        +'<div class="col-lg-2 col-md-3 col-sm-4">'
            +'<div id="apoderado" class="form-group">'
            +'<label for="exampleInputFile">Apellido paterno: </label>'
            +'<div class="input-group mb-3">'
                +'<input type="text" class="form-control" id="apoderado_apepaterno" onkeypress="return soloLetras(event)" onpaste="return false">'
            +'</div>'
            +'</div>'
        +'</div>'

        +'<div class="col-lg-2 col-md-3 col-sm-4">'
            +'<div id="apoderado" class="form-group">'
            +'<label for="exampleInputFile">Apellido materno: </label>'
            +'<div class="input-group mb-3">'
                +'<input type="text" class="form-control" id="apoderado_apematerno" onkeypress="return soloLetras(event)" onpaste="return false">'
            +'</div>'
            +'</div>'
        +'</div>'
        
        +'<div class="col-lg-2 col-md-3 col-sm-4">'
            +'<div id="apoderado" class="form-group">'
            +'<label for="exampleInputFile">Nombres: </label>'
            +'<div class="input-group mb-3">'
                +'<input type="text" class="form-control" id="apoderado_nombres" onkeypress="return soloLetras(event)" onpaste="return false">'
            +'</div>'
            +'</div>'
        +'</div>'

        +'</div>'
    );
    });
});

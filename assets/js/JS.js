

//CODIGOS GLOBALES


//Inicializando el Menu Principal

$(document).ready(function() {
$('.sidenav').sidenav();
      $(function() {
        var pgurl = window.location.href.substr(window.location.href.lastIndexOf("/")+1);

        $("ul a li").each(function(){
            if($(this).attr("href") == pgurl || $(this).attr("href") == '' || $(this).attr("href")+"#" == pgurl)
            $(this).addClass("urlActual");
         })
    });
      //Tootltip con UI.QUERY
   $( function() {
    $( document ).tooltip();
  } );
  
    $('select').material_select();
    // $('.modal-trigger').leanModal();// INICIAR LOS MODALES
    $('.modal').modal();

    //Inicializando datatables

     $('#tbPersonal,#tbProveedor,#tbProducto,#tbCliente,#tblCLienteMain,#tblFacturas,#tblFactVencida').DataTable({
        "processing": true,
        "serverSide": false,
        "responsive": true,
        "scrollX": true,
        "autoWidth":true,
        "destroy": true,
        "info": false,
        "sort":true,
        "bPaginate": true,
        "lengthMenu": "MOSTRAR _MENU_ REGISTROS",
        "emptyTable": "No hay datos disponibles en la tabla",
        "search":     "BUSCAR",
        "pagingType": "full_numbers",
        "lengthMenu": [
            [10,25,50,100, -1],
            [10,25,50,100, "Todo"]
        ],
        "order": [
            [1, "des"]
        ],
        "language" : {
            "emptyTable": "No hay información",
            "infoEmpty": "No hay registros",
            "lengthMenu": "",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "info": "Pagina _PAGE_ de _PAGES_",
            "infoFiltered": "(filtered from _MAX_ total records)",
             "decimal": ".",
            "thousands": ",",
             "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        }
        
    });
 });

$('#tblDetFacturas,#tblDetFacturasEdit,#tblDetFacturasxUser,#tblDetAbono,#tblDetCobro,#tblDetFactCompra,#tblDetRecCom,#tblFacturasXUser,#tblReciboXUser').DataTable({
    // "scrollX": true,
    "autoWidth":true,
    "responsive": true,
    "destroy": true,
    "info": false,
    "sort":false,
    "bPaginate": false,
    "lengthMenu": "MOSTRAR _MENU_ REGISTROS",
    "emptyTable": "No hay datos disponibles en la tabla",
    "search":     "BUSCAR",
    "pagingType": "full_numbers",
    "lengthMenu": [
        [10,25,50,100, -1],
        [10,25,50,100, "Todo"]
    ],
    "language" : {
        "emptyTable": "No hay información",
        "infoEmpty": "No hay registros",
        "lengthMenu": "Mostrar _MENU_ registros por pagina",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "info": "Pagina _PAGE_ de _PAGES_",
        "infoFiltered": "(filtered from _MAX_ total records)",
         "decimal": ".",
        "thousands": ",",
         "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
        }
    }
    
});
 
function validarFecha(splitedFecha){

    if (splitedFecha[0] == "" || splitedFecha[1] == "" || splitedFecha[2] == "") {
       Materialize.toast("El campo fecha se encunetra vacio", 4000, 'rounded');
       return 0;

    
    } else if (splitedFecha[0]<=0 || splitedFecha[0]== "00" || splitedFecha[0]>31) {
           Materialize.toast("El numero de días no es valido en el campop fecha, introduca un dato valido", 4000, 'rounded');
           return 0;
        
    }else if (splitedFecha[1]<=0 || splitedFecha[1]=="00" || splitedFecha[1]>12) {
           Materialize.toast("El numero en mes no es valido en el campo fecha, introduca un dato valido", 4000, 'rounded');
           return 0;

        
    }else if (splitedFecha[2]<2000) {
           Materialize.toast("EL año debe ser mayor a 1999, introduca un dato valido", 4000, 'rounded');
           return 0;
    }else{
        return 1;
    }

}

function inicializaControlFecha() {    
    $('input[class="input-fecha"]').daterangepicker({
        "drops": "down",
            "autoApply": false,
            "minYear": 10,
            "maxYear": parseInt(moment().format('YYYY'),10),
            //"showWeekNumbers": true,

     "locale": {
            "format": "DD-MM-YYYY",
            "separator": " - ",
            "applyLabel": "Apply",
            "cancelLabel": "Cancel",
            "fromLabel": "From",
            "toLabel": "To",
            "customRangeLabel": "Custom",
            //"weekLabel": "SEMANA",
            "daysOfWeek": [
                "D",
                "L",
                "M",
                "M",
                "J",
                "V",
                "S"
            ],
            "monthNames": [
                "Enero",
                "Febrero",
                "Marzo",
                "Abril",
                "Mayo",
                "Junio",
                "Julio",
                "Agosto",
                "Septiembre",
                "Octubre",
                "Noviembre",
                "Diciembre"
            ],          
            "firstDay": 0
        },
        "singleDatePicker": true,
        "showDropdowns": false
    });
}


 
function datosUsuarios(){
    $("#nomUsuarioMenu").val();
}





function listandoPais(){
    $.getJSON("listandoPais", function(data) {
        $(".txtPais").append('<option value="PAIS">Pais...</option>');
        $.each(data, function(i, item) {
            $(".txtPais").append('<option value="' + item['idPais'] + '">' + item['nomPais'] + '</option>');
        });
  });
}

function listandoProveedor(){
     $.getJSON("listandoProveedor", function(data) {
        $(".txtCodProve").append('<option value="PROVEEDOR">Proveedor...</option>');
        $.each(data, function(i, item) {
            $(".txtCodProve").append('<option value="' + item['codProv'] + '">' + item['nomProv'] + '</option>');
        });
  });
}

function listandoUmedida(){
     $.getJSON("listandoUmedida", function(data) {
        $(".txtUMedida").append('<option value="UNIDAD">Unidad de Medida...</option>');
        $.each(data, function(i, item) {
            $(".txtUMedida").append('<option value="' + item['abreUm'] + '">' + item['nomUm'] + '</option>');
        });
  });
}

function listandoDepartamento(){
     $.getJSON("listandoDepartamento", function(data) {
        $(".txtDepa").append('<option value="DEPARTAMENTO">Departamento...</option>');
        $.each(data, function(i, item) {
            $(".txtDepa").append('<option value="' + item['idDep'] + '">' + item['nomDep'] + '</option>');
        });
  });
}

function listandoCiudad(){
     $.getJSON("listandoCiudad", function(data) {
        $(".txtCiudad").append('<option value="CIUDAD">Ciudad...</option>');
        $.each(data, function(i, item) {
            $(".txtCiudad").append('<option value="' + item['idCiu'] + '">' + item['nomCiu'] + '</option>');
        });
  });
}

function listandoAreaLAboral(){
     $.getJSON("listandoAreaLAboral", function(data) {
        $(".txtArea").append('<option value="AREA">Area...</option>');
        $.each(data, function(i, item) {
            $(".txtArea").append('<option value="' + item['idArea'] + '">' + item['nomArea'] + '</option>');
        });
  });
}

function listandoCargoLaboral(){
     $.getJSON("listandoCargoLaboral", function(data) {
        $(".txtCargo").append('<option value="CARGO">Cargo...</option>');
        $.each(data, function(i, item) {
            $(".txtCargo").append('<option value="' + item['idCar'] + '">' + item['nomCar'] + '</option>');
        });
  });
}

function listandoZona(){
     $.getJSON("listandoZona", function(data) {
        $(".txtZona").append('<option value="ZONA">Zona...</option>');
        $.each(data, function(i, item) {
            $(".txtZona").append('<option value="' + item['idZon'] + '">' + item['nomZon'] + '</option>');
        });
  });
}

function listandoSubZona(){
     $.getJSON("listandoSubZona", function(data) {
        $(".txtSubZona").append('<option value="SUBZONA">Sub zona...</option>');
        $.each(data, function(i, item) {
            $(".txtSubZona").append('<option value="' + item['idSubZon'] + '">' + item['nomSubZon'] + '</option>');
        });
  });
}


function listandoPersonal(){
     $.getJSON("listandoPersonal", function(data) {
        $(".txtNomPer").append('<option value="PERSONA">Personal...</option>');
        $.each(data, function(i, item) {
            $(".txtNomPer").append('<option value="' + item['idPer'] + '">' + item['nomPer'] + '</option>');
        });
  });
}

function listandoPrivilegios(){
     $.getJSON("listandoPrivilegios", function(data) {
        $(".txtPrivilegios").append('<option value="PRIVILEGIOS">Privilegios...</option>');
        $.each(data, function(i, item) {
            $(".txtPrivilegios").append('<option value="' + item['idPriv'] + '">' + item['nomPriv'] + '</option>');
        });
  });
}

function listandoClientes(){
     $.getJSON("listandoClientes", function(data) {
        $(".txtCliente").append('<option value="CLIENTES">Clientes...</option>');
        $.each(data, function(i, item) {
            $(".txtCliente").append('<option value="' + item['idClte'] + '">' + item['nomClte'] + '</option>');
            
        });
  });
}

function listandoTipoFacturaCompra(){
     $.getJSON("listandoTipoFacturaCompra", function(data) {
        $(".txtipofactCompra").append('<option value="0">Tipo Factura...</option>');
        $.each(data, function(i, item) {
            $(".txtipofactCompra").append('<option value="' + item['idTipo'] + '">' + item['nomTipo'] + '</option>');
            
        });
  });
}

function listandoTipoReciboCompra(){
     $.getJSON("listandoTipoFacturaCompra", function(data) {
        $(".txtipoReciboCompra").append('<option value="0">Tipo Recibo...</option>');
        $.each(data, function(i, item) {
            $(".txtipoReciboCompra").append('<option value="' + item['idTipo'] + '">' + item['nomTipo'] + '</option>');
            
        });
  });
}
function listandoTipoVehiculo(){
     $.getJSON("listandoTipoVehiculo", function(data) {
        $(".tipoVehiclo").append('<option value="0">tipo de Vehiculo...</option>');
        $.each(data, function(i, item) {
            $(".tipoVehiclo").append('<option value="' + item['idTipo'] + '">' + item['nomTipo'] + '</option>');
            
        });
  });
}
function listandoCarroceriaVehiculo(tipoVehiculo){

     $(".carroceriaVehiculo").html("");
     $.getJSON("listandoCarroceriaVehiculo/"+tipoVehiculo, function(data) {
        $(".carroceriaVehiculo").append('<option value="0">Carroceria...</option>');
        $.each(data, function(i, item) {
            $(".carroceriaVehiculo").append('<option value="' + item['idTipo'] + '">' + item['nomTipo'] + '</option>');

            
        });
  });
}


function ListandoFacturasXClte(idClte){
    $(".txtFactXClte").html("");
 $.getJSON("ListandoFacturasXClte/"+idClte, function(data) {
    $(".txtFactXClte").append('<option value="FACTURA">N° Factura...</option>');
        $.each(data, function(i, item) {
        $(".txtFactXClte").append('<option value="' + item['numFact'] + '">' + item['numFact'] + '</option>');
        });
    });
}


//Funcion para sumar dia a fecha

 function sumaFecha(d, fecha)
{
 var Fecha = new Date();
 var sFecha = fecha || (Fecha.getDate() + "/" + (Fecha.getMonth() +1) + "/" + Fecha.getFullYear());
 var sep = sFecha.indexOf('/') != -1 ? '/' : '-';
 var aFecha = sFecha.split(sep);
 var fecha = aFecha[2]+'/'+aFecha[1]+'/'+aFecha[0];
 fecha= new Date(fecha);
 fecha.setDate(fecha.getDate()+parseInt(d));
 var anno=fecha.getFullYear();
 var mes= fecha.getMonth()+1;
 var dia= fecha.getDate();
 mes = (mes < 10) ? ("0" + mes) : mes;
 dia = (dia < 10) ? ("0" + dia) : dia;
 var fechaFinal = dia+"-"+mes+"-"+anno;
 return (fechaFinal);
 }








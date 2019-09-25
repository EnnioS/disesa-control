<script>
$(document).ready(function() {
    $("#searchRegCompra").on('keyup',function(){
    var table = $('#tblFactCompra').DataTable();
    table.search(this.value).draw();
    });
    $( "#frm_lab_row").change(function() {
        var table = $('#tblFactCompra').DataTable();
        table.page.len(this.value).draw();
    });


    $('#txtCantidadDetFactCompra').on('input', function () { 
    this.value = this.value.replace(/[^0-9]/g,'');
    });

    $('#tblFactCompra,#tblRecComp').DataTable({
        "responsive": true,
         //"scrollX": true,
        "autoWidth":true,
        "destroy": true,
        "info": false,
        "sort":true,
        //"dom": 'T<"clear">lfrtip',//agrega boton de vista de impresión
        "pagingType": "full_numbers",
        "lengthMenu": [
            [10,25,50,100, -1],
            [10,25,50,100, "Todo"]
        ],
        "order": [
            [1, "asc"]
        ],
        "language" : {
            "emptyTable": "No hay información",
            "infoEmpty": "No hay registros",
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "zeroRecords": "Nothing found - sorry",
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

    $("#tblFactCompra_length").hide();
    $("#tblRecComp_length").hide();


    inicializaControlFecha();
    listandoPersonal();
    listandoProveedor();
    listandoTipoFacturaCompra();
    listandoTipoReciboCompra();
    llenarDataTabelCompra();
    llenarDataTabelRecCompra();
    $("#tblDetRecCom").DataTable();
    $("#tblDetFactCompra").DataTable();
});





//CODIFICACION PARA FACTURA DE COMPRA
$("#txtProductoDetFactCompra").autocomplete({
    appendTo: "#resultado",
    source : function(request, cb){
        $.ajax({
          url:"listandoProductos/"+request.term,
          method: "GET",
          dataType: "json",
            success: function(res){  
                var result =
                [
                    {
                        nomProd:"",
                        value:"",
                        codProd:"No se encntraron datos para"+request.term,

                    }
                ];
                if(res.length){
                    result = $.map(res, function(obj){
                        return{
                            nomProd: obj.nomProd,
                            value: obj.value,
                            codProd: obj.codProd,
                            data: obj
                        };
                    });
                }
                cb(result);


            }

        });
        
    },
    select: function(event, selectedData){
        if (selectedData && selectedData.item && selectedData.item.data){
            var data = selectedData.item.data;
            //recoge valores de la consulta y los agrega a los campos deseados
            $("#txtCodProdCompra").val(data.codProd);
        }
    }
});


function llenarDataTabelCompra(){
    ObjTable = $("#tblFactCompra").DataTable();
    $.ajax({
        url: "getDatosFacturasCompra",
        async:false,
        success:
         function(json){

            var e = JSON.parse(json);
            var estado;

            for (f=0;f<e.data.length;f++){

                if(e.data[f].estadoFactCompra == 1){
                estado = "Activo";
            }else{
                estado = "Anulado";
            }

                ObjTable.row.add( [
                    e.data[f].NFactComp,
                    e.data[f].fechaFactComp,
                    e.data[f].nomProv,
                    e.data[f].tipoPagoFactComp,
                    e.data[f].diaCreditoFactComp,
                    e.data[f].TotalFactComp,
                    e.data[f].fechaFactCompVence,
                    estado,
                    '<center><a href="#!" id="btnVerRecibos" style="background-color:black" class="btn-floating btn-small waves-effect waves-light noHover modal-trigger"><i class="material-icons">&#xE417;</i></a>'
                ] ).draw( false )
            }
        }
    });
    
}




var contRowDetfactCom = 0;
var totalFacturaCom = 0;


$("#agregarDetfactCompra").on('click', function(){
    Objtable = $("#tblDetFactCompra").DataTable();

    var fecha =  $("#txtFechaFactCompra").val();
    var tipoFactCom = $("#txtipofactCompra").val();
    var idFactCom = $("#textIdfactCompra").val();
    var proveedor = $("#txtProvFactCompra").val();
    var vendedor = $("#txtVendedorFactCompra").val();
    var formaPago = $("#txtFormaPagoFactCompra").val();
    var tiempoCredCom = $("#txtTiempoCreditoFactCompra").val();
    var monedaFactCom =$("#txtMonedaFactCompra").val();
    var nomProvEntrega =$("#txtNomContactProv").val();

    var idProd = $("#txtCodProdCompra").val();
    var producto = $("#txtProductoDetFactCompra").val();
    var cantidad = $("#txtCantidadDetFactCompra").val();
    var precio = $("#txtPUnidadDetFactCompra").val();
    var total = parseInt(cantidad) * parseFloat(precio);

        var longitudtable;

        if(monedaFactCom == "MONEDA"){
            $("#tipoMonedaFactCompra").html("");
        }if(monedaFactCom == "C$"){
            $("#tipoMonedaFactCompra").html("C$");

        }else if(monedaFactCom == "US$"){

            $("#tipoMonedaFactCompra").html("US$");
        }

        
    if (fecha == "") {
           Materialize.toast("Agregue una fecha valida", 4000, 'rounded');

        
    } else if ( tipoFactCom == "0"){
         Materialize.toast("Seleccione el tipo de factura de compra", 4000, 'rounded');

    } else if ( (idFactCom == "" || idFactCom.length <3) && (tipoFactCom == "1")){
         Materialize.toast("Agregue un numero de factura ordinaria mayor a tres caracteres", 4000, 'rounded');

    } else if ( (idFactCom == "" || idFactCom.length <3) && (tipoFactCom != "1")){
         Materialize.toast("Agregue un numero de factura mayor a tres caracteres, de no tener numeración agregue 000", 4000, 'rounded');

    } else if (tipoFactCom == "1" && verifExistidfaturaCompra(idFactCom)) {
           Materialize.toast("El numero de factura ordinaria de compra ya existe!", 4000, 'rounded');

        
    }else if (proveedor=="PROVEEDOR") {
           Materialize.toast("Seleccione el Proveedor", 4000, 'rounded');

        
    }else if (nomProvEntrega=="") {
           Materialize.toast("Ingrese el nombre de la persona que entrego la factura", 4000, 'rounded');

        
    }else if (vendedor=="PERSONA") {
           Materialize.toast("Seleccione el nombre del vendedor", 4000, 'rounded');

        
    }else if (formaPago=="PAGO") {
           Materialize.toast("Seleccione una forma de pago", 4000, 'rounded');

        
    }else if (tiempoCredCom == "") {
           Materialize.toast("ingrese credito en días", 4000, 'rounded');

        
    }else if (monedaFactCom=="MONEDA") {
           Materialize.toast("Seleccione el tipo de moneda", 4000, 'rounded');

        
    }else if(producto=="" || cantidad=="" || precio==""){
            Materialize.toast("existen campos vacios en detalles de factura, favor llene todos los campos", 4000, 'rounded');

        }else{


    
            Objtable.row.add
            ( [
                idProd,
                producto,
                cantidad,
                precio,
                total,
                '<a href="#!" id="RowDeleteDetFactComp" class="BtnClose"><i class="material-icons">highlight_off</i></a>'
            ] ).draw( false );

            var data = Objtable.rows().data();

            longitudTabla=data.length;

            var datas = Objtable.row(longitudTabla).column(4).data();
           

            totalFacturaCom += total;
            $("#totalfactCompra").html(totalFacturaCom);
            $("#txtProductoDetFactCompra").val("");
    		$("#txtCantidadDetFactCompra").val("");
    		$("#txtPUnidadDetFactCompra").val("");
            contRowDetfactCom++;
        }

});




//REMUEVE UNA FILA DE UNA TABLA
$('#tblDetFactCompra').on('click', '#RowDeleteDetFactComp', function(){
    var table = $('#tblDetFactCompra').DataTable();
    var tdItems;
    var totalProdDet;
    tdItems= $('#tblDetFactCompra').DataTable().rows($(this).parents("tr")).data();
    totalProdDet =tdItems[0][4]; 
    totalFacturaCom -= totalProdDet;
    $("#totalfactCompra").html(totalFacturaCom);
    table.row( $(this).parents('tr') ).remove().draw();
    contRowDetfactCom--;


   
});


function verifExistidfaturaCompra(NFactComp){

    var respuesta;
    $.ajax({
        url:"verifExistidfaturaCompra",
        type: "post",
        cache: false,
        async:false,
        data:{NFactComp},
        success: function(res){
            respuesta = res;
            
        }

    });
     return respuesta;
}



$("#agregarfactCompra").on('click', function(){
     Objtable = $("#tblDetFactCompra").DataTable();

    var fecha =  $("#txtFechaFactCompra").val();
    var tipoFactCom = $("#txtipofactCompra").val();
    var idFactCom = $("#textIdfactCompra").val();
    var proveedor = $("#txtProvFactCompra").val();
    var vendedor = $("#txtVendedorFactCompra").val();
    var formaPago = $("#txtFormaPagoFactCompra").val();
    var tiempoCredCom = $("#txtTiempoCreditoFactCompra").val();
    var monedaFactCom =$("#txtMonedaFactCompra").val();
    var nomProvEntrega =$("#txtNomContactProv").val();

    var idProd = $("#txtCodProdCompra").val();
    var producto = $("#txtProductoDetFactCompra").val();
    var cantidad = $("#txtCantidadDetFactCompra").val();
    var precio = $("#txtPUnidadDetFactCompra").val();

     var estadoFactComp;

    var fechafactCompSplit = fecha.split('-');
    var fechafactComp = fechafactCompSplit[2]+"-"+fechafactCompSplit[1]+"-"+fechafactCompSplit[0];

    venceFact = sumaFecha(tiempoCredCom, fecha).split("-");
  
    var fechaSumada = venceFact[2]+"-"+venceFact[1]+"-"+venceFact[0];


    if($("#txtRbActivoFactCompra").is(':checked'))
    {
            estadoFactComp = 1;
        }else{
            estadoFactComp = 0;
        
    }
    

    var data_form = {
        NFactComp : idFactCom,
        tipoFactCompra : tipoFactCom,
        idPer : vendedor,
        idProv : proveedor,
        fechaFactComp : fechafactComp,
        nomEntregaFactComp : nomProvEntrega,
        tipoPagoFactComp : formaPago,
        diaCreditoFactComp : tiempoCredCom,
        monedaFactComp : monedaFactCom,
        TotalFactComp : totalFacturaCom,
        estadoFactCompra : estadoFactComp,
        fechaFactCompVence : fechaSumada
    };


    if ( ! Objtable.data().any() ){
         Materialize.toast("Aun no ha ingresado productos", 4000, 'rounded');
    }else{


        $.ajax({
            url : "agregarNuevaFacturaCompra",
            type: "post",
            dataType: "json",
            cache: false,
            async:false,
            data:data_form,
            success: function(res){
                if(res!=false){
                	console.log(res);
                    AgregarDetalleFactCompra(res);
                }
            }
        });
    }
    

});






function AgregarDetalleFactCompra(IdFactComp){
    var NFactComp = $("#textIdfactCompra").val();
    Objtable = $("#tblDetFactCompra").DataTable();

    var regDetfactCompra ={};
    var i = 0;     
    Objtable.rows().data().each( function (index) {
       regDetfactCompra[i]={};
       
       
       regDetfactCompra[i]['IdFactComp'] = IdFactComp;
        regDetfactCompra[i]['NFactComp'] = NFactComp;
        regDetfactCompra[i]['idProd'] = index[0];
        regDetfactCompra[i]['cantDetFComp'] = index[2];
        regDetfactCompra[i]['pUnitDetFComp'] = index[3];
        regDetfactCompra[i]['totalDetFComp'] = index[4];
        i++;
    });
    console.log(regDetfactCompra);

    $.ajax({
      url: "AgregarDetalleFactCompra",
      type: "post",
      dataType: "json",
      cache: false,
      async:false,
      data:{data:regDetfactCompra},
      success:function(res){
       

        if(res==true){

           swal({
                "text":"Factura de compra Agregada",
                "type":"success",
                "confirmButtonText":"ACEPTAR",
                allowOutsideClick:false
            }).then(function(){

                  location.reload();
                    
              });

        }else{
            swal({
                "text":"Ocurrio un error al agregar detalles de factura de compra",
                "type":"error",
                "confirmButtonText":"ACEPTAR",
                allowOutsideClick:false
            });
        }

      }

    })


}






















//CODIFICACION PARA RECIBO DE COMPRA

function llenarDataTabelRecCompra(){
    ObjTable = $("#tblRecComp").DataTable();
    $.ajax({
        url: "getDatosRecCompra",
        async:false,
        success:
         function(json){

            var e = JSON.parse(json);
            var estado;

            for (f=0;f<e.data.length;f++){

                if(e.data[f].estadoRecCom == 1){
                estado = "Activo";
            }else{
                estado = "Anulado";
            }


                ObjTable.row.add( [
                    e.data[f].nRecCom,
                    e.data[f].fechaRecCom,
                    e.data[f].nomProv,
                    e.data[f].formPagoRecCom,
                    e.data[f].conceptRecCom,
                    e.data[f].totalRecCom,
                    estado,
                    '<center><a href="#!" id="btnVerReciboCompra" style="background-color:black" class="btn-floating btn-small waves-effect waves-light noHover modal-trigger"><i class="material-icons">&#xE417;</i></a>'
                ] ).draw( false )
            }
        }
    });
}





var contRowDetRecComp = 0;
var totalReciboComp = 0;

$("#agregarDetRecCom").on('click', function(){

    Objtable = $("#tblDetRecCom").DataTable();
    var fechaRecCom = $("#txtFechaRecCom").val();
    var tipoRecCom = $("#txtipoReciboCompra").val();
    var nReciboCom = $("#textIdCobroRecCom").val();
    var idProv = $("#txtProvRecCom").val();
    var idPer = $("#txtVendedorRecCom").val();
    var formPagoRecCom = $("#txtFormaPagoRecCom").val();
    var monedaRecCom = $("#txtMonedaRecCom").val();
    var TasaCambioRecCom = $("#txtTasaCambioRecCom").val();
    var bancoNomRecCom = $("#txtNomBancoRecCom").val();
    var NumCKRecCom = $("#txtNumChequeRecCom").val();
    var conceptReciboCom = $("#txtConcepRecCom").val();
    var nFact = $("#txtNumFactRecCom").val();
    var montoRecCom = $("#txtMontoRecibidoRec").val();
    var nomEntrego = $("#txtNomContaProvRecCom").val();

    var estadoReciboCom;
    var total = parseFloat(montoRecCom);

        var longitudtable;

        if(monedaRecCom == "MONEDA"){
            $("#txtMonedaRecComTotal").html("");
        }if(monedaRecCom == "C$"){
            $("#txtMonedaRecComTotal").html("C$");

        }else if(monedaRecCom == "US$"){

            $("#txtMonedaRecComTotal").html("US$");
        }

        


        if(fechaRecCom==""){
            Materialize.toast("El campo fecha se encuentra vacio", 4000, 'rounded');

        }else if ( tipoRecCom == "0"){
         Materialize.toast("Seleccione el tipo de recibo de compra de compra", 4000, 'rounded');

	    } else if ( (nReciboCom == "" || nReciboCom.length <3) && (tipoRecCom == "1")){
	         Materialize.toast("Agregue un numero de recibo ordinaria mayor a tres caracteres", 4000, 'rounded');

	    } else if ( (nReciboCom == "" || nReciboCom.length <3) && (tipoRecCom != "1")){
	         Materialize.toast("Agregue un numero de recibo mayor a tres caracteres, de no tener numeración agregue 000", 4000, 'rounded');

	    }else if (tipoRecCom == "1" && verifExistidReciboCompra(nReciboCom)) {
	           Materialize.toast("El numero de recibo ordinaria de compra ya existe!", 4000, 'rounded');

	    }else if (nomEntrego == "") {
	           Materialize.toast("Ingrese el nombre de la persona que entrego el recibo", 4000, 'rounded');

	    }else if(idProv == "PROVEEDOR"){
            Materialize.toast("Seleccione el nombre del proveedor", 4000, 'rounded');

        }else if(idPer == "PERSONA"){
            Materialize.toast("Seleccione el nombre del vendedor", 4000, 'rounded');

        }else if(formPagoRecCom == "PAGO"){
            Materialize.toast("Seleccione la forma de pago", 4000, 'rounded');

        }else if(monedaRecCom == "MONEDA"){
            Materialize.toast("Seleccione el tipo de moneda", 4000, 'rounded');

        }else if(monedaRecCom == "C$" && (TasaCambioRecCom == "" || TasaCambioRecCom == "0.00") ){
            Materialize.toast("Ingrese tasade cambio del día", 4000, 'rounded');

        }else if( (bancoNomRecCom == "" || bancoNomRecCom == "BANCOS") && (formPagoRecCom=="CHEQUE" || formPagoRecCom=="DEPOSITO") ){
            Materialize.toast("Ingrese el nombre del banco del cheque o deposito", 4000, 'rounded');

        }else if(NumCKRecCom == "" && (formPagoRecCom == "CHEQUE" || formPagoRecCom=="DEPOSITO") ){
            Materialize.toast("Ingrese el numero del cheque o numero de transferencia", 4000, 'rounded');

        }else if(conceptReciboCom == ""){
            Materialize.toast("El campo concepto se encuentra vacio", 4000, 'rounded');

        }else if(nFact.length < 3){
            Materialize.toast("El campo N° factura se encuentra vacio ó es menor o mayor a 3 caracteres!", 4000, 'rounded');

        }else if(!verifExistidfaturaCompra(nFact)){
            Materialize.toast("El numero de factura de compra no existe!", 4000, 'rounded');

        }else if(montoRecCom == ""){
            Materialize.toast("El campo monto de recibo se encuentra vacio!", 4000, 'rounded');

        }else{


    
            Objtable.row.add
            ( [
                nFact,
                montoRecCom,
                '<a href="#!" id="RowDeleteDetRecCom" class="BtnClose"><i class="material-icons">highlight_off</i></a>'
            ] ).draw( false );

            var data = Objtable.rows().data();

            longitudTabla=data.length;

            var datas = Objtable.row(longitudTabla).column(1).data();
           
            totalReciboComp += total;
            $("#totalReciCom").html(totalReciboComp);
            $("#txtNumFactRecCom").val("");
            $("#txtMontoRecibidoRec").val("");
            contRowDetRecComp++;
        }

});

//Validar numero  de factura, si existe se agrega a detalles de factura

function verifExistidReciboCompra(nRecCom){

    var respuesta;
    $.ajax({
        url:"verifExistidReciboComp",
        type: "post",
        cache: false,
        async:false,
        data:{nRecCom},
        success: function(res){
            respuesta = res;
            
        }

    });
     return respuesta;
}




//REMUEVE UNA FILA DE UNA TABLA
$('#tblDetRecCom').on('click', '#RowDeleteDetRecCom', function(){
    var table = $('#tblDetRecCom').DataTable();
    var tdItems;
    var totalRecDet;
    tdItems= $('#tblDetRecCom').DataTable().rows($(this).parents("tr")).data();
    totalRecDet =tdItems[0][1]; 
    totalReciboComp -= totalRecDet;
    $("#totalReciCom").html(totalReciboComp);
    table.row( $(this).parents('tr') ).remove().draw();
    contRowDetRecComp--;


   
});




$("#btnAgregarRecCom").on('click', function(){
	Objtable = $("#tblDetRecCom").DataTable();
    var fechaRecCom = $("#txtFechaRecCom").val();
    var tipoRecCom = $("#txtipoReciboCompra").val();
    var nReciboCom = $("#textIdCobroRecCom").val();
    var idProv = $("#txtProvRecCom").val();
    var idPer = $("#txtVendedorRecCom").val();
    var formPagoRecCom = $("#txtFormaPagoRecCom").val();
    var monedaRecCom = $("#txtMonedaRecCom").val();
    var TasaCambioRecCom = $("#txtTasaCambioRecCom").val();
    var bancoNomRecCom = $("#txtNomBancoRecCom").val();
    var NumCKRecCom = $("#txtNumChequeRecCom").val();
    var conceptReciboCom = $("#txtConcepRecCom").val();
    var nFact = $("#txtNumFactRecCom").val();
    var montoRecCom = $("#txtMontoRecibidoRec").val();
    var observReciCom = $("#txtObservRecCom").val();
     var nomEntrego = $("#txtNomContaProvRecCom").val();
    var estadoReciCom;

    var fechaRecSplit = fechaRecCom.split('-');
    var fechaRecData = fechaRecSplit[2]+"-"+fechaRecSplit[1]+"-"+fechaRecSplit[0];

    
    if($("#txtRbActivoRecCom").is(':checked'))
    {
        estadoRecibo = 1;
    }else{
        estadoRecibo = 0;
        
    }
    

    var data_form = {
        fechaRecCom : fechaRecData,
        nRecCom : nReciboCom,
        idPer : idPer,
        idProv : idProv,
        tipoRecComp : tipoRecCom,
        nomEntregaRecComp : nomEntrego,
        formPagoRecCom : formPagoRecCom,
        monedaRecCom : monedaRecCom,
        tasaCambio : TasaCambioRecCom,
        nomBancoRecCom : bancoNomRecCom,
        nCkBancoRecCom : NumCKRecCom,
        conceptRecCom : conceptReciboCom,
        ObsevRecCom : observReciCom,
        estadoRecCom : estadoRecibo,
        totalRecCom : totalReciboComp
    };
    

  	if ( ! Objtable.data().any() ){
         Materialize.toast("Aun no ha ingresado detalles al recibo de compra", 4000, 'rounded');
    }else{


        $.ajax({
            url : "agregarNuevoRecComp",
            type: "post",
            dataType: "json",
            cache: false,
            async:true,
            data:data_form,
            success: function(res){
                if(res!=false){
                    AgregarDetalleRecComp(res);
                }
            }
        });
    }
    

});





function AgregarDetalleRecComp(idfact){
	Objtable = $("#tblDetRecCom").DataTable();
    var nRecom = $("#textIdCobroRecCom").val();
    var regDetRecCom ={};
    var i = 0;     
    Objtable.rows().data().each( function (index) {
        regDetRecCom[i]={};

        regDetRecCom[i]['NRecComp'] = nRecom;
        regDetRecCom[i]['idRecComp'] = idfact;
        regDetRecCom[i]['NumFactComp'] = index[0];
        regDetRecCom[i]['recibidoDetComp'] = index[1];
        i++;
    });
    ColectarTotalFactComp(idfact);
    $.ajax({
      url: "AgregarDetalleRecComp",
      type: "post",
      dataType: "json",
      cache: false,
      async:false,
      data:{data:regDetRecCom},
      success:function(res){
       

        if(res==true){

           swal({
                "text":"Recibo Agregado",
                "type":"success",
                "confirmButtonText":"ACEPTAR",
                allowOutsideClick:false
            }).then(function(){
            		totalReciboComp=0;
                  location.reload();
                    
              });

        }else{
            swal({
                "text":"Ocurrio un error al agregar detalles de Recibo",
                "type":"error",
                "confirmButtonText":"ACEPTAR",
                allowOutsideClick:false
            });
        }

      }

    })


}

//recibe los datos de factura de compra y recibos de compra para comprar el total de la factura de compra con el total de todos los pagos realizados en los recibos de compra y verificar si existe remanente
function ColectarTotalFactComp(idfactComp){
	var datos;
	 $.ajax({
      url: "ColectarTotalFactComp",
      type: "post",
      dataType: "json",
      cache: false,
      async:false,
      data:idfactComp,
       success:function(json){

       		var e = JSON.parse(json);
            var estado;

            for (f=0;f<e.length;f++){
            	datos[f]["IdFactComp"] = e[f].IdFactComp;
            	datos[f]["NFactComp"] = e[f].NFactComp;
            	datos[f]["TotalFactComp"] = e[f].TotalFactComp;
            	datos[f]["idDetRecCom"] = e[f].idDetRecCom;
            	datos[f]["NRecComp"] = e[f].NRecComp;
            	datos[f]["recibidoDetComp"] = e[f].recibidoDetComp;
            	
            }

       }
  });
	 console.log(datos);

}




</script>
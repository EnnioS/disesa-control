<script>
$(document).ready(function() {

    var fechaRec = $("#txtFechaCobro").mask("00-00-0000", {placeholder: "__-__-____"});
    $("#txtNumFactRecibo").append('<option value="FACTURA">N° Factura...</option>');
    $("#txtFormBancoRec").css("display","none");
    $("#txtFormCkRec").css("display","none");
    $("#txtFormTasaCambRec").css("display","none");
    $("#searchRegCobro").on('keyup',function(){
        var table = $('#tblCobro').DataTable();
        table.search(this.value).draw();
    });
    $( "#frm_lab_row").change(function() {
        var table = $('#tblCobro').DataTable();
        table.page.len(this.value).draw();
    });

	inicializaControlFecha();
    

    $('#tblCobro').DataTable({
        "responsive": true,
         "scrollX": true,
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
    $("#tblCobro_length").hide();

    llenarDataTabelCObro();


});

var contRowDetRec = 0;
var totalRecibo = 0;


$("#txtProductoDetRec").autocomplete({
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
            $("#txtCodProdRecibos").val(data.codProd);
        }
    }
});



function llenarDataTabelCObro(){
    ObjTable = $("#tblCobro").DataTable();
    $.ajax({
        url: "getDatosRecibo",
        async:false,
        success:
         function(json){

            var e = JSON.parse(json);
            var estado;
            if(e.data== null){

            }else{

            

                for (f=0;f<e.data.length;f++){

                    if(e.data[f].estadoRecibo == 1){
                    estado = "Activo";
                }else{
                    estado = "Anulado";
                }

                    ObjTable.row.add( [
                        e.data[f].idRecibo,
                        e.data[f].fechaRecibo,
                        e.data[f].nomPer + " "+e.data[f].apePer,                      
                        e.data[f].nomClte,
                        e.data[f].nomLocalClte,    
                        e.data[f].concepRecibo,
                        e.data[f].totalRecibidoRecibo,
                        estado,                 
                        '<center><a href="#!" id="btnVerRecibos" style="background-color:black" class="btn-floating btn-small waves-effect waves-light noHover modal-trigger"><i class="material-icons">&#xE417;</i></a>'
                    ] ).draw( false )
                }
            }
        }
    });
    
}



    $("#btnAddCobro").on('click', function(){
        listandoPersonal();
        listandoClientes();
    });


$("#agregarDetRec").on('click', function(){

    Objtable = $("#tblDetCobro").DataTable();
    var fechaRec = $("#txtFechaCobro").val();
    var nRecibo = $("#textIdCobro").val();
    var idClte = $("#txtClienteCobro").val();
    var idPer = $("#txtVendedorCobro").val();
    var formPagoRec = $("#txtFormaPagoRec").val();
    var monedaRec = $("#txtMonedaCobro").val();
    var TasaCambioRec = $("#txtTasaCambio").val();
    var bancoNomRec = $("#txtNomBanco").val();
    var NumCKRec = $("#txtNumCheque").val();
    var conceptRecibo = $("#txtConcepCobro").val();
    var nFact = $("#txtNumFactRecibo").val();
    var nfactHtml = $("#txtNumFactRecibo").html();
    var montoRec = $("#txtMontoRecibidoRec").val();

    var estadoRecibo;
    var totalFactura;
    var total = parseFloat(montoRec);
    var infoRecibosYFact ={};
    var infoRecibosYFact = saldoFactura(nFact);
    var remanenteRecibo=0.00;
    var splitedFecha = fechaRec.split("-");

    //CODIGOS PARA VERIFICAR SI SE INGRESA MAS DIRNERO DE LO QUE DICE LA FACTURA
    var TotalAbonosRecibos = 0.00;

    if(infoRecibosYFact[0]["totalFact"] == null){

    totalFactura = 0;
    }else{
    totalFactura = parseFloat(infoRecibosYFact[0]["totalFact"]);
    }

    
        for (var i = 0; i < Object.keys(infoRecibosYFact).length; i++) {
            if(infoRecibosYFact[i]["recibidoDetRecibo"]== null){
                 TotalAbonosRecibos += 0;
            }else{
                TotalAbonosRecibos += parseFloat(infoRecibosYFact[i]["recibidoDetRecibo"]);
            }

        }

    TotalAbonosRecibos +=parseFloat(montoRec);


    //CODIGOS PARA NO INGRESAR FACTURAS DOBLEMENTE
     var facturaRepetida = false;

    var numFactEnTabla;

    if(Objtable.data().any()){
             

        for (var i = 0; i <  Objtable.data().length; i++) {
            numFactEnTabla = Objtable.row(i).column(0).data();


            if(nFact == numFactEnTabla[i]){

                facturaRepetida = true;
            }
        }
    }

    //NO MOSTRAR 3 ULTIMAS COLUMNAS
    Objtable.column(3).visible(false); 
    Objtable.column(4).visible(false); 
    Objtable.column(5).visible(false); 





        var longitudtable;

        if(monedaRec == "MONEDA"){
            $("#txtMonedaRecTotal").html("");
        }if(monedaRec == "C$"){
            $("#txtMonedaRecTotal").html("C$");

        }else if(monedaRec == "US$"){

            $("#txtMonedaRecTotal").html("US$");
        }

        


       if(validarFecha(splitedFecha)==0){
        //fecha es incorrecta; el mensaje se encuentra en el archivo global JS.js 
    
        }else if(nRecibo.length < 4 || nRecibo.length > 4){
            Materialize.toast("El campo Numero de Recibo se encuentra vacio ó es menor o mayor a 4 caracteres", 4000, 'rounded');

        }else if(idClte == "CLIENTES"){
            Materialize.toast("Seleccione el nombre del cliente", 4000, 'rounded');

        }else if(idPer == "PERSONA"){
            Materialize.toast("Seleccione el nombre del vendedor", 4000, 'rounded');

        }else if(formPagoRec == "PAGO"){
            Materialize.toast("Seleccione la forma de pago", 4000, 'rounded');

        }else if(monedaRec == "MONEDA"){
            Materialize.toast("Seleccione el tipo de moneda", 4000, 'rounded');

        }else if(monedaRec == "C$" && (TasaCambioRec == "" || TasaCambioRec == "0.00") ){
            Materialize.toast("Ingrese tasade cambio del día", 4000, 'rounded');

        }else if( (bancoNomRec == "" || bancoNomRec == "BANCOS") && (formPagoRec=="CHEQUE" || formPagoRec=="DEPOSITO") ){
            Materialize.toast("Ingrese el nombre del banco del cheque o deposito", 4000, 'rounded');

        }else if(NumCKRec == "" && (formPagoRec == "CHEQUE" || formPagoRec=="DEPOSITO") ){
            Materialize.toast("Ingrese el numero del cheque o numero de transferencia", 4000, 'rounded');

        }else if(conceptRecibo == ""){
            Materialize.toast("El campo concepto se encuentra vacio", 4000, 'rounded');

        }else if($("#txtNumFactRecibo").val() === "FACTURA"){
            Materialize.toast("El campo N° factura se encuentra vacio", 4000, 'rounded');

        }else if(montoRec == ""){
            Materialize.toast("El campo monto de recibo se encuentra vacio", 4000, 'rounded');

        }else if(!verifExistidfatura(nFact)){
            Materialize.toast("El numero de factura no existe", 4000, 'rounded');

        }else if(facturaRepetida== true){
            Materialize.toast("el numero de factura ya se encuentra agregada en este recibo", 4000, 'rounded');

        }else {
            if(TotalAbonosRecibos > totalFactura){

                remanenteRecibo = TotalAbonosRecibos - totalFactura;
                swal({
                    "title": "Con el monto recibido se supera el total de la factura",
                    "text":"El excedente se registrara en  REMANENTES",
                    "type":"warning",
                    "confirmButtonText":"ACEPTAR",
                    allowOutsideClick:false
                });

            }
        
            

            Objtable.row.add
            ( [
                nFact,
                montoRec,
                '<a href="#!" id="RowDeleteDetRec" class="BtnClose"><i class="material-icons">highlight_off</i></a>',
                totalFactura,
                TotalAbonosRecibos,
                remanenteRecibo
            ] ).draw( false );

            if (Objtable.data().any() ){
              
                $("#txtFechaCobro").attr("disabled","disabled");
                $("#textIdCobro").attr("disabled","disabled");
                $("#txtClienteCobro").attr("disabled","disabled");
                $("#txtVendedorCobro").attr("disabled","disabled");
                $("#txtFormaPagoRec").attr("disabled","disabled");
                $("#txtMonedaCobro").attr("disabled","disabled");
                $("#txtTasaCambio").attr("disabled","disabled");
                $("#txtNomBanco").attr("disabled","disabled");
                $("#txtNumCheque").attr("disabled","disabled");
                $("#txtRbActivoRec").attr("disabled","disabled");
                $("#txtRbAnuladoRec").attr("disabled","disabled");
                $("#txtConcepCobro").attr("disabled","disabled");
                $("#txtObservCobro").attr("disabled","disabled");
                 
            }

            var data = Objtable.rows().data();

            longitudTabla=data.length;

            var datas = Objtable.row(longitudTabla).column(1).data();
           
            totalRecibo += total;
            $("#totalReciv").html(totalRecibo);
            $("#txtNumFactRecibo").val("FACTURA");
            $("#txtMontoRecibidoRec").val("");
            contRowDetRec++;
        }

});


//Validar numero  de factura, si existe se agrega a detalles de factura

function verifExistidfatura(idFact){

    var respuesta;
    $.ajax({
        url:"verifExistidfatura",
        type: "post",
        cache: false,
        async:false,
        data:{idFact},
        success: function(res){
            respuesta = res;
            
        }

    });
     return respuesta;
}



//REMUEVE UNA FILA DE UNA TABLA
$('#tblDetCobro').on('click', '#RowDeleteDetRec', function(){
    var table = $('#tblDetCobro').DataTable();
    var tdItems;
    var totalRecDet;
    tdItems= $('#tblDetCobro').DataTable().rows($(this).parents("tr")).data();
    totalRecDet =tdItems[0][1]; 
    totalRecibo -= totalRecDet;
    $("#totalReciv").html(totalRecibo);
    table.row( $(this).parents('tr') ).remove().draw();
    
    if (!table.data().any() ){
              
        $("#txtFechaCobro").prop('disabled', false);
        $("#textIdCobro").prop('disabled', false);
        $("#txtClienteCobro").prop('disabled', false);
        $("#txtVendedorCobro").prop('disabled', false);
        $("#txtFormaPagoRec").prop('disabled', false);
        $("#txtMonedaCobro").prop('disabled', false);
        $("#txtTasaCambio").prop('disabled', false);
        $("#txtNomBanco").prop('disabled', false);
        $("#txtNumCheque").prop('disabled', false);
        $("#txtRbActivoRec").prop('disabled', false);
        $("#txtRbAnuladoRec").prop('disabled', false);
        $("#txtConcepCobro").prop('disabled', false);
        $("#txtObservCobro").prop('disabled', false);
         
    }
    contRowDetRec--;


   
});


//LISTAR NUMEROS DE FACTURAS POR CLIENTE EN CAMPO N° FACTURA EN MODAL PARA INGRESOS DE RECIBOS
$('#txtClienteCobro').change(function() {


    var idClte = $("#txtClienteCobro option:selected").val();

    if(idClte !="CLIENTES"){
        ListandoFacturasXClte(idClte);

    }else{
        $("#txtNumFactRecibo").append('<option value="FACTURA">N° Factura...</option>');
    }
 
});


//VERIFICAR SALDO DE FACTURA AL SELECCIONAR NUMERO DE FACTURA
$('#txtNumFactRecibo').change(function() {


    var idFact = $("#txtNumFactRecibo option:selected").val();

    if(idFact !="FACTURA"){
        //saldoFactura(idFact);

    }
 
});


function saldoFactura(idFact){
    var fact={
        idFact : idFact
    };
    var saldoFact = {};

    $.ajax({
        url: "saldoFactura",
        method:"post",
        async:false,
        data: fact,
        success:
         function(json){
            var f=0;
            var e = JSON.parse(json);


             for (f=0;f<e.length;f++){
                saldoFact[f]={};
                saldoFact[f]["idFact"] = e[f]["idFact"];
                saldoFact[f]["idRecibo"] = e[f]["idRecibo"];
                saldoFact[f]["recibidoDetRecibo"] = e[f]["recibidoDetRecibo"];
                saldoFact[f]["totalFact"] = e[f]["totalFact"];
             }
             if(e.length === 0){
                saldoFact[0]={};
                saldoFact[0]["idFact"] =idFact;
                saldoFact[0]["recibidoDetRecibo"] = 0;
                saldoFact[0]["totalFact"] = null;
             }

             
             

           
        }
    });

    return saldoFact;
}

$('#txtFormaPagoRec').change(function() {


    var value = $("#txtFormaPagoRec option:selected").val();

        if(value == "PAGO" || value == "EFECTIVO"){
            $("#txtFormBancoRec").css("display","none");
            $("#txtFormCkRec").css("display","none");
        }else if(value == "CHEQUE" || value == "DEPOSITO"){
            $("#txtFormBancoRec").css("display","block");
            $("#txtFormCkRec").css("display","block");
        }
        
 
});

$('#txtMonedaCobro').change(function() {

    var value = $("#txtMonedaCobro option:selected").val();

    if(value == "MONEDA" || value == "US$"){
            $("#txtFormTasaCambRec").css("display","none");
        }else if(value == "C$"){
            $("#txtFormTasaCambRec").css("display","block");
        }
 
});


    



$("#btnAgregarRecibo").on('click', function(){
    Objtable = $("#tblDetCobro").DataTable();
    var fechaRec = $("#txtFechaCobro").val();
    var nRecibo = $("#textIdCobro").val();
    var idClte = $("#txtClienteCobro").val();
    var idPer = $("#txtVendedorCobro").val();
    var formPagoRec = $("#txtFormaPagoRec").val();
    var monedaRec = $("#txtMonedaCobro").val();
    var TasaCambioRec = $("#txtTasaCambio").val();
    var bancoNomRec = $("#txtNomBanco").val();
    var NumCKRec = $("#txtNumCheque").val();
    var conceptRecibo = $("#txtConcepCobro").val();
    var nFact = $("#txtNumFactRecibo").val();
    var montoRec = $("#txtMontoRecibidoRec").val();
    var TotalRecibo = $("#totalReciv").html();
    var observRecibo = $("#txtObservCobro").val();

    var fechaRecSplit = fechaRec.split('-');
    var fechaRecData = fechaRecSplit[2]+"-"+fechaRecSplit[1]+"-"+fechaRecSplit[0];

    var numFactEnTabla={};
    var datosTablaREcibo={};

    
    if($("#txtRbActivoRec").is(':checked'))
    {
        estadoRecibo = 1;
    }else{
        estadoRecibo = 0;
        
    }
    



    var data_form = {
        fechaRecibo : fechaRecData,
        idRecibo : nRecibo,
        idPer : idPer,
        idCliente : idClte,
        formaPago : formPagoRec,
        monedaRecibo : monedaRec,
        tasaCambioRecibo : TasaCambioRec,
        bancoCkRecibo : bancoNomRec,
        numCkRecibo : NumCKRec,
        concepRecibo : conceptRecibo,
        estadoRecibo : estadoRecibo,
        montoRecibo : TotalRecibo,
        observRecibo : observRecibo
    };

    

    if(fechaRec==""){
        Materialize.toast("El campo fecha se encuentra vacio", 4000, 'rounded');

    }else if(nRecibo.length < 4 || nRecibo.length > 4){
        Materialize.toast("El campo Numero de Recibo se encuentra vacio ó es menor o mayor a 4 caracteres", 4000, 'rounded');

    }else if(idClte == "CLIENTES"){
        Materialize.toast("Seleccione el nombre del cliente", 4000, 'rounded');

    }else if(idPer == "PERSONA"){
        Materialize.toast("Seleccione el nombre del vendedor", 4000, 'rounded');

    }else if(formPagoRec == "PAGO"){
        Materialize.toast("Seleccione la forma de pago", 4000, 'rounded');

    }else if(monedaRec == "MONEDA"){
        Materialize.toast("Seleccione el tipo de moneda", 4000, 'rounded');

    }else if(monedaRec == "C$" && (TasaCambioRec == "" || TasaCambioRec == "0.00") ){
        Materialize.toast("Ingrese tasade cambio del día", 4000, 'rounded');

    }else if( (bancoNomRec == "" || bancoNomRec == "BANCOS") && (formPagoRec=="CHEQUE" || formPagoRec=="DEPOSITO") ){
        Materialize.toast("Ingrese el nombre del banco del cheque o deposito", 4000, 'rounded');

    }else if(NumCKRec == "" && (formPagoRec == "CHEQUE" || formPagoRec=="DEPOSITO") ){
        Materialize.toast("Ingrese el numero del cheque o numero de transferencia", 4000, 'rounded');

    }else if(conceptRecibo == ""){
        Materialize.toast("El campo concepto se encuentra vacio", 4000, 'rounded');

    }else if(verifExistidRecibo(nRecibo)){
        Materialize.toast("El numero de recibo ya existe", 4000, 'rounded');

    }else  if ( ! Objtable.data().any() ){
         Materialize.toast("Aun no ha ingresado detalles de recibo", 4000, 'rounded');
    }else{


    //LLENAR ARREGLO CON DATOS DE TABLA, ARREGLO SE LLENA POR COLUMNA
        
        datosTablaREcibo["numRecibo"] =nRecibo;
        datosTablaREcibo["numFact"] = Objtable.column(0).data();
        datosTablaREcibo["abono"] = Objtable.column(1).data();
        datosTablaREcibo["totalFact"] = Objtable.column(3).data();
        datosTablaREcibo["totalAbono"] = Objtable.column(4).data();
        datosTablaREcibo["remanente"] = Objtable.column(5).data();


        //Indexando arreglo por fila
        for (var i = 0; i <  Objtable.data().length; i++) {
            numFactEnTabla[i]={};
            numFactEnTabla[i]["numRecibo"] =    datosTablaREcibo["numRecibo"];
             numFactEnTabla[i]["numFact"] =     datosTablaREcibo["numFact"][i];
             numFactEnTabla[i]["abono"] =       datosTablaREcibo["abono"][i];
             numFactEnTabla[i]["totalFact"] =   datosTablaREcibo["totalFact"][i];
             numFactEnTabla[i]["totalAbono"] =  datosTablaREcibo["totalAbono"][i];
             numFactEnTabla[i]["remanente"] =   datosTablaREcibo["remanente"][i];
             //SI EL TOTAL DE ABONO DE LOS RECIBOS ES IGUAL O MAYOR AL TOTAL DE LA FACTURA, LA FACTURA SE CANCELA = 2 
             if(numFactEnTabla[i]["totalAbono"]>=numFactEnTabla[i]["totalFact"]){
             numFactEnTabla[i]["estadoFact"] = 2;
            }else{
                numFactEnTabla[i]["estadoFact"] = 1;
            }
            alert("Total abonado: " + numFactEnTabla[i]["totalAbono"] + ", total factura: " + numFactEnTabla[i]["totalFact"] + ", Total Remanente: " + numFactEnTabla[i]["remanente"]+", Estado Factura: "+numFactEnTabla[i]["estadoFact"]);
        }

        

       $.ajax({
            url : "agregarNuevoRecibo",
            type: "post",
            dataType: "json",
            cache: false,
            async:true,
            data:data_form,
            success: function(res){
                if(res==1){
                    AgregarDetalleRecibo();
                    actualizarEstadoFact(numFactEnTabla);
                    guardarRemanente(numFactEnTabla);

                }
            }
        });
    }
    

});

function actualizarEstadoFact(numFactEnTabla){

    $.ajax({
        url:"actualizarEstadoFact",
        type: "POST",
        cache: false,
        data:{data : numFactEnTabla}
        });

}

function guardarRemanente(numFactEnTabla){
    $.ajax({
        url:"guardarRemanente",
        type: "POST",
        cache: false,
        data:{data : numFactEnTabla}
        });
}





function verifExistidRecibo(idRecibo){

    var respuesta;
    $.ajax({
        url:"verifExistidRecibo",
        type: "post",
        cache: false,
        async:false,
        data:{idRecibo},
        success: function(res){
            respuesta = res;
            
        }

    });
     return respuesta;
}



function AgregarDetalleRecibo(){
    Objtable = $("#tblDetCobro").DataTable();
    var nRecibo = $("#textIdCobro").val();
    var regDetReci ={};
    var i = 0;     
    Objtable.rows().data().each( function (index) {
        regDetReci[i]={};

        regDetReci[i]['idRecibo'] = nRecibo;
        regDetReci[i]['idFact'] = index[0];
        regDetReci[i]['recibidoDetRecibo'] = index[1];
        i++;
    });


    $.ajax({
      url: "AgregarDetalleRecibo",
      type: "post",
      dataType: "json",
      cache: false,
      async:false,
      data:{data:regDetReci},
      success:function(res){
       

        if(res==true){

           swal({
                "text":"Recibo Agregado",
                "type":"success",
                "confirmButtonText":"ACEPTAR",
                allowOutsideClick:false
            }).then(function(){

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



</script>
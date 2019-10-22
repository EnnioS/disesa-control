<script>
$(document).ready(function() {

    fechaFact = $("#txtFechaFactura").mask("00-00-0000", {placeholder: "__-__-____"});


   $("#searchRegVentas").on('keyup',function(){
        var table = $('#tblFacturas').DataTable();
        table.search(this.value).draw();
    });

    $( "#frm_lab_row").change(function() {
        var table = $('#tblFacturas').DataTable();
        table.page.len(this.value).draw();
    });


    $('#txtCantidadDetFact').on('input', function () { 
    this.value = this.value.replace(/[^0-9]/g,'');
    });

    inicializaControlFecha();
    listandoPersonal();
    listandoClientes();
    llenarDataTblFact();


});



$("#txtProductoDetFact").autocomplete({
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
            $("#txtCodProdVentas").val(data.codProd);
            $("#txtNomProdVentas").val(data.nomProd);
        }
    }
});


var contRowDetfact = 0;
var totalFactura = 0;


$("#agregarDetfact").on('click', function(){
    Objtable = $("#tblDetFacturas").DataTable();
    var idFact = $("#textIdfact").val();
    var fechaFact =  $("#txtFechaFactura").val();
    var idCliente = $("#txtClienteFact").val();
    var idVendedor = $("#txtVendedorFact").val();
    var formaPago = $("#txtFormaPagoFact").val();
    var tiempoCredito = $("#txtTiempoCreditoFact").val();
    var totalFact = $("#totalfact").html();
    var monedaFact =$("#txtMonedaFact").val();

    var idProd = $("#txtCodProdVentas").val();
    var nomProducto = $("#txtNomProdVentas").val();
    var producto = $("#txtProductoDetFact").val();
    var cantidad = $("#txtCantidadDetFact").val();
    var precio = $("#txtPUnidadDetFact").val();
    var bonificacion = "+"+$("#txtCantBonifDetFact").val();
    var total = parseInt(cantidad) * parseFloat(precio);
    var productoRepetido = false;
    var splitedFecha = fechaFact.split("-");
    console.log($("#idFact").val());

    var idProdEnTabla;

    if(Objtable.data().any()){
             

        for (var i = 0; i <  Objtable.data().length; i++) {
            idProdEnTabla = Objtable.row(i).column(0).data();


            if(idProd == idProdEnTabla[i]){

                productoRepetido = true;
            }
        }
    }


        var longitudtable;

        if(monedaFact == "MONEDA"){
            $("#tipoMonedaFactu").html("");
        }if(monedaFact == "C$"){
            $("#tipoMonedaFactu").html("C$");

        }else if(monedaFact == "US$"){

            $("#tipoMonedaFactu").html("US$");
        }

        
        
    if(validarFecha(splitedFecha)==0){
        //fecha es incorrecta; el mensaje se encuentra en el archivo global JS.js 
    } else if (idFact == "" || idFact.length <4 ){
         Materialize.toast("Agregue un numero de factura mayor a tres caracteres", 4000, 'rounded');

    } else if (verifExistidfatura(idFact)) {
           Materialize.toast("El numero de fatura ya existe", 4000, 'rounded');

        
    }else if (idCliente=="CLIENTES") {
           Materialize.toast("Seleccione un cliente", 4000, 'rounded');

        
    }else if (idVendedor=="PERSONA") {
           Materialize.toast("Seleccione el nombre del vendedor", 4000, 'rounded');

        
    }else if (formaPago=="PAGO") {
           Materialize.toast("Seleccione una forma fe pago", 4000, 'rounded');

        
    }else if (tiempoCredito == "") {
           Materialize.toast("ingrese credito en días", 4000, 'rounded');

        
    }else if (monedaFact=="MONEDA") {
           Materialize.toast("Seleccione el tpo de moneda", 4000, 'rounded');

    }else if (idProd=="") {
           Materialize.toast("Seleccione un producto de la lista de productos", 4000, 'rounded');

    }else if(producto=="" || cantidad=="" || precio==""){
            Materialize.toast("existen campos vacios en detalles de factura, favor llene todos los campos", 4000, 'rounded');

        }else if (producto!=nomProducto) {
           Materialize.toast("el nombre del producto no coinside o se agrego o elimino un caracteer del campo productos", 4000, 'rounded');

    }else if (productoRepetido==true) {
           Materialize.toast("Ha seleccionado un producto el cual ya se encuentra agregado, selecione otro porducto diferente", 4000, 'rounded');

    }else{


        if (parseInt(bonificacion)>0){
            Objtable.row.add
            ( [
                idProd,
                producto,
                cantidad+bonificacion,
                precio,
                total,
                '<a href="#!" id="RowDeleteDetFact" class="BtnClose"><i class="material-icons">highlight_off</i></a>'
            ] ).draw( false );

        }else{

             Objtable.row.add
            ( [
                idProd,
                producto,
                cantidad,
                precio,
                total,
                '<a href="#!" id="RowDeleteDetFact" class="BtnClose"><i class="material-icons">highlight_off</i></a>'
            ] ).draw( false );
        }
           

            var data = Objtable.rows().data();

            longitudTabla=data.length;

            var datas = Objtable.row(longitudTabla).column(4).data();
           

           // totalFactura += datas[contRowDetfact];
            totalFactura += total;
            $("#totalfact").html(totalFactura);
            $("#txtProductoDetFact").val("");
            $("#txtCantidadDetFact").val("");
            $("#txtPUnidadDetFact").val("");
            $("#txtCodProdVentas").val("");
            $("#txtNomProdVentas").val("");
            $("#txtCantBonifDetFact").val("");
            contRowDetfact++;
        }

});



//REMUEVE UNA FILA DE UNA TABLA
$('#tblDetFacturas').on('click', '#RowDeleteDetFact', function(){
    var table = $('#tblDetFacturas').DataTable();
    var tdItems;
    var totalProdDet;
    tdItems= $('#tblDetFacturas').DataTable().rows($(this).parents("tr")).data();
    totalProdDet =tdItems[0][4]; 
    totalFactura -= totalProdDet;
    $("#totalfact").html(totalFactura);
    table.row( $(this).parents('tr') ).remove().draw();
    contRowDetfact--;


   
});






$("#agregarfact").on('click', function(){
    var idFact = $("#textIdfact").val();
    var fecha =  $("#txtFechaFactura").val();
    var idCliente = $("#txtClienteFact").val();
    var idVendedor = $("#txtVendedorFact").val();
    var formaPago = $("#txtFormaPagoFact").val();
    var tiempoCredito = $("#txtTiempoCreditoFact").val();
    var totalFact = $("#totalfact").html();

     var producto = $("#txtProductoDetFact").val();
    var cantidad = $("#txtCantidadDetFact").val();
    var precio = $("#txtPUnidadDetFact").val();

    var estadoFact;
    var monedaFact =$("#txtMonedaFact").val();

    Objtable = $("#tblDetFacturas").DataTable();

    var fechafactSplit = fecha.split('-');
    var fechafact = fechafactSplit[2]+"-"+fechafactSplit[1]+"-"+fechafactSplit[0];

    venceFact = sumaFecha(tiempoCredito, fecha).split("-");
  
    var fechaSumada = venceFact[2]+"-"+venceFact[1]+"-"+venceFact[0];


    if($("#txtRbActivoFact").is(':checked'))
    {
            estadoFact = 1;
        }else{
            estadoFact = 0;
        
    }
    

    var data_form = {
        idFact : idFact,
        idCliente : idCliente,
        idPer : idVendedor,
        fechaFact : fechafact,
        tipoPagoFact : formaPago,
        diaCreditoFact : tiempoCredito,
        fechaVenceFact : fechaSumada,
        totalFact : totalFact,
        estadoFact : estadoFact,
        monedaFact : monedaFact
    };


    if (fecha == "") {
           Materialize.toast("Agregue una fecha valida", 4000, 'rounded');

        
    } else if (idFact == "" || idFact.length <4 ){
         Materialize.toast("Agregue un numero de factura mayor a tres caracteres", 4000, 'rounded');

    } else if (verifExistidfatura(idFact)) {
           Materialize.toast("El numero de fatura ya existe", 4000, 'rounded');

        
    }else if (idCliente=="CLIENTES") {
           Materialize.toast("Seleccione un cliente", 4000, 'rounded');

        
    }else if (idVendedor=="PERSONA") {
           Materialize.toast("Seleccione el nombre del vendedor", 4000, 'rounded');

        
    }else if (formaPago=="PAGO") {
           Materialize.toast("Seleccione una forma fe pago", 4000, 'rounded');

        
    }else if (tiempoCredito == "") {
           Materialize.toast("ingrese credito en días", 4000, 'rounded');

        
    }else if (monedaFact=="MONEDA") {
           Materialize.toast("Seleccione el tpo de moneda", 4000, 'rounded');

        
    } else  if ( ! Objtable.data().any() ){
         Materialize.toast("Aun no ha ingresado productos", 4000, 'rounded');
    }else{
    
        $.ajax({
            url : "agregarNuevaFactura",
            type: "post",
            dataType: "json",
            cache: false,
            async:false,
            data:data_form,
            success: function(res){
                if(res==true){
                    AgregarDetalleFacturas();
                }
            }
        });
    }
    

});

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



function AgregarDetalleFacturas(){
    var idFact = $("#textIdfact").val();
    Objtable = $("#tblDetFacturas").DataTable();

    var regDetfactura ={};
    var i = 0;     
    var bonifSplit;
    Objtable.rows().data().each( function (index) {
       regDetfactura[i]={};
       
        regDetfactura[i]['idFact'] = idFact;
        regDetfactura[i]['idProd'] = index[0];
        regDetfactura[i]['descripDetFact'] = index[1];
        regDetfactura[i]['cantidadDetFact'] = index[2];
        regDetfactura[i]['pUnitarioDetFact'] = index[3];
        regDetfactura[i]['totalDetFact'] = index[4];

        bonifSplit = regDetfactura[i]['cantidadDetFact'].split("+");
        regDetfactura[i]['cantidadDetFact'] =bonifSplit[0];

        if (bonifSplit[1]==null){
         regDetfactura[i]['cantBonifDetFact'] =0;
        }else{

         regDetfactura[i]['cantBonifDetFact'] =bonifSplit[1];
        }


        i++;
    });
    console.log(regDetfactura);

    $.ajax({
      url: "AgregarDetalleFacturas",
      type: "post",
      dataType: "json",
      cache: false,
      async:false,
      data:{data:regDetfactura},
      success:function(res){
       

        if(res==true){

           swal({
                "text":"Factura Agregada",
                "type":"success",
                "confirmButtonText":"ACEPTAR",
                allowOutsideClick:false
            }).then(function(){

                  location.reload();
                    
              });

        }else{
            swal({
                "text":"Ocurrio un error al agregar detalles de factura",
                "type":"error",
                "confirmButtonText":"ACEPTAR",
                allowOutsideClick:false
            });
        }

      }

    })


}



//busqueda de facaturas por fecha





function llenarDataTblFact(){
    var objTable =$("#tblFacturas").DataTable();
     var totalFactPendientes = 0;
               
    
    $.ajax({
    url: "llenarDataTblFact",
    async: true,
    success: function(res){
      
        var e = JSON.parse(res);
        console.log(e);

        if(e.data[0].idFact == null){
        }else{

            var estado;


            for (f=0;f<e.data.length;f++){
                totalFactPendientes += parseFloat(e.data[f].totalFact);
               

                if (e.data[f].estadoFact==1){
                    estado =  "PENDIENTE";
                }else  if (e.data[f].estadoFact==0){
                    estado =  "ANULADA";

                }else{
                    estado =  "CANCELADA";
                }


            
                objTable.row.add
                ( [
                    e.data[f].idFact,
                    e.data[f].fechaFact,
                    e.data[f].idPer,   
                    e.data[f].idCliente,   
                    e.data[f].tipoPagoFact,   
                    e.data[f].diaCreditoFact+" Días",   
                    e.data[f].totalFact, 
                    estado,
                    '<div class="row"><div class="col s4"><div class="tooltip izquierda"><a href="#ModalVerDetFactVenta" id="btnVerFactDetalleVenta" class="noHover modal-trigger" ><i class="material-icons">pageview</i></a><span class="tiptext">Ver detalles</span></div></div><div class="col s4"><div class="tooltip izquierda"><a href="#ModalVerDetFactVenta" id="btnVerFactDetalleVenta" class="noHover modal-trigger" ><i class="material-icons">note</i></a><span class="tiptext">Nota de credito</span></div></div><div class="col s4"><div class="tooltip izquierda"><a  href="#!" id="btnDeleteFactDetalleVenta" class="noHover modal-trigger"><i class="material-icons">delete_forever</i></a><span class="tiptext">Eliminar Factura</span></div></div></div>'
                ] ).draw( false )
            }
          

             $("#blfooterMaster").html("TOTAL: US$"+ numeral(totalFactPendientes).format('0,0.00'));
        }

    }
  });
}



$('#btnfilterFactXdate').click(function () {
    filtrarxfechaFacturas();
  });


function filtrarxfechaFacturas(){

  objTable = $("#tblFacturas").DataTable();
  objTable.rows().remove().draw( false ); 
  totalFactPendientes=0.00;
   
  var desde = $("#txtDesdeFact").val();
  var hasta = $("#txtHastaFact").val();

  var form_data = {
      desde : desde,
      hasta: hasta
  }; 

  $.ajax({
    url: "filtrarxfechaFacturas",
    type: "POST",
    data: form_data,

    success: function(res){
      
        var e = JSON.parse(res);

        if(e.results[0].idFact == null){
        }else{

            var estado;


            for (f=0;f<e.results.length;f++){
                 totalFactPendientes += parseFloat(e.results[f].totalFact);

                if (e.results[f].estadoFact==1){
                    estado =  "PENDIENTE";
                }else  if (e.results[f].estadoFact==0){
                    estado =  "ANULADA";

                }else{
                    estado =  "CANCELADA";
                }


            
                objTable.row.add
                ( [
                    e.results[f].idFact,
                    e.results[f].fechaFact,
                    e.results[f].idPer,   
                    e.results[f].idCliente,   
                    e.results[f].tipoPagoFact,   
                    e.results[f].diaCreditoFact+" Días",   
                    e.results[f].totalFact,      
                    estado,
                    '<center><a href="#ModalVerDetFactVenta" id="btnVerFactDetalleVenta" class="noHover modal-trigger tooltipped" data-position="bottom" data-tooltip="Ver"><i class="material-icons">pageview</i></a>&nbsp&nbsp<a href="#ModalVerDetFactVenta" id="btnCrearNotaCredDetalleFactVenta" class="noHover  modal-trigger tooltipped" data-position="bottom" data-tooltip="Crear nota de credito"><i class="material-icons">note</i></a>&nbsp&nbsp<a  href="#!" id="btnDeleteFactDetalleVenta" class="noHover"><i class="material-icons">delete_forever</i></a></center>'
                ] ).draw( false )
            }
             $("#blfooterMaster").html("TOTAL: US$"+ numeral(totalFactPendientes).format('0,0.00'));

        }

    }
  });

}





//abrir modal y llenar tabla con detalle de factura seleccionada en ventana home y ventas



$('#tblFacturas').on('click', '#btnCrearNotaCredDetalleFactVenta', function(){
    var table = $('#tblFacturas').DataTable();
    var tdItems;
    var totalProdDet;
    var idFact;
    $("#NFactCBNC").css("display","block");
    $("#camposNotaCreditoVentaFact").css("display","block");

    tdItems= table.rows($(this).parents("tr")).data();
    idFact =tdItems[0][0]; 
    totalProdDet =tdItems[0][6]; 

    $("#numFactVent").html("CREAR NOTA DE CREDITO<br>FACTURA N° "+idFact +"<br>"+ tdItems[0][3]);
    llenartblDetalleFact(idFact,totalProdDet);
    $("#tblDetFacturasEdit").DataTable().clear();

});




$('#tblFacturas').on('click', '#btnVerFactDetalleVenta', function(){
    var table = $('#tblFacturas').DataTable();
    var tdItems;
    var totalProdDet;
    var idFact;
    

    tdItems= table.rows($(this).parents("tr")).data();
    idFact =tdItems[0][0]; 
    totalProdDet =tdItems[0][6]; 

    $("#numFactVent").html("DETALLE DE FACTURA N° "+idFact +"<br>"+ tdItems[0][3]);
    llenartblDetalleFact(idFact,totalProdDet);
    $("#NFactCBNC").css("display","none");
    $("#camposNotaCreditoVentaFact").css("display","none");
    $("#tblDetFacturasEdit").DataTable().clear();

});

function llenartblDetalleFact(idFact,totalProdDet){
    Objtable = $("#tblDetFacturasEdit").DataTable();
    console.log("N° Fact: "+idFact);
    console.log("Total Fact:"+totalProdDet);
   
    $.ajax({
        url: "LlenarDtDetFacturaxNumfact/"+idFact,
        method: "GET",
        success: function(res){

    $("#totalFactVentas").html(totalProdDet);

             var e = JSON.parse(res);

            if(e.results[0].idProd == null){
            }else{

                var estado;


                for (f=0;f<e.results.length;f++){

                   
                
                    Objtable.row.add
                    ( [
                        '<label id="NFactCBNC"><input type="checkbox" class="filled-in"/><span></span></label> '+e.results[f].idProd,
                        e.results[f].descProd,
                        e.results[f].cantidadDetFact,
                        e.results[f].pUnitarioDetFact,
                        e.results[f].totalDetFact
                    ] ).draw( false )
                }


            }

        }
    });
}


    
  
   
   
    
    
  



</script>
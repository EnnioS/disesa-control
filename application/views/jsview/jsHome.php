<script>
$(document).ready(function() {

    inicializaControlFecha();
   $("#searchRegVentas").on('keyup',function(){
        var table = $('#tblFactVencida').DataTable();
        table.search(this.value).draw();
    });
    $( "#frm_lab_row").change(function() {
        var table = $('#tblFactVencida').DataTable();
        table.page.len(this.value).draw();
    });

    //infVtsRecuperado();
    //infoVntsMeta();

    
    llenarDataTblFactxUser();
   //inicializando la tabla Informe de 
    get_clientes();
    /*$('#tblFactVencida').DataTable({
       "ajax":"llenarDTIV",
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

        },
         "columns": [
                { "data": "idFact" },
                { "data": "fechaFact" },
                { "data": "idPer" },
                { "data": "idCliente" },
                { "data": "tipoPagoFact" },
                { "data": "diaCreditoFact" },
                { "data": "totalFact" },
                { "data": "formaContadoFact" }
            ],
            initComplete: function () {
            this.api().columns([4]).every( function () {
               
                 $("#searchCatalogo").attr("placeholder", "Buscar entre "+this.data().count()+" articulos");
            } );
            $("#tblInfoVentas_length").hide();
        }

        /*"language": {
          "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        }*/
   /* });*/
    //chartPie();
} );


    

 var charPieInfVntsVal1=0;
 var charPieInfVntsVal2=0;
 var charPieInfVntsVal3=0;


function llenarDataTblFactxUser(){
    var objTable = $('#tblFactVencida').DataTable();
    var totalFactPendientes=0;
  
    
    $.ajax({
    url: "llenarDataTblFactxUser",
    type:"post",
    async: true,
    success: function(res){
      
        var e = JSON.parse(res);

        if(e.data[0].idFact == null){
        }else{

            var estado;


            for (f=0;f<e.data.length;f++){
                if (e.data[f].estadoFact==1){
                    estado =  "PENDIENTE";
                }else  if (e.data[f].estadoFact==0){
                    estado =  "ANULADA";

                }else{
                    estado =  "CANCELADA";
                }

                $saldoFactura = e.data[f].monedaFact+(parseFloat(e.data[f].totalFact)-parseFloat(e.data[f].totalAbonos));
                totalFactPendientes +=parseFloat(e.data[f].totalFact)-parseFloat(e.data[f].totalAbonos);
            
                objTable.row.add
                ( [
                    e.data[f].idFact,
                    e.data[f].fechaFact,
                    e.data[f].fechaVenceFact,  
                    e.data[f].diffEntreFechas,  
                    e.data[f].idCliente,   
                    e.data[f].idZona, 
                    e.data[f].diaCreditoFact+" Días",   
                    e.data[f].monedaFact+e.data[f].totalFact,    
                    e.data[f].monedaFact+e.data[f].totalAbonos,  
                    $saldoFactura,
                    '<center><a href="#ModalVerDetFact" id="btnVerFactDetalle" class="noHover modal-trigger"><i class="material-icons">&#xE417;</i></a>&nbsp<a href="#ModalVerDetAbonos" id="btnVerAbonoDetalle" class="noHover modal-trigger"><i class="material-icons">monetization_on</i></a></center>'
                ] ).draw( false )
            }
            $("#blfooterMaster").html("TOTAL: US$"+ numeral(totalFactPendientes).format('0,0.00'));

        }

    }
  });
}



$('#btnfiltFactXdateXRuta').click(function () {
    filtrarxfechaFacturasxUser();
  });



function filtrarxfechaFacturasxUser(){

  objTable = $("#tblFactVencida").DataTable();
  objTable.rows().remove().draw( false ); 
   
  var desde = $("#txtDesdVenFact").val();
  var hasta = $("#txtHastVenFact").val();
  var totalFactPendientes = 0;

  var form_data = {
      desde : desde,
      hasta: hasta
  }; 

  $.ajax({
    url: "filtrarxfechaFacturasxUser",
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

                 $saldoFactura = e.results[f].monedaFact+(parseFloat(e.results[f].totalFact)-parseFloat(e.results[f].totalAbonos));

                objTable.row.add
                ( [
                    e.results[f].idFact,
                    e.results[f].fechaFact,
                    e.results[f].fechaVenceFact,  
                    e.results[f].diffEntreFechas,  
                    e.results[f].idCliente,   
                    e.results[f].idZona,   
                    e.results[f].diaCreditoFact+" Días",   
                    e.results[f].monedaFact+e.results[f].totalFact,    
                    e.results[f].monedaFact+e.results[f].totalAbonos,  
                    $saldoFactura,
                    '<center><a href="#ModalVerDetFact" id="btnVerFactDetalle" class="noHover modal-trigger"><i class="material-icons">&#xE417;</i></a>&nbsp<a href="#ModalVerDetAbonos" id="btnVerAbonoDetalle" class="noHover modal-trigger"><i class="material-icons">monetization_on</i></a></center>'
                ] ).draw( false )
            }
            $("#blfooterMaster").html("TOTAL: US$"+ numeral(totalFactPendientes).format('0,0.00'));

        }

    }
  });

}

$('#tblFactVencida').on('click', '#btnVerFactDetalle', function(){
    var table = $('#tblFactVencida').DataTable();
    var tdItems;
    var totalProdDet;
    var idFact;
    tdItems= table.rows($(this).parents("tr")).data();
    idFact =tdItems[0][0]; 
    totalProdDet =tdItems[0][7]; 
    $("#numFactHome").html(" N° "+idFact);
    llenartblDetalleFact(idFact,totalProdDet);
    $("#tblDetFacturasxUser").DataTable().clear();

});
$('#tblFactVencida').on('click', '#btnVerAbonoDetalle', function(){
    var table = $('#tblFactVencida').DataTable();
    var tdItems;
    var totalProdDet;
    var idFact;
    tdItems= table.rows($(this).parents("tr")).data();
    idFact =tdItems[0][0]; 
    totalFactu =tdItems[0][7]; 
    totalSaldo =tdItems[0][9]; 
    $("#numFactClte").html("FACTURA N° "+idFact);
    llenartblAbonoDetalle(idFact,totalFactu,totalSaldo);


});

function llenartblAbonoDetalle(idFact,totalFactu,totalSaldo){
    Objtable = $("#tblDetAbono").DataTable();
    var moneda ="";
    var sumaTotRecips=0.00;

    Objtable.clear().draw();
    $("#totalAbonado").html("0.00");
    $("#totFactura").html(totalFactu);
    $("#totDebe").html(totalSaldo);

    var factSplit = totalFactu.split("$");
    console.log(factSplit[1]);
   
    $.ajax({
        url: "LlenarDtDetAbonoXNumfact/"+idFact,
        method: "GET",
        success: function(res){

             var e = JSON.parse(res);
            

            if(e.results[0].idRecibo == null){
            }else{

                var estado;

                moneda = e.results[0].monedaRecibo;

                for (f=0;f<e.results.length;f++){

                   
                
                    Objtable.row.add
                    ( [
                        e.results[f].idRecibo,
                        e.results[f].recibidoDetRecibo
                    ] ).draw( false )
                   sumaTotRecips+=parseFloat(e.results[f].recibidoDetRecibo);
                }
                 $("#totalAbonado").html(moneda+sumaTotRecips);
                 $("#totFactura").html(totalFactu);
                 $("#totDebe").html(moneda+(parseFloat(varfactSplit[1])-parseFloat(sumaTotRecips)));

            }

        }
    });
}

function llenartblDetalleFact(idFact,totalProdDet){
    Objtable = $("#tblDetFacturasxUser").DataTable();
   
    $.ajax({
        url: "LlenarDtDetFacturaxNumfact/"+idFact,
        method: "GET",
        success: function(res){

    $("#totalFactHome").html(totalProdDet);

             var e = JSON.parse(res);

            if(e.results[0].idProd == null){
            }else{

                var estado;


                for (f=0;f<e.results.length;f++){

                   
                
                    Objtable.row.add
                    ( [
                        e.results[f].idProd,
                        e.results[f].descProd,
                        e.results[f].cantidadDetFact,
                        e.results[f].pUnitarioDetFact,
                        e.results[f].totalDetFact,
                       
                    ] ).draw( false )
                }


            }

        }
    });
}

function get_clientes(){

    

    Objtable = $("#tblCLienteMain").DataTable();
    var celCliente; 
    var teleLocal;

    $.ajax({
        url:"Main_controller/get_clientes",
        type:"post",
        async: true,
         success:
         function(json){

            var e = JSON.parse(json);
            console.log();
            
            
            for (f=0;f<Object.keys(e).length;f++){
                if(e[f].celClte == null){
                celCliente="";
                }else if(e[f].telLocalClte == null || e[f].telLocalClte == "") {
                    celCliente ="cel.: "+e[f].celClte;
                }else {
                    celCliente =" / cel.: "+e[f].celClte;
                }

                 if(e[f].telLocalClte == null || e[f].telLocalClte == "" ){
                teleLocal="";
                }else{
                    teleLocal = "local: "+e[f].telLocalClte;
                }

                Objtable.row.add( [
                   e[f].idClte,
                    e[f].nomClte+" "+e[f].apeClte,
                    e[f].nomLocalClte,
                    e[f].depaLocalClte+" / "+e[f].ciudadLocalClte,
                    teleLocal+celCliente,
                    '<center><a href="#ModalVerFactXClte" id="btnVerFactXClte" class="noHover modal-trigger"><i class="material-icons">receipt</i></a>&nbsp' + '&nbsp&nbsp<a href="#ModalVerRecipXClte" id="btnVerRecipXClte" class="noHover modal-trigger"><i class="material-icons">monetization_on</i></a>&nbsp </center>'
                ] ).draw( false )
            }
        }
    })

}


$('#tblCLienteMain').on('click', '#btnVerFactXClte', function(){
    var table = $('#tblCLienteMain').DataTable();
    var tdItems;
    var NombreSalon;
    var idFact;
    tdItems= table.rows($(this).parents("tr")).data();
    idClte =tdItems[0][0]; 
    NombreSalon = tdItems[0][1]+"<br>"+tdItems[0][2]+"<br>"+tdItems[0][3];
    $("#nomClteLocalFact").html(NombreSalon);
    llenartblFacturasXUser(idClte);
});


$('#tblCLienteMain').on('click', '#btnVerRecipXClte', function(){
    var table = $('#tblCLienteMain').DataTable();
    var tdItems;
    var NombreSalon;
    var idFact;
    tdItems= table.rows($(this).parents("tr")).data();
    idClte =tdItems[0][0];  
    NombreSalon = tdItems[0][1]+"<br>"+tdItems[0][2]+"<br>"+tdItems[0][3];
    $("#nomClteLocalRecip").html(NombreSalon);
    llenartblReciboXUser(idClte);
});


function llenartblFacturasXUser(idClte){
    $("#totalFacturado").html("0.00");
    var sumaTotFact =0;
    var moneda="";
     Objtable = $("#tblFacturasXUser").DataTable();
     Objtable.clear().draw();
   
    $.ajax({
        url: "llenartblFacturasXUser/"+idClte,
        method: "GET",
        success: function(res){


             var e = JSON.parse(res);

            if(e.results[0].idFact == null){
            }else{

                var estado;

                moneda = e.results[0].monedaFact;

                for (f=0;f<e.results.length;f++){

                   
                
                    Objtable.row.add
                    ( [
                        e.results[f].idFact,
                        e.results[f].fechaFact,
                        e.results[f].tipoPagoFact,
                        e.results[f].diaCreditoFact+" Días",
                        moneda+e.results[f].totalFact,
                       
                    ] ).draw( false );

                    sumaTotFact+=parseFloat(e.results[f].totalFact);
                 
                }
                $("#totalFacturado").html(moneda+sumaTotFact);

            }

        }
    });
}

function llenartblReciboXUser(idClte){
    $("#totalPagado").html("0.00");
        var sumaRecips =0;
    var moneda="";
     Objtable = $("#tblReciboXUser").DataTable();
     Objtable.clear().draw();
   
    $.ajax({
        url: "llenartblReciboXUser/"+idClte,
        method: "GET",
        success: function(res){


             var e = JSON.parse(res);

            if(e.results[0].idRecibo == null){
            }else{

                var estado;

                moneda = e.results[0].monedaRecibo;

                for (f=0;f<e.results.length;f++){

                   
                
                    Objtable.row.add
                    ( [
                        e.results[f].idRecibo,
                        e.results[f].fechaRecibo,
                        e.results[f].idFact,
                        e.results[f].formaPago,
                        e.results[f].concepRecibo,
                        moneda+e.results[f].recibidoDetRecibo,
                       
                    ] ).draw( false );

                    sumaRecips+=parseFloat(e.results[f].recibidoDetRecibo);
                 
                }
                $("#totalPagado").html(moneda+sumaRecips);

            }

        }
    });
}










function infVtsRecuperado(){

    $.ajax({
        url: 'infoVntsRecuperado',
        type: "post",
        async: false,
        success: function (data) {
            $("#infVtsRecuperado").text("C$"+data);
            charPieInfVntsVal1= data;
            
        }
    })
}
function infoVntsMeta(){
    

    $.ajax({
        url: 'infoVntsMeta',
        type: "post",
        async: false,
        success: function(data) {
            $("#infoVntsMeta").text("C$"+data);
            charPieInfVntsVal2= data;
        }
    })
}

function calcRecuperado(){

    var calc= Number(this.charPieInfVntsVal1.replace(/[^0-9.-]+/g,""));
     console.log("recuperado "+calc);
    return calc;

}

function calcFaltaxRecuperar(){

    var calc= (Number(this.charPieInfVntsVal2.replace(/[^0-9.-]+/g,""))-Number(this.charPieInfVntsVal1.replace(/[^0-9.-]+/g,"")));
    console.log("falta x recuperar "+calc);
    return calc;

}



//color para la grafica de pie
var pieColors = (function () {
    var colors = [],
        base = Highcharts.getOptions().colors[0],
        i;

    for (i = 0; i < 10; i += 1) {
        // Start out with a darkened base color (negative brighten), and end
        // up with a much brighter color
        colors.push(Highcharts.Color(base).brighten((i - 3) / 7).get());
    }
    return colors;
}());

// INICIALIZANDO EL PIE CHART
function chartPie(){Highcharts.chart('container', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie',
            /*options3d: {
                enabled: true,
                alpha: 45
            }*/
    
        },
        legend: {
                    align: 'right',
                    layout: 'vertical',
                    verticalAlign: 'middle',
                    x: 20,
                    y: 0
                },
        
        title: {
            text:null
        },
       /* subtitle: {
        text: 'Subtitulo'
    },*/
    credits: {
        enabled: false
    },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                colors: pieColors,
               // depth: 45,
                dataLabels: {
                    enabled: true,
                    //format: '<b>{point.name}</b><br>{point.percentage:.1f} %',
                    format: '<br>{point.percentage:.1f} %',
                    distance: -30,
                    filter: {
                        property: 'percentage',
                        operator: '>',
                        value: 4
                    },
                    
                },
                showInLegend: true,

            }
        },
        series: [{
            name: 'Porcentaje',
            colorByPoint: true,
            data: [["Recuperado",calcRecuperado()],["Falta x Recuperar",calcFaltaxRecuperar()]
                           /* { name: 'Recuperado',
                            y: 12,
                            sliced: true,
                            selected: true 
                        },
                            { name: 'Falta x recuperar', y: 12 }*/
                        ]
        }]
    });
}

function generarExcelFactPendientes(){
    var f1 = $("#txtDesdVenFact").val();
    var f2 = $("#txtHastVenFact").val();;

    if(f1 == "" || f2 == ""){
        Materialize.toast("Ups...No hay nada que descargar!", 4000, 'rounded');
    }else{
    window.location.href ="generarExcelFactPendientes/"+f1+"/"+f2;
    }
}


</script>
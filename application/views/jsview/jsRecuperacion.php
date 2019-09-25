<script>
$(document).ready(function() {

   $("#searchCatalogo").on('keyup',function(){
        var table = $('#tblReportes').DataTable();
        table.search(this.value).draw();
    });
    $( "#frm_lab_row").change(function() {
        var table = $('#tblReportes').DataTable();
        table.page.len(this.value).draw();
    });
    tablaReportes();
    chartPie();
   
} );

//Cuando el DOM esta listo se ejecuta la funcion init() para desencadenar otras funciones para llenar el highchart
function init() {
  const table2 = $("#tblReportes").DataTable();
  const tableData = getTableData(table2);
  createHighcharts(tableData);
  setTableEvents(table2);
}

//Extrayendo datos del data table de cada columnba requerida a un arrego para despues agregarlo a un arrglo maestro
function getTableData(table) {
  const dataArray = [],
    countryArray = [],
    populationArray = [],
    densityArray = [];
 
  // loop table rows
  table.rows({ search: "applied" }).every(function() {
    const data = this.data();
    countryArray.push(data[0]);
    populationArray.push(parseInt(data[1].replace(/\,/g, "")));
    densityArray.push(parseInt(data[2].replace(/\,/g, "")));
  });
 
  // store all data in dataArray
  dataArray.push(countryArray, populationArray, densityArray);
 
  return dataArray;
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

// Construyendo el pieChart
function chartPie(){Highcharts.chart('container', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        
        title: {
            text: 'Meta de venta'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                colors: pieColors,
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b><br>{point.percentage:.1f} %',
                    distance: -50,
                    filter: {
                        property: 'percentage',
                        operator: '>',
                        value: 4
                    },
                    
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'Share',
            colorByPoint: true,
            data: [
                            { name: 'Real',
                            y: 45,
                            sliced: true,
                            selected: true 
                        },
                            { name: 'Faltante', y: 55 }
                        ]
        }]
    });
}



//inicializando la tabla Informe de ventas
function tablaReportes(){
    $('#tblReportes').DataTable({
        responsive:true,
        "autoWidth":false,
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
                { "data": "RUTA" },
                { "data": "META" },
                { "data": "REAL" },
                { "data": "%" }
            ],
            initComplete: function () {
            this.api().columns([0]).every( function () {
               
                 $("#searchCatalogo").attr("placeholder", "Buscar entre "+this.data().count()+" articulos");
            } );
            $("#tblReportes_length").hide();
        }

        /*"language": {
          "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        }*/
    });
}
</script>

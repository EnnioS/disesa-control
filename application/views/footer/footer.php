
</div>
<!-- Modal Structure -->
<div id="modalAbout" class="modal" style="margin-top:100px;">
    <div class="modal-content">
        <a href="#!" class="right modal-action modal-close"><img src="<?php echo base_url("assets/img/cerrar.png") ?>" width="20px" alt="Cerrar"></a>
        <div class="row">
            <div class="col s12 m12 s12">
                <h5 class="center negra indigo-text darken-4">ACERCA DE</h5>
            </div>
        </div>
        <h5 class="center negra indigo-text darken-4">DISESA</h5>
    </div>
    <div class="modal-footer">
        <p class="center negra indigo-text darken-4">COPYRIGHT &copy; TODOS LOS DERECHOS RESERVADOS.</p>
    </div>
</div>

<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="<?PHP echo base_url();?>assets/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="<?PHP echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
<!--<script type="text/javascript" src="<?PHP echo base_url();?>assets/js/dataTables.buttons.min.js"></script>-->
<!--<script type="text/javascript" src="<?PHP echo base_url();?>assets/js/extensions/dataTables.colVis.min.js"></script>-->
<!--<script type="text/javascript" src="<?PHP echo base_url();?>assets/js/extensions/dataTables.tableTools.min.js"></script>-->

<script src="<?PHP echo base_url();?>assets/js/material.min.js"></script>
<script src="<?PHP echo base_url();?>assets/js/materialize.js"></script>
<script src="<?PHP echo base_url();?>assets/js/materialize-v1-0-0.min.js"></script>
<script  src="<?PHP echo base_url();?>assets/js/jquery-ui.min.js"></script>
<!--<script src="<?PHP echo base_url();?>assets/js/jquery-ui.js"></script>-->

<script src="<?PHP echo base_url(); ?>assets/js/sweetalert2.min.js"></script><!--Alertas con botones -->

<!--<script src="<?PHP echo base_url();?>assets/js/bootstrap.js"></script>-->
<!--<script src="<?PHP echo base_url();?>assets/js/select2.min.js"></script>-->
<script src="<?PHP echo base_url();?>assets/js/highcharts.js"></script><!--graficas--> 
<!--<script src="<?PHP echo base_url();?>assets/js/exporting.js"></script>-->
<!--<script src="<?PHP echo base_url();?>assets/js/export-data.js"></script>-->
<script src="<?PHP echo base_url();?>assets/js/moment.min.js"></script>
<script src="<?PHP echo base_url();?>assets/js/moment.js"></script>
<script src="<?PHP echo base_url();?>assets/js/Numeral.js"></script><!--Se usa en los totales para dar formato-->
<script src="<?PHP echo base_url();?>assets/js/daterangepicker.js"></script>
<!--<script src="<?PHP echo base_url();?>assets/js/jquery.mask.js"></script>-->
<script src="<?PHP echo base_url();?>assets/js/jquery.mask.min.js"></script>
<!--AUTOCOMPLETE LIBRARY txtFechaFactura-->
<!--<script src="<?PHP echo base_url();?>assets/js/chosen.jquery.min.js"></script>
<script src="<?PHP echo base_url();?>assets/js/chosen.proto.min.js"></script>-->
<script src="<?PHP echo base_url();?>assets/js/JS.js"></script>



<script>

   

    function ModalInfo()
    {
        $("#modalAbout").openModal();
    }

    function modalPass()
{
    $("#modalPassword").openModal();
}

$("#showPass").on("change",function(){
    if($(this).is(":checked"))
    {
        $("#newPass").attr("type","text");
        $("#lblshowPass").html("Ocultar Contraseña");
    }
    else{
        $("#newPass").attr("type","password");
        $("#lblshowPass").html("Mostrar Contraseña");
    }
});

function actualizaPass()
{
    var form_data={
        idUser: $("#idUser").val(),
        newPass: $("#newPass").val()
    };
    $.ajax({
        url:"ActualizaUsuarios",
        type:"POST",
        data:form_data,
        beforeSend:function(){
            if($("#newPass").val() == ""){
                 swal({
                    "text":"Ooops! No puedes dejar este campo vacío",
                    "type":"warning",
                    "confirmButtonText":"CERRAR",
                    allowOutsideClick:false
                });
                $.ajax.abort();
            }
        },
        success:function(data){
            if("true"){
                swal({
                    "text":"Contraseña modificada",
                    "type":"success",
                    "confirmButtonText":"ACEPTAR"
                }).then(function(){
                    location.reload();
                });
            }else{
                 swal({
                    "text":"No se pudo cambiar tu contraseña",
                    "type":"error",
                    "confirmButtonText":"CERRAR"
                });
            }
        }
    });
}


$("#Salir").on("click",function(){
    var base_url = window.location.origin + '/' + window.location.pathname.split ('/') [1] + '/';
    window.location.href = base_url+"index.php/salir";
});
</script>
</body>
</html>
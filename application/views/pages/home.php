<header class="demo-header mdl-layout__header">
    <div class="centrado  ColorHeader">
    	<span class="title">DISESA - CONTROL</span>
        <a href="#!" style="float: left; margin-left: 1rem; color: white" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
</header>

<br>
<div class="container" style="width: 90%!important;">
	<div class="row right" >
        <div id="clockdiv">
            
        </div>
    </div>



    <!--<div class="card">
        <div class="card-content" style="padding: 0px; padding-bottom: 25px;">
            <div class="row center" style="margin: 0px;">
                 <div class="col s12 m12" id="textInfoVenta">
                    <span>INFORME DE VENTAS</span>
                 </div>
                
            </div>
            <div class="row center" style="margin: 0px; padding: 0px;">
                <div class="col s12 m6" style="margin: 0px; padding: 0px; padding-right: 40px;">
                    <div class="row" style="margin: 0px; padding: 0px;">
                        <div  class="col s12 m12" style="margin: 0px; padding: 0px;">
                            <span style="font-size: 1.3em; font-weight: bold;">Meta de Venta Mensual
                            </span>

                            <div id="container" div class="col s12 m12" style="height: 230px; font-weight: bolder; padding: 0px">
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="row center" style="margin: 0px;">
                    <div class="col s12 m6"  >
                        
                        
                         <div  class="col s12 m12">
                            <div class="card" style="margin: 0px; margin-top: 20px;  background-color:#f0f0f0">
                                <div class="card-content" style="height: 80px; padding: 8px;">
                                    <div>
                                        <span id="infVtsRecuperado" style="font-size: 1.5em">
                                            
                                        </span>
                                        
                                    </div>
                                     <div>
                                         <span>
                                            RECUPERADO...
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div div class="col s12 m12">
                            <div class="card" style="margin: 0px;  margin-top: 15px; background-color:#f0f0f0">
                                <div class="card-content" style="height: 80px; padding: 8px;">
                                    <div>
                                        <span id="infoVntsMeta" style="font-size: 1.5em">
                                        
                                        </span>
                                        
                                    </div>
                                     <div>
                                         <span>
                                            TOTAL VENDIDO...
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
-->



    <div class="card">
        <div class="card-content">
            <div class="row" >
                    <div class="row" >
                        <div class="col s11 m12">
                            <span style="font-size: 1.5em; text-align: left; font-weight: bold">FACTURAS PENDIENTES DE
                            
                            
                            <?php
                              if ($user!=0){
                                  foreach ($user as $Keys){
                                          echo '"'.mb_strtoupper($Keys['nomPer'],'utf-8').' '.mb_strtoupper($Keys['apePer'],'utf-8').'"';
                                  }
                              }else{
                                  echo 'error al cargar nombre';
                              }?>
                              </span>

                        </div>
                        <div class="col s12 m12 separador" style="margin-bottom: 25px"></div>
                        <div class="col s12 m12" style="margin: 0; padding: 0; margin-bottom: 15px">
                            <div class="card" style="margin: 0; padding: 0">
                                <div class="card-content" style="margin: 10px; padding: 0">
                                    <div class="row" style="margin: 0; padding: 0">
                                        <div class="col s12 m4 input-field inline" style="margin-top: 15px">
                                            <input type="text" class="input-fecha" id="txtDesdVenFact" placeholder="Fecha" value="">
                                            <label for="txtDesdVenFact" >DESDE</label>
                                        </div>
                                        <div class="col s12 m4 input-field inline" style="margin-top: 15px">
                                            <input type="text" class="input-fecha" id="txtHastVenFact" placeholder="Fecha" value="">
                                            <label for="txtHastVenFact">HASTA</label>
                                        </div>
                                         <div class="col s12 m4 right" style=" padding: 0px; margin-top: 10px">
                                            <a id="btnfiltFactXdateXRuta" style="width: 100%" class="waves-effect black btn"><i class="material-icons" style="padding: 0px;">search</i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m9">
                            <div class="input-group">
                                <span  style="background: black"><i class="material-icons" style="background: black">search</i></span>
                                <input type="text" id="searchRegVentas">
                            </div>                    
                        </div>
                        <div class="col s10 m2" style="margin: 0; padding: 0;">
                            <select class="browser-default" id="frm_lab_row" style="margin-top: 7px;">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                                <option value="-1">Todo...</option>
                            </select>
                        </div>
                        <div class="col s2 m1 right">
                            <input type="image" onclick="generarExcelFactPendientes()" id="btnImportExcelFactPendientes" style="
                            border-radius: 0px; width: 40px;height: 40px;background-color: transparent" class="Btnadd" src="<?PHP echo base_url();?>assets/img/Excel_2013_23480.png" >
                        </div>
                    </div>

                    <table class="table striped RobotoR" id="tblFactVencida" style="width:100%">
                        <thead>
                            <tr>
                                <th>FACTURA</th>
                                <th>REALIZADA</th>
                                <th>VENCE</th>
                                <th>DESFACE</th>
                                <th>CLIENTE</th>
                                <th>ZONA</th>
                                <th>CREDITO</th>
                                <th>TOTAL</th>
                                <th>ABONADO</th>
                                <th>SALDO</th>
                                <th>DETALLES</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot class="right" id="blfooterMaster" style="font-size: 1.5em; text-align: left; font-weight: bold">
                        </tfoot>
                    </table> 

                    <div class="col s12 m12 separador" style="margin-top: 25px"></div>

                    <div class="col s11 m12">
                        <span style="font-size: 1.5em; text-align: left; font-weight: bold">CLIENTES
                        </span>
                    </div>
                    <div class="col s12 m12 separador" style="margin-bottom: 25px"></div>
                    <table class="table striped RobotoR" id="tblCLienteMain" style="width:100%">
                        <thead>
                            <tr>
                                <th>CODIGO</th>
                                <th>NOMBRE</th>
                                <th>LOCAL</th>
                                <th>ZONA</th>
                                <th>TELEFONOS</th>
                                <th>VER</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot id="blfooterMaster">
                            
                        </tfoot>
                    </table>         
            </div>
        </div>            
    </div>
</div>
<!--//////////////////////////////////////////////////////////////////////////////////////////////
                                      MODAL VER DETALLE DE FACTURA
///////////////////////////////////////////////////////////////////////////////////////////////-->
<!-- Modal #1 Modal Structure -->
<div id="ModalVerDetFact" class="modal">
    <div class="modal-content">
        <div class="row">
            <div class="col s1 m1 l1 right">
                <a href="#!" class=" BtnClose modal-action modal-close noHover">
                    <i class="material-icons">highlight_off</i>
                </a>
            </div>
            <div class="col s11 m11">
                <span style="font-size: 1.5em; text-align: left; font-weight: bold">DETALLE DE FACTURA 
                </span>
                <span id="numFactHome" style="font-size: 1.5em; text-align: left; font-weight: bold"></span>
            </div>
        </div>

        
            
        <div class="card">
            <div class="card-content" >
                <div class="row">
                    <div class="right col s12 m12">
                        <table class="table striped RobotoR" id="tblDetFacturasxUser" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>COD/PROD</th>
                                    <th>DESCRIPCION</th>
                                    <th>CANTIDAD</th>
                                    <th>P. UNITARIO</th>
                                    <th>TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot id="blfooterMaster">
                            </tfoot>
                        </table> 
                                <span id="totalFactHome" style="font-size: 1.5em; text-align: left; font-weight: bold"></span>
                                 
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!--//////////////////////////////////////////////////////////////////////////////////////////////
                                      MODAL VER DETALLE DE ABONOS DE FACTURA
///////////////////////////////////////////////////////////////////////////////////////////////-->
<!-- Modal #1 Modal Structure -->
<div id="ModalVerDetAbonos" class="modal">
    <div class="modal-content">
        <div class="row">
            <div class="col s1 m1 l1 right">
                <a href="#!" class=" BtnClose modal-action modal-close noHover">
                    <i class="material-icons">highlight_off</i>
                </a>
            </div>
            <div class="col s11 m11">
                <span style="font-size: 1.5em; text-align: left; font-weight: bold"><center><h4>DETALLE DE ABONO</h4></center></p> 
                </span>
                <span id="numFactClte" style="font-size: 1.5em; text-align: left; font-weight: bold"></span>
            </div>
        </div>

        
            
        <div class="card">
            <div class="card-content" >
                <div class="row">
                    <div class="right col s12 m12">
                        <table class="table striped RobotoR" id="tblDetAbono" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>RECIBO</th>
                                    <th>VALOR</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot id="blfooterMaster">
                            </tfoot>
                        </table> 
                            <div class="row" style="font-size: 1.5em;  font-weight: bold">
                                <div class="col col s12 m10">
                                    <span class="right-align" >TOTAL FACTURA: &nbsp </span>
                                </div>
                                <div class="col col s12 m2">
                                    <span class="right-align" id="totFactura" ></span>
                                </div>
                                <div class="col col s12 m10">
                                    <span >TOTAL ABONOS: &nbsp</span>
                                </div>
                                <div class="col col s12 m2">
                                     <span id="totalAbonado"></span>
                                 </div>
                                <div class="col col s12 m10">
                                    <span >SALDO: &nbsp </span>
                                </div>
                                 <div class="col col s12 m2">
                                    <span id="totDebe"></span>
                                 </div>
                            </div>
                                 
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!--//////////////////////////////////////////////////////////////////////////////////////////////
                                    MODAL VER FACTURAS POR CLIERNTES
///////////////////////////////////////////////////////////////////////////////////////////////-->
<!-- Modal #1 Modal Structure -->
<div id="ModalVerFactXClte" class="modal">
    <div class="modal-content">
        <div class="row">
            <div class="col s1 m1 l1 right">
                <a href="#!" class=" BtnClose modal-action modal-close noHover">
                    <i class="material-icons">highlight_off</i>
                </a>
            </div>
           <div class="col s11 m11">
                <span style="font-size: 1.5em; text-align: left; font-weight: bold"><center><h4>FACTURAS</h4></center></p> 
                </span>
                <span id="nomClteLocalFact" style="font-size: 1.5em; text-align: left; font-weight: bold"></span>
            </div>
        </div>

        
            
        <div class="card">
            <div class="card-content" >
                <div class="row">
                    <div class="right col s12 m12">
                        <table class="table striped RobotoR" id="tblFacturasXUser" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>NUMERO</th>
                                    <th>FECHA</th>
                                    <th>TIPO/PAGO</th>
                                    <th>CREDITO</th>
                                    <th>TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot id="blfooterMaster">
                            </tfoot>
                        </table> 
                                <span id="totalFacturado" style="font-size: 1.5em; text-align: left; font-weight: bold"></span>
                                 
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!--//////////////////////////////////////////////////////////////////////////////////////////////
                                    MODAL VER RECIBOS POR CLIERNTES
///////////////////////////////////////////////////////////////////////////////////////////////-->
<!-- Modal #1 Modal Structure -->
<div id="ModalVerRecipXClte" class="modal">
    <div class="modal-content">
        <div class="row">
            <div class="col s1 m1 l1 right">
                <a href="#!" class=" BtnClose modal-action modal-close noHover">
                    <i class="material-icons">highlight_off</i>
                </a>
            </div>
           <div class="col s11 m11">
                <span style="font-size: 1.5em; text-align: left; font-weight: bold"><center><h4>RECIBOS</h4></center></p> 
                </span>
                <span id="nomClteLocalRecip" style="font-size: 1.5em; text-align: left; font-weight: bold"></span>
            </div>
        </div>

        
            
        <div class="card">
            <div class="card-content" >
                <div class="row">
                    <div class="right col s12 m12">
                        <table class="table striped RobotoR" id="tblReciboXUser" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>NUMERO</th>
                                    <th>FECHA</th>
                                    <th>FACTURA</th>
                                    <th>FORMA PAGO</th>
                                    <th>CONCEPTO</th>
                                    <th>TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot id="blfooterMaster">
                            </tfoot>
                        </table> 
                                <span id="totalPagado" style="font-size: 1.5em; text-align: left; font-weight: bold"></span>
                                 
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


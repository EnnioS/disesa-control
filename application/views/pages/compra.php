<header class="demo-header mdl-layout__header">
    <div class="centrado  ColorHeader">
    	<span class="title">DISESA - CONTROL</span>
        <a href="#!" style="float: left; margin-left: 1rem; color: white" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
</header>

<br>
<main class="container" style="width: 90%!important;">
    <ul class="collapsible expandable" >
        <li>
            <div class="collapsible-header"  style="background-color: black"><i class="material-icons">payment</i><span style="margin-top: 10px; font-weight: bold; color: white">INGRESO DE FACTURA DE COMPRA</span></div>
            <div class="collapsible-body">
              

        	<div class="card">
                <div class="card-content">
                    <div class="row" >
                        <div class="col s12 m12" >

                            <div class="row" >
                              <!--  <div class="col s11 m12">
                                    <span style="font-size: 1.5em; text-align: left; font-weight: bold">COMPRAS
                                    </span>
                                </div>
                                <div class="col s12 m12 separador" style="margin-bottom: 25px"></div>-->
                                <div class="col s5 m6 input-field inline">
                                    <input placeholder="" type="text" id="searchRegCompra" class="validate">
                                    <label for="searchRegCompra">BUSQUEDA</label>
                                                       
                                </div>
                                <div class="col s12 m3 input-field inline">
                                    <input type="text" class="input-fecha" id="txtDesdeFactCompra" placeholder="Fecha" value="">
                                    <label for="txtDesdeFactCompra">DESDE</label>
                                </div>
                                <div class="col s12 m3 input-field inline">
                                    <input type="text" class="input-fecha" id="txtHastaFactCompra" placeholder="Fecha" value="">
                                    <label for="txtHastaFactCompra">HASTA</label>
                                </div>
                                 <div class="row">
                                    <div class="col s3 m2 right" style="padding: 0px; margin: 0px;">
                                        <a id="btnAddFactCompra" class="waves-effect black btn modal-trigger" href="#ModalAddFactCompra"><i class="material-icons left" style="padding: 0px;">add_circle</i>agregar</a>
                                    </div>

                                    <div class="col s4 m2 input-field inline" style="margin-left: 10px;">
                                        <div for="frm_lab_row" style="color: grey; font-size: 0.7em; padding: 0px; margin: 0px;">REGISTROS POR TABLA</div>
                                        <select  id="frm_lab_row" class="chosen-select browser-default">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                            <option value="-1">Todo...</option>
                                        </select>
                                    </div>
                                </div>
                                <table class="col s12 m12 table striped RobotoR" id="tblFactCompra" style="width:100%">
                                    <thead style="width:100%">
                                        <tr style="width:100%">
                                            <th>N° COMPRA</th>
                                            <th>FECHA</th>
                                            <th>PROVEEDOR</th>
                                            <th>TIPO/PAGO</th>
                                            <th>DIA CREDITO</th>
                                            <th>TOTAL COMPRA</th>
                                            <th>VENCE COMPRA</th>
                                            <th>DIAS RESTANTES</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot >
                                        
                                    </tfoot>
                                </table> 
                            </div>
                        </div>   
                    </div>
                </div>
            </div>
        </div>
    </li>
    <ul class="collapsible expandable" >
        <li>
            <div class="collapsible-header"  style="background-color: black"><i class="material-icons">receipt</i><span style="margin-top: 10px; font-weight: bold; color: white">INGRESO DE RECIBO DE COMPRA</span></div>
            <div class="collapsible-body">
              
                <div class="card">
                    <div class="card-content">
                        <div class="row" >
                            <div class="col s12 m12" >

                                <div class="row" >
                                  <!--  <div class="col s11 m12">
                                        <span style="font-size: 1.5em; text-align: left; font-weight: bold">COMPRAS
                                        </span>
                                    </div>
                                    <div class="col s12 m12 separador" style="margin-bottom: 25px"></div>-->
                                    <div class="col s5 m6 input-field inline">
                                        <input placeholder="" type="text" id="searchRegComRec" class="validate">
                                        <label for="searchRegComRec">BUSQUEDA</label>
                                                           
                                    </div>
                                    <div class="col s12 m3 input-field inline">
                                        <input type="text" class="input-fecha" id="txtDesdeRecComp" placeholder="Fecha" value="">
                                        <label for="txtDesdeRecComp">DESDE</label>
                                    </div>
                                    <div class="col s12 m3 input-field inline">
                                        <input type="text" class="input-fecha" id="txtHastaRecComp" placeholder="Fecha" value="">
                                        <label for="txtHastaRecComp">HASTA</label>
                                    </div>
                                     <div class="row">
                                        <div class="col s3 m2 right" style="padding: 0px; margin: 0px;">
                                            <a id="btnAddRecComp" class="waves-effect black btn modal-trigger" href="#ModalAddRecComp"><i class="material-icons left" style="padding: 0px;">add_circle</i>agregar</a>
                                        </div>

                                        <div class="col s4 m2 input-field inline" style="margin-left: 10px;">
                                            <div for="frm_lab_row" style="color: grey; font-size: 0.7em; padding: 0px; margin: 0px;">REGISTROS POR TABLA</div>
                                            <select  id="frm_lab_row" class="chosen-select browser-default">
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                                <option value="-1">Todo...</option>
                                            </select>
                                        </div>
                                    </div>
                                    <table class="col s12 m12 table striped RobotoR" id="tblRecComp" style="width:100%">
                                        <thead style="width:100%">
                                            <tr style="width:100%">
                                                <th>N° RECIBO</th>
                                                <th>FECHA</th>
                                                <th>PROVEEDOR</th>
                                                <th>FORMA DE PAGO</th>
                                                <th>CONCEPTO</th>
                                                <th>TOTAL RECIBO</th>
                                                <th>ESTADO</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        <tfoot >
                                            
                                        </tfoot>
                                    </table> 
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </li>
    </ul>
</main>

<!--//////////////////////////////////////////////////////////////////////////////////////////////
                                      MODALES AGREGAR FACTURAS DE COMPRAS
///////////////////////////////////////////////////////////////////////////////////////////////-->
<!-- Modal #1 Modal Structure -->
<div id="ModalAddFactCompra" class="modal">
    <div class="modal-content">
        <div class="row">
            <div class="col s1 m1 l1 right">
                <a href="#!" class=" BtnClose modal-action modal-close noHover">
                    <i class="material-icons">highlight_off</i>
                </a>
            </div>
            <div class="col s11 m11">
                <span style="font-size: 1.5em; text-align: left; font-weight: bold">AGREGAR NUEVA COMPRA
                </span>
            </div>
        </div>

        
            
        <div class="card">
            <div class="card-content" style="margin: 0px; padding: 0px;">
                <div class="row">
                    <div class=" col s12 m12" style="font-size: 1em;font-weight: bold;
                    margin-bottom: 15px">

                    <span >Datos Generales
                    </span>

                    </div>
                    <div class="col s12 m2 input-field inline">
                         <input type="text" class="input-fecha" id="txtFechaFactCompra" placeholder="Fecha" value=""/>
                        <label for="txtFechaFactCompra">FECHA</label>
                    </div>

                    <div class="col s12 m3 input-field inline">
                        <select id="txtipofactCompra" class="txtipofactCompra chosen-select browser-default">
                        </select>
                    </div>

                    <div class="col s12 m3 input-field inline">
                        <input placeholder=""  id="textIdfactCompra" type="text" class="validate">
                        <label for="textIdfactCompra">FACTURA COMPRA N°</label>
                    </div>
               
                    <div class="col s12 m4 input-field inline">
                        <select id="txtProvFactCompra" class="txtCodProve chosen-select browser-default">
                        </select>
                    </div>


                    <div class="col s12 m6 input-field inline">
                         <input  type="text" placeholder="" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" id="txtNomContactProv"  class="validate">
                        <label for="txtNomContactProv">ENTREAGA</label>
                    </div>



                    <div class="col s12 m6 input-field inline">
                         <select id="txtVendedorFactCompra" class="txtNomPer chosen-select browser-default">
                        </select>
                    </div>
                    

                    <div class="col s12 m3 input-field inline">
                       <select id="txtFormaPagoFactCompra" class="chosen-select browser-default">
                            <option value="PAGO">Forma de Pago</option>
                            <option value="CREDITO">Credito</option>
                            <option value="CONTADO">Contado</option>
                        </select>
                    </div>
                    <div class="col s12 m3 input-field inline">
                        <input  type="number" placeholder="" id="txtTiempoCreditoFactCompra" class="validate">
                        <label for="txtTiempoCreditoFactCompra">CREDITO EN DÍAS</label>
                    </div>
                    <div class="col s12 m3 input-field inline">
                       <select id="txtMonedaFactCompra" class="chosen-select browser-default">
                            <option value="MONEDA">Moneda</option>
                            <option value="C$">Córdoba</option>
                            <option value="US$">Dolar</option>
                        </select>
                    </div>
                    <div class="col s12 m3 input-field inline">
                        <form>
                            <input  type="radio"  name="estadoFactComp" id="txtRbActivoFactCompra" value="Activo" class="validate" checked="checked">
                            <label style="margin-right: 15px" for="txtRbActivoFactCompra">Activa</label>
                        
                            <input  type="radio" name="estadoFactComp"  id="txtRbAnuladoFactCompra" value="Anulado" class="validate">
                            <label for="txtRbAnuladoFactCompra">Anulada</label>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-content" style="margin: 0px; padding: 0px;">
                <div class="left row" style="margin: 0px; padding: 0px">
                    <div class=" col s12 m12" style="font-size: 1em;font-weight: bold;
                    margin-bottom: 15px">
                        <span >Detalles de factura
                        </span>
                    </div>
                </div>
                <div class="center row" style="padding: 0px; margin: 0px">
                    
                    <div id="txtCodProdCompra"></div>
                    <div class="col s12 m12 input-field">
                        <input style="position: relative;" type="text" placeholder="" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" id="txtProductoDetFactCompra" name="txtProductoDetFactCompra" />
                        <label for="txtProductoDetFactCompra"> PRODUCTO</label>
                        <div class="row" style="position: absolute; z-index: 1000; margin-left: 0px">
                            <div class="col s12 m7" >
                                <div  id="resultado" ></div>
                            </div>
                        </div>
                    </div>

                    <div class="col s12 m4 input-field inline">
                       <input  type="number" placeholder="" id="txtCantidadDetFactCompra" class="validate">
                       <label for="txtCantidadDetFactCompra">CANTIDAD</label>
                    </div>
                    <div class="col s12 m4 input-field inline">
                       <input  type="number" placeholder="" id="txtPUnidadDetFactCompra" step="any" class="validate">
                       <label for="txtPUnidadDetFactCompra">P/UNIDAD</label>
                    </div>
                   
                    <div class="right col m4">
                        <a href="#!" id="agregarDetfactCompra" style="width: 100%" class="waves-effect black btn-small"><i class="material-icons left" style="padding: 0px;">add_circle</i>agregar</a>
                    </div>
                </div>

                <div class="center row">
                    <div class="right col s12 m12">
                        <table class="table striped RobotoR" id="tblDetFactCompra" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>COD/PROD</th>
                                    <th>DESCRIPCION</th>
                                    <th>CANTIDAD</th>
                                    <th>C. UNITARIO</th>
                                    <th>TOTAL COSTO</th>
                                    <th>ELIMINAR</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot id="blfooterMaster">
                                
                            </tfoot>
                        </table> 
                    </div>

                    <div class="col s12 m12 right">
                         <span style="font-size: 1.9em; font-weight: bold;" id="tipoMonedaFactCompra"></span>
                        <span style="font-size: 1.9em; font-weight: bold;" id="totalfactCompra"></span>
                    </div>
                </div>   
            </div>
        </div>
        <div class="center row">
            <div class="right col m3 l4">
                <a href="#!" id="agregarfactCompra" class="waves-effect black btn-small"><i class="material-icons left" style="padding: 0px;">save</i>guardar</a>
            </div>
        </div>
    </div>

</div>

<!--//////////////////////////////////////////////////////////////////////////////////////////////
                                      MODALES AGREGAR RECIBOS DE COMPRAS
///////////////////////////////////////////////////////////////////////////////////////////////-->
<!-- Modal #1 Modal Structure -->
<div id="ModalAddRecComp" class="modal">
    <div class="modal-content">
        <div class="row">
            <div class="col s1 m1 l1 right">
                <a href="#!" class=" BtnClose modal-action modal-close noHover">
                    <i class="material-icons">highlight_off</i>
                </a>
            </div>
            <div class="col s11 m11">
                <span style="font-size: 1.5em; text-align: left; font-weight: bold">AGREGAR NUEVO RECIBO
                </span>
            </div>
        </div>

        
            
        <div class="card">
            <div class="card-content" style="margin: 0px; padding: 0px;">
                <div class="row">
                    <div class=" col s12 m12" style="font-size: 1em;font-weight: bold;
                    margin-bottom: 15px">
                        <span >Datos Generales
                        </span>
                    </div>
                    <div class="col s12 m3 input-field inline">
                         <input type="text" class="input-fecha" id="txtFechaRecCom" placeholder="Fecha" value="">
                        <label for="txtFechaRecCom">FECHA</label>
                    </div>
                    <div class="col s12 m3 input-field inline">
                        <select id="txtipoReciboCompra" class="txtipoReciboCompra chosen-select browser-default">
                        </select>
                    </div>
                    <div class="col s12 m3 input-field inline">
                        <input placeholder=""  id="textIdCobroRecCom" type="text" class="validate">
                        <label for="textIdCobroRecCom">RECIBO N°</label>
                    </div>
                    <div class="col s12 m3 input-field inline">
                        <select id="txtProvRecCom" class="txtCodProve chosen-select browser-default">
                        </select>
                    </div>

                     <div class="col s12 m4 input-field inline">
                         <input  type="text" placeholder="" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" id="txtNomContaProvRecCom"  class="validate">
                        <label for="txtNomContaProvRecCom">ENTREAGA</label>
                    </div>
                    <div class="col s12 m4 input-field inline">
                         <select id="txtVendedorRecCom" class="txtNomPer chosen-select browser-default">
                        </select>
                    </div>
                    
                    <div class="col s12 m2 input-field inline">
                       <select id="txtFormaPagoRecCom" class="chosen-select browser-default">
                            <option value="PAGO">Forma de Pago</option>
                            <option value="EFECTIVO">Efectivo</option>
                            <option value="CHEQUE">Cheque</option>
                            <option value="DEPOSITO">Deposito</option>
                        </select>
                    </div>
                    <div class="col s12 m2 input-field inline">
                       <select id="txtMonedaRecCom" class="chosen-select browser-default">
                            <option value="MONEDA">Moneda</option>
                            <option value="C$">Córdoba</option>
                            <option value="US$">Dolar</option>
                        </select>
                    </div>


                    <div class="col s12 m2 input-field inline">
                        <input  type="number" step="any" placeholder="" id="txtTasaCambioRecCom" class="validate">
                        <label for="txtTasaCambioRecCom">TASA DE CAMBIO</label>
                    </div>
                    <div class="col s12 m3 input-field inline">
                        <input  type="text" placeholder=""  onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" id="txtNomBancoRecCom" class="validate">
                        <label for="txtNomBancoRecCom">BANCO</label>
                    </div>
                    <div class="col s12 m3 input-field inline">
                        <input  type="text" placeholder="" id="txtNumChequeRecCom" class="validate">
                        <label for="txtNumChequeRecCom">N° CHEQUE / TRANSFERENCIA</label>
                    </div>
                    <div class="col s12 m4 input-field inline">
                        <form>
                            <input  type="radio"  name="estadoRecibo" id="txtRbActivoRecCom" value="Activo" class="validate" checked="checked">
                            <label style="margin-right: 15px" for="txtRbActivoRecCom">Activo</label>
                        
                            <input  type="radio" name="estadoRecibo"  id="txtRbAnuladoRecCom" value="Anulado" class="validate">
                            <label for="txtRbAnuladoRecCom">Anulado</label>
                        </form>
                    </div>


                    <div class="col s12 m12 input-field inline">
                        <input  type="text" placeholder=""  onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" id="txtConcepRecCom" class="validate">
                        <label for="txtConcepRecCom">CONCEPTO</label>
                    </div>
                    <div class="col s12 m12 input-field inline">
                        <input  type="text" placeholder=""  onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" id="txtObservRecCom" class="validate">
                        <label for="txtObservRecCom">OBSERVACIONES</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-content" style="margin: 0px; padding: 0px;">
                <div class="left row" style="margin: 0px; padding: 0px">
                    <div class=" col s12 m12" style="font-size: 1em;font-weight: bold;
                    margin-bottom: 15px">
                        <span >Detalles de recibo
                        </span>
                    </div>
                </div>
                <div class="center row" style="padding: 0px; margin: 0px">
                     <div id="txtCodProdRecibos"></div>
                     <div class="col s12 m4 input-field inline">
                        <input  type="text" placeholder=""  onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" id="txtNumFactRecCom" class="validate">
                        <label for="txtNumFactRecCom">N° FACTURA</label>
                    </div>
                    
                    <div class="col s12 m4 input-field inline">
                       <input  type="number" placeholder="" id="txtMontoRecibidoRec" step="any" class="validate">
                       <label for="txtMontoRecibidoRec">MONTO RECIBIDO</label>
                    </div>

                    <div class="right col m4">
                        <a href="#!" id="agregarDetRecCom" style="width: 100%" class="waves-effect black btn-small"><i class="material-icons left" style="padding: 0px;">add_circle</i>agregar</a>
                    </div>
                   
                </div>

                
               

                <div class="center row">
                    <div class="right col s12 m12">
                        <table class="table striped RobotoR" id="tblDetRecCom" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>N° FACTURA</th>
                                    <th>MONTO RECIBIDO</th>
                                    <th>ELIMINAR</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot id="blfooterMaster">
                                
                            </tfoot>
                        </table> 
                    </div>

                    <div class="col s12 m12 right">
                         <span style="font-size: 1.9em; font-weight: bold;" id="txtMonedaRecComTotal" ></span>
                        <span style="font-size: 1.9em; font-weight: bold;" id="totalReciCom"></span>
                    </div>
                </div>   
            </div>
        </div>
        <div class="center row">
            <div class="right col m3 l4">
                <a href="#!" id="btnAgregarRecCom" class="waves-effect black btn-small"><i class="material-icons left" style="padding: 0px;">save</i>guardar</a>
            </div>
        </div>
    </div>

</div>
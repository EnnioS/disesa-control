<header class="demo-header mdl-layout__header">
    <div class="centrado  ColorHeader">
    	<span class="title">DISESA - CONTROL</span>
        <a href="#!" style="float: left; margin-left: 1rem; color: white" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
</header>

<br>
<main class="container" style="width: 90%!important;">

	<div class="card">
        <div class="card-content">
            <div class="row" >
                <div class="col s12 m12" >
                    <div class="row" >
                        <div class="col s11 m12">
                            <span style="font-size: 1.5em; text-align: left; font-weight: bold">COBROS
                            </span>
                        </div>
                       
                        <div class="col s12 m12 separador" style="margin-bottom: 25px"></div>

                        <div class="col s5 m6 input-field inline">
                            
                            <input placeholder="" type="text" id="searchRegCobro" class="validate">
                            <label for="searchRegCobro">BUSQUEDA</label>
                                               
                        </div>
                        <div class="col s12 m3 input-field inline">
                            <input type="text" class="input-fecha" id="txtDesdeCobro" placeholder="Fecha" value="">
                            <label for="txtDesdeCobro">DESDE</label>
                        </div>
                        <div class="col s12 m3 input-field inline">
                            <input type="text" class="input-fecha" id="txtHastaCobro" placeholder="Fecha" value="">
                            <label for="txtHastaCobro">HASTA</label>
                        </div>
                        <div class="row">
                            <div class="col s3 m2 right" style="padding: 0px; margin: 0px;">
                                <a id="btnAddCobro" class="waves-effect black btn modal-trigger" href="#ModalAddCobro"><i class="material-icons left" style="padding: 0px;">add_circle</i>agregar</a>
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
                        <table class="col s12 m12 table striped RobotoR" id="tblCobro" style="width:100%">
                            <thead>
                                <tr>
                                    <th>N° RECIBO</th>
                                    <th>FECHA RECIBO.</th>
                                    <th>VENDEDOR</th>
                                    <th>CLIENTE</th>
                                    <th>LOCAL</th>
                                    <th>CONCEPTO</th>
                                    <th>TOTAL</th>
                                    <th>ESTADO</th>
                                    <th></th>
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
    </div>

</main>

<!--//////////////////////////////////////////////////////////////////////////////////////////////
                                      MODALES AGREGAR RECIBO
///////////////////////////////////////////////////////////////////////////////////////////////-->
<!-- Modal #1 Modal Structure -->
<div id="ModalAddCobro" class="modal">
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

        
            
        <div class="card" >
            <div class="card-content" style="margin: 0px; padding: 0px;">
                <div class="row" id="formularioReciboFact">
                    <div class=" col s12 m12" style="font-size: 1em;font-weight: bold;
                    margin-bottom: 15px">
                        <span >Datos Generales
                        </span>
                    </div>
                    <div class="col s12 m3 input-field inline">
                         <input type="text" id="txtFechaCobro" placeholder="Fecha" value=""/>
                        <label for="txtFechaCobro">FECHA</label>
                    </div>
                    <div class="col s12 m3 input-field inline">
                        <input placeholder="" type="number" id="textIdCobro" type="text" class="validate">
                        <label for="textIdCobro">RECIBO N°</label>
                    </div>
               
                    <div class="col s12 m6 input-field inline">
                        <select id="txtClienteCobro" class="txtCliente chosen-select browser-default">
                        </select>
                    </div>


                    <div class="col s12 m8 input-field inline">
                         <select id="txtVendedorCobro" class="txtNomPer chosen-select browser-default">
                        </select>
                    </div>
                    
                    <div class="col s12 m2 input-field inline">
                       <select id="txtFormaPagoRec" class="chosen-select browser-default">
                            <option value="PAGO">Forma de Pago...</option>
                            <option value="EFECTIVO">Efectivo</option>
                            <option value="CHEQUE">Cheque</option>
                            <option value="DEPOSITO">Deposito</option>
                        </select>
                    </div>
                    <div class="col s12 m2 input-field inline" id="txtFormMonedaRec">
                       <select id="txtMonedaCobro" class="chosen-select browser-default">
                            <option value="MONEDA">Moneda...</option>
                            <option value="C$">Córdoba</option>
                            <option value="US$">Dolar</option>
                        </select>
                    </div>


                    <div class="col s12 m2 input-field inline" id="txtFormTasaCambRec">
                        <input  type="number" step="any" placeholder="" id="txtTasaCambio" class="validate">
                        <label for="txtTasaCambio">TASA DE CAMBIO</label>
                    </div>
                    <div class="col s12 m3 input-field inline" id="txtFormBancoRec">
                        <input  type="text" placeholder=""  onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" id="txtNomBanco" class="validate">
                        <label for="txtNomBanco">BANCO</label>
                    </div>
                    <div class="col s12 m3 input-field inline" id="txtFormCkRec">
                        <input  type="text" placeholder="" id="txtNumCheque" class="validate">
                        <label for="txtNumCheque">N° CHEQUE / TRANSFERENCIA</label>
                    </div>
                    <div class="col s12 m4 input-field inline">
                        <form>
                            <input  type="radio"  name="estadoRecibo" id="txtRbActivoRec" value="Activo" class="validate" checked="checked">
                            <label style="margin-right: 15px" for="txtRbActivoRec">Activo</label>
                        
                            <input  type="radio" name="estadoRecibo"  id="txtRbAnuladoRec" value="Anulado" class="validate">
                            <label for="txtRbAnuladoRec">Anulado</label>
                        </form>
                    </div>


                    <div class="col s12 m12 input-field inline">
                        <input  type="text" placeholder=""  onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" id="txtConcepCobro" class="validate">
                        <label for="txtConcepCobro">CONCEPTO</label>
                    </div>
                    <div class="col s12 m12 input-field inline">
                        <input  type="text" placeholder=""  onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" id="txtObservCobro" class="validate">
                        <label for="txtObservCobro">OBSERVACIONES</label>
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
                        <select  id="txtNumFactRecibo"  class="txtFactXClte chosen-select browser-default">
                        </select>
                    </div>
                    
                    <div class="col s12 m4 input-field inline">
                       <input  type="number" placeholder="" id="txtMontoRecibidoRec" step="any" class="validate">
                       <label for="txtMontoRecibidoRec">MONTO RECIBIDO</label>
                    </div>

                    <div class="right col m4">
                        <a href="#!" id="agregarDetRec" style="width: 100%" class="waves-effect black btn-small"><i class="material-icons left" style="padding: 0px;">add_circle</i>agregar</a>
                    </div>
                   
                </div>

                
               

                <div class="center row">
                    <div class="right col s12 m12">
                        <table class="table striped RobotoR" id="tblDetCobro" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>N° FACTURA</th>
                                    <th>ABONO</th>
                                    <th>ELIMINAR</th>
                                    <th style="display: none">TOTALFACTURA</th>
                                    <th style="display: none">TOTALABONOS</th>
                                    <th style="display: none">REMANENTES</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot id="blfooterMaster">
                                
                            </tfoot>
                        </table> 
                    </div>

                    <div class="col s12 m12 right">
                         <span style="font-size: 1.9em; font-weight: bold;" id="txtMonedaRecTotal" ></span>
                        <span style="font-size: 1.9em; font-weight: bold;" id="totalReciv"></span>
                    </div>
                </div>   
            </div>
        </div>
        <div class="center row">
            <div class="right col m3 l4">
                <a href="#!" id="btnAgregarRecibo" class="waves-effect black btn-small"><i class="material-icons left" style="padding: 0px;">save</i>guardar</a>
            </div>
        </div>
    </div>

</div>
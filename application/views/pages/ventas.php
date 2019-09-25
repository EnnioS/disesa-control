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
                            <span style="font-size: 1.5em; text-align: left; font-weight: bold">VENTAS
                            </span>
                        </div>
                        <div class="col s12 m12 separador" style="margin-bottom: 25px"></div>

                        
                        <div class="col s12 m8" style="margin: 0; padding: 0; margin-bottom: 15px">
                            <div class="card" style="margin: 0; padding: 0">
                                <div class="card-content" style="margin: 10px; padding: 0">
                                    <div class="row" style="margin: 0; padding: 0">
                                        <div class="col s12 m4 input-field inline" style="margin-top: 15px">
                                            <input type="text" class="input-fecha" id="txtDesdeFact" placeholder="Fecha" value="">
                                            <label for="txtDesdeFact" >DESDE</label>
                                        </div>
                                        <div class="col s12 m4 input-field inline" style="margin-top: 15px">
                                            <input type="text" class="input-fecha" id="txtHastaFact" placeholder="Fecha" value="">
                                            <label for="txtHastaFact">HASTA</label>
                                        </div>
                                         <div class="col s12 m4 right" style=" padding: 0px; margin-top: 10px">
                                            <a id="btnfilterFactXdate" style="width: 100%" class="waves-effect black btn"><i class="material-icons" style="padding: 0px;">search</i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m4 right" style="margin-top: 17px;">
                            <a id="btnAddFact" class="waves-effect black btn modal-trigger" href="#ModalAddFact"><i class="material-icons left" style="padding: 0px;">add_circle</i>nueva factura</a>
                        </div>
                        

                        <div class="col s12 m12 separador" style="margin-bottom: 15px; margin-top: 10px"></div>
                         
                        
                        <div class="col s12 m9 input-field inline" style="margin-top: 16px">
                            <input placeholder="" type="text" id="searchRegVentas" class="validate">
                            <label for="searchRegVentas">BUSQUEDA</label>
                        </div>

                        <div class="col s12 m3 input-field inline">
                            <div for="frm_lab_row" style="color: grey; font-size: 0.7em; padding: 0px; margin: 0px;">REGISTROS POR TABLA</div>
                            <select  id="frm_lab_row" class="chosen-select browser-default">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                                <option value="-1">Todo...</option>
                            </select>
                        </div>




                        <table class="col s12 m12 table striped RobotoR" id="tblFacturas" style="width:100%">
                            <thead>
                                <tr>
                                    <th>NUMERO</th>
                                    <th>REALIZADA</th>
                                    <th>VENDEDOR</th>
                                    <th>CLIENTE</th>
                                    <th>TIPO/PAGO</th>
                                    <th>CREDITO</th>
                                    <th>TOTAL</th>
                                    <th>ESTADO</th>
                                    <th>OPCIONES</th>
                                </tr>
                            </thead>
                        <tbody>
                        </tbody>
                        <tfoot class="right" id="blfooterMaster" style="font-size: 1.5em; text-align: left; font-weight: bold" id="blfooterMaster">
                            
                        </tfoot>
                    </table> 
                    </div>
                </div>            
            </div>
        </div>            
    </div>
</main>

<!--//////////////////////////////////////////////////////////////////////////////////////////////
                                      MODAL VER DETALLE DE FACTURA
///////////////////////////////////////////////////////////////////////////////////////////////-->
<!-- Modal #1 Modal Structure -->
<div id="ModalVerDetFactVenta" class="modal">
    <div class="modal-content">
        <div class="row">
            <div class="col s1 m1 l1 right">
                <a href="#!" class=" BtnClose modal-action modal-close noHover">
                    <i class="material-icons">highlight_off</i>
                </a>
            </div>
            <div class="col s11 m11">
                <span style="font-size: 1.5em; text-align: left; font-weight: bold"> 
                </span>
                <span id="numFactVent" style="font-size: 1.5em; text-align: left; font-weight: bold"></span>
            </div>
        </div>

        
            
        <div class="card">
            <div class="card-content">
                <div class="row">
                    <div id="camposNotaCreditoVentaFact">
                        <div class="row">
                             <div class="left col s3 input-field inline">
                                 <input  type="text" id="txtFechaFact" placeholder="Fecha" value=""/>
                                <label for="txtFechaFact">FECHA</label>
                            </div>
                            <div class="right col s9">
                                <div>
                                    <label>
                                        <input id="radioInputNCParcial" class="with-gap" name="NCredito" type="radio" checked />
                                        <span>Parcial</span>
                                    </label>

                                    <label>
                                        <input id="radioInputNCCompleta" class="with-gap" name="NCredito" type="radio" />
                                        <span>Completa</span>
                                    </label>
                                </div>
                            </div>

                            
                            <div class="col s10 input-field inline">
                                 <textarea id="txtCondeptoNCVFact" placeholder="Motivo" value=""></textarea>
                                <label for="txtCondeptoNCVFact">MOTIVO</label>
                            </div>
                            <div class= "right col s2" style="margin-top: 3px">
                                <a class="waves-effect waves-light black btn" style="width: 100%; height: 100%"><i class="material-icons light-green-text text-accent-4">note_add</i></a>
                            </div>
                        </div>
                        
                    </div>

                    <span style="margin-left: 10px;font-weight: bold">DETALLES DE FACTURA</span>
                   
                    <div class="right col s12 m12">
                        <table class="table striped RobotoR" id="tblDetFacturasEdit" style="width:100%;">
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

                                <span id="totalFactVentas" style="font-size: 1.5em; text-align: left; font-weight: bold"></span>    
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!--//////////////////////////////////////////////////////////////////////////////////////////////
                                      MODALES AGREGAR FACTUAS
///////////////////////////////////////////////////////////////////////////////////////////////-->
<!-- Modal #1 Modal Structure -->
<div id="ModalAddFact" class="modal">
    <div class="modal-content">
        <div class="row">
            <div class="col s1 m1 l1 right">
                <a href="#!" class=" BtnClose modal-action modal-close noHover">
                    <i class="material-icons">highlight_off</i>
                </a>
            </div>
            <div class="col s11 m11">
                <span style="font-size: 1.5em; text-align: left; font-weight: bold">AGREGAR NUEVA FACTURA
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
                         <input type="text" id="txtFechaFact" placeholder="Fecha" value=""/>
                        <label for="txtFechaFact">FECHA</label>
                    </div>
                    <div class="col s12 m2 input-field inline">
                        <input placeholder="" type="number" id="textIdfact" type="text" class="validate">
                        <label for="textIdfact">FACTURA N°</label>
                    </div>
               
                    <div class="col s12 m4 input-field inline">
                        <select id="txtClienteFact" class="txtCliente chosen-select browser-default">
                        </select>
                    </div>

                    <div class="col s12 m4 input-field inline">
                         <select id="txtVendedorFact" class="txtNomPer chosen-select browser-default">
                        </select>
                    </div>
                    

                    <div class="col s12 m3 input-field inline">
                       <select id="txtFormaPagoFact" class="chosen-select browser-default">
                            <option value="PAGO">Forma de Pago</option>
                            <option value="CREDITO">Credito</option>
                            <option value="CONTADO">Contado</option>
                        </select>
                    </div>
                    <div class="col s12 m3 input-field inline">
                        <input  type="number" placeholder="" id="txtTiempoCreditoFact" class="validate">
                        <label for="txtTiempoCreditoFact">CREDITO EN DÍAS</label>
                    </div>
                    <div class="col s12 m2 input-field inline">
                       <select id="txtMonedaFact" class="chosen-select browser-default">
                            <option value="MONEDA">Moneda</option>
                            <option value="C$">Córdoba</option>
                            <option value="US$">Dolar</option>
                        </select>
                    </div>
                    <div class="col s12 m4 input-field inline">
                        <form>
                            <input  type="radio"  name="estadoFact" id="txtRbActivoFact" value="Activo" class="validate" checked="checked">
                            <label style="margin-right: 15px" for="txtRbActivoFact">Activa</label>
                        
                            <input  type="radio" name="estadoFact"  id="txtRbAnuladoFact" value="Anulado" class="validate">
                            <label for="txtRbAnuladoFact">Anulada</label>
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
                    
                    <div id="txtCodProdVentas"></div><div id="txtNomProdVentas"></div>
                    <div class="col s12 m12 input-field">
                        <input style="position: relative;" type="text" placeholder="" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" id="txtProductoDetFact" name="txtProductoDetFact" />
                        <label for="txtProductoDetFact"> PRODUCTO</label>
                        <div class="row" style="position: absolute; z-index: 1000; margin-left: 0px">
                            <div class="col s12 m7" >
                                <div  id="resultado" ></div>
                            </div>
                        </div>
                    </div>

                    <div class="col s12 m2 input-field inline">
                       <input  type="number" placeholder="" id="txtCantidadDetFact" class="validate">
                       <label for="txtCantidadDetFact">CANTIDAD</label>
                    </div>
                     <div class="col s12 m2 input-field inline">
                       <input  type="number" placeholder="" id="txtCantBonifDetFact" class="validate">
                       <label for="txtCantBonifDetFact">BONIFICADO</label>
                    </div>
                    <div class="col s12 m4 input-field inline">
                       <input  type="number" placeholder="" id="txtPUnidadDetFact" step="any" class="validate">
                       <label for="txtPUnidadDetFact">P/UNIDAD</label>
                    </div>
                   
                    <div class="right col m4">
                        <a href="#!" id="agregarDetfact" style="width: 100%" class="waves-effect black btn-small"><i class="material-icons left" style="padding: 0px;">add_circle</i>agregar</a>
                    </div>
                </div>

                <div class="center row">
                    <div class="right col s12 m12">
                        <table class="table striped RobotoR" id="tblDetFacturas" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>COD/PROD</th>
                                    <th>DESCRIPCION</th>
                                    <th>CANTIDAD</th>
                                    <th>P. UNITARIO</th>
                                    <th>TOTAL</th>
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
                         <span style="font-size: 1.9em; font-weight: bold;" id="tipoMonedaFactu"></span>
                        <span style="font-size: 1.9em; font-weight: bold;" id="totalfact"></span>
                    </div>
                </div>   
            </div>
        </div>
        <div class="center row">
            <div class="right col m3 l4">
                <a href="#!" id="agregarfact" class="waves-effect black btn-small"><i class="material-icons left" style="padding: 0px;">save</i>guardar</a>
            </div>
        </div>
    </div>

</div>




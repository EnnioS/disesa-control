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
            <div class="collapsible-header"  style="background-color: black"><i class="material-icons">person_add</i><span style="margin-top: 10px; font-weight: bold; color: white">INGRESO DE PERSONAL</span></div>
            <div class="collapsible-body">
              
                <div class="card">
                    <div class="card-content">
                        <div class="row" >
                            <div class="col s12 m3">
                                <div class="row">



                                    <div class="col s12 m12">
                                        <div class="card" style="margin: 0px; padding: 0px">
                                            <div class="card-content" style="margin: 10px; padding: 0px;width: 100%; height: 100%">
                                                <div class="center row" >
                                                    <div class="col s12 m12">
                                                        <div class="uploaded_image5">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col s12 m12">
                                        <form method="post" id="upload_form5" align="center" enctype="multipart/form-data">             
                                            <div class="estilo-foto">
                                                <a href="#!" ><i class="material-icons left" style="margin-left: 10px">photo</i><span class="tituloFoto">IMAGEN</span></a>
                                                <input type="file" name="image_file5" id="image_file5" />
                                            </div>
                                            <input type="submit" name="upload5" id="upload5" style="display: none" value="Upload5" class="btn btn-info" />
                                        </form>
                                    </div>


                                </div>
                            </div>
                            <div class="col s12 m9" style="margin: 0px;padding: 0px">
                                <div class="row" style="margin: 0px;padding: 0px">

                                    <div class="col s12 m4 input-field inline">
                                        <input placeholder="" type="text" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" id="txtNomPer"  class="validate">
                                        <label for="txtNomPer">NOMBRES</label>
                                    </div>

                                    <div class="col s12 m4 input-field inline">
                                        <input placeholder="" type="text" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" id="txtApePer" class="validate">
                                        <label for="txtApePer">APELLIDOS</label>
                                    </div>

                                    <div class="col s12 m4 input-field inline">   
                                        <input id="txtFNacPer" class="input-fecha" type="text" value="">
                                        <label for="txtFNacPer">NACIMIENTO</label>
                                    </div>



                                    <div class="col s12 m4 input-field inline">
                                        <input placeholder="" type="text" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" id="txtNacionPer" class="validate">
                                        <label for="txtNacionPer">NACIONALIDAD</label>
                                    </div>

                                    <div class="col s12 m4 input-field inline">
                                        <select id="txtSexoPer" class="chosen-select browser-default">
                                            <option>Sexo...</option>
                                            <option value="F">Femenino</option>
                                            <option value="M">Masculino</option>
                                        </select>
                                    </div>

                                    <div class="col s12 m4 input-field inline">
                                        <input placeholder="" type="text" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" id="txtNumCedulaPer" class="validate">
                                        <label for="txtNumCedulaPer">N° CEDULA</label>
                                    </div>




                                    <div class="col s12 m4 input-field inline">
                                        <input placeholder="" type="text" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" id="txtEmailPer" class="validate">
                                        <label for="txtEmailPer">EMAIL</label>
                                    </div>

                                    <div class="col s12 m4 input-field inline">
                                        <input placeholder="" type="text" id="txtTelCasaPer" class="validate" onkeyup="this.value=Numeros(this.value)">
                                        <label for="txtTelCasaPer">TEL. CASA</label>
                                    </div>

                                    <div class="col s12 m4 input-field inline">
                                        <input placeholder="" type="text" id="txtTelMovilPer" class="validate" onkeyup="this.value=Numeros(this.value)">
                                        <label for="txtTelMovilPer">TEL. MOVIL</label>
                                    </div>


                                     <div class="col s12 m4 input-field inline">
                                        <select id="txtArea" class="txtArea chosen-select browser-default"></select>
                                    </div>
                                     <div class="col s12 m4 input-field inline">
                                        <select id="txtCargo" class="txtCargo chosen-select browser-default"></select>
                                    </div>
                                    <div class="col s12 m4 input-field inline">
                                        <select id="txtDepaPer" class="txtDepa chosen-select browser-default"></select>
                                    </div>
                                   

                                    <div class="col s12 m4 input-field inline">
                                        <select id="txtCiudadPer" class="txtCiudad chosen-select browser-default"></select>
                                    </div>
                                    <div class="col s12 m8 input-field inline">
                                        <input placeholder="" type="text" id="txtDirPer" class="validate">
                                        <label for="txtDirPer">DIRECCIÓN</label>
                                    </div>   
                                        
                                </div>
                            </div>
                            <div class="col s12 m12" id="asignarZonaVendedor">
                                <div class="card">
                                    <div class="card-content" style="margin: 15px;padding: 0; margin-top: 35px">
                                        <div class="row">
                                            <div class="col s12 m9 input-field inline" >
                                                <select  id="txtZonaVendedor" class="txtZona chosen-select browser-default">
                                                </select>
                                            </div>
                                            <div class="col s2 m1">
                                                <i class="material-icons small right" style="color: black">drive_eta</i>
                                            </div>
                                            <div class="col s10 m2">
                                                <label>
                                                    <input type="radio" id="cbVehiculoSi" name="tineneVehiculo" class="filled-in"/>
                                                    <span style="padding-left: 23px">Si</span>
                                                </label>&nbsp
                                                 <label>
                                                    <input type="radio" id="cbVehiculoNo" checked="checked" name="tineneVehiculo" class="filled-in"/>
                                                    <span style="padding-left: 23px">No</span>
                                                </label>
                                            </div>
                                           
                                            <div class="col s12 m12 vehiculoPerVent" style="margin: 0px; padding: 0px">

                                                <div class="col s12 m4">
                                                    <div class="row">

                                                        <div class="col s12 m12">
                                                            <div class="card" style="margin: 0px; padding: 0px">
                                                                <div class="card-content" style="margin: 10px; padding: 0px;width: 100%; height: 100%">
                                                                    <div class="center row" >
                                                                        <div class="col s12 m12">
                                                                            <div class="uploaded_image7">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col s12 m12">
                                                            <form method="post" id="upload_form7" align="center" enctype="multipart/form-data">             
                                                                <div class="estilo-foto">
                                                                    <a href="#!" ><i class="material-icons left" style="margin-left: 10px">photo</i><span class="tituloFoto">VEHICULO</span></a>
                                                                    <input type="file" name="image_file7" id="image_file7" />
                                                                </div>
                                                                <input type="submit" name="upload7" id="upload7" style="display: none" value="Upload5" class="btn btn-info" />
                                                            </form>
                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="col s12 m4">
                                                    <div class="row">

                                                        <div class="col s12 m12">
                                                            <div class="card" style="margin: 0px; padding: 0px">
                                                                <div class="card-content" style="margin: 10px; padding: 0px;width: 100%; height: 100%">
                                                                    <div class="center row" >
                                                                        <div class="col s12 m12">
                                                                            <div class="uploaded_image8">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col s12 m12">
                                                            <form method="post" id="upload_form8" align="center" enctype="multipart/form-data">             
                                                                <div class="estilo-foto">
                                                                    <a href="#!" ><i class="material-icons left" style="margin-left: 10px">photo</i><span class="tituloFoto">CIRCULACIÓN</span></a>
                                                                    <input type="file" name="image_file8" id="image_file8" />
                                                                </div>
                                                                <input type="submit" name="upload8" id="upload8" style="display: none" value="Upload5" class="btn btn-info" />
                                                            </form>
                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="col s12 m4">
                                                    <div class="row">

                                                        <div class="col s12 m12">
                                                            <div class="card" style="margin: 0px; padding: 0px">
                                                                <div class="card-content" style="margin: 10px; padding: 0px;width: 100%; height: 100%">
                                                                    <div class="center row" >
                                                                        <div class="col s12 m12">
                                                                            <div class="uploaded_image9">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col s12 m12">
                                                            <form method="post" id="upload_form9" align="center" enctype="multipart/form-data">             
                                                                <div class="estilo-foto">
                                                                    <a href="#!" ><i class="material-icons left" style="margin-left: 10px">photo</i><span class="tituloFoto">CIRCULACIÓN</span></a>
                                                                    <input type="file" name="image_file9" id="image_file9" />
                                                                </div>
                                                                <input type="submit" name="upload9" id="upload9" style="display: none" value="Upload5" class="btn btn-info" />
                                                            </form>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col s12 m12 vehiculoPerVent" style="margin: 0px;padding: 0px">

                                                <div class="col s12 m3 input-field inline">
                                                    <input placeholder="" type="text" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" id="txtNumCircuVehiculo" class="validate">
                                                    <label for="txtNumCircuVehiculo">N° CIRCULACIÓN</label>
                                                </div>
                                                <div class="col s12 m3 input-field inline">
                                                    <input placeholder="" type="text" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" id="txtNumPlacaVehiculo" class="validate">
                                                    <label for="txtNumPlacaVehiculo">N° PLACA</label>
                                                </div>
                                                <div class="col s12 m3 input-field inline">
                                                    <input placeholder="" type="text" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" id="txtNumChasisVehiculo" class="validate">
                                                    <label for="txtNumChasisVehiculo">N° CHASIS</label>
                                                </div>
                                                <div class="col s12 m3 input-field inline">
                                                    <input placeholder="" type="text" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" id="txtNumMotorVehiculo" class="validate">
                                                    <label for="txtNumMotorVehiculo">N° MOTOR</label>
                                                </div>



                                                <div class="col s12 m3 input-field inline">
                                                    <select id="txtTipoVehiculo" class="tipoVehiclo chosen-select browser-default"></select>
                                                </div>

                                                <div class="col s12 m3 input-field inline">
                                                    <select id="txtCarroceriaVehiculo" class="carroceriaVehiculo chosen-select browser-default"></select>
                                                </div>
                                                <div class="col s12 m3 input-field inline">
                                                    <input placeholder="" type="text" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" id="txtColorVehiculo" class="validate">
                                                    <label for="txtColorVehiculo">COLOR</label>
                                                </div>
                                                
                                                 <div class="col s12 m3 input-field inline">
                                                    <input placeholder="" type="text" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" id="txtMarcaVehiculo" class="validate">
                                                    <label for="txtMarcaVehiculo">MARCA</label>
                                                </div>



                                                <div class="col s12 m3 input-field inline">
                                                    <input placeholder="" type="text" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" id="txtModeloVehiculo" class="validate">
                                                    <label for="txtModeloVehiculo">MODELO</label>
                                                </div>
                                                <div class="col s12 m3 input-field inline">
                                                    <input placeholder="" type="number" id="txtAnnoVehiculo" class="validate">
                                                    <label for="txtAnnoVehiculo">AÑO</label>
                                                </div>
                                                <div class="col s12 m3 input-field inline">
                                                    <input placeholder="" type="text" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" id="txtCilindM3Vehiculo" class="validate">
                                                    <label for="txtCilindM3Vehiculo">CILINDRAJE CC</label>
                                                </div>
                                                <div class="col s12 m3 input-field inline">
                                                    <input placeholder="" type="number"  id="txtNumCilindVehiculo" class="validate">
                                                    <label for="txtNumCilindVehiculo">N° CILINDROS</label>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m3 right" style="margin-top: 10px;">
                             <a href="#!" id="agregarPersonal" style=" width: 100%" class="waves-effect black btn-small"><i class="material-icons left" >add_circle</i>agregar</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="row" >
                            <div class="col s12 m12">
                                <table class="" id="tbPersonal" style="width:100%">
                                    <thead style="display: none">
                                        <tr>
                                            <th></th>
                                            <th>CODIGO</th>
                                            <th>NOMBRE</th>
                                            <th>AREA</th>
                                            <th>CARGO</th>
                                            <th>CIUDAD</th>
                                            <th>ESTADO</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        
                                    </tfoot>
                                </table> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <div class="collapsible-header"  style="background-color: black"><i class="material-icons">person_pin</i><span style="margin-top: 10px; font-weight: bold; color: white">INGRESO DE USUARIOS DEL SISTEMA</span></div>
            <div class="collapsible-body">
              
                <div class="card">
                    <div class="card-content">
                        <div class="row" >
                            

                            <div class="col s12 m7 input-field inline">
                                <select id="txtNomPerson" class="txtNomPer chosen-select browser-default"></select>
                            </div>


                            
                            <div class="col s12 m5 input-field inline">
                                <select id="txtPrivilegios" class="txtPrivilegios chosen-select browser-default"></select>
                            </div>



                            <div class="col s12 m6 input-field inline">
                                <input placeholder="" type="text" id="txtUsuarioUser"  autocomplete="nope">
                                <label for="txtUsuarioUser">USUARIO</label>
                            </div>
                            <div class="col s12 m6 input-field inline">
                                <input placeholder="" type="text" id="txtContrasenaUser" class="validate">
                                <label for="txtContrasenaUser">CONTRASEÑA</label>
                            </div>

                            <div class="col s4 m12">
                                <label for="txtContrasenaUser">SELECCIONE LOS MODULOS</label>
                            </div>
                             
                             <div class="col s4 m12">
                                <div class="card" id="checkbModul" style="margin: 0px; padding: 0px">
                                    <div class="card-content" style="margin: 10px; padding: 0px">
                                        <div class="row" style="margin: 0px; padding: 0px">
                                            <div class="col s4 m2">
                                               <label>
                                                    <input type="checkbox" id="cbVentas" class="filled-in"/>
                                                    <span style="padding-left: 23px;">Ventas</span>
                                                </label>
                                            </div>
                                            <div class="col s4 m2">
                                               <label>
                                                    <input type="checkbox" id="cbCobros" class="filled-in"/>
                                                    <span style="padding-left: 23px">Cobros</span>
                                                </label>
                                            </div>
                                            <div class="col s4 m2 ">
                                               <label>
                                                    <input type="checkbox" id="cbCompras" class="filled-in"/>
                                                    <span style="padding-left: 23px">Compras</span>
                                                </label>
                                            </div>
                                            <div class="col s4 m2">
                                               <label>
                                                    <input type="checkbox" id="cbSalidas" class="filled-in"/>
                                                    <span style="padding-left: 23px;">salidas</span>
                                                </label>
                                            </div>
                                            <div class="col s4 m2">
                                               <label>
                                                    <input type="checkbox" id="cbCuentas" class="filled-in"/>
                                                    <span style="padding-left: 23px;">Cuentas</span>
                                                </label>
                                            </div>
                                            <div class="col s4 m2">
                                               <label>
                                                    <input type="checkbox" id="cbInventario" class="filled-in"/>
                                                    <span style="padding-left: 23px">Inventario</span>
                                                </label>
                                            </div>
                                            <div class="col s4 m2">
                                               <label>
                                                    <input type="checkbox" id="cbReportes" class="filled-in"/>
                                                    <span style="padding-left: 23px">Reportes</span>
                                                </label>
                                            </div>
                                            <div class="col s4 m2">
                                               <label>
                                                    <input type="checkbox" id="cbControl" class="filled-in"/>
                                                    <span style="padding-left: 23px">Control</span>
                                                </label>
                                            </div>
                                            <div class="col s4 m2">
                                               <label>
                                                    <input type="checkbox" id="cbConfig" class="filled-in"/>
                                                    <span style="padding-left: 23px">Configuración</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
      

                                    
                            <div class="col s12 m3 right" style="margin-top: 10px;">
                             <a href="#!" id="agregarUsuario" style=" width: 100%" class="waves-effect black btn-small"><i class="material-icons left" >add_circle</i>agregar</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="row" >
                            <div class="col s12 m12">
                                <table class="" id="tbUsuarios" style="width:100%">
                                    <thead >
                                        <tr>
                                            <th></th>
                                            <th>NOMBRE</th>
                                            <th>USUARIO</th>
                                            <th>CONTRASEÑA</th>
                                            <th>PRIVILEGIO</th>
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
        </li>
        <li>
            <div class="collapsible-header" style="background-color: black"><i class="material-icons">local_shipping</i><span style="margin-top: 10px; font-weight: bold; color: white">INGRESO DE PROOVEDOR</span></div>
            <div class="collapsible-body">
                <div class="card">
                    <div class="card-content">
                        <div class="row" >
                            <div class="col s12 m3">
                                <div class="row" >


                                    <div class="col s12 m12">
                                        <div class="card" style="margin: 0px; padding: 0px">
                                            <div class="card-content" style="margin: 10px; padding: 0px;width: 100%; height: 100%">
                                                <div class="center row" >
                                                    <div class="col s12 m12">
                                                        <div class="uploaded_image">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col s12 m12">
                                        <form method="post" id="upload_form" align="center" enctype="multipart/form-data">             
                                            <div class="estilo-foto">
                                                <a href="#!" ><i class="material-icons left" style="margin-left: 10px">photo</i><span class="tituloFoto">IMAGEN</span></a>
                                                <input type="file" name="image_file" id="image_file" />
                                            </div>
                                            <input type="submit" name="upload" id="upload" style="display: none" value="Upload" class="btn btn-info" />
                                        </form>
                                    </div>

 
                                </div>
                            </div>
                            <div class="col s12 m9" style="margin: 0px;padding: 0px">
                                <div class="row" style="margin: 0px;padding: 0px">
                                    <div class="col s12 m2 input-field inline">
                                        <input placeholder="" type="text" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" id="txtCodProv" class="validate">
                                        <label for="txtCodProv">CÓDIGO</label>
                                    </div>
                                    <div class="col s12 m5 input-field inline">
                                        <input placeholder="" type="text" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" id="txtNomProv" class="validate">
                                        <label for="txtNomProv">NOMBRE</label>
                                    </div>
                                    <div class="col s12 m5 input-field inline">
                                        <input placeholder="" type="text" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" id="txtDirProd" class="validate">
                                        <label for="txtDirProd">DIRECCIÓN</label>
                                    </div>

                                    <div class="col s12 m2 input-field inline">
                                        <input placeholder="" type="text" id="txtTel1Prov" class="validate" onkeyup="this.value=Numeros(this.value)">
                                        <label for="txtTel1Prov">TELÉFONO 1</label>
                                    </div>
                                    <div class="col s12 m2 input-field inline">
                                        <input placeholder="" type="text"  id="txtTel2Prov" class="validate" onkeyup="this.value=Numeros(this.value)">
                                        <label for="txtTel2Prov">TELÉFONO 2</label>
                                    </div>


                                    <div class="col s12 m2 input-field inline">
                                        <select id="txtPaisProv" class="txtPais chosen-select browser-default"></select>
                                    </div>


                                    <div class="col s12 m2 input-field inline">
                                        <input placeholder="" type="text" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" id="txtEstadoProv" class="validate">
                                        <label for="txtEstadoProv">ESTADO</label>
                                    </div>
                                    <div class="col s12 m2 input-field inline">
                                        <input placeholder="" type="text" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" id="txtCiudadProv" class="validate">
                                        <label for="txtCiudadProv">CIUDAD</label>
                                    </div>
                                    <div class="col s12 m2 input-field inline">
                                        <input placeholder="" type="text" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" id="txtCodZipProv" class="validate">
                                        <label for="txtCodZipProv">COD. ZIP</label>
                                    </div>
                                    <div class="col s12 m3 input-field inline">
                                        <input placeholder="" type="text" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toLowerCase(); this.setSelectionRange(start, end);" id="txtEmailProv">
                                        <label for="txtEmailProv">EMAIL</label>
                                    </div>
                                    <div class="col s12 m3 input-field inline">
                                        <input placeholder="" type="url" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toLowerCase(); this.setSelectionRange(start, end);" id="txtSitioWebProv" class="validate">
                                        <label for="txtSitioWebProv">SITIO WEB</label>
                                    </div>
                                    <div class="col s12 m6 input-field inline">
                                        <input placeholder="" type="text" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" id="txtNomContProv"  class="validate">
                                        <label for="txtNomContProv">CONTACTO</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m3 right" style="margin-top: 10px;">
                             <a href="#!" id="agregarProv" style=" width: 100%" class="waves-effect black btn-small"><i class="material-icons left" >add_circle</i>agregar</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="row" >
                            <div class="col s12 m12">
                                <table class="table striped RobotoR" id="tbProveedor" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>CODIGO</th>
                                            <th>NOMBRE</th>
                                            <th>PAIS</th>
                                            <th>TELEFONO</th>
                                            <th>EMAIL</th>
                                            <th>CONTACTO</th>
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
        </li>
        <li>
            <div class="collapsible-header"  style="background-color: black"><i class="material-icons">add_box</i><span style="margin-top: 10px; font-weight: bold; color: white">INGRESO DE PRODUCTO</span></div>
            <div class="collapsible-body">
              
                <div class="card">
                    <div class="card-content">
                        <div class="row" >
                            <div class="col s12 m3">
                                <div class="row">



                                    <div class="col s12 m12">
                                        <div class="card" style="margin: 0px; padding: 0px">
                                            <div class="card-content" style="margin: 10px; padding: 0px;width: 100%; height: 100%">
                                                <div class="center row" >
                                                    <div class="col s12 m12">
                                                        <div class="uploaded_image2">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col s12 m12">
                                        <form method="post" id="upload_form2" align="center" enctype="multipart/form-data">             
                                            <div class="estilo-foto">
                                                <a href="#!" ><i class="material-icons left" style="margin-left: 10px">photo</i><span class="tituloFoto">IMAGEN</span></a>
                                                <input type="file" name="image_file2" id="image_file2" />
                                            </div>
                                            <input type="submit" name="upload2" id="upload2" style="display: none" value="Upload2" class="btn btn-info" />
                                        </form>
                                    </div>



                                </div>
                            </div>
                            <div class="col s12 m9" style="margin: 0px;padding: 0px">
                                <div class="row" style="margin: 0px;padding: 0px">

                                    <div class="col s12 m4 input-field inline">
                                        <input placeholder="" type="text" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" id="txtCodProd" type="text" class="validate">
                                        <label for="txtCodProd">CÓDIGO</label>
                                    </div>

                                    <div class="col s12 m4 input-field inline">
                                        <input placeholder="" type="text" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" id="txtNomProd" type="text" class="validate">
                                        <label for="txtNomProd">NOMBRE</label>
                                    </div>

                                    <div class="col s12 m4 input-field inline">
                                        <select id="txtCodProvProd" class="txtCodProve chosen-select browser-default"></select>
                                    </div>

                                    <div class="col s12 m4 input-field inline">
                                        <input placeholder="" type="text" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" id="txtMarcaProd" type="text" class="validate">
                                        <label for="txtMarcaProd">MARCA</label>
                                    </div>

                                    <div class="col s12 m8 input-field inline">
                                        <input placeholder="" type="text" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" id="txtDescProd" type="text" class="validate">
                                        <label for="txtDescProd">DESCRIPCIÓN</label>
                                    </div>
                                    <div class="col s12 m4 input-field inline">
                                        <input placeholder="" type="text" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" id="txtEnvaseProd" type="text" class="validate">
                                        <label for="txtEnvaseProd">ENVASE</label>
                                    </div>
                                    <div class="col s12 m4 input-field inline">
                                        <input placeholder="" type="number"  id="txtPresentProd" type="text" class="validate">
                                        <label for="txtPresentProd">PRESENTACIÓN</label>
                                    </div>

                                      <div class="col s12 m4 input-field inline">
                                        <select id="txtUMedidaProd" class="txtUMedida chosen-select browser-default"></select>
                                    </div>

                                    
                                </div>
                            </div>
                            <div class="col s12 m3 right" style="margin-top: 10px;">
                             <a href="#!" id="agregarProd" style=" width: 100%" class="waves-effect black btn-small"><i class="material-icons left" >add_circle</i>agregar</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="row" >
                            <div class="col s12 m12">
                                <table class="table striped RobotoR" id="tbProducto" style="width:100%">
                                    <thead style="display: none;">
                                        <tr>
                                            <th></th>
                                            <th>CODIGO</th>
                                            <th>NOMBRE</th>
                                            <th>MARCA</th>
                                            <th>PRESENTACION</th>
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
        </li>
        <li>
            <div class="collapsible-header"  style="background-color: black"><i class="material-icons">store</i><span style="margin-top: 10px; font-weight: bold; color: white">INGRESO DE CLIENTE</span></div>
            <div class="collapsible-body">
          
                <div class="card">
                    <div class="card-content">
                        <div class="row" >
                            <div style="margin-bottom: 15px; margin-bottom: 0px"  class="col s12 m12 separador">
                                
                            </div>
                          
                            <div class="col s12 m12" style="background-color: #59BA47">
                                <span style="color: white; font-weight: bold">DATOS PERSONALES</span>
                            </div>

                            <div class="col s12 m12 separador" style="margin-bottom: 15px">
                                
                            </div>
                            <div >
                                <div  class="col s12 m3">
                                    <div class="row">



                                        <div class="col s12 m12">
                                            <div class="card" style="margin: 0px; padding: 0px">
                                                <div class="card-content" style="margin: 10px; padding: 0px;width: 100%; height: 100%">
                                                    <div class="center row" >
                                                        <div class="col s12 m12">
                                                            <div class="uploaded_image3">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col s12 m12">
                                            <form method="post" id="upload_form3" align="center" enctype="multipart/form-data">             
                                                <div class="estilo-foto">
                                                    <a href="#!" ><i class="material-icons left" style="margin-left: 10px">photo</i><span class="tituloFoto">IMAGEN</span></a>
                                                    <input type="file" name="image_file3" id="image_file3" />
                                                </div>
                                                <input type="submit" name="upload3" id="uploa3" style="display: none" value="Upload3" class="btn btn-info" />
                                            </form>
                                        </div>



                                    </div>
                                </div>
                                <div class="col s12 m9" style="margin: 0px;padding: 0px">
                                    <div class="row" style="margin: 0px;padding: 0px">

                                        <div class="col s12 m2 input-field inline">
                                            <input placeholder="" type="text" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" id="txtCodClte" type="text" class="validate">
                                            <label for="txtCodClte">CÓDIGO</label>
                                        </div>

                                        <div class="col s12 m5 input-field inline">
                                            <input placeholder="" type="text" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" id="txtNomClte" type="text" class="validate">
                                            <label for="txtNomClte">NOMBRE</label>
                                        </div>
                                        <div class="col s12 m5 input-field inline">
                                            <input placeholder="" type="text" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" id="txtApellidoClte" type="text" class="validate">
                                            <label for="txtApellidoClte">APELLIDO</label>
                                        </div>
                                        <div class="col s12 m2 input-field inline">
                                            <select id="txtSexoClte" class="chosen-select browser-default">
                                                <option value="SEXO">Sexo...</option>
                                                <option value="F">Femenino</option>
                                                <option value="M">Masculino</option>
                                            </select>
                                        </div>
                                         <div class="col s12 m4 input-field inline">
                                            <input placeholder="" type="text" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" id="txtNumCedulaClte" type="text" class="validate">
                                            <label for="txtNumCedulaClte">N° CEDULA</label>
                                        </div>
                                        <div class="col s12 m4 input-field inline">
                                            <input placeholder="" type="text" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" id="txtEmailClte" type="text" class="validate">
                                            <label for="txtEmailClte">EMAIL</label>
                                        </div>
                                        <div class="col s12 m2 input-field inline">
                                            <select id="txtTipoClte" class="chosen-select browser-default">
                                                <option value="TIPO">Tipo cliente...</option>
                                                <option>A</option>
                                                <option>B</option>
                                                <option>C</option>
                                                <option>D</option>
                                            </select>
                                        </div>
                                        <div class="col s12 m5 input-field inline">
                                            <input placeholder="" type="text" id="txtCelClte" type="text" class="validate" onkeyup="this.value=Numeros(this.value)">
                                            <label for="txtCelClte">TELEFONO CELULAR</label>
                                        </div>
                                         <div class="col s12 m5 input-field inline">
                                            <input placeholder="" type="text" onkeyup="this.value=Numeros(this.value)" id="txtTelClte">
                                            <label for="txtTelClte">TELEFONO CASA</label>
                                        </div>
                                    
                                        <div class="col s12 m2 input-field inline">
                                            <select id="txtCiudadClte" class="txtCiudad chosen-select browser-default">
                                            </select>
                                        </div>

                                        <div class="col s12 m12 input-field inline">
                                            <input placeholder="" type="text" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" id="txtDireccionClte" type="text" class="validate">
                                            <label for="txtDireccionClte">DIRECCIÓN PERSONAL</label>
                                        </div>
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                   
                
                        <div class="row" >

                            <div style="margin-bottom: 15px; margin-bottom: 0px"  class="col s12 m12 separador">
                            </div>
                            <div class="col s12 m12" style="background-color: #59BA47">
                                <span style="color: white; font-weight: bold">DATOS DEL LOCAL</span>
                            </div>

                            <div class="col s12 m12 separador" style="margin-bottom: 15px">
                             </div>
                            <div class="col s12 m3">
                                <div class="row">
                                    <div class="col s12 m12">
                                        <div class="card" style="margin: 0px; padding: 0px">
                                            <div class="card-content" style="margin: 10px; padding: 0px;width: 100%; height: 100%">
                                                <div class="center row" >
                                                    <div class="col s12 m12">
                                                        <div class="uploaded_image4">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col s12 m12">
                                        <form method="post" id="upload_form4" align="center" enctype="multipart/form-data">             
                                            <div class="estilo-foto">
                                                <a href="#!" ><i class="material-icons left" style="margin-left: 10px">photo</i><span class="tituloFoto">IMAGEN</span></a>
                                                <input type="file" name="image_file4" id="image_file4" />
                                            </div>
                                            <input type="submit" name="upload4" id="uploa4" style="display: none" value="Upload4" class="btn btn-info" />
                                        </form>
                                    </div>

                                </div>
                            </div>
                            <div class="col s12 m9" style="margin: 0px;padding: 0px">
                                <div class="row" style="margin: 0px;padding: 0px">

                                    <div class="col s12 m5 input-field inline">
                                        <input placeholder="" type="text" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" id="txtNomLocal" type="text" class="validate">
                                        <label for="txtNomLocal">NOMBRE</label>
                                    </div>

                                    <div class="col s12 m3 input-field inline">
                                        <select id="txtZonaLocal" class="txtZona chosen-select browser-default"></select>
                                    </div>


                                    <div class="col s12 m4 input-field inline">
                                        <select id="txtGiroLcal" class="chosen-select browser-default">
                                            <option value="GIRO">Giro local...</option>
                                            <option value="SB">Sala de Belleza</option>
                                            <option value="BS">Suplidores</option>
                                            <option value="DT">Distribudiras</option>
                                            <option value="CD">Co-Distribuidor</option>
                                            <option value="CE">Cliente Especial</option>
                                        </select>
                                    </div>

                                    <div class="col s12 m4 input-field inline">
                                        <input placeholder="" type="text" onkeyup="this.value=Numeros(this.value)" id="txtTelLocal">
                                        <label for="txtTelLocal">TELEFONO LOCAL</label>
                                    </div>

                                    <div class="col s12 m4 input-field inline">
                                        <select id="txtDepaLocal" class="txtDepa chosen-select browser-default"></select>
                                    </div>

                                    <div class="col s12 m4 input-field inline">
                                        <select id="txtCiudadLocal" class="txtCiudad chosen-select browser-default"></select>
                                    </div>

                                  
                                    <div class="col s12 m12 input-field inline">
                                        <input placeholder="" type="text"  id="txtDirLocal" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" class="validate">
                                        <label for="txtDirLocal">DIRECCIÓN</label>
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="col s12 m3 right" style="margin-top: 10px;">
                                <a href="#!" id="agregarCliente" style=" width: 100%" class="waves-effect black btn-small"><i class="material-icons left" >add_circle</i>agregar</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="row" >
                            <div class="col s12 m12">
                                <table class="table striped RobotoR" id="tbCliente" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>CODIGO</th>
                                            <th>NOMBRE</th>
                                            <th>TIPO</th>
                                            <th>LOCAL</th>
                                            <th>ZONA</th>
                                            <th>CIUDAD LOCAL</th>
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
        </li>
    </ul>
</main>

	

    
   

    
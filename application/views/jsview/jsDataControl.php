<script>
$(document).ready(function() {

	$("#asignarZonaVendedor").css("display", "none");
	$(".vehiculoPerVent").css("display", "none");
	inicializaControlFecha();
	$('.collapsible').collapsible();
	$("#txtNumCedulaClte").mask('000-000000-0000A');
	$("#txtNumCedulaPer").mask('000-000000-0000A');

    $('.uploaded_image + img').remove();
    $('.uploaded_image').after('<img src="../assets/img/suitcase.svg" id="PrevImg"/>');

    $('.uploaded_image2 + img').remove();
    $('.uploaded_image2').after('<img src="../assets/img/product.svg" id="PrevImg2"/>');

    $('.uploaded_image3 + img').remove();
    $('.uploaded_image3').after('<img src="../assets/img/specialist-user.svg" id="PrevImg3"/>');

    $('.uploaded_image4 + img').remove();
    $('.uploaded_image4').after('<img src="../assets/img/store.svg" id="PrevImg4"/>');

    $('.uploaded_image5 + img').remove();
    $('.uploaded_image5').after('<img src="../assets/img/vendedor.svg" id="PrevImg5" class="circle"/>');

    $('.uploaded_image6 + img').remove();
    $('.uploaded_image6').after('<img src="../assets/img/personal.svg" id="PrevImg6" class="circle"/>');

    $('.uploaded_image7 + img').remove();
    $('.uploaded_image7').after('<img src="../assets/img/car_icon.svg" id="PrevImg7" class="circle"/>');

    $('.uploaded_image8 + img').remove();
    $('.uploaded_image8').after('<img src="../assets/img/car_card.svg" id="PrevImg8" class="circle"/>');

      $('.uploaded_image9 + img').remove();
    $('.uploaded_image9').after('<img src="../assets/img/car_card.svg" id="PrevImg9" class="circle"/>');


   //CARGANDO LOS SELECT
   listandoPais();
    listandoProveedor();
    listandoUmedida();
    listandoDepartamento();
    listandoCiudad();
    listandoZona();
	listandoSubZona();
    listandoAreaLAboral();
    listandoCargoLaboral();
    listandoPersonal();
    listandoPrivilegios();
    listandoTipoVehiculo();
    $(".carroceriaVehiculo").append('<option value="0">Carroceria...</option>');

    llenarDtPersonal();
    llenarDtUsuario();
    llenarDtProveedor();
    llenarDtProducto();
    llenarDtCliente();


   

});

























//DESDE AQUI PROGRAMACION PARA VER E INGRESAR PERSONAL



	$("#agregarPersonal").on("click", function(e){

		var idPer;
		var nomPer = $("#txtNomPer").val();
		var apePer = $("#txtApePer").val();
		var fNacPer = $("#txtFNacPer").val();
		var nacionalidadPer = $("#txtNacionPer").val();
		var sexoPer = $("#txtSexoPer option:selected").val();
		var nCeduPer = $("#txtNumCedulaPer").val();
		var emailPer = $("#txtEmailPer").val();
		var telCasaPer = $("#txtTelCasaPer").val();
		var celPer = $("#txtTelMovilPer").val();
		var areaPer = $("#txtArea option:selected").html();
		var cargoPer = $("#txtCargo option:selected").html();
		var depaPer = $("#txtDepaPer option:selected").html();
		var ciuPer = $("#txtCiudadPer option:selected").html();
		var dirPer = $("#txtDirPer").val();

		var areaVal = $("#txtArea option:selected").val();
		var zonaVal = $("#txtZonaVendedor option:selected").val();
		var numCirculacion = $("#txtNumCircuVehiculo").val();
		var numPlaca = $("#txtNumPlacaVehiculo").val();
		var numChasis = $("#txtNumChasisVehiculo").val();
		var numMotor = $("#txtNumMotorVehiculo").val();
		var tipoVehiculo = $("#txtTipoVehiculo option:selected").val();
		var carroceriaVehic = $("#txtCarroceriaVehiculo option:selected").val();
		var colorVehiculo = $("#txtColorVehiculo").val();
		var marcaVehiculo = $("#txtMarcaVehiculo").val();
		var modeloVehiculo = $("#txtModeloVehiculo").val();
		var annoVehiculo = $("#txtAnnoVehiculo").val();
		var cilindrajeVehiculo = $("#txtCilindM3Vehiculo").val();
		var numCilindroVehiculo = $("#txtNumCilindVehiculo").val();
		

		var urlRouter="";
		var formulario;
		var urlImg="../assets/img/vendedor.svg";

		e.preventDefault();

		if(nomPer==""){
			Materialize.toast("El campo nombre se encuentra vacio", 4000, 'rounded');
		}  else if(apePer==""){
			Materialize.toast("El campo apellido se encuentra vacio", 4000, 'rounded');
		} else if(fNacPer==""){
			Materialize.toast("El campo nacimiento se encuentra vacio", 4000, 'rounded');
		} else if(nacionalidadPer==""){
			Materialize.toast("El campo nacionalidad se encuentra vacio", 4000, 'rounded');
		} else if(sexoPer=="Sexo..."){
			Materialize.toast("Seleccione el sexo del personal", 4000, 'rounded');
		}else if(nCeduPer=="" || nCeduPer.length < 16 || nCeduPer.length > 16){
			Materialize.toast("El campo cedula se encuentra vacio", 4000, 'rounded');
		} else if(telCasaPer=="" && celPer==""){
			 Materialize.toast("Agregue al meno el numero de telefono de casa o movil", 4000, 'rounded');
		}else if(areaPer=="Area..."){
			 Materialize.toast("Seleccione el área del personal", 4000, 'rounded');
		}else if(cargoPer=="Cargo..."){
			 Materialize.toast("Seleccione el cargo del personal", 4000, 'rounded');
		}else if(depaPer=="Departamento..."){
			 Materialize.toast("Seleccione el departamento del personal", 4000, 'rounded');
		}else if(ciuPer=="Ciudad..."){
			 Materialize.toast("ESeleccione la ciudad del personal", 4000, 'rounded');
		}else if(dirPer==""){
			 Materialize.toast("El campo dirección se encuentra vacio", 4000, 'rounded');
		}else if(areaVal =="1" && zonaVal == "ZONA"){
			 Materialize.toast("Asigne una zona al vendedor", 4000, 'rounded');
		}else if($("#cbVehiculoSi").is(":checked") && numCirculacion == ""){
			 Materialize.toast("Ingrese el número de circulación del vehiculo", 4000, 'rounded');
		}else if($("#cbVehiculoSi").is(":checked") && numPlaca == ""){
			 Materialize.toast("Ingrese el número de placa del vehiculo", 4000, 'rounded');
		}else if($("#cbVehiculoSi").is(":checked") && numChasis == ""){
			 Materialize.toast("Ingrese el número de chasis del vehiculo", 4000, 'rounded');
		}else if($("#cbVehiculoSi").is(":checked") && numMotor == ""){
			 Materialize.toast("Ingrese el número de motor del vehiculo", 4000, 'rounded');
		}else if($("#cbVehiculoSi").is(":checked") && tipoVehiculo == "0"){
			 Materialize.toast("Seleccione el tipo de vehiculo", 4000, 'rounded');
		}else if($("#cbVehiculoSi").is(":checked") && carroceriaVehic == "0"){
			 Materialize.toast("Seleccione la carroceria del vehiculo", 4000, 'rounded');
		}else if($("#cbVehiculoSi").is(":checked") && colorVehiculo == ""){
			 Materialize.toast("Ingrese el color del vehiculo", 4000, 'rounded');
		}else if($("#cbVehiculoSi").is(":checked") && marcaVehiculo == ""){
			 Materialize.toast("Ingrese la marca del vehiculo", 4000, 'rounded');
		}else if($("#cbVehiculoSi").is(":checked") && modeloVehiculo == ""){
			 Materialize.toast("Ingrese el modelo del vehiculo", 4000, 'rounded');
		}else if($("#cbVehiculoSi").is(":checked") && annoVehiculo == ""){
			 Materialize.toast("Ingrese el año de fabrica del vehiculo", 4000, 'rounded');
		}else if($("#cbVehiculoSi").is(":checked") && cilindrajeVehiculo == ""){
			 Materialize.toast("Ingrese el cilindraje en cc del motor del vehiculo", 4000, 'rounded');
		}else if($("#cbVehiculoSi").is(":checked") && numCilindroVehiculo == ""){
			 Materialize.toast("Ingrese el número de cilindros del motor del vehiculo", 4000, 'rounded');
		}else if (addCodAutomaticoPer()=="DP1000"){
			swal({
			 	"title":"Ha llegado al limite de usuarios, pongase en contacto con el Desarrollador",
	            "text":"Ultimo usuario agregado es el DP999",
	            "type":"warning",
	    		"confirmButtonText":"ACEPTAR",
	       		allowOutsideClick:false
    		});

		}else
		{


			
			idPer = addCodAutomaticoPer();
			

			if($('#image_file5').val() == '')
			{

				swal({
					"title":"No ha agregado imagen",
	                "text":"Esta seguro que no desea agregara imágen?",
	                "type":"warning",
	                showCancelButton: true,
	                "confirmButtonColor": '#3085d6',
	                "cancelButtonText": "CANCELAR",
	                 "cancelButtonColor": '#d33',
	                "confirmButtonText": "Si, seguro",
               		allowOutsideClick:false
        		}).then(function(){
	            		
    			guardarNuevoPersonal(urlImg, idPer);
	            }, function(dismiss){
        			if (dismiss === 'cancel' || dismiss === 'close') {
					    swal({
		                "text":"Cancelado.",
		                "type":"error",
	            		"confirmButtonText":"ACEPTAR",
	               		allowOutsideClick:false
	            		});
					 } 
	            		

        		});
	            	
			}
			else
			{

				urlRouter = "guaradar_imagen_personal";
				formulario = "#upload_form5";
				urlImg ="";
				urlImg = subirImagen(urlRouter, formulario);
				console.log("URL2: "+urlImg);
				if (urlImg!=""){
					guardarNuevoPersonal(urlImg, idPer);
				}else{
					
					swal({
		                "text":"VUelva a seleccionar una imagen.",
		                "type":"error",
	            		"confirmButtonText":"ACEPTAR",
	               		allowOutsideClick:false
	            	});

				}
	                   
			}
			
		}
	});



	$('#txtArea').change(function() {

		var value = $("#txtArea option:selected").val();
		$('#result').append(value);
		if(value !=1){
		$("#asignarZonaVendedor").css("display", "none");
		}else{
			$("#asignarZonaVendedor").css("display", "block");
		}
	 
	});

	$('#txtTipoVehiculo').change(function() {

		var value = $("#txtTipoVehiculo option:selected").val();
		$('#result').append(value);
		if(value ==0){
			 $("#txtCarroceriaVehiculo option:selected").val("0");
		}else{
			listandoCarroceriaVehiculo(value);
		}
	 
	});
	
	$('#cbVehiculoSi').change(function() {
        $(".vehiculoPerVent").css("display", "block");
	});

	$('#cbVehiculoNo').change(function() {
        $(".vehiculoPerVent").css("display", "none");
	});



	function addCodAutomaticoPer(){
		var idUser;
		var result=0;

		$.ajax({
			url:"obtenerUltimoCodPerAgregado",
			method:"POST",
			cache: false,
			async: false,
			success:function(res){
				var e = JSON.parse(res);
		        
		        var DP = e[0].prefijo;
		        var num = e[0].ultimoIntAsignado.split("");

		        if(num[0] == 0 && num[1] == 0 && num[2] == 0){
		        	result = num[0]+num[1]+num[2];
		        }else if(num[0] == 0 && num[1] == 0 && num[2] > 0 ){
		        	var unidad =  num[2];
		        	if(unidad==9){
		        		result = num[0]+(parseInt(unidad)+1);
		        	}else{
		        		result = num[0]+num[1]+(parseInt(unidad)+1);
		        	}
		        	
		        	

		        }else if(num[0] == 0 && num[1] > 0){
		        	var val1 =  num[1];
		        	var val2 = num[2];
		        	var decima =  num[1]+num[2];
		        	if(decima==99){
		        		result = (parseInt(decima)+1);
		        	}else{
		        		result = num[0]+(parseInt(decima)+1);
		        	}



		        }else if(num[0] > 0){
		        	var val1 =  num[0];
		        	var val2 = num[1];
		        	var val3 = num[2];
		        	var centena =  num[0]+num[1]+num[2];

		        	if(centena==999){
		        		
		        		 result = parseInt(centena)+1;
		        	}else{
		        		result = (parseInt(centena)+1);
		        	}
		        	

		        }
		        
		        idUser = "DP"+result;
			}
		});

		return idUser;
		
	}

	function actualizarUltimoCodPerAgregado(idPer){
		var splitNum = idPer.split("");
		var unirNum =splitNum[2]+splitNum[3]+splitNum[4];
		console.log("idper: "+unirNum);
		var number ={ 
			number: unirNum
		};
		console.log(number);

		$.ajax({
			url:"actualizarUltimoCodPerAgregado", 
			method:"POST",
			cache: false,
			async: false,
			data:number
		});
	}


	function guardarNuevoPersonal(urlImg, idPer){

		var nomPer = $("#txtNomPer").val();
		var apePer = $("#txtApePer").val();
		var fechaNacimieno = $("#txtFNacPer").val();
		var nacionalidadPer = $("#txtNacionPer").val();
		var sexoPer = $("#txtSexoPer option:selected").val();
		var nCeduPer = $("#txtNumCedulaPer").val();
		var emailPer = $("#txtEmailPer").val();
		var telCasaPer = $("#txtTelCasaPer").val();
		var celPer = $("#txtTelMovilPer").val();
		var areaPer = $("#txtArea option:selected").html();
		var cargoPer = $("#txtCargo option:selected").html();
		var depaPer = $("#txtDepaPer option:selected").html();
		var ciuPer = $("#txtCiudadPer option:selected").html();
		var dirPer = $("#txtDirPer").val();

		var areaVal = $("#txtArea option:selected").val();
		var zonaVal = $("#txtZonaVendedor option:selected").val();
		var numCirculacion = $("#txtNumCircuVehiculo").val();
		var numPlaca = $("#txtNumPlacaVehiculo").val();
		var numChasis = $("#txtNumChasisVehiculo").val();
		var numMotor = $("#txtNumMotorVehiculo").val();
		var tipoVehiculo = $("#txtTipoVehiculo option:selected").html();
		var carroceriaVehic = $("#txtCarroceriaVehiculo option:selected").html();
		var colorVehiculo = $("#txtColorVehiculo").val();
		var marcaVehiculo = $("#txtMarcaVehiculo").val();
		var modeloVehiculo = $("#txtModeloVehiculo").val();
		var annoVehiculo = $("#txtAnnoVehiculo").val();
		var cilindrajeVehiculo = $("#txtCilindM3Vehiculo").val();
		var numCilindroVehiculo = $("#txtNumCilindVehiculo").val();


		var urlImgVehiculo="../assets/img/car_icon.svg";
		var urlImgCirc1="../assets/img/car_card.svg";
		var urlImgCirc2="../assets/img/car_card.svg";
		var estadoPer = 1;

		var esVendedor = false;
		var tieneVehiculo = false;

		//pasar fecha a formato de MySql
		var fechaNAcPerSplit = fechaNacimieno.split('-');
    	var fNacPer = fechaNAcPerSplit[2]+"-"+fechaNAcPerSplit[1]+"-"+fechaNAcPerSplit[0];

    	if(areaVal == 1){
    		esVendedor= true;
    	}else{
    		esVendedor= false;

    	}

    	if($("#cbVehiculoSi").is(":checked")){
    		tieneVehiculo = true;
    	}else{
    		tieneVehiculo = false;
    	}

    	
  
    	//crando arreglo para pasar info por ajax
		var data_form={
			idPer:idPer,
			urlPer:urlImg,
			nomPer:nomPer,
			apePer:apePer,
			fNacPer:fNacPer,
			nacionalidadPer:nacionalidadPer,
			sexoPer:sexoPer,
			nCeduPer:nCeduPer,
			emailPer:emailPer,
			telCasaPer:telCasaPer,
			celPer:celPer,
			areaPer:areaPer,
			cargoPer:cargoPer,
			depaPer:depaPer,
			ciuPer:ciuPer,
			dirPer:dirPer,
			estadoPer:estadoPer,
			id_ruta_zona: zonaVal,
			urlFotoVehiculo: urlImgVehiculo,
			urlCirculacion1: urlImgCirc1,
			urlCirculacion2: urlImgCirc1,
			numCirculacion: numCirculacion,
			numPlacaVehiculo: numPlaca,
			numChasisVehiculo: numChasis,
			numMotorVehiculo: numMotor,
			tipoVehiculo: tipoVehiculo,
			carroseriaVehiculo: carroceriaVehic,
			colorVehiculo: colorVehiculo,
			marcaVehiculo: marcaVehiculo,
			modelVehiculo: modeloVehiculo,
			anoVehiculo: annoVehiculo,
			cilindrajeVehiculoCm3: cilindrajeVehiculo,
			numCIlindroVehiculo: numCilindroVehiculo
		};

		console.log(data_form);

		$.ajax({
			url:"guardarNuevoPersonal", 
			method:"POST",
			cache: false,
			data:data_form,
			success:function(data)
			{

				if(data==1){


				if(esVendedor==true && tieneVehiculo == false){
					AgregarRutaVendedor(data_form);
				}else if(esVendedor==false && tieneVehiculo == true){
					AgregarVehiculoPersonal(data_form);
				}else if(esVendedor==true && tieneVehiculo == true){
					AgregarRutaVendedor(data_form);
					AgregarVehiculoPersonal(data_form);
				}
					
					
					actualizarUltimoCodPerAgregado(idPer);
					swal({
		                "text":"Datos guardados",
		                "type":"success",
		                "confirmButtonText":"ACEPTAR",
	               		allowOutsideClick:false
	            	});

	            	$("#txtNomPer").val("");
					$("#txtApePer").val("");
					$("#txtFNacPer").val("");
					$("#txtNacionPer").val("");
					$("#txtSexoPer").val("SEXO");
					$("#txtNumCedulaPer").val("");
					$("#txtEmailPer").val("");
					$("#txtTelCasaPer").val("");
					$("#txtTelMovilPer").val("");
					$("#txtDirPer").val("");
					$(".txtDepa").val("DEPARTAMENTO");
					$(".txtCiudad").val("CIUDAD");
					$(".txtArea").val("AREA");
					$(".txtCargo").val("CARGO");
					$("#txtZonaVendedor option:selected").val("ZONA");
					$("#txtNumCircuVehiculo").val("");
					$("#txtNumPlacaVehiculo").val("");
					$("#txtNumChasisVehiculo").val("");
					$("#txtNumMotorVehiculo").val("");
					$("#txtTipoVehiculo option:selected").val();
					$(".carroceriaVehiculo").append('<option value="0">Carroceria...</option>');
					$("#txtColorVehiculo").val("");
					$("#txtMarcaVehiculo").val("");
					$("#txtModeloVehiculo").val("");
					$("#txtAnnoVehiculo").val("");
					$("#txtCilindM3Vehiculo").val("");
					$("#txtNumCilindVehiculo").val("");

					$('#image_file5').val();
				    $('.uploaded_image5 + img').remove();
				    $('.uploaded_image5').after('<img src="../assets/img/vendedor.svg" id="PrevImg5"/>');

				    $('#image_file7').val();
				    $('.uploaded_image7 + img').remove();
				    $('.uploaded_image7').after('<img src="../assets/img/car_icon.svg" id="PrevImg7"/>');

				    $('#image_file8').val();
				    $('.uploaded_image8 + img').remove();
				    $('.uploaded_image8').after('<img src="../assets/img/car_card.svg" id="PrevImg8"/>');

				    $('#image_file9').val();
				    $('.uploaded_image9 + img').remove();
				    $('.uploaded_image9').after('<img src="../assets/img/car_card.svg" id="PrevImg9"/>');

				    llenarDtPersonal();
    


				

				}else{
					swal({
		                "text":"Hubo un error, no se pudieron guardar los datos",
		                "type":"error",
		                "confirmButtonText":"ACEPTAR",
	               		allowOutsideClick:false
	            	});
				}

			}

		});
	}



function AgregarRutaVendedor(data_form){
		$.ajax({
			url:"AgregarRutaVendedor", 
			method:"POST",
			cache: false,
			data:data_form
		});
	}


	function AgregarVehiculoPersonal(data_form){
		$.ajax({
			url:"AgregarVehiculoPersonal", 
			method:"POST",
			cache: false,
			data:data_form
		});
	}



function llenarDtPersonal(){
	Objtable = $("#tbPersonal").DataTable();
	Objtable.rows().remove().draw( false ); 

	$.ajax({
        url:"llenarDtPersonal",
        type:"post",
        async: true,
         success:
         function(json){

		 	var e = JSON.parse(json);
		 	var estado;

            for (f=0;f<e.results.length;f++){

            	if(e.results[f].estadoPer == 1){
		 		estado = "Activo";
		 	}else{
		 		estado = "Baja";
		 	}
                Objtable.row.add( [
                	'<img src="'+e.results[f].urlPer+'" style="width:50px; height:45px" class="circle" id="imgDtPersonal">',
                    e.results[f].idPer,
                    e.results[f].nomPer+" "+e.results[f].apePer,
                    e.results[f].areaPer,                      
                    e.results[f].cargoPer,
                    e.results[f].ciuPer,
                    estado,	                
                    '<center><a href="#!" id="btnVerPer" style="background-color:black" class="btn-floating btn-small waves-effect waves-light noHover modal-trigger"><i class="material-icons">&#xE417;</i></a>'
                ] ).draw( false )
            }
        }
    })

}


function filePreview5(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('.uploaded_image5 + img').remove();
            $('.uploaded_image5').after('<img src="'+e.target.result+'" id="PrevImg5"/>');
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$("#image_file5").change(function () {
    filePreview5(this);
});



//TERMINA PROGRAMACION PARA PERSONAL
































//DESDE AQUI PROGRAMACION PARA VER E INGRESAR USUARIOS



$("#agregarUsuario").on("click", function(e){
	var idPer = $("#txtNomPerson  option:selected").val();
	var idPrivi = $("#txtPrivilegios option:selected").val();
	var nomUser = $("#txtUsuarioUser").val();
	var passUser = $("#txtContrasenaUser").val();
	var estadoUser = 1;


	var	venta = "";
	var	cobro = ""; 
	var	compra = "";
	var salidas = "";
	var cuentas = "";
	var	inventario = "";
	var	reportes = "";
	var	datacontrol = "";
	var config = "";

	if($("#cbVentas").is(':checked')){
		venta="ventas";
	}
	
	if($("#cbCobros").is(':checked')){
		var	cobro = "cobro"; 
	}

	if($("#cbCompras").is(':checked')){
		var	compra = "compra";
	}

	if($("#cbSalidas").is(':checked')){
		var salidas = "salidas";
	}

	if($("#cbCuentas").is(':checked')){
		var cuentas = "cuentas";
	}

	if($("#cbInventario").is(':checked')){
		var	inventario = "inventario";
	}

	if($("#cbReportes").is(':checked')){
		
		var	reportes = "reportes";
	}

	if($("#cbControl").is(':checked')){
		
		var	datacontrol = "datacontrol";
	}

	if($("#cbConfig").is(':checked')){
		var config = "config";
	}
	

	var data_form={
		idPer :idPer,
		privi :idPrivi,
		nomUser :nomUser,
		passUser :passUser,
		estadoUser :estadoUser,
		venta:venta,
		cobro:cobro,
		compra:compra,
		salidas:salidas,
		cuentas:cuentas,
		inventario:inventario,
		reportes:reportes,
		datacontrol:datacontrol,
		config:config
	};

	if(idPer=="PERSONA"){
		Materialize.toast("Seleccione un nombre del personal activo", 4000, 'rounded');
	}else if(idPrivi=="PRIVILEGIOS"){
		Materialize.toast("Seleccione privilegio para el ususario", 4000, 'rounded');
	}else if(nomUser==""){
		Materialize.toast("El campo usuario se encuentra vacio", 4000, 'rounded');
	}else if(passUser=="") {
		Materialize.toast("El campo contraseña se encuentra vacio", 4000, 'rounded');
	}else if(passUser.length < 6 || passUser.length > 11){
		Materialize.toast("El campo contraseña debe contener de 6 a 10 caracteres", 4000, 'rounded');
	}else if(venta == false && cobro == false && compra == false && inventario  == false && reportes == false && datacontrol == false){

		Materialize.toast("Asigne al menos un modulo al usuario", 4000, 'rounded');

	}else if(validaeNomPersonal(idPer)){
		Materialize.toast("El personal selecccionado ya tiene un usuario asignado", 4000, 'rounded');
	}else if(validarNomUsuario(nomUser)){
		Materialize.toast("El nombre de Usuario se encuentra asignado, ingrese otro diferente", 4000, 'rounded');
	}
	else{


		$.ajax({
			url:"guardarNuevoUsuarioYpermisos",
			type:"POST",
			data:data_form,
			async:false,
			success:function(res)
			{
				llenarDtUsuario();

				swal({
					"title":"Usuario creado!",
	                "text":"Ha creado el nuevo usuario con exito",
	                "type":"success",
	                "confirmButtonColor": '#3085d6',
	                "confirmButtonText": "Ok",
               		allowOutsideClick:false
        		})
			}
		});
	}

});

function validaeNomPersonal(idPer){
	var data ={ 
			idPer:idPer
		};

	var res;

	$.ajax({
			url:"validaeNomPersonal",
			method:"POST",
			async:false,
			data:data,
			success:function(dato)
			{
				res=dato;
			}
		});

	if(res==1){
		return true;
	}else if(res==0){
		return false;
	}
} 


function validarNomUsuario(nomUser){

	var data ={ 
			nomUser: nomUser
		};
		
	var res;

	$.ajax({
			url:"validarNomUsuario",
			method:"POST",
			async:false,
			data:data,
			success:function(dato)
			{
				res=dato;
			}
		});

	if(res==1){
		return true;
	}else if(res==0){
		return false;
	}
}



function llenarDtUsuario(){ 
	ObjtableUser = $("#tbUsuarios").DataTable();
	ObjtableUser.rows().remove().draw( false ); 

	$.ajax({
        url:"llenarDtUsuario",
        type:"post",
        async: true,
         success:
         function(json){

		 	var e = JSON.parse(json);
		 	var estado;

		 	
            for (f=0;f<e.results.length;f++){
            	if(e.results[f].estadoUser == 1){
		 		estado = "Activo";
		 	}else{
		 		estado = "Baja";
		 	}
                ObjtableUser.row.add( [
                	'<img src="'+e.results[f].urlPer+'" style="width:50px; height:45px" class="circle" id="imgDtUsuarios">',
                    e.results[f].nomPer,
                    e.results[f].nomUser,                      
                    e.results[f].passUser,
                    e.results[f].nomPrivi,
                    estado,           
                    '<center><a href="#!" id="btnVerUser" style="background-color:black" class="btn-floating btn-small waves-effect waves-light noHover modal-trigger"><i class="material-icons">&#xE417;</i></a>'
                ] ).draw( false )
            }
        }
    });

}




		



//TERMINA PROGRAMACION PARA USUARIOS























	

	//DESDE AQUI CODIGO PARA VER E INGRESAR PROVEEDORES
	$("#agregarProv").on("click", function(e){

		var codProv = $("#txtCodProv").val();
		var nomProv = $("#txtNomProv").val();
		var dirProv = $("#txtDirProd").val();
		var tel1Prov = $("#txtTel1Prov").val();
		var tel2Prov = $("#txtTel2Prov").val();
		var paisProv = $("#txtPaisProv option:selected").html();
		var estadoProv = $("#txtEstadoProv").val();
		var ciudadProv = $("#txtCiudadProv").val();
		var zCodeProv = $("#txtCodZipProv").val();
		var emailProv = $("#txtEmailProv").val();
		var wSiteProv = $("#txtSitioWebProv").val();
		var contProv = $("#txtNomContProv").val();


		var urlRouter="";
		var formulario;
		var urlImg="../assets/img/suitcase.svg";

		e.preventDefault();

		if(codProv=="" || codProv.length < 5 || codProv.length > 5){
			Materialize.toast("El Código debe tener cinco caracteres", 4000, 'rounded');
		} else if(validarCodProv()){
			Materialize.toast("El Código del proveedor ya esxiste", 4000, 'rounded');
		} else if(nomProv==""){
			Materialize.toast("El campo Nombre se encuentra vacio, favor ingrese un Nombre valido", 4000, 'rounded');
		} else if(dirProv==""){
			Materialize.toast("El campo Dirección se encuentra vacio, favor ingrese un Dirección valida", 4000, 'rounded');
		} else if(tel1Prov==""){
			Materialize.toast("El campo Teléfono se encuentra vacio, favor ingrese un Teléfonp valido", 4000, 'rounded');
		} else if(paisProv=="Pais..."){
			Materialize.toast("Seleccione un pais valido", 4000, 'rounded');
		} else if(ciudadProv==""){
			Materialize.toast("El campo Ciudad se encuentra vacio, favor ingrese una Ciudad valida", 4000, 'rounded');
		} else if(emailProv=="" || emailValidate(emailProv)==false){
			 Materialize.toast("El campo Email se encuentra vacio, o el formato del correo es invalido", 4000, 'rounded');
		}else{

			if($('#image_file').val() == '')
			{

				swal({
					"title":"No ha agregado imagen",
	                "text":"Esta seguro que no desea agregara imágen?",
	                "type":"warning",
	                showCancelButton: true,
	                "confirmButtonColor": '#3085d6',
	                "cancelButtonText": "CANCELAR",
	                 "cancelButtonColor": '#d33',
	                "confirmButtonText": "Si, seguro",
               		allowOutsideClick:false
        		}).then(function(){
	            		
    			guardarNuevoProveedor(urlImg);
	            }, function(dismiss){
        			if (dismiss === 'cancel' || dismiss === 'close') {
					    swal({
		                "text":"Cancelado.",
		                "type":"error",
	            		"confirmButtonText":"ACEPTAR",
	               		allowOutsideClick:false
	            		});
					 } 
	            		

        		});
	            	
			}
			else
			{

				urlRouter = "guaradar_imagen_prov";
				formulario = "#upload_form";
				urlImg ="";
				urlImg = subirImagen(urlRouter, formulario);
				console.log("URL2: "+urlImg);
				if (urlImg!=""){
					guardarNuevoProveedor(urlImg);
				}else{
					
					swal({
		                "text":"VUelva a seleccionar una imagen.",
		                "type":"error",
	            		"confirmButtonText":"ACEPTAR",
	               		allowOutsideClick:false
	            	});

				}
	                   
			}
		}
	});

	function validarCodProv(){

		var codProv ={ 
			codProv: $("#txtCodProv").val()
		};

		var res;
		$.ajax({
			url:"validarCodigoProv", 
			method:"POST",
			async:false,
			data:codProv,
			success:function(data)
			{
				res=data;
			}
		});

		if(res==1){
			return true;
		}else if(res==0){
			return false;
		}

	}


	function guardarNuevoProveedor(urlImg){

		var codProv = $("#txtCodProv").val();
		var nomProv = $("#txtNomProv").val();
		var dirProv = $("#txtDirProd").val();
		var tel1Prov = $("#txtTel1Prov").val();
		var tel2Prov = $("#txtTel2Prov").val();
		var paisProv = $("#txtPaisProv option:selected").html();
		var estadoProv = $("#txtEstadoProv").val();
		var ciudadProv = $("#txtCiudadProv").val();
		var zCodeProv = $("#txtCodZipProv").val();
		var emailProv = $("#txtEmailProv").val();
		var wSiteProv = $("#txtSitioWebProv").val();
		var contProv = $("#txtNomContProv").val();

		var data_form={
			imgLogoProv:urlImg,
			codProv: codProv,
			nomProv:nomProv,
			dirProv:dirProv,
			tel1Prov:tel1Prov,
			tel2Prov:tel2Prov,
			paisProv:paisProv,
			estadoProv:estadoProv,
			ciudadProv:ciudadProv,
			emailProv:emailProv,
			sitioWebProv:wSiteProv,
			codZipProv:zCodeProv,
			NomContactProv:contProv
		};

		$.ajax({
			url:"guardarNuevoProveedor", 
			method:"POST",
			cache: false,
			data:data_form,
			success:function(data)
			{

				if(data==1){
					llenarDtProveedor();
					swal({
		                "text":"Datos guardados",
		                "type":"success",
		                "confirmButtonText":"ACEPTAR",
	               		allowOutsideClick:false
	            	});
	            	$("#txtCodProv").val("");
					$("#txtNomProv").val("");
					$("#txtDirProd").val("");
					$("#txtTel1Prov").val("");
					$("#txtTel2Prov").val("");
					$("#txtEstadoProv").val("");
					$("#txtCiudadProv").val("");
					$("#txtCodZipProv").val("");
					$("#txtEmailProv").val("");
					$("#txtSitioWebProv").val("");
					$("#txtNomContProv").val("");
					$("#txtPaisProv").val("PAIS");
					$('#image_file').val("");

					$('.uploaded_image + img').remove();
    				$('.uploaded_image').after('<img src="../assets/img/suitcase.svg" id="PrevImg"/>');
    				 

				}else{
					swal({
		                "text":"Hubo un error, no se pudieron guardar los datos",
		                "type":"error",
		                "confirmButtonText":"ACEPTAR",
	               		allowOutsideClick:false
	            	});
				}

			}

		});
	}

	function filePreview(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('.uploaded_image + img').remove();
            $('.uploaded_image').after('<img src="'+e.target.result+'" id="PrevImg"/>');
        }
        reader.readAsDataURL(input.files[0]);
    }
}


function llenarDtProveedor(){
	ObjtableProv = $("#tbProveedor").DataTable();
	ObjtableProv.rows().remove().draw( false ); 

	$.ajax({
        url:"llenarDtProveedor",
        type:"post",
        async: true,
         success:
         function(json){

		 	var e = JSON.parse(json);

            for (f=0;f<e.results.length;f++){
                ObjtableProv.row.add( [
                	'<img src="'+e.results[f].imgLogoProv+'" style="width:50px; height:45px" class="circle" id="imgDtProveedor">',
                    e.results[f].codProv,
                    e.results[f].nomProv,
                    e.results[f].paisProv,                      
                    e.results[f].tel1Prov,
                    e.results[f].emailProv,
                    e.results[f].NomContactProv,	                
                    '<center><a href="#!" id="btnVerProv" style="background-color:black" class="btn-floating btn-small waves-effect waves-light noHover modal-trigger"><i class="material-icons">&#xE417;</i></a>'
                ] ).draw( false )
            }
        }
    });

}

	$("#image_file").change(function () {
    filePreview(this);
});




// TERMINA PROGRAMACION PARA PROVEEDORES





















//DESDE AQUI PROGRAMACION PARA VER E INGRESAR PRODUCTOS


	$("#agregarProd").on("click", function(e){

		var codProd = $("#txtCodProd").val();
		var codProv = $("#txtCodProvProd option:selected").val();
		var nomProv = $("#txtCodProvProd option:selected").html();
		var marcaProd = $("#txtMarcaProd").val();
		var nomProd = $("#txtNomProd").val();
		var descripcion = $("#txtDescProd").val();
		var envase = $("#txtEnvaseProd").val();
		var presentacion = $("#txtPresentProd").val();
		var uMedida = $("#txtUMedidaProd option:selected").html();
		

		var urlRouter="";
		var formulario;
		var urlImg="../assets/img/product.svg";

		e.preventDefault();

		if(codProd=="" || codProd.length < 5 || codProd.length > 5){
			Materialize.toast("El Código debe tener cinco caracteres", 4000, 'rounded');
		} else if(validarCodProd()){
			Materialize.toast("El Código del producto ya esxiste", 4000, 'rounded');
		} else if(nomProd==""){
			Materialize.toast("El campo Nombre de Producto se encuentra vacio, favor ingrese un Nombre de Producto valido", 4000, 'rounded');
		} else if(nomProv=="Proveedor..."){
			Materialize.toast("El campo Proveedor se encuentra vacio, Seleccione un Proveedor", 4000, 'rounded');
		} else if(marcaProd==""){
			Materialize.toast("El campo Marca se encuentra vacio, favor ingrese una Marca valida", 4000, 'rounded');
		} else if(descripcion==""){
			Materialize.toast("El campo Descripción se encuentra vacio, favor ingrese una Descripción valida", 4000, 'rounded');
		} else if(envase==""){
			Materialize.toast("El campo Envase se encuentra vacio, favor ingrese un Envase valida", 4000, 'rounded');
		} else if(presentacion==""){
			 Materialize.toast("El campo Presentación se encuentra vacio, favor ingrese una Presentación valida", 4000, 'rounded');
		}else if(uMedida=="Unidad de Medida..."){
			 Materialize.toast("El campo Unidad de medida se encuentra vacio, favor seleccione una Unidad e medida valida", 4000, 'rounded');
		}else{

			if($('#image_file2').val() == '')
			{

				swal({
					"title":"No ha agregado imagen",
	                "text":"Esta seguro que no desea agregara imágen?",
	                "type":"warning",
	                showCancelButton: true,
	                "confirmButtonColor": '#3085d6',
	                "cancelButtonText": "CANCELAR",
	                 "cancelButtonColor": '#d33',
	                "confirmButtonText": "Si, seguro",
               		allowOutsideClick:false
        		}).then(function(){
	            		
    			guardarNuevoProducto(urlImg);
	            }, function(dismiss){
        			if (dismiss === 'cancel' || dismiss === 'close') {
					    swal({
		                "text":"Cancelado.",
		                "type":"error",
	            		"confirmButtonText":"ACEPTAR",
	               		allowOutsideClick:false
	            		});
					 } 
	            		

        		});
	            	
			}
			else
			{

				urlRouter = "guaradar_imagen_prod";
				formulario = "#upload_form2";
				urlImg ="";
				urlImg = subirImagen(urlRouter, formulario);
				console.log("URL2: "+urlImg);
				if (urlImg!=""){
					guardarNuevoProducto(urlImg);
				}else{
					
					swal({
		                "text":"VUelva a seleccionar una imagen.",
		                "type":"error",
	            		"confirmButtonText":"ACEPTAR",
	               		allowOutsideClick:false
	            	});

				}
	                   
			}
		}
	});

	function validarCodProd(){

		var codProd ={ 
			codProd: $("#txtCodProd").val()
		};

		var res;
		$.ajax({
			url:"validarCodigoProd", 
			method:"POST",
			async:false,
			data:codProd,
			success:function(data)
			{
				res=data;
			}
		});

		if(res==1){
			return true;
		}else if(res==0){
			return false;
		}

	}


	function guardarNuevoProducto(urlImg){

		var codProd = $("#txtCodProd").val();
		var codProv = $("#txtCodProvProd option:selected").val();
		var marcaProd = $("#txtMarcaProd").val();
		var nomProd = $("#txtNomProd").val();
		var descripcion = $("#txtDescProd").val();
		var envase = $("#txtEnvaseProd").val();
		var presentacion = $("#txtPresentProd").val();
		var uMedida = $("#txtUMedidaProd option:selected").val();


		var data_form={
		imgProd:urlImg,
		codProd:codProd,
		nomProd:nomProd,
		codProv:codProv,
		marcaProd:marcaProd,
		descProd:descripcion,
		envaseProd:envase,
		presentProd:presentacion,
		uMedidaProd:uMedida
		};
		console.log(data_form);

		$.ajax({
			url:"guardarNuevoProducto", 
			method:"POST",
			cache: false,
			data:data_form,
			success:function(data)
			{

				if(data==1){
					llenarDtProducto();
					swal({
		                "text":"Datos guardados",
		                "type":"success",
		                "confirmButtonText":"ACEPTAR",
	               		allowOutsideClick:false
	            	});

	            	$("#txtCodProd").val("");
					$("#txtMarcaProd").val("");
					$("#txtNomProd").val("");
					$("#txtDescProd").val("");
					$("#txtEnvaseProd").val("");
					$("#txtPresentProd").val("");
					$("#txtCodProvProd").val("PROVEEDOR");
					$("#txtUMedidaProd").val("UNIDAD");

					$('.uploaded_image2 + img').remove();
    				$('.uploaded_image2').after('<img src="../assets/img/product.svg" id="PrevImg2"/>');
    				$('#image_file2').val("");



					
				}else{
					swal({
		                "text":"Hubo un error, no se pudieron guardar los datos",
		                "type":"error",
		                "confirmButtonText":"ACEPTAR",
	               		allowOutsideClick:false
	            	});
				}

			}

		});
	}

	function filePreview2(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('.uploaded_image2 + img').remove();
            $('.uploaded_image2').after('<img src="'+e.target.result+'" id="PrevImg2"/>');
        }
        reader.readAsDataURL(input.files[0]);
    }
}


function llenarDtProducto(){
	ObjtableProd = $("#tbProducto").DataTable();
	ObjtableProd.rows().remove().draw( false ); 

	$.ajax({
        url:"llenarDtProducto",
        type:"post",
        async: true,
         success:
         function(json){
console.log(json);
		 	var e = JSON.parse(json);

            for (f=0;f<e.results.length;f++){
                ObjtableProd.row.add( [
                	'<img src="'+e.results[f].imgProd+'" style="width:50px; height:45px" class="circle" id="imgDtProducto">',
                    e.results[f].codProd,
                    e.results[f].nomProd,
                    e.results[f].marcaProd,                      
                    e.results[f].presentProd,                
                    '<center><a href="#!" id="btnVerProd" style="background-color:black" class="btn-floating btn-small waves-effect waves-light noHover modal-trigger"><i class="material-icons">&#xE417;</i></a>'
                ] ).draw( false )
            }
        }
    });

}


	$("#image_file2").change(function () {
	    filePreview2(this);
	});


//TERMINA PROGRAMACION PARA PRODUCTOS


















//DESDE AQUI PROGRAMACION PARA VER E INGRESAR CLIENTES
	

	$("#agregarCliente").on("click", function(e){

		var codClte = $("#txtCodClte").val();
		var nomClte = $("#txtNomClte").val();
		var apeClte = $("#txtApellidoClte").val();
		var sexoClte = $("#txtSexoClte option:selected").val();
		var cedClte = $("#txtNumCedulaClte").val();
		var emailClte = $("#txtEmailClte").val();
		var tipoClte = $("#txtTipoClte option:selected").html();
		var celClte = $("#txtCelClte").val();
		var telClte = $("#txtTelClte").val();
		var ciudadClte = $("#txtCiudadClte option:selected").html();
		var dirClte = $("#txtDireccionClte").val();


		var nomLocal = $("#txtNomLocal").val();
		var zonaLocal = $("#txtZonaLocal option:selected").val();
		var giroLocal = $("#txtGiroLcal option:selected").html();
		var telLocal = $("#txtTelLocal").val();
		var depLocal = $("#txtDepaLocal option:selected").html();
		var ciudadLocal = $("#txtCiudadLocal option:selected").html();
		var dirLocal = $("#txtDirLocal").val();
		

		var formulario;
		var urlImg1="../assets/img/specialist-user.svg";
		var urlImg2="../assets/img/store.svg";
		var urlRouter1 = "guaradar_imagen_clte";
		var urlRouter2 = "guaradar_imagen_Local_clte";
		var formulario1 = "#upload_form3";
		var formulario2 = "#upload_form4";

		e.preventDefault();

		if(codClte=="" || codClte.length < 5 || codClte.length > 5){
			Materialize.toast("El Código debe tener cinco caracteres", 4000, 'rounded');
		} else if(validarCodCliente()){
			Materialize.toast("El Código de cliente ya esxiste", 4000, 'rounded');
		} else if(nomClte==""){
			Materialize.toast("El campo nombre se encuentran vacio", 4000, 'rounded');
		} else if(apeClte==""){
			Materialize.toast("El campo apellido se encuentran vacio", 4000, 'rounded');
		} else if(sexoClte=="SEXO"){
			Materialize.toast("Seleccione el sexo del cliente", 4000, 'rounded');
		} else if(cedClte=="" || cedClte.length < 16 || cedClte.length > 16){
			Materialize.toast("El campo cedula debe tener dies y seis caracteres", 4000, 'rounded');
		} else if(tipoClte=="Tipo cliente..."){
			Materialize.toast("Seleccione el tipo ó clasificación de cliente", 4000, 'rounded');
		} else if(celClte=="" && telClte==""){
			 Materialize.toast("El campo celular y telefono se encuentra vacio", 4000, 'rounded');
		} else if(ciudadClte=="Ciudad..."){
			 Materialize.toast("Seleccione una ciudad dela vivienda del cliente", 4000, 'rounded');
		} else if(dirClte==""){
			 Materialize.toast("El campo dirección se encuentra vacio", 4000, 'rounded');
		} else if(nomLocal==""){
			 Materialize.toast("El campo nombre del local se encuentra vacio", 4000, 'rounded');
		} else if(zonaLocal=="ZONA"){
			 Materialize.toast("El campo Zona se encuentra vacio", 4000, 'rounded');
		} else if(giroLocal=="Giro local..."){
			 Materialize.toast("El campo Giro se encuentra vacio", 4000, 'rounded');
		} else if(depLocal=="Departamento..."){
			 Materialize.toast("Seleccione un departamento dellocal", 4000, 'rounded');
		} else if(ciudadLocal=="Ciudad..."){
			 Materialize.toast("Seleccione una ciudad del local", 4000, 'rounded');
		} else if(dirLocal==""){
			 Materialize.toast("El campo dirección del local se encuentra vacio", 4000, 'rounded');
		}
		else
		{

			if($('#image_file3').val() == '' && $('#image_file4').val() == '')
			{

				swal({
					"title":"No ha agregado imagen del cliente ni del local",
	                "text":"Esta seguro que no desea agregara imágen?",
	                "type":"warning",
	                showCancelButton: true,
	                "confirmButtonColor": '#3085d6',
	                "cancelButtonText": "CANCELAR",
	                 "cancelButtonColor": '#d33',
	                "confirmButtonText": "Si, seguro",
               		allowOutsideClick:false
        		}).then(function(){
	            		
    			guardarNuevoCliente(urlImg1, urlImg2);
	            }, function(dismiss){
        			if (dismiss === 'cancel' || dismiss === 'close') {
					    swal({
		                "text":"Cancelado.",
		                "type":"error",
	            		"confirmButtonText":"ACEPTAR",
	               		allowOutsideClick:false
	            		});
					 } 
	            		

        		});
	            	
			} else if($('#image_file3').val() != '' && $('#image_file4').val() == ''){

				swal({
					"title":"No ha agregado imagen del local",
	                "text":"Esta seguro que no desea agregara imágen?",
	                "type":"warning",
	                showCancelButton: true,
	                "confirmButtonColor": '#3085d6',
	                "cancelButtonText": "CANCELAR",
	                 "cancelButtonColor": '#d33',
	                "confirmButtonText": "Si, seguro",
               		allowOutsideClick:false
        		}).then(function(){
        			urlImg1 ="";
        			urlImg1 = subirImagen(urlRouter1, formulario1);
    				if (urlImg1!=""){
					guardarNuevoCliente(urlImg1, urlImg2);
					}else{swal({
			                "text":"Hubo un error vuelva a seleccionar Imagen del cliente.",
			                "type":"error",
		            		"confirmButtonText":"ACEPTAR",
		               		allowOutsideClick:false
		            	});

					}
	            }, function(dismiss){
        			if (dismiss === 'cancel' || dismiss === 'close') {
					    swal({
		                "text":"Cancelado.",
		                "type":"error",
	            		"confirmButtonText":"ACEPTAR",
	               		allowOutsideClick:false
	            		});
					 } 
	            		

        		});

			} else if($('#image_file3').val() == '' && $('#image_file4').val() != '')
			{
				swal({
					"title":"No ha agregado imagen del cliente",
	                "text":"Esta seguro que no desea agregara imágen?",
	                "type":"warning",
	                showCancelButton: true,
	                "confirmButtonColor": '#3085d6',
	                "cancelButtonText": "CANCELAR",
	                 "cancelButtonColor": '#d33',
	                "confirmButtonText": "Si, seguro",
               		allowOutsideClick:false
        		}).then(
        			function(){
	        			urlImg2 ="";
	        			urlImg2 = subirImagen(urlRouter2, formulario2);
	        			if (urlImg2!=""){
	    				guardarNuevoCliente(urlImg1, urlImg2);
		    			}else{
							
							swal({
				                "text":"Hubo un error vuelva a seleccionar Imagen del local.",
				                "type":"error",
			            		"confirmButtonText":"ACEPTAR",
			               		allowOutsideClick:false
			            	});

						}
		            }, 
		            function(dismiss){
        			if (dismiss === 'cancel' || dismiss === 'close') {
					    swal({
		                "text":"Cancelado.",
		                "type":"error",
	            		"confirmButtonText":"ACEPTAR",
	               		allowOutsideClick:false
	            		});
					 } 
	            		

        		});

			} else if($('#image_file3').val() != '' && $('#image_file4').val() != '')
			{

				
				urlImg1 ="";
				urlImg2 ="";

				urlImg1 = subirImagen(urlRouter1, formulario1);
				urlImg2 = subirImagen(urlRouter2, formulario2);
				if (urlImg1!=""){
					guardarNuevoCliente(urlImg1, urlImg2);
				}else{
					
					swal({
		                "text":"Hubo un error no se pudo subir una de las fotos.",
		                "type":"error",
	            		"confirmButtonText":"ACEPTAR",
	               		allowOutsideClick:false
	            	});

				}
	                   
			}
		}
	});

	

	function validarCodCliente(){

		var idClte ={ 
			idClte: $("#txtCodClte").val()
		};

		var res;
		$.ajax({
			url:"validarCodCliente", 
			method:"POST",
			async:false,
			data:idClte,
			success:function(data)
			{
				res=data;
			}
		});

		if(res==1){
			return true;
		}else if(res==0){
			return false;
		}

	}

	function guardarNuevoCliente(urlClte, urlLocal){


		var codClte = $("#txtCodClte").val();
		var nomClte = $("#txtNomClte").val();
		var apeClte = $("#txtApellidoClte").val();
		var sexoClte = $("#txtSexoClte option:selected").val();
		var cedClte = $("#txtNumCedulaClte").val();
		var emailClte = $("#txtEmailClte").val();
		var tipoClte = $("#txtTipoClte option:selected").html();
		var celClte = $("#txtCelClte").val();
		var telClte = $("#txtTelClte").val();
		var ciudadClte = $("#txtCiudadClte option:selected").html();
		var dirClte = $("#txtDireccionClte").val();

		var nomLocal = $("#txtNomLocal").val();
		var zonaLocal = $("#txtZonaLocal option:selected").val();
		var giroLocal = $("#txtGiroLcal option:selected").val();
		var telLocal = $("#txtTelLocal").val();
		var depLocal = $("#txtDepaLocal option:selected").html();
		var ciudadLocal = $("#txtCiudadLocal option:selected").html();
		var dirLocal = $("#txtDirLocal").val();

		var data_form={
			imgClte:urlClte,
			imgLocal:urlLocal,
			codClte:codClte,
			nomClte:nomClte,
			apeClte:apeClte,
			sexoClte:sexoClte,
			cedClte:cedClte,
			emailClte:emailClte,
			tipoClte:tipoClte,
			celClte:celClte,
			telClte:telClte,
			ciudadClte:ciudadClte,
			dirClte:dirClte,
			nomLocal:nomLocal,
			zonaLocal:zonaLocal,
			giroLocal:giroLocal,
			telLocal:telLocal,
			depLocal:depLocal,
			ciudadLocal:ciudadLocal,
			dirLocal:dirLocal
		};
		console.log(data_form);

		$.ajax({
			url:"guardarNuevoCliente", 
			method:"POST",
			cache: false,
			data:data_form,
			success:function(data)
			{

				if(data==1){
					llenarDtCliente();
					swal({
		                "text":"Datos guardados",
		                "type":"success",
		                "confirmButtonText":"ACEPTAR",
	               		allowOutsideClick:false
	            	});

				    $("#txtCodClte").val("");
					$("#txtNomClte").val("");
					$("#txtApellidoClte").val("");
					$("#txtSexoClte").val("SEXO");
					$("#txtNumCedulaClte").val("");
					$("#txtEmailClte").val("");
					$("#txtTipoClte").val("TIPO");
					$("#txtCelClte").val("");
					$("#txtTelClte").val("");
					$("#txtDireccionClte").val("");

					$("#txtNomLocal").val("");
					$("#txtGiroLcal").val("GIRO");
					$("#txtTelLocal").val("");
					$("#txtDirLocal").val("");
					$(".txtDepa").val("DEPARTAMENTO");
					$(".txtCiudad").val("CIUDAD");
					$(".txtZona").val("ZONA");

					$('#image_file3').val();
					$('#image_file4').val();

					$('.uploaded_image3 + img').remove();
				    $('.uploaded_image3').after('<img src="../assets/img/specialist-user.svg" id="PrevImg3"/>');

				    $('.uploaded_image4 + img').remove();
				    $('.uploaded_image4').after('<img src="../assets/img/store.svg" id="PrevImg4"/>');

				}else{
					swal({
		                "text":"Hubo un error, no se pudieron guardar los datos",
		                "type":"error",
		                "confirmButtonText":"ACEPTAR",
	               		allowOutsideClick:false
	            	});
				}

			}

		});




	}


	function llenarDtCliente(){
		ObjtableClte = $("#tbCliente").DataTable();
		ObjtableClte.rows().remove().draw( false ); 

		$.ajax({
	        url:"llenarDtCliente",
	        type:"post",
	        async: true,
	         success:
	         function(json){

			 	var e = JSON.parse(json);

	            for (f=0;f<e.results.length;f++){
	                ObjtableClte.row.add( [
	                	'<img src="'+e.results[f].urlFotoClte+'" style="width:50px; height:45px" class="circle" id="imgDtCliente">',
	                    e.results[f].idClte,
	                    e.results[f].nomClte,
	                    e.results[f].clasClte,                      
	                    e.results[f].nomLocalClte,
	                    e.results[f].nom_ruta_zona,
	                    e.results[f].ciudadLocalClte,	                
	                    '<center><a href="#!" id="btnVerClte" style="background-color:black" class="btn-floating btn-small waves-effect waves-light noHover modal-trigger"><i class="material-icons">&#xE417;</i></a>'
	                ] ).draw( false )
	            }
	        }
	    });

	}


	
	function filePreview3(input) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	            $('.uploaded_image3 + img').remove();
	            $('.uploaded_image3').after('<img src="'+e.target.result+'" id="PrevImg3"/>');
	        }
	        reader.readAsDataURL(input.files[0]);
	    }
	}

	$("#image_file3").change(function () {
	    filePreview3(this);
	});


	function filePreview4(input) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	            $('.uploaded_image4 + img').remove();
	            $('.uploaded_image4').after('<img src="'+e.target.result+'" id="PrevImg4"/>');
	        }
	        reader.readAsDataURL(input.files[0]);
	    }
	}

	$("#image_file4").change(function () {
	    filePreview4(this);
	});



//TERMINA PROGRAMACION PARA CLIENTE






















//CODIGOS GLOBALES



function subirImagen(urlRouter, formulario){

	var picUrl;


	$.ajax({
		url:urlRouter, 
		method:"POST",
		data:new FormData($(formulario)[0]),
		contentType: false,
		cache: false,
		processData:false,
		async:false,
		success:function(data)
		{

			if(data != 0){
        		swal({
	                "text":"Imagen Guardada",
	                "type":"success",
	                "confirmButtonText":"ACEPTAR",
               		allowOutsideClick:false
            	});
            	
            	var e = JSON.parse(data);
            	picUrl = e["url"];
            	console.log("URL desde AJAX: "+picUrl);


        	}else{
        		swal({
	                "text":"No se pudo almacenar la imagen.",
	                "type":"error",
            		"confirmButtonText":"ACEPTAR",
               		allowOutsideClick:false
            	});
            	picUrl = "../assets/img/suitcase.svg";

        	}
        	
		}
	});

		
	console.log("url foto 1: "+picUrl);


	return picUrl;
}


function emailValidate(email){
	    var check = "" + email;
	    if((check.search('@')>=0)&&(check.search(/\./)>=0))
	        if(check.search('@')<check.split('@')[1].search(/\./)+check.search('@')) return true;
	        else return false;
	    else return false;
	}

	//caracteres permitidos input telefono
	function Numeros(string){//Solo numeros
    var out = '';
    var filtro = '1234567890-()+';//Caracteres validos
	
    //Recorrer el texto y verificar si el caracter se encuentra en la lista de validos 
    for (var i=0; i<string.length; i++)
       if (filtro.indexOf(string.charAt(i)) != -1) 
             //Se añaden a la salida los caracteres validos
	     out += string.charAt(i);
	
    //Retornar valor filtrado
    return out;
} 



jQuery('input[type=file]').change(function(){
 var filename = jQuery(this).val().split('\\').pop();
 var idname = jQuery(this).attr('id');
 jQuery('span.'+idname).next().find('span').html(filename);
});


//TERMINA CODIGOS GLOBALES


</script>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'login_controller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


/******** MIS RUTAS **********/
// LOGIN
$route['login'] = 'login_controller/Acreditar';
$route['salir'] = 'login_controller/Salir';

// FIN LOGIN



//RUTAS GLOBALES
$route ['listandoPais'] = 'main_controller/listandoPais';
$route ['listandoProveedor'] = 'main_controller/listandoProveedor';
$route ['listandoUmedida'] = 'main_controller/listandoUmedida';
$route ['listandoDepartamento'] = 'main_controller/listandoDepartamento';
$route ['listandoCiudad'] = 'main_controller/listandoCiudad';
$route ['listandoAreaLAboral'] = 'main_controller/listandoAreaLAboral';
$route ['listandoCargoLaboral'] = 'main_controller/listandoCargoLaboral';
$route ['listandoZona'] = 'main_controller/listandoZona';
$route ['listandoSubZona'] = 'main_controller/listandoSubZona';
$route ['listandoPersonal'] = 'main_controller/listandoPersonal';
$route ['listandoPrivilegios'] = 'main_controller/listandoPrivilegios'; 
$route ['listandoClientes'] = 'main_controller/listandoClientes';
$route ["listandoProductos/(:any)"] ='main_controller/listandoProductos/$1';
$route ["listandoTipoVehiculo"] ='main_controller/listandoTipoVehiculo';
$route ["listandoCarroceriaVehiculo/(:any)"] ='main_controller/listandoCarroceriaVehiculo/$1';



//MAIN
$route['home'] = 'main_controller/home';
$route ['reportes'] = 'main_controller/reportes';
$route ['recuperacion'] = 'main_controller/recuperacion';
$route ['ventas']= 'main_controller/ventas';
$route ['rutaUsuario']= 'main_controller/rutaUsuario';
$route ["LlenarDtDetFacturaxNumfact/(:any)"] ='main_controller/LlenarDtDetFacturaxNumfact/$1';
$route ["LlenarDtDetAbonoXNumfact/(:any)"] ='main_controller/LlenarDtDetAbonoXNumfact/$1';
$route ["llenartblReciboXUser/(:any)"] ='main_controller/llenartblReciboXUser/$1';
$route ["llenartblFacturasXUser/(:any)"] ='main_controller/llenartblFacturasXUser/$1';
$route ['llenarDataTblFactxUser'] = 'main_controller/llenarDataTblFactxUser';
$route ['filtrarxfechaFacturasxUser'] = 'main_controller/filtrarxfechaFacturasxUser'; 
$route ['generarExcelFactPendientes/(:any)/(:any)'] = 'main_controller/generarExcelFactPendientes/$1/$2'; 


//VENTAS
$route ['guardarFacturaVentas']= 'main_controller/Ventas';
$route ['llenarDataTblFact']= 'main_controller/llenarDataTblFact';
$route ["AgregarDetalleFacturas"] ='main_controller/AgregarDetalleFacturas';
$route ["agregarNuevaFactura"] ='main_controller/agregarNuevaFactura';
$route ["verifExistidfatura"] ='main_controller/verifExistidfatura';
$route ["filtrarxfechaFacturas"] ='main_controller/filtrarxfechaFacturas';


//DATA CONTROL 

	//Proveedor
$route ['datacontrol'] = 'main_controller/DataControl';
$route ['guaradar_imagen_prov'] = 'main_controller/guaradar_imagen_prov';
$route ['guardarNuevoProveedor'] = 'main_controller/guardarNuevoProveedor';
$route ['validarCodigoProv'] = 'main_controller/validarCodigoProv';
$route ['llenarDtProveedor'] = 'main_controller/llenarDtProveedor';

	//Producto
$route ['guaradar_imagen_prod'] = 'main_controller/guaradar_imagen_prod';
$route ['validarCodigoProd'] = 'main_controller/validarCodigoProd';
$route ['guardarNuevoProducto'] = 'main_controller/guardarNuevoProducto';
$route ['llenarDtProducto'] = 'main_controller/llenarDtProducto';

	//Clientes
$route ['guaradar_imagen_cliente'] = 'main_controller/guaradar_imagen_cliente';
$route ['validarCodCliente'] = 'main_controller/validarCodCliente';
$route ['guardarNuevoCliente'] = 'main_controller/guardarNuevoCliente';
$route ['llenarDtCliente'] = 'main_controller/llenarDtCliente'; 

	//Personal
$route ['guaradar_imagen_personal'] = 'main_controller/guaradar_imagen_personal';
$route ['guardarNuevoPersonal'] = 'main_controller/guardarNuevoPersonal';
$route ['obtenerUltimoCodPerAgregado'] = 'main_controller/obtenerUltimoCodPerAgregado';
$route ['actualizarUltimoCodPerAgregado'] = 'main_controller/actualizarUltimoCodPerAgregado';
$route ['llenarDtPersonal'] = 'main_controller/llenarDtPersonal';
$route ['AgregarRutaVendedor'] = 'main_controller/AgregarRutaVendedor';
$route ['AgregarVehiculoPersonal'] = 'main_controller/AgregarVehiculoPersonal';

	//Usuario
$route ['guardarNuevoUsuarioYpermisos'] = 'main_controller/guardarNuevoUsuarioYpermisos';
$route ['validaeNomPersonal'] = 'main_controller/validaeNomPersonal';
$route ['validarNomUsuario'] = 'main_controller/validarNomUsuario';  
$route ['llenarDtUsuario'] = 'main_controller/llenarDtUsuario'; 


	

//COBRO
$route['cobro'] = 'main_controller/cobro';
$route ['getDatosRecibo']= 'main_controller/getDatosRecibo';
$route ["AgregarDetalleRecibo"] ='main_controller/AgregarDetalleRecibo';
$route ["agregarNuevoRecibo"] ='main_controller/agregarNuevoRecibo';
$route ["verifExistidRecibo"] ='main_controller/verifExistidRecibo';
$route ["ListandoFacturasXClte/(:any)"] ='main_controller/ListandoFacturasXClte/$1';
$route ["saldoFactura"] ='main_controller/saldoFactura';
$route['actualizarEstadoFact'] = 'main_controller/actualizarEstadoFact';
$route['guardarRemanente'] = 'main_controller/guardarRemanente';




//COMPRA
$route['compra'] = 'main_controller/compra';
 	//Factura de Compra
$route['getDatosFacturasCompra'] = 'compra_controller/getDatosFacturasCompra';
$route['listandoTipoFacturaCompra'] = 'compra_controller/listandoTipoFacturaCompra';
$route['verifExistidfaturaCompra'] = 'compra_controller/verifExistidfaturaCompra';
$route['agregarNuevaFacturaCompra'] = 'compra_controller/agregarNuevaFacturaCompra';
$route['AgregarDetalleFactCompra'] = 'compra_controller/AgregarDetalleFactCompra';
	
	//Recibo de compra
$route['getDatosRecCompra'] = 'compra_controller/getDatosRecCompra';
$route['verifExistidReciboComp'] = 'compra_controller/verifExistidReciboComp';
$route['agregarNuevoRecComp'] = 'compra_controller/agregarNuevoRecComp';
$route['AgregarDetalleRecComp'] = 'compra_controller/AgregarDetalleRecComp';
$route['ColectarTotalFactComp'] = 'compra_controller/ColectarTotalFactComp'; 






/*
$route ['llenarCHPIV']= 'Main_controller/llenarHighchartPieMetaVenta';
$route ['infoVntsRecuperado']= 'Main_controller/infoVntsRecuperado';
$route ['infoVntsMeta']= 'Main_controller/infoVntsMeta';

*/

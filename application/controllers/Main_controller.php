<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library("session");
        if ($this->session->userdata('logged') == 0) {
            redirect(base_url() . 'index.php', 'refresh');
        }
    }

    
    //Menu Principal
    
    public function home()//Pagina principal (Home)
    {
        $this->load->view('header/header');
        $Menu['List_menus'] = $this->Main_model->get_permission();
        $User["user"] =  $this->Home_model->rutaUsuario();
        $this->load->view('pages/menu',$Menu);
        $this->load->view('pages/home',$User);
        $this->load->view('footer/footer');
        $this->load->view('jsview/jsHome');
    }
    public function rutaUsuario(){

        $this->Home_model->rutaUsuario();
    }

    

     //Devuelve todos los datos de Recibos
    
    public function getDatosRecibo()
    {

        $this->Cobro_model->getDatosRecibo();
    }

    public function get_clientes()
    {

        echo $this->Home_model->get_clientes();

    }

     public function llenarHighchartPieMetaVenta()
    {
        $this->Homes_model->llenarHighchartPieMetaVenta();
    }

    public function infoVntsRecuperado(){
        $this->Home_model->infoVntsRecuperado();
    }

     public function infoVntsMeta(){
        $this->Home_model->infoVntsMeta();
    }

     public function ventas()
    {
        $this->load->view('header/header');
        $Menu['List_menus'] = $this->Main_model->get_permission();
        $this->load->view('pages/menu',$Menu);
        $this->load->view('pages/ventas');
        $this->load->view('footer/footer');
        $this->load->view('jsview/jsVentas');
    }



    public function AgregarDetalleFacturas(){
        $data = $_POST['data'];

        $this->Main_model->AgregarDetalleFacturas($data);
    }

    public function AgregarDetalleRecibo(){
        $data = $_POST['data'];

        $this->Cobro_model->AgregarDetalleRecibo($data);
    }
   

    public function agregarNuevaFactura(){

    

        $data= array(
            "idFact"=> $this->input->post("idFact"),
            "idCliente"=> $this->input->post("idCliente"),
            "idPer"=> $this->input->post("idPer"),
            "fechaFact"=> $this->input->post("fechaFact"),
            "tipoPagoFact"=> $this->input->post("tipoPagoFact"),
            "diaCreditoFact"=> $this->input->post("diaCreditoFact"),
            "fechaVenceFact"=> $this->input->post("fechaVenceFact"),
            "totalFact"=> $this->input->post("totalFact"),
            "estadoFact"=> $this->input->post("estadoFact"),
            "monedaFact"=> $this->input->post("monedaFact"),
            "userRegFact"=> $this->session->userdata('UserN')
        );
           
        $this->Main_model->agregarNuevaFactura($data);

    }

    public function actualizarEstadoFact(){
        $data = $_POST['data'];
        $recolectar =  Array();
        $i = 0;

        foreach($data as $d){
            if($d["estadoFact"] == 2){
                $recolectar[$i]["idFact"] = $d["numFact"]; 
                $recolectar[$i]["estadoFact"] = $d["estadoFact"]; 
                $i++;
            }
           
        }
        $this->Cobro_model->actualizarEstadoFact($recolectar);
    }

    public function guardarRemanente(){
        $data = $_POST['data'];
        $recolectar =  Array();
        $i = 0;

        foreach($data as $d){
            if($d["remanente"] > 0){
                $recolectar[$i]["NRecComp"] = $d["numRecibo"]; 
                $recolectar[$i]["NFactComp"] = $d["numFact"]; 
                $recolectar[$i]["totFactComp"] = $d["totalFact"];
                $recolectar[$i]["totRecComp"] = $d["abono"];  
                $recolectar[$i]["totAbonos"] = $d["totalAbono"]; 
                $recolectar[$i]["cantRemComp"] = $d["remanente"]; 
                $i++;
            }
        }
        
        $this->Cobro_model->guardarRemanente($recolectar);
    }

    public function filtrarxfechaFacturas(){
        $data= array(
            'desde' => $this->input->post('desde'),
            'hasta' => $this->input->post('hasta')
        );

        $this->Home_model->filtrarxfechaFacturas($data);   
    }

    public function filtrarxfechaFacturasxUser(){
        $data= array(
            'desde' => $this->input->post('desde'),
            'hasta' => $this->input->post('hasta')
        );

        echo json_encode($this->Home_model->filtrarxfechaFacturasxUser($data));   
    }

     public function agregarNuevoRecibo(){

        date_default_timezone_set("UTC");
        date_default_timezone_set('America/Managua');
    

        $data= array(
            "fechaRecibo"=> $this->input->post("fechaRecibo"),
            "idRecibo"=> $this->input->post("idRecibo"),
            "idPer"=> $this->input->post("idPer"),
            "idCliente"=> $this->input->post("idCliente"),
            "formaPago"=> $this->input->post("formaPago"),
            "monedaRecibo"=> $this->input->post("monedaRecibo"),
            "tasaCambioRecibo"=> $this->input->post("tasaCambioRecibo"),
            "bancoCkRecibo"=> $this->input->post("bancoCkRecibo"),
            "numCkRecibo"=> $this->input->post("numCkRecibo"),
            "concepRecibo"=> $this->input->post("concepRecibo"),
            "estadoRecibo" => $this->input->post("estadoRecibo"),
            "montoRecibo" => $this->input->post("montoRecibo"),
            "observRecibo"  => $this->input->post("observRecibo"),
            "fechaRegRecibo" => date('Y-m-d H:m:s'),
            "userRegRecibo"=> $this->session->userdata('UserN')
            
        );

           
        $this->Cobro_model->agregarNuevoRecibo($data);

    }

    public function verifExistidfatura(){

        
         $idFact = $this->input->post("idFact");

        $this->Main_model->verifExistidfatura($idFact);

    }

    public function verifExistidRecibo(){

        
         $idRecibo = $this->input->post("idRecibo");

        $this->Cobro_model->verifExistidRecibo($idRecibo);

    }




     public function reportes()
    {
        $this->load->view('header/header');
        $Menu['List_menus'] = $this->Main_model->get_permission();
        $this->load->view('pages/menu',$Menu);
        $this->load->view('pages/menu_reportes');
        $this->load->view('footer/footer');
        $this->load->view('jsview/jsRecuperacion');
    }


    //Menu Reportes

     public function recuperacion()
    {
        $this->load->view('header/header');
        $Menu['List_menus'] = $this->Main_model->get_permission();
        $this->load->view('pages/menu',$Menu);
        $this->load->view('pages/recuperacion');
        $this->load->view('footer/footer');
        $this->load->view('jsview/jsRecuperacion');
    }

    public function DataControl()
    {
        $this->load->view('header/header');
        $Menu['List_menus'] = $this->Main_model->get_permission();
        $this->load->view('pages/menu',$Menu);
        $this->load->view('pages/DataControl');
        $this->load->view('footer/footer');
        $this->load->view('jsview/jsDataControl');
    }

    public function cobro()
    {
        $this->load->view('header/header');
        $Menu['List_menus'] = $this->Main_model->get_permission();
        $this->load->view('pages/menu',$Menu);
        $this->load->view('pages/cobro');
        $this->load->view('footer/footer');
        $this->load->view('jsview/jsCobro');
    }


     public function compra()
    {
        $this->load->view('header/header');
        $Menu['List_menus'] = $this->Main_model->get_permission();
        $this->load->view('pages/menu',$Menu);
        $this->load->view('pages/compra');
        $this->load->view('footer/footer');
        $this->load->view('jsview/jsCompra');
    }


    public function validarCodigoProv(){
        $codProv = array(
            "codProv" => $this->input->post("codProv")
        );
        $this->Datacontrol_model->validarCodigoProv($codProv);

    }

     public function validarCodigoProd(){
         $codProd = array(
            "codProd" => $this->input->post("codProd")
        );
        $this->Datacontrol_model->validarCodigoProd($codProd);
    }


     public function validarCodCliente(){
        $idClte = array(
            "idClte" => $this->input->post("idClte")
        );
        $this->Datacontrol_model->validarCodCliente($idClte);

    }

    public function validaeNomPersonal(){
         $idPer = array(
            "idPer" => $this->input->post("idPer")
        );
        $this->Datacontrol_model->validaeNomPersonal($idPer);
    }

    public function validarNomUsuario(){
         $nomUser = array(
            "nomUser" => $this->input->post("nomUser")
        );
        $this->Datacontrol_model->validarNomUsuario($nomUser);
    }


    public function saldoFactura(){
        $idFact = $this->input->post("idFact");
         $this->Cobro_model->saldoFactura($idFact);
    }


    public function obtenerUltimoCodPerAgregado(){
        $this->Datacontrol_model->obtenerUltimoCodPerAgregado();

    }

    public function actualizarUltimoCodPerAgregado(){
        $data= array(
        "number" => $this->input->post("number")
    );
        $where= array("prefijos" => "DP");
         $this->Datacontrol_model->actualizarUltimoCodPerAgregado($data,$where);

    }



    public function guaradar_imagen_prov()
    {
        if(isset($_FILES["image_file"]["name"]))
        {
            $config['upload_path'] = 'assets/img/img_proveedor/';
            $config['file_name'] = "proveedor_0";
            $config['max_size'] = "5000";//kb
           // $config['max_width'] = "2000";
           // $config['max_height'] = "2000";
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('image_file'))
            {
                echo false;//$this->upload->display_errors();
            }
            else
            {
                $data2 = array("upload_data" => $this->upload->data());
                $url = array('url' => '../assets/img/img_proveedor/'.$data2['upload_data']['file_name']);

                echo json_encode($url);
            }
        }
    }


    public function guaradar_imagen_prod()
    {
        if(isset($_FILES["image_file2"]["name"]))
        {
            $config['upload_path'] = 'assets/img/img_products/';
            $config['file_name'] = "producto_0";
            $config['max_size'] = "5000";//kb
           // $config['max_width'] = "2000";
           // $config['max_height'] = "2000";
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('image_file2'))
            {
                echo false;//$this->upload->display_errors();
            }
            else
            {
                $data2 = array("upload_data" => $this->upload->data());
                $url = array('url' => '../assets/img/img_products/'.$data2['upload_data']['file_name']);

                echo json_encode($url);
            }
        }
    }

    public function guaradar_imagen_clte()
    {
        if(isset($_FILES["image_file3"]["name"]))
        {
            $config['upload_path'] = 'assets/img/img_cliente/';
            $config['file_name'] = "cliente_0";
            $config['max_size'] = "5000";//kb
           // $config['max_width'] = "2000";
           // $config['max_height'] = "2000";
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('image_file3'))
            {
                echo false;//$this->upload->display_errors();
            }
            else
            {
                $data2 = array("upload_data" => $this->upload->data());
                $url = array('url' => '../assets/img/img_cliente/'.$data2['upload_data']['file_name']);

                echo json_encode($url);
            }
        }
    }

     public function guaradar_imagen_Local_clte()
    {
        if(isset($_FILES["image_file4"]["name"]))
        {
            $config['upload_path'] = 'assets/img/img_cliente/';
            $config['file_name'] = "local_clte_0";
            $config['max_size'] = "5000";//kb
           // $config['max_width'] = "2000";
           // $config['max_height'] = "2000";
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('image_file4'))
            {
                echo false;//$this->upload->display_errors();
            }
            else
            {
                $data2 = array("upload_data" => $this->upload->data());
                $url = array('url' => '../assets/img/img_cliente/'.$data2['upload_data']['file_name']);

                echo json_encode($url);
            }
        }
    }

    public function guaradar_imagen_personal()
    {
        if(isset($_FILES["image_file5"]["name"]))
        {
            $config['upload_path'] = 'assets/img/img_personal/';
            $config['file_name'] = "personal_0";
            $config['max_size'] = "5000";//kb
           // $config['max_width'] = "2000";
           // $config['max_height'] = "2000";
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('image_file5'))
            {
                echo false;//$this->upload->display_errors();
            }
            else
            {
                $data2 = array("upload_data" => $this->upload->data());
                $url = array('url' => '../assets/img/img_personal/'.$data2['upload_data']['file_name']);

                echo json_encode($url);
            }
        }
    }




    

    public function guardarNuevoProveedor(){
        $datda = array(
            "imgLogoProv"=> $this->input->post("imgLogoProv"),
                "codProv" => $this->input->post("codProv"),
                "nomProv" => $this->input->post("nomProv"),
                "dirProv" => $this->input->post("dirProv"),
                "tel1Prov" => $this->input->post("tel1Prov"),
                "tel2Prov" => $this->input->post("tel2Prov"),
                "paisProv" => $this->input->post("paisProv"),
                "estadoProv" => $this->input->post("estadoProv"),
                "ciudadProv" => $this->input->post("ciudadProv"),
                "emailProv" => $this->input->post("emailProv"),
                "sitioWebProv" => $this->input->post("sitioWebProv"),
                "codZipProv" => $this->input->post("codZipProv"),
                "NomContactProv" => $this->input->post("NomContactProv")
        );
        $this->Datacontrol_model->guardarNuevoProveedor($datda);

    }

    public function guardarNuevoProducto(){

        $datda = array(
            "imgProd"=> $this->input->post("imgProd"),
            "codProd" => $this->input->post("codProd"),
            "nomProd" => $this->input->post("nomProd"),
            "codProv" => $this->input->post("codProv"),
            "marcaProd" => $this->input->post("marcaProd"),
            "descProd" => $this->input->post("descProd"),
            "envaseProd" => $this->input->post("envaseProd"),
            "presentProd" => $this->input->post("presentProd"),
            "uMedidaProd" => $this->input->post("uMedidaProd")
        );

        $this->Datacontrol_model->guardarNuevoProducto($datda);

    }


    public function guardarNuevoCliente(){
        

        $datda = array(
            "urlFotoClte"=> $this->input->post("imgClte"),
            "urlFotoLocal" => $this->input->post("imgLocal"),
            "idClte" => $this->input->post("codClte"),
            "nomClte" => $this->input->post("nomClte"),
            "apeClte" => $this->input->post("apeClte"),
            "sexoClte" => $this->input->post("sexoClte"),
            "cedulaClte" => $this->input->post("cedClte"),
            "emailClte" => $this->input->post("emailClte"),
            "clasClte" => $this->input->post("tipoClte"),
            "celClte"=> $this->input->post("celClte"),
            "telClte" => $this->input->post("telClte"),
            "ciudadClte" => $this->input->post("ciudadClte"),
            "dirClte" => $this->input->post("dirClte"),
            "nomLocalClte" => $this->input->post("nomLocal"),
            "idZona" => $this->input->post("zonaLocal"),
            "tipoLocalClte" => $this->input->post("giroLocal"),
            "telLocalClte" => $this->input->post("telLocal"),
            "depaLocalClte" => $this->input->post("depLocal"),
            "ciudadLocalClte" => $this->input->post("ciudadLocal"),
            "dirLocalClte" => $this->input->post("dirLocal"),
            "fechaRegCreado" => date('Y-m-d H:m:s'),
            "idUserCreaReg" => $this->session->userdata('UserN')
        );

        $this->Datacontrol_model->guardarNuevoCliente($datda);
    }



    public function guardarNuevoPersonal(){


        $data1 = array(
            "urlPer"=> $this->input->post("urlPer"),
            "idPer" => $this->input->post("idPer"),
            "nomPer" => $this->input->post("nomPer"),
            "apePer" => $this->input->post("apePer"),
            "fNacPer" => $this->input->post("fNacPer"),
            "nacionalidadPer" => $this->input->post("nacionalidadPer"),
            "sexoPer" => $this->input->post("sexoPer"),
            "nCeduPer" => $this->input->post("nCeduPer"),
            "emailPer" => $this->input->post("emailPer"),
            "telCasaPer" => $this->input->post("telCasaPer"),
            "celPer"=> $this->input->post("celPer"),
            "areaPer" => $this->input->post("areaPer"),
            "cargoPer" => $this->input->post("cargoPer"),
            "depaPer" => $this->input->post("depaPer"),
            "ciuPer" => $this->input->post("ciuPer"),
            "dirPer" => $this->input->post("dirPer"),
            "fechaCreado" => date('Y-m-d'),
            "estadoPer" => $this->input->post("estadoPer"),
        );

        $this->Datacontrol_model->guardarNuevoPersonal($data1);
    }


    public function AgregarRutaVendedor(){
         $data2 = array(
            "idPer" => $this->input->post("idPer"),
            "id_ruta_zona" => $this->input->post("id_ruta_zona")
        );

         $this->Datacontrol_model->AgregarRutaVendedor($data2);
    }


     public function AgregarVehiculoPersonal(){
         $data3 = array(
            "idPer" => $this->input->post("idPer"),
            "urlFotoVehiculo" => $this->input->post("urlFotoVehiculo"),
            "urlCirculacion1" => $this->input->post("urlCirculacion1"),
            "urlCirculacion2" => $this->input->post("urlCirculacion2"),
            "numCirculacion" => $this->input->post("numCirculacion"),
            "numPlacaVehiculo" => $this->input->post("numPlacaVehiculo"),
            "numChasisVehiculo" => $this->input->post("numChasisVehiculo"),
            "numMotorVehiculo" => $this->input->post("numMotorVehiculo"),
            "tipoVehiculo" => $this->input->post("tipoVehiculo"),
            "carroseriaVehiculo" => $this->input->post("carroseriaVehiculo"),
            "colorVehiculo" => $this->input->post("colorVehiculo"),
            "marcaVehiculo" => $this->input->post("marcaVehiculo"),
            "modelVehiculo" => $this->input->post("modelVehiculo"),
            "anoVehiculo" => $this->input->post("anoVehiculo"),
            "cilindrajeVehiculoCm3" => $this->input->post("cilindrajeVehiculoCm3"),
            "numCIlindroVehiculo" => $this->input->post("numCIlindroVehiculo")
        );

          $this->Datacontrol_model->AgregarVehiculoPersonal($data3);
     }



    public function guardarNuevoUsuarioYpermisos(){


        $data = array(
            "idPer" => $this->input->post("idPer"),
            "privi" => $this->input->post("privi"),
            "nomUser" => $this->input->post("nomUser"),
            "passUser" => $this->input->post("passUser"),
            "estadoUser" => $this->input->post("estadoUser"),
            "fechaCreado" => date('Y-m-d') 
        );

        $data2[0] = array(
            ["modules_id"][0] => $this->input->post("venta")
         );
        $data2[1] = array(
           ["modules_id"][0] => $this->input->post("cobro")
        );
        $data2[2] = array(
            ["modules_id"][0] => $this->input->post("compra")
        );
        $data2[3] = array(
            ["modules_id"][0] => $this->input->post("salidas")
        );
        $data2[4] = array(
            ["modules_id"][0] => $this->input->post("cuentas")
        );
        $data2[5] = array(
            ["modules_id"][0] => $this->input->post("inventario")
        );
        $data2[6] = array(
            ["modules_id"][0] => $this->input->post("reportes")
        );
        $data2[7] = array(
            ["modules_id"][0] => $this->input->post("datacontrol")
        );
        $data2[8] = array(
            ["modules_id"][0] => $this->input->post("config")
        );

      $this->Datacontrol_model->guardarNuevoUsuarioYpermisos($data, $data2);

    }


    public function listandoProductos($keyword){

         $this->Main_model->listandoProductos($keyword);
    }

    public function listandoPais(){
        $this->Datacontrol_model->listandoPais();
    }

     public function listandoProveedor(){
        $this->Datacontrol_model->listandoProveedor();
    }

     public function listandoUmedida(){
        $this->Datacontrol_model->listandoUmedida();
    }

    public function listandoDepartamento(){
        $this->Datacontrol_model->listandoDepartamento();
    }

    public function listandoCiudad(){
        $this->Datacontrol_model->listandoCiudad();
    }

    public function listandoAreaLAboral(){
        $this->Datacontrol_model->listandoAreaLAboral();
    }

    public function listandoCargoLaboral(){
        $this->Datacontrol_model->listandoCargoLaboral();
    }

    public function listandoZona(){
        $this->Datacontrol_model->listandoZona();
    }

    public function listandoSubZona(){
        $this->Datacontrol_model->listandoSubZona();
    }

    public function listandoPersonal(){
        $this->Datacontrol_model->listandoPersonal();
    }

    public function listandoPrivilegios(){
        $this->Datacontrol_model->listandoPrivilegios();
    } 

     public function listandoClientes(){
        $this->Main_model->listandoClientes();
    }

    public function listandoTipoVehiculo(){
         $this->Datacontrol_model->listandoTipoVehiculo();
    }

    public function listandoCarroceriaVehiculo($tipoVehiculo){
         $this->Datacontrol_model->listandoCarroceriaVehiculo($tipoVehiculo);

    }

    public function ListandoFacturasXClte($idClte){
        $this->Cobro_model->ListandoFacturasXClte($idClte);
    }


    //Devuelve todos los datos de facturas por usuario
    public function llenarDataTblFact()
    {
        $this->Home_model->llenarDataTblFact();
    }
    public function llenarDataTblFactxUser(){
        echo json_encode($this->Home_model->llenarDataTblFactxUser());
    }

    public function llenarDtPersonal(){
        $this->Datacontrol_model->llenarDtPersonal();
    }

    public function llenarDtUsuario(){
        $this->Datacontrol_model->llenarDtUsuario();
    }

    public function llenarDtProveedor(){
        $this->Datacontrol_model->llenarDtProveedor();
    }

    public function llenarDtProducto(){
        $this->Datacontrol_model->llenarDtProducto();
    }
    
    public function llenarDtCliente(){
        $this->Datacontrol_model->llenarDtCliente();
    }

    public function LlenarDtDetFacturaxNumfact($numFact){
        $this->Home_model->LlenarDtDetFacturaxNumfact($numFact);
    }
    public function LlenarDtDetAbonoXNumfact($numFact){
        $this->Home_model->LlenarDtDetAbonoXNumfact($numFact);
    }

    public function llenartblFacturasXUser($idClte){
        $this->Home_model->llenartblFacturasXUser($idClte);
    }
    public function llenartblReciboXUser($idClte){
        $this->Home_model->llenartblReciboXUser($idClte);
    } 

//Generar excel con PHPExcel
    public function generarExcelFactPendientes($f1,$f2){
        $this->Factpendexport_model->generarExcelFactPendientes($f1,$f2);
    }

}
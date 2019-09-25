<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model
{
	public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
// no puede ser privado porque envia datos para verificar permisos
    public function rutaUsuario(){
        $this->db->from('usuarios');
        $this->db->join('ruta_vendedor as u1',' u1.idPer=usuarios.idPer','left');
        $this->db->join('catalogopersonal as u2',' u2.idPer=usuarios.idPer','left');
        $this->db->join('ruta_zona as rz',' rz.id_ruta_zona=u1.id_ruta_zona','left');
        $this->db->where('nomUser',$this->session->userdata('UserN'));

        $query = $this->db->get();

        $json = array();
        if( $query->num_rows() > 0) {
            $resultado= $query->result_array();

            $i = 0;
             foreach ($resultado as $fila) {
                $json[$i]["idPer"] = $fila["idPer"];
                $json[$i]["nomUser"] = $fila["nomUser"];
                $json[$i]["nomPer"] = $fila["nomPer"];
                $json[$i]["apePer"] = $fila["apePer"];
                $json[$i]["id_ruta_zona"] = $fila["id_ruta_zona"];
                $json[$i]["nom_ruta_zona"] = $fila["nom_ruta_zona"];
                
                 $i++;
            }
        }else{
             return false;
        }
        return $json;
    }



    public function llenarDataTblFactxUser(){

        if($this->session->userdata('RolUser')==1){
            $this->db->from('clientes');
            $this->db->join('factura as u1',' u1.idCliente=clientes.idClte','right');
            $this->db->join('catalogopersonal as u2',' u2.idPer=u1.idPer','left');
            $this->db->where('estadoFact',1);
        }else{
            $data = $this->rutaUsuario();
            $ruta = $data[0]["id_ruta_zona"];
            $this->db->from('clientes');
            $this->db->join('factura as u1',' u1.idCliente=clientes.idClte','right');
            $this->db->join('catalogopersonal as u2',' u2.idPer=u1.idPer','left');
            $this->db->where('idZona',$ruta);
            $this->db->where('estadoFact',1);
        }
       
        $query = $this->db->get();
        $fechaHoy = new DateTime("now");


        $json = array();
        if( $query->num_rows() > 0) {
            $resultado= $query->result_array();

            $i = 0;
            
            foreach ($resultado as $fila) {
                $json["data"][$i]["idFact"] = $fila["idFact"];
                $json["data"][$i]["idZona"] = $this->nomZonaXIdZona($fila["idZona"]);
                $json["data"][$i]["idPer"] = $fila["nomPer"]." ".$fila["apePer"];
                $json["data"][$i]["fechaFact"] = date('d-m-Y',strtotime($fila["fechaFact"]));
                $json["data"][$i]["idCliente"] = $fila["nomClte"]." ".$fila["apeClte"]." - ".$fila["nomLocalClte"];
                $json["data"][$i]["tipoPagoFact"] = $fila["tipoPagoFact"];
                $json["data"][$i]["diaCreditoFact"] = $fila["diaCreditoFact"];
                $json["data"][$i]["totalFact"] = $fila["totalFact"];
                $json["data"][$i]["monedaFact"] = $fila["monedaFact"];
                $json["data"][$i]["fechaVenceFact"] = date('d-m-Y',strtotime($fila["fechaVenceFact"]));
                $json["data"][$i]["totalAbonos"] =$this->totalAbonadoAFactura($fila["idFact"]);
                $json["data"][$i]["diffEntreFechas"] = $fechaHoy->diff(new DateTime($fila["fechaVenceFact"]))->format("%R%a dias");
                $json["data"][$i]["estadoFact"] = $fila["estadoFact"];

                $i++;
            }
       /* }else{
             echo false;*/
        }

        /*echo json_encode($json);*/
        $this->db->close();
        return $json;
    }


    private function nomZonaXIdZona($idZona){
     $res= "";
         $this->db->SELECT("nom_ruta_zona");
        $this->db->FROM("ruta_zona");
        $this->db->WHERE("id_ruta_zona",$idZona);
        $query = $this->db->get();


         if( $query->num_rows() > 0) {
                $resultado= $query->result_array();

                $i = 0;

                
                foreach ($resultado as $fila) {
                    $res= $fila['nom_ruta_zona']; 
                }
            }

         return $res;

    }



    private function totalAbonadoAFactura($idFact){
        $suma=0;
        $this->db->SELECT("recibidoDetRecibo");
        $this->db->FROM("detallerecibo");
        $this->db->WHERE("idFact",$idFact);
        $query = $this->db->get();

        if( $query->num_rows() > 0) {
                $resultado= $query->result_array();

                $i = 0;

                
                foreach ($resultado as $fila) {
                    $suma+= floatval($fila['recibidoDetRecibo']); 
                }
            }
            return $suma;

    }



	public function llenarDataTblFact(){

      
        $this->db->from('factura');
        $this->db->join('catalogopersonal as u1',' u1.idPer=factura.idPer','left');
        $this->db->join('clientes as u2',' u2.idClte=factura.idCliente','left');

          
        $query = $this->db->get();
            $fechaHoy = new DateTime("now");


        $json = array();
        if( $query->num_rows() > 0) {
            $resultado= $query->result_array();

            $i = 0;
            
            foreach ($resultado as $fila) {
                $json["data"][$i]["idZonaFact"] = $fila["idZonaFact"];
                $json["data"][$i]["idFact"] = $fila["idFact"];
               /* $json["data"][$i]["fechaFact"] = date_format(date_create($fila["fechaFact"]),'d-m-y');*/
                $json["data"][$i]["fechaFact"] = date('d-m-Y',strtotime($fila["fechaFact"]));
                $json["data"][$i]["idPer"] = $fila["idPer"]." - ".$fila["nomPer"]." ".$fila["apePer"];
                $json["data"][$i]["idCliente"] = $fila["idClte"]." - ".$fila["nomClte"]." ".$fila["apeClte"];
                $json["data"][$i]["tipoPagoFact"] = $fila["tipoPagoFact"];
                $json["data"][$i]["diaCreditoFact"] = $fila["diaCreditoFact"];
                $json["data"][$i]["totalFact"] = $fila["totalFact"];
                $json["data"][$i]["monedaFact"] = $fila["monedaFact"];
                $json["data"][$i]["fechaVenceFact"] = date('d-m-Y',strtotime($fila["fechaVenceFact"]));
                $json["data"][$i]["diffEntreFechas"] = $fechaHoy->diff(new DateTime($fila["fechaVenceFact"]))->format("%R%a dias");
                $json["data"][$i]["estadoFact"] = $fila["estadoFact"];

                $i++;
            }
        }else{
             echo false;
        }

        echo json_encode($json);
        $this->db->close();
	}





    public function filtrarxfechaFacturas($data){
       
        $this->db->from('factura as fac');
        $this->db->join('catalogopersonal as per',' per.idPer=fac.idPer','left');
        $this->db->join('clientes as cl',' cl.idClte=fac.idCliente','left');
        $this->db->where('fac.fechaFact BETWEEN "'.date('Y-m-d', strtotime($data['desde'])).'" AND "'.date('Y-m-d', strtotime($data['hasta'])).'"');

        
        $fechaHoy = new DateTime("now");
        


        $query = $this->db->get();

        $json = array();
       if( $query->num_rows() > 0) {
            $resultado= $query->result_array();

             $i=0;
            

            foreach ($resultado as $fila) {
            $json["results"][$i]["idFact"] = $fila["idFact"];
            $json["results"][$i]["fechaFact"] = date_format(date_create($fila["fechaFact"]),'d-m-Y');
            $json["results"][$i]["idPer"] = $fila["idPer"]." - ".$fila["nomPer"]." ".$fila["apePer"];
            $json["results"][$i]["idCliente"] = $fila["idCliente"]." - ".$fila["nomClte"]." ".$fila["apeClte"];
            $json["results"][$i]["tipoPagoFact"] = $fila["tipoPagoFact"];
            $json["results"][$i]["diaCreditoFact"] = $fila["diaCreditoFact"];
            $json["results"][$i]["totalFact"] = $fila["totalFact"];
            $json["results"][$i]["monedaFact"] = $fila["monedaFact"];
            $json["results"][$i]["estadoFact"] = $fila["estadoFact"];
            $json["results"][$i]["fechaVenceFact"] = date('d-m-Y',strtotime($fila["fechaVenceFact"]));
            $json["results"][$i]["diffEntreFechas"] = $fechaHoy->diff(new DateTime($fila["fechaVenceFact"]))->format("%R%a dias");

            $i++;
            }
        }else{
            $json["results"][0] = 0;
        }
           

     echo json_encode($json);
            $this->db->close();
  }

  public function filtrarxfechaFacturasxUser($data){


    if($this->session->userdata('RolUser')==1){
            $this->db->from('clientes');
            $this->db->join('factura as u1',' u1.idCliente=clientes.idClte','right');
            $this->db->join('catalogopersonal as u2',' u2.idPer=u1.idPer','left');
            $this->db->where('estadoFact',1);
            $this->db->where('fechaFact BETWEEN "'.date('Y-m-d', strtotime($data['desde'])).'" AND "'.date('Y-m-d H:i:s', strtotime($data['hasta'].' 23:59:59')).'"');

        }else{
            $data2 = $this->rutaUsuario();

            $ruta = $data2[0]["id_ruta_zona"];


            $this->db->from('clientes');
            $this->db->join('factura as u1',' u1.idCliente=clientes.idClte','right');
            $this->db->join('catalogopersonal as u2',' u2.idPer=u1.idPer','left');
            $this->db->where('idZona',$ruta);
            $this->db->where('estadoFact',1);
            $this->db->where('fechaFact BETWEEN "'.date('Y-m-d', strtotime($data['desde'])).'" AND "'.date('Y-m-d H:i:s', strtotime($data['hasta'].' 23:59:59')).'"');
        }





           
        

        
        $fechaHoy = new DateTime("now");
        


        $query = $this->db->get();

        $json = array();
       if( $query->num_rows() > 0) {
            $resultado= $query->result_array();

             $i=0;
            

            foreach ($resultado as $fila) {
                $json["results"][$i]["idFact"] = $fila["idFact"];
                $json["results"][$i]["idZona"] = $this->nomZonaXIdZona($fila["idZona"]);
                $json["results"][$i]["idPer"] = $fila["nomPer"]." ".$fila["apePer"];
                $json["results"][$i]["fechaFact"] = date('d-m-Y',strtotime($fila["fechaFact"]));
                $json["results"][$i]["idCliente"] = $fila["nomClte"]." ".$fila["apeClte"]." - ".$fila["nomLocalClte"];
                $json["results"][$i]["tipoPagoFact"] = $fila["tipoPagoFact"];
                $json["results"][$i]["diaCreditoFact"] = $fila["diaCreditoFact"];
                $json["results"][$i]["totalFact"] = $fila["totalFact"];
                $json["results"][$i]["monedaFact"] = $fila["monedaFact"];
                $json["results"][$i]["fechaVenceFact"] = date('d-m-Y',strtotime($fila["fechaVenceFact"]));
                $json["results"][$i]["totalAbonos"] =$this->totalAbonadoAFactura($fila["idFact"]);
                $json["results"][$i]["diffEntreFechas"] = $fechaHoy->diff(new DateTime($fila["fechaVenceFact"]))->format("%R%a dias");
                $json["results"][$i]["estadoFact"] = $fila["estadoFact"];

                $i++;
            }
       /* }else{
            $json["results"][0] = 0;*/
        }
           
     /*echo json_encode($json);*/
            $this->db->close();
            return $json;
  }



  public function LlenarDtDetFacturaxNumfact($numFact){

      $this->db->select('*');
      $this->db->from('detallefactura');
      $this->db->join('catalogopd as u1', 'u1.codProd=detallefactura.idProd','left');
      $this->db->where('idFact',$numFact);
      $query = $this->db->get();
      $json = array();
      if( $query->num_rows() > 0) {
          $resultado= $query->result_array();

          $i = 0;

          
          foreach ($resultado as $fila) {
              $json["results"][$i]["idProd"] = $fila["idProd"];
            $json["results"][$i]["descProd"] = $fila["descProd"];

            if($fila["bonifDetFact"]>0){
              $json["results"][$i]["cantidadDetFact"] = $fila["cantidadDetFact"]."+". $fila["bonifDetFact"];
              
            }else{

            $json["results"][$i]["cantidadDetFact"] = $fila["cantidadDetFact"];

            }
            
            $json["results"][$i]["pUnitarioDetFact"] = $fila["pUnitarioDetFact"];
            $json["results"][$i]["totalDetFact"] = $fila["totalDetFact"];
            $i++;
          }
      }else{
           echo $json[0]=0;
      }

      echo json_encode($json);
      $this->db->close();


    }

    public function LlenarDtDetAbonoXNumfact($numFact){

      $this->db->select('*');
      $this->db->from('detallerecibo as dr');
      $this->db->join('recibo as r1', 'r1.idRecibo=dr.idRecibo','left');
      $this->db->where('idFact',$numFact);
      $query = $this->db->get();
      $json = array();
      if( $query->num_rows() > 0) {
          $resultado= $query->result_array();

          $i = 0;

          
          foreach ($resultado as $fila) {
              $json["results"][$i]["idRecibo"] = $fila["idRecibo"];
              $json["results"][$i]["recibidoDetRecibo"] = $fila["recibidoDetRecibo"];
              $json["results"][$i]["monedaRecibo"] = $fila["monedaRecibo"];
            $i++;
          }
      }else{
           echo $json["results"][0]["idRecibo"]=null;
      }

      echo json_encode($json);
      $this->db->close();


    }


    public function get_clientes()
     {

        if($this->session->userdata('RolUser')==1){
            $this->db->select("*");
            $this->db->from("clientes");
        }else{
            $data = $this->rutaUsuario();
            $ruta = $data[0]["id_ruta_zona"];
            $this->db->select("*");
            $this->db->from("clientes");
            $this->db->where('idZona',$ruta);
        }



        
          $query =  $this->db->get();

            $json = array();
      if( $query->num_rows() > 0) {
            $resultado= $query->result_array();

            $i = 0;
            
            foreach ($resultado as $fila) {
                $json[$i]["idZona"] = $fila["idZona"];
                $json[$i]["idClte"] = $fila["idClte"];
               /* $json["data"][$i]["fechaFact"] = date_format(date_create($fila["fechaFact"]),'d-m-y');*/
                $json[$i]["nomClte"] = $fila["nomClte"];
                $json[$i]["apeClte"] = $fila["apeClte"];
                $json[$i]["nomLocalClte"] = $fila["nomLocalClte"];
                $json[$i]["depaLocalClte"] = $fila["depaLocalClte"];
                $json[$i]["ciudadLocalClte"] = $fila["ciudadLocalClte"];
                $json[$i]["sexoClte"] = $fila["sexoClte"];
                $json[$i]["celClte"] = $fila["celClte"];
                $json[$i]["telLocalClte"] = $fila["telLocalClte"];
                $i++;
            }
        }else{
            $json();
        }

        return json_encode($json);
        $this->db->close();
     }


     public function llenartblFacturasXUser($idClte){
        $this->db->select('*');
        $this->db->from('factura');
        $this->db->where('idCliente',$idClte);
        $query = $this->db->get();
        $json = array();
        if( $query->num_rows() > 0) {
            $resultado= $query->result_array();

            $i = 0;

          
            foreach ($resultado as $fila) {
                $json["results"][$i]["idFact"] = $fila["idFact"];
                $json["results"][$i]["fechaFact"] = $fila["fechaFact"];
                $json["results"][$i]["tipoPagoFact"] = $fila["tipoPagoFact"];
                $json["results"][$i]["diaCreditoFact"] = $fila["diaCreditoFact"];
                $json["results"][$i]["monedaFact"] = $fila["monedaFact"];
                $json["results"][$i]["totalFact"] = $fila["totalFact"];
                $i++;
            }
        }else{
           echo $json[0]=0;
        }

        echo json_encode($json);
        $this->db->close();
    }


    public function llenartblReciboXUser($idClte){
        $this->db->select('*');
        $this->db->from('recibo as r');
        $this->db->JOIN('detallerecibo as dr','dr.idRecibo = r.idRecibo');
        $this->db->where('r.idCliente',$idClte);
        $query = $this->db->get();
        $json = array();
        if( $query->num_rows() > 0) {
            $resultado= $query->result_array();

            $i = 0;

          
            foreach ($resultado as $fila) {
                $json["results"][$i]["idRecibo"] = $fila["idRecibo"];
                $json["results"][$i]["fechaRecibo"] = $fila["fechaRecibo"];
                $json["results"][$i]["formaPago"] = $fila["formaPago"];
                $json["results"][$i]["idFact"] = $fila["idFact"];
                $json["results"][$i]["concepRecibo"] = $fila["concepRecibo"];
                $json["results"][$i]["monedaRecibo"] = $fila["monedaRecibo"];
                $json["results"][$i]["recibidoDetRecibo"] = $fila["recibidoDetRecibo"];
                $i++;
            }
        }else{
           echo $json[0]=0;
        }

        echo json_encode($json);
        $this->db->close();
    } 


	/*public function llenarHighchartPieMetaVenta()
    {
    	


    }

    public function infoVntsRecuperado()
    {
    	 $query = $this->sqlsrv->fetchArray("SELECT Venta from Stad_Articulos_Facturados",SQLSRV_FETCH_ASSOC);
    	 $suma = 0;
       
 		$i = 0;
        $json = array();
        foreach ($query as $fila) {
            
            $json["data"][$i]["Venta"]   = $fila["Venta"];
            $suma+=$json["data"][$i]["Venta"];
            $i++;
        }
        echo number_format(($suma),2);
        $this->sqlsrv->close();
    }

     public function infoVntsMeta()
    {
    	 $query = $this->sqlsrv->fetchArray("SELECT META from vm_metas",SQLSRV_FETCH_ASSOC);
    	 $suma = 0;
       
 		$i = 0;
        $json = array();
        foreach ($query as $fila) {
            
            $json["data"][$i]["META"]   = $fila["META"];
            $suma+=$json["data"][$i]["META"];
            $i++;
        }
        echo number_format(($suma),2);
        $this->sqlsrv->close();
    }*/

}
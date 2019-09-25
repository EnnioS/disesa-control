<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cobro_model extends CI_Model
{

  public function __construct()
  {
      parent::__construct();
      $this->load->database();
  }
    

  public function getDatosRecibo(){
    $fechaHoy = new DateTime("now");
    $this->db->from('recibo');
    $this->db->join('catalogopersonal as u1',' u1.idPer=recibo.idPer','left');
    $this->db->join('clientes as u2',' u2.idClte=recibo.idCliente','left');
    $query = $this->db->get();

    $json = array();
    if( $query->num_rows() > 0) {
        $resultado= $query->result_array();

      $i = 0;
      
      foreach ($resultado as $fila) {
          $json["data"][$i]["idRecibo"] = $fila["idRecibo"];
          $json["data"][$i]["fechaRecibo"] = date('d-m-Y',strtotime($fila["fechaRecibo"]));
          $json["data"][$i]["nomPer"] = $fila["nomPer"];
          $json["data"][$i]["apePer"] = $fila["apePer"];
          $json["data"][$i]["idPer"] = $fila["idPer"];
          $json["data"][$i]["nomClte"] = $fila["nomClte"];
          $json["data"][$i]["idCliente"] = $fila["idCliente"];
          $json["data"][$i]["nomLocalClte"] = $fila["nomLocalClte"];
          $json["data"][$i]["concepRecibo"] = $fila["concepRecibo"];
          $json["data"][$i]["totalRecibidoRecibo"] = $fila["montoRecibo"];
          $json["data"][$i]["estadoRecibo"] = $fila["estadoRecibo"];

          $i++;
        }
    }else{
       echo false;
    }

    echo json_encode($json);
    $this->db->close();
  }
  

	public function verifExistidRecibo($idRecibo){
		  
		$this->db->SELECT('*');
		$this->db->FROM('recibo');
		$this->db->WHERE('idRecibo',$idRecibo);
		$query = $this->db->get();

	    if ($query->num_rows()>0) {
	      echo true;
	  	}else{
	      echo false;
	  	}
  	}



    public function saldoFactura($idFact){
      $this->db->select('*');
      $this->db->from('factura');
      $this->db->join('detallerecibo as u1','u1.idFact = factura.idFact', 'left');
      $this->db->where('factura.idFact',$idFact);
      $this->db->where('estadoFact',1);

       $query = $this->db->get();

    $json = array();
    if( $query->num_rows() > 0) {
        $resultado= $query->result_array();

      $i = 0;
      
      foreach ($resultado as $fila) {
          $json[$i]["idFact"] = $fila["idFact"];
          $json[$i]["idRecibo"] = $fila["idRecibo"];
          $json[$i]["recibidoDetRecibo"] = $fila["recibidoDetRecibo"];
          $json[$i]["totalFact"] = $fila["totalFact"];

          $i++;
        }
    }else{
       echo false;
    }

    echo json_encode($json);
    $this->db->close();
    }

  public function ListandoFacturasXClte($idClte){
    $temp=array();
    $i=0;
  
    $this->db->select('idFact');
    $this->db->from('factura');
    $this->db->where('idCliente',$idClte);
    $this->db->where('estadoFact',1);

    $query = $this->db->get();

 
   if( $query->num_rows() > 0) {
       foreach ($query->result_array() as $key) {
        $temp[] = array(
            'numFact' => $key["idFact"]

        );
            $i++;
         }
        echo json_encode($temp);
    }else {
        echo false;
    }

 }




  public function agregarNuevoRecibo($data){
    $query = $this->db->insert('recibo',$data);
    

     if ($query) {
        echo true;
     }else{
        echo false;
     }

  }



      

  public function AgregarDetalleRecibo($data){
    foreach ($data as $key=>$value){
    $query = $this->db->insert('detallerecibo',$value);
    }

     if ($query) {
        echo true;
     }else{
        echo false;
     }

  }



  public function actualizarEstadoFact($data){
   
    foreach($data as $d){
      $this->db->where("idFact",$d["idFact"]);
      $this->db->update("factura", array("estadoFact" => $d["estadoFact"]));
    }
  }

  public function guardarRemanente($data){
    foreach($data as $d){
      $this->db->insert("remanente_cobro",$d);

    }
  }

}
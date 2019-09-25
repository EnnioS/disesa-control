<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compra_model extends CI_Model
{
	public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function listandoTipoFacturaCompra(){

	    $temp=array();
	    $i=0;
	  
	    $this->db->select('*');
	    $this->db->from('tipofactcompra');

	    $query = $this->db->get();

	 
	   if( $query->num_rows() > 0) {
	       foreach ($query->result_array() as $key) {
	        $temp[] = array(
	            'idTipo' => $key["idTipoFactCompra"],
	            'nomTipo' => $key["nomTipoFactCompra"]
	        );
	            $i++;
	         }
	        echo json_encode($temp);
	    }else {
	        echo false;
	    }     
    }



	public function getDatosFacturasCompra(){
		$this->db->from('factura_compra');
		$this->db->join('catalogopersonal as u1',' u1.idPer=factura_compra.idPer','left');
		$this->db->join('catalogoprov as u2',' u2.codProv=factura_compra.idProv','left');
		$query = $this->db->get();

		$json = array();
    if( $query->num_rows() > 0) {
        $resultado= $query->result_array();

      $i = 0;
      
      foreach ($resultado as $fila) {
          $json["data"][$i]["IdFactComp"] = $fila["IdFactComp"];
          $json["data"][$i]["NFactComp"] = $fila["NFactComp"];
          $json["data"][$i]["IdPer"] = $fila["IdPer"];
          $json["data"][$i]["nomPer"] = $fila["nomPer"];
          $json["data"][$i]["apePer"] = $fila["apePer"];
          $json["data"][$i]["idProv"] = $fila["idProv"];
          $json["data"][$i]["nomProv"] = $fila["nomProv"];
          $json["data"][$i]["fechaFactComp"] = date('d-m-Y',strtotime($fila["fechaFactComp"]));
          $json["data"][$i]["nomEntregaFactComp"] = $fila["nomEntregaFactComp"];
          $json["data"][$i]["tipoPagoFactComp"] = $fila["tipoPagoFactComp"];
          $json["data"][$i]["diaCreditoFactComp"] = $fila["diaCreditoFactComp"];
          $json["data"][$i]["monedaFactComp"] = $fila["monedaFactComp"];
          $json["data"][$i]["TotalFactComp"] = $fila["TotalFactComp"];
          $json["data"][$i]["estadoFactCompra"] = $fila["estadoFactCompra"];
          $json["data"][$i]["fechaFactCompVence"] = date('d-m-Y',strtotime($fila["fechaFactCompVence"]));

          $i++;
        }
    }

    echo json_encode($json);
    $this->db->close();
  }


  public function getDatosRecCompra(){

  	$this->db->from('recibo_compra');
		$this->db->join('catalogopersonal as u1',' u1.idPer=recibo_compra.idPer','left');
		$this->db->join('catalogoprov as u2',' u2.codProv=recibo_compra.idProv','left');
		$query = $this->db->get();

		$json = array();
    if( $query->num_rows() > 0) {
        $resultado= $query->result_array();

      $i = 0;
      
      foreach ($resultado as $fila) {
          $json["data"][$i]["idRecCom"] = $fila["idRecCom"];
          $json["data"][$i]["nRecCom"] = $fila["nRecCom"];
          $json["data"][$i]["idPer"] = $fila["idPer"];
          $json["data"][$i]["nomPer"] = $fila["nomPer"];
          $json["data"][$i]["apePer"] = $fila["apePer"];
          $json["data"][$i]["idProv"] = $fila["idProv"];
          $json["data"][$i]["nomProv"] = $fila["nomProv"];
          $json["data"][$i]["fechaRecCom"] = date('d-m-Y',strtotime($fila["fechaRecCom"]));
          $json["data"][$i]["nomEntregaRecComp"] = $fila["nomEntregaRecComp"];
          $json["data"][$i]["formPagoRecCom"] = $fila["formPagoRecCom"];
          $json["data"][$i]["monedaRecCom"] = $fila["monedaRecCom"];
          $json["data"][$i]["tasaCambio"] = $fila["tasaCambio"];
          $json["data"][$i]["nomBancoRecCom"] = $fila["nomBancoRecCom"];
          $json["data"][$i]["nCkBancoRecCom"] = $fila["nCkBancoRecCom"];
          $json["data"][$i]["conceptRecCom"] = $fila["conceptRecCom"];
          $json["data"][$i]["ObsevRecCom"] = $fila["ObsevRecCom"];
          $json["data"][$i]["totalRecCom"] = $fila["totalRecCom"];
          $json["data"][$i]["estadoRecCom"] = $fila["estadoRecCom"];

          $i++;
        }
    }

    echo json_encode($json);
    $this->db->close();

  }


   public function verifExistidfaturaCompra($NFactComp){
   		$this->db->SELECT('*');
	    $this->db->FROM('factura_compra');
	    $this->db->WHERE('NFactComp',$NFactComp);
	    $query = $this->db->get();

	     if ($query->num_rows()>0) {
	        echo true;
	    }else{
	        echo false;
	    }
	}


	public function verifExistidReciboComp($nRecCom){
		 $this->db->SELECT('*');
	    $this->db->FROM('recibo_compra');
	    $this->db->WHERE('nRecCom',$nRecCom);
	    $query = $this->db->get();

	     if ($query->num_rows()>0) {
	        echo true;
	    }else{
	        echo false;
	    }

	}


	public function agregarNuevaFacturaCompra($data){
		$query = $this->db->insert('factura_compra',$data);
        

	    if ($query) {
	         echo $this->db->insert_id();     
	    } else {
	          echo false;
	    }

	}

	public function agregarNuevoRecComp($data){
		$query = $this->db->insert('recibo_compra',$data);
        

	    if ($query) {
	         echo $this->db->insert_id();     
	    } else {
	          echo false;
	    }

	}

	public function AgregarDetalleFactCompra($data){
		
		foreach ($data as $key=>$value){
      	$query = $this->db->insert('detalle_fact_compra',array('IdFactComp' => $value['IdFactComp'], 'NFactComp'=> $value['NFactComp'], 'idProd' => $value['idProd'],'cantDetFComp' => $value['cantDetFComp'], 'pUnitDetFComp' => $value['pUnitDetFComp'],'totalDetFComp' => $value['totalDetFComp']) );
      }

       if ($query) {
          echo true;
       }else{
          echo false;
       }
   }

	public function AgregarDetalleRecComp($data){
		foreach ($data as $key => $value){
      	$query = $this->db->insert('detalle_rec_compra',array('NRecComp' => $value['NRecComp'], 'idRecComp' => $value['idRecComp'], 'NumFactComp' => $value['NumFactComp'], 'recibidoDetComp' => $value['recibidoDetComp']));
      }

       if ($query) {
          echo true;
       }else{
          echo false;
       }
	}

	public function agrergarRemanenteReciboCompra($data){
		$query = $this->db->insert('remanente_cobro',$data);
	}

	public function ColectarTotalFactComp($idFactComp){
   		$this->db->SELECT('*');
	    $this->db->FROM('factura_compra');
		$this->db->join('detalle_rec_compra as u1',' u1.idFactComp = factura_compra.IdFactComp','left');
	    $this->db->WHERE('factura_compra.IdFactComp',2);
	    $query = $this->db->get();

	    $json = array();
	    if( $query->num_rows() > 0) {

	        $resultado = $query->result_array();
	          $i = 0;
      
      	foreach ($resultado as $fila) {
	     
	          $json[$i]["IdFactComp"] = $fila["IdFactComp"];
	          $json[$i]["NFactComp"] = $fila["NFactComp"];
	          $json[$i]["TotalFactComp"] = $fila["TotalFactComp"];
	          $json[$i]["idDetRecCom"] = $fila["idDetRecCom"];
	          $json[$i]["NRecComp"] = $fila["NRecComp"];
	          $json[$i]["recibidoDetComp"] = $fila["recibidoDetComp"];
	          $i++;
	     }
	  
	    echo json_encode($json);
		}else{
			echo false;
		}

	}

	private function leerIdFacturaCompra(){
		$this->db->SELECT('*');
	    $this->db->FROM('factura_compra');
	    $query = $this->db->get();
	}
  

	
} ?>
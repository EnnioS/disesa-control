<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compra_controller extends CI_Controller {

	public function getDatosFacturasCompra(){
		$this->Compra_model->getDatosFacturasCompra();
	}

	public function listandoTipoFacturaCompra(){
		$this->Compra_model->listandoTipoFacturaCompra();
	}

	 public function verifExistidfaturaCompra(){

	    $NFactComp = $this->input->post("NFactComp");

	    $this->Compra_model->verifExistidfaturaCompra($NFactComp);

	}

	public function verifExistidReciboComp(){
		 $nRecCom = $this->input->post("nRecCom");

	    $this->Compra_model->verifExistidReciboComp($nRecCom);
	}

	public function agregarNuevaFacturaCompra(){
		$data = array(
			"NFactComp" => $this->input->post("NFactComp"),
	        "tipoFactCompra" => $this->input->post("tipoFactCompra"),
	        "idPer" => $this->input->post("idPer"),
	        "idProv" => $this->input->post("idProv"),
	        "fechaFactComp"  => $this->input->post("fechaFactComp"),
	        "nomEntregaFactComp"  => $this->input->post("nomEntregaFactComp"),
	        "tipoPagoFactComp"  => $this->input->post("tipoPagoFactComp"),
	        "diaCreditoFactComp" => $this->input->post("diaCreditoFactComp"),
	        "monedaFactComp" => $this->input->post("monedaFactComp"),
	        "TotalFactComp" => $this->input->post("TotalFactComp"),
	        "estadoFactCompra" => $this->input->post("estadoFactCompra"),
	        "fechaFactCompVence" => $this->input->post("fechaFactCompVence")
		);
		$this->Compra_model->agregarNuevaFacturaCompra($data);
	}


	public function agregarNuevoRecComp(){

		$data = array(
			"fechaRecCom" => $this->input->post("fechaRecCom"),
	        "nRecCom" => $this->input->post("nRecCom"),
	        "idPer" => $this->input->post("idPer"),
	        "idProv" => $this->input->post("idProv"),
	        "tipoRecComp"  => $this->input->post("tipoRecComp"),
	        "nomEntregaRecComp"  => $this->input->post("nomEntregaRecComp"),
	        "formPagoRecCom"  => $this->input->post("formPagoRecCom"),
	        "monedaRecCom" => $this->input->post("monedaRecCom"),
	        "tasaCambio" => $this->input->post("tasaCambio"),
	        "nomBancoRecCom" => $this->input->post("nomBancoRecCom"),
	        "nCkBancoRecCom" => $this->input->post("nCkBancoRecCom"),
	        "conceptRecCom" => $this->input->post("conceptRecCom"),
	        "ObsevRecCom" => $this->input->post("ObsevRecCom"),
	        "estadoRecCom" => $this->input->post("estadoRecCom"),
	        "totalRecCom" => $this->input->post("totalRecCom")
		);
		$this->Compra_model->agregarNuevoRecComp($data);

	}

	public function AgregarDetalleFactCompra(){
		  $data = $_POST['data'];

        $this->Compra_model->AgregarDetalleFactCompra($data);

	}

	public function AgregarDetalleRecComp(){
		$data = $_POST['data'];

        $this->Compra_model->AgregarDetalleRecComp($data);
	}

	public function getDatosRecCompra(){
		$this->Compra_model->getDatosRecCompra();
	}

	

	public function ColectarTotalFactComp(){
		$idFComp = $this->input->post("idfactComp");

		$this->Compra_model->ColectarTotalFactComp($idFComp);
	}
}
?>
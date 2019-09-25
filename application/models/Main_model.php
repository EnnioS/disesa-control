<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_model extends CI_Model
{
    public function __construct()
    {
        $this->lang->load('modules','english');
        parent::__construct();
        $this->load->helper('date');
    }

    
    public function lst_ajax_Modulos($Id) {

        $temp = array();
        $i=0;
        $data = $this->db->get("modules");
        if ($data->num_rows()>0) {
            foreach ($data->result_array() as $key) {

                $Permisos = $Id.",'".$key['Modulo_name_id']."'";


                $data = array(
                    'id'         => $i ,
                    'checked'       => $this->has_permission
                    (
                        $key['Modulo_name_id'],
                        $Id
                    ),
                    'onClick'       => 'getPermiso('.$Permisos.')',
                    'class'         => 'filled-in'

                );



                $temp["data"][$i]["Id"]     = $key['Modulo_id'];
                $temp["data"][$i]["name"]   = $key['Modulo_full_name'];
                $temp["data"][$i]["chck"]   = form_checkbox($data);
                $i++;
            }

        }

        echo json_encode($temp);
    }
    function has_permission($module_id,$person_id)
    {
        if($module_id==null)
        {
            return true;
        }

        $query = $this->db->get_where('permissions',
            array(
                'Usuario_id' => $person_id,
                'modules_id'=>$module_id
            ), 1);
        return $query->num_rows() == 1;


    }
    public function lst_ajax_SavePermisos($Usuario,$Modulo) {

        if ($this->has_permission($Modulo,$Usuario)==false){
            $this->db->insert('permissions', array (
                'Usuario_id' => $Usuario,
                'modules_id' => $Modulo,
                'FechaCreacion' => date("Y-m-d"),
                'usuarioCU' => $this->session->userdata('id')

            ));
            echo json_encode(($this->db->affected_rows() > 0) ? 1 : 0);
        }else{
            $this->db->delete('permissions',
                array(
                    'Usuario_id' => $Usuario,
                    'modules_id' => $Modulo
                ), 1);
            echo json_encode(($this->db->affected_rows() > 0) ? 1 : 0);
        }


    }

    public function get_permission() {
        $Id  = $this->session->userdata('id');
        $data = $this->db->query("SELECT * FROM view_permissions WHERE Usuario_id = '$Id'");
        if ($data->num_rows()>0) {
            return $data->result_array();
        }
        return 0;

    }


//Desde aqui codigos POR ENNIO SAENZ


  public function verifExistidfatura($idFact){     
      
      $this->db->SELECT('*');
      $this->db->FROM('factura');
      $this->db->WHERE('idFact',$idFact);
      $query = $this->db->get();

       if ($query->num_rows()>0) {
          echo true;
      }else{
          echo false;
      }
  }


  public function agregarNuevaFactura($data){
     date_default_timezone_set("UTC");
      date_default_timezone_set('America/Managua');
      $query = $this->db->insert('factura',array('idFact'=> $data['idFact'], 'idCliente' => $data['idCliente'], 'idPer' => $data['idPer'],'fechaFact' => $data['fechaFact'], 'tipoPagoFact' => $data['tipoPagoFact'],'diaCreditoFact' => $data['diaCreditoFact'], 'fechaVenceFact' => $data['fechaVenceFact'], 'totalFact' => $data['totalFact'], 'estadoFact' => $data['estadoFact'], 'monedaFact' => $data['monedaFact'],'fechaRegFact'=> date('Y-m-d H:m:s'),'userRegFact' => $data['userRegFact']));
        

      if ($query) {
         echo true;     
      } else {
          echo false;
      }

   }

    

  public function AgregarDetalleFacturas($data){
      foreach ($data as $key=>$value){
      $query = $this->db->insert('detallefactura',array('idFact'=> $value['idFact'], 'idProd' => $value['idProd'], 'descripDetFact' => $value['descripDetFact'],'cantidadDetFact' => $value['cantidadDetFact'], 'bonifDetFact' => $value['cantBonifDetFact'], 'pUnitarioDetFact' => $value['pUnitarioDetFact'],'totalDetFact' => $value['totalDetFact']));
      }

       if ($query) {
          echo true;
       }else{
          echo false;
       }

  }

  

  public function listandoClientes(){
    $temp=array();
    $i=0;
  
    $this->db->select('*');
    $this->db->from('clientes');
    $this->db->order_by("nomClte", "asc");

    $query = $this->db->get();

 
   if( $query->num_rows() > 0) {
       foreach ($query->result_array() as $key) {
        $temp[] = array(
            'idClte' => $key["idClte"],
            'nomClte' => $key["idClte"]." - ".$key["nomClte"]." ".$key["apeClte"]." - ".$key["nomLocalClte"],
            'nomLoc'=> $key["nomLocalClte"]
        );
            $i++;
         }
        echo json_encode($temp);
    }else {
        echo false;
    }     
  }



  public function listandoProductos($keyword){
     if (empty($keyword)){
            echo json_encode([]); 
        }else{

          $temp=array();
          $i=0;

          $this->db->from("catalogopd");
          $this->db->LIKE("descProd",$keyword);
          //$this->db->LIKE("descProd",$keyword,"after");
          $this->db->order_by("catalogopd.descProd asc");
          $query = $this->db->get();
         

          if ($query->num_rows()>0) {
              foreach ($query->result_array() as $key) {
                  $temp[] = array(
                      'nomProd' => $key['descProd'],
                      'codProd' => $key['codProd'],
                      'value' => $key['descProd']
                  );
              }
              echo json_encode($temp);
          }else {
              echo false;
          } 
        }

  }



}
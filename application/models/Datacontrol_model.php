<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datacontrol_model extends CI_Model
{

	public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

	public function guardarNuevoProveedor($datda){

		$query = $this->db->INSERT("catalogoprov",$datda);
		 if ($query) {
           echo true;     
        } else {
            echo false;
        }
		
	}

    public function guardarNuevoProducto($datda){

        $query = $this->db->INSERT("catalogopd",$datda);
         if ($query) {
           echo true;     
        } else {
            echo false;
        }
        
    }
    public function guardarNuevoCliente($datda){
     	 $query = $this->db->INSERT("clientes",$datda);
         if ($query) {
           echo true;     
        } else {
            echo false;
        }

     }

    public function guardarNuevoPersonal($data1){
         $query = $this->db->INSERT("catalogopersonal",$data1);
         if ($query) {
          
           echo true;     
        } else {
            echo false;
        }

     }

    public function AgregarRutaVendedor($data2){
        $query = $this->db->INSERT("ruta_vendedor",$data2);
         if ($query) {
           echo true;     
        } else {
            echo false;
        }
    }

    public function AgregarVehiculoPersonal($data3){
      $query = $this->db->INSERT("vehiculos",$data3);
         if ($query) {
           echo true;     
        } else {
            echo false;
        }
    }

     

    public function guardarNuevoUsuarioYpermisos($data, $data2){
     	$query = $this->db->INSERT("usuarios",$data);
      if ($query) {
        $res = $this->leeridUser($data);
        $Usuario_id = array(
        "Usuario_id" => $res,
        "FechaCreacion" => date('Y-m-d'));
         
         
        $this->guardarPermisosModulos($data2, $Usuario_id);

        echo 1;

      } 

      $this->db->close();
        
    }

     function leeridUser($data){
     	
     	$this->db->SELECT("*");
     	$this->db->FROM("usuarios");
     	$this->db->WHERE("idPer",$data["idPer"]);
     	$query = $this->db->get();
     	

     		if ($query->num_rows()>0) {
     			$res = $query->result_array()[0]['idUser'];
     			return $res;
            
        }else{
        	return false;

        }
         
     }

      function guardarPermisosModulos($data2, $Usuario_id){
      
      	
     	foreach ($data2 as $key ) {

     		if($key["modules_id"]!=""){
     		
	     		$query = $this->db->INSERT("permissions",array("Usuario_id" => $Usuario_id["Usuario_id"],"modules_id" => $key["modules_id"],"FechaCreacion" => $Usuario_id["FechaCreacion"]));
	     	}
	    		
        }
        
     }


	public function validarCodigoProv($codProv){
		$this->db->SELECT("*");
		$this->db->FROM("catalogoprov");
		$this->db->WHERE("codProv",$codProv["codProv"]);
		$query = $this->db->get();

		if ($query->num_rows()>0) {
            echo 1;
        }else{
        	echo 0;
        }
        

	}




    public function validarCodigoProd($codProd){
        $this->db->SELECT("*");
        $this->db->FROM("catalogopd");
        $this->db->WHERE("codProd",$codProd["codProd"]);
        $query = $this->db->get();

        if ($query->num_rows()>0) {
            echo 1;
        }else{
            echo 0;
        }
        

    }


      public function validarCodCliente($idClte){
      	$this->db->SELECT("*");
        $this->db->FROM("clientes");
        $this->db->WHERE("idClte",$idClte["idClte"]);
        $query = $this->db->get();

        if ($query->num_rows()>0) {
            echo 1;
        }else{
            echo 0;
        }
      }


      public function validaeNomPersonal($idPer){
      	$this->db->SELECT("*");
        $this->db->FROM("usuarios");
        $this->db->WHERE("idPer",$idPer["idPer"]);
        $query = $this->db->get();

        if ($query->num_rows()>0) {
            echo 1;
        }else{
            echo 0;
        }
    }

    public function validarNomUsuario($nomUser){
    	$this->db->SELECT("*");
        $this->db->FROM("usuarios");
        $this->db->WHERE("nomUser",$nomUser["nomUser"]);
        $query = $this->db->get();

        if ($query->num_rows()>0) {
            echo 1;
        }else{
            echo 0;
        }
    }



        public function obtenerUltimoCodPerAgregado(){
             $this->db->SELECT("*");
            $this->db->FROM("llaves");
            $this->db->WHERE("prefijos","DP");
            $query = $this->db->get();

           
         $json = array();
        if ($query->num_rows()>0) {

            $json[0]['prefijos'] =$query->result_array()[0]['prefijos'] ;
            $json[0]['ultimoIntAsignado'] = $query->result_array()[0]['number'];
    
            $this->db->close();
            // $query2 =  $this->db->update('llaves',array('FARMACIA'=> $sumar), array('Ruta' => "US1"));

             echo json_encode($json);

        }else{
            echo false;
        }

    }

    public function actualizarUltimoCodPerAgregado($data,$where){

      $query = $this->db->update('llaves', $data,$where);
       
      if ($query) {
         echo true;     
      } else {
          echo false;
      }
    }






	public function listandoPais() {
      $temp=array();
      $i=0;
    
      $this->db->select('*');
      $this->db->from('pais');

      $query = $this->db->get();

   
     if( $query->num_rows() > 0) {
         foreach ($query->result_array() as $key) {
          $temp[] = array(
              'idPais' => $key["idPais"],
              'nomPais' => $key["nomPais"],
              'urlBanderaPais' => $key["urlBanderaPais"]

          );
              $i++;
           }
          echo json_encode($temp);
      }else {
          echo false;
      }      
    }


    public function listandoProveedor(){
      $temp=array();
      $i=0;
    
      $this->db->select('*');
      $this->db->from('catalogoprov');

      $query = $this->db->get();

   
     if( $query->num_rows() > 0) {
         foreach ($query->result_array() as $key) {
          $temp[] = array(
              'codProv' => $key["codProv"],
              'nomProv' => $key["nomProv"]

          );
              $i++;
           }
          echo json_encode($temp);
      }else {
          echo false;
      }      
    }


    public function listandoUmedida(){
      $temp=array();
      $i=0;
    
      $this->db->select('*');
      $this->db->from('unid_medida');

      $query = $this->db->get();

   
     if( $query->num_rows() > 0) {
         foreach ($query->result_array() as $key) {
          $temp[] = array(
              'idUm' => $key["id_unid_medida"],
              'nomUm' => $key["nom_unid_medida"],
              'abreUm' => $key["abrev_unid_medida"]

          );
              $i++;
           }
          echo json_encode($temp);
      }else {
          echo false;
      }      
     }



     public function listandoDepartamento(){
     	$temp=array();
        $i=0;
      
        $this->db->select('*');
        $this->db->from('depar_cond');

        $query = $this->db->get();

     
       if( $query->num_rows() > 0) {
           foreach ($query->result_array() as $key) {
            $temp[] = array(
                'idDep' => $key["id_Dept_cond"],
                'nomDep' => $key["nom_Dept_cond"]

            );
                $i++;
             }
            echo json_encode($temp);
        }else {
            echo false;
        }      
    }

    public function listandoCiudad(){
    	$temp=array();
        $i=0;
      
        $this->db->select('*');
        $this->db->from('ciudad');

        $query = $this->db->get();

     
       if( $query->num_rows() > 0) {
           foreach ($query->result_array() as $key) {
            $temp[] = array(
                'idCiu' => $key["id_Ciudad"],
                'nomCiu' => $key["nom_Ciudad"]

            );
                $i++;
             }
            echo json_encode($temp);
        }else {
            echo false;
        }      
    }

    public function listandoAreaLAboral(){
    	$temp=array();
        $i=0;
      
        $this->db->select('*');
        $this->db->from('area_laboral');

        $query = $this->db->get();

     
       if( $query->num_rows() > 0) {
           foreach ($query->result_array() as $key) {
            $temp[] = array(
                'idArea' => $key["idArea"],
                'nomArea' => $key["nomArea"]

            );
                $i++;
             }
            echo json_encode($temp);
        }else {
            echo false;
        }      
    }

	public function listandoCargoLaboral(){
	  	$temp=array();
	      $i=0;
	    
	      $this->db->select('*');
	      $this->db->from('cargo_laboral');

	      $query = $this->db->get();

	   
	   if( $query->num_rows() > 0) {
	       foreach ($query->result_array() as $key) {
	        $temp[] = array(
	            'idCar' => $key["idCargo"],
	            'nomCar' => $key["nomCargo"]

	        );
	            $i++;
	         }
	        echo json_encode($temp);
	    }else {
	        echo false;
	    }      
  	}

  	public function listandoZona(){
	   	$temp=array();
	    $i=0;
	  
	    $this->db->select('*');
	    $this->db->from('ruta_zona');

	    $query = $this->db->get();

	 
	   if( $query->num_rows() > 0) {
	       foreach ($query->result_array() as $key) {
	        $temp[] = array(
	            'idZon' => $key["id_ruta_zona"],
	            'nomZon' => $key["nom_ruta_zona"]

	        );
	            $i++;
	         }
	        echo json_encode($temp);
	    }else {
	        echo false;
	    }
  	}

  	public function listandoSubZona(){
	  	$temp=array();
	    $i=0;
	  
	    $this->db->select('*');
	    $this->db->from('sub_ruta_zona');

	    $query = $this->db->get();

	 
	   if( $query->num_rows() > 0) {
	       foreach ($query->result_array() as $key) {
	        $temp[] = array(
	            'idSubZon' => $key["id_sub_ruta_zona"],
	            'nomSubZon' => $key["des_ruta_zona"]

	        );
	            $i++;
	         }
	        echo json_encode($temp);
	    }else {
	        echo false;
	    }
  	}


  	public function listandoPersonal(){
  		$temp=array();
	    $i=0;
	  
	    $this->db->select('*');
	    $this->db->from('catalogopersonal');
	    $this->db->where('estadoPer',1);

	    $query = $this->db->get();

	 
	   if( $query->num_rows() > 0) {
	       foreach ($query->result_array() as $key) {
	        $temp[] = array(
	            'idPer' => $key["idPer"],
	            'nomPer' => $key["nomPer"]." ".$key["apePer"]

	        );
	            $i++;
	         }
	        echo json_encode($temp);
	    }else {
	        echo false;
	    }

    }

    public function listandoPrivilegios(){
    	$temp=array();
	    $i=0;
	  
	    $this->db->select('*');
	    $this->db->from('privilegios');

	    $query = $this->db->get();

	 
	   if( $query->num_rows() > 0) {
	       foreach ($query->result_array() as $key) {
	        $temp[] = array(
	            'idPriv' => $key["idPrivi"],
	            'nomPriv' => $key["nomPrivi"]

	        );
	            $i++;
	         }
	        echo json_encode($temp);
	    }else {
	        echo false;
	    }

    }


    public function listandoTipoVehiculo(){
      $temp=array();
      $i=0;
    
      $this->db->select('*');
      $this->db->from('tipo_vehiculo');

      $query = $this->db->get();

   
     if( $query->num_rows() > 0) {
         foreach ($query->result_array() as $key) {
          $temp[] = array(
              'idTipo' => $key["idTipoVehiculo"],
              'nomTipo' => $key["tipoVehiculo"]

          );
              $i++;
           }
          echo json_encode($temp);
      }else {
          echo false;
      }

    }

    public function listandoCarroceriaVehiculo($tipoVehiculo){
      $temp=array();
      $i=0;
    
      $this->db->select('*');
      $this->db->from('tipo_carroceria_vehiculo');
      $this->db->where('idTipoVehiculo',$tipoVehiculo);

      $query = $this->db->get();

   
     if( $query->num_rows() > 0) {
         foreach ($query->result_array() as $key) {
          $temp[] = array(
              'idTipo' => $key["idTipoCarroceriaVehiculo"],
              'nomTipo' => $key["carroceriaVehiculo"]

          );
              $i++;
           }
          echo json_encode($temp);
      }else {
          echo false;
      }
    }




    public function llenarDtPersonal(){
      
        $query = $this->db->get('catalogopersonal');

        $json = array();
        if( $query->num_rows() > 0) {
            $resultado= $query->result_array();

            $i = 0;

            
            foreach ($resultado as $fila) {
              $json["results"][$i]["urlPer"] = $fila["urlPer"];
                $json["results"][$i]["idPer"] = $fila["idPer"];
               /* $json["data"][$i]["fechaFact"] = date_format(date_create($fila["fechaFact"]),'d-m-y');*/
                $json["results"][$i]["nomPer"] = $fila["nomPer"];
                $json["results"][$i]["apePer"] = $fila["apePer"];
                $json["results"][$i]["areaPer"] = $fila["areaPer"];
                $json["results"][$i]["cargoPer"] = $fila["cargoPer"];
                $json["results"][$i]["ciuPer"] = $fila["ciuPer"];
                $json["results"][$i]["estadoPer"] = $fila["estadoPer"];
                $i++;
            }
        }else{
             echo $json[0]=0;
        }

        echo json_encode($json);
        $this->db->close();



    }

    


    public function llenarDtUsuario(){
		  $this->db->select('*');
      $this->db->from('usuarios');
      $this->db->join('catalogopersonal as u1',' u1.idPer=usuarios.idPer','left');
      $this->db->join('privilegios as u2',' u2.idPrivi=usuarios.privi','left');
      $query = $this->db->get();
      $json = array();
      if( $query->num_rows() > 0) {
          $resultado= $query->result_array();

          $i = 0;

          
          foreach ($resultado as $fila) {
            	$json["results"][$i]["urlPer"] = $fila["urlPer"];
            $json["results"][$i]["nomPer"] = $fila["nomPer"];
            $json["results"][$i]["nomUser"] = $fila["nomUser"];
            $json["results"][$i]["passUser"] = $fila["passUser"];
            $json["results"][$i]["nomPrivi"] = $fila["nomPrivi"];
            $json["results"][$i]["estadoUser"] = $fila["estadoUser"];
            $i++;
          }
      }else{
           echo $json[0]=0;
      }

      echo json_encode($json);
      $this->db->close();

  }



  public function llenarDtProveedor(){
      $query = $this->db->get('catalogoprov');

      $json = array();
      if( $query->num_rows() > 0) {
          $resultado= $query->result_array();

          $i = 0;

          
          foreach ($resultado as $fila) {
            $json["results"][$i]["imgLogoProv"] = $fila["imgLogoProv"];
            $json["results"][$i]["codProv"] = $fila["codProv"];
              $json["results"][$i]["nomProv"] = $fila["nomProv"];
             /* $json["data"][$i]["fechaFact"] = date_format(date_create($fila["fechaFact"]),'d-m-y');*/
              $json["results"][$i]["paisProv"] = $fila["paisProv"];
              $json["results"][$i]["tel1Prov"] = $fila["tel1Prov"];
              $json["results"][$i]["emailProv"] = $fila["emailProv"];
              $json["results"][$i]["NomContactProv"] = $fila["NomContactProv"];
              $i++;
          }
      }else{
           echo $json[0]=0;
      }

      echo json_encode($json);
      $this->db->close();

  }



  public function llenarDtProducto(){
      $query = $this->db->get('catalogopd');

      $json = array();
      if( $query->num_rows() > 0) {
          $resultado= $query->result_array();

          $i = 0;

          
          foreach ($resultado as $fila) {
            $json["results"][$i]["imgProd"] = $fila["imgProd"];
              $json["results"][$i]["codProd"] = $fila["codProd"];
              $json["results"][$i]["nomProd"] = $fila["nomProd"];
              $json["results"][$i]["marcaProd"] = $fila["marcaProd"];
              $json["results"][$i]["presentProd"] = $fila["presentProd"]." ".$fila["uMedidaProd"];
              $i++;
          }
      }else{
           echo $json[0]=0;
      }

      echo json_encode($json);
      $this->db->close();

  }



  public function llenarDtCliente(){

      $this->db->from('clientes');
      $this->db->join('ruta_zona as u1',' u1.id_ruta_zona=clientes.idZona','left');
      $query = $this->db->get();
      $json = array();
      if( $query->num_rows() > 0) {
          $resultado= $query->result_array();

          $i = 0;

          
          foreach ($resultado as $fila) {
            $json["results"][$i]["urlFotoClte"] = $fila["urlFotoClte"];
              $json["results"][$i]["idClte"] = $fila["idClte"];
              $json["results"][$i]["nomClte"] = $fila["nomClte"]." ".$fila["apeClte"];
              $json["results"][$i]["clasClte"] = $fila["clasClte"];
              $json["results"][$i]["nomLocalClte"] = $fila["nomLocalClte"];
              $json["results"][$i]["nom_ruta_zona"] = $fila["nom_ruta_zona"];
              $json["results"][$i]["ciudadLocalClte"] = $fila["ciudadLocalClte"];
              $i++;
          }
      }else{
           echo $json[0]=0;
      }

      echo json_encode($json);
      $this->db->close();

    }
      

}
?>
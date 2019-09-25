<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Factpendexport_model extends CI_Model
{
	public function __construct()
    {

        include(APPPATH.'libraries\PHPExcel\Classes\PHPExcel.php');
        parent::__construct();
        $this->load->database();
    }



    public function generarExcelFactPendientes($f1,$f2){


        $objExcel = new PHPExcel();
        // Establecer propiedades
        $objActSheet = $objExcel->getActiveSheet();
        $objExcel->getProperties();
        /*->setCreator("Ennio Sáenz")
        ->setLastModifiedBy("")
        ->setTitle("REPORTE")
        ->setSubject("PEDIDOS Y DETALLES")
        ->setDescription("CREAR ARCHIVO EXCEL DESCARGABLE DESDE PHP POR MEDIO DE CONSULTAS MYSQL")
        ->setKeywords("Excel Office 2016 php")
        ->setCategory("DESCARGA DE ARCHIVO EXCEL 2007");*/
        //El nombre de la hoja actual de las actividades
        //date('Y-m-d', strtotime($f1),date('Y-m-d', strtotime($f2)
        $objActSheet->setTitle('Fact_Pendiente');
        $user = $this->Home_model->rutaUsuario();
        $tituloReporte = "FACTURAS PENDIENTES DE ". $user[0]['nomPer']." ". $user[0]['apePer']." PARA ".$user[0]["nom_ruta_zona"];
        $valoresColumnas = array();
        $valoresColumnas =  $this->Home_model->llenarDataTblFactxUser();
        $keyFecha = 'data';
        $rangoFechaReporte = "A LA FECHA";
        
        if($f1!=$f2){
        	$this->load->database();
        	$keyFecha = 'results';
			 $data= array(
            'desde' => $f1,
            'hasta' => $f2
        );
        	$valoresColumnas =  $this->Home_model->filtrarxfechaFacturasxUser($data);
        	$rangoFechaReporte = "DEL ".$f1 ." AL ".$f2;


    	}

        $titulosColumnas = array('FACTURA', 'CLIENTE', 'REALIZADA', 'VENCIMIENTO', 'CREDITO','QUEDAN','TOTAL FACTURA','ABONO','SALDO');

         $objExcel->setActiveSheetIndex(0)
                        ->mergeCells('A1:I1')
                        ->mergeCells('A2:I2')
                        ;

        $objExcel->setActiveSheetIndex(0)
        ->setCellValue('A1', $tituloReporte)
        ->setCellValue('A2', $rangoFechaReporte)
        ->setCellValue('A3', $titulosColumnas[0])
        ->setCellValue('B3', $titulosColumnas[1])
        ->setCellValue('C3', $titulosColumnas[2])
        ->setCellValue('D3', $titulosColumnas[3])
        ->setCellValue('E3', $titulosColumnas[4])
        ->setCellValue('F3', $titulosColumnas[5])
        ->setCellValue('G3', $titulosColumnas[6])
        ->setCellValue('H3', $titulosColumnas[7])
        ->setCellValue('I3', $titulosColumnas[8])
        ;
        
        //OBTENER DATOS
        

        $i=4;
        $totalSaldo=0;
        //for para llenar la tabla de excel con los datos del arreglo "valoresColumnas"
        for ($j=0; $j < count($valoresColumnas[$keyFecha]); $j++) { 
            // POSICIONAR REGISTROS EN CELDAS DEL DOCUMENTO EXCEL
            $objExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$i, $valoresColumnas[$keyFecha][$j]['idFact'])
            ->setCellValue('B'.$i, $valoresColumnas[$keyFecha][$j]['idCliente'])
            ->setCellValue('C'.$i, $valoresColumnas[$keyFecha][$j]['fechaFact'])
            ->setCellValue('D'.$i, $valoresColumnas[$keyFecha][$j]['fechaVenceFact'])
            ->setCellValue('E'.$i, $valoresColumnas[$keyFecha][$j]['diaCreditoFact']."Dias")
            ->setCellValue('F'.$i, $valoresColumnas[$keyFecha][$j]['diffEntreFechas'])
            ->setCellValue('G'.$i, "USD$".$valoresColumnas[$keyFecha][$j]['totalFact'])
            ->setCellValue('H'.$i, "USD$".$valoresColumnas[$keyFecha][$j]['totalAbonos'])
            ->setCellValue('I'.$i, "USD$".(floatval ($valoresColumnas[$keyFecha][$j]['totalFact'])-floatval ($valoresColumnas[$keyFecha][$j]['totalAbonos'])))
            ;
            
            $totalSaldo += floatval ($valoresColumnas[$keyFecha][$j]['totalFact'])-floatval ($valoresColumnas[$keyFecha][$j]['totalAbonos']);
            //I REPRESENTA A LA FILA DE LAS CELDAS, EL CUAL INCREMENTA EN CADA POCISION DEL ARREGLO DE REGISTROS DE LA CONSULTA

            $i++;
        }

        $objExcel->setActiveSheetIndex(0)
                        ->mergeCells('G'.$i.':H'.$i)
                        ;
            $objExcel->setActiveSheetIndex(0)
            ->setCellValue('G'.$i, 'TOTAL SALDO')
            ->setCellValue('I'.$i, "USD$".$totalSaldo)
            ;


             //ESTILOS

         $estiloTituloReporte = array(
            'font' => array(
                'name'      => 'Verdana',
                'bold'      => true,
                'italic'    => false,
                'strike'    => false,
                'size' =>16,
                    'color'     => array(
                        'rgb' => '000000'
                    )
            ),
            'alignment' =>  array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    'rotation'   => 0,
                    'wrap'       => TRUE,
            )
        );

        $estiloTituloColumnas = array(
            'font' => array(
                'name'      => 'Arial',
                'bold'      => true,
                'size' =>12,
                'color'     => array(
                        'rgb' => 'ffffff'
                    )
            ),
            'alignment' =>  array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    'wrap'          => TRUE
            )
        );

        $estiloInformacion = new PHPExcel_Style();
        $estiloInformacion->applyFromArray(
            array(
                'font' => array(
                'name'      => 'Arial',
                'size' => 11
                ),
                'alignment' =>  array(
                    'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    'wrap'          => TRUE
                ),
                'fill' => array(
                    'type' => PHPExcel_Style_Fill::FILL_SOLID,
                    'color' => array('rgb' => 'F0F0F0'
                    )
                )
            
            )
        );

        $estiloInformacion2 = new PHPExcel_Style();
        $estiloInformacion2->applyFromArray(
            array(
                'font' => array(
                'name'      => 'Arial',
                'size' => 11
                ),
                'alignment' =>  array(
                    'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    'wrap'          => TRUE
                ),
                'fill' => array(
                    'type' => PHPExcel_Style_Fill::FILL_SOLID,
                    'color' => array('rgb' => 'FFFAFA'
                    )
                )
            
            )
        );


        $objActSheet->getColumnDimension('A')->setWidth(15);
        $objActSheet->getColumnDimension('B')->setWidth(55);
        $objActSheet->getColumnDimension('C')->setWidth(18);
        $objActSheet->getColumnDimension('D')->setWidth(18);
        $objActSheet->getColumnDimension('E')->setWidth(15);
        $objActSheet->getColumnDimension('F')->setWidth(15);
        $objActSheet->getColumnDimension('G')->setWidth(15);
        $objActSheet->getColumnDimension('H')->setWidth(15);
        $objActSheet->getColumnDimension('I')->setWidth(20);

        $objActSheet->getStyle('A1:I1')->applyFromArray($estiloTituloReporte);
        $objActSheet->getStyle('A2:I2')->applyFromArray($estiloTituloReporte);
        $objActSheet->getStyle('A3:I3')->applyFromArray($estiloTituloColumnas);
        $objActSheet->getStyle('A'.$i.':I'.$i)->applyFromArray($estiloTituloColumnas);
        $objActSheet->getStyle('A3:I3')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('000000');
        $objActSheet->getStyle('A'.$i.':I'.$i)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('000000');
        
        
        $objExcel->getActiveSheet()->getSheetView()->setZoomScale(75);
         $objExcel->getActiveSheet()->freezePane('A4'); 
        for ($l=4; $l < $i; $l++) { 

            if($l%2==0){
                 $objExcel->getActiveSheet()->setSharedStyle($estiloInformacion, 'A'.$l.':I'.$l);
            }else{
                $objExcel->getActiveSheet()->setSharedStyle($estiloInformacion2, 'A'.$l.':I'.$l);
            }
           
        }
            
        


        //Descargar documento excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Fact_Pendiente.xlsx"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objExcel, 'Excel2007');
        $objWriter->save('php://output');
    
    }
}
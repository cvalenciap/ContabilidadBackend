<?php 
ob_start();
use Greenter\Model\Sale\Invoice;
use Greenter\Model\Sale\SaleDetail;
use Greenter\Model\Sale\Legend;
use Greenter\Ws\Services\SunatEndpoints;
use NumeroALetras\NumeroALetras;
use Greenter\Model\Client\Client;
use Greenter\Model\Company\Address;
use Greenter\Model\Voided\Voided;
use Greenter\Model\Voided\VoidedDetail;
use Greenter\Model\Summary\Summary;
use Greenter\Model\Summary\SummaryDetail;
use Greenter\Model\Sale\Note;
use Greenter\Model\Sale\Document;
use Greenter\Model\Response\Error;
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../src/class.phpmailer.php';
require __DIR__ . '/../src/class.smtp.php';
$app= new \Slim\Slim();

$serverName = "WIN-JPCS9U062KA\SQLEXPRESS"; //serverName\instanceName
$connectionInfo = array( "Database"=>"PlanRentablePeru", "UID"=>"sa", "PWD"=>"Planrentable2018");
$conn = sqlsrv_connect( $serverName, $connectionInfo);


/*
$serverName = "SRVPLAN\SQLEXPRESS"; //serverName\instanceName
$connectionInfo = array( "Database"=>"PlanRentablePeru_Cierre_Reunion_2019_03_01_1757", "UID"=>"sa", "PWD"=>"planrentable2019");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
*/
$app->post("/email",function() use($app){

   
    $json = $app->request->getBody();
    $data = json_decode($json, true); 

    $Asociado= $data['asociado'];
    $correlativo= $data['serie'].'-'. $data['numeracion'];
    $correo= $data['email'];
    $filename=$data['documento_name'];
    $tipo_documento=$data['tipo_documento'];
    $total=$data['total'];

    $mail = new PHPMailer();
    $mail->IsSMTP();
	$mail->SMTPDebug = 1;
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'ssl';
	$mail->Host = "kem10730.inkahosting.com.pe";
    $mail->Port = 465; // or 587
    $mail->WordWrap = 50; 
	$mail->IsHTML(true);
    $mail->Username = "contactofacturador@planrentable.com.pe";  // Correo Electrónico
    $mail->Password = "planrentable_facturador_2019"; 

    $mail->From     = "contactofacturador@planrentable.com.pe";
    $mail->FromName = "Plan Rentable Peru";
    $mail->AddAddress($correo); 
    $mail->isHTML(true);
      
    $archivo1 = __DIR__ . '/../files/'.$filename.'.pdf';

    $mail->AddAttachment($archivo1);

	$mail->Subject = ' '.$tipo_documento.' '.$correlativo.' '.'EMITIDA - PLAN RENTABLE PERU E.A.F.C S.A.C';
	$mail->Body = 'Estimado (a) <br>' .'<b>'.$Asociado.'</b>'.'<br>'.'Por encargo del emisor PLAN RENTABLE PERÚ E.A.F.C S.A.C, nos es grato informar que el comprobante electrónico Nro.'.$correlativo.' ha sido EMITIDA  con los siguientes datos: <br><b>N° RUC del Emisor<br>20565964705<br>Monto Total:'.'S/. '.$total;
	$mail->AltBody = 'Dear Uma, Thank you for your interest.';


	if(!$mail->send()) {
		

        $result = array("status"=>"false","message"=>$mail->ErrorInfo);
                            
        echo json_encode($result);



	} else {
        
        
        $result = array("status"=>"true","message"=>"Envio satisfactorio");
                            
        echo json_encode($result);
	}


});
//API validar documentos SUNAT || RENIEC
$app->get("/buscar-datos/:tipo/:documento",function($tipo,$documento) use($app){


      
    if($tipo =='6'){


        $company = new \Sunat\sunat( true, true );
          
        $ruc = $documento;
      
        $search1 = $company->search( $ruc );
        
        if( $search1->success == true )
          {
              $data=[];    
         
      $cliente=$search1->result->razon_social;
      $direccion=$search1->result->direccion;
      
      $result = array("status"=>"true","cliente" => $cliente, "direccion" => $direccion);
                
                   
      echo json_encode($result);
      
      
          }else{

            $result = array("status" => "false", "message" => "Documento no encontrado" );
          
             
            echo json_encode($result);
          }



    }else if($tipo=='1'){



        $servir = new \Reniec\reniec();
	
        $dni =$documento;
      
      
      
        $search = $servir->search( $dni );

      
      
                if( $search->success == true )
                {

                   
                  
                  $cliente=$search->result->Nombres.' '.$search->result->apellidos;
                  $direccion=$search->result->Departamento.'-'.$search->result->Provincia.'-'.$search->result->Distrito;
                  
                  $result = array("status"=>"true","cliente" => $cliente, "direccion" => $direccion);
                
       
                   
                  echo json_encode($result);
                  
                  
                }else{

                  $result = array("status" => "false", "message" => "Documento no encontrado" );
                
                   
                  echo json_encode($result);
                }
        

    }


});


$app->post("/filesyousmart",function() use($app,$conn){

    $json = $app->request->getBody();
    $data = json_decode($json, true); 

    $Num_Doc=$data['NumDoc'];
    $Codigo_Tipo_Doc=$data['Codigo_Tipo_Doc'];



    $sql = "SELECT * FROM Documentos_Facturados
    where correlativo="
    ."'{$Num_Doc}'"."and codigo_documento ="
    ."'{$Codigo_Tipo_Doc}'";

    $stmt = sqlsrv_query( $conn, $sql );
    $list= array();
    while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
        $list[]=$row;
    }
    

    $result = array("status"=>"true","d"=> $list);
    
    echo json_encode($result);



});

$app->post("/construirpdf",function() use($app,$conn){
    
    $filename = "undefined";
    $items=[];
    $valor_gravadas=0;
    $valor_Exonerada=0;
    $json = $app->request->getBody();
    $data = json_decode($json, true); 

    $Num_Doc=$data['NumDoc'];
    $Num_Aplica=$data['NUM_DOC_APLI'];
    $dc=$data['TipoDocumento'].'  '.$data['NumCuenta'].'  '.$data['FechaBanco'];
    $numero_aplica= "";
    $codigo_motivo_nota=$data['MotivoNotaCredito'];
    $des_motivo_nota=$data['DesMotiNotaCredito'];

    if($Num_Aplica!=''){

       $numero_aplica= substr($Num_Aplica, -6);
    }

    $Codigo_Tipo_Doc=$data['Codigo_Tipo_Doc'];

    $f =$data['FechaContable'];
    $Fecha_Contable = str_replace('/', '-', $f);
    
if($Codigo_Tipo_Doc=='01'){
    $util = Util::getInstance();

    $client = new Client();
    $client ->setTipoDoc($data['TipoDocCliente'])
    ->setNumDoc($data['NumDocCliente'])
    ->setRznSocial($data['Asociado'].' '.'C.C:'.$data['Contrato'])
    ->setAddress((new Address())
    ->setDireccion($data['Direccion']));
    $invoice = new Invoice();
    $invoice
        ->setUblVersion('2.1')
        ->setFecVencimiento(new \DateTime($Fecha_Contable))
        ->setTipoOperacion('0101')
        ->setTipoDoc($Codigo_Tipo_Doc)
        ->setSerie('F002')
        ->setCorrelativo(substr($Num_Doc, -6))
        ->setFechaEmision(new \DateTime($Fecha_Contable))
        ->setTipoMoneda('USD')
        ->setClient($client)
        ->setMtoOperGravadas($valor_gravadas)
        ->setMtoOperInafectas($valor_Exonerada)
        ->setMtoIGV($data['Igv'])
        ->setTotalImpuestos($data['Igv'])
        ->setValorVenta($data['SubTotal'])
        ->setMtoImpVenta($data['Total'])
        ->setCompany($util->getCompany());
    
        $list= array();
        $sql = "SELECT * FROM Cuenta_Corriente cc
        INNER JOIN Concep_Pago cp ON cc.CCP_ID_CONCEPTO=cp.CCP_NID_CONCEPTO
        where cc.CUECOR_NUM_DOC_EMITIDO="
        ."'{$Num_Doc}'"."and cc.CUECOR_TIPO_DOC_EMITIDO ="
        ."'{$Codigo_Tipo_Doc}'";
    
        $stmt = sqlsrv_query( $conn, $sql );
        if( $stmt === false) {
            die( print_r( sqlsrv_errors(), true) );
        }
    
        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
            $list[]=$row;
        }
      



    
        for ($i = 0; $i < count($list); $i++) {
    
           // echo json_encode($list[$i]['GRUPOID']);
            if($list[$i]['CCP_IND_APLICAR_IGV']=='1'){

                $base_igv=(float)($list[$i]['CUECOR_IMPORTE'])/1.18;

                $item = new SaleDetail();
                $item->setCodProducto($list[$i]['CCP_NID_CONCEPTO'])
                      ->setUnidad('ZZ')
                      ->setDescripcion($list[$i]['CCP_DESCRIPCION'].' '.'x'.$list[$i]['PAGO_NUMERO_CUOTA'])
                      ->setCantidad('1')
                      ->setMtoValorUnitario($list[$i]['CUECOR_IMPORTE'])
                      ->setMtoValorVenta($list[$i]['CUECOR_IMPORTE'])
                      ->setMtoBaseIgv($base_igv)
                      ->setPorcentajeIgv(18)
                      ->setIgv($list[$i]['CUECOR_IGV_IMPORTE'])
                      ->setTipAfeIgv('10')
                      ->setTotalImpuestos($data['Igv'])
                      ->setMtoPrecioUnitario($list[$i]['CUECOR_IMPORTE']);
                  
                
                $valor_gravadas +=  $base_igv;  
                $items[]=$item;

            }else{
                $item = new SaleDetail();
                $item->setCodProducto($list[$i]['CCP_NID_CONCEPTO'])
                      ->setUnidad('ZZ')
                      ->setDescripcion($list[$i]['CCP_DESCRIPCION'].' '.'x'.$list[$i]['PAGO_NUMERO_CUOTA'])
                      ->setCantidad('1')
                      ->setMtoValorUnitario($list[$i]['CUECOR_IMPORTE'])
                      ->setMtoValorVenta($list[$i]['CUECOR_IMPORTE'])
                      ->setMtoBaseIgv($list[$i]['CUECOR_IGV_IMPORTE'])
                      ->setPorcentajeIgv(0)
                      ->setIgv(0)
                      ->setTipAfeIgv('20')
                      ->setTotalImpuestos(0)
                      ->setMtoPrecioUnitario($list[$i]['CUECOR_IMPORTE']);
                    
                $valor_Exonerada+= $list[$i]['CUECOR_IMPORTE']; 

                $items[]=$item;
            }

    
       } 
    
      $Total=NumeroALetras::convertir($data['Total']);
   
      $invoice->setDetails($items)
      ->setMtoOperGravadas($valor_gravadas)
      ->setMtoOperInafectas($valor_Exonerada)
       ->setLegends([
           (new Legend())
               ->setCode('1000')
               ->setValue($Total
               )
       ]);

        
       $pdf = $util->getPdf($invoice,$dc);
       $util->showPdf($pdf, $filename.'.pdf');
        
       echo json_encode($filename);


            

}else if($Codigo_Tipo_Doc=='02'){

    $util = Util::getInstance();

    $client = new Client();
    $client ->setTipoDoc($data['TipoDocCliente'])
    ->setNumDoc($data['NumDocCliente'])
    ->setRznSocial($data['Asociado'].' '.'C.C:'.$data['Contrato'])
    ->setAddress((new Address())
    ->setDireccion($data['Direccion']));

    $invoice = new Invoice();
    $invoice
        ->setUblVersion('2.1')
        ->setTipoOperacion('0101')
        ->setTipoDoc('03')
        ->setSerie('B002')
        ->setCorrelativo(substr($Num_Doc, -6))
        ->setFechaEmision(new \DateTime($Fecha_Contable))
        ->setTipoMoneda('USD')
        ->setClient($client)
        ->setMtoOperGravadas($valor_gravadas)
        ->setMtoOperInafectas($valor_Exonerada)
        ->setMtoIGV($data['Igv'])
        ->setTotalImpuestos($data['Igv'])
        ->setValorVenta($data['SubTotal'])
        ->setMtoImpVenta($data['Total'])
        ->setCompany($util->getCompany());
    
        
        $list= array();
        $sql = "SELECT * FROM Cuenta_Corriente cc
        INNER JOIN Concep_Pago cp ON cc.CCP_ID_CONCEPTO=cp.CCP_NID_CONCEPTO
        where cc.CUECOR_NUM_DOC_EMITIDO="
        ."'{$Num_Doc}'"."and cc.CUECOR_TIPO_DOC_EMITIDO ="
        ."'{$Codigo_Tipo_Doc}'";
    
        $stmt = sqlsrv_query( $conn, $sql );
        if( $stmt === false) {
            die( print_r( sqlsrv_errors(), true) );
        }
    
        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
            $list[]=$row;
        }
      
         
        for ($i = 0; $i < count($list); $i++) {
    
            // echo json_encode($list[$i]['GRUPOID']);
             if($list[$i]['CCP_IND_APLICAR_IGV']=='1'){
 
                 $base_igv=(float)($list[$i]['CUECOR_IMPORTE'])/1.18;
 
                 $item = new SaleDetail();
                 $item->setCodProducto($list[$i]['CCP_NID_CONCEPTO'])
                       ->setUnidad('ZZ')
                       ->setDescripcion($list[$i]['CCP_DESCRIPCION'].'x'.$list[$i]['PAGO_NUMERO_CUOTA'])
                       ->setCantidad('1')
                       ->setMtoValorUnitario($list[$i]['CUECOR_IMPORTE'])
                       ->setMtoValorVenta($list[$i]['CUECOR_IMPORTE'])
                       ->setMtoBaseIgv($base_igv)
                       ->setPorcentajeIgv(18)
                       ->setIgv($list[$i]['CUECOR_IGV_IMPORTE'])
                       ->setTipAfeIgv('10')
                       ->setTotalImpuestos($data['Igv'])
                       ->setMtoPrecioUnitario($list[$i]['CUECOR_IMPORTE']);

                 $valor_gravadas +=  $base_igv;
                 $items[]=$item;
 
             }else{
                 $item = new SaleDetail();
                 $item->setCodProducto($list[$i]['CCP_NID_CONCEPTO'])
                       ->setUnidad('ZZ')
                       ->setDescripcion($list[$i]['CCP_DESCRIPCION'].'x'.$list[$i]['PAGO_NUMERO_CUOTA'])
                       ->setCantidad('1')
                       ->setMtoValorUnitario($list[$i]['CUECOR_IMPORTE'])
                       ->setMtoValorVenta($list[$i]['CUECOR_IMPORTE'])
                       ->setMtoBaseIgv($list[$i]['CUECOR_IGV_IMPORTE'])
                       ->setPorcentajeIgv(0)
                       ->setIgv(0)
                       ->setTipAfeIgv('20')
                       ->setTotalImpuestos(0)
                       ->setMtoPrecioUnitario($list[$i]['CUECOR_IMPORTE']);
                     
                 $valor_Exonerada+= $list[$i]['CUECOR_IMPORTE']; 
                     
                 $items[]=$item;
             }
 
     
        } 
        $Total=NumeroALetras::convertir($data['Total']);
   
        $invoice->setDetails($items)
        ->setMtoOperGravadas($valor_gravadas)
        ->setMtoOperInafectas($valor_Exonerada)
         ->setLegends([
             (new Legend())
                 ->setCode('1000')
                 ->setValue($Total
                 )
         ]);
  

        
                    
                $pdf = $util->getPdf($invoice,$dc);
                $util->showPdf($pdf, $filename.'.pdf');
                    
                echo json_encode($filename);

}
else if($Codigo_Tipo_Doc=='07'){

    $util = Util::getInstance();

    $ser_doc_aplica=substr($Num_Aplica,0,2);
    $serie_fisico=substr($Num_Aplica,0,3);
    $tipo_doc_aplica="";
    $serie_doc_aplica="";
    $serie_nota="";

    if($ser_doc_aplica=='0B'){
        $tipo_doc_aplica='03';
         if($serie_fisico=='0B1'){
            
        $serie_doc_aplica="0001";
        }else{
        $serie_doc_aplica="B002";
        }
        $serie_nota='BC02';
    }else if ($ser_doc_aplica=='0F'){
        $tipo_doc_aplica='01';
        if($serie_fisico=='0F1'){
            
            $serie_doc_aplica="0001";
            }else{
            $serie_doc_aplica="F002";
            }
            $serie_nota='FC02';
    }


    $client = new Client();
    $client ->setTipoDoc($data['TipoDocCliente'])
    ->setNumDoc($data['NumDocCliente'])
    ->setRznSocial($data['Asociado'].' '.'C.C:'.$data['Contrato'])
    ->setAddress((new Address())
    ->setDireccion($data['Direccion']));

    $note = new Note();
    $note
        ->setUblVersion('2.1')
        ->setTipDocAfectado($tipo_doc_aplica)
        ->setNumDocfectado($serie_doc_aplica.'-'.$numero_aplica)
        ->setCodMotivo($codigo_motivo_nota)
        ->setDesMotivo($des_motivo_nota)
        ->setTipoDoc('07')
        ->setSerie($serie_nota)
        ->setFechaEmision(new DateTime($Fecha_Contable))
        ->setCorrelativo(substr($Num_Doc, -6))
        ->setTipoMoneda('USD')
        ->setClient($client)
        ->setMtoOperGravadas($valor_gravadas)
        ->setMtoOperInafectas($valor_Exonerada)
        ->setMtoIGV(abs($data['Igv']))
        ->setTotalImpuestos(abs($data['Igv']))
        ->setMtoImpVenta(abs($data['Total']))
        ->setCompany($util->getCompany());

        $list= array();
        $sql = "SELECT * FROM Cuenta_Corriente cc
        INNER JOIN Concep_Pago cp ON cc.CCP_ID_CONCEPTO=cp.CCP_NID_CONCEPTO
        where cc.CUECOR_NUM_DOC_EMITIDO="
        ."'{$Num_Doc}'"."and cc.CUECOR_TIPO_DOC_EMITIDO="
        ."'{$Codigo_Tipo_Doc}'";
    
        $stmt = sqlsrv_query( $conn, $sql );
        if( $stmt === false) {
            die( print_r( sqlsrv_errors(), true) );
        }
    
        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
            $list[]=$row;
        }
      



    
        for ($i = 0; $i < count($list); $i++) {
    
           // echo json_encode($list[$i]['GRUPOID']);
            if($list[$i]['CCP_IND_APLICAR_IGV']=='1'){

                $base_igv=(float)($list[$i]['CUECOR_IMPORTE'])/1.18;

                $item = new SaleDetail();
                $item->setCodProducto($list[$i]['CCP_NID_CONCEPTO'])
                      ->setUnidad('ZZ')
                      ->setDescripcion($list[$i]['CCP_DESCRIPCION'].' '.'x'.$list[$i]['PAGO_NUMERO_CUOTA'])
                      ->setCantidad('1')
                      ->setMtoValorUnitario(abs($list[$i]['CUECOR_IMPORTE']))
                      ->setMtoValorVenta(abs($list[$i]['CUECOR_IMPORTE']))
                      ->setMtoBaseIgv(abs($base_igv))
                      ->setPorcentajeIgv(18)
                      ->setIgv(abs($list[$i]['CUECOR_IGV_IMPORTE']))
                      ->setTipAfeIgv('10')
                      ->setTotalImpuestos(abs($data['Igv']))
                      ->setMtoPrecioUnitario(abs($list[$i]['CUECOR_IMPORTE']));
                  
                
                $valor_gravadas +=  $base_igv;  
                $items[]=$item;

            }else{
                $item = new SaleDetail();
                $item->setCodProducto($list[$i]['CCP_NID_CONCEPTO'])
                      ->setUnidad('ZZ')
                      ->setDescripcion($list[$i]['CCP_DESCRIPCION'].' '.'x'.$list[$i]['PAGO_NUMERO_CUOTA'])
                      ->setCantidad('1')
                      ->setMtoValorUnitario(abs($list[$i]['CUECOR_IMPORTE']))
                      ->setMtoValorVenta(abs($list[$i]['CUECOR_IMPORTE']))
                      ->setMtoBaseIgv(abs($list[$i]['CUECOR_IGV_IMPORTE']))
                      ->setPorcentajeIgv(0)
                      ->setIgv(0)
                      ->setTipAfeIgv('20')
                      ->setTotalImpuestos(0)
                      ->setMtoPrecioUnitario(abs($list[$i]['CUECOR_IMPORTE']));
                    
                $valor_Exonerada+= $list[$i]['CUECOR_IMPORTE']; 

                $items[]=$item;
            }

    
       } 
    
       $Total=NumeroALetras::convertir(abs($data['Total']));
   
       $note->setDetails($items)
       ->setMtoOperGravadas(abs($valor_gravadas))
       ->setMtoOperInafectas(abs($valor_Exonerada))
        ->setLegends([
            (new Legend())
                ->setCode('1000')
                ->setValue($Total
                )
        ]);
 
         
        $pdf = $util->getPdf($note,$dc);
        $util->showPdf($pdf, $filename.'.pdf');
         
        echo json_encode($filename);
    
}  
});



$app->post("/facturadoryousmart",function() use($app,$conn){
            $items=[];
            $valor_gravadas=0;
            $valor_Exonerada=0;
            $json = $app->request->getBody();
            $data = json_decode($json, true); 
            $Email=$data['Email'];
            $Num_Doc=$data['NumDoc'];
            $Codigo_Tipo_Doc=$data['Codigo_Tipo_Doc'];
            $Num_Aplica=$data['NUM_DOC_APLI'];
            $na="";
            $numero_aplica= "";
            $fecha_envio=new \DateTime();
                    
            $codigo_motivo_nota=$data['MotivoNotaCredito'];
            $des_motivo_nota=$data['DesMotiNotaCredito'];
            $dc=$data['TipoDocumento'].'  '.$data['NumCuenta'].'  '.$data['FechaBanco'];
            if($Num_Aplica!=''){
        
               $na= substr($Num_Aplica, -6);
               
                $numero_aplica=ltrim($na, "0");
            }
        
            $f =$data['FechaContable'];
            $Fecha_Contable = str_replace('/', '-', $f);
            
        /*
        select*from Cuenta_Corriente where CUECOR_NUM_DOC_EMITIDO like '%2459%' 
        and CUECOR_TIPO_DOC_EMITIDO='02'
        */
        if($Codigo_Tipo_Doc=='01'){
            $util = Util::getInstance();

            $client = new Client();
            $client ->setTipoDoc($data['TipoDocCliente'])
            ->setNumDoc($data['NumDocCliente'])
            ->setRznSocial($data['Asociado'].' '.'C.C:'.$data['Contrato'])
            ->setAddress((new Address())
            ->setDireccion($data['Direccion']));
            $invoice = new Invoice();
            $invoice
                ->setUblVersion('2.1')
                ->setFecVencimiento(new \DateTime($Fecha_Contable))
                ->setTipoOperacion('0101')
                ->setTipoDoc($Codigo_Tipo_Doc)
                ->setSerie('F002')
                ->setCorrelativo(substr($Num_Doc, -6))
                ->setFechaEmision(new \DateTime($Fecha_Contable))
                ->setTipoMoneda('USD')
                ->setClient($client)
                ->setMtoOperGravadas($valor_gravadas)
                ->setMtoOperInafectas($valor_Exonerada)
                ->setMtoIGV($data['Igv'])
                ->setTotalImpuestos($data['Igv'])
                ->setValorVenta($data['SubTotal'])
                ->setMtoImpVenta($data['Total'])
                ->setCompany($util->getCompany());
            
                $list= array();
                $sql = "SELECT * FROM Cuenta_Corriente cc
                INNER JOIN Concep_Pago cp ON cc.CCP_ID_CONCEPTO=cp.CCP_NID_CONCEPTO
                where cc.CUECOR_NUM_DOC_EMITIDO="
                ."'{$Num_Doc}'"."and cc.CUECOR_TIPO_DOC_EMITIDO ="
                ."'{$Codigo_Tipo_Doc}'";
            
                $stmt = sqlsrv_query( $conn, $sql );
                if( $stmt === false) {
                    die( print_r( sqlsrv_errors(), true) );
                }
            
                while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                    $list[]=$row;
                }
            



            
                for ($i = 0; $i < count($list); $i++) {
            
                // echo json_encode($list[$i]['GRUPOID']);
                    if($list[$i]['CCP_IND_APLICAR_IGV']=='1'){

                        $base_igv=(float)($list[$i]['CUECOR_IMPORTE'])/1.18;

                        $item = new SaleDetail();
                        $item->setCodProducto($list[$i]['CCP_NID_CONCEPTO'])
                            ->setUnidad('ZZ')
                            ->setDescripcion($list[$i]['CCP_DESCRIPCION'].' '.'x'.$list[$i]['PAGO_NUMERO_CUOTA'])
                            ->setCantidad('1')
                            ->setMtoValorUnitario($list[$i]['CUECOR_IMPORTE'])
                            ->setMtoValorVenta($list[$i]['CUECOR_IMPORTE'])
                            ->setMtoBaseIgv($base_igv)
                            ->setPorcentajeIgv(18)
                            ->setIgv($list[$i]['CUECOR_IGV_IMPORTE'])
                            ->setTipAfeIgv('10')
                            ->setTotalImpuestos($data['Igv'])
                            ->setMtoPrecioUnitario($list[$i]['CUECOR_IMPORTE']);
                        
                        
                        $valor_gravadas +=  $base_igv;  
                        $items[]=$item;

                    }else{
                        $item = new SaleDetail();
                        $item->setCodProducto($list[$i]['CCP_NID_CONCEPTO'])
                            ->setUnidad('ZZ')
                            ->setDescripcion($list[$i]['CCP_DESCRIPCION'].' '.'x'.$list[$i]['PAGO_NUMERO_CUOTA'])
                            ->setCantidad('1')
                            ->setMtoValorUnitario($list[$i]['CUECOR_IMPORTE'])
                            ->setMtoValorVenta($list[$i]['CUECOR_IMPORTE'])
                            ->setMtoBaseIgv($list[$i]['CUECOR_IGV_IMPORTE'])
                            ->setPorcentajeIgv(0)
                            ->setIgv(0)
                            ->setTipAfeIgv('20')
                            ->setTotalImpuestos(0)
                            ->setMtoPrecioUnitario($list[$i]['CUECOR_IMPORTE']);
                            
                        $valor_Exonerada+= $list[$i]['CUECOR_IMPORTE']; 

                        $items[]=$item;
                    }

            
            } 
            
            $Total=NumeroALetras::convertir($data['Total']);
        
            $invoice->setDetails($items)
            ->setMtoOperGravadas($valor_gravadas)
            ->setMtoOperInafectas($valor_Exonerada)
            ->setLegends([
                (new Legend())
                    ->setCode('1000')
                    ->setValue($Total
                    )
            ]);

        
            
            // Envio a SUNAT. FE_PRODUCCION
            $see = $util->getSee(SunatEndpoints::FE_BETA);
            $res = $see->send($invoice);
            $util->writeXml($invoice, $see->getFactory()->getLastXml());

            if ($res->isSuccess()) {
                /**@var $res \Greenter\Model\Response\BillResult*/
                
                $pdf = $util->getPdf($invoice,$dc);
                
                $cdr = $res->getCdrResponse();
            
                $util->writeCdr($invoice, $res->getCdrZip());
                $codigocdr= $cdr->getCode();

            
            // $util->showResponse($invoice, $cdr);

            $filename = $invoice->getName();
            $util->showPdf($pdf, $invoice->getName().'.pdf');

            $correlativo=substr($Num_Doc, -6);
            $fecha=new \DateTime($Fecha_Contable);
            

            if($codigocdr > 4000 || $codigocdr==0){

                $sql = "UPDATE Cuenta_Corriente SET ESTADO_FE = ( ?) where CUECOR_NUM_DOC_EMITIDO= ( ?) and CUECOR_TIPO_DOC_EMITIDO =( ?)";
                $params = array( '1',$Num_Doc,$Codigo_Tipo_Doc );

                $correlativo=substr($Num_Doc, -6);
                $stmt = sqlsrv_query( $conn, $sql, $params);
                
                $q="INSERT INTO Documentos_Facturados (tipo_documento,codigo_documento,correlativo,serie,numeracion,documento_name,fecha_contable,estado_documento,tipo_pago,total,gravadas,igv,fecha_envio,descripcion_estado,contrato,asociado,email) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $p = array( 'FACTURA','01',$Num_Doc,'F002',$correlativo,$filename,$fecha,'PROCESADO','USD',(float)$data['Total'],(float)$data['SubTotal'],(float)$data['Igv'],$fecha_envio,$cdr->getDescription(),$data['Contrato'],$data['Asociado'],$Email);

                $s = sqlsrv_query( $conn, $q, $p);
                if( $s === false ) {
                    echo json_encode( sqlsrv_errors());
                }



                    $result = array("status"=>"true","message"=> $filename,"codigo"=>$codigocdr);
                            
                    echo json_encode($result);
            }else if($codigocdr >= 2000 and $codigocdr<= 3999){

                $sql = "UPDATE Cuenta_Corriente SET ESTADO_FE = ( ?) where CUECOR_NUM_DOC_EMITIDO= ( ?) and CUECOR_TIPO_DOC_EMITIDO =( ?)";
                $params = array( '2',$Num_Doc,$Codigo_Tipo_Doc );

                $correlativo=substr($Num_Doc, -6);
                $stmt = sqlsrv_query( $conn, $sql, $params);
                
                $q="INSERT INTO Documentos_Facturados (tipo_documento,codigo_documento,correlativo,serie,numeracion,documento_name,fecha_contable,estado_documento,tipo_pago,total,gravadas,igv,fecha_envio,descripcion_estado,contrato,asociado,email) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $p = array( 'FACTURA','01',$Num_Doc,'F002',$correlativo,$filename,$fecha,'RECHAZADO','USD',(float)$data['Total'],(float)$data['SubTotal'],(float)$data['Igv'],$fecha_envio,$cdr->getDescription(),$data['Contrato'],$data['Asociado'],$Email);

                $s = sqlsrv_query( $conn, $q, $p);
                if( $s === false ) {
                    echo json_encode( sqlsrv_errors());
                }


                $result = array("status"=>"false","message"=> "Código de error:".$codigocdr."-"."   Descripción de error: ".$cdr->getDescription());
                echo json_encode($result);

            }
            else{
    
                    $result = array("status"=>"false","message"=> "Código de error:".$codigocdr."-"."   Descripción de error: ".$cdr->getDescription());
                    echo json_encode($result);
                    }
            
            } else{
            

                echo json_encode($util->getErrorResponse($res->getError()));
            }
            

        }else if($Codigo_Tipo_Doc=='02'){

            $util = Util::getInstance();

            $client = new Client();
            $client ->setTipoDoc($data['TipoDocCliente'])
            ->setNumDoc($data['NumDocCliente'])
            ->setRznSocial($data['Asociado'].' '.'C.C:'.$data['Contrato'])
            ->setAddress((new Address())
            ->setDireccion($data['Direccion']));

            $invoice = new Invoice();
            $invoice
                ->setUblVersion('2.1')
                ->setTipoOperacion('0101')
                ->setTipoDoc('03')
                ->setSerie('B002')
                ->setCorrelativo(substr($Num_Doc, -6))
                ->setFechaEmision(new \DateTime($Fecha_Contable))
                ->setTipoMoneda('USD')
                ->setClient($client)
                ->setMtoOperGravadas($valor_gravadas)
                ->setMtoOperInafectas($valor_Exonerada)
                ->setMtoIGV($data['Igv'])
                ->setTotalImpuestos($data['Igv'])
                ->setValorVenta($data['SubTotal'])
                ->setMtoImpVenta($data['Total'])
                ->setCompany($util->getCompany());
            
                
                $list= array();
                $sql = "SELECT * FROM Cuenta_Corriente cc
                INNER JOIN Concep_Pago cp ON cc.CCP_ID_CONCEPTO=cp.CCP_NID_CONCEPTO
                where cc.CUECOR_NUM_DOC_EMITIDO="
                ."'{$Num_Doc}'"."and cc.CUECOR_TIPO_DOC_EMITIDO ="
                ."'{$Codigo_Tipo_Doc}'";
            
                $stmt = sqlsrv_query( $conn, $sql );
                if( $stmt === false) {
                    die( print_r( sqlsrv_errors(), true) );
                }
            
                while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                    $list[]=$row;
                }
            
                
                for ($i = 0; $i < count($list); $i++) {
            
                    // echo json_encode($list[$i]['GRUPOID']);
                    if($list[$i]['CCP_IND_APLICAR_IGV']=='1'){
        
                        $base_igv=(float)($list[$i]['CUECOR_IMPORTE'])/1.18;
        
                        $item = new SaleDetail();
                        $item->setCodProducto($list[$i]['CCP_NID_CONCEPTO'])
                            ->setUnidad('ZZ')
                            ->setDescripcion($list[$i]['CCP_DESCRIPCION'].' '.'x'.$list[$i]['PAGO_NUMERO_CUOTA'])
                            ->setCantidad('1')
                            ->setMtoValorUnitario($list[$i]['CUECOR_IMPORTE'])
                            ->setMtoValorVenta($list[$i]['CUECOR_IMPORTE'])
                            ->setMtoBaseIgv($base_igv)
                            ->setPorcentajeIgv(18)
                            ->setIgv($list[$i]['CUECOR_IGV_IMPORTE'])
                            ->setTipAfeIgv('10')
                            ->setTotalImpuestos($data['Igv'])
                            ->setMtoPrecioUnitario($list[$i]['CUECOR_IMPORTE']);

                        $valor_gravadas +=  $base_igv;
                        $items[]=$item;
        
                    }else{
                        $item = new SaleDetail();
                        $item->setCodProducto($list[$i]['CCP_NID_CONCEPTO'])
                            ->setUnidad('ZZ')
                            ->setDescripcion($list[$i]['CCP_DESCRIPCION'].' '.'x'.$list[$i]['PAGO_NUMERO_CUOTA'])
                            ->setCantidad('1')
                            ->setMtoValorUnitario($list[$i]['CUECOR_IMPORTE'])
                            ->setMtoValorVenta($list[$i]['CUECOR_IMPORTE'])
                            ->setMtoBaseIgv($list[$i]['CUECOR_IGV_IMPORTE'])
                            ->setPorcentajeIgv(0)
                            ->setIgv(0)
                            ->setTipAfeIgv('20')
                            ->setTotalImpuestos(0)
                            ->setMtoPrecioUnitario($list[$i]['CUECOR_IMPORTE']);
                            
                        $valor_Exonerada+= $list[$i]['CUECOR_IMPORTE']; 
                            
                        $items[]=$item;
                    }
        
            
                } 
                $Total=NumeroALetras::convertir($data['Total']);
        
                $invoice->setDetails($items)
                ->setMtoOperGravadas($valor_gravadas)
                ->setMtoOperInafectas($valor_Exonerada)
                ->setLegends([
                    (new Legend())
                        ->setCode('1000')
                        ->setValue($Total
                        )
                ]);
        
            
            
            // Envio a SUNAT. FE_PRODUCCION
            $see = $util->getSee(SunatEndpoints::FE_BETA);
            $res = $see->send($invoice);
            $util->writeXml($invoice, $see->getFactory()->getLastXml());
        
            if ($res->isSuccess()) {
                /**@var $res \Greenter\Model\Response\BillResult*/
                
                
                $pdf = $util->getPdf($invoice,$dc);
                
                $cdr = $res->getCdrResponse();
            
                $util->writeCdr($invoice, $res->getCdrZip());
            
                $codigocdr= $cdr->getCode();

                // $util->showResponse($invoice, $cdr);
        
                $filename = $invoice->getName();
                $util->showPdf($pdf, $invoice->getName().'.pdf');
        
                $correlativo=substr($Num_Doc, -6);
                $fecha=new \DateTime($Fecha_Contable);
        
                if($codigocdr > 4000 || $codigocdr==0){
                    $sql = "UPDATE Cuenta_Corriente SET ESTADO_FE = ( ?) where CUECOR_NUM_DOC_EMITIDO= ( ?) and CUECOR_TIPO_DOC_EMITIDO =( ?)";
                    $params = array( '1',$Num_Doc,$Codigo_Tipo_Doc );
            
                    $correlativo=substr($Num_Doc, -6);
                    $stmt = sqlsrv_query( $conn, $sql, $params);
                    
                    $q="INSERT INTO Documentos_Facturados (tipo_documento,codigo_documento,correlativo,serie,numeracion,documento_name,fecha_contable,estado_documento,tipo_pago,total,gravadas,igv,fecha_envio,descripcion_estado,contrato,asociado,email) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                    $p = array( 'BOLETA','02',$Num_Doc,'B002',$correlativo,$filename,$fecha,'PROCESADO','USD',(float)$data['Total'],(float)$data['SubTotal'],(float)$data['Igv'],$fecha_envio,$cdr->getDescription(),$data['Contrato'],$data['Asociado'],$Email);
            
                    $s = sqlsrv_query( $conn, $q, $p);
                    if( $s === false ) {
                        echo json_encode( sqlsrv_errors());
                    }

                $result = array("status"=>"true","message"=> $filename,"codigo"=>$codigocdr);
                            
                echo json_encode($result);
                }else if($codigocdr >= 2000 and $codigocdr<= 3999){

                    $sql = "UPDATE Cuenta_Corriente SET ESTADO_FE = ( ?) where CUECOR_NUM_DOC_EMITIDO= ( ?) and CUECOR_TIPO_DOC_EMITIDO =( ?)";
                    $params = array( '2',$Num_Doc,$Codigo_Tipo_Doc );
    
                    $correlativo=substr($Num_Doc, -6);
                    $stmt = sqlsrv_query( $conn, $sql, $params);
   
                    $q="INSERT INTO Documentos_Facturados (tipo_documento,codigo_documento,correlativo,serie,numeracion,documento_name,fecha_contable,estado_documento,tipo_pago,total,gravadas,igv,fecha_envio,descripcion_estado,contrato,asociado,email) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                    $p = array( 'BOLETA','02',$Num_Doc,'B002',$correlativo,$filename,$fecha,'RECHAZADO','USD',(float)$data['Total'],(float)$data['SubTotal'],(float)$data['Igv'],$fecha_envio,$cdr->getDescription(),$data['Contrato'],$data['Asociado'],$Email);
            
                    $s = sqlsrv_query( $conn, $q, $p);
                    if( $s === false ) {
                        echo json_encode( sqlsrv_errors());
                    }
    
    
                    $result = array("status"=>"false","message"=> "Código de error:".$codigocdr."-"."   Descripción de error: ".$cdr->getDescription());
                    echo json_encode($result);
    
                }
                else{

                $result = array("status"=>"false","message"=> "Código de error:".$codigocdr."-"."   Descripción de error: ".$cdr->getDescription());
                echo json_encode($result);
                }

                }else{
            

                    echo json_encode($util->getErrorResponse($res->getError()));
                }


          }
        else if($Codigo_Tipo_Doc=='07'){
            $util = Util::getInstance();

            $ser_doc_aplica=substr($Num_Aplica,0,2);
            $serie_fisico=substr($Num_Aplica,0,3);
            $tipo_doc_aplica="";
            $serie_doc_aplica="";
            $correlativo=substr($Num_Doc, -6);

            $nuevo_c=ltrim($correlativo, "0");

            if($ser_doc_aplica=='0B'){
                $tipo_doc_aplica='03';
                if($serie_fisico=='0B1'){
                    
                $serie_doc_aplica="0001";
                }else{
                $serie_doc_aplica="B002";
                }
                  

                $numeracion= $nuevo_c;
                $util = Util::getInstance();
                $sum = new Summary();
                $sum->setFecGeneracion(new DateTime($Fecha_Contable))
                    ->setFecResumen(new DateTime($Fecha_Contable))
                    ->setCorrelativo($numeracion)
                    ->setCompany($util->getCompany())
                    ->setFecGeneracion(new DateTime($Fecha_Contable))
                    ->setFecResumen(new DateTime($Fecha_Contable));
        
                $detiail = new SummaryDetail();
                $detiail->setTipoDoc('07')
                ->setSerieNro("BC02"."-".$numeracion) 
                ->setDocReferencia((new Document())
                    ->setTipoDoc($tipo_doc_aplica)
                    ->setNroDoc($serie_doc_aplica.'-'.$numero_aplica))
                ->setEstado('1')
                ->setClienteTipo($data['TipoDocCliente'])
                ->setClienteNro($data['NumDocCliente'])
                ->setTotal(abs($data['Total']))
                ->setMtoOperGravadas($valor_gravadas)
                ->setMtoOperInafectas($valor_Exonerada)
                ->setMtoIGV(abs($data['Igv']));
        
                $list= array();
                $sql = "SELECT * FROM Cuenta_Corriente cc
                INNER JOIN Concep_Pago cp ON cc.CCP_ID_CONCEPTO=cp.CCP_NID_CONCEPTO
                where cc.CUECOR_NUM_DOC_EMITIDO="
                ."'{$Num_Doc}'"."and cc.CUECOR_TIPO_DOC_EMITIDO ="
                ."'{$Codigo_Tipo_Doc}'";
            
                $stmt = sqlsrv_query( $conn, $sql );
                if( $stmt === false) {
                    die( print_r( sqlsrv_errors(), true) );
                }
            
                while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                    $list[]=$row;
                }
            
                
                for ($i = 0; $i < count($list); $i++) {
            
                    if($list[$i]['CCP_IND_APLICAR_IGV']=='1'){
                
                        $base_igv=(float)(abs($list[$i]['CUECOR_IMPORTE'])/1.18);
                        $valor_gravadas +=  $base_igv;
        
                    }else{
                   
                        $valor_Exonerada+= abs($list[$i]['CUECOR_IMPORTE']); 
                    }
        
            
                } 
         
        
                $detiail->setMtoOperGravadas($valor_gravadas)
                ->setMtoOperInafectas($valor_Exonerada);
        
        
        
        
                $sum->setDetails([$detiail])
                ->setMoneda('USD');
        
        
                // Envio a SUNAT.
                $see = $util->getSee(SunatEndpoints::FE_BETA);
                $res = $see->send($sum);
                $util->writeXml($sum, $see->getFactory()->getLastXml());
        
        
                if ($res->isSuccess()) {
        
                    $ticket = $res->getTicket();
                    $result = $see->getStatus($ticket);
        
                    if ($result->isSuccess()) {
        
                        $pdf = $util->getPdf($sum,$dc);
                        $cdr = $result->getCdrResponse();
        
                        $util->writeCdr($sum, $result->getCdrZip());
                        //$util->showResponse($sum, $cdr);

                        $codigocdr= $cdr->getCode();

                        $filename = $sum->getName();
                        $util->showPdf($pdf, $sum->getName().'.pdf');
                
                        $correlativo=substr($Num_Doc, -6);
                        $fecha=new \DateTime($Fecha_Contable);
                        if($codigocdr > 4000 || $codigocdr==0){

                            $sql = "UPDATE Cuenta_Corriente SET ESTADO_FE = ( ?) where CUECOR_NUM_DOC_EMITIDO= ( ?) and CUECOR_TIPO_DOC_EMITIDO =( ?)";
                            $params = array( '1',$Num_Doc,$Codigo_Tipo_Doc );
                    
                            $stmt = sqlsrv_query( $conn, $sql, $params);
    
                                                
                            $q="INSERT INTO Documentos_Facturados (tipo_documento,codigo_documento,correlativo,serie,numeracion,documento_name,fecha_contable,estado_documento,tipo_pago,total,gravadas,igv,fecha_envio,descripcion_estado,contrato,asociado,email) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
              
                            $p = array( 'NOTA CREDITO','07',$Num_Doc,'BC02',$correlativo,$filename,$fecha,'PROCESADO','USD',(float)abs($data['Total']),(float)abs($data['SubTotal']),(float)abs($data['Igv']),$fecha_envio,$cdr->getDescription(),$data['Contrato'],$data['Asociado'],$Email);
                    
                            $s = sqlsrv_query( $conn, $q, $p);
                            if( $s === false ) {
                                echo json_encode( sqlsrv_errors());
                            }
    
                            $result = array("status"=>"true","message"=> $filename,"codigo"=>$codigocdr);
                            
                            echo json_encode($result);
                        
                        }else if($codigocdr >= 2000 and $codigocdr<= 3999){

                            $sql = "UPDATE Cuenta_Corriente SET ESTADO_FE = ( ?) where CUECOR_NUM_DOC_EMITIDO= ( ?) and CUECOR_TIPO_DOC_EMITIDO =( ?)";
                            $params = array( '2',$Num_Doc,$Codigo_Tipo_Doc );
            
                            $correlativo=substr($Num_Doc, -6);
                            $stmt = sqlsrv_query( $conn, $sql, $params);

                            $q="INSERT INTO Documentos_Facturados (tipo_documento,codigo_documento,correlativo,serie,numeracion,documento_name,fecha_contable,estado_documento,tipo_pago,total,gravadas,igv,fecha_envio,descripcion_estado,contrato,asociado,email) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
              
                            $p = array( 'NOTA CREDITO','07',$Num_Doc,'BC02',$correlativo,$filename,$fecha,'RECHAZADO','USD',(float)abs($data['Total']),(float)abs($data['SubTotal']),(float)abs($data['Igv']),$fecha_envio,$cdr->getDescription(),$data['Contrato'],$data['Asociado'],$Email);
                    
                            $s = sqlsrv_query( $conn, $q, $p);
                            if( $s === false ) {
                                echo json_encode( sqlsrv_errors());
                            }
            
            
                            $result = array("status"=>"false","message"=> "Código de error:".$codigocdr."-"."   Descripción de error: ".$cdr->getDescription());
                            echo json_encode($result);
            
                        }
                        
                        
                        
                        
                        
                        else{

                            $result = array("status"=>"false","message"=> "Código de error:".$codigocdr."-"."   Descripción de error: ".$cdr->getDescription());
                            echo json_encode($result);
                        }
                      
        
        
        
                    } else {
        
                        echo json_encode($util->getErrorResponse($result->getError()));
        
                    }
        
                } else {
        
                    echo json_encode($util->getErrorResponse($res->getError()));
        
                }




            }else if ($ser_doc_aplica=='0F'){
                $tipo_doc_aplica='01';
                if($serie_fisico=='0F1'){
                    
                    $serie_doc_aplica="0001";
                    }else{
                    $serie_doc_aplica="F002";
                    }

            $client = new Client();
            $client ->setTipoDoc($data['TipoDocCliente'])
            ->setNumDoc($data['NumDocCliente'])
            ->setRznSocial($data['Asociado'].' '.'C.C:'.$data['Contrato'])
            ->setAddress((new Address())
            ->setDireccion($data['Direccion']));
        
            $note = new Note();
            
            $note
                ->setUblVersion('2.1')
                ->setTipDocAfectado($tipo_doc_aplica)
                ->setNumDocfectado($serie_doc_aplica.'-'.ltrim($numero_aplica,"0"))
                ->setCodMotivo($codigo_motivo_nota)
                ->setDesMotivo($des_motivo_nota)
                ->setTipoDoc('07')
                ->setSerie('FC02')
                ->setFechaEmision(new DateTime($Fecha_Contable))
                ->setCorrelativo(ltrim(substr($Num_Doc, -6),"0"))
                ->setTipoMoneda('USD')
                ->setClient($client)
                ->setMtoOperGravadas($valor_gravadas)
                ->setMtoOperInafectas($valor_Exonerada)
                ->setMtoIGV(abs($data['Igv']))
                ->setTotalImpuestos(abs($data['Igv']))
                ->setMtoImpVenta(abs($data['Total']))
                ->setCompany($util->getCompany());
        
                $list= array();
                $sql = "SELECT * FROM Cuenta_Corriente cc
                INNER JOIN Concep_Pago cp ON cc.CCP_ID_CONCEPTO=cp.CCP_NID_CONCEPTO
                where cc.CUECOR_NUM_DOC_EMITIDO="
                ."'{$Num_Doc}'"."and cc.CUECOR_TIPO_DOC_EMITIDO ="
                ."'{$Codigo_Tipo_Doc}'";
            
                $stmt = sqlsrv_query( $conn, $sql );
                if( $stmt === false) {
                    die( print_r( sqlsrv_errors(), true) );
                }
            
                while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                    $list[]=$row;
                }
              
        
        
        
            
                for ($i = 0; $i < count($list); $i++) {
            
                   // echo json_encode($list[$i]['GRUPOID']);
                    if($list[$i]['CCP_IND_APLICAR_IGV']=='1'){
        
                        $base_igv=(float)($list[$i]['CUECOR_IMPORTE'])/1.18;
        
                        $item = new SaleDetail();
                        $item->setCodProducto($list[$i]['CCP_NID_CONCEPTO'])
                              ->setUnidad('ZZ')
                              ->setDescripcion($list[$i]['CCP_DESCRIPCION'].' '.'x'.$list[$i]['PAGO_NUMERO_CUOTA'])
                              ->setCantidad('1')
                              ->setMtoValorUnitario(abs($list[$i]['CUECOR_IMPORTE']))
                              ->setMtoValorVenta(abs($list[$i]['CUECOR_IMPORTE']))
                              ->setMtoBaseIgv(abs($base_igv))
                              ->setPorcentajeIgv(18)
                              ->setIgv(abs($list[$i]['CUECOR_IGV_IMPORTE']))
                              ->setTipAfeIgv('10')
                              ->setTotalImpuestos(abs($data['Igv']))
                              ->setMtoPrecioUnitario(abs($list[$i]['CUECOR_IMPORTE']));
                          
                        
                        $valor_gravadas +=  $base_igv;  
                        $items[]=$item;
        
                    }else{
                        $item = new SaleDetail();
                        $item->setCodProducto($list[$i]['CCP_NID_CONCEPTO'])
                              ->setUnidad('ZZ')
                              ->setDescripcion($list[$i]['CCP_DESCRIPCION'].' '.'x'.$list[$i]['PAGO_NUMERO_CUOTA'])
                              ->setCantidad('1')
                              ->setMtoValorUnitario(abs($list[$i]['CUECOR_IMPORTE']))
                              ->setMtoValorVenta(abs($list[$i]['CUECOR_IMPORTE']))
                              ->setMtoBaseIgv(abs($list[$i]['CUECOR_IGV_IMPORTE']))
                              ->setPorcentajeIgv(0)
                              ->setIgv(0)
                              ->setTipAfeIgv('20')
                              ->setTotalImpuestos(0)
                              ->setMtoPrecioUnitario(abs($list[$i]['CUECOR_IMPORTE']));
                            
                        $valor_Exonerada+= $list[$i]['CUECOR_IMPORTE']; 
        
                        $items[]=$item;
                    }
        
            
               } 
            
               $Total=NumeroALetras::convertir(abs($data['Total']));
           
               $note->setDetails($items)
               ->setMtoOperGravadas(abs($valor_gravadas))
               ->setMtoOperInafectas(abs($valor_Exonerada))
                ->setLegends([
                    (new Legend())
                        ->setCode('1000')
                        ->setValue($Total
                        )
                ]);
         
                 
                $see = $util->getSee(SunatEndpoints::FE_BETA);
                $res = $see->send($note);
                $util->writeXml($note, $see->getFactory()->getLastXml());

                $correlativo=substr($Num_Doc, -6);
                $fecha=new \DateTime($Fecha_Contable);

                $filename = $note->getName();
                if ($res->isSuccess()) {

                    /**@var $res \Greenter\Model\Response\BillResult*/

                    $pdf = $util->getPdf($note,$dc);
                    $cdr = $res->getCdrResponse();
                    $util->writeCdr($note, $res->getCdrZip());
                    $codigocdr= $cdr->getCode();


                    $util->showPdf($pdf, $note->getName().'.pdf');
            
            
                if((int)$codigocdr > 4000 || $codigocdr==0){
                    $sql = "UPDATE Cuenta_Corriente SET ESTADO_FE = ( ?) where CUECOR_NUM_DOC_EMITIDO= ( ?) and CUECOR_TIPO_DOC_EMITIDO =( ?)";
                    $params = array( '1',$Num_Doc,$Codigo_Tipo_Doc );
            
                    $correlativo=substr($Num_Doc, -6);
                    $stmt = sqlsrv_query( $conn, $sql, $params);
                    
                                            
                    $q="INSERT INTO Documentos_Facturados (tipo_documento,codigo_documento,correlativo,serie,numeracion,documento_name,fecha_contable,estado_documento,tipo_pago,total,gravadas,igv,fecha_envio,descripcion_estado,contrato,asociado,email) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

                    $p = array( 'NOTA CREDITO','07',$Num_Doc,'FC02',$correlativo,$filename,$fecha,'PROCESADO','USD',(float)abs($data['Total']),(float)abs($data['SubTotal']),(float)abs($data['Igv']),$fecha_envio,$cdr->getDescription(),$data['Contrato'],$data['Asociado'],$Email);
            
                    $s = sqlsrv_query( $conn, $q, $p);
                    if( $s === false ) {
                        echo json_encode( sqlsrv_errors());
                    }
    
                    $result = array("status"=>"true","message"=> $filename,"codigo"=>$codigocdr);
                            
                    echo json_encode($result);
                
                }else if((int)$codigocdr >= 2000 and (int)$codigocdr<= 3999){

                 $sql = "UPDATE Cuenta_Corriente SET ESTADO_FE = ( ?) where CUECOR_NUM_DOC_EMITIDO= ( ?) and CUECOR_TIPO_DOC_EMITIDO =( ?)";
                    $params = array( '2',$Num_Doc,$Codigo_Tipo_Doc );
    
                    $correlativo=substr($Num_Doc, -6);
                    $stmt = sqlsrv_query( $conn, $sql, $params);

                    $q="INSERT INTO Documentos_Facturados (tipo_documento,codigo_documento,correlativo,serie,numeracion,documento_name,fecha_contable,estado_documento,tipo_pago,total,gravadas,igv,fecha_envio,descripcion_estado,contrato,asociado,email) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

                    $p = array( 'NOTA CREDITO','07',$Num_Doc,'FC02',$correlativo,$filename,$fecha,'RECHAZADO','USD',(float)abs($data['Total']),(float)abs($data['SubTotal']),(float)abs($data['Igv']),$fecha_envio,$cdr->getDescription(),$data['Contrato'],$data['Asociado'],$Email);
            
                    $s = sqlsrv_query( $conn, $q, $p);
                    if( $s === false ) {
                        echo json_encode( sqlsrv_errors());
                    }
   
    
                    $result = array("status"=>"false","message"=> "Código de error:".$codigocdr."-"."   Descripción de error: ".$cdr->getDescription());
                    echo json_encode($result);
    
                }
                
                else{

                    $result = array("status"=>"false","message"=> "Código de error:".$codigocdr."-"."   Descripción de error: ".$cdr->getDescription());
                    echo json_encode($result);

                }



    
                    }else{
                
                        $error=new Error();
                        $error=$res->getError();
                        $result = array("status"=>"false","message"=> "Código de error:".$error->getCode()."-"."   Descripción de error: ".$error->getMessage());
                                    echo json_encode($result);
                    }
            }
        
        


        }
        
 
});


$app->post("/comunicacionbaja",function() use($app,$conn){
    $items=[];
    $valor_gravadas=0;
    $valor_Exonerada=0;
    $serie="";
    $codigo_documento="";
    $json = $app->request->getBody();
    $data = json_decode($json, true); 

    $Num_Doc=$data['NumDoc'];
    $Codigo_Tipo_Doc=$data['Codigo_Tipo_Doc'];

    $f =$data['FechaContable'];
    $Fecha_Contable = str_replace('/', '-', $f);
  
    $correlativo=substr($Num_Doc, -6);
    $fecha_envio=new \DateTime();
    if($Codigo_Tipo_Doc=='01'){
        $serie="F002";
        $codigo_documento="01";
        
        $numeracion= $correlativo;
        $fecha_venta=$Fecha_Contable;

        $util = Util::getInstance();

        //$voided = $util->getVoided();

        $detial1 = new VoidedDetail();
        $detial1->setTipoDoc($codigo_documento)
                ->setSerie($serie)
                ->setCorrelativo($numeracion)
                ->setDesMotivoBaja('ERROR DE SISTEMA');


        $voided = new Voided();
        $voided->setCorrelativo($numeracion)
                ->setFecComunicacion(new \DateTime())
                ->setFecGeneracion(new \DateTime())
                ->setCompany($util->getCompany())
                ->setDetails([$detial1]);
    // Envio a SUNAT.
        $see = $util->getSee(SunatEndpoints::FE_BETA);
        $res = $see->send($voided);
        $util->writeXml($voided, $see->getFactory()->getLastXml());

    if ($res->isSuccess()) {
        /**@var $res \Greenter\Model\Response\SummaryResult*/
        $ticket = $res->getTicket();
       // echo 'Ticket :<strong>' . $ticket .'</strong>';

        $result = $see->getStatus($ticket);
        
        $filename = $voided->getName();
        $fecha=new \DateTime($Fecha_Contable);

        if ($result->isSuccess()) {
            $cdr = $result->getCdrResponse();
            $util->writeCdr($voided, $result->getCdrZip());

         //   $util->showResponse($voided, $cdr);
         $sql = "UPDATE Cuenta_Corriente SET ESTADO_FE = ( ?) where CUECOR_NUM_DOC_EMITIDO= ( ?) and CUECOR_TIPO_DOC_EMITIDO =( ?)";
         $params = array( '3',$Num_Doc,$Codigo_Tipo_Doc );
 
         $stmt = sqlsrv_query( $conn, $sql, $params);
         
         $q="INSERT INTO Documentos_Facturados (tipo_documento,codigo_documento,correlativo,serie,numeracion,documento_name,fecha_contable,estado_documento,tipo_pago,total,gravadas,igv,fecha_envio,descripcion_estado,contrato,asociado,email) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

         $p = array( 'FACTURA','01',$Num_Doc,'F002',$correlativo,$filename,$fecha,'ANULADO','USD',(float)abs($data['Total']),(float)abs($data['SubTotal']),(float)abs($data['Igv']),$fecha_envio,$cdr->getDescription(),$data['Contrato'],$data['Asociado'],'');
 
         $s = sqlsrv_query( $conn, $q, $p);
         if( $s === false ) {
             echo json_encode( sqlsrv_errors());
         }

         $result = array("status"=>"true");
         echo json_encode($result);



        } else {
            echo json_encode($util->getErrorResponse($result->getError()));
        }
    } else {
        echo json_encode($util->getErrorResponse($res->getError()));
    }

    }else if($Codigo_Tipo_Doc=='02'){
        $serie="B002";
        $codigo_documento='03';

        $numeracion= $correlativo;
        $fecha_venta=$Fecha_Contable;

        $util = Util::getInstance();
        $sum = new Summary();
        $sum->setFecGeneracion(new \DateTime($fecha_venta))
            ->setFecResumen(new \DateTime($fecha_venta))
            ->setCorrelativo($numeracion)
            ->setCompany($util->getCompany())
            ->setFecGeneracion(new \DateTime($fecha_venta))
            ->setFecResumen(new \DateTime($fecha_venta));

        $detiail = new SummaryDetail();
        $detiail->setTipoDoc('03')
        ->setSerieNro("B002"."-".$numeracion)
        ->setEstado('3')
        ->setClienteTipo($data['TipoDocCliente'])
        ->setClienteNro($data['NumDocCliente'])
        ->setTotal($data['Total'])
        ->setMtoOperGravadas($valor_gravadas)
        ->setMtoOperInafectas($valor_Exonerada)
        ->setMtoIGV($data['Igv']);

        

                
        $list= array();
        $sql = "SELECT * FROM Cuenta_Corriente cc
        INNER JOIN Concep_Pago cp ON cc.CCP_ID_CONCEPTO=cp.CCP_NID_CONCEPTO
        where cc.CUECOR_NUM_DOC_EMITIDO="
        ."'{$Num_Doc}'"."and cc.CUECOR_TIPO_DOC_EMITIDO ="
        ."'{$Codigo_Tipo_Doc}'";
    
        $stmt = sqlsrv_query( $conn, $sql );
        if( $stmt === false) {
            die( print_r( sqlsrv_errors(), true) );
        }
    
        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
            $list[]=$row;
        }
    
        
        for ($i = 0; $i < count($list); $i++) {
    
            if($list[$i]['CCP_IND_APLICAR_IGV']=='1'){
        
                $base_igv=(float)($list[$i]['CUECOR_IMPORTE'])/1.18;
                $valor_gravadas +=  $base_igv;

            }else{
           
                $valor_Exonerada+= $list[$i]['CUECOR_IMPORTE']; 
            }

    
        } 
 

        $detiail->setMtoOperGravadas($valor_gravadas)
        ->setMtoOperInafectas($valor_Exonerada);




        $sum->setDetails([$detiail]);


        // Envio a SUNAT.
        $see = $util->getSee(SunatEndpoints::FE_BETA);
        $res = $see->send($sum);
        $util->writeXml($sum, $see->getFactory()->getLastXml());

        $filename = $sum->getName();
        $fecha=new \DateTime($Fecha_Contable);

        if ($res->isSuccess()) {

            $ticket = $res->getTicket();
            $result = $see->getStatus($ticket);

            if ($result->isSuccess()) {

                $cdr = $result->getCdrResponse();

                $util->writeCdr($sum, $result->getCdrZip());
                //$util->showResponse($sum, $cdr);
               

                $sql = "UPDATE Cuenta_Corriente SET ESTADO_FE = ( ?) where CUECOR_NUM_DOC_EMITIDO= ( ?) and CUECOR_TIPO_DOC_EMITIDO =( ?)";
                $params = array( '3',$Num_Doc,$Codigo_Tipo_Doc );
        
                $stmt = sqlsrv_query( $conn, $sql, $params);

                $q="INSERT INTO Documentos_Facturados (tipo_documento,codigo_documento,correlativo,serie,numeracion,documento_name,fecha_contable,estado_documento,tipo_pago,total,gravadas,igv,fecha_envio,descripcion_estado,contrato,asociado,email) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

                $p = array( 'BOLETA DE VENTA','02',$Num_Doc,'B002',$correlativo,$filename,$fecha,'ANULADO','USD',(float)abs($data['Total']),(float)abs($data['SubTotal']),(float)abs($data['Igv']),$fecha_envio,$cdr->getDescription(),$data['Contrato'],$data['Asociado'],'');
        
                $s = sqlsrv_query( $conn, $q, $p);
                if( $s === false ) {
                    echo json_encode( sqlsrv_errors());
                }
       
                $result = array("status"=>"true");
                echo json_encode($result);



            } else {

                echo json_encode($util->getErrorResponse($result->getError()));

            }

        } else {

            echo json_encode($util->getErrorResponse($res->getError()));

        }




    }
    else if($Codigo_Tipo_Doc=='07'){

        $list= array();
        $documento_aplica="";
        $numero_aplica="";
        $sql = "SELECT top 1 CUECOR_NUM_DOC_APLICADO FROM Cuenta_Corriente cc
        INNER JOIN Documentos_Facturados df ON cc.CUECOR_NUM_DOC_EMITIDO=df.correlativo
        where cc.CUECOR_NUM_DOC_EMITIDO="
        ."'{$Num_Doc}'"."and cc.CUECOR_TIPO_DOC_EMITIDO ="
        ."'{$Codigo_Tipo_Doc}'";
    
        $stmt = sqlsrv_query( $conn, $sql );

        if( $stmt === false) {
            die( print_r( sqlsrv_errors(), true) );
        }
    
        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
            $list[]=$row;
        }
    
        
        for ($i = 0; $i < count($list); $i++) {

            $documento_aplica=$list[$i]['CUECOR_NUM_DOC_APLICADO'];
        } 

      
        
            $na= substr($documento_aplica, -6);
            
            $numero_aplica=ltrim($na, "0");


        $ser_doc_aplica=substr($documento_aplica,0,2);
        $serie_fisico=substr($documento_aplica,0,3);
        $tipo_doc_aplica="";
        $serie_doc_aplica="";
        $correlativo=substr($Num_Doc, -6);

        $nuevo_c=ltrim($correlativo, "0");

        if($ser_doc_aplica=='0B'){
            $tipo_doc_aplica='03';
            if($serie_fisico=='0B1'){
                
            $serie_doc_aplica="0001";
            }else{
            $serie_doc_aplica="B002";
            }
              

            $numeracion= $nuevo_c;
            $util = Util::getInstance();
            $sum = new Summary();
            $sum->setFecGeneracion(new DateTime($Fecha_Contable))
                ->setFecResumen(new DateTime($Fecha_Contable))
                ->setCorrelativo($numeracion)
                ->setCompany($util->getCompany())
                ->setFecGeneracion(new DateTime($Fecha_Contable))
                ->setFecResumen(new DateTime($Fecha_Contable));
    
            $detiail = new SummaryDetail();
            $detiail->setTipoDoc('07')
            ->setSerieNro("BC02"."-".$numeracion) 
            ->setDocReferencia((new Document())
                ->setTipoDoc($tipo_doc_aplica)
                ->setNroDoc($serie_doc_aplica.'-'.$numero_aplica))
            ->setEstado('3')
            ->setClienteTipo($data['TipoDocCliente'])
            ->setClienteNro($data['NumDocCliente'])
            ->setTotal(abs($data['Total']))
            ->setMtoOperGravadas($valor_gravadas)
            ->setMtoOperInafectas($valor_Exonerada)
            ->setMtoIGV(abs($data['Igv']));
    
            $list= array();
            $sql = "SELECT * FROM Cuenta_Corriente cc
            INNER JOIN Concep_Pago cp ON cc.CCP_ID_CONCEPTO=cp.CCP_NID_CONCEPTO
            where cc.CUECOR_NUM_DOC_EMITIDO="
            ."'{$Num_Doc}'"."and cc.CUECOR_TIPO_DOC_EMITIDO ="
            ."'{$Codigo_Tipo_Doc}'";
        
            $stmt = sqlsrv_query( $conn, $sql );
            if( $stmt === false) {
                die( print_r( sqlsrv_errors(), true) );
            }
        
            while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                $list[]=$row;
            }
        
            
            for ($i = 0; $i < count($list); $i++) {
        
                if($list[$i]['CCP_IND_APLICAR_IGV']=='1'){
            
                    $base_igv=(float)(abs($list[$i]['CUECOR_IMPORTE'])/1.18);
                    $valor_gravadas +=  $base_igv;
    
                }else{
               
                    $valor_Exonerada+= abs($list[$i]['CUECOR_IMPORTE']); 
                }
    
        
            } 
     
    
            $detiail->setMtoOperGravadas($valor_gravadas)
            ->setMtoOperInafectas($valor_Exonerada);
    
    
    
    
            $sum->setDetails([$detiail])
            ->setMoneda('USD');
    
    
            // Envio a SUNAT.
            $see = $util->getSee(SunatEndpoints::FE_BETA);
            $res = $see->send($sum);
            $util->writeXml($sum, $see->getFactory()->getLastXml());
    
    
            if ($res->isSuccess()) {
    
                $ticket = $res->getTicket();
                $result = $see->getStatus($ticket);
    
                if ($result->isSuccess()) {
    
                  
                    $cdr = $result->getCdrResponse();
    
                    $util->writeCdr($sum, $result->getCdrZip());
                    //$util->showResponse($sum, $cdr);

                    $codigocdr= $cdr->getCode();

                    $filename = $sum->getName();

            
                    $correlativo=substr($Num_Doc, -6);
                    $fecha=new \DateTime($Fecha_Contable);
                    if($codigocdr > 4000 || $codigocdr==0){

                        $sql = "UPDATE Cuenta_Corriente SET ESTADO_FE = ( ?) where CUECOR_NUM_DOC_EMITIDO= ( ?) and CUECOR_TIPO_DOC_EMITIDO =( ?)";
                        $params = array( '3',$Num_Doc,$Codigo_Tipo_Doc );
                
                        $stmt = sqlsrv_query( $conn, $sql, $params);

                                            
                        $q="INSERT INTO Documentos_Facturados (tipo_documento,codigo_documento,correlativo,serie,numeracion,documento_name,fecha_contable,estado_documento,tipo_pago,total,gravadas,igv,fecha_envio,descripcion_estado,contrato,asociado,email) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
          
                        $p = array( 'NOTA CREDITO','07',$Num_Doc,'BC02',$correlativo,$filename,$fecha,'ANULADO','USD',(float)abs($data['Total']),(float)abs($data['SubTotal']),(float)abs($data['Igv']),$fecha_envio,$cdr->getDescription(),$data['Contrato'],$data['Asociado'],'');
                
                        $s = sqlsrv_query( $conn, $q, $p);
                        if( $s === false ) {
                            echo json_encode( sqlsrv_errors());
                        }

                        $result = array("status"=>"true","message"=> $filename,"codigo"=>$codigocdr);
                        
                        echo json_encode($result);
                    
                    }
                    
                    else{

                        $result = array("status"=>"false","message"=> "Código de error:".$codigocdr."-"."   Descripción de error: ".$cdr->getDescription());
                        echo json_encode($result);
                    }
                  
    
    
    
                } else {
    
                    echo json_encode($util->getErrorResponse($result->getError()));
    
                }
    
            } else {
    
                echo json_encode($util->getErrorResponse($res->getError()));
    
            }



        }
        else if($ser_doc_aplica=='0F'){

        $serie="FC02";
        $codigo_documento="07";
        
        $numeracion= $correlativo;
        $fecha_venta=$Fecha_Contable;

        $util = Util::getInstance();

        //$voided = $util->getVoided();

        $detial1 = new VoidedDetail();
        $detial1->setTipoDoc($codigo_documento)
                ->setSerie($serie)
                ->setCorrelativo($numeracion)
                ->setDesMotivoBaja('ERROR DE SISTEMA');


        $voided = new Voided();
        $voided->setCorrelativo($numeracion)
                ->setFecComunicacion(new \DateTime($Fecha_Contable))
                ->setFecGeneracion(new \DateTime($Fecha_Contable))
                ->setCompany($util->getCompany())
                ->setDetails([$detial1]);
    // Envio a SUNAT.
        $see = $util->getSee(SunatEndpoints::FE_BETA);
        $res = $see->send($voided);
        $util->writeXml($voided, $see->getFactory()->getLastXml());

    if ($res->isSuccess()) {
        /**@var $res \Greenter\Model\Response\SummaryResult*/
        $ticket = $res->getTicket();
       // echo 'Ticket :<strong>' . $ticket .'</strong>';

        $result = $see->getStatus($ticket);
        
        $filename = $voided->getName();
        $fecha=new \DateTime($Fecha_Contable);

        if ($result->isSuccess()) {
            $cdr = $result->getCdrResponse();
            $util->writeCdr($voided, $result->getCdrZip());

         //   $util->showResponse($voided, $cdr);
         $sql = "UPDATE Cuenta_Corriente SET ESTADO_FE = ( ?) where CUECOR_NUM_DOC_EMITIDO= ( ?) and CUECOR_TIPO_DOC_EMITIDO =( ?)";
         $params = array( '3',$Num_Doc,$Codigo_Tipo_Doc );
 
         $stmt = sqlsrv_query( $conn, $sql, $params);
         
         $q="INSERT INTO Documentos_Facturados (tipo_documento,codigo_documento,correlativo,serie,numeracion,documento_name,fecha_contable,estado_documento,tipo_pago,total,gravadas,igv,fecha_envio,descripcion_estado,contrato,asociado,email) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

         $p = array( 'NOTA DE CREDITO','07',$Num_Doc,'FC02',$correlativo,$filename,$fecha,'ANULADO','USD',(float)abs($data['Total']),(float)abs($data['SubTotal']),(float)abs($data['Igv']),$fecha_envio,$cdr->getDescription(),$data['Contrato'],$data['Asociado'],'');
 
         $s = sqlsrv_query( $conn, $q, $p);
         if( $s === false ) {
             echo json_encode( sqlsrv_errors());
         }

         $result = array("status"=>"true");
         echo json_encode($result);



        } else {
            echo json_encode($util->getErrorResponse($result->getError()));
        }
    } else {
        echo json_encode($util->getErrorResponse($res->getError()));
    }

        }



    }




});



$app->run();

header('Content-type: application/json');
header("Access-Control-Allow-Origin: *");
ob_end_flush();

?>
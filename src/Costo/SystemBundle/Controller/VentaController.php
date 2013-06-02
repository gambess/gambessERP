<?php

namespace Costo\SystemBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Costo\SystemBundle\Model\DetalleVentaQuery;
use Costo\SystemBundle\Model\Venta;
use Costo\SystemBundle\Model\VentaQuery;
use \Costo\SystemBundle\Model\LugarVentaQuery;
use Costo\SystemBundle\Model\FormaPagoQuery;
use Costo\SystemBundle\Model\VentaFormaQuery;
use Costo\SystemBundle\Model\TipoVentaFormaQuery;
use Costo\SystemBundle\Form\Type\VentaType;
use Pagerfanta\Pagerfanta;
use Pagerfanta\Adapter\PropelAdapter;
use Symfony\Component\HttpFoundation\Response;

/**
 * @author Raziel Valle <razielvalle@gambess.com>
 * Controlador de Ventas, Metods CRUD + List + Search ++
 * Este controlador controla las acciones request de la pagina web
 */
class VentaController extends Controller {
    
    /**
     * Lanza la pagina de inicio
     * No necesita parametros y muestra un listado de las ventas existentes en base de datos
     * @method GET route: "/" name="index_venta"
     * @return Response view
     */
    public function indexAction($page) {
        $request = $this->getRequest();
        if ('GET' === $request->getMethod()) {
                $query = VentaQuery::create()
                            ->orderByFecha('DESC');
                $pagerfanta = new Pagerfanta(new PropelAdapter($query));
                $pagerfanta->setMaxPerPage(30);
                $pagerfanta->setCurrentPage($request->get('page')); // 1 by default
                $collection = $pagerfanta->getCurrentPageResults();
                return $this->render('CostoSystemBundle:Venta:index.html.twig', array(
                    'ventas' => $collection,
                    'end' => $collection->count() > 0 ? $collection->getFirst()->getFecha(): "",
                    'begin' => $collection->count() > 0 ? $collection->getLast()->getFecha(): "",
                    'page' => $page,
                    'paginate' => $pagerfanta,
                ));
        }//end GET method request
    }
    
    /**
     * Muestra el Formulario de Creación de una nueva venta
     * No necesita parametros
     * @method GET route: "/new" name="new_venta"
     * @return Response view
     */
    public function newAction() {
        $venta = new Venta();
        $form = $this->createForm(new VentaType(), $venta);
        return $this->render('CostoSystemBundle:Venta:new.html.twig', array(
            'errors' => null,
            'venta' => $venta,
            'form' => $form->createView()
        ));
    }
    /**
     * Muestra el Formulario de Creación de una nueva venta
     * No necesita parametros
     * @method POST route: "/new" name="newp_venta"
     * @return Response view
     */
    public function newpAction() {
     $request = $this->getRequest();
             if('POST' === $request->getMethod()){
                $venta = new Venta();
                $venta->setFecha(\DateTime::createFromFormat('d/m/Y', $request->get('fecha')));
                $form = $this->createForm(new VentaType(), $venta);
                return $this->render('CostoSystemBundle:Venta:new.html.twig', array(
                    'errors' => null,
                    'venta' => $venta,
                    'form' => $form->createView()
                    ));  
             }
    }
    
    /**
     * Guarda una venta y redirije o espera validacion del formulario
     * No necesita parametros
     * @method GET route: "/create" name="create_venta"
     * @return mixed, Si es valido se muestra la venta creada en caso contrario exije validacion
     */
    public function createAction() {
        
        $venta = new Venta();
        $request = $this->getRequest();
        $form = $this->createForm(new VentaType(), $venta);
        $form->bindRequest($request);
        if ($form->isValid()) {
                   $venta->save();
                   return $this->redirect($this->generateUrl('show_venta', array('id' => $venta->getId())));
        }
        else{
            print_r($form->getErrors());
        }
    }
    
    /**
     * Se busca y muestra una venta
     * Necesita el id de la venta a mostrar
     * @param int $id
     * @method GET route: "/{id}/show", name="show_venta"
     * @return Response view
     */
    public function showAction($id) {
        
        if(!is_null($id)){
        $venta = VentaQuery::create()
                ->findPk($id);
        if (!$venta) {
            throw $this->createNotFoundException('No se ha encontrado la venta solicitada');
        }
        $editForm = $this->createForm(new VentaType(), $venta);
        return $this->render('CostoSystemBundle:Venta:showupdate.html.twig', array(
            'venta' => $venta,
            'errors' => null,
            'form'=> $editForm->createView(),
        ));
    }
    else{
          throw $this->createNotFoundException('No se ha encontrado la venta solicitada');  
        }
    }
    
    /**
     * Actualiza y guarda un venta
     * Necesita un parametro el id del venta a actualizar
     * @method GET route: "/{id}/update" name="update_venta"
     * @param int $id
     * @return mixed, muestra un error o el formulario de ventas en caso de que no sea valido
     */
    public function updateAction($id) {
        
        if(!is_null($id)){
            $venta = VentaQuery::create()->findPk($id);

            if (!$venta) {
                throw $this->createNotFoundException('No se ha encontrado la venta solicitada');
            }
            $editForm = $this->createForm(new VentaType(), $venta);
            $request = $this->getRequest();
            $editForm->bindRequest($request);
            if ($editForm->isValid()) {
                $venta->save();
                return $this->redirect($this->generateUrl('show_venta', array('id' => $id)));
            }else{
            print_r($editForm->getErrors());
        }
        }else{
            throw $this->createNotFoundException('Se necesita un ');
        }
    }
    
    /**
     * Borra una Venta
     * Necesita el id de la venta a borrar
     * @method GET route: "/{id}/delete" name="delete_venta"
     * @param int $id
     * @return mixed
     */
    public function deleteAction($id) {
        
        if(!is_null($id)){
                    $venta = VentaQuery::create()->findPk($id);
                    if (!$venta) {
                        throw $this->createNotFoundException('No se ha encontrado el detalle de venta solicitado');
                    }
                    if($venta->countDetalleVentas() > 0){
                        $detalles =  $venta->getDetalleVentas();
                        foreach ($detalles as $detalle){
                            $detalle->delete();
                        }
                    }
                    $venta->delete();
                    return new Response(json_encode(array('codeResponse'=> 200, 'success'=> true)));
        }
        else {
           throw $this->createNotFoundException('Se debe enviar el identificador de la venta a borrar'); 
        }
    }
    
    /**
     * Borra un Detalle de Venta
     * Necesita el id del detalle a borrar
     * @method GET route: "/{id}/deletedet" name="delete_detalle"
     * @param int $id
     * @return mixed
     */
    public function deletedetAction($id) {
        
        if(!is_null($id)){
                    $dventa = DetalleVentaQuery::create()->findPk($id);
                    if (!$dventa) {
                        throw $this->createNotFoundException('No se ha encontrado el detalle de venta solicitado');
                    }
                    $dventa->delete();
                    return new Response(json_encode(array('codeResponse'=>200, 'success'=> true)));
        }
        else {
           throw $this->createNotFoundException('Se debe enviar el identificador del detalle de venta a borrar'); 
        }
    }
    /**
     * Verifica si ya existe una Venta en la fecha indicada
     * Necesita el id del detalle a borrar
     * @method GET route: "/{day}/{month}/{year}/exists" name="delete_detalle"
     * @param int $id
     * @return mixed
     */
    public function validatedateAction($day, $month, $year) {
        if(!is_null($day) && !is_null($month) && !is_null($year)){
            $date = $day."/".$month."/".$year;
            $valDate =\DateTime::createFromFormat('d/m/Y', $date);
            $venta = VentaQuery::create()->findOneByFecha($valDate);
            if (is_null($venta)) {
                    return new Response(json_encode(array('exists'=> 0)));
            } else{
                    return new Response(json_encode(array('exists'=> 1, 'id' => $venta->getPrimaryKey())));
            }
        }
        else {
           throw $this->createNotFoundException('Se debe enviar la fecha en el formato correcto day/month/year'); 
        }
    }
    
    /**
     * Muestra el Resumen de una venta
     * No necesita parametros
     * @method GET route: "/new" name="summary_venta"
     * @return Response view
     */
    public function summaryAction($id) {
        
        if(!is_null($id) and is_numeric($id) and $id != 0){
            //Buscar la venta
            $venta = VentaQuery::create()->findPk($id);
            
            if($venta instanceof Venta){
                $data = array();
                $date = $venta->getFecha();
                $data['LugarVenta']= $this->getAllPlaces();
                $payforms = $this->getAllPayForm();
                
                $tipoVF = $this->getDocType('DOCUMENTADA');
                $tipoR = $this->getDocType('REAL');
                $docs = $this->getWayPays($tipoVF->getPrimaryKey());
                $real = $this->getWayPays($tipoR->getPrimaryKey());
                
                    $i = 0;
                    foreach ($real as $doc){
                        
                        $result = $this->getSalesDocByDateAndForma($date, $doc);
                        if(is_array($result) and count($result) > 0){
                                $d[$doc] = array_slice($result, 0, 1);
                                $a[$i] = $d[$doc][0];
                                $i++;
                        }else {
                            $d[$doc] = Array('0' => '0');
                            $a[0]=0;
                        }
                    }
                 
                foreach ($docs as $r){
                        $resultado = $this->getSalesDocByDateAndForma($date, $r);
                        if(is_array($resultado) and count($result) > 0){
                                $re[$r] =  $resultado;
                        }else {
                            $re[$r] = Array('0' => '0');
                        }
                }
                $totaldoc = array_sum($a);
                foreach($payforms as $payform)
                {
                    $temp = $this->getPlacesSalesByDate($date,$payform);
                    $dat = Array('1' => 0, '2' => 0, '3' => 0, '4' => 0, '5' => 0);
                        foreach ($temp as $t){
                            $total = array_slice($t, 0, 1);
                            $order = array_slice($t, 1, 1);
                            $dat[$order['IdLugarVenta']]= $total['TotalVenta'];
                        }
                        $data[$payform] = $dat;
                }
                $t1 = $t2 = $t3 = $t4 = $t5 = 0;
                foreach($data as $key => $arr){
                    if($key == 'LugarVenta' and $key == 'TotalVenta')
                                continue;
                    if($key == 'EFECTIVO' or $key == 'CHEQUE' or $key == 'TRANSBANK' or $key == 'CREDITO')
                        $total_payform[$key] = array_sum ($arr);
                    foreach($arr as $k => $tot){
                        if($k == '1') $t1 += $tot; if($k == '2') $t2 += $tot; if($k == '3') $t3 += $tot;
                        if($k == '4') $t4 += $tot; if($k == '5') $t5 += $tot;

                    }
                }
                $data['Totales']= Array('1' => $t1, '2' => $t2, '3' => $t3, '4' => $t4, '5' => $t5);
                $totalizimo = array_sum($data['Totales']);
        
                return $this->render('CostoSystemBundle:Venta:summary.html.twig', array(
                        'data' => $data,
                        'totales' => $totalizimo,
                        'total_payform' => $total_payform,
                        'payforms' => $payforms,
                        'real' => $re,
                        'totaldoc' => $totaldoc,
                        'documents' => $d,
                        'id'=> $id,
                        
                        )
                );
            }
        }
    }
    
    private function getAllPayForm(){
        return FormaPagoQuery::create('fp')
                    ->select(array('fp.NombreFormaPago'))
                    ->where('fp.NombreFormaPago != ?', "TODAS")
                    ->orderByIdFormaPago('ASC')
                ->find()
                ->toArray()
                ;
    }
    
    private function getAllPlaces(){
        return LugarVentaQuery::create('lv')
                    ->select(array('lv.NombreLugarVenta'))
                    ->where('lv.NombreLugarVenta != ?', "TODOS")
                    ->orderByIdLugarVenta('ASC')
                ->find()
                ->toArray()
                ;
                
    }
    
    private function getWayPays($tipo){
        return VentaFormaQuery::create('vf')
                ->filterByIdTipoVentaForma($tipo)
                    ->select(array('vf.NombreVentaForma'))
                    ->orderByIdVentaForma('ASC')
                ->find()
                ->toArray()
                ;
                
    }
    
    private function getDocType($string){
        return TipoVentaFormaQuery::create('tvf')
                ->filterByNombreTipoVentaForma($string)
            ->findOne()
        ;
    }
    
    private function getPlacesSalesByDate($date,$fp){
        /* Query encapsulada
         SELECT dv.fecha_venta, lv.nombre_lugar_venta AS lugarventa, sum( dv.total_venta ) AS total, fp.nombre_forma_pago AS "formapago"
            FROM detalle_venta AS dv
            INNER JOIN lugar_venta AS lv ON dv.id_lugar_venta = lv.id_lugar_venta
            INNER JOIN forma_pago AS fp ON dv.id_forma_pago = fp.id_forma_pago
            GROUP BY dv.fecha_venta, dv.id_lugar_venta, dv.id_forma_pago
            HAVING MIN( dv.fecha_venta ) >= '2013-05-02'
            AND MAX( dv.fecha_venta ) <= '2013-05-02
         */
        return DetalleVentaQuery::create('dv')
              ->useFormaPagoQuery('fp','INNER JOIN')
                ->where('fp.NombreFormaPago LIKE ?', $fp)
              ->endUse()
              ->useLugarVentaQuery('lv', 'INNER JOIN')
//                ->filterByNombreLugarVenta($lv)
              ->endUse()
            ->groupByFechaVenta()
            ->groupByIdLugarVenta()
            ->groupByIdFormaPago()
                ->orderByIdFormaPago('ASC')
                ->orderByIdLugarVenta('ASC')
//                ->withColumn('fp.NombreFormaPago','NombreFormaPago')                
//                ->withColumn('dv.IdFormaPago','IdFormaPago')                
                ->withColumn('dv.IdLugarVenta','IdLugarVenta')                
                ->withColumn('SUM(dv.TotalVenta)','TotalVenta')
            ->condition('cond1', 'MAX(dv.FechaVenta) = ?', $date)
            ->condition('cond2', 'MIN(dv.FechaVenta) = ?', $date)
                ->having(array('cond1', 'cond2'), 'and')
          ->select(array(/*'lv.NombreLugarVenta',*/'TotalVenta'/*, 'IdFormaPago'*/))
                ->where('dv.IdVentaForma = ?', 5)
    ->find()->toArray();
    }
    private function getSalesDocByDateAndForma($date, $forma){
        
        return DetalleVentaQuery::create('dv')
                ->useVentaFormaQuery('vf', 'INNER JOIN')
                    ->filterByNombreVentaForma($forma)
                ->endUse()
            ->groupByFechaVenta()
            ->groupByIdVentaForma()
                ->orderByIdFormaPago('ASC')
                ->orderByIdLugarVenta('ASC')
                ->withColumn('SUM(dv.TotalVenta)','TotalVenta')
            ->condition('cond1', 'MAX(dv.FechaVenta) = ?', $date)
            ->condition('cond2', 'MIN(dv.FechaVenta) = ?', $date)
                ->having(array('cond1', 'cond2'), 'and')
          ->select(array('TotalVenta'))
    ->find()
                ->toArray()
                ;
        
    }
}
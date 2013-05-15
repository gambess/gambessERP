<?php

namespace Costo\SystemBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Costo\SystemBundle\Model\DetalleVenta;
use Costo\SystemBundle\Model\DetalleVentaQuery;
use Costo\SystemBundle\Model\Venta;
use Costo\SystemBundle\Model\VentaQuery;
use Costo\SystemBundle\Form\Type\DetalleVentaType;
use Costo\SystemBundle\Form\Type\VentaType;
use Symfony\Component\Form\FormError;
use Pagerfanta\Pagerfanta;
use Pagerfanta\Adapter\PropelAdapter;
use Pagerfanta\Exception\NotValidCurrentPageException;
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
     * @method GET route: "/new" name="new_venta"
     * @return Response view
     */
    public function summaryAction($id) {
        return $this->render('CostoSystemBundle:Venta:summary.html.twig');
    }
}
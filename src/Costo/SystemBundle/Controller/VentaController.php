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
                            ->orderByFecha('ASC');
                            
                $pagerfanta = new Pagerfanta(new PropelAdapter($query));
                $pagerfanta->setMaxPerPage(15);
                $pagerfanta->setCurrentPage($request->get('page')); // 1 by default
                $collection = $pagerfanta->getCurrentPageResults();

                return $this->render('CostoSystemBundle:Venta:index.html.twig', array(
                    'ventas' => $collection,
                    'end' => $collection->count() > 0 ? $collection->getFirst()->getFecha(): 0,
                    'begin' => $collection->count() > 0 ? $collection->getLast()->getFecha(): 0,
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
            
        }
}
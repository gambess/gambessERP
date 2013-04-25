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
    
    
    
    
}
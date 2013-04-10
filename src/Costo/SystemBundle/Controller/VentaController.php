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
            if ($page == 0) {
                $ventas = VentaQuery::create()
                        ->orderByFecha('ASC')
                ->find();
                return $this->render('CostoSystemBundle:Venta:list.html.twig', array(
                    'ventas' => $ventas,
                    'page' => $page,
                ));
            } else {
                $query = VentaQuery::create()
                        ->orderByFecha('ASC')
                        ;
                $pagerfanta = new Pagerfanta(new PropelAdapter($query));
                $pagerfanta->setMaxPerPage(7);
                $pagerfanta->setCurrentPage($request->get('page')); // 1 by default
                $collection = $pagerfanta->getCurrentPageResults();

                return $this->render('CostoSystemBundle:Venta:list.html.twig', array(
                    'ventas' => $collection,
                    'end' => $collection->getFirst()->getFecha(),
                    'begin' => $collection->getLast()->getFecha(),
                    'page' => $page,
                    'paginate' => $pagerfanta,
                ));
            }
        }
    }
    
    /**
     * Lanza la pagina con la fecha
     * No necesita parametros 
     * @method GET route: "/" name="index_primera"
     * @return Response view
     */
    
    public function primeraAction(){
       
        $form = $this->showVentaForm();
        return $this->render('CostoSystemBundle:Venta:primera.html.twig', array(
            'errors' => null,
            'form' => $form->createView(),
        ));
    }
    
    public function dispatchAction(){
        
        $request = $this->getRequest();

        if ('POST' === $request->getMethod()) {

            // Se recupera la fecha
            $dateArray = $request->request->get('form');
            //Se convierte a Datetime Class
            $date = \DateTime::createFromFormat('d/m/Y', $dateArray['fecha']);
//            $date = $form->get('fecha')->getData();
            $venta = VentaQuery::create()->findOneByFecha($date);
            
            if(null === $venta)
            {
                 $venta = new Venta();
                 $venta->setFecha($date);
                 $form = $this->createForm(new VentaType(), $venta);
                return $this->render('CostoSystemBundle:Venta:new2.html.twig', array(
                    'errors' => null,
                    'venta' => $venta,
                    'form' => $form->createView()
        ));
            }
            if($venta instanceof Venta){
              
                $editForm = $this->createForm(new VentaType(), $venta);
                $deleteForm = $this->createDeleteDetalleForm();
                return $this->render('CostoSystemBundle:Venta:createmod.html.twig', array(
                    'venta' => $venta,
                    'errors' => null,
                    'form'=> $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
                ));  
            }
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
        $venta = VentaQuery::create()->findPk($id);

        if (!$venta) {
            throw $this->createNotFoundException('No se ha encontrado la venta solicitada');
        }
        $editForm = $this->createForm(new VentaType(), $venta);
        $deleteForm = $this->createDeleteForm($id);
//        echo "<pre>";
//        print_r($editForm->createView());
//        echo "</pre>";

        return $this->render('CostoSystemBundle:Venta:createmod.html.twig', array(
            'venta' => $venta,
            'errors' => null,
            'form'=> $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
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

        return $this->render('CostoSystemBundle:Venta:new2.html.twig', array(
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
        $deleteForm = $this->createDeleteForm(null);

     if ($form->isValid()) {

                $venta->save();
                return $this->redirect($this->generateUrl('show_ventados', array('id' => $venta->getId())));
     }
     else{
            return $this->render('CostoSystemBundle:Venta:createmod.html.twig', array(
            'errors' => null,
            'venta' => $venta,
            'form' => $form->createView(),
            'delete_form' => $deleteForm->createView(),
            ));
        }
    }

    /**
     * Muestra el formulario de edicion de una venta
     * Necesita el id de la venta a editar
     * @method GET route: "/create" name="create_venta"
     * @param int $id
     * @return mixed, renderiza el formulario de edicion o un error en caso de no encontrar la venta
     */
    public function editAction($id) {
        $venta = VentaQuery::create()->findPk($id);

        if (!$venta) {
            throw $this->createNotFoundException('No se ha encontrado la venta solicitada');
        }

        $editForm = $this->createForm(new VentaType(), $venta);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CostoSystemBundle:Venta:edit.html.twig', array(
            'venta' => $venta,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Actualiza y guarda un venta
     * Necesita un parametro el id del venta a actualizar
     * @method GET route: "/{id}/update" name="update_venta"
     * @param int $id
     * @return mixed, muestra un error o el formulario de ventas en caso de que no sea valido
     */
    public function updateAction($id) {
        $venta = VentaQuery::create()->findPk($id);

        if (!$venta) {
            throw $this->createNotFoundException('No se ha encontrado la venta solicitada');
        }

        $editForm = $this->createForm(new VentaType(), $venta);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $venta->save();

            return $this->redirect($this->generateUrl('show_venta', array('id' => $id)));
        }

        return $this->render('CostoSystemBundle:Venta:edit.html.twig', array(
            'venta' => $venta,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Borra una Venta
     * Necesita el id de la venta a borrar
     * @method GET route: "/{id}/delete" name="delete_venta"
     * @param int $id
     * @return mixed
     */
    public function deleteAction($id) {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();
        $form->bindRequest($request);

        if ($form->isValid()) {
            $venta = DetalleVentaQuery::create()->findPk($id);

            if (!$venta) {
                throw $this->createNotFoundException('No se ha encontrado el detalle de venta solicitada');
            }

            $venta->delete();
        }
        
        return $this->redirect($this->generateUrl('index_venta'));
    }
    
    /**
     * Borra una Venta
     * Necesita el id de la venta a borrar
     * @method GET route: "/{id}/delete" name="delete_venta"
     * @param int $id
     * @return mixed
     */
    public function deletedosAction($id) {
        $form = $this->createDeleteDetalleForm($id);
        $request = $this->getRequest();
        $form->bindRequest($request);

        if ($form->isValid()) {
            $detalleVenta = DetalleVentaQuery::create()->findPk($id);

            if (!$detalleVenta) {
                throw $this->createNotFoundException('No se ha encontrado la venta solicitada');
            }
            $venta = $detalleVenta->getVenta();
            $detalleVenta->delete();
        }

        if (!$venta) {
            throw $this->createNotFoundException('No se ha encontrado la venta solicitada');
        }
        $editForm = $this->createForm(new VentaType(), $venta);
        $deleteForm = $this->createDeleteDetalleForm($id);
//        echo "<pre>";
//        print_r($editForm->createView());
//        echo "</pre>";

        return $this->render('CostoSystemBundle:Venta:createmod.html.twig', array(
            'venta' => $venta,
            'errors' => null,
            'form'=> $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
//        return $this->redirect($this->generateUrl('index_venta'));
    }
    
    /**
     * Formulario que redirecciona a crear o actualizar
     * @return Form
     */
    private function showVentaForm(){

        return $this->createFormBuilder(null, array())
                ->add('fecha', 'date', array('label' => 'Fecha Venta', 'widget' => 'single_text', 'input' => 'datetime', 'format' => 'dd/MM/yyyy'))
                ->getForm()
        ;
    }
        
    private function createDeleteForm($id) {
        return $this->createFormBuilder(array('id' => $id))
                ->add('id', 'hidden')
                ->getForm()
        ;
    }
    
    private function createDeleteDetalleForm($id = null) {
        return $this->createFormBuilder(array('id' => $id))
                ->add('id', 'hidden')
                ->getForm()
        ;
    }
    
    
}
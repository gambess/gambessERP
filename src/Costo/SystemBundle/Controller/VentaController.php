<?php

namespace Costo\SystemBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Costo\SystemBundle\Model\Venta;
use Costo\SystemBundle\Model\VentaQuery;
use Costo\SystemBundle\Form\Type\VentaType;

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
    public function indexAction() {
        $ventas = VentaQuery::create()->orderByFechaVenta('DESC')->find();
        return $this->render('CostoSystemBundle:Venta:index.html.twig', array(
            'ventas' => $ventas,
        ));
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

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CostoSystemBundle:Venta:show.html.twig', array(
            'venta' => $venta,
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

        return $this->render('CostoSystemBundle:Venta:new.html.twig', array(
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
            $venta_in = $form->get('fecha_venta')->getData();
            $exist = VentaQuery::create()->findOneByFechaVenta($venta_in);
            if (null === $exist) {
                $venta->save();
                return $this->redirect($this->generateUrl('show_venta', array('id' => $venta->getIdVenta())));
            }
            if($exist instanceof Venta){
                echo "La fecha usada ya esta agregada";
                return $this->render('CostoSystemBundle:Venta:new.html.twig', array(
                'venta' => $venta,
                'form' => $form->createView()
        ));
            }
        }

        return $this->render('CostoSystemBundle:Venta:new.html.twig', array(
            'venta' => $venta,
            'form' => $form->createView()
        ));
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

            return $this->redirect($this->generateUrl('edit_venta', array('id' => $id)));
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
            $venta = VentaQuery::create()->findPk($id);

            if (!$venta) {
                throw $this->createNotFoundException('No se ha encontrado la venta solicitada');
            }

            $venta->delete();
        }

        return $this->redirect($this->generateUrl('index_venta'));
    }

    public function confirmAction($fecha){
        return $this->render('CostoSystemBundle:Venta:confirm.html.twig', array('fecha' => $fecha));
    }

    private function createDeleteForm($id) {
        return $this->createFormBuilder(array('id' => $id))
                ->add('id', 'hidden')
                ->getForm()
        ;
    }

}

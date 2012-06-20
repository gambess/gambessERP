<?php

namespace Costo\SystemBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Costo\SystemBundle\Model\Cuenta;
use Costo\SystemBundle\Model\CuentaQuery;
use Costo\SystemBundle\Form\Type\CuentaType;

class CuentaController extends Controller {

    public function indexAction() {
        return $this->render('CostoSystemBundle:Cuenta:index.html.twig');
    }

    public function listAction($id) {
        if ($id === null)
            $cuentas = CuentaQuery::create()->find();
        else
            $cuentas = CuentaQuery::create()->findPk($id);
        return $this->render('CostoSystemBundle:Cuenta:list.html.twig', array('cuentas' => $cuentas));
    }

    /**
     * Crea una nueva cuenta contable
     * @return <type>
     */
    public function createAction() {
        $cuenta = new cuenta();
        $form = $this->createForm(new CuentaType(), $cuenta);

        $request = $this->getRequest();

        if ('POST' === $request->getMethod()) {
            $form->bindRequest($request);

            if ($form->isValid()) {
                $cuenta->save();
                return $this->redirect($this->generateUrl('_list'));
            }
        }
        return $this->render('CostoSystemBundle:Cuenta:create.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * Actualiza una cuenta
     * @param int $id
     * @return <type>
     */
    public function updateAction($id) {

//        \print_r(\get_class_methods($this));
//        die ();
//        if ($id != null)


        $cuenta = CuentaQuery::create()->findPk($id);

        if (!$cuenta) {
            throw $this->createNotFoundException('No se ha encontrado la ciudad solicitada');
        }

        $editForm = $this->createForm(new CuentaType(), $cuenta);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();
        if ('POST' === $request->getMethod()) {
            $form->bindRequest($request);

            if ($form->isValid()) {
                $cuenta->save();
                return $this->redirect($this->generateUrl('_list'));
            }
        }

        return $this->render('CostoSystemBundle:Cuenta:update.html.twig', array(
            'cuenta' => $cuenta,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    public function deleteAction($id) {
        return $this->render('CostoSystemBundle:Cuenta:delete.html.twig');
    }

    private function createDeleteForm($id) {
        return $this->createFormBuilder(array('id' => $id))
                ->add('id', 'hidden')
                ->getForm()
        ;
    }

}
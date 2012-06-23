<?php

namespace Costo\SystemBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Costo\SystemBundle\Entity\AjusteVenta;
use Costo\SystemBundle\Form\AjusteVentaType;

/**
 * AjusteVenta controller.
 *
 * @Route("/ajusteventa")
 */
class AjusteVentaController extends Controller
{
    /**
     * Lists all AjusteVenta entities.
     *
     * @Route("/", name="ajusteventa")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('CostoSystemBundle:AjusteVenta')->findAll();

        return array('entities' => $entities);
    }

    /**
     * Finds and displays a AjusteVenta entity.
     *
     * @Route("/{id}/show", name="ajusteventa_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('CostoSystemBundle:AjusteVenta')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AjusteVenta entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        );
    }

    /**
     * Displays a form to create a new AjusteVenta entity.
     *
     * @Route("/new", name="ajusteventa_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new AjusteVenta();
        $form   = $this->createForm(new AjusteVentaType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Creates a new AjusteVenta entity.
     *
     * @Route("/create", name="ajusteventa_create")
     * @Method("post")
     * @Template("CostoSystemBundle:AjusteVenta:new.html.twig")
     */
    public function createAction()
    {
        $entity  = new AjusteVenta();
        $request = $this->getRequest();
        $form    = $this->createForm(new AjusteVentaType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('ajusteventa_show', array('id' => $entity->getId())));
            
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Displays a form to edit an existing AjusteVenta entity.
     *
     * @Route("/{id}/edit", name="ajusteventa_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('CostoSystemBundle:AjusteVenta')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AjusteVenta entity.');
        }

        $editForm = $this->createForm(new AjusteVentaType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing AjusteVenta entity.
     *
     * @Route("/{id}/update", name="ajusteventa_update")
     * @Method("post")
     * @Template("CostoSystemBundle:AjusteVenta:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('CostoSystemBundle:AjusteVenta')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AjusteVenta entity.');
        }

        $editForm   = $this->createForm(new AjusteVentaType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('ajusteventa_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a AjusteVenta entity.
     *
     * @Route("/{id}/delete", name="ajusteventa_delete")
     * @Method("post")
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('CostoSystemBundle:AjusteVenta')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find AjusteVenta entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('ajusteventa'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}

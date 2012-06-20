<?php
namespace Costo\SystemBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Costo\SystemBundle\Model\Cuenta;
use Costo\SystemBundle\Model\CuentaQuery;
use Costo\SystemBundle\Form\Type\CuentaType;


class CuentaController extends Controller
{
    
    public function indexAction()
    {
        return $this->render('CostoSystemBundle:Cuenta:index.html.twig');
    }

    public function listAction($id)
    {
        if($id === null)
            $cuenta = CuentaQuery::create()->find();
        else
            $cuenta = CuentaQuery::create()->findPk($id);
        return $this->render('CostoSystemBundle:Cuenta:list.html.twig', array('cuenta'=> $cuenta));
    }

    public function createAction()
    {
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
        ));    }

    public function updateAction($id)
    {
        return $this->render('CostoSystemBundle:Cuenta:update.html.twig');
    }

    public function deleteAction($id)
    {
        return $this->render('CostoSystemBundle:Cuenta:create.html.twig');
    }
}
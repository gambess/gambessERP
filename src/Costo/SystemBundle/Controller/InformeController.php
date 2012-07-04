<?php

namespace Costo\SystemBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @author Raziel Valle <razielvalle@gambess.com>
 * Controlador de HomePage, Metods CRUD+
 * Este controlador controla las acciones request de la pagina web
 */
class InformeController extends Controller {

    /**
     * Lanza la pagina de inicio
     * No necesita parametros
     * @method GET route: "/" name="_homepage"
     * @return Response view
     */
    public function indexAction() {
        return $this->render('CostoSystemBundle:Informe:index.html.twig');
    }

    public function reportAction() {

        $form = $this->createFormBuilder(null, array())
                        ->add('min_date', 'date', array(
                            'input' => 'string',
                            'widget' => 'single_text',
                            'format' => 'dd-mm-yyyy',
                        ))
                        ->add('max_date', 'date', array(
                            'input' => 'string',
                            'widget' => 'single_text',
                            'format' => 'dd-mm-yyyy',
                                )
                        )
                        ->getForm()
        ;

        return $this->render("CostoSystemBundle:Informe:report.html.twig", array(
            'form' => $form->createView(),
        ));
    }

}
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
              
//        if ($form->isValid()) {
//            return $this->redirect($this->generateUrl('_report', array('date_max' => 'NOw', 'date_min'=> 'NOW')));

//        }
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
        return $this->render('CostoSystemBundle:Informe:index.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function reportAction() {

          $request = $this->getRequest();
          echo $request->getMethod();
          if('POST' === $request->getMethod()){
          echo "<pre>";
          \print_r($request);
          \print_r($request->request);
          \print_r($request->request->all());
          \print_r(get_class_methods($request->request));
//                print_r($request->request);
//                echo $request->request->get('min_date');
//                echo $request->request->get('max_date');
//                var_dump($request->parameters['begin_date']);
//                echo "<br />";
//                var_dump($request->parameters['end_date']);
                echo "</pre>";
          }
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
        $form->bindRequest($request);
        return $this->render("CostoSystemBundle:Informe:report.html.twig", array(
            'form' => $form->createView(),
        ));
    }

}
<?php

namespace App\Controller;

use App\Entity\Model;
use App\Entity\Make;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class ModelController extends AbstractController
{
    /**
     * @Route("/model", name="model")
     */
    // public function index()
    // {
    //     return $this->render('model/index.html.twig', [
    //         'controller_name' => 'ModelController',
    //     ]);
    // }
    public function index()
    {
        
        // $data = json_decode( file_get_contents(__DIR__ . '/make-model.json'), true);


        // foreach ($data as $vehicle) {    
            
        //     $make = new Make();
        //     $make->setName($vehicle['make']);
         

        //     foreach ($vehicle['models'] as $k) { 
        //         $model = new Model();
        //         $model->setName($k);
        //         $model->setMake($make);
        //     }
        // }

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($make);
        $entityManager->persist($model);
        $entityManager->flush();

        return new Response(
            'Saved new model with id: '.$model->getId()
            .' and new make with id: '.$make->getId()
        );
    }
}

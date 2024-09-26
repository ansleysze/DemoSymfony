<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\EntityGeneratorType;


class EntityGeneratorController extends AbstractController
{

function generateentity(Request $request)
{
    $form = $this->createForm(EntityGeneratorType::class);
    $form->handleRequest($request);
    $jsonData = null;

    $jsonData = []; // Initialize jsonData

    if ($form->isSubmitted() && $form->isValid()) {
        $data = $form->getData();
        // gather properties
        
        $properties = [];
        foreach ($data['properties'] as $property) {
            $properties[] = [
                'propertyName' => $property['propertyName'],
                'propertyType' => $property['propertyType'],
                'isNullable' => $property['propertyNullable'] === false ? 'false' : ($property['propertyNullable'] === true ? 'true' : $property['propertyNullable']),
            ];
        }

        $jsonData = [
            'entityName' => $data['entityName'],
            'properties' => $properties,
        ];
    }

    // Pass jsonData to the template
    return $this->render('metronic.html.twig', [
        'form' => $form->createView(),
        'jsonData' => $jsonData,
        ]);
    }
}
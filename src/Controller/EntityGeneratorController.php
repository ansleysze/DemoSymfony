<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\EntityGeneratorType;

class EntityGeneratorController extends AbstractController
{
    public function generateEntity(Request $request)
    {
        $form = $this->createForm(EntityGeneratorType::class);
        $form->handleRequest($request);
        
        $jsonData = []; 

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            
            dump($data);
            
            $properties = [];
            
            if (isset($data['properties'])) {
                foreach ($data['properties'] as $property) {
                    if (!empty($property['propertyName'])) {
                        // Initialize the property data array
                        $propertyData = [
                            'propertyName' => $property['propertyName'],
                            'propertyType' => $property['propertyType'],
                            'isNullable' => !empty($property['propertyNullable']) ? 'true' : 'false',
                        ];
                        
                        if ($property['propertyType'] === 'string') {
                            $propertyData['value'] = !empty($property['stringLength']) ? $property['stringLength'] : null;
                        }

                        if ($property['propertyType'] === 'association') {
                            $propertyData['associationType'] = $property['associationTypes'];  // OneToMany, ManyToOne, etc.
                            
                            $propertyData['associationDirection'] = $property['Direction'];

                            if (!empty($property['associatedEntity'])) {
                                $propertyData['associatedEntity'] = $property['associatedEntity'];
                            }
                            if (!empty($property['associatedProperty'])) {
                                $propertyData['associatedProperty'] = $property['associatedProperty'];
                            }
                        }
        
                        $properties[] = $propertyData;
                    }
                }
                
            }
            
            
            $jsonData = [
                'entityName' => $data['entityName'],
                'properties' => $properties,
            ];

           // $result = $entityGeneratorService->generateEntityFile($data['entityName'], $jsonData['properties']);
        }
        

        // Pass jsonData to the template
        return $this->render('metronic.html.twig', [
            'form' => $form->createView(),
            'jsonData' => $jsonData,
        ]);
    }
}
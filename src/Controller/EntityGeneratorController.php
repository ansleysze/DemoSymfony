<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\EntityGeneratorType;

class EntityGeneratorController extends AbstractController
{
    /**
     * @Route("/generate", name="generate_entity")
     */
    public function generateEntity(Request $request)
    {
        $form = $this->createForm(EntityGeneratorType::class);
        $form->handleRequest($request);
        
        $jsonData = []; // Initialize jsonData

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            
            // Initialize properties array
            $properties = [];
            
            // Check if properties were submitted
            if (isset($data['properties'])) {
                foreach ($data['properties'] as $property) {
                    // Skip empty properties to avoid null values in the array
                    if (!empty($property['propertyName'])) {
                        // Initialize the property data array
                        $propertyData = [
                            'propertyName' => $property['propertyName'],
                            'propertyType' => $property['propertyType'],
                            'isNullable' => !empty($property['propertyNullable']) ? 'true' : 'false',
                        ];
                        
                        // Check for string type and add stringLength if provided
                        if ($property['propertyType'] === 'string') {
                            $propertyData['value'] = !empty($property['stringLength']) ? $property['stringLength'] : null;
                        }
        
                        // Add the populated propertyData to properties array
                        $properties[] = $propertyData;
                    }
                }
            }
            
            // Prepare jsonData with entityName and properties
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


<?php
// ./src/Controller/DefaultController.php
namespace App\Controller;

use App\Form\TestFormType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends AbstractController
{
    /**
     * @Route("/test", name="test")
     */
    public function index(Request $request): Response
    {
        $form = $this->createForm(TestFormType::class);
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Handle form submission, e.g., save data to the database or perform an action
        }

        return $this->render('test.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}

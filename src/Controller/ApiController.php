<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: '/api', name: 'api_')]
class ApiController extends AbstractController
{
    #[Route('', name: 'index', methods: ['GET'])]
    public function index(): JsonResponse
    {
        $data = [
            'message' => 'Welcome to the API!',
        ];
        return $this->json($data);
    }

    #[Route('/about', name: 'about', methods: ['GET'])]
    public function about(): JsonResponse
    {
        $data = [
            'message' => 'a propos',
        ];
        return $this->json($data);
    }

    #[Route('/contact', name: 'contact', methods: ['GET'])]
    public function contact(): JsonResponse
    {
        $data = [
            'message' => 'contact',
        ];
        return $this->json($data);
    }
}

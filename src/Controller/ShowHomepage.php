<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class ShowHomepage extends AbstractController
{
    #[Route("/", name: 'homepage')]
    public function __invoke(): Response
    {
        return $this->redirectToRoute('contact_list');
    }
}

<?php

declare(strict_types=1);

namespace App\Controller\Contact;

use App\Domain\Contact\ContactId;
use App\Domain\Contact\ContactRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

#[Route("/contacts")]
final class Show extends AbstractController
{
    private ContactRepository $contactRepository;

    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    #[Route("/{id}", name: "contact_show")]
    public function __invoke(string $id): Response
    {
        return $this->render('contact/show.html.twig', [
            'contact' => $this->contactRepository->get(ContactId::fromString($id)),
        ]);
    }
}

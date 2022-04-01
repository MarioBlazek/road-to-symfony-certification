<?php

declare(strict_types=1);

namespace App\Controller\Proposal;

use App\Domain\Contact\ContactId;
use App\Domain\Contact\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route("/proposals")]
final class Show extends AbstractController
{
    private ContactRepository $contactRepository;

    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    #[Route("/{id}", name: "proposal_show")]
    public function __invoke(string $id): Response
    {
        $contact = $this->contactRepository->get(ContactId::fromString($id));

        return $this->render('proposal/show.html.twig', [
            'contact' => $contact,
        ]);
    }
}

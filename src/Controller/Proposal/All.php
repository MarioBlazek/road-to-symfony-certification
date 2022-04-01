<?php

declare(strict_types=1);

namespace App\Controller\Proposal;

use App\Domain\Contact\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route("/proposals")]
final class All extends AbstractController
{
    private ContactRepository $contactRepository;

    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    #[Route("/", name: "proposal_list")]
    public function __invoke(): Response
    {
        $contacts = $this->contactRepository->findProposed();

        return $this->render('proposal/list.html.twig', [
            'contacts' => $contacts,
        ]);
    }
}

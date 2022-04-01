<?php

declare(strict_types=1);

namespace App\Controller\Contact;

use App\Domain\Contact\ContactRepository;
use App\Domain\Organization\OrganizationRepository;
use App\Util\ObjectArray;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route("/contacts")]
final class All extends AbstractController
{
    private ContactRepository $contactRepository;
    private OrganizationRepository $organizationRepository;

    public function __construct(ContactRepository $contactRepository, OrganizationRepository $organizationRepository)
    {
        $this->contactRepository = $contactRepository;
        $this->organizationRepository = $organizationRepository;
    }

    #[Route("/", name: "contact_list")]
    public function __invoke(): Response
    {
        $contacts = $this->contactRepository->findApproved();

        $organizationNames = $this->organizationRepository->findNames(
            array_unique(ObjectArray::map('getOrganizationId', $contacts))
        );

        return $this->render('contact/list.html.twig', [
            'contacts' => $contacts,
            'organizationNames' => $organizationNames,
        ]);
    }
}

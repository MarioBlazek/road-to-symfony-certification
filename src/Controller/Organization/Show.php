<?php

declare(strict_types=1);

namespace App\Controller\Organization;

use App\Domain\Organization\OrganizationId;
use App\Domain\Organization\OrganizationRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

#[Route("/organizations")]
final class Show extends AbstractController
{
    private OrganizationRepository $organizationRepository;

    public function __construct(OrganizationRepository $organizationRepository)
    {
        $this->organizationRepository = $organizationRepository;
    }

    #[Route("/{id}", name: "organization_show")]
    public function __invoke(Request $request, string $id): Response
    {
        $organization = $this->organizationRepository->get(OrganizationId::fromString($id));

        return $this->render('organization/show.html.twig', [
            'organization' => $organization,
        ]);
    }
}

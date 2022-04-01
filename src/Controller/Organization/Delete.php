<?php

declare(strict_types=1);

namespace App\Controller\Organization;

use App\Domain\Organization\OrganizationId;
use App\Domain\Organization\OrganizationRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route("/organizations")]
final class Delete extends AbstractController
{
    private OrganizationRepository $organizationRepository;

    public function __construct(OrganizationRepository $organizationRepository)
    {
        $this->organizationRepository = $organizationRepository;
    }

    #[Route("/{id}/delete", name: "organization_delete")]
    public function __invoke(string $id): Response
    {
        $this->organizationRepository->delete(OrganizationId::fromString($id));

        return $this->redirectToRoute('organization_list');
    }
}

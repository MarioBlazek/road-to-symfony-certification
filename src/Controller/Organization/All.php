<?php

declare(strict_types=1);

namespace App\Controller\Organization;

use App\Domain\Organization\OrganizationRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route("/organizations")]
final class All extends AbstractController
{
    private OrganizationRepository $organizationRepository;

    public function __construct(OrganizationRepository $organizationRepository)
    {
        $this->organizationRepository = $organizationRepository;
    }

    #[Route("/", name: "organization_list")]
    public function __invoke(OrganizationRepository $organizationRepository): Response
    {
        $organizations = $this->organizationRepository->findAll();

        return $this->render('organization/list.html.twig', [
            'organizations' => $organizations,
        ]);
    }
}

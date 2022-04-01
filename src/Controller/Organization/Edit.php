<?php

declare(strict_types=1);

namespace App\Controller\Organization;

use App\Domain\Organization\OrganizationId;
use App\Domain\Organization\OrganizationRepository;
use App\Form\OrganizationType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

#[Route("/organizations")]
final class Edit extends AbstractController
{
    private OrganizationRepository $organizationRepository;

    public function __construct(OrganizationRepository $organizationRepository)
    {
        $this->organizationRepository = $organizationRepository;
    }

    #[Route("/{id}/edit", name: "organization_edit")]
    public function __invoke(Request $request, $id, OrganizationRepository $organizationRepository): Response
    {
        $organization = $this->organizationRepository->get(OrganizationId::fromString($id));

        $form = $this->createForm(OrganizationType::class, $organization);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $organizationRepository->flush();

            return $this->redirectToRoute('organization_list');

        }

        return $this->render('organization/edit.html.twig',
            [
                'organization' => $organization,
                'form' => $form->createView(),
            ]
        );
    }
}

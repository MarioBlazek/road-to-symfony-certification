<?php

declare(strict_types=1);

namespace App\Controller\Organization;

use App\Domain\Organization\OrganizationRepository;
use App\Form\OrganizationType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

#[Route("/organizations")]
final class Create extends AbstractController
{
    private OrganizationRepository $organizationRepository;

    public function __construct(OrganizationRepository $organizationRepository)
    {
        $this->organizationRepository = $organizationRepository;
    }

    #[Route("/create", name: "organization_create")]
    public function __invoke(Request $request): Response
    {
        $form = $this->createForm(OrganizationType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->organizationRepository
                ->add($form->getData());

            return $this->redirectToRoute('organization_list');
        }

        return $this->render('organization/create.html.twig',
            [
                'form' => $form->createView(),
            ]
        );
    }
}

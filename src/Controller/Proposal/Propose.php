<?php

declare(strict_types=1);

namespace App\Controller\Proposal;

use App\Form\ProposeContactType;
use SimpleBus\SymfonyBridge\Bus\CommandBus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route("/proposals")]
final class Propose extends AbstractController
{
    private CommandBus $commandBus;

    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    #[Route("/propose", name: "proposal_propose")]
    public function __invoke(Request $request): Response
    {
        $form = $this->createForm(ProposeContactType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->commandBus->handle($form->getData());

            return $this->redirectToRoute('proposal_list');
        }

        return $this->render('proposal/propose.html.twig',
            [
                'form' => $form->createView(),
            ]
        );
    }
}

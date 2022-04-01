<?php

declare(strict_types=1);

namespace App\Controller\Proposal;

use App\Application\Contact\ApproveContact;
use App\Domain\Contact\ContactId;
use SimpleBus\SymfonyBridge\Bus\CommandBus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route("/proposals")]
final class Approve extends AbstractController
{
    private CommandBus $commandBus;

    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    #[Route("/{id}/approve", name: "proposal_approve")]
    public function __invoke(string $id): Response
    {
        $this->commandBus->handle(
            new ApproveContact(ContactId::fromString($id))
        );

        return $this->redirectToRoute('proposal_list');
    }
}

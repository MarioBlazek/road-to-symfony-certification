<?php

declare(strict_types=1);

namespace App\Controller\Proposal;

use App\Application\Contact\RejectContact;
use App\Domain\Contact\ContactId;
use SimpleBus\SymfonyBridge\Bus\CommandBus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route("/proposals")]
final class Reject extends AbstractController
{
    private CommandBus $commandBus;

    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    #[Route("/{id}/reject", name: "proposal_reject")]
    public function __invoke($id, CommandBus $commandBus): Response
    {
        $this->commandBus->handle(
            new RejectContact(ContactId::fromString($id))
        );

        return $this->redirectToRoute('proposal_list');
    }
}

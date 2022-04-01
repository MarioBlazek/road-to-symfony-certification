<?php

declare(strict_types=1);

namespace App\Controller\Contact;

use App\Application\Contact\DeleteContact as DeleteContactCommand;
use App\Domain\Contact\ContactId;
use SimpleBus\SymfonyBridge\Bus\CommandBus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route("/contacts")]
final class Delete extends AbstractController
{
    private CommandBus $commandBus;

    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    #[Route("/{id}/delete", name: 'contact_delete')]
    public function __invoke(string $id): Response
    {
        $this->commandBus->handle(
            new DeleteContactCommand(ContactId::fromString($id))
        );

        return $this->redirectToRoute('contact_list');
    }
}

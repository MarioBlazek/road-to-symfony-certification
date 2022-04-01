<?php

declare(strict_types=1);

namespace App\Controller\Contact;

use App\Domain\Contact\ContactId;
use App\Domain\Contact\ContactRepository;
use App\Form\ModifyContactType;
use Symfony\Component\Routing\Annotation\Route;
use SimpleBus\SymfonyBridge\Bus\CommandBus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

#[Route("/contacts")]
final class Modify extends AbstractController
{
    private ContactRepository $contactRepository;
    private CommandBus $commandBus;

    public function __construct(ContactRepository $contactRepository, CommandBus $commandBus)
    {
        $this->contactRepository = $contactRepository;
        $this->commandBus = $commandBus;
    }

    #[Route("/{id}/edit", name: "contact_edit")]
    public function __invoke(Request $request, string $id): Response
    {
        $contact = $this->contactRepository->get(ContactId::fromString($id));

        $form = $this->createForm(ModifyContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->commandBus->handle($form->getData());

            return $this->redirectToRoute('contact_list');
        }

        return $this->render('contact/edit.html.twig',
            [
                'contact' => $contact,
                'form' => $form->createView(),
            ]
        );
    }
}

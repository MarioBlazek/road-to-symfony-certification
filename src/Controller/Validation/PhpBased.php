<?php

declare(strict_types=1);

namespace App\Controller\Validation;

use App\Domain\Value\Email;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

#[Route("/validation")]
final class PhpBased extends AbstractController
{
    private ValidatorInterface $validator;

    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;
    }

    #[Route("/php", name: "validation_php")]
    public function __invoke(): Response
    {
        $email = Email::fromString('test@example.com');

        $errors = $this->validator->validate($email);

        return $this->render('validation/index.html.twig', [
            'errors' => $errors,
        ]);
    }
}

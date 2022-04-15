<?php

declare(strict_types=1);

namespace App\Controller\Validation;

use App\Domain\Value\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

#[Route("/validation")]
final class Sequence extends AbstractController
{
    private ValidatorInterface $validator;

    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;
    }

    #[Route("/sequence", name: "validation_sequence")]
    public function __invoke(): Response
    {
        $user = new User('Test', 'Test', 'somecoolusername');

        $errors = $this->validator->validate($user);

        return $this->render('validation/index.html.twig',[
            'errors' => $errors,
        ]);
    }
}

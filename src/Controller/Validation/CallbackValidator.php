<?php

declare(strict_types=1);

namespace App\Controller\Validation;

use App\Domain\Value\PhoneNumber;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

#[Route("/validation")]
final class CallbackValidator extends AbstractController
{
    private ValidatorInterface $validator;

    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;
    }

    #[Route("/callback", name: "validation_callback")]
    public function __invoke(): Response
    {
        $phoneNumber = PhoneNumber::fromString('+385916188214');

        $errors = $this->validator->validate($phoneNumber);

        return $this->render('validation/index.html.twig',[
            'errors' => $errors,
        ]);
    }
}

<?php

declare(strict_types=1);

namespace App\Controller\Validation;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Validator\Constraints as Assert;

#[Route("/validation")]
final class ScalarValues extends AbstractController
{
    private ValidatorInterface $validator;

    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;
    }

    #[Route("/scalar", name: "validation_scalar")]
    public function __invoke(): Response
    {
        $email = 'test@example.com';
        $emailConstraint = new Assert\Email();
        $emailConstraint->message = 'Please provide valid email value';

        $errors = $this->validator->validate($email, $emailConstraint);

        return $this->render('validation/index.html.twig',[
            'errors' => $errors,
        ]);
    }
}

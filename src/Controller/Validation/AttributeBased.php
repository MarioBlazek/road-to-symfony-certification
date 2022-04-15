<?php

declare(strict_types=1);

namespace App\Controller\Validation;

use App\Domain\Value\Address;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

#[Route("/validation")]
final class AttributeBased extends AbstractController
{
    private ValidatorInterface $validator;

    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;
    }

    #[Route("/attribute", name: "validation_attribute")]
    public function __invoke(): Response
    {
        $address = new Address('Some uber cool street', '10000', 'Zagreb', 'HR');

        $errors = $this->validator->validate($address);

        return $this->render('validation/index.html.twig', [
            'errors' => $errors,
        ]);
    }
}

<?php

declare(strict_types=1);

namespace App\Controller\Validation;

use App\Domain\Value\Address;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

#[Route("/validation")]
final class Groups extends AbstractController
{
    private ValidatorInterface $validator;

    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;
    }

    #[Route("/groups", name: "validation_groups")]
    public function __invoke(): Response
    {
        // Validation groups
        // Default
        // Address
        // address
        // city
        $address = new Address('Some uber', '1000', 'Minsk', 'ble');

        $errors = $this->validator->validate($address, null, ['address']);

        return $this->render('validation/index.html.twig',[
            'errors' => $errors,
        ]);
    }
}

<?php

declare(strict_types=1);

namespace App\Controller\Validation;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Validator\Constraints as Assert;

#[Route("/validation")]
final class ArrayValues extends AbstractController
{
    private ValidatorInterface $validator;

    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;
    }

    #[Route("/array", name: "validation_array")]
    public function __invoke(): Response
    {
        $value = [
            'name' => [
                'first_name' => 'Firstnameeee',
                'last_name' => 'Lastname',
            ],
            'email' => 'test@example.com',
            'simple' => 'simpleeeeeeeeeee',
            'eye_color' => 3,
            'tags' => [
                [
                    'slug' => 'thisismyslug',
                    'label' => 'custom_label',
                ],
            ],
        ];

        $constraint = new Assert\Collection([
            'name' => new Assert\Collection([
                'first_name' => new Assert\Length(['min' => 10]),
                'last_name' => new Assert\Length(['min' => 1]),
            ]),
            'email' => new Assert\Email(),
            'simple' => new Assert\Length(['min' => 10]),
            'eye_color' => new Assert\Choice([3, 4]),
            'tags' => new Assert\Optional([
                new Assert\Type('array'),
                new Assert\Count(['min' => 1]),
                new Assert\All([
                    new Assert\Collection([
                        'slug' => [
                            new Assert\NotBlank(),
                            new Assert\Type(['type' => 'string']),
                        ],
                        'label' => [
                            new Assert\NotBlank(),
                        ],
                    ]),
                ]),
            ]),
        ]);

        $errors = $this->validator->validate($value, $constraint);

        return $this->render('validation/index.html.twig', [
            'errors' => $errors,
        ]);
    }
}

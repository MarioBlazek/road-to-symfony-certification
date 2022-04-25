<?php

declare(strict_types=1);

namespace App\Controller\DependencyInjection;

use App\Domain\Value\Address;
use App\Domain\Value\Email;
use App\Domain\Value\PhoneNumber;
use App\Domain\Value\User;
use App\Visitor\VisitorAggregate;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route("/dependency-injection")]
final class CompilerPass extends AbstractController
{
    #[Route("/pass", name: "dependency_injection_compiler_pass")]
    public function __invoke(VisitorAggregate $aggregateValueObjectVisitor, ContainerInterface $container): Response
    {
        $address = new Address('street', '10000', 'Zagreb', 'HR');
        $email = Email::fromString('test@example.com');
        $phoneNumber = PhoneNumber::fromString('0918188181');
        $user = new User('Test', 'Test', 'test');


        $aggregateValueObjectVisitor->visit($address);
        $aggregateValueObjectVisitor->visit($email);
        $aggregateValueObjectVisitor->visit($phoneNumber);
        $aggregateValueObjectVisitor->visit($user);


        return $this->render('dependency-injection/index.html.twig');
    }
}
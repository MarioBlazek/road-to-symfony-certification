<?php

declare(strict_types=1);

namespace App\Form;

use App\Domain\Organization\Organization;
use App\Domain\Organization\OrganizationId;
use Doctrine\ORM\EntityManager;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Exception\TransformationFailedException;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrganizationIdType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        /** @var EntityManager $em */
        $em = $options['em'];

        $idToEntity = function($value) use ($em) {

            if ($value === null) {
                return null;
            }

            if (!$value instanceof OrganizationId) {
                throw new TransformationFailedException();
            }

            return $em->find(Organization::class, $value);
        };

        $entityToId = function($value) {

            if ($value === null) {
                return null;
            }

            if (!$value instanceof Organization) {
                throw new TransformationFailedException();
            }

            return $value->getId();
        };

        $builder->addModelTransformer(
            new CallbackTransformer($idToEntity, $entityToId)
        );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'class' => Organization::class,
            'choice_label' => 'name',
        ]);
    }

    public function getParent(): string
    {
        return EntityType::class;
    }
}

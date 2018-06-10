<?php

namespace App\Form\Type;

use App\Entity\User;
use App\Entity\UserGroup;
use App\Controller\UserGroupController;
use App\Repository\UserGroupRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bundle\FrameworkBundle\Tests\Fixtures\Validation\Category;

class UserFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $entityManager = $options['entity_manager'];

        $userGroups = $entityManager->getRepository(UserGroup::class)->findAll();
    

        $builder
            ->add('email'               , EmailType::class)
            ->add('username'            , TextType::class)
            ->add('plainPassword'       , RepeatedType::class, array(
                'type' => PasswordType::class,
                'first_options'  => array('label' => 'Password'),
                'second_options' => array('label' => 'Repeat Password'),
            ))
            ->add('IdUserGroup', ChoiceType::class, [
                'choices' => $userGroups,
                'choice_label' => function($userGroup, $key, $value) {
                    return strtoupper($userGroup->getName());
                },
                'choice_attr' => function($userGroup, $key, $value) {
                    return ['class' => 'userGroup_'.strtolower($userGroup->getName())];
                },
                'preferred_choices' => function($userGroup, $key, $value) {
                    return $userGroup->getName() == 'Tienda';
                },
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => User::class,
        ))
        ->setRequired('entity_manager');
    }
}
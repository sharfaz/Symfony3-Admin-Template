<?php

namespace SalexUserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', null, array('label' => 'form.username', 'translation_domain' => 'FOSUserBundle'))
            ->add('email', EmailType::class, array('label' => 'form.email', 'translation_domain' => 'FOSUserBundle'))
            ->add('firstName')
            ->add('lastName')
            ->add('startDate', DateType::class, array(
                'widget' => 'single_text',
            ))
            ->add('profile_picture_file', VichImageType::class, array(
                    'required'   => false,
                    'label'      => 'Profile Picture'
                ))
            ->add('jobRole')
            ->add('education')
            ->add('notes', TextareaType::class, array(
                'attr' => array(
                    'class' => 'textarea'
                )
            ))
            ->add('skills')
            ->add('address', TextareaType::class, array(
                'attr' => array(
                    'class' => 'textarea'
                )
            ))
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SalexUserBundle\Entity\User',
            'validation_groups' => 'Profile'
        ));
    }

    public function getBlockPrefix()
    {
        return 'salex_user_profile';
    }

    public function getName()
    {
        return $this->getBlockPrefix();
    }
}

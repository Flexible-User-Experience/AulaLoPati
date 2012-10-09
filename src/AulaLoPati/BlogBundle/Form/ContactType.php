<?php

namespace AulaLoPati\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints;
use JMS\DiExtraBundle\Annotation\Service;
use JMS\DiExtraBundle\Annotation\Tag;

/**
 * @Service("aulalopati.form.contact")
 * @Tag("form.type", attributes = { "alias" = "aula_contact" })
 */
class ContactType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('name', 'text', array(
                    'constraints' => new Constraints\NotBlank()
                ))
                ->add('email', 'email', array(
                    'constraints' => array(
                        new Constraints\NotBlank(),
                        new Constraints\Email()
                    )
                ))
                ->add('topic', 'text', array(
                    'constraints' => new Constraints\NotBlank()
                ))
                ->add('message', 'textarea', array(
                    'constraints' => new Constraints\NotBlank()
                ))
                //->add('captcha', 'genemu_captcha')
        ;
    }

    public function getName()
    {
        return 'aula_contact';
    }
}


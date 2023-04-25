<?php

/*
 * This file is part of the "Custom CSS Bundle" for Kimai.
 * All rights reserved by Kevin Papst (www.kevinpapst.de).
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KimaiPlugin\CustomCSSBundle\Form;

use KimaiPlugin\CustomCSSBundle\Entity\CustomCss;
use KimaiPlugin\CustomCSSBundle\Validator\Constraints\CustomCss as CustomCssConstraint;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CustomCssType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('customCss', TextareaType::class, [
                'label' => false,
                'required' => false,
                'attr' => [
                    'rows' => '20',
                ],
                'constraints' => [
                    new CustomCssConstraint()
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CustomCss::class,
            'csrf_protection' => true,
            'csrf_field_name' => '_token',
            'csrf_token_id' => 'edit_custom_css',
            'method' => 'POST',
        ]);
    }
}

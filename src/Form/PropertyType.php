<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class PropertyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('propertyName', TextType::class, [
                'label' => 'Property Name',
            ])
            ->add('propertyType', ChoiceType::class, [
                'label' => 'Property Type',
                'choices' => [
                    'Text' => 'text',
                    'String' => 'string',
                    'Integer' => 'integer',
                    'Boolean' => 'boolean',
                    'SmallInteger' => 'smallint',
                    'BigInteger' => 'bigint',
                    'Float' => 'float',
                    'Array' => 'array',
                    'Simple Array' => 'simple_array',
                    'JSON' => 'json',
                    'Object' => 'object',
                    'Binary' => 'binary',
                    'Blob' => 'blob',
                    'Date & Time' => 'datetime',
                    'Date & Time Immutable' => 'datetime_immutable',
                    'Date & Time TimeZone' => 'datetimetz',
                    'Date & Time TimeZone Immutable' => 'datetimetz_immutable',
                    'Date' => 'date',
                    'Date Immutable' => 'date_immutable',
                    'Association' => 'association',
                   
                ],
            ])
            ->add('propertyNullable', CheckboxType::class, [
                'label' => 'Nullable',
                'required' => false,
            ])
            ->add('stringLength', TextType::class, [
                'label' => 'String Length',
                'required' => false,
                'attr' => ['class' => 'string-length-field', 'style' => 'display:none;'],
            ])
            ->add('associationTypes', ChoiceType::class, [
                'label' => 'Association Type',
                'choices' => [
                    'One to One' => 'OneToOne',
                    'One to Many' => 'OneToMany',
                    'Many to One' => 'ManyToOne',
                    'Many to Many' => 'ManyToMany',
                ],
                'attr' => ['class' => 'association-field', 'style' => 'display:none;'],
                'required' => false,
            ])
            ->add('Direction', ChoiceType::class, [
                'label' => 'Direction',
                'choices' => [
                    'Uni-directional' => 'unidirectional',
                    'Bi-directional' => 'bidirectional',
                    'Self-referencing' => 'selfreferencing',
                ],
                'attr' => ['class' => 'direction-field', 'style' => 'display:none;'], 
                'required' => false,
            ])
            ->add('associatedEntity', TextType::class, [
                'label' => 'associatedEntity',
                'attr' => ['class' => 'entity-relation-field', 'style' => 'display:none;'],
                'required' => false,
            ])
            ->add('associatedProperty', TextType::class, [
                'label' => 'associatedProperty',
                'attr' => ['class' => 'entity-property-field', 'style' => 'display:none;'],
                'required' => false,
            ]);
    }
}

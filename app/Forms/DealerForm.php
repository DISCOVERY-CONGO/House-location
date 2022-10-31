<?php

declare(strict_types=1);

namespace App\Forms;

use App\Models\Category;
use App\Models\Type;
use Kris\LaravelFormBuilder\Form;

class DealerForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('prices', 'number', [
                'label' => 'Prix mensuel',
            ])
            ->add('warranty_price', 'number', [
                'label' => 'Garantie',
            ])
            ->add('commune', 'text', [
                'label' => 'Commune',
            ])
            ->add('town', 'text', [
                'label' => 'Ville',
            ])
            ->add('district', 'text', [
                'label' => 'Quartier',
            ])
            ->add('address', 'text', [
                'label' => 'Adresse',
            ])
            ->add('latitude', 'text', [
                'label' => 'Latitude',
            ])
            ->add('longitude', 'text', [
                'label' => 'Longitude',
            ])
            ->add('categories', 'choice', [
                'label' => 'Categories',
                'choices' => Category::all()->pluck('name', 'id')->toArray(),
                'multiple' => true,
                'attr' => ['class' => 'form-select js-select2 select2-hidden-accessible'],
            ])
            ->add('type', 'choice', [
                'label' => 'Type de Maison',
                'choices' => $this->getHouseType(),
                'multiple' => false,
            ])
            ->add('number_rooms', 'number', [
                'label' => 'Nombre des chambres',
            ])
            ->add('number_pieces', 'number', [
                'label' => 'Nombre des Pieces',
            ])
            ->add('toilet', 'choice', [
                'choices' => [
                    'externe' => 'Externe',
                    'interne' => 'Interne',
                    'autre' => 'Autres',
                ],
                'attr' => ['class' => 'form-control'],
                'selected' => [
                    'externe',
                    'interne',
                    'autre'
                ],
                'multiple' => false,
            ])
            ->add('electricity', 'choice', [
                'choices' => [1 => 'Avec Electricite', 0 => 'Pas d\'electricite'],
                'attr' => ['class' => 'form-control'],
                'selected' => [1, 0],
                'multiple' => false,
            ])
            ->add('description', 'textarea', [
                'label' => 'Description',
                'attr' => [
                    'class' => 'form-control form-control-sm',
                    'rows' => 2,
                ],
            ]);
    }

    public function getHouseType(): array
    {
        return Type::all()
            ->pluck('name', 'id')
            ->toArray();
    }
}

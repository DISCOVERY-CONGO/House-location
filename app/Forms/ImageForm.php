<?php
declare(strict_types=1);

namespace App\Forms;

use App\Models\House;
use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class ImageForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('picture', 'file', [
                'label' => "Photo"
            ])
            ->add('house_id', 'choice', [
                'label' => 'Categories',
                'choices' => $this->getHouses(),
                'multiple' => false,
                'attr' => ['class' => 'form-select']
            ]);
    }


    public function  getHouses(): array
    {
        return House::query()
            ->pluck('email', 'id')
            ->toArray();
    }
}

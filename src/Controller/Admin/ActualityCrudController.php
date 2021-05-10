<?php

namespace App\Controller\Admin;

use App\Entity\Actuality;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;


class ActualityCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Actuality::class;
    }
    
    public function configureFields(string $pageName): iterable
    {
        $pictureField = TextField::new('pictureFile')
                ->setFormType(VichImageType::class)
                ->setLabel('Picture');

        $picture = ImageField::new('picture')
                ->setBasePath("/uploads/pictures_actuality")
                ->setLabel('Picture');

        $fields=  [
            TextField::new('Title'),
            TextareaField::new('Description'),
            DateField::new('createdAt')->hideOnForm(),
            DateField::new('updatedAt')->hideOnForm(),
        ];

        if ($pageName === Crud::PAGE_INDEX || $pageName === Crud::PAGE_DETAIL)
        {
            $fields[] = $picture;
        }
        else
        {
            $fields[] = $pictureField;
        }

        return $fields;
    }
}

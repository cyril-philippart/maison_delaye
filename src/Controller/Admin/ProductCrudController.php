<?php

namespace App\Controller\Admin;

use App\Entity\Products;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Products::class;
    }
    
    public function configureFields(string $pageName): iterable
    {
        $pictureField = TextareaField::new('pictureFile')
                ->setFormType(VichImageType::class)
                ->setLabel('Picture');

        $picture = ImageField::new('picture')
                ->setBasePath("/uploads/pictures_products")
                ->setLabel('Picture');

        $fields = [
            TextField::new('name'),
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

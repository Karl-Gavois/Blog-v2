<?php

namespace App\Controller\Admin;

use App\Entity\Articles;
use Vich\UploaderBundle\Form\Type\VichFileType;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;

class ArticlesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Articles::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('title'),
            TextField::new('description'),
            TextField::new('readmore'),
            TextField::new('imageFile') ->setFormType(VichFileType::class)->onlyWhenCreating(),
            TextField::new('imageFile') ->setFormType(VichFileType::class)->onlyWhenUpdating(),
            ImageField::new('ImageName') ->setBasePath('/uploads/images')->onlyonindex(),
        ];
    }
    
}

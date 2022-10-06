<?php

namespace App\Form;
use App\Entity\Post;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Url;

class PostType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder->add("title", TextType::class, [
        "label" => "Titre",
        "required" => false,
        "constraints" => [new Length(['min'=>3, 'max'=>150, 'minMessage'=>"Le titre doit avoir au moins {{ limit }} caractères", 'maxMessage'=>'Le titre doit avoir max {{ limit }} caractères!'])]
    ]
  )
    ->add("content", TextareaType::class, [
        "label" => "Content",
        "required" => true,
        "constraints" => [
            new NotBlank(['message' => 'Le contenu ne doit pas être vide']),
            new Length(['min' => 3, 'max' => 320, 'minMessage' => 'Le message doit être compris entre 5 et 320 caractères!', 'maxMessage' => 'Le message doit être compris entre 5 et 320 caractères!']),
        ]
    ])
    ->add("image", UrlType::class, [
        "label" => "URL de l'image",
        "required" => true,
        "constraints" => [new Url(['message' => 'L\'image doit être une URL valide'])]
    ]);
  }

  public function configureOptions(OptionsResolver $resolver)
  {
    $resolver->setDefaults([
      "data_class" => Post::class
    ]);
  }
}
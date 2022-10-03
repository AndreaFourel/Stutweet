<?php

namespace App\Form;
use App\Entity\Post;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Url;

class PostType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder->add("title", TextType::class, ["label" => "Titre", "required" => false])
    ->add("content", TextareaType::class, ["label" => "Content", "required" => true])
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
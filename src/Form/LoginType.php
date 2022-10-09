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

class LoginType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add("username", TextType::class, [
                "label" => "Nom d'utilisateur",
                "required" => true,
                //"attr"=>['class' => 'nom', 'id' => 'name'],
                "constraints" => [new Length(['min'=>2, 'max'=>180, 'minMessage'=>"Le titre doit avoir au moins {{ limit }} caractères", 'maxMessage'=>'Le titre doit avoir max {{ limit }} caractères!']),
                    new NotBlank(['message'=>"Le nom de l'utilisateur ne doit pas être vide"])]
            ])
            ->add("password", TextType::class, [
                "label"=>'Mot de passe',
                "required"=> true,
                "constraints"=>[new NotBlank(["message"=>"Le mot de passe ne doit pas être vide"])]
            ]);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            "data_class" => Post::class
        ]);
    }
}
<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity()]
#[ORM\Table(name:"post")]
class Post
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 150, nullable: true)]
    private ?string $title = null;

    //#[Assert\NotBlank(message: "Le contenu ne doit pas être vide!")]
    //#[Assert\Length(min: 5, max: 320, minMessage: 'Le message doit être compris entre 5 et 320 caractères!', maxMessage: "Le message doit être compris entre 5 et 320 caractères")]
    #[ORM\Column(type: "text", length: 320)]
    private string $content;

    //voir contraintes de validation ds PostType-> a privilgier(https://symfony.com/doc/current/best_practices.html#define-validation-constraints-on-the-underlying-object)
    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $image = null;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'posts')]
    private User $user;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getImage()
    {
     return $this->image;
    }

    public function setImage($image): self
    {
     $this->image = $image;

     return $this;
    }

    public function getUser(): User
    {
     return $this->user;
    }


    public function setUser($user): self
    {
     $this->user = $user;

     return $this;
    }
}
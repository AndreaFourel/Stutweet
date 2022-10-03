<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Post
{

    private int $id;

    #[Assert\Length(min: 3, max: 150, minMessage: "Le titre doit avoir 3 ou plus caractères!", maxMessage: "Le titre ne doit pas dépasser 150 caractères!")]
    private ?string $title = null;

    #[Assert\NotBlank(message: "Le contenu ne doit pas être vide!")]
    #[Assert\Length(min: 5, max: 320, minMessage: "Le message doit être compris entre 5 et 320 caractères!", maxMessage: "Le message doit être compris entre 5 et 320 caractères")]
    private string $content;

    //voir contraintes de validation ds PostType -> à privilegier
    private ?string $image = null;
    private $user;

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

    public function getUser()
    {
     return $this->user;
    }


    public function setUser($user): self
    {
     $this->user = $user;

     return $this;
    }
}
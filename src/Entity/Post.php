<?php

namespace App\Entity;

class Post
{
  private int $id;
  private ?string $title = null;
  private string $content;
  private ?string $image = null;
  private $user;

    /**
   * Get the value of id
   */ 
  public function getId()
  {
    return $this->id;
  }

  /**
   * Set the value of id
   *
   * @return  self
   */ 
  public function setId($id): self
  {
    $this->id = $id;

    return $this;
  }

  /**
   * Get the value of title
   */ 
  public function getTitle()
  {
    return $this->title;
  }

  /**
   * Set the value of title
   *
   * @return  self
   */ 
  public function setTitle($title): self
  {
    $this->title = $title;

    return $this;
  }

  /**
   * Get the value of content
   */ 
  public function getContent()
  {
    return $this->content;
  }

  /**
   * Set the value of content
   *
   * @return  self
   */ 
  public function setContent($content): self
  {
    $this->content = $content;

    return $this;
  }

  /**
   * Get the value of image
   */ 
  public function getImage()
  {
    return $this->image;
  }

  /**
   * Set the value of image
   *
   * @return  self
   */ 
  public function setImage($image): self
  {
    $this->image = $image;

    return $this;
  }

  /**
   * Get the value of user
   */ 
  public function getUser()
  {
    return $this->user;
  }

  /**
   * Set the value of user
   *
   * @return  self
   */ 
  public function setUser($user): self
  {
    $this->user = $user;

    return $this;
  }
}
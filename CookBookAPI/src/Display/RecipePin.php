<?php

namespace App\Display;

class RecipePin
{
  private $id;
  private $name;
  private $cookingTime;
  private $persons;
  private $pinSize;
  private $image;

  public function __construct($init = [])
  {
    $this->hydrate($init);
  }

  public function hydrate(array $vals = [])
  {
    foreach ($vals as $key => $val) {
      $method = "set" . ucfirst($key);
      if (method_exists($this, $method)) {
        $this->$method($val);
      }
    }
  }


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
  public function setId($id)
  {
    $this->id = $id;

    return $this;
  }

  /**
   * Get the value of name
   */
  public function getName()
  {
    return $this->name;
  }

  /**
   * Set the value of name
   *
   * @return  self
   */
  public function setName($name)
  {
    $this->name = $name;

    return $this;
  }

  /**
   * Get the value of cookingTime
   */
  public function getCookingTime()
  {
    return $this->cookingTime;
  }

  /**
   * Set the value of cookingTime
   *
   * @return  self
   */
  public function setCookingTime($cookingTime)
  {
    $this->cookingTime = $cookingTime;

    return $this;
  }

  /**
   * Get the value of persons
   */
  public function getPersons()
  {
    return $this->persons;
  }

  /**
   * Set the value of persons
   *
   * @return  self
   */
  public function setPersons($persons)
  {
    $this->persons = $persons;

    return $this;
  }

  /**
   * Get the value of pinSize
   */
  public function getPinSize()
  {
    return $this->pinSize;
  }

  /**
   * Set the value of pinSize
   *
   * @return  self
   */
  public function setPinSize($pinSize)
  {
    $this->pinSize = $pinSize;

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
  public function setImage($image)
  {
    $this->image = $image;

    return $this;
  }
}

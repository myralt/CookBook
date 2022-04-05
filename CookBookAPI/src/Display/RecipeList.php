<?php

namespace App\Display;

class RecipeList
{
  private $id;
  private $name;
  private $description;
  private $cookingTime;
  private $persons;
  private $rating;

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
   * Get the value of description
   */
  public function getDescription()
  {
    return $this->description;
  }

  /**
   * Set the value of description
   *
   * @return  self
   */
  public function setDescription($description)
  {
    $this->description = $description;

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
   * Get the value of rating
   */
  public function getRating()
  {
    return $this->rating;
  }

  /**
   * Set the value of rating
   *
   * @return  self
   */
  public function setRating($rating)
  {
    $this->rating = $rating;

    return $this;
  }
}

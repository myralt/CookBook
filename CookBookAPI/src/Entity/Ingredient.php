<?php

namespace App\Entity;

use App\Repository\IngredientRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: IngredientRepository::class)]
class Ingredient
{
    #[Assert\NotBlank]
    #[Assert\Length(min: 1, max: 10)]
    #[ORM\Column(type: 'string', length: 10)]
    private $unit;

    #[Assert\NotBlank]
    #[Assert\Range(min: 1)]
    #[ORM\Column(type: 'integer')]
    private $quantity;

    #[Assert\NotBlank]
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Recipe::class, inversedBy: 'ingredients')]
    #[ORM\JoinColumn(nullable: false)]
    private $recipe;

    #[Assert\NotBlank]
    #[Assert\Valid]
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Product::class, cascade: ['persist'])]
    #[ORM\JoinColumn(nullable: false)]
    private $product;

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

    public function getUnit(): ?string
    {
        return $this->unit;
    }

    public function setUnit(string $unit): self
    {
        $this->unit = $unit;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getRecipe(): ?Recipe
    {
        return $this->recipe;
    }

    public function setRecipe(?Recipe $recipe): self
    {
        $this->recipe = $recipe;

        return $this;
    }

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): self
    {
        $this->product = $product;

        return $this;
    }
}

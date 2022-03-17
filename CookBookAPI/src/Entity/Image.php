<?php

namespace App\Entity;

use App\Repository\ImageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ImageRepository::class)]
class Image
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $path;

    #[ORM\Column(type: 'boolean')]
    private $main = false;

    #[ORM\ManyToOne(targetEntity: Recipe::class, inversedBy: 'images')]
    #[ORM\JoinColumn(nullable: false)]
    private $recipe;

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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(string $path): self
    {
        $this->path = $path;

        return $this;
    }

    public function getMain(): ?bool
    {
        return $this->main;
    }

    public function setMain(bool $main): self
    {
        $this->main = $main;

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
}

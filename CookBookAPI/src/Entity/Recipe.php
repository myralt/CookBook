<?php

namespace App\Entity;

use App\Repository\RecipeRepository;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: RecipeRepository::class)]
class Recipe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[Assert\NotBlank]
    #[Assert\Length(min: 1, max: 255)]
    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[Assert\NotBlank]
    #[ORM\Column(type: 'integer')]
    private $rating;

    #[Assert\NotBlank]
    #[ORM\Column(type: 'text')]
    private $description;

    #[Assert\NotBlank]
    #[ORM\Column(type: 'integer')]
    private $cookingTime;

    #[Assert\NotBlank]
    #[ORM\Column(type: 'text')]
    private $preparation;

    #[Assert\NotBlank]
    #[ORM\Column(type: 'integer')]
    private $persons;

    #[Assert\NotBlank]
    #[ORM\Column(type: 'boolean', options: ['default' => false])]
    private $pinned = false;

    #[Assert\NotBlank]
    #[Assert\Range(min: 1, max: 3)]
    #[ORM\Column(type: 'integer', options: ['default' => 2])]
    private $pinSize = 2;

    #[Assert\NotBlank]
    #[ORM\Column(type: 'datetime')]
    private $creationDate;

    #[Assert\Valid]
    #[ORM\ManyToOne(targetEntity: Folder::class, inversedBy: 'recipes', cascade: ['persist'])]
    #[ORM\JoinColumn(nullable: true)]
    private $folder;

    #[Assert\NotBlank]
    #[Assert\Valid]
    #[ORM\OneToMany(mappedBy: 'recipe', targetEntity: Ingredient::class, orphanRemoval: true, cascade: ['persist'])]
    private $ingredients;

    #[Assert\NotBlank]
    #[Assert\Valid]
    #[ORM\OneToMany(mappedBy: 'recipe', targetEntity: Image::class, orphanRemoval: true, cascade: ['persist'])]
    private $images;

    public function __construct($init = [])
    {
        $this->hydrate($init);

        $this->ingredients = new ArrayCollection();
        $this->images = new ArrayCollection();
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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getRating(): ?int
    {
        return $this->rating;
    }

    public function setRating(int $rating): self
    {
        $this->rating = $rating;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCookingTime(): ?int
    {
        return $this->cookingTime;
    }

    public function setCookingTime(int $cookingTime): self
    {
        $this->cookingTime = $cookingTime;

        return $this;
    }

    public function getPreparation(): ?string
    {
        return $this->preparation;
    }

    public function setPreparation(string $preparation): self
    {
        $this->preparation = $preparation;

        return $this;
    }

    public function getPersons(): ?int
    {
        return $this->persons;
    }

    public function setPersons(int $persons): self
    {
        $this->persons = $persons;

        return $this;
    }

    public function getPinned(): ?bool
    {
        return $this->pinned;
    }

    public function setPinned(bool $pinned): self
    {
        $this->pinned = $pinned;

        return $this;
    }

    public function getPinSize(): ?int
    {
        return $this->pinSize;
    }

    public function setPinSize(int $pinSize): self
    {
        $this->pinSize = $pinSize;

        return $this;
    }

    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->creationDate;
    }

    public function setCreationDate(\DateTimeInterface $creationDate): self
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    public function getFolder(): ?Folder
    {
        return $this->folder;
    }

    public function setFolder(?Folder $folder): self
    {
        $this->folder = $folder;

        return $this;
    }

    /**
     * @return Collection<int, Ingredient>
     */
    public function getIngredients(): Collection
    {
        return $this->ingredients;
    }

    public function addIngredient(Ingredient $ingredient): self
    {
        if (!$this->ingredients->contains($ingredient)) {
            $this->ingredients[] = $ingredient;
            $ingredient->setRecipe($this);
        }

        return $this;
    }

    public function removeIngredient(Ingredient $ingredient): self
    {
        if ($this->ingredients->removeElement($ingredient)) {
            // set the owning side to null (unless already changed)
            if ($ingredient->getRecipe() === $this) {
                $ingredient->setRecipe(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Image>
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Image $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setRecipe($this);
        }

        return $this;
    }

    public function removeImage(Image $image): self
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getRecipe() === $this) {
                $image->setRecipe(null);
            }
        }

        return $this;
    }
}

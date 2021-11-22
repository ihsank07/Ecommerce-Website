<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\Column(type="integer")
     */
    private $stock;

    /**
     * @ORM\ManyToMany(targetEntity=Category::class, inversedBy="product")
     */
    private $category;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity=ShoppingCart::class, mappedBy="productinbasket")
     */
    private $shoppingcart;


    public function __construct()
    {
        $this->category = new ArrayCollection();
        $this->shoppingcart = new ArrayCollection();
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

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * @return Collection|Category[]
     */
    public function getCategory(): Collection
    {
        return $this->category;
    }

    public function addCategory(Category $category): self
    {
        if (!$this->category->contains($category)) {
            $this->category[] = $category;
        }

        return $this;
    }

    public function removeCategory(Category $category): self
    {
        $this->category->removeElement($category);

        return $this;
    }
    public function getPath($root = null, $path = "")
    {
        if($root== null)
        {
            $root = $this;
        }

        $path = $root->getName().$path;
        if(!$root->getParent()){
            return $path;

        }
        $path = " > " .$path;
        return $this->getPath($root->getParent(), $path);
    }


    public function __toString()
    {
        return $this->category;

        
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

     /**
     * @return Collection|ShoppingCart[]
     */
    public function getShoppingCart(): Collection
    {
        return $this->shoppingcart;
    }

    public function addShoppingCart(ShoppingCart $ShoppingCart): self
    {
        if (!$this->shoppingcart->contains($ShoppingCart)) {
            $this->shoppingcart[] = $ShoppingCart;
            $ShoppingCart->addproductinbasket($this);
        }

        return $this;
    }

    public function removeShoppingCart(ShoppingCart $ShoppingCart): self
    {
        if ($this->shoppingcart->removeElement($ShoppingCart)) {
            $ShoppingCart->removeproductinbasket($this);
        }

        return $this;
    }
}







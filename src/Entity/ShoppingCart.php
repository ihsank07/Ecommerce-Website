<?php

namespace App\Entity;

use App\Repository\ShoppingCartRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity(repositoryClass=ShoppingCartRepository::class)
 */
class ShoppingCart
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;


    /**
     * @ORM\Column(type="integer")
     * @Assert\GreaterThanOrEqual(1)
     */
    private $quantity;

    /**
     * @ORM\ManyToMany(targetEntity=Product::class, inversedBy="shoppingcart")
     */
    private $productinbasket;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="shoppingCarts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $username;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $productname;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\Column(type="integer")
     */
    private $userid;

    /**
     * @ORM\Column(type="integer")
     */
    private $productid;

    /**
     * @ORM\Column(type="float")
     */
    private $unitprice;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $category;



    public function __construct()
    {
        $this->product = new ArrayCollection();
        $this->productinbasket = new ArrayCollection();

      
    }

    public function getId(): ?int
    {
        return $this->id;
    }

   



    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

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

    /**
     * @return Collection|Product[]
     */
    public function getProductinbasket(): Collection
    {
        return $this->productinbasket;
    }

    public function addProductinbasket(Product $productinbasket): self
    {
        if (!$this->productinbasket->contains($productinbasket)) {
            $this->productinbasket[] = $productinbasket;
        }

        return $this;
    }

    public function removeProductinbasket(Product $productinbasket): self
    {
        $this->productinbasket->removeElement($productinbasket);

        return $this;
    }

    public function getUsername(): ?User
    {
        return $this->username;
    }

    public function setUsername(?User $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return Collection|OrderProduct[]
     */
    public function getOrderProducts(): Collection
    {
        return $this->orderProducts;
    }

    public function addOrderProduct(OrderProduct $orderProduct): self
    {
        if (!$this->orderProducts->contains($orderProduct)) {
            $this->orderProducts[] = $orderProduct;
            $orderProduct->addUser($this);
        }

        return $this;
    }

    public function removeOrderProduct(OrderProduct $orderProduct): self
    {
        if ($this->orderProducts->removeElement($orderProduct)) {
            $orderProduct->removeUser($this);
        }

        return $this;
    }

    public function getProductname(): ?string
    {
        return $this->productname;
    }

    public function setProductname(string $productname): self
    {
        $this->productname = $productname;

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

    public function getUserid(): ?int
    {
        return $this->userid;
    }

    public function setUserid(int $userid): self
    {
        $this->userid = $userid;

        return $this;
    }

    public function getProductid(): ?int
    {
        return $this->productid;
    }

    public function setProductid(int $productid): self
    {
        $this->productid = $productid;

        return $this;
    }

    public function getUnitprice(): ?float
    {
        return $this->unitprice;
    }

    public function setUnitprice(float $unitprice): self
    {
        $this->unitprice = $unitprice;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }





}

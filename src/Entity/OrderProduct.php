<?php

namespace App\Entity;

use App\Repository\OrderProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrderProductRepository::class)
 */
class OrderProduct
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $productname;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantity;

    /**
     * @ORM\ManyToMany(targetEntity=ShoppingCart::class, inversedBy="orderProducts")
     */
    private $user;

    /**
     * @ORM\Column(type="integer")
     */
    private $userid;

    /**
     * @ORM\Column(type="integer")
     */
    private $basketno;

    
    public function __construct()
    {
        $this->user = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
     * @return Collection|ShoppingCart[]
     */
    public function getUser(): Collection
    {
        return $this->user;
    }

    public function addUser(ShoppingCart $user): self
    {
        if (!$this->user->contains($user)) {
            $this->user[] = $user;
        }

        return $this;
    }

    public function removeUser(ShoppingCart $user): self
    {
        $this->user->removeElement($user);

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

    public function getBasketno(): ?int
    {
        return $this->basketno;
    }

    public function setBasketno(int $basketno): self
    {
        $this->basketno = $basketno;

        return $this;
    }
}

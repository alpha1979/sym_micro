<?php

namespace App\DTO;

use App\Entity\Product;
use Symfony\Component\Serializer\Annotation\Ignore;

class LowestPriceEnquiry implements PromotionEnquiryInterface
{
    
    private ?int $quantity;
    private ?string $requestLocation;
    private ?string $voucherCode;
    private ?string $requestDate;
    #[Ignore]
    private ?Product $product;
    private ?int $price;
    private ?int $discountedPrice;
    private ?int $promotionId;
    private ?string $promotionName;

    /**
     * Get the value of quantity
     */ 
    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    /**
     * Set the value of quantity
     *
     */ 
    public function setQuantity(?int $quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * Get the value of requestLocation
     */ 
    public function getRequestLocation(): ?string
    {
        return $this->requestLocation;
    }

    /**
     * Set the value of requestLocation
     *
     */ 
    public function setRequestLocation(?string $requestLocation): void
    {
        $this->requestLocation = $requestLocation;

    }

    /**
     * Get the value of voucherCode
     */ 
    public function getVoucherCode(): ?string
    {
        return $this->voucherCode;
    }

    /**
     * Set the value of voucherCode
     *
     */ 
    public function setVoucherCode(?string $voucherCode):void
    {
        $this->voucherCode = $voucherCode;

    }

    /**
     * Get the value of requestDate
     */ 
    public function getRequestDate(): ?string
    {
        return $this->requestDate;
    }

    /**
     * Set the value of requestDate
     */ 
    public function setRequestDate( ?string $requestDate): void
    {
        $this->requestDate = $requestDate;

    
    }

    /**
     * Get the value of product
     */ 
    public function getProduct(): ?Product
    {
        return $this->product;
    }

    /**
     * Set the value of product
     *
     */ 
    public function setProduct( ?Product $product): void
    {
        $this->product = $product;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice(): ?int
    {
        return $this->price;
    }

    /**
     * Set the value of price
     */ 
    public function setPrice(?int $price):void
    {
        $this->price = $price;

    }

    /**
     * Get the value of discountedPrice
     */ 
    public function getDiscountedPrice(): ?int
    {
        return $this->discountedPrice;
    }

    /**
     * Set the value of discountedPrice
     */ 
    public function setDiscountedPrice(?int $discountedPrice): void
    {
        $this->discountedPrice = $discountedPrice;

    }

    /**
     * Get the value of promotionId
     */ 
    public function getPromotionId(): ?int
    {
        return $this->promotionId;
    }

    /**
     * Set the value of promotionId
     *
     */ 
    public function setPromotionId(?int $promotionId): void
    {
        $this->promotionId = $promotionId;

    }

    /**
     * Get the value of promotionName
     */ 
    public function getPromotionName(): ?string
    {
        return $this->promotionName;
    }

    /**
     * Set the value of promotionName
     *
     */ 
    public function setPromotionName(?string $promotionName): void
    {
        $this->promotionName = $promotionName;

    }
	// /**
	//  * Specify data which should be serialized to JSON
	//  * Serializes the object to a value that can be serialized natively by json_encode().
	//  *
	//  * @return mixed Returns data which can be serialized by json_encode(), which is a value of any type other than a resource .
	//  */
	// function jsonSerialize() 
    // {
    //     return get_object_vars($this);
	// }
}
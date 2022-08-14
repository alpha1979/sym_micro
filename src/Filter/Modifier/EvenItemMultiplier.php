<?php 

namespace App\Filter\Modifier;
use App\Entity\Promotion;
use App\DTO\PromotionEnquiryInterface;

class EvenItemMultiplier implements PriceModifierInterface
{
    public function modify(int $price, int $quantity, Promotion $promotion, PromotionEnquiryInterface $enquiry): int
    {
        if ($quantity < 2) {
            return $price * $quantity;
        }

        $oddCount = $quantity % 2;
        $evenCount = $quantity - $oddCount;
        return (($evenCount * $price) * $promotion->getAdjustment()) + ($oddCount * $price);
    }
}
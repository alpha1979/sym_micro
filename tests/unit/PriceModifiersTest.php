<?php

namespace App\Tests\unit;

use App\DTO\LowestPriceEnquiry;
use App\Tests\ServiceTestCase;
use App\Filter\Modifier\DateRangeMultiplier;
use App\Entity\Promotion;
use App\Filter\Modifier\FixedPriceVoucher;
use App\Filter\Modifier\EvenItemMultiplier;

class PriceModifiersTest extends ServiceTestCase
{
    /** @test */
    public function DaterangeMultiplier_returns_a_correctly_modified_price(): void
    {
        //given
        $enquiry = new LowestPriceEnquiry();
        $enquiry->setQuantity(5);
        $enquiry->setRequestDate('2022-11-27');
        
        $promotion = new Promotion();
        $promotion->setName('Black Friday half price sale');
        $promotion->setAdjustment(0.5);
        $promotion->setCriteria(["from" => "2022-11-25", "to" => "2022-11-28"]);
        $promotion->setType('date_range_multiplier');
        $dateRangeModifier = new DateRangeMultiplier();
        
        //When
        $modifiedPrice = $dateRangeModifier->modify(100, 5, $promotion, $enquiry);

        //Then
        $this->assertEquals(250, $modifiedPrice);
        
    }

    /** @test */
    public function FixedPriceVoucher_returns_a_correctly_modified_price(): void
    {
        $promotion = new Promotion();
        $promotion->setName('Voucher 0U812');
        $promotion->setAdjustment(100);
        $promotion->setCriteria(["code" => "0U812"]);
        $promotion->setType('fixed_price_voucher');
        $fixedPriceVoucher = new FixedPriceVoucher();

        $enquiry = new LowestPriceEnquiry();
        $enquiry->setQuantity(5);
        $enquiry->setVoucherCode('0U812');

        $modifiedPrice = $fixedPriceVoucher->modify(150, 5, $promotion, $enquiry);

        $this->assertEquals(500, $modifiedPrice);
    }

     /** @test */
     public function EvenItemMultiplier_returns_a_correctly_modified_price(): void
     {
         $promotion = new Promotion();
         $promotion->setName('Buy one get one free');
         $promotion->setAdjustment(0.5);
         $promotion->setCriteria(["minimum_quantity" => 2]);
         $promotion->setType('even_items_multiplier');
         $evenItemMultiplier = new EvenItemMultiplier();
 
         $enquiry = new LowestPriceEnquiry();
         $enquiry->setQuantity(5);
 
         $modifiedPrice = $evenItemMultiplier->modify(100, 5, $promotion, $enquiry);
 
         $this->assertEquals(300, $modifiedPrice);
     }
}
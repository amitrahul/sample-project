<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/**
 * BuyerOffer test API:
 * -    /api/addBuyerOffer
 * -    /api/getBuyerOffer
 * -   	/api/checkBuyerOffer
 * -    /api/checkBuyerOfferWithId
 * -    /api/updateBuyerOffer
 * Class BuyerOfferTest
 * @package Tests\Feature
 */


class BuyerOfferTest extends TestCase
{
    /**
    * Add BuyerOffer API testing.
     *
     * @return void
     */
    public function testAddBuyerOffer()
    {
        $url = '/api/addBuyerOffer';
        $password = $this->getApiPassword();
        self::$email = $this->faker->email;

        $data = [
            'api_password' => $password,
            'description' => $this->faker->text,
            'first_name' => $this->faker->firstName,
            'email_id' => self::$email,
            'contact_number' => $this->getMobileNumber(),
            'zip' => $this->faker->numberBetween(11111,99999),
            'currency' => $this->getRandomCurrency()

        ];

            $data = [
                'api_password' => $password,
                'buyer_email' => self::$email,
                'buyer_phone' => $this->getMobileNumber(),
                'buyer_zip' => $this->faker->numberBetween(11111,99999),
                'buyer_currency' => $this->getRandomCurrency(),
                'buyer_orignal_quantity' => $this->faker->numberBetween(1,10),
                'seller_catalog_id' => $this->faker->text,
                'catalog_url' => $this->faker->url,
                'parameter1' => $this->faker->text,
                'parameter2' => $this->faker->text,
                'parameter3' => $this->faker->text,
                'parameter4' => $this->faker->text,
                'parameter5' => $this->faker->text,
                'buyer_offer_price' => $this->faker->text,
                'buyer_negotiation_mode' => 'auto',
                'buyer_highest_offer_price' => $this->faker->text,
                'upc_product_code' => $this->faker->text,
                'seller_email' => self::$email,
                'first_name' => $this->faker->firstName,
                 'expiry_date' => $this->faker->date('Y-m-d','now')
            ];
            $response = $this->withHeaders([
                'api_key' => $password,
            ])->json('POST', $url, $data);
    
            $response->assertStatus(200)->assertJson([
                'success' => true,
            ]);
    }



  /**
    * get BuyerOffer API testing.
     *
     * @return void
     */
    public function testGetBuyerOffer()
    {
        $url = '/api/getBuyerOffer';
        $password = $this->getApiPassword();
        self::$email = $this->faker->email;

        $data = [
            'api_password' => $password,
            'description' => $this->faker->text,
            'first_name' => $this->faker->firstName,
            'email_id' => self::$email,
            'contact_number' => $this->getMobileNumber(),
            'zip' => $this->faker->numberBetween(11111,99999),
            'currency' => $this->getRandomCurrency()

        ];

            $data = [
                'api_password' => $password,
                'buyer_email' => self::$email,
                'upc_product_code' => $this->faker->text,
                 'request_id' => $this->faker->text

            ];

            $response = $this->withHeaders([
                'api_key' => $password,
            ])->json('POST',$url, $data);
    
            $response->assertStatus(200)->assertJson([
                'success' => true,
            ]);
    }

 /**
    * Check BuyerOffer API testing.
     *
     * @return void
     */
    public function testcheckBuyerOffer()
    {
        $url = '/api/checkBuyerOffer';
        $password = $this->getApiPassword();
        self::$email = $this->faker->email;
        $data = [
            'api_password' => $password,
            'description' => $this->faker->text,
            'first_name' => $this->faker->firstName,
            'email_id' => self::$email,
            'contact_number' => $this->getMobileNumber(),
            'zip' => $this->faker->numberBetween(11111,99999),
            'currency' => $this->getRandomCurrency()

        ];
            data = [
                'api_password' => $password,
                'buyer_email' => self::$email,
                'buyer_phone' => $this->getMobileNumber(),
                'buyer_zip' => $this->faker->numberBetween(11111,99999),
                'buyer_currency' => $this->getRandomCurrency(),
                'buyer_orignal_quantity' => $this->faker->numberBetween(1,10),
                'seller_catalog_id' => $this->faker->text,
                'catalog_url' => $this->faker->url,
                'parameter1' => $this->faker->text,
                'parameter2' => $this->faker->text,
                'parameter3' => $this->faker->text,
                'parameter4' => $this->faker->text,
                'parameter5' => $this->faker->text,
                'buyer_offer_price' => $this->faker->text,
                'buyer_negotiation_mode' => 'auto',
                'buyer_highest_offer_price' => $this->faker->text,
                'upc_product_code' => $this->faker->text,
                'seller_email' => self::$email,
                'first_name' => $this->faker->firstName,
                'expiry_date' => $this->faker->date('Y-m-d','now')
            ];

            $response = $this->withHeaders([
                'api_key' => $password,
            ])->json('POST',$url, $data);
    
            $response->assertStatus(200)->assertJson([
                'success' => true,
            ]);
    }

/**
    * Check BuyerOffer With Id API testing.
     *
     * @return void
     */
    public function testcheckBuyerOfferWithId()
    {
        $url = '/api/checkBuyerOfferWithId';
        $password = $this->getApiPassword();
        self::$email = $this->faker->email;
        $data = [
            'api_password' => $password,
            'description' => $this->faker->text,
            'first_name' => $this->faker->firstName,
            'email_id' => self::$email,
            'contact_number' => $this->getMobileNumber(),
            'zip' => $this->faker->numberBetween(11111,99999),
            'currency' => $this->getRandomCurrency()

        ];
            $data = [
                'request_id' => $this->faker->text,
                'api_password' => $password,
            ];

            $response = $this->withHeaders([
                'api_key' => $password,
            ])->json('POST',$url, $data);
    
            $response->assertStatus(200)->assertJson([
                'success' => true,
            ]);
    }


/**
    * Update BuyerOffer API testing.
     *
     * @return void
     */
    public function testupdateBuyerOffer()
    {
        $url = '/api/updateBuyerOffer';
        $password = $this->getApiPassword();
        self::$email = $this->faker->email;
        $data = [
            'api_password' => $password,
            'description' => $this->faker->text,
            'first_name' => $this->faker->firstName,
            'email_id' => self::$email,
            'contact_number' => $this->getMobileNumber(),
            'zip' => $this->faker->numberBetween(11111,99999),
            'currency' => $this->getRandomCurrency()

        ];
            $data = [
                'api_password' => $password,
                'buyer_email' => self::$email,
                'buyer_phone' => $this->getMobileNumber(),
                'buyer_zip' => $this->faker->numberBetween(11111,99999),
                'buyer_currency' => $this->getRandomCurrency(),
                'buyer_orignal_quantity' => $this->faker->numberBetween(1,10),
                'seller_catalog_id' => $this->faker->text,
                'catalog_url' => $this->faker->text,
                'parameter1' => $this->faker->text,
                'parameter2' => $this->faker->text,
                'parameter3' => $this->faker->text,
                'parameter4' => $this->faker->text,
                'parameter5' =>$this->faker->text ,
                'buyer_offer_price' => $this->faker->text,
                'buyer_negotiation_mode' => 'auto',
                'buyer_highest_offer_price' => $this->faker->text,
                'upc_product_code' => $this->faker->text,
                'seller_email' => self::$email,
                'first_name' => $this->faker->firstName,
                'expiry_date' =>$this->faker->date('Y-m-d','now') 
            ];
            $response = $this->withHeaders([
                'api_key' => $password,
            ])->json('POST',$url, $data);
    
            $response->assertStatus(200)->assertJson([
                'success' => true,
            ]);
    }
}




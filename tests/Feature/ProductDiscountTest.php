<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/**
 * ProductDiscount test API:
 * -    /api/productdiscount/types
 * -    /api/productdiscounts
 * -   	/api/productdiscount
 * -    /api/productdiscountbuyerstore
 * -    /api/productdiscountbuyerlist
 * Class ProductDiscountTest
 * @package Tests\Feature
 */


class ProductDiscountTest extends TestCase
{
    /**
     * productdiscounttypes API testing.
     *
     * @return void
     */
    public function testProductDiscountTypes()
    {
        
        $url = '/api/product/discount/types';
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
            ];
    

            $response = $this->withHeaders([
                'api_key' => $password,
            ])->json('POST', $url, $data);
    
            $response->assertStatus(200)->assertJson([
                'success' => true,
         
           ]);

    }

     /**
    *  Product Discounts API testing.
     *
     * @return void
     */
    public function testProductDiscounts()
    {
        $url = '/api/product/discounts';
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
            $data[
                'api_password' => $password,
                'upc_product_code' => $this->faker->text,
                'seller_email' => self::$email
            ];
            $response = $this->withHeaders([
                'api_key' => $password,
            ])->json('POST',$url, $data);
    
            $response->assertStatus(200)->assertJson([
                'success' => true,
            ]);
    }

     /**
    * Product Discount API testing.
     *
     * @return void
     */
    public function testProductDiscount()
    {
        $url = '/api/product/discount';
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
                'upc_product_code' => $this->faker->text,
                'seller_email' => self::$email,
                'discount_type_id' => $this->faker->text,
                'value_type' => $this->faker->text,
                'amount' => $this->faker->text,
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
    * Product Discount Buyer Store API testing.
     *
     * @return void
     */
    public function testProductDiscountBuyerStore()
    {
        $url = '/api/product/discount/buyer/store';
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
            $data[
                'api_password' => $password,
                'product_discount_ids' => $this->faker->text,
                'buyer_email' => self::$email
            ];
            $response = $this->withHeaders([
                'api_key' => $password,
            ])->json('POST',$url, $data);
    
            $response->assertStatus(200)->assertJson([
                'success' => true,
            ]);
    }

    /**
    * Product Discount Buyer List API testing.
     *
     * @return void
     */
    public function testProductDiscountBuyerList()
    {
        $url = '/api/product/discount/buyer/list';
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
            $data[
                'api_password' =>$password ,
                'buyer_email' => self::$email,
                'upc_product_code' => $this->faker->text
            ];

            $response = $this->withHeaders([
                'api_key' => $password,
            ])->json('POST',$url, $data);
    
            $response->assertStatus(200)->assertJson([
                'success' => true,
            ]);
    }
}










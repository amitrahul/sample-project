<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


/**
 * SellerDeal test API:
 * -    /api/addSellerDeal
 * -    /api/updateSellerDeal
 * -    /api/checkSellerDeal
 * -    /api/getSellerDeal
 *
 * Class SellerDealTest
 * @package Tests\Feature
 */


class SellerDealTest extends TestCase
{
    use RoboApi;
    protected static $email;


    /**
     * Add SellerDeal API testing.
     *
     * @return void
     */
    public function testAddSellerDeal()
    {
        $url='/api/addSellerDeal';
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
            'seller_email' => self::$email,
            'seller_phone' => $this->getMobileNumber(),
            'seller_zip' => $this->faker->numberBetween(11111,99999),
            'seller_currency' => $this->getRandomCurrency(),
            'seller_first_name' => $this->faker->firstName,
            'seller_orignal_quantity' => $this->faker->text,
            'seller_catalog_id' => $this->faker->text,
            'parameter1' => $this->faker->text,
            'parameter2' => $this->faker->text,
            'parameter3' => $this->faker->text,
            'parameter4' => $this->faker->text,
            'parameter5' => $this->faker->text,
            'seller_deal_price' => $this->faker->text,
            'seller_negotiation_mode' => 'auto',
            'seller_lowest_deal_price' => $this->faker->text,
            'upc_product_code' => $this->faker->text,
            'title' => $this->faker->title,
            'description' => $this->faker->text,
            'category' => $this->faker->text,
            'sub_category' => $this->faker->text,
            'bulk_or_individual' => $this->faker->text,
            'catalog_id' => $this->faker->text,
            'catalog_url' => $this->faker->url,
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
     * update  SellerDeal API testing.
     *
     * @return void
     */
    public function testUpdateSellerDeal()
    {
        $url = '/api/updateSellerDeal';
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
                'seller_email' => self::$email,
                'seller_phone' => $this->getMobileNumber(),
                'seller_zip' => $this->faker->numberBetween(11111,99999),
                'seller_currency' => $this->getRandomCurrency(),
                'seller_first_name' => $this->faker->firstName,
                'seller_orignal_quantity' => $this->faker->text,
                'seller_catalog_id' => $this->faker->text,
                'parameter1' => $this->faker->text,
                'parameter2' => $this->faker->text,
                'parameter3' => $this->faker->text,
                'parameter4' => $this->faker->text,
                'parameter5' => $this->faker->text,
                'seller_deal_price' => $this->faker->text,
                'seller_negotiation_mode' => 'auto',
                'seller_lowest_deal_price' => $this->faker->text,
                'upc_product_code' => $this->faker->text,
                'title' => $this->faker->title,
                'description' => $this->faker->text,
                'category' => ,$this->faker->text
                'sub_category' => $this->faker->text,
                'bulk_or_individual' => $this->faker->text,
                'catalog_id' => $this->faker->numberBetween(1,10),
                'catalog_url' => $this->faker->text,
                'expiry_date' => $this->faker->text,
                'request_id' => $this->faker->numberBetween(1,10)
            ];

        $response = $this->withHeaders([
            'api_key' => $password,
        ])->json('POST',$url, $data);

        $response->assertStatus(200)->assertJson([
            'success' => true,
        ]);
    }



/**
     * Check  SellerDeal API testing.
     *
     * @return void
     */
    public function testCheckSellerDeal()
    {
        $url = '/api/CheckSellerDeal';
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
                'seller_email' => self::$email,
                'seller_phone' => $this->getMobileNumber(),
                'seller_zip' => $this->faker->numberBetween(11111,99999),
                'seller_currency' => $this->getRandomCurrency(),
                'seller_first_name' => $this->faker->firstName,
                'seller_orignal_quantity' => $this->faker->numberBetween(1,10),
                'seller_catalog_id' => $this->faker->text,
                'parameter1' => $this->faker->text,
                'parameter2' => $this->faker->text,
                'parameter3' => $this->faker->text,
                'parameter4' => $this->faker->text,
                'parameter5' => $this->faker->text,
                'seller_deal_price' => $this->faker->text,
                'seller_negotiation_mode' => 'auto',
                'seller_lowest_deal_price' => $this->faker->text,
                'upc_product_code' => $this->faker->text,
                'title' => $this->faker->title,
                'description' => $this->faker->text,
                'category' => $this->faker->text,
                'sub_category' => $this->faker->text,
                'bulk_or_individual' => $this->faker->text,
                'catalog_id' => $this->faker->text,
                'catalog_url' => $this->faker->url,
                'expiry_date' => $this->faker->date('Y-m-d','now'),
                'request_id' => $this->faker->text
            ];

            $response = $this->withHeaders([
                'api_key' => $password,
            ])->json('POST',$url, $data);
    
            $response->assertStatus(200)->assertJson([
                'success' => true,
            ]);
        }
    
    }
    

    /**
     * Get  SellerDeal API testing.
     *
     * @return void
     */
    public function testgetSellerDeal()
    {
        $url = '/api/getSellerDeal';
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
                'seller_email' => self::$email,
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
    
    }
}    
        
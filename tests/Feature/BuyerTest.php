<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/**
 * Buyer test API:
 * -    /api/getBuyer
 * -    /api/addBuyer
 *
 * Class BuyerTest
 * @package Tests\Feature
 */


class BuyerTest extends TestCase
{
    use RoboApi;
    protected static $email;

    /**
     * get Buyer API testing.
     *
     * @return void
     */
    public function testGetBuyer()
    {
        $url ='/api/getBuyer';
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
                'buyer_email' => self::$email,
                'api_password' => $password
            ];
    {
        $response = $this->withHeaders([
            'api_key' => $password,
        ])->json('POST',$url, $data);

        $response->assertStatus(200)->assertJson([
            'success' => true,
         ]);    
  
    }



 /**
     * add Buyer API testing.
     *
     * @return void
     */
    public function testAddBuyer()
    {
        $url = '/api/addBuyer';
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
                'first_name' => $this->faker->firstName,
                'last_name' => $this->faker->lastName,
                'email_id' => self::$email,
                'contact_number' => $this->getMobileNumber(),
                'sex' => $this->faker->text,
                'race' => $this->faker->text,
                'age' => $this->faker->numberBetween(1,10),
                'education' => $this->faker->text,
                'annual_income' => $this->faker->text,
                'marital_status' => $this->faker->text,
                'owns_car' => $this->faker->text,
                'owns_house' => $this->faker->text,
                'has_pet' => $this->faker->text,
                'has_kid' => $this->faker->text,
                'street_address' => $this->faker->streetAddress,
                'city' => $this->faker->city,
                'state' => $this->faker->state,
                'country' =>  $this->faker->country,
                'zip' => $this->faker->numberBetween(11111,99999)
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



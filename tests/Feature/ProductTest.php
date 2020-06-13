<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

 /* *
 *   Product test API:
 * -    /api/addProduct

 * Class ProductTest
 * @package Tests\Feature
 */
class ProductTest extends TestCase
{
   
    use RoboApi;
    protected static $email;
      /**
     * Add Product API testing.
     *
     * @return void
     */
    public function testAddProduct()
    {
        $url ='/api/addProduct';
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
        $data=[
        'api_password' => $password,
        'upc_product_code' => $this->faker->text,
        'title' => $this->faker->title ,
        'description' => $this->faker->text,
        'category' => $this->faker->text ,
        'sub_category' => $this->faker->text ,
        'parameter1' => $this->faker->text ,
        'parameter2' => $this->faker->text ,
        'parameter3' => $this->faker->text,
        'parameter4' => $this->faker->text,
        'parameter5' => $this->faker->text,
        'bulk_or_individual' => 'individual',
        'product_status' => 1 ,
        'seller_email' => self::$email,
        'catalog_id' => $this->faker->text,
        'catalog_url' => $this->faker->url

            

        ];


        $response = $this->withHeaders([
            'api_key' => $password,
        ])->json('POST',$url, $data);

        $response->assertStatus(200)->assertJson([
            'success' => true,
        ]);
    }
 


}

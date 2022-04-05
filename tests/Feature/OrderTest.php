<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function it_should_be_able_to_create_an_order()
    {
     
        $this->post(route('orders.store'),[
            'customer_name' => 'John Doe',
            'phone' => '+5511999999999',
            'payment_method' => 'credit card',
            'adress' => 'Rua Teste, 123',
            'adress_complement' => 'Escadao',
        ])->assertSuccessful();

        $this->assertDatabaseHas('orders', [
            'status' => 'pending',
            'customer_name' => 'John Doe',
            'phone' => '+5511999999999',
            'payment_method' => 'credit card',
            'adress' => 'Rua Teste, 123',
            'adress_complement' => 'Escadao',

        ]);
    }
}

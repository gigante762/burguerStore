<?php

namespace Tests\Feature;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function test_not_done_scope()
    {
       \App\Models\Order::class::factory()->create(['status'=>'delivered']);

        $this->assertEquals(0, \App\Models\Order::notDone()->get()->count());

    }

    /**
     * @test
     */
    public function it_can_see_all_not_delivered_orders()
    {
        $o = \App\Models\Order::class::factory()->create(['status'=>'pending']);

        $this->assertEquals(1, \App\Models\Order::notDone()->get()->count());
        
        $o->update(['status'=>'delivered']);

        $this->assertEquals(0, \App\Models\Order::notDone()->get()->count());

        $this->assertEquals(1, \App\Models\Order::all()->count());

    }


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

    /** @test */
    public function it_should_be_able_to_update_an_order_status()
    {
        $order =  \App\Models\Order::class::factory()->create();

        $this->put(route('orders.update', $order->id),[
            'status' => 'processing',
        ])->assertForbidden();

        $this->assertDatabaseMissing('orders', [
            'id' => $order->id,
            'status' => 'processing',
        ]);


        $user = \App\Models\User::factory()->create();

        $this->actingAs($user);

        $this->put(route('orders.update', $order->id),[
            'status' => 'processing',
        ]);


        $this->assertDatabaseHas('orders', [
            'id' => $order->id,
            'status' => 'processing',
        ]);

    }

    /** @test */
    public function it_should_be_able_to_delete_an_order()
    {
        $order =  \App\Models\Order::class::factory()->create();
        $this->delete(route('orders.destroy', $order->id))->assertForbidden();

        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);
        $this->delete(route('orders.destroy', $order->id));
        $this->assertDatabaseMissing('orders', [
            'id' => $order->id,
        ]);
    }

    /** @test */
    public function customer_should_be_able_to_see_their_order()
    {
        $order =  \App\Models\Order::class::factory()->create();

        $this->get(route('site.orders.show', $order->code))->assertSuccessful();
    }

    /** @test */
    public function it_should_be_able_to_view_all_orders()
    {
        $this->get(route('orders.index'))->assertForbidden();
        
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user)
        ->get(route('orders.index'))->assertSuccessful();

    }


    /** @test 
     * It's giving error, but it works. I'll keep it for future fixes **/
    public function custmer_should_be_notified_when_order_updated()
    {
        $inititalEvent = Event::getFacadeRoot();
        Event::fake();
        Model::setEventDispatcher($inititalEvent);
        
        $order =  \App\Models\Order::class::factory()->create(['status'=>'pending']);
        
        Event::assertNotDispatched(OrderUpdated::class);
        
        $order->update(['status' =>'processing']);

        Event::assertDispatched(\App\Events\OrderUpdated::class);
    }
}

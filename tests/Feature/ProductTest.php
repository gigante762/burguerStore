<?php

namespace Tests\Feature;

use App\Models\{
    Category,
    Product,
    User
};

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function it_should_be_able_to_create_a_product()
    {
        $user = User::factory()->create();
        $c = Category::create(['name' => 'some category']);
        
        $this->actingAs($user)
            ->post(route('products.store'), [
                'name' => 'Product 1',
                'description' => 'Product 1 description',
                'price' => '100.00',
                'category_id' => $c->id,
            ]);

        $this->assertDatabaseHas('products', [
            'name' => 'Product 1',
        ]);
    }

    /** @test */
    public function it_should_be_able_to_update_a_product()
    {
        $user = User::factory()->create();
        $c = Category::create(['name' => 'some category']);
        $p = Product::create([
            'name' => 'Product 1',
            'description' => 'Product 1 description',
            'price' => '100.00',
            'category_id' => $c->id,
        ]);
        
        $this->actingAs($user)
            ->put(route('products.update', $p->id), [
                'name' => 'Product 2',
                'price' => '320.00',
            ]); 

        $this->assertDatabaseHas('products', [
            'name' => 'Product 2',
            'price' => '320.00',
        ]);
    }

    /** @test */
    public function it_should_be_able_to_delete_a_product()
    {
        $user = User::factory()->create();
        $c = Category::create(['name' => 'some category']);
        $p = Product::create([
            'name' => 'Product 1',
            'description' => 'Product 1 description',
            'price' => '100.00',
            'category_id' => $c->id,
        ]);
        
        $this->actingAs($user)
            ->delete(route('products.destroy', $p->id)); 

        $this->assertDatabaseCount('products', 0);
    }       

    /** @test */
    public function it_should_be_able_to_have_many_images()
    {
        $c = Category::create(['name' => 'some category']);
        $p = Product::factory()->create([
            'category_id' => $c->id,
        ]);

        $this->assertEquals(get_class($p->images()), \Illuminate\Database\Eloquent\Relations\HasMany::class);
    }

    public function test_relationship_with_category()
    {
        $c = Category::create(['name' => 'some category']);
        $p = Product::factory()->create([
            'category_id' => $c->id,
        ]);

        $this->assertEquals(get_class($p->category()), \Illuminate\Database\Eloquent\Relations\BelongsTo::class);
    }
}

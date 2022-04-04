<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function it_shoul_be_able_to_create_a_category()
    {
        $user = User::factory()->create();
        
        $this->post(route('categories.store'), [
            'name' => 'Category 1',
        ]);

        $this->assertDatabaseCount('categories', 0);

        $this->actingAs($user)
        ->post(route('categories.store'), [
            'name' => 'Category 1',
        ]);

        $this->assertDatabaseHas('categories', [
            'name' => 'Category 1',
        ]);
    }

    /** @test */
    public function it_should_be_able_to_show_a_category()
    {
        $c = Category::create(['name'=>'some category']);
        
        $this->actingAs(User::factory()->create());
        $this->get(route('categories.show', $c->id))
        ->assertSuccessful();
    }

    /** @test */
    public function it_should_be_able_to_update_a_category()
    {
        $c = Category::create(['name'=>'some category']);
        
        $this->actingAs(User::factory()->create());
        $this->put(route('categories.update', $c->id), [
            'name' => 'some other category',
        ]);

        $this->assertDatabaseHas('categories', [
            'name' => 'some other category',
        ]);
    }

    /** @test */
    public function it_should_be_able_to_delete_a_category()
    {
        $c = Category::create(['name'=>'some category']);

        $this->actingAs(User::factory()->create());
        $this->delete(route('categories.destroy', $c->id));

        $this->assertDatabaseCount('categories',0);

    }
}

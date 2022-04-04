<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SiteTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index()
    {
        $this->get(route('site.index'))
        ->assertSuccessful();
    }

    public function test_show()
    {
        $c = \App\Models\Category::create(['name'=>'some category']);
        
        $p = \App\Models\Product::factory()->create([
            'category_id' => $c->id
        ]);

        $this->get(route('site.products.show', $p->id))
        ->assertSuccessful();
    }
}

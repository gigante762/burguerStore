<?php

namespace Tests\Feature;

use App\Models\{Category, Product, User};

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ImageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_should_be_able_to_upload_a_single_image()
    {
        $user = User::factory()->create();
        $c = Category::factory()->create(['name' => 'some name']);
        $p = Product::factory()->create(['category_id' => $c->id]);

        Storage::fake('public');


        $this->actingAs($user)
            ->post(route('products.uploadimages', $p->id), [
                'images' => [
                    UploadedFile::fake()->image('image1.jpg'),
                ],
            ]);

        $this->assertTrue(Storage::disk('public')->exists($p->images[0]->path));

        $this->assertEquals(1, $p->images()->count());
    }


    /** @test */
    public function it_should_be_able_to_delete_a_single_image()
    {
        $user = User::factory()->create();
        $c = Category::factory()->create(['name' => 'some name']);
        $p = Product::factory()->create(['category_id' => $c->id]);

        Storage::fake('public');

        $this->actingAs($user);

        $this->post(route('products.uploadimages', $p->id), [
            'images' => [
                UploadedFile::fake()->image('image1.jpg'),
            ],
        ]);

        $this->assertTrue(Storage::disk('public')->exists($p->images[0]->path));
        $this->assertEquals(1, $p->images()->count());

        $this->delete(route('products.deleteimage', $p->id), [
            'image_id' => $p->images[0]->id,
        ]);

        $this->assertFalse(Storage::disk('public')->exists($p->images[0]->path));
        $this->assertDatabaseCount('images', 0);
        $this->assertEquals(0, $p->images()->count());

    }

}

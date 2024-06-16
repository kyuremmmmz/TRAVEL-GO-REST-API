<?php

namespace Tests\Feature;

use App\Models\tours;
use App\Models\Travel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TourListTest extends TestCase
{
   use RefreshDatabase;
    public function test_tour_list_by_travel_slug_returns_correct_tours(): void
    {
        $travel = Travel::factory()->create();
        $tour = tours::factory()->create(['travel_id' => $travel->id]);

        $response = $this->get('v1/travel/'.$travel->slug.'/Tour');

        $response->assertStatus(200);
        $response->assertJsonCount(1, 'data');
        $response->assertJsonFragment(['id'=>$tour->id]);
    }

    public function test_tour_price_is_shown_correctly(): void
    {
        $travel = Travel::factory()->create();
        $tour = tours::factory()->create([
            'travel_id' => $travel->id,
            'price' => 123.45,
        ]);

        $response = $this->get('v1/travel/'.$travel->slug.'/Tour');

        $response->assertStatus(200);
        $response->assertJsonCount(1, 'data');
        $response->assertJsonFragment(['price'=>'123.45']);
    }


    public function test_tour_list_return_pagination(): void
    {

       $travel = Travel::factory()->create();
       tours::factory(16)->create(['travel_id'=>$travel->id]);
       $response =  $this->get('v1/travel/'.$travel->slug.'/Tour');

       $response->assertStatus(200);
       $response->assertJsonCount(15, 'data');
       $response->assertJsonPath('meta.last_page', 2);
    }
}


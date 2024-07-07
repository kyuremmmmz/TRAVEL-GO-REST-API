<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     */
   use RefreshDatabase, HasFactory;
   public function testAdmin() : void
   {
        $user = User::factory()->create();

        $response = $this->postJson('api/login', [
            'email'=> $user->email,
            'password'=>'password',
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure(['access_token']);
   }

        public function invalid(): void {
            $response = $this->postJson('/api/login', [
                'email'=> 'nonexistinguse@gmail.com',
                'password' => 'password'
            ]);
            $response->assertStatus(422);


        }
        }

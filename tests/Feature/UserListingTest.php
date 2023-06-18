<?php

namespace Tests\Feature;

use App\UserListing;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserListingTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function retrieve_all_user_listings() {
        $response = $this->get('/');
        $response->assertStatus(200);
    }


    /** @test */
    public function user_can_be_added_through_the_form()  
    {
        $this->withoutExceptionHandling();
        $response = $this->post('/add-user', [
            'name' => 'test',
            'surname' => 'test',
            'email' => 'test@test.com',
            'position' => 'test'
        ])->assertRedirect('/');


        $this->assertCount(3, UserListing::all());

    }


    /** @test */
    public function delete_a_user_from_the_db()  
    {
        $this->withoutExceptionHandling();
        $response = $this->delete('/delete-user/1')->assertRedirect('/');

     
    }


}

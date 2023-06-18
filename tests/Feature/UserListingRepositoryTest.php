<?php

namespace Tests\Feature;

use App\Repositories\UserListingRepository;
use App\UserListing;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserListingRepositoryTest extends TestCase
{
    use RefreshDatabase;

    protected $repository;
    public function setUp() {
        parent::setUp();
        $this->repository = new UserListingRepository(new UserListing());
    }

    /** @test */
    public function get_all_users(): void
    {    
        $users = $this->repository->getAll();
        $this->assertNotEmpty($users);

    }



    /** @test */
    public function delete_a_user_to_the_db(): void
    {    
        $actualUser = $this->repository->delete('1');
        
        $this->assertNull($actualUser);
        $this->assertCount(1, UserListing::all());
    }

}

<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

use App\User;
use App\Read;

class UserTest extends TestCase
{
    use DatabaseMigrations;

    public function testHasRelationships()
    {
        $user = factory(User::class)->create();
        $this->assertNotNull($user->reads);
    }

    public function testHasCurrentPage()
    {
        $user = factory(User::class)->create();
        $this->assertNull($user->currentPage);
        $read = factory(Read::class)->create(['user_id' => $user->id]);
        $this->assertEquals($read->choice->nextPage->id, $user->currentPage->id);
    }
}

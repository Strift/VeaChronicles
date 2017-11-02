<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ReadTest extends TestCase
{
    use DatabaseMigrations;

    public function testHasRelationships()
    {
        $read = factory(\App\Read::class)->create();
        $this->assertNotNull($read->choice);
        $this->assertNotNull($read->user);
    }
}

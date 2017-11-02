<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ChoiceTest extends TestCase
{
    use DatabaseMigrations;

    public function testHasAttributes()
    {
        $choice = factory(\App\Choice::class)->create(['text' => 'hello']);
        $this->assertEquals($choice->text, 'hello');
    }

    public function testHasTextRelationship()
    {
        $choice = factory(\App\Choice::class)->create();
        $this->assertNotNull($choice->nextPage);
    }
}

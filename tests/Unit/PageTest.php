<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PageTest extends TestCase
{
    use DatabaseMigrations;

    public function testHasTextsRelationship()
    {
        $page = factory(\App\Page::class)->create();
        $i = 0;
        factory(\App\Text::class, 3)->create(['page_id' => $page->id, 'order' => $i++])
                                    ->each(function($text) use ($page) {
                                        $page->texts()->save($text);
                                    });
        $this->assertEquals(3, $page->texts->count());
    }

    public function testHasChoicesRelationship()
    {
        $page = factory(\App\Page::class)->create();
        factory(\App\Choice::class, 3)->create()
                                    ->each(function($text) use ($page) {
                                        $page->choices()->attach($text->id);
                                    });
        $this->assertEquals(3, $page->choices->count());
    }
}

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
        factory(\App\Text::class, 3)->create()
                                    ->each(function($text) use ($page) {
                                        $page->texts()->attach($text->id);
                                    });
        $this->assertEquals($page->texts->count(), 3);
    }
    

    public function testHasChoicesRelationship()
    {
        $page = factory(\App\Page::class)->create();
        factory(\App\Choice::class, 3)->create()
                                    ->each(function($text) use ($page) {
                                        $page->choices()->attach($text->id);
                                    });
        $this->assertEquals($page->choices->count(), 3);
    }}

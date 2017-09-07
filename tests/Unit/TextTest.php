<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class TextTest extends TestCase
{
	use DatabaseMigrations;
	
	public function testHasAttributes()
	{
		$text = factory(\App\Text::class)->create([
			'content' => 'hello',
			'delay' => 1000,
			'speed' => 10]);
		$this->assertEquals($text->content, 'hello');
		$this->assertEquals($text->delay, 1000);
		$this->assertEquals($text->speed, 10);
	}
}

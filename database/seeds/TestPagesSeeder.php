<?php

use Illuminate\Database\Seeder;

class TestPagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Page 2
        $page2 = factory(\App\Page::class)->create();
        $page2->texts()->attach(factory(\App\Text::class)->create([
            'content' => "Réveillez-vous.",
            'delay' => 0,
            'speed' => 10,
            ])->id);
        $page2->texts()->attach(factory(\App\Text::class)->create([
            'content' => "Jeune [homme/femme], levez-vous.",
            'delay' => 1000,
            'speed' => 20,
            ])->id);
        // Page 1
        $page1 = factory(\App\Page::class)->create();
        $page1->texts()->attach(factory(\App\Text::class)->create([
            'content' => "Les rayons du soleil commencent à percer à travers la fenêtre à votre réveil. La pièce est à demi-éclairée et vous commencez à apercevoir peu à peu le décor. Une chambre… un lit… vous êtes allongé et ne pouvez bouger. Impossible de vous rappeler ce que vous faites là... Votre mal de tête vous empêche de réfléchir et vous succombez de nouveau à la fatigue.",
            'delay' => 0,
            'speed' => 0,
            ]));
        $page1->choices()->attach(factory(\App\Choice::class)->create([
            'text' => "Que fais-je ici ?",
            'nextPage_id' => $page2->id,
            ]));
        $page1->choices()->attach(factory(\App\Choice::class)->create([
            'text' => "Qui êtes-vous ?",
            'nextPage_id' => $page2->id,
            ]));
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Character;

class CharacterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Avval barcha qahramonlarni o'chirish
        Character::truncate();
        
        $characters = [
            // Asosiy Simpsonlar oilasi
            [
                'name' => 'Homer Simpson',
                'description' => 'Springfield Atom Elektr Stansiyasida ishlaydigan oilaning boshlig\'i. Ko\'pincha sariq ko\'ylak va ko\'k shim kiyadi. Do\'stona va qiziq xarakter, lekin ba\'zan ahmoqona qarorlar qabul qiladi.',
                'image' => 'homer.jpg',
                'voice_actor' => 'Dan Castellaneta',
                'first_appearance' => 'Season 1, Episode 1',
                'occupation' => 'Springfield Atom Elektr Stansiyasi xodimi',
                'family' => 'Marge (xotini), Bart, Lisa, Maggie (farzandlari)'
            ],
            [
                'name' => 'Marge Simpson',
                'description' => 'Simpsonlar oilasining uy bekasi. Ko\'k sochli va sokin xarakter. Oilasini juda yaxshi ko\'radi va ularni himoya qiladi. Ko\'pincha yashil ko\'ylak kiyadi.',
                'image' => 'marge.jpg',
                'voice_actor' => 'Julie Kavner',
                'first_appearance' => 'Season 1, Episode 1',
                'occupation' => 'Uy bekasi',
                'family' => 'Homer (er), Bart, Lisa, Maggie (farzandlari)'
            ],
            [
                'name' => 'Bart Simpson',
                'description' => '10 yoshli o\'g\'il bola, oilaning eng katta farzandi. Qiziq va do\'stona, lekin ba\'zan muammolar yaratadi. Ko\'pincha "Ay Caramba!" deydi.',
                'image' => 'bart.jpg',
                'voice_actor' => 'Nancy Cartwright',
                'first_appearance' => 'Season 1, Episode 1',
                'occupation' => 'O\'quvchi',
                'family' => 'Homer, Marge (ota-ona), Lisa, Maggie (siga-uka)'
            ],
            [
                'name' => 'Lisa Simpson',
                'description' => '8 yoshli qiz bola, oilaning eng aqlli a\'zosi. Saxovatli va adolatli. Saksofon chaladi va vegetarian. Ko\'pincha yashil ko\'ylak kiyadi.',
                'image' => 'lisa.jpg',
                'voice_actor' => 'Yeardley Smith',
                'first_appearance' => 'Season 1, Episode 1',
                'occupation' => 'O\'quvchi',
                'family' => 'Homer, Marge (ota-ona), Bart (aka), Maggie (siga)'
            ],
            [
                'name' => 'Maggie Simpson',
                'description' => '1 yoshli eng kichik farzand. Ko\'pincha so\'kmoqni emizadi va juda kam gapiribdi. Oilaning eng sokin a\'zosi.',
                'image' => 'maggie.jpg',
                'voice_actor' => 'Various',
                'first_appearance' => 'Season 1, Episode 1',
                'occupation' => 'Bola',
                'family' => 'Homer, Marge (ota-ona), Bart, Lisa (aka-siga)'
            ],
            
            // Atom Elektr Stansiyasi xodimlari
            [
                'name' => 'Mr. Burns',
                'description' => 'Springfield Atom Elektr Stansiyasining egasi. Juda boy va xasis odam. Ko\'pincha "Excellent!" deydi va Smithers bilan birga ishlaydi.',
                'image' => 'burns.jpg',
                'voice_actor' => 'Harry Shearer',
                'first_appearance' => 'Season 1, Episode 1',
                'occupation' => 'Atom Elektr Stansiyasi egasi',
                'family' => 'Yolg\'iz'
            ],
            [
                'name' => 'Waylon Smithers',
                'description' => 'Mr. Burnsning shaxsiy yordamchisi. Ko\'pincha sariq ko\'ylak kiyadi va Burnsga juda sodiq.',
                'image' => 'smithers.jpg',
                'voice_actor' => 'Harry Shearer',
                'first_appearance' => 'Season 1, Episode 1',
                'occupation' => 'Mr. Burns yordamchisi',
                'family' => 'Yolg\'iz'
            ],
            [
                'name' => 'Carl Carlson',
                'description' => 'Atom elektr stansiyasida ishlaydigan xodim. Ko\'pincha Lenny bilan birga ko\'rinadi.',
                'image' => 'carl.jpg',
                'voice_actor' => 'Hank Azaria',
                'first_appearance' => 'Season 1, Episode 1',
                'occupation' => 'Atom elektr stansiyasi xodimi',
                'family' => 'Yolg\'iz'
            ],
            [
                'name' => 'Lenny Leonard',
                'description' => 'Atom elektr stansiyasida ishlaydigan xodim. Ko\'pincha Carl bilan birga ko\'rinadi va Moe\'s Tavern da ichadi.',
                'image' => 'lenny.jpg',
                'voice_actor' => 'Harry Shearer',
                'first_appearance' => 'Season 1, Episode 1',
                'occupation' => 'Atom elektr stansiyasi xodimi',
                'family' => 'Yolg\'iz'
            ],
            
            // Qo'shnilar va do'stlar
            [
                'name' => 'Ned Flanders',
                'description' => 'Simpsonlar oilasining qo\'shnisi. Dindor va yaxshi odam. Ko\'pincha "Hi-diddly-ho!" deydi va Homer bilan do\'st.',
                'image' => 'ned.jpg',
                'voice_actor' => 'Harry Shearer',
                'first_appearance' => 'Season 1, Episode 3',
                'occupation' => 'Leftorium do\'koni egasi',
                'family' => 'Maude (xotini), Rod, Todd (farzandlari)'
            ],
            [
                'name' => 'Edna Krabappel',
                'description' => 'Springfield boshlang\'ich maktabining o\'qituvchisi. Bart va Lisa sinfining o\'qituvchisi.',
                'image' => 'edna.jpg',
                'voice_actor' => 'Marcia Wallace',
                'first_appearance' => 'Season 1, Episode 1',
                'occupation' => 'O\'qituvchi',
                'family' => 'Yolg\'iz'
            ],
            [
                'name' => 'Seymour Skinner',
                'description' => 'Springfield boshlang\'ich maktabining direktori. Ko\'pincha Edna Krabappel bilan munosabatda.',
                'image' => 'skinner.jpg',
                'voice_actor' => 'Harry Shearer',
                'first_appearance' => 'Season 1, Episode 1',
                'occupation' => 'Maktab direktori',
                'family' => 'Agnes (onasi)'
            ],
            
            // Politsiya va hokimiyat
            [
                'name' => 'Chief Wiggum',
                'description' => 'Springfield politsiyasining boshlig\'i. Ko\'pincha donut yeydi va Ralph bilan birga ishlaydi.',
                'image' => 'wiggum.jpg',
                'voice_actor' => 'Hank Azaria',
                'first_appearance' => 'Season 1, Episode 8',
                'occupation' => 'Politsiya boshlig\'i',
                'family' => 'Sarah (xotini), Ralph (o\'g\'li)'
            ],
            [
                'name' => 'Ralph Wiggum',
                'description' => 'Chief Wiggumning o\'g\'li va Bartning sinfdoshi. Ko\'pincha qiziq gapiribdi.',
                'image' => 'ralph.jpg',
                'voice_actor' => 'Nancy Cartwright',
                'first_appearance' => 'Season 1, Episode 8',
                'occupation' => 'O\'quvchi',
                'family' => 'Chief Wiggum (otasi), Sarah (onasi)'
            ],
            [
                'name' => 'Mayor Quimby',
                'description' => 'Springfield shahrining meri. Ko\'pincha sariq ko\'ylak kiyadi va siyosiy muammolar yaratadi.',
                'image' => 'quimby.jpg',
                'voice_actor' => 'Dan Castellaneta',
                'first_appearance' => 'Season 1, Episode 8',
                'occupation' => 'Shahar meri',
                'family' => 'Yolg\'iz'
            ],
            
            // Ko'ngil ochar va madaniyat
            [
                'name' => 'Krusty the Clown',
                'description' => 'Mashhur televidenie yulduzi va Krusty Burger tarmog\'ining egasi. Ko\'pincha "Hey Hey!" deydi.',
                'image' => 'krusty.jpg',
                'voice_actor' => 'Dan Castellaneta',
                'first_appearance' => 'Season 1, Episode 12',
                'occupation' => 'Televidenie yulduzi',
                'family' => 'Sophie (qizi)'
            ],
            [
                'name' => 'Kent Brockman',
                'description' => 'Springfield televideniesining yangiliklar boshlovchisi. Ko\'pincha "Good evening, I\'m Kent Brockman" deydi.',
                'image' => 'kent.jpg',
                'voice_actor' => 'Harry Shearer',
                'first_appearance' => 'Season 1, Episode 1',
                'occupation' => 'Yangiliklar boshlovchisi',
                'family' => 'Yolg\'iz'
            ],
            [
                'name' => 'Disco Stu',
                'description' => 'Springfield da yashaydigan disco muxlisi. Ko\'pincha 70-yillar kiyimlari kiyadi.',
                'image' => 'disco.jpg',
                'voice_actor' => 'Hank Azaria',
                'first_appearance' => 'Season 2, Episode 12',
                'occupation' => 'Disco muxlisi',
                'family' => 'Yolg\'iz'
            ],
            
            // Do'konlar va biznes
            [
                'name' => 'Apu Nahasapeemapetilon',
                'description' => 'Kwik-E-Mart do\'konining egasi. Hindistonlik va Springfield da eng mashhur do\'kon egasi.',
                'image' => 'apu.jpg',
                'voice_actor' => 'Hank Azaria',
                'first_appearance' => 'Season 1, Episode 1',
                'occupation' => 'Kwik-E-Mart egasi',
                'family' => 'Manjula (xotini), Anoop, Sanjay, Pahusut, Gheet (farzandlari)'
            ],
            [
                'name' => 'Moe Szyslak',
                'description' => 'Moe\'s Tavern egasi. Ko\'pincha qora ko\'ylak kiyadi va Homerning eng yaxshi do\'sti.',
                'image' => 'moe.jpg',
                'voice_actor' => 'Hank Azaria',
                'first_appearance' => 'Season 1, Episode 1',
                'occupation' => 'Moe\'s Tavern egasi',
                'family' => 'Yolg\'iz'
            ],
            [
                'name' => 'Comic Book Guy',
                'description' => 'Comic Book Store egasi. Ko\'pincha "Worst. Episode. Ever." deydi va pop madaniyat muxlisi.',
                'image' => 'comic.jpg',
                'voice_actor' => 'Hank Azaria',
                'first_appearance' => 'Season 2, Episode 2',
                'occupation' => 'Comic Book Store egasi',
                'family' => 'Yolg\'iz'
            ],
            
            // Tibbiyot va sog'liq
            [
                'name' => 'Dr. Hibbert',
                'description' => 'Springfield kasalxonasining bosh shifokori. Ko\'pincha "Hi, everybody!" deydi.',
                'image' => 'hibbert.jpg',
                'voice_actor' => 'Harry Shearer',
                'first_appearance' => 'Season 1, Episode 1',
                'occupation' => 'Bosh shifokor',
                'family' => 'Bernice (xotini), Shauna (qizi)'
            ],
            [
                'name' => 'Dr. Nick Riviera',
                'description' => 'Springfield da ishlaydigan shifokor. Ko\'pincha "Hi, everybody!" deydi va past sifatli tibbiy xizmat ko\'rsatadi.',
                'image' => 'nick.jpg',
                'voice_actor' => 'Hank Azaria',
                'first_appearance' => 'Season 2, Episode 1',
                'occupation' => 'Shifokor',
                'family' => 'Yolg\'iz'
            ],
            
            // Sport va mashg'ulotlar
            [
                'name' => 'Duffman',
                'description' => 'Duff Beer brendining maskoti. Ko\'pincha "Oh Yeah!" deydi va Duff Beer reklamalarida ko\'rinadi.',
                'image' => 'duffman.jpg',
                'voice_actor' => 'Hank Azaria',
                'first_appearance' => 'Season 5, Episode 8',
                'occupation' => 'Duff Beer maskoti',
                'family' => 'Yolg\'iz'
            ],
            [
                'name' => 'Otto Mann',
                'description' => 'Springfield boshlang\'ich maktabining avtobus haydovchisi. Rok musiqasi muxlisi va ko\'pincha gitara chaladi.',
                'image' => 'otto.jpg',
                'voice_actor' => 'Harry Shearer',
                'first_appearance' => 'Season 1, Episode 1',
                'occupation' => 'Avtobus haydovchisi',
                'family' => 'Yolg\'iz'
            ]
        ];

        foreach ($characters as $character) {
            Character::create($character);
        }
    }
}

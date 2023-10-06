<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        // $this->call(UsersSeeder::class);
        $this->call(GenderSeeder::class);
        $this->call(SeasonSeeder::class);
        $this->call(StyleSeeder::class);
        $this->call(PartSeeder::class);
        $this->call(LengthSeeder::class);
        $this->call(SizeSeeder::class);
        $this->call(ImpressionSeeder::class);
        $this->call(ColorSeeder::class);
        $this->call(TopsSeeder::class);
        $this->call(BotmsSeeder::class);
        $this->call(DoresSeeder::class);
        $this->call(OuterwareSeeder::class);
        $this->call(AccessorySeeder::class);
        $this->call(ShoesSeeder::class);
        $this->call(OverlapSeeder::class);
    }
}

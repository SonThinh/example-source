<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    protected $total = 200;
    protected $chunk = 100;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('posts')->truncate();
        $startSeed = now();
        foreach ($this->generator() as $index => $value) {
            $startInsert = microtime(true);
            DB::table('posts')->insert($value);
            $timeInsert = microtime(true) - $startInsert;
            $total = count($value);
            $offset = $this->total / $this->chunk;
            $this->command->info("({$index}/{$offset}) Insert {$total} records take {$timeInsert}");
        }
        $seedTime = now()->diffInMinutes($startSeed);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $this->command->info("Total times spend {$seedTime} second");
    }

    private function generator()
    {
        for ($i = 0; $i < ($this->total / $this->chunk); $i++) {
            yield $this->makePostData();
        }
    }

    /**
     * @return array
     */
    private function makePostData()
    {
        $faker = \Faker\Factory::create();
        $posts = [];
        for ($i = 0; $i < $this->chunk; $i++) {
            $posts[] = [
                'id' => $faker->uuid,
                'title' => $faker->sentence,
                'content' => $faker->paragraphs(3, true),
                'created_at' => $faker->dateTime()->format('Y-m-d H:i:s'),
                'updated_at' => $faker->dateTime()->format('Y-m-d H:i:s')
            ];
        }
        return $posts;
    }
}

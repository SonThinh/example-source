<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    protected $total = 1500000;
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
        $start = now();
        foreach ($this->generator() as $index => $value) {
            $start = microtime(true);
            DB::table('posts')->insert($value);
            $time = microtime(true) - $start;
            $total = count($value);
            $offset = $this->total / $this->chunk;
            $this->command->info("({$index}/{$offset}) Insert {$total} records take {$time}");
        }
        $end = now()->diffInMinutes($start);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $this->command->info("Total times spend {$end} second");
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
                'created_at' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now()->format('Y-m-d H:i:s'),
            ];
        }
        return $posts;
    }
}

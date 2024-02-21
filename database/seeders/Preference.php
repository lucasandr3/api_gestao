<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Preference extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('preferences')->insert([
            'settings_id' => 1,
            'resource' => 'TOKEN_SLACK',
            'value' => 'xoxb-6674609766980-6678797451028-x3DA2lOvE9ak0OZNXRTSurFb',
            'description' => 'Tokenn do App do slack',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('preferences')->insert([
            'settings_id' => 1,
            'resource' => 'CHANNELS_SLACK',
            'value' => 'parceiros',
            'description' => 'Canais do slack',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}

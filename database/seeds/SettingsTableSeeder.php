<?php

use Illuminate\Database\Seeder;
use App\Setting;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'key' => 'webname',
            'value'=> 'Studywithme',
            'name'=> 'Web Name',
            'comment' => 'set your web name',
            'sort'=> 1,
        ]);
        Setting::create([
            'key' => 'icp',
            'value'=> '123456',
            'name'=> 'icp no.',
            'comment' => 'set your icp no.',
            'sort'=> 2,
        ]);
        Setting::create([
            'key' => 'page_resource',
            'value'=> '15',
            'name'=> 'pagination',
            'comment' => 'how many item in one page',
            'sort'=> 3,
        ]);
        Setting::create([
            'key' => 'ali_access',
            'value'=> '455',
            'name'=> 'ali_ACCESS',
            'comment' => 'you need is for video',
            'sort'=> 4,
        ]);
        Setting::create([
            'key' => 'ali_secret',
            'value'=> 'sthme',
            'name'=> 'ALI_SECRET',
            'comment' => 'set your Ali secret',
            'sort'=> 5,
        ]);
        Setting::create([
            'key' => 'ali_region',
            'value'=> 'cn-shanghai',
            'name'=> 'ali_region',
            'comment' => 'default cn-shanghai',
            'sort'=> 6,
        ]);


    }
}

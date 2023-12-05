<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // create super admins
        \App\Models\Admin::create([
            'name'      => "Admin",
            'email'     => "admin@admin.com",
            'password'  => Hash::make('password') ,
            'is_super'  => true
        ]);

        // create normal admin
        \App\Models\Admin::create([
            'name'      => "Agent",
            'email'     => "agent@agent.com",
            'password'  => Hash::make('123456') ,
            'is_super'  => false
        ]);

        DB::insert('INSERT INTO `settings` (
            
            `name`,
            `whatsapp`,
            `phone_first`,
            `phone_second`
            
            
            ) values (?, ?,?,?)', ['La Casa Co-Working','212661722071','212 522-862357', '212 661-722071']);

    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\Admin::create([
            'name' => 'M.M.R Aabir',
            'email' => 'admin@gmail.com',
            'password' =>Hash::make('admin123')
        ]);

        // \App\Models\Manager::create([
        //     'name' => 'M.M.R Shisui',
        //     'email' => 'manager@gmail.com',
        //     'password' =>Hash::make('admin123'),
        //     'branch_id' => '3',
        //     'number' =>'01971324922',
            
            

        // ]);


//         \App\Models\Branch::create([
//             'branch_name' => 'Savar Courier Point',
//             'branch_email' => 'savar@gmail.com',
//             'admin_id' => '1',
//             'number' =>'01971324923',
//             'address' =>'Savar',
            
            

//         ]);


// \App\Models\Employee::create([
//             'name' => 'Itachi Uchiha',
//             'email' => 'employee1@gmail.com',
//             'password' =>Hash::make('admin123'),
//             'email' => 'employee1@gmail.com',
//             'phone' =>'01974451142',
//             'branch_id' =>'1',
//             'status'=>'active'


//         ]);



//             \App\Models\Cost::create([
//             'unit_id' => '1',
//             'cost' => '5000',
            
//         ]);

//         \App\Models\Company::create([
//             'company_name' => 'American Health Center',
//             'owner_name' => 'Dr. Mujibul Haque',
//             'phone'=> '01971452133',
//             'photo' =>'images/nophoto.jpg',
//             'status' =>'active'


//         ]);
        
    }
}

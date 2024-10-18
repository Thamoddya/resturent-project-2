<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\OrderdMenu;
use App\Models\Transaction;
use App\Models\User;
use Database\Factories\OrderdMenuFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $permissions = [
            'create_hotels',
            'edit_hotels',
            'delete_hotel',
            'manage_users',
            'manage_hotel_staff',
            'process_payment',
            'view_reports',
            'edit_user_hotel',
            'edit_reports',
            'manage_inventory'
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission,
            ]);
        }

        $superAdmin = Role::create(
            [
                "name" => "Super_Admin",
            ]
        );
        $hotelAdmin = Role::create(
            [
                "name" => "Hotel_Admin",
            ]
        );
        $hotelEmployee = Role::create(
            [
                "name" => "Hotel_Employee",
            ]
        );
        $hotelCasher = Role::create(
            [
                "name" => "Hotel_Casher",
            ]
        );

        $superAdmin->givePermissionTo([
            'create_hotels',
            'edit_hotels',
            'delete_hotel',
            'manage_users',
            'manage_hotel_staff',
            'edit_user_hotel',
            'view_reports',
            'edit_reports',
        ]);
        $hotelAdmin->givePermissionTo([
            'delete_hotel',
            'manage_hotel_staff',
            'edit_user_hotel',
            'edit_reports',
        ]);

        $hotelEmployee->givePermissionTo([
            'manage_inventory',
        ]);

        $hotelCasher->givePermissionTo([
            'process_payment',
            'view_reports',
        ]);

        $superAdminOne = User::create(
            [
                'name' => "Texta World",
                'email'=>"texta@hotelaitexta.world",
                'password'=>Hash::make("Texta1234@"),
                'mobile'=>"0000000000",
                'nic'=>"0000000000",
                'address'=>"Anuradhapura",
            ]
        );
        $superAdminOne->assignRole(Role::find(1));

        // $this->call([
        //     MenuSeeder::class,
        // ]);

        // $this->call([
        //     OrderSeeder::class,
        // ]);

        // OrderdMenu::factory()->count(150)->create();
        // Transaction::factory()->count(10)->create();
    }
}

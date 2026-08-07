<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RoleAndUserSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Create Roles
        $superAdminRole = Role::updateOrCreate(
            ['slug' => 'super-admin'],
            ['name' => 'Super Admin', 'description' => 'Full access to all system configurations and data.']
        );

        $managerRole = Role::updateOrCreate(
            ['slug' => 'practice-manager'],
            ['name' => 'Practice Manager', 'description' => 'Manages appointments, referrals, team members, and content.']
        );

        $dentistRole = Role::updateOrCreate(
            ['slug' => 'dentist'],
            ['name' => 'Dentist', 'description' => 'Views assigned patient appointments and clinical referrals.']
        );

        $receptionistRole = Role::updateOrCreate(
            ['slug' => 'receptionist'],
            ['name' => 'Receptionist', 'description' => 'Manages patient appointment bookings and front desk communications.']
        );

        $editorRole = Role::updateOrCreate(
            ['slug' => 'content-editor'],
            ['name' => 'Content Editor', 'description' => 'Manages CMS pages, treatment details, news, and media assets.']
        );

        // 2. Create Permissions
        $permissions = [
            // Settings
            ['name' => 'Manage Global Settings', 'slug' => 'settings.manage', 'module' => 'settings'],
            // Pages
            ['name' => 'View Pages', 'slug' => 'pages.view', 'module' => 'pages'],
            ['name' => 'Edit Pages', 'slug' => 'pages.edit', 'module' => 'pages'],
            // Team
            ['name' => 'Manage Team Members', 'slug' => 'team.manage', 'module' => 'team'],
            // Fees
            ['name' => 'Manage Fee Guide', 'slug' => 'fees.manage', 'module' => 'fees'],
            // Treatments
            ['name' => 'Manage Treatments', 'slug' => 'treatments.manage', 'module' => 'treatments'],
            // Appointments
            ['name' => 'View Appointments', 'slug' => 'appointments.view', 'module' => 'appointments'],
            ['name' => 'Manage Appointments', 'slug' => 'appointments.manage', 'module' => 'appointments'],
            // Referrals
            ['name' => 'View Referrals', 'slug' => 'referrals.view', 'module' => 'referrals'],
            ['name' => 'Manage Referrals', 'slug' => 'referrals.manage', 'module' => 'referrals'],
            // Media
            ['name' => 'Manage Media', 'slug' => 'media.manage', 'module' => 'media'],
            // Users
            ['name' => 'Manage Users', 'slug' => 'users.manage', 'module' => 'users'],
        ];

        foreach ($permissions as $perm) {
            Permission::updateOrCreate(['slug' => $perm['slug']], $perm);
        }

        // 3. Assign All Permissions to Super Admin
        $allPermissionIds = Permission::pluck('id')->toArray();
        $superAdminRole->permissions()->sync($allPermissionIds);

        // 4. Create Initial Super Admin User
        User::updateOrCreate(
            ['email' => 'admin@icondentalwembley.co.uk'],
            [
                'name' => 'Practice Administrator',
                'password' => Hash::make('password'),
                'role_id' => $superAdminRole->id,
                'status' => 'active',
            ]
        );
    }
}

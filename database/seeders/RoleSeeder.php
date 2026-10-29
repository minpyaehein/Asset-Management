<?php

namespace Database\Seeders;

use App\Models\UserManagement;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $admin = UserManagement::firstOrNew([
            'user_name' => 'admin',
        ]);

        $admin->role = 'Admin';
        $admin->status = 'Active';
        $admin->scope = 'All';

        if (!$admin->exists || empty($admin->password)) {
            $admin->password = Hash::make('admin123');
        }

        $admin->save();

        $agent = UserManagement::firstOrNew([
            'user_name' => 'agent',
        ]);

        $agent->role = 'Agent';
        $agent->status = 'Active';
        $agent->scope = 'Asset Management';

        if (!$agent->exists || empty($agent->password)) {
            $agent->password = Hash::make('agent123');
        }

        $agent->save();
    }
}
<?php

namespace Database\Seeders;

use App\Models\Superadmin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateSuperadmin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // check if superadmin already exists
        $superadmin = Superadmin::first();
        if ($superadmin) {
            return ;
        }
        $superadmin = new Superadmin();
        $superadmin->name = 'Superadmin';
        $superadmin->email = 'superadmin@meter.com';
        $superadmin->password = bcrypt('METER123');
        $superadmin->save();
    }
}

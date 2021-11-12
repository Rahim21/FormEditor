<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete(); // au lieu de truncate
        User::create([
        	'firstname' => 'Rahim',
            'lastname' => 'HAYAT',
        	'email' => 'rahim.hayat@etudiant.univ-reims.fr',
        	'email_verified_at' => now(),
        	'password' => bcrypt('password'),
        	'remember_token' => '',
            'profile_photo_path' => 'https://miro.medium.com/max/600/0*HVf99uME8t1T1VbA.gif',
        ]);
        User::create([
        	'firstname' => 'Sami',
            'lastname' => 'DRIOUCHE',
        	'email' => 'sami.driouche@etudiant.univ-reims.fr',
        	'email_verified_at' => now(),
        	'password' => bcrypt('password'),
        	'remember_token' => '',
        ]);
        User::factory()->count(10)->create();
    }
}

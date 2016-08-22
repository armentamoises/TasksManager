<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' 					=> 'Moises',
            'lastname' 				=> 'Armenta',
            'avatar' 				=> 'moises.jpg',
            'email' 				=> 'admin@yourdomain.com',
            'password' 				=> '$2y$10$F.IHstSlQ0.suoTVh3bcDO/PwhsmgyLC19ItgeacXBHVf.1Eo4zb6',
            'role_id' 				=> 1,
            'must_reset_password' 	=> 0,
            'status' 				=> 1,
            'confirmed' 			=> 1,
            'remember_token' 		=> NULL,
            'created_at' 			=> date('Y-m-d h:i:s'),
            'updated_at' 			=> date('Y-m-d h:i:s'),
        ]);
    }
}

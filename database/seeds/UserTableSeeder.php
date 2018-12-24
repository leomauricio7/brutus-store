<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'telefone' => '84 994302191',
            'cep' => '59570000',
            'uf' => 'RN',
            'cidade' => 'Ceara Mirim',
            'rua' => 'Rua Prisco Rocha',
            'numero' => '1163',
            'bairro' => 'Passa e Fica',
            'complemento' => 'Em frente ao orelhão',
        ]);
    }
}

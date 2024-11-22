<?php

namespace Database\Seeders;

use App\Models\Conta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        if(!Conta::where('nome', 'carro')->first()){
            Conta::create([
                'nome' => 'Energia',
                'valor' => '333.22',
                'vencimento' => '2024-11-22',
            ]);
        }

        if(!Conta::where('nome', 'carro')->first()){
            Conta::create([
                'nome' => 'Energia',
                'valor' => '133.22',
                'vencimento' => '2024-11-22',
            ]);
        }
    }
}

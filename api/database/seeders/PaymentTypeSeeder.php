<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PaymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('payment_type')->insert([
            'name' => 'Dinheiro'
        ]);

        DB::table('payment_type')->insert([
            'name' => 'Pix'
        ]);

        DB::table('payment_type')->insert([
            'name' => 'Cartão de Crédito'
        ]);

        DB::table('payment_type')->insert([
            'name' => 'Cartão de Débito'
        ]);

        DB::table('payment_type')->insert([
            'name' => 'Boleto'
        ]);
    }
}

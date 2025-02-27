<?php

namespace Database\Seeders;

use App\Models\Bank;
use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bank::create([
            'bank_name' => 'MB BANK',
            'account_number' => '882005131188',
            'logo' => 'path/to/logo.jpg',
        ]);
    }
}

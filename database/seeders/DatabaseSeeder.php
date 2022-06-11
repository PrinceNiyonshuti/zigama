<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Admin::factory(10)->create();
        \App\Models\Bank::factory(10)->create();
        \App\Models\Company::factory(10)->create();
        \App\Models\BankAccountType::factory(10)->create();
        $this->call(BankAccountTypeSeeder::class);
        \App\Models\BankAccount::factory(10)->create();
        \App\Models\Client::factory(10)->create();
        \App\Models\TransactionType::factory(10)->create();
        \App\Models\Transaction::factory(10)->create();
    }
}

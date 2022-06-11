<?php

namespace Database\Seeders;

use App\Models\BankAccountType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class BankAccountTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Schema::disableForeignKeyConstraints();
        BankAccountType::truncate();
        BankAccountType::create(['bank_id' => '1', 'typeName' => 'Personal']);
        BankAccountType::create(['bank_id' => '2', 'typeName' => 'Bussiness']);
        Schema::enableForeignKeyConstraints();
    }
}

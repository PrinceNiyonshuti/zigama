<?php

namespace Database\Factories;

use App\Models\Bank;
use App\Models\BankAccountType;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BankAccount>
 */
class BankAccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'bank_id' => Bank::all()->random()->id,
            'user_id' => User::all()->random()->id,
            'bank_account_type_id' => BankAccountType::all()->random()->id,
            'status' => 'active'
        ];
    }
}

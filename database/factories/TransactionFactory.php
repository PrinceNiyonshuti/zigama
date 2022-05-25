<?php

namespace Database\Factories;

use App\Models\Bank;
use App\Models\User;
use App\Models\TransactionType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
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
            'transaction_type_id' => TransactionType::all()->random()->id,
            'bank_id' => Bank::all()->random()->id,
            'user_id' => User::all()->random()->id,
            'amount' => '200.00',
        ];
    }
}

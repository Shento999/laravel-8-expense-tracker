<?php

namespace Database\Factories;

use App\Models\Expense;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExpenseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Expense::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $expenseCategory = config('expense.expense_category'); // get static array from config
        $paymentMethod = config('expense.payment_method'); // get static array from config

        return [
            //
            'description' => $this->faker->sentence('4'),
            'date' => $this->faker->date('Y-m-d'),
            'amount' => $this->faker->numberBetween('50', '500'),
            'category' => $this->faker->randomElement($expenseCategory, 1),
            'user_id' => 2,
            'payment_method' => $this->faker->randomElement($paymentMethod, 1),
        ];
    }
}

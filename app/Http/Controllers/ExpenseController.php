<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    //
    public function index() {

        $expenses = Expense::orderByDesc('id')->paginate(5);
        return view('expenses.expense-index')->with('expenses', $expenses);
        
    }

    public function add() {

        $expenseCategory = config('expense.expense_category');
        $paymentMethod = config('expense.payment_method');

        return view('expenses.expense-add')->with('expenseCategory', $expenseCategory)->with('paymentMethod', $paymentMethod);
    
    }

    public function store(Request $request) {
        
        $expenseCategory = config('expense.expense_category');
        $paymentMethod = config('expense.payment_method');

        $postDate = $request->validate([
            'description' => ['required', 'min:5'],
            'date' => ['required', 'date'],
            'amount' => ['required', 'min:1'],
            'category' => ['required', Rule::in($expenseCategory)],
            'payment_method' => ['required', Rule::in($paymentMethod)]
        ]);

        $postDate['user_id'] = Auth::user()->id;

        Expense::create($postDate);

        return redirect()->back();
    
    }

}

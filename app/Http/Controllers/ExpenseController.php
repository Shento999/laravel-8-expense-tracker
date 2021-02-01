<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ExpenseController extends Controller
{
    //

    private $expenseCategories; // use globaly in all function
    private $paymentMethods; // use globaly in all function
    private $rules = []; // use validation globaly

    public function __construct()
    {
        $this->expenseCategories = config('expense.expense_category');
        $this->paymentMethods = config('expense.payment_method');
        $this->rules = [
            'description' => ['required', 'min:5'],
            'date' => ['required', 'date'],
            'amount' => ['required', 'min:1'],
            'category' => ['required', Rule::in($this->expenseCategories)],
            'payment_method' => ['required', Rule::in($this->paymentMethods)]
        ];
    }

    public function index() {

        $userId = Auth::user()->id;

        $expenses = Expense::orderByDesc('id')
            ->where('user_id', $userId)
            ->paginate(5);

        return Inertia::render('Expenses/index', [
            'expenses' => $expenses,
        ]);
        
    }

    public function add() {

        return Inertia::render('Expenses/add/index', [
            'expense' => new Expense,
            'expenses' => $this->expenseCategories,
            'paymentMethods' => $this->paymentMethods,
        ]);
    
    }

    public function store(Request $request) {

        $postDate = $this->validate($request, $this->rules);

        $postDate['user_id'] = Auth::user()->id;

        Expense::create($postDate);

        return redirect()
            ->back()
            ->with('success', 'Expense added');
    
    }

    public function view(Expense $expense) {
        
        return Inertia::render('Expenses/view/index', [
            'expense' => $expense,
            'expenses' => $this->expenseCategories,
            'paymentMethods' => $this->paymentMethods,
        ]);

    }

    public function update(Request $request) {

        $this->rules['id'] = ['required', 'exists:expenses,id'];

        $postDate = $this->validate($request, $this->rules);

        $expenseId = $postDate['id'];
        unset($postDate['id']);
    
        Expense::where('id', $expenseId)
            ->update($postDate);
         
        return redirect()
        ->back()
        ->with('success', 'Expense updated');
        //return redirect()->route('expense.list');

    }

    public function delete(Expense $expense) {

        if($expense->user_id != Auth::user()->id) {
            abort(401, 'You can not delete the other user expense!');
        }

        $expense->delete();

        return redirect()->route('expense.list');

    }


}

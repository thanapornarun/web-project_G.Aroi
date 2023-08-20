<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use App\Models\Expense;
use App\Models\Event;
use Illuminate\Http\Request;

class BudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Budget $budget)
    {

        return view('budget.index', ['budget' => $budget]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Event $event)
    {
        return view('budget.create', ['event' => $event]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Event $event)
    {

        $request->validate(['budget' => ['required', 'decimal']]);

        $budget = new Event();
        $budget->budget = $request->get('budget');
        $budget->event_id = $event->id;
        $budget->balance = 0;
        $budget->save();
        return redirect()->route('budget.index');
    }

    /**
     * Display the specified resource.
     */
    public function showBudget(Budget $budget)
    {
        return view('budget.index', ['budget' => $budget]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Budget $budget)
    {
        return view('budget.edit', ['budget' => $budget]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Budget $budget)
    {
        $budget->budget = $request->get('budget');
        $budget->save();
        return redirect()->route('budget.index', ['budget' => $budget]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Budget $budget)
    {
        //
    }

    // Expense //
    public function createExpense(Budget $budget)
    {
        return route('budget.create-expense', ['budget' => $budget]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeExpense(Request $request, Budget $budget)
    {
        $expense_name =  $request->get('bill_name');
        $request->validate(['bill_name' => ['required', 'string', 'min:3', 'max:255']]);

        $expense_amount = $request->get('amount');
        $request->validate(['amount' => ['required', 'string', 'min:3', 'max:255']]);

        $expense = new Expense();
        $expense->bill_name = $expense_name;
        $expense->bill_path = $request->get('bill_path');
        $expense->amount = $request->get('amount');
        $expense->description = $request->get('description');
        $expense->expense_date = $request->get('date');

        $budget->expenses()->save($expense);
        return redirect()->route('budget.index', ['budget' => $budget]);
    }


    /**
     * Display the specified resource.
     */
    public function showExpense(Expense $expense)
    {
        return route('budget.expense-index', ['expense' => $expense]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function updateBalance(Request $request, Budget $budget)
    {
        $budget->balance = ($budget->balance) - ($request->get('amount'));
        $budget->save();

        return redirect()->rount('budget.index', ['budget' => $budget]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyExpense(Expense $expense, Budget $budget)
    {
        $expense->delete();

        return redirect()->route('budget.index', ['budget' => $budget]);
    }
}

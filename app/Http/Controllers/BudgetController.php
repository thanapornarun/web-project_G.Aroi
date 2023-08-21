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
    public function index(Event $event)
    {
        return view('budget.index', ['event' => $event]);
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
    public function show(Event $event,Budget $budget,Expense $expense)
    {
        //return $this->showExpense($event,$budget,$expense);
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
    public function createExpense(Event $event,Budget $budget)
    {
        return view('budget.create-expense', ['event'=>$event,'budget' => $budget]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeExpense(Request $request,Event $event,Budget $budget)
    {
        $expense_name =  $request->get('bill_name');
        $request->validate(['bill_name' => ['required', 'string', 'min:3', 'max:255']]);

        $expense_amount = $request->get('amount');
        $request->validate(['amount' => ['required', 'integer', 'min:5000']]);

        $expense_description =  $request->get('description');
        $request->validate(['description' => ['required', 'string', 'min:3', 'max:255']]);


        $expense = new Expense();
        $expense->bill_name = $expense_name;
        $expense->amount = $expense_amount;
        $expense->budget_id = $budget->id;
        $expense->description = $expense_description;
        $expense->expense_date = $request->get('date');
        $expense->bill_path = $request->get('bill_path');
        $expense->save();
        return redirect()->route('budget.index', ['event'=>$event]);
    }


    /**
     * Display the specified resource.
     */
    public function showExpense(Event $event,Budget $budget,Expense $expense)
    {
        
        return view('budget.show-expense', ['event'=>$event,'budget'=>$budget,'expense'=>$expense]);
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

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
        $allBudget = Budget::get();
        
        $budget = $allBudget->find(1);
        return view('budget.index', ['event' => $event, 'budget' => $budget]);
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

        $request->validate(['budget' => ['required', 'integer']]);

        $budget = new Event();
        $budget->budget = $request->get('budget');
        $budget->event_id = $event->id;
        $budget->balance = $request->get('budget');
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
        return view('budget.create-expense', ['event'=> $event,'budget' => $budget]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeExpense(Request $request,Event $event,Budget $budget)
    {
        $expense_name =  $request->get('bill_name');
        $request->validate(['bill_name' => ['required', 'string', 'min:3', 'max:255']]);

        $expense_amount = $request->get('amount');
        $request->validate(['amount' => ['required', 'integer']]);

        $expense_description =  $request->get('description');
        $request->validate(['description' => ['required', 'string', 'min:3', 'max:255']]);

    

        // if(is_NULL($request->get('bill_path'))){
        //     $imagePath = "istockphoto-889405434-612x612.jpg";
        // }

        // if(is_NULL($request->get('date'))){
        //     $date = "1111-11-11 11:11:11";
        // }

        

        $expense = new Expense();

        $expense->bill_name = $expense_name;
        $expense->amount = $expense_amount;
        $expense->budget_id = $budget->id;
        $expense->description = $expense_description;

// Check if date is provided, otherwise use default
        if(!(is_null($request->get('date')))){
            $expense->expense_date = $request->get('date');
        }

        if(!(is_null($request->file('image_path')))){
            $path = $request->file('image_path')->store('images', 'public');
            $expense->bill_path = $request->file('image_path');
        }

        
        
        

// Check if bill_path is provided, otherwise use default
    
        $expense->save();

        $budget->balance = ($budget->balance)-($expense_amount);
        $budget->save();
        
        return redirect()->route('budget.index', ['event'=>$event, 'budget' => $budget]);
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroyExpense(Expense $expense, Budget $budget)
    {
        $expense->delete();

        return redirect()->route('budget.index', ['budget' => $budget]);
    }
}

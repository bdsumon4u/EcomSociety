<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller {
    public function index() {
        $pageTitle = 'All Expenses';
        $expenses  = Expense::orderBy('id', 'desc')->paginate(getPaginate());
        return view('admin.expenses.index', compact('pageTitle', 'expenses'));
    }

    public function create() {
        return view('admin.expenses.create', [
            'pageTitle' => 'Add New Expense',
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'title'  => 'required|string',
            'amount' => 'required|numeric',
            'note'   => 'nullable|string',
            'expense_at'   => 'required|date',
        ]);

        Expense::create([
            'title'  => $request->title,
            'amount' => $request->amount,
            'note'   => nl2br($request->note),
            'expense_at'   => $request->expense_at,
        ]);

        $notify[] = ['success', 'Expense has been added successfully'];
        return to_route('admin.expenses.index')->withNotify($notify);
    }
}

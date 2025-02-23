<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mortgage;
use Illuminate\Http\Request;

class MortgageController extends Controller
{
    public function index()
    {
        $mortgages = Mortgage::all();
        return view('admin.mortgages.index', compact('mortgages'));
    }

    public function create()
    {
        return view('admin.mortgages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'is_active' => 'boolean',
            'description' => 'nullable|string',
            'percent' => 'required|integer|max:40',
            'min_first_payment' => 'required|integer|max:98',
            'max_price' => 'required|numeric',
            'min_price' => 'required|numeric|lt:max_price', // Проверка, что min_price меньше max_price
            'min_term' => 'required|integer',
            'max_term' => 'required|integer|gt:min_term', // Проверка, что max_term больше min_term
        ]);

        try {
            Mortgage::create($request->all());
            return redirect()->route('admin.mortgages.index')->with('success', 'Ипотека успешно создана!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Ошибка при создании ипотеки: ' . $e->getMessage()]);
        }
    }

    public function show(Mortgage $mortgage)
    {
        return view('admin.mortgages.show', compact('mortgage'));
    }

    public function edit(Mortgage $mortgage)
    {
        return view('admin.mortgages.edit', compact('mortgage'));
    }

    public function update(Request $request, Mortgage $mortgage)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'is_active' => 'boolean',
            'description' => 'nullable|string',
            'percent' => 'required|integer|max:40',
            'min_first_payment' => 'required|integer|max:98',
            'max_price' => 'required|numeric',
            'min_price' => 'required|numeric|lt:max_price', // Проверка, что min_price меньше max_price
            'min_term' => 'required|integer',
            'max_term' => 'required|integer|gt:min_term', // Проверка, что max_term больше min_term
        ]);

        try {
            $mortgage->update($request->all());
            return redirect()->route('admin.mortgages.index')->with('success', 'Ипотека успешно обновлена!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Ошибка при обновлении ипотеки: ' . $e->getMessage()]);
        }
    }

    public function destroy(Mortgage $mortgage)
    {
        try {
            $mortgage->delete();
            return redirect()->route('admin.mortgages.index')->with('success', 'Ипотека успешно удалена!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Ошибка при удалении ипотеки: ' . $e->getMessage()]);
        }
    }
}

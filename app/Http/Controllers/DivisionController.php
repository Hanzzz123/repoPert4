<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Division;

class DivisionController extends Controller
{
    public function index()
    {
        $divisions = Division::all();
        return view('pages.division', compact('divisions'));
    }

    public function create()
    {
        return view('divisions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Division::create($request->all());

        // Mengarahkan kembali ke halaman divisions.index
        return redirect()->route('divisions.index')->with('success', 'Division created successfully.');
    }

    public function edit($id)
    {
        $division = Division::find($id);
        return view('divisions.edit', compact('division'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $division = Division::find($id);
        $division->update($request->all());

        // Mengarahkan kembali ke halaman divisions.index
        return redirect()->route('divisions.index')->with('success', 'Division updated successfully.');
    }

    public function destroy($id)
    {
        $division = Division::find($id);
        $division->delete();

        // Mengarahkan kembali ke halaman divisions.index
        return redirect()->route('divisions.index')->with('success', 'Division deleted successfully.');
    }
}

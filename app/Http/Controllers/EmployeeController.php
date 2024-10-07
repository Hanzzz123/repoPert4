<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Division;  // Tambahkan Division

class EmployeeController extends Controller
{
    protected $employee;

    public function __construct()
    {
        $this->employee = new Employee();
    }

    // Menampilkan list semua employee
    public function index()
    {
        $response['employees'] = $this->employee->with('division')->get();  // Sertakan relasi division
        return view('pages.index')->with($response);
    }

    // Menampilkan form untuk membuat employee baru
    public function create()
    {
        $response['divisions'] = Division::all();  // Ambil data division untuk dropdown
        return view('pages.create')->with($response);
    }

    // Menyimpan employee baru
    public function store(Request $request)
    {
        // Validasi request termasuk division_id
        $validatedData = $request->validate([
            'emp_name' => 'required|string|max:255',
            'dob' => 'required|date',
            'phone' => 'required|string|max:15',
            'division_id' => 'required|exists:divisions,id',  // Validasi division_id
        ]);

        // Simpan data employee
        $this->employee->create($validatedData);

        return redirect()->back()->with('success', 'Employee registered successfully!');
    }

    // Menampilkan form edit employee
    public function edit(string $id)
    {
        $response['employee'] = $this->employee->find($id);
        $response['divisions'] = Division::all();  // Ambil data division untuk dropdown
        return view('pages.edit')->with($response);
    }

    // Update employee yang sudah ada
    public function update(Request $request, string $id)
    {
        // Validasi request termasuk division_id
        $validatedData = $request->validate([
            'emp_name' => 'required|string|max:255',
            'dob' => 'required|date',
            'phone' => 'required|string|max:15',
            'division_id' => 'required|exists:divisions,id',  // Validasi division_id
        ]);

        // Update employee
        $employee = $this->employee->find($id);
        $employee->update($validatedData);

        return redirect('employee')->with('success', 'Employee updated successfully!');
    }

    // Hapus employee
    public function destroy(string $id)
    {
        $employee = $this->employee->find($id);
        $employee->delete();
        return redirect('employee');
    }
}

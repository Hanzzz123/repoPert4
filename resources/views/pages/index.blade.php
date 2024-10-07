@extends('layouts.app')

@section('content')

    <div class="container">
        <h3 align="center" class="mt-5">Employee Management</h3>

        <div class="row justify-content-center">
            <div class="col-md-8">

                <!-- Card for Form -->
                <div class="card mt-4">
                    <div class="card-header bg-info text-white">
                        <h4>Register New Employee</h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('employee.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Employee Name</label>
                                    <input type="text" class="form-control" name="emp_name" placeholder="Enter Name" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Employee DOB</label>
                                    <input type="date" class="form-control" name="dob" required>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" name="phone" placeholder="Enter Phone Number" required>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-12 text-center">
                                    <input type="submit" class="btn btn-info" value="Register" required>
                                </div>
                            </div>

                            <div class="row mt-5">
                            <div class="col-md-12">
                                <label>Division</label>
                                <select class="form-control" name="division_id" required>
                                    <option value="">Select Division</option>
                                    @foreach ($divisions as $division)
                                        <option value="{{ $division->id }}">{{ $division->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Table for Employees -->
                <table class="table table-striped table-hover mt-5">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Employee Name</th>
                        <th scope="col">DOB</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ( $employees as $key => $employee )
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $employee->emp_name }}</td>
                            <td>{{ $employee->dob }}</td>
                            <td>{{ $employee->phone }}</td>
                            <td>{{ $employee->division }}</td>
                            <td>
                                <!-- Edit Button -->
                                <a href="{{ route('employee.edit', $employee->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fa fa-pencil-square-o"></i> Edit
                                </a>

                                <!-- Delete Button -->
                                <form action="{{ route('employee.destroy', $employee->id) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fa fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

@endsection

@push('css')
    <style>
        .card-header {
            font-weight: bold;
            text-align: center;
        }
        .form-area {
            padding: 20px;
            margin-top: 20px;
            background-color: #FFFFE0;
        }
        /* Form input style */
        .form-control {
            border-radius: 5px;
        }
        /* Button styles */
        .btn-info {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary {
            margin-right: 10px;
        }
        /* Table Row Hover */
        .table-hover tbody tr:hover {
            background-color: #f2f2f2;
        }
    </style>
@endpush

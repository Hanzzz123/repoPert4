@extends('layouts.app')

@section('content')

    <div class="container">
        <h3 align="center" class="mt-5">Division Management</h3>

        <div class="row justify-content-center">
            <div class="col-md-8">

                <!-- Card for Form -->
                <div class="card mt-4">
                    <div class="card-header bg-success text-white">
                        <h4>Add New Division</h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('division.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Division Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter Division Name" required>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-12 text-center">
                                    <input type="submit" class="btn btn-success" value="Add Division" required>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Table for Divisions -->
                <table class="table table-striped table-hover mt-5">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Division Name</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ( $divisions as $key => $division )
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $division->name }}</td>
                            <td>
                                <!-- Edit Button -->
                                <a href="{{ route('division.edit', $division->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fa fa-pencil-square-o"></i> Edit
                                </a>

                                <!-- Delete Button -->
                                <form action="{{ route('division.destroy', $division->id) }}" method="POST" style="display:inline">
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
            background-color: #E0FFE0;
        }
        /* Form input style */
        .form-control {
            border-radius: 5px;
        }
        /* Button styles */
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
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

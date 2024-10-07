
<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DivisionController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource("/employee", EmployeeController::class);
Route::resource("/division", DivisionController::class); // Menambahkan titik koma

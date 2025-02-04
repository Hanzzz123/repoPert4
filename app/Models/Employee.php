<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';
    protected $primaryKey = 'id';
    protected $fillable = [
        'emp_name',
        'dob',
        'phone',
        'division_id',  // Tambahkan division_id sebagai fillable
    ];

    public function division()
    {
        return $this->belongsTo(Division::class);
    }
}

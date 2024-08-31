<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id', 'clock_out_time',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}

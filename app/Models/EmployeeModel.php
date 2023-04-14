<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeModel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'karyawan';
    protected $fillable = [
        'nama_karyawan',
        'nip',
        'jabatan',
        'departemen',
        'tanggal_lahir',
        'alamat',
        'telepon',
        'agama',
        'status',
        'profile',
    ];
}

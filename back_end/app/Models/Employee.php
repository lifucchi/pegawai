<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Ensure to import this


class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'nip',
        'nama',
        'tempatlahir',
        'alamat',
        'tanggallahir',
        'kelamin',
        'npwp',
        'nohp',
        'unitkerja',
        'tempattugas',
        'namajabatan',
        'foto',
        'echelon_id',
        'group_id',
    ];

    protected $casts = [
        'tanggallahir' => 'date',
    ];

    public function echelon()
    {
        return $this->belongsTo(Echelon::class);
    }

    /**
     * Get the group associated with the employee.
     */
    public function group()
    {
        return $this->belongsTo(Group::class);
    }

}

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
        'religion_id'
    ];

    protected $casts = [
        'tanggallahir' => 'date',
    ];

    public function echelon(): BelongsTo
    {
        return $this->belongsTo(Echelon::class, 'echelon_id');
    }

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class, 'group_id');
    }

    public function religion(): BelongsTo
    {
        return $this->belongsTo(Religion::class, 'religion_id');
    }

}

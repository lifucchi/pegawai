<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Ensure to import this
use Illuminate\Database\Eloquent\Relations\HasMany; // Ensure to import this


class Group extends Model
{
    use HasFactory;
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'golongan', 'echelon_id'
    ];
    public function echelons(): BelongsTo
    {
        return $this->belongsTo(Echelon::class,'echelon_id');
    }
    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }

    
}
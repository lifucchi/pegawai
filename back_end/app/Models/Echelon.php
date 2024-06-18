<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany; // Ensure to import this
  
class Echelon extends Model
{
    use HasFactory;
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'eselon'
    ];
    public function groups(): HasMany
    {
        return $this->hasMany(Group::class, 'echelon_id');
    }

    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }

}
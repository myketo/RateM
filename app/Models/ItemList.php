<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemList extends Model
{
    use HasFactory;

    protected $table = "lists";
    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'name', 
        'description', 
        'type', 
        'cover',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

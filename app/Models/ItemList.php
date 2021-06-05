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
        'name', 
        'description', 
        'type', 
        'image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

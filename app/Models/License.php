<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'script',
        'ip',
        'status',
        'variables',
        'owner',
        'deadline'
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'owner');
    }

    public function script()
    {
        return $this->belongsTo(Script::class, 'script');
    }
}

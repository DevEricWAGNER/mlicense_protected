<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Script extends Model
{
    use HasFactory;

    protected $fillable = [
        'script',
        'webhook',
        'status',
        'variables',
        'owner',
        'serverside'
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'owner');
    }

    public function getLicenses()
    {
        return $this->hasMany(License::class, 'script');
    }

}

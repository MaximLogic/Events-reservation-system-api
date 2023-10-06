<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Filterable;

class Event extends Model
{
    use HasFactory;
    use Filterable;

    protected $table = 'events';
    protected $guarded = false;

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}

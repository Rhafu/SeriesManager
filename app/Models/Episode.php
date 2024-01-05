<?php

namespace App\Models;

use App\Http\Controllers\SeriesController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;

    public function season()
    {
        return $this->belongsTo(Season::class);
    }

    public function series()
    {
        return $this->belongsTo(Serie::class);
    }
}

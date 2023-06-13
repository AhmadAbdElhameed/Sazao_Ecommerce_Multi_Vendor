<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    const PATH = "uploads/sliders";
    protected $fillable = ['banner', 'type', 'title', 'starting_price', 'btn_url', 'serial', 'status'];

}

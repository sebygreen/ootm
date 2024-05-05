<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Synopsis extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ["year", "link"];
}

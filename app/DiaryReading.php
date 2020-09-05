<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiaryReading extends Model
{
    const UPLOAD_PATH = "diaries";

    protected $fillable = [
        "day", "month", "year", "date",
        "psalms", "reading_one", "reading_two",
        "reading_text", "name"
    ];
}

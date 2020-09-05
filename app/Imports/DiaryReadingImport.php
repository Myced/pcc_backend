<?php

namespace App\Imports;

use App\DiaryReading;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;

class DiaryReadingImport implements ToModel
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        //check if that reading exist.. and update it. 
        $date = $row[3];

        $diaryReading = DiaryReading::where('date', $date)->first();

        if( ! is_null($diaryReading) )
        {
            //update the diary content and return 
            $diaryReading->day = $row[0];
            $diaryReading->month = $row[1];
            $diaryReading->year = $row[2];
            $diaryReading->psalms = $row[4];
            $diaryReading->reading_one = $row[5];
            $diaryReading->reading_two = $row[6];
            $diaryReading->reading_text = $row[7];
            $diaryReading->name = $row[8];

            $diaryReading->save();

            return null;
        }

        return new DiaryReading([
            'day' => $row[0],
            'month' => $row[1],
            'year' => $row[2],
            'date' => $row[3],
            'psalms' => $row[4],
            'reading_one' => $row[5],
            'reading_two' => $row[6],
            'reading_text' => $row[7],
            'name' => $row[8]
        ]);
    }
   
}

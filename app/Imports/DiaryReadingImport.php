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
        $day = $this->getDoubleDigit($row[0]);;
        $month = $this->getDoubleDigit($row[1]);;
        $year = $row[2];

        $date = $day . '/' . $month . '/' . $year;

        if($row[1] == null)
            return;

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
            'day' => (int) $row[0],
            'month' => (int) $row[1],
            'year' => (int) $row[2],
            'date' => $date,
            'psalms' => $row[4],
            'reading_one' => $row[5],
            'reading_two' => $row[6],
            'reading_text' => $row[7],
            'name' => $row[8]
        ]);
    }

    private function getDoubleDigit($string)
    {
        if(strlen($string) == 1)
        {
            return "0" . $string;
        }

        return $string;
    }
   
}

<?php 
namespace App\Http\Controllers\Api;

use App\DiaryYear;
use App\Http\Controllers\Controller;

class DiaryController extends Controller
{
	public function diaryYears()
	{
		$diaryYears = DiaryYear::all();

		return response()->json($diaryYears, 200);
	}

	public function diaryDetail($year)
	{
		$diaryYear =  DiaryYear::where('year', $year)->first();

		return response()->json($diaryYear, 200);
	}
}
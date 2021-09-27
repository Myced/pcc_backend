<?php

namespace App\Http\Controllers;

use Excel;
use App\DiaryYear;
use App\DiaryReading;
use App\PurchaseItem;
use App\Utils\DateUtil;
use Illuminate\Http\Request;
use App\Imports\DiaryReadingImport;

class DiaryController extends Controller
{
    public function manageYears()
    {
        //get the diary years. 
        $diaryYears = DiaryYear::latest()->get();

        return view('diary.manage_years', compact('diaryYears'));
    }

    public function store(Request $request)
    {
        //get the values 
        $year = $request->year;
        $isAvailable = isset($request->is_available) ? true : false;

        if( $this->yearExists($year) )
        {
            $message = "The " . $year . " diary year exists already";

            session()->flash('warning', $message);

            return back();
        }

        //the year does not exists.. so save it to the database. 
        $diaryYear = new DiaryYear;

        $diaryYear->year = $year;
        $diaryYear->is_available = $isAvailable;

        if($isAvailable)
        {
            $diaryYear->available_date = now()->format(DateUtil::DATE_TIME_FORMAT);
        }

        $diaryYear->save();

        $this->addPurchaseItem($diaryYear);

        session()->flash('success', $diaryYear->year . "diary has been added successfully");

        return back();
    }

    private function yearExists($year)
    {
        //check if this year exist 
        $result = DiaryYear::where('year', $year)->first();

        if($result == null)
            return false; 

        return true;
    }

    public function activateYear($year)
    {
        $diary = DiaryYear::where('year', $year)->first();
        
        $diary->is_available = true;
        $diary->save();

        session()->flash('success', "Diary for " . $year . " is now available");

        return back();
    }

    public function deactivateYear($year)
    {
        $diary = DiaryYear::where('year', $year)->first();
        
        $diary->is_available = false;
        $diary->save();

        session()->flash('info', "Diary for " . $year . " is now Unavailable");

        return back();
    }

    public function detail($year)
    {
        $diaryYear = DiaryYear::where('year', $year)->first();
        $readings = DiaryReading::where('year', $year)->get();

        return view('diary.detail', compact('diaryYear', 'readings'));
    }

    public function uploadDiary(Request $request, $year)
    {
        $file = $request->diary;

        
        $file_name = time() . $file->getClientOriginalName();
        $path = 'storage/' . $file->storePublicly(DiaryReading::UPLOAD_PATH);

        Excel::import(new DiaryReadingImport, public_path($path));

        $diaryYear = DiaryYear::where('year', $year)->first();
        $diaryYear->content_uploaded = true;
        $diaryYear->save();

        session()->flash('success', "Diary " . $year . " Uploaded successfully");

        return back();
    }

    private function addPurchaseItem($diaryYear)
    {
        $purchaseItem = new PurchaseItem;
        
        $purchaseItem->name = "Church Diary " . $diaryYear->year;
        $purchaseItem->type = PurchaseItem::ITEM_DIARY;
        $purchaseItem->item_id = $diaryYear->id;
        $purchaseItem->item_code = "DIARY-" . $diaryYear->year;

        $purchaseItem->save();

        //update the diary year 
        $diaryYear->purchase_item_id = $purchaseItem->id; 
        $diaryYear->save();

        return ;
    }
}

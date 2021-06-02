<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Publisher;
use App\Models\BookField;

use DB;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function saveImportBooks(Request $request){
        // dd($request->all());
        DB::beginTransaction();
        try{
            $isExistPub = Publisher::where('PNAME', $request->publisher)->exists();
            if(!$isExistPub)
                Publisher::insert([
                    'PNAME' => $request->publisher
            ]);
            $isExistAuthor = DB::table('author')->where('ID', $request->author)->exists();
            if(!$isExistAuthor)
                Author::insert([
                        'ID' => $request->author
            ]);    
            Book::insert([
                'ISBN' => $request->isbn,
                'TITLE' => $request->title,
                'PRICE' => $request->price,
                'PUBLISHER_NAME' => $request->publisher,
                'AUTHOR_ID' =>$request->author,
                'IMAGE_URL' => $request->image,
            ]);
            BookField::insert([
                'ISBN' =>  $request->isbn,
                'BFIELD' => $request->field
            ]);
            DB::commit();
            return response()->json(['status' => 1]);
        }catch(\Exception$e){
            DB::rollBack();
            \Log::info($e);
            return response()->json(['status' => 0]);
        }
    }
    public function saveImportWH(Request $request){
        DB::beginTransaction();
        try{
            DB::statement('call updateExImport(?,?,?,?,?,?)', [$request->WH, $request->EID,$request->Im_Qty,$request->Ex_Qty,$request->ISBN_up,$request->Date_im_ex]);
            DB::commit();
            return response()->json(['status' => 1]);}
        catch(\Exception$e){
            \Log::info($e);
            DB::rollBack();
            return response()->json(['status' => 0]);
        }
    }
        public function processTransaction(Request $request){
            DB::beginTransaction();
            try{
                DB::statement('call updateTransaction(?,?,?)', [$request->pdate, $request->id,$request->status_in]);
                DB::commit();
                return response()->json(['status' => 1]);}
            catch(\Exception$e){
                    DB::rollBack();
                    return response()->json(['status' => 0]);
                }
            }


    public function getAllIsbn(Request $request){
        return DB::select('call viewAllISBN(?)', [$request->dateneed]);}
    public function getSumOfISBN(Request $request){
        return DB::select('call viewSumOfISBN(?)', [$request->dateneed]);
    }
    public function getSumOfTradi(Request $request){
        return DB::select('call viewSumOfTradi(?)', [$request->dateneed]);
    }
    public function getSumOfEbookBuy(Request $request){
        return DB::select('call viewSumOfEbookBuy(?)', [$request->dateneed]);
    }
    public function getSumOfEbookBorrow(Request $request){
        return DB::select('call viewSumOfEbookBorrow(?)', [$request->dateneed]);
    }
    public function getAuListDate(Request $request){
        return DB::select('call viewAuListDate(?)', [$request->dateneed]);
    }
    public function getAuListMonth(Request $request){
        return DB::select('call viewAuListMonth(?,?)', [$request->monthneed, $request->yearneed]);
    }
    public function getBookListMonth(Request $request){
        return DB::select('call viewBookListMonth(?,?)', [$request->monthneed, $request->yearneed]);
    }
    public function getTransactionCreditDay(Request $request){
        return DB::select('call viewTransactionCreditDay(?)', [$request->dateneed]);
    }
    public function getErrorTransactionDay(Request $request){
        return DB::select('call viewErrorTransactionDay(?)', [$request->dateneed]);
    }
    public function getWHhaveISBNlessthanN(Request $request){
        return DB::select('call viewWHhaveISBNlessthanN(?,?)', [$request->ISBN,$request->N]);
    }
    public function getWHExportMost(Request $request){
        return DB::select('call WHExportMost(?,?)', [$request->from_time, $request->next_time]);
    }

    public function getDSSach_MuaTrongThang(Request $request){
        return DB::select('call DSSach_MuaTrongThang(?,?,?)', [$request->id,$request->start_date, $request->end_date]);
    }
    public function getDSSach_GiaoDichTrongThang(Request $request){
        return DB::select('call DSSach_GiaoDichTrongThang(?,?,?)', [$request->id,$request->start_date, $request->end_date]);
    }
    public function getDSSach_SuCoTrongThang(Request $request){
        return DB::select('call DSSach_SuCoTrongThang(?,?,?)', [$request->id,$request->start_date, $request->end_date]);
    }
    public function getDSSach_ChuaHoanThanh(Request $request){
        return DB::select('call DSSach_ChuaHoanThanh(?)', [$request->id]);
    }
    public function getSumByField(Request $request){
        return DB::select('call SumByField(?,?,?)', [$request->id,$request->from_time, $request->next_time]);
    }
    public function getTransactionHaveMostBook(Request $request){
        return DB::select('call TransactionHaveMostBook(?,?,?)', [$request->id,$request->from_time, $request->next_time]);
    }
    public function getTransactionhaveboth(Request $request){
        return DB::select('call viewTransactionhaveboth(?,?,?)', [$request->id,$request->from_time, $request->next_time]);
    }
}

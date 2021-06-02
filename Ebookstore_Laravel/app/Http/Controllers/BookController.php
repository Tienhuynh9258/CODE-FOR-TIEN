<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use DB;

class BookController extends Controller
{
    public function getAllBook(){
        $books = Book::select('*')->paginate(6);
        return view('index', ['books' => $books]);
    }
    // ii4
    public function getAllByCategory(Request $request){
        return DB::select('call DSSach_Theloai(?)', [$request->bfield]);
    }

    public function getAllByAuthor(Request $request){
        return DB::select('call DSSach_tacgia(?)', [$request->aname]);
    }

    public function getAllByPublishYear(Request $request){
        return DB::select('call DSSach_NamXuatBan(?)', [$request->pyear]);
    }

    public function getAllAuthorByCate(Request $request){
        return DB::select('call DSSach_TacGiaCungTheLoai(?)', [$request->bfield]);
    }

    public function getAllByKey(Request $request){
        return DB::select('call DSSach_tukhoa(?)', [$request->keyword]);
    }
    public function payment(Request $request){
        DB::beginTransaction();
        // $arrBookInTrans = [];
        // $arrBookTrans = [];
        try{
            // foreach($request->books as $book){

            //     $arrBookInTrans[] = [
            //         'CID' => $book['cid'],
            //         'PURCHASED_DATE' => date('Y-m-d H:i:s'),
            //         'ISBN' => $book['isbn'],
            //         'QTY' => $book['total'],
            //         'TRANS_TYPE' => 'BUY'
            //     ];
            //     $arrBookTrans[] = [
            //         'CID' => $book['cid'],
            //         'PURCHASED_DATE' =>  date('Y-m-d H:i:s'),
            //         'TRANS_STATUS' => 'WAITING',
            //         'TOTAL' => $price
            //     ];
            // }
            // DB::table('book_in_transaction')->insert($arrBookInTrans);
            // DB::table('book_transaction')->insert($arrBookTrans);
            $isbn = str_pad($request->isbn, 14 - strlen(strval($request->isbn)), '0', STR_PAD_LEFT);
            $price = DB::table('book')->select('PRICE')->where('ISBN', $isbn)->first()->PRICE;
            DB::table('book_transaction')->insert([
                'ISBN' => $isbn,
                'CID' => $request->cid,
                'PURCHASED_DATE' =>  date('Y-m-d H:i:s'),
                'TRANS_STATUS' => 'WAITING',
                'TOTAL' => round($price * $request->total)
            ]);
            DB::table('book_in_transaction')->insert([
                'CID' => $request->cid,
                'PURCHASED_DATE' => date('Y-m-d H:i:s'),
                'ISBN' => $isbn,
                'QTY' => $request->total,
                'TRANS_TYPE' => 'BUY'
            ]);
            DB::commit();
            return response()->json(['status' => 1]);
        }catch(\Exception $e){
            \Log::info($e);
            DB::rollBack();
            return response()->json(['status' => 0]);
        }
    }


}

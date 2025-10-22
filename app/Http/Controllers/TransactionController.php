<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    // Menampilkan semua data
    public function index(){
        $transaction= Transaction::with('user','book')->get();

        if($transaction->isEmpty()){
            return response()->json([
                "succes"=>true,
                "message"=> "Resource data not found"
            ],200);
        }
        
        return response()->json([
            "succes"=> true,
            "message"=>"Get all resources",
            "data"=> $transaction
        ],200);
        
    }

    // Menampilkan data berdasarkan id
     public function show(string $id){
        $transaction= Transaction::with('user','book')->find($id);

        if(!$transaction){
            return response()->json([
                "succes"=>false,
                "message"=> "Resource data not found"
            ],404);
        }
        
        return response()->json([
            "succes"=> true,
            "message"=>"Get resources successfully",
            "data"=> $transaction
        ],200);
        
    }

    // Menambahkan data
    public function store(Request $request){
        // Validator dan Cek Validator
            $validator = Validator::make($request->all(),[
                'book_id'=>'required|exists:books,id',
                'quantity'=>'required|integer|min:1'
            ]);

            if($validator->fails()){
                return response()->json([
                    'success'=>false,
                    'message'=> 'Validation error',
                    'data'=>$validator->errors()
                ],422);
            }

        // Generate ordernumber -> unique | ORD-0003

             $uniqueCod = "ORD-". strtoupper(uniqid());

        // Ambil user yang sedang login & cek login (apakah ada data user?)

             $user = auth('api')->user();

             if(!$user){
                return response()->json([
                    'success'=>false,
                    'message'=>'Unauthorized'
                ],401);
             }

        // Mencari data buku dari request

            $book = Book::find($request->book_id);
            if  (!$book){
                return response()->json([
                    'success'=>false,
                    'message'=>'Book not found'
                ],404);
            }

        // cek stok buku

           if($book->stok < $request->quantity){
            return response()->json([
                'success'=> false,
                'message'=>'Stok barang tidak cukup'
            ],400);
           }

        // hitung total harga
            
             $totalAmount = $book->price * $request->quantity;

        // kurangi stok buku(update)
            
            $book->stok -= $request->quantity;
            $book->save();

        // simpan data transaksi

        $transaction = Transaction::create([
            'order_number'=> $uniqueCod,
            'customer_id'=> $user->id,
            'book_id'=> $request->book_id,
            'total_amount'=>$totalAmount
        ]);

        return response()->json([
            'success'=>true,
            'message'=>'transaction created successfully',
            'data'=>$transaction
        ],201);
    }

    // Update data transaksi
        public function update(Request $request, string $id){
            // cek transaksi
            $transaction = Transaction::find($id);
            if(!$transaction){
                return response()->json([
                    'success'=>false,
                    'message'=> 'Resource Not Found'
                ],404);
            }
        
            // Validasi input
            $validator = Validator::make($request->all(),[
                'book_id'=> 'required|exists:books,id',
                'quantity'=>'required|integer|min:1'
            ]);

            // Cek validasi
            if($validator->fails()){
                return response()->json([
                    'success'=>false,
                    'message'=> 'Validation error',
                    'data'=> $validator->errors()
                ],422);
            }

            // Ambil data buku
            $book = Book::find($request->book_id);

            if(!$book){
                return response()->json([
                    'success'=>false,
                    'message'=> 'Book not Found'
                ],404);
            }

            // Hitung total harga baru
            $totalAmount = $book->price * $request->quantity;

            // update data transaksi
            $data = [
                'book_id' => $request->book_id,
                'total_amount'=> $totalAmount,
            ];

            $transaction->update($data);
                return response()->json([
                    'success'=>true,
                    'message'=> 'Resource updated succesfully',
                    'data'=>$transaction

                ],200);
        }

        // Menghapus data transaksi
        public function destroy(Request $request, string $id){
            $transaction = Transaction::find($id);

            if(!$transaction){
                return response()->json([
                    'success'=>false,
                    'message'=> 'Resource Not Found'
                ],404);
            }

            // Hapus transaksi
            $transaction->delete();

            return response()->json([
                'success'=>true,
                'message'=> 'Delete message successfully'
            ],200);

        
        }

}
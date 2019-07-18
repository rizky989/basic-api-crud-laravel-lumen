<?php

namespace App\Http\Controllers;
use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index(){
        $item = Item::all();
        if($item){
            return response()->json([
                'error'=>false,
                'message'=>'sucess',
                'data'=>$item,
                ],200);
        } else{
            return response()->json([
                'error'=>true,
                'message'=>'fail',
                ],404);
        }
    }

    public function store(Request $request){
        $item = new Item;
        $item->nama = $request->nama;
        $item->harga = $request->harga;
        $item->jumlah = $request->jumlah; 
        $item->deskripsi = $request->deskripsi;
        $item->detail = $request->detail;
        //foto

        $item->save();

        if($item){
            return response()->json([
                'error'=>false,
                'message'=>'success',
                'data'=>$item,
                ],201);
        } else{
            return response()->json([
                'error'=>true,
                'message'=>'fail',
                ],404);
        }
    }

    public function show($id){
        $item = Item::find($id);
        if($item){
            return response()->json([
                'error'=>false,
                'message'=>'sucess',
                'data'=>$item,
                ],200);
        } else{
            return response()->json([
                'error'=>true,
                'message'=>'fail',
                ],404);
        }
    }
    public function update(Request $request,$id){
        $item = Item::find($id);
        $item->nama = $request->nama;
        $item->harga = $request->harga;
        $item->jumlah = $request->jumlah; 
        $item->deskripsi = $request->deskripsi;
        $item->detail = $request->detail;
        //foto

        $item->save();
        if($item){
            return response()->json([
                'error'=>false,
                'message'=>'sucess',
                'data'=>$item,
                ],200);
        } else{
            return response()->json([
                'error'=>true,
                'message'=>'fail',
                ],404);
        }
    }
    public function destroy($id){
        $item = Item::find($id);
        if($item){
            $item->delete();
            return response()->json([
                'error'=>false,
                'message'=>'data deleted',
                'data'=>$item,
                ],204);
        } else{
            return response()->json([
                'error'=>true,
                'message'=>'failed to delete data',
                ],404);
        }
    }
    //
}

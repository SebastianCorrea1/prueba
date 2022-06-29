<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sellProduct;
use DB;
use Config;
use Exception;
use Log;

class SellProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $params = $request->all();
        date_default_timezone_set('America/New_York');
        $now = time(); //Actual Time
        $currentDate = date("Y-m-d H:i:s", $now);

        if(isset($params['product_id']) && !empty($params['product_id']))
        {
            $product_id = $params['product_id'];
            $product = DB::table('product')->where('id', $product_id)->first();
        }
        if(isset($params['amountToSell']) && !empty($params['amountToSell']))
        {
            $amountToSell = $params['amountToSell'];
        }

        if(null !== $product)
        {
            $count = $product->stock - $amountToSell;
            if($count < 0)
            {
                return response()->json(['success' => false, 'message' => 'No es posible realizar la venta, porque no esta esa cantidad en el stock']);
            }
            else
            {
                $sellProduct = new sellProduct;
                $sellProduct->product_id = $product_id;
                $sellProduct->amount_to_sell = $amountToSell;
                $sellProduct->created_at = $currentDate;
                $sellProduct->updated_at = $currentDate;

                $product = DB::table('product')->where('id', $product_id)->update(['stock'=> $count]);

            }
        }



        if(false== $sellProduct->save())
        {   
            DB::rollback();
            return response()->json([], self::STATUS_INTERNAL_SERVER_ERROR);
        }
        $product = DB::table('product')->get();
        $records =[];
        foreach ($product as $products)
        {
            $records[] = $products;
        }

        return view('init', ['record'=> $records]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

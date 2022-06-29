<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Config;
use Exception;
use Log;
use App\createProduct;

class CreateProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('createProduct');
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

            if(isset($params['name']) && !empty($params['name']))
            {
                $name = $params['name'];
            }
            if(isset($params['reference']) && !empty($params['reference']))
            {
                $reference = $params['reference'];
            }
            if(isset($params['price']) && !empty($params['price']))
            {
                $price = $params['price'];
            }
            if(isset($params['weight']) && !empty($params['weight']))
            {
                $weight = $params['weight'];
            }
            if(isset($params['category']) && !empty($params['category']))
            {
                $category = $params['category'];
            }
            if(isset($params['stock']) && !empty($params['stock']))
            {
                $stock = $params['stock'];
            }

            $newProduct = new createProduct;
            $newProduct->name = $name;
            $newProduct->reference = $reference;
            $newProduct->price = $price;
            $newProduct->weight = $weight;
            $newProduct->category = $category; 
            $newProduct->stock = $stock;
            $newProduct->created_at = $currentDate;
            $newProduct->updated_at = $currentDate;

            if(false== $newProduct->save())
            {   
                DB::rollback();
                return response()->json([], self::STATUS_INTERNAL_SERVER_ERROR);
            }
        return view('createProduct');
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

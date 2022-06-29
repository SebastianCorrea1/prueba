<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class InitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = DB::table('product')->get();
        $records =[];
        foreach ($product as $products)
        {
            $records[] = $products;
        }

        return view('init', ['record'=> $records]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

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
    public function edit( $id)
    {
        $product = DB::table('product')->where('id', $id)->first();
        return view('editProduct', ['record'=> $product]);
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

        if(isset($id) && !empty($id))
        {
            $product = DB::table('product')
                            ->where('id', $id)
                            ->update(['name' => $name, 'reference' => $reference,'price' => $price,'weight'=> $weight,'category'=>$category,'stock'=> $stock,'updated_at' => $currentDate]);
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = DB::table('product')->where('id',$id);
        $products =$product->delete();

        if(null === $products)
        {
            return response()->json(['success' => false, 'message' => 'No se encontro el item'], self::STATUS_NOT_FOUND);
        }
        
        $product = DB::table('product')->get();
        $records =[];
        foreach ($product as $products)
        {
            $records[] = $products;
        }

        return view('init', ['record'=> $records]);
    }
}

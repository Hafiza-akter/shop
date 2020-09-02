<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Supplier;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier = Supplier::where('status',1)->orderBy('id','DESC')->paginate(5);
        return view('supplier/list',compact('supplier'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supplier/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
                'name'=> 'required',
                'address'=> 'required',

        ]);

        $supplier = new Supplier();
        $supplier->name = $request->input('name');
        $supplier->address = $request->input('address');
        $supplier->status = 1;
        $supplier->save();
        return redirect()->route('supplierList')->with('message','Supplier added successfully!');

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
        $supplier = Supplier::where('id',$id)->first();
        return view('supplier/edit',compact('supplier'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validation = $request->validate([
                'name'=> 'required',
                'address'=> 'required',

        ]);

        $supplier = Supplier::where('id',$request->id)->first();
        $supplier->name = $request->input('name');
        $supplier->address = $request->input('address');
        $supplier->save();
        return redirect()->route('supplierList')->with('message','Supplier added successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $supplier = Supplier::where('id',$id)->first();
       $supplier->status = 0;
       $supplier->save();
       return redirect()->route('supplierList')->with('message','Supplier delete successfully!');
    }
}

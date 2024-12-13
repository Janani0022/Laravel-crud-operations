<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use  App\Models\Items;
use Hash;
use Session;

class InventoryController extends Controller
{

    
    // Pass data to database
    public function indexadd(Request $request){
        $request->validate([
            'item'=>'required',
            'name'=>'required',
            'category'=>'required',
            'supplier'=>'required',
            'category'=>'required',
            'quantity'=>'required',
            'price'=>'required'
            
            ]);
      

        $data=new Items;

        $data->Item_Id=$request->item;
        $data->Item_Name=$request->name;
        $data->Category=$request->category;
        $data->Supplier=$request->supplier;
        $data->Quantity_in_Stock=$request->quantity;
        $data->Unit_Price=$request->price;
        $data->Date_Last_Ordered=$request->last;
        $data->Date_of_Restock=$request->restock;
    
    
        $data->save();
        
        return redirect()->back()->with('success','Item added successfully!');
        
    
    }




    // Print data 
    public function show1(){
        $items= Items::all();
        
        return view('Home',compact('items'));
      }





    //read data
      public function show($id)
      {
        $item = Items::findOrFail($id);
        return response()->json(['item' => $item]);
      }
    




    // Update data  
    public function update(Request $request, $id){

        $request->validate([
            'eitem'=>'required',
            'ename'=>'required',
            'ecategory'=>'required',
            'esupplier'=>'required',
            'ecategory'=>'required',
            'equantity'=>'required',
            'eprice'=>'required'
            
            ]);
      

           $data = Items::find($id);
          
           $data->Item_Id=$request->eitem;
           $data->Item_Name=$request->ename;
           $data->Category=$request->ecategory;
           $data->Supplier=$request->esupplier;
           $data->Quantity_in_Stock=$request->equantity;
           $data->Unit_Price=$request->eprice;
           $data->Date_Last_Ordered=$request->elast;
           $data->Date_of_Restock=$request->erestock;
    
            $data->save();
            
            return redirect()->back()->with('success','Data updated successfully!');


       }




    // Delete data
    public function delete($id){
        $data= Items::find($id);

        
            $data->delete();

            return redirect()->back()->with('success','Data delete successfully!');

        
      }


}
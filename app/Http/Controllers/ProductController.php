<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
   public function pro(Request $req){


$validateData = $req->validate([


'names' => 'required',
'number' => 'required',
'price' => 'required',


]);


$pro = new Product;

$pro->names = $validateData['names'];
$pro->number = $validateData['number'];
$pro->price = $validateData['price'];

$pro ->save();

return ("ok add");

   }


   function delete($id){
$result= Product::where('id',$id)->delete();
if($result){
    return ["product delete "];
}


   }


}

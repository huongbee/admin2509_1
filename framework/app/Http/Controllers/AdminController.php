<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FoodType;
use App\Food;

class AdminController extends Controller
{
    function getListType(){
        $types = FoodType::orderBy('id',"DESC")->paginate(5);
        return view('pages.list-type',compact('types'));
    }

    function getAddType(){
        return view('pages/add-type');
    }
    function postAddType(Request $req){
        $type = new FoodType;
        $type->name = $req->name;
        $type->description = $req->description;

        if($req->hasFile('image')){
            $hinh = $req->file('image');
            $nameImg = date('Y-m-d-H-i-s').'-'.$hinh->getClientOriginalName();
            $hinh->move('admin/img/hinh_loai_mon_an',$nameImg);
           
            $type->image = $nameImg;
            $type->save();
            return redirect()->route('list_type')->with('message','Thêm mới thành công');
        }
        else 
            return redirect()->back()->with('message','Vui lòng chọn ảnh');

        
    }   
    function getEditType($id){
        $type = FoodType::where('id',$id)->first();
        return view('pages/edit',compact('type'));
    }
    function postEditType(Request $req){
        $type = FoodType::where('id',$req->id)->first(); //get
        if($type){
            $type->name = $req->name;
            $type->description = $req->description;

            if($req->hasFile('image')){
                $hinh = $req->file('image');
                $nameImg = date('Y-m-d-H-i-s').'-'.$hinh->getClientOriginalName();
                $hinh->move('admin/img/hinh_loai_mon_an',$nameImg);
            
                $type->image = $nameImg;
            }
            $type->save();
            return redirect()->route('list_type')->with('message','Sửa thành công');
        } 
        return redirect()->back()->with('message','Không tìm thấy loại sp');
    }

    function getDeleteType(Request $req){
        $id_type = $req->id;
        //kiem tra co mon an thuoc loai hay khong?
        $foods = Food::where('id_type',$id_type)->first();
        if(!empty($foods)){
           echo "existfood";
        }
        else{
            $type = FoodType::where('id',$id_type)->first();
            //dd($type);
            if(!empty($type)) {
                $type->delete();
                echo "success";
            }
            else{
                echo "error";
            }
        }
    }
    function getProductByType(Request $req){
        $type = FoodType::select('name')->where('id',$req->id_type)->first();
        $products = Food::where([
                    ['id_type','=',$req->id_type],
                    ['deleted','=',0]
                    ])
                    ->orderBy('id','DESC')
                    ->paginate(5);
        return view('pages/list-product',compact('products','type'));

    }
    function getDeleteFood(Request $req){
        $id = $req->id;
        $food = Food::where('id',$id)->first();
        if(!empty($food)) {
            $food->deleted = 1; //da xoa
            $food->save();
            echo "success";
        }
        else{
            echo "error";
        }
    }
}

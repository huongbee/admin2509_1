<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FoodType;

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
}

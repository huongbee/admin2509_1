<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FoodType;
use App\Food;
use App\PageUrl;
use App\Functions;

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

    function getAddFood(){
        return view('pages/add-food');
    }

    function postAddFood(Request $req){

        $name = $req->name;

        $function = new Functions;
        $alias = $function->changeTitle($name);

        $url = new PageUrl;
        $url->url = $alias;
        $url->save();
        if($url->id){
            $food = new Food;
            $food->id_type = $req->type;
            $food->id_url = $url->id;
            $food->name = $name;
            $food->summary = $req->summary;
            $food->detail = $req->detail;
            $food->price = $req->price;
            $food->promotion_price = $req->promotion_price;
            $food->promotion = $req->promotion;
            if($req->hasFile('image')){
                $hinh = $req->file('image');
                $nameImg = date('Y-m-d-H-i-s').'-'.$hinh->getClientOriginalName();
                $hinh->move('admin/img/hinh_mon_an',$nameImg);
            
                $food->image = $nameImg;
            }
            else{
                return redirect()->back()->with('message','Vui lòng chọn ảnh!');
            }
            $food->update_at = date('Y-m-d',time());
            $food->unit = $req->unit;
            $food->today = $req->today == 1 ? 1 : 0;
            $food->save();
            if($food->id){
                return redirect()->route('list_product',$food->id_type)
                            ->with('message','Thêm thành công!');
            }
            $url->delete();
        }
        return redirect()->back()->with('message','Error!');
    }

    function getEditFood($id){
        $food = Food::where('id',$id)->first();
        if($food){
            return view('pages/edit-food',compact('food'));
        }
        return redirect()->back()->with('message','Không tim thấy sản phẩm!');
    }

    function postEditFood(Request $req){
        $food = Food::where('id',$req->id)->first();
        if($food){
            $name = $req->name;

            $function = new Functions;
            $alias = $function->changeTitle($name);

            $url = PageUrl::where('id',$food->id_url)->first();
            $url->url = $alias;
            $url->save();

            $food->id_type = $req->type;
            $food->name = $name;
            $food->summary = $req->summary;
            $food->detail = $req->detail;
            $food->price = $req->price;
            $food->promotion_price = $req->promotion_price;
            $food->promotion = $req->promotion;
            if($req->hasFile('image')){
                $hinh = $req->file('image');
                $nameImg = date('Y-m-d-H-i-s').'-'.$hinh->getClientOriginalName();
                $hinh->move('admin/img/hinh_mon_an',$nameImg);
            
                $food->image = $nameImg;
            }
            
            $food->update_at = date('Y-m-d',time());
            $food->unit = $req->unit;
            $food->today = $req->today == 1 ? 1 : 0;
            $food->save();
            return redirect()->route('list_product',$food->id_type)
                            ->with('message','Update thành công!');
        }
        return redirect()->back()->with('message','Không tim thấy sản phẩm!');
    }

}

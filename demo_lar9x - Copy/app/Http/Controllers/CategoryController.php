<?php

namespace App\Http\Controllers;
use App\Models\category;
use App\Models\Product;
use Illuminate\Http\Request;
use Exception;

class CategoryController extends Controller
{
    public function category(){
        $cats = Category::paginate(9);
        if (request()->key){
            $key = request()->key;
            $cats = $cats = Category::where('name','LIKE','%'.$key.'%')->paginate(9);    
        }
        return view('category.index',compact('cats'));
    }

    public function created( Request $req){
        $filled = $req->only('name','status');   
        $req->validate([
            'name' => 'required|min:6|max:150|unique:categories'
        ],[
            'name.required'=>'tên danh mục Không được',
            'name.min' =>'tên danh mục ít nhất 6 ký tự',
            'name.max' =>'tên danh mục cao nhất 150 ký tự'
        ]);
        Category::Create($filled);
        return redirect()->route('category.index');
    }

    public function delete(category $cat){
        $prods = Product::where('category_id',$cat->id)->count();
        if($prods == 0){
            $cat->delete();
            return redirect()->route('category.index')->with('success','Xóa danh mục thành công');
        }else{
            return redirect()->route('category.index')->with('error','Xóa danh mục không thành công');
        }
    }

    public function edit( Category $cat ){
        return view('category.edit',compact('cat')); 
    }

    public function update( Category $cat ,Request $req ){
        $req->validate([
            'name' =>'required|min:6|max:150|unique:categories,name,'.$cat->id
        ],[
            'name.required'=>'tên danh mục Không được để trống',
            'name.min' =>'tên danh mục phải ít nhất 6 ký tự',
            'name.max' =>'tên danh mục tối đa 150 ký tự',
            'name.unique' => 'tên danh mục <b>'.$req->name.'</b> đã tồn tại'
        ]);
        $filled = $req->only('name','status');
        $cat->update($filled);
        return redirect()->route('category.index')->with('success','cập nhật danh mục thành công');
    }

}

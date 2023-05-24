<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\ProductGallary;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Products::orderby('id', 'desc')->paginate(10);
        return view('admin.pages.products.index', compact('products'));
    }
    public function create(Request $request)
    {
        $category = Category::all();
        if ($request->isMethod('post')) {
            $data = $request->all();
            Products::create(['name' => $data['name'], 'detail' => $data['detail']]);
            $id = DB::getPdo()->lastInsertId();
            $image = $request->file('image');
            if (isset($image) && !empty($image)) {
                $imageName = $image->getClientOriginalName();
                $filePath = public_path('assets/images/');
                $img = Image::make($image->path());
                $img->resize(350, 250, function ($const) {
                    $const->aspectRatio();
                })->save($filePath.'/'.$imageName);
                Products::where('id', $id)->update(['image' => $imageName]);
            }
            $images = $request->file('gallary_iamge');
            if (isset($images) && !empty($images)) {
                foreach ($images as $img) {
                    $imageName2 = $img->getClientOriginalName();
                    $filePath = public_path('assets/images/gallary/');
                    $img = Image::make($img->path());
                    $img->resize(500, 350, function ($const) {
                        $const->aspectRatio();
                    })->save($filePath.'/'.$imageName2);
                    ProductGallary::create([
                        'gallary_image' => $imageName2,
                        'product_id' => $id
                    ]);
                }
            }
            return redirect()->back()->with('message', 'Product Insert Successfully');
        }
        return view('admin.pages.products.create', compact('category'));
    }
    public function Destroy($id)
    {
        $data = Products::find($id);
        $gallary_iamges=ProductGallary::select('id')->where('product_id',$data->id)->get();
        $oldimage = public_path('assets/images/' . $data->image);
        if (File::exists($oldimage)) {
            File::delete($oldimage);
        }
        foreach($gallary_iamges as $image){
            $gallary = ProductGallary::find($image->id);
            $oldimage2 = public_path('assets/images/gallary/' . $gallary->gallary_iamge);
            if (File::exists($oldimage2)) {
                File::delete($oldimage2);
            }
        }
        $data->delete();
        return redirect()->back()->with('message', 'Record Delete Successfully');
    }
}

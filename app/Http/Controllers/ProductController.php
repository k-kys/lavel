<?php
// Tương tác với DB bằng Query Builder
namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Redirect;
use Validator;

class ProductController extends Controller
{
    public function index()
    {
        // Insert data vào table
        // DB::table('products')->insert([
        //     'name' => 'Khau trang',
        //     'description' => 'Mô tả khẩu trang',
        //     'avatar' => null,
        //     'current_price' => '2000',
        //     'category_id' => 1,
        //     'created_at' => date('Y-m-d H:i:s'),
        //     'updated_at' => date('Y-m-d H:i:s')
        // ]);

        // Update data
        // DB::table('products')->where('id', 1)->update([
        //     'name' => 'Khẩu trang',
        //     'description' => 'Đây là mô tả Khẩu trang'
        // ]);

        // Xóa dữ liệu với id=2
        // DB::table('products')->where('id', 2)->delete();

        $products = DB::table('products')->orderBy('id')->get();
        // $product = DB::table('products')->where('current_price', 5000)->where('name', 'like', 'B%')->first();
        // $product = DB::table('products')->find(3);

        return view('product.index', compact('products'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required',
            'current_price' => 'required',
        ], [
            'name.required' => 'Name không được để trống',
            'current_price.required' => 'Price không được để trống',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::table('products')->insert([
            'name' => $data['name'],
            'description' => $data['description'],
            // 'avatar' => $data['avatar'],
            'current_price' => $data['current_price'],
            'category_id' => $data['category_id'],
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return Redirect('product');
    }

    public function edit($id)
    {
        $product = DB::table('products')->find($id);
        return view('product.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        DB::table('products')->where('id', $id)->update([
            'name' => $data['name'],
            'description' => $data['description'],
            // 'avatar' => $data['avatar'],
            'current_price' => $data['current_price'],
            'category_id' => $data['category_id'],
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return Redirect('product');
    }

    public function show($id)
    {
        $products = DB::table('products')->where('id', $id)->get();
        // dd($products);
        return view('product.index', compact('products'));
    }

    public function destroy($id)
    {
        DB::table('products')->where('id', $id)->delete();

        return Redirect('product');
    }
}

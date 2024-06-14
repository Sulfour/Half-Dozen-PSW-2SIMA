<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\our_product;

class OurProductController extends Controller
{
    public function insert(Request $request)
    {

        $file = file($request->product_pic);

        $file = $request->file('product_pic');
        $path = time() . '.' . $file->getClientOriginalExtension();

        $file->move(public_path('product_pic'), $path);

        our_product::create([
            'product_name' => $request->product_name,
            'path' => $path,
            'price' => $request->price,
            'description' => $request->desc
        ]);

       return back();
    }

    public function retrieve_admin()
    {
        return view('untuk_admin.products', [
            'products' => our_product::all()
        ]);
    }

    public function retrieve_index()
    {
        return view('index', [
            'products' => our_product::all()
        ]);
    }

public function retrieve_quality()
    {
        return view('quality', [
            'products' => our_product::all()
        ]);
    }

    public function edit_page($id)
    {

        $product = our_product::findOrFail($id);

        return view('untuk_admin.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {

        $product = our_product::findOrFail($id);

        $path = $product->path;

        if($request->hasFile('product_pic'))
        {
            $file = file($request->product_pic);

            $file = $request->file('product_pic');
            $path = time() . '.' . $file->getClientOriginalExtension();
        }

        $product->update([
            'product_name' => $request->product_name,
            'price' => $request->price,
            'path' => $path,
            'description' => $request->desc 
        ]);

        return back();
    }

    public function delete($id)
    {
        $product = our_product::findOrFail($id);

        $path = public_path('product_pic/' . $product->path);

        if(file_exists($path))
        {
            unlink($path);
        }


        $product->delete();

        return redirect('/admin');
    }

}

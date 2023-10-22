<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;


class ulokcontroller  extends Controller
{
    public function index()
{
    $products = Product::all();
    return view('admin.products.index', compact('products'));
}


    public function create()
    {
        
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
       
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
          
        ]);

      
        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
    
        $product->save();

       
        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    public function edit($id)
    {
       
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
        
        ]);

       
        $product = Product::findOrFail($id);

        
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
   
        $product->save();

      
        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
    
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }
}


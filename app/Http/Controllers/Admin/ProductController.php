<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Products\CreateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $product;
    protected $category;

    public function __construct(Product $product, Category $category)
    {
        $this->product = $product;
        $this->category = $category;
    }

    public function index()
    {
        $products = $this->product->latest('id')->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->category->get(['id', 'name']);
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataCreate = $request->all();
        $product = Product::create($dataCreate);
        $dataCreate['image'] = $this->product->saveImage($request); 
        $product->images()->create(['url'=> $dataCreate['image']]);
        $product->categories()->attach($dataCreate['category_ids']);
        
        
        return to_route('products.index')->with(['message', 'Thêm thành công.']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->product->with(['details','categories'])->findOrFail($id);
        $categories = $this->category->get(['id', 'name']);
        return view('admin.products.edit', compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dataCreate = $request->all();
        $product = $this->product->findOrFail($id);
        $currentImage = $product->images ? $product->images->first()->url : '';
        $dataUpdate['image'] = $this->product->updateImage($request, $currentImage); 

        $product->update($dataUpdate);
        $product->images()->create(['url'=> $dataUpdate['image']]);
        $product->assignCategory($dataCreate['category_ids']);
        
        
        return to_route('products.index')->with(['message', 'Thêm thành công.']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->product->findOrFail($id);
        $product->delete();
        $product->details()->delete();
        $imageName = $product->images->count() > 0 ? $product->images->first()->url : '';
        $this->product->deleteImage($imageName);
        return redirect()->route('products.index')->with(['message'=>'Xóa sản phẩm thành công!']);
    }
}

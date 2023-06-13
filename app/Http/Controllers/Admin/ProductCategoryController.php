<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
use App\Service\generate_code;
use App\Http\Requests\StoreProductCategoryRequest;
use App\Http\Requests\UpdateProductCategoryRequest;
use Illuminate\Support\Str;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $productCategories = ProductCategory::orderBy('id', 'DESC')->get();
        if ($request->ajax()) {
            return DataTables::of($productCategories)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $html = '';

                    $html .='<div class="btn-group" role="group" aria-label="Button group with nested dropdown">';
                    $html .='<div class="btn-group" role="group">';
                    $html .='<button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">';
                    $html .='Action';
                    $html .='</button>';
                    $html .='<ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">';
                    $html .='<li><a class="dropdown-item" href="'. route('product.category.edit', $row->id) .'" id="edit_btn">Edit</a></li>';
                    $html .='<li><a class="dropdown-item" href="'. route('product.category.destroy', $row->id) .'" id="delete_btn">Delete</a></li>';
                    $html .='</ul>';
                    $html .='</div>';
                    $html .='</div>';

                    return $html;
                })
                ->setRowClass(function ($row) {
                    return $row->id % 2 == 0 ? 'table-primary' : 'table-danger';
                })
                ->editColumn('created_at', function ($row) {
                    return Carbon::parse($row->created_at)->diffForHumans();
                })
                ->editColumn('updated_at', function ($row) {
                    return Carbon::parse($row->created_at)->diffForHumans();
                })
                ->addColumn('checkbox', function ($row) {
                    return '<input class="form-check-input category_checkbox" type="checkbox" name="category_checkbox[]" value="{{ $row->id }}" />';
                })

                ->rawColumns(['action', 'checkbox'])
                ->make(true);
            }
        return view('admin.product.category.index', compact('productCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductCategoryRequest $request, generate_code $codeGenerate)
    {
        $formData = $request->validated();

        $expenseObj = new ProductCategory;
        $tableName = $expenseObj->getTable();

        $formData['code'] = isset($formData['code']) ? $formData['code'] : $codeGenerate->code($tableName);


        $formData['slug'] = Str::slug($formData['name'], '-');

        ProductCategory::insert($formData);

        return response()->json('Product Category Created Successfully');
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
    public function edit(ProductCategory $productCategory)
    {
        return view('admin.product.category.edit', compact('productCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductCategoryRequest $request, ProductCategory $productCategory)
    {
        $formData = $request->validated();

        $formData['slug'] = Str::slug($formData['name'], '-');

        $productCategory->update($formData);

        return response()->json('Product Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCategory $productCategory)
    {
        $productCategory->delete();
        return response()->json('Product Category Deleted Successfully');
    }

    function destroyall(Request $request)
    {
        dd($request->ids);
    }
}

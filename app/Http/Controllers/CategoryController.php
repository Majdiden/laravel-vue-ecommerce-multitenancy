<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\CategoryContract;
use App\Http\Requests;

use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     protected $categoryRepository;


     public function __construct(CategoryContract $categoryRepository)
     {
       $this->categoryRepository = $categoryRepository;
     }


    public function index()
    {
        $categories = $this->categoryRepository->listCategories();
        return response()->json($categories);
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
    public function store(Request $request)
    {


      $this->validate($request, [
          'name'      =>  'required|string|max:191',
          'parent_id' =>  'not_in:0',
          'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:800000'
      ]);

      $params = $request->except('_token');

      $category = $this->categoryRepository->createCategory($params);

      if (!$category) {
          return $this->responseRedirectBack('Error occurred while creating category.', 'error', true, true);
      }
      return response()->json($category);

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $category = $this->categoryRepository->deleteCategory($id);

        if (!$category) {
          return $this->responseRedirectBack('Error occurred while deleting category.', 'error', true, true);
        }
    }
}

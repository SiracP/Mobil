<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //Umut o kadar güzel kod yazmışınki değiştirmeye kıyamadım kanks
    public function index()
    {
        $category = Category::query()->get();

        return [
            'status' => true,
            'data' => $category,
            'messages' => ['Kategori listendi.']
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);
        if ($validator->fails())
        {
            return [
                'status' => false,
                'data' => [],
                'messages' => $validator->errors()->all()
            ];
        }

        $category = new Category();
        $category->name = $request->name;
        $category->save();

        return [
            'status' => true,
            'data' => [],
            'messages' => ['Kategori eklendi.']
        ];
    }

    public function show($id)
    {
        $category = Category::query()->find($id);
        return [
            'status' => true,
            'data' => $category,
            'messages' => ['Kategori getirildi.']
        ];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'string|max:255',
        ]);
        if ($validator->fails())
        {
            return [
                'status' => false,
                'data' => [],
                'messages' => $validator->errors()->all()
            ];
        }

        $category = Category::query()->find($id);
        $category->name = $request->name ?? $category->name;
        $category->save();

        return [
            'status' => true,
            'data' => [],
            'messages' => ['Kategori güncellendi.']
        ];
    }


    public function destroy($id)
    {
        $category = Category::query()->find($id);
        if($category) {
            $category->delete();

            return [
                'status' => true,
                'data' => [],
                'messages' => ['Kategori silindi.']
            ];
        }
        else {
            return [
                'status' => false,
                'data' => [],
                'messages' => ['Kategori bulunamadı.']
            ];
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    //Umut o kadar güzel kod yazmışınki değiştirmeye kıyamadım kanks
    public function index()
    {
        $posts = Post::query()->select('posts.id','posts.name','content','categories.name AS category_name','posts.created_at','posts.updated_at')
            ->join('categories', 'posts.category_id','=','categories.id')
            ->get();

        foreach ($posts as $p) {
            $p->created_format = $p->created_at->format('d.m.Y H:i:s');
            $p->updated_format = $p->updated_at->format('d.m.Y H:i:s');

            unset($p->created_at);
            unset($p->updated_at);
        }

        return [
            'status' => true,
            'data' => $posts,
            'messages' => ['Postlar listelendi.']
        ];
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


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'post_content' => 'required|string|max:255',
            'category_id' => 'required|integer|max:255',
        ]);
        if ($validator->fails())
        {
            return [
                'status' => false,
                'data' => [],
                'messages' => $validator->errors()->all()
            ];
        }

        $post = new Post();
        $post->name = $request->name;
        $post->content = $request->post_content;
        $post->category_id = $request->category_id;
        $post->save();

        return [
            'status' => true,
            'data' => [],
            'messages' => ['Post eklendi.']
        ];

    }

    public function show($id)
    {
        $post = Post::query()->find($id);

        return [
            'status' => true,
            'data' => $post,
            'messages' => ['Post getirildi.']
        ];
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


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'string|max:255',
            'content' => 'string|max:255',
            'category_id' => 'integer|max:255',
        ]);
        if ($validator->fails())
        {
            return [
                'status' => false,
                'data' => [],
                'messages' => $validator->errors()->all()
            ];
        }

        $post = Post::query()->find($id);
        $post->name = $request->name ?? $post->name;
        $post->content = $request->post_content ?? $post->post_content;
        $post->category_id = $request->category_id ?? $post->category_id;
        $post->save();

        return [
            'status' => true,
            'data' => [],
            'messages' => ['Post güncellendi.']
        ];
    }


    public function destroy($id)
    {
        $post = Post::query()->find($id);
        if($post) {
            $post->delete();

            return [
                'status' => true,
                'data' => [],
                'messages' => ['Post silindi.']
            ];
        }
        else {
            return [
                'status' => false,
                'data' => [],
                'messages' => ['Post bulunamadı.']
            ];
        }
    }
}

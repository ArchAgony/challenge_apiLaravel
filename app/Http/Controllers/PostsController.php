<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\Posttags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    protected $model;
    protected $modelAlias;
    public function __construct() {
        $this->model = Posts::class;
        $this->modelAlias = class_basename($this->model);
    }

    public function register(Request $request){
        // $request->validate([
        //     'title'=>'required',
        //     'description'=>'required',
        //     'content'=>'required'
        // ]);
        $validated = $request->validate([
            'title'=>'required',
            'description'=>'required',
            'content'=>'required',
            'tags' => 'array',
            'user_id' => 'required|exists:users,id'
        ]);

        $data = Posts::Create([
            'title'=>$request->title,
            'description'=>$request->description,
            'content'=>$validated['content'],
            'user_id'=>$validated['user_id']
        ]);

        // $data = $this->model::create($request->all());

        // return response()->json([
        //     'message' => 'successfully added',
        //     'data' => $data
        // ]);
        if ($request->tags) {
            foreach ($request->tags as $key => $value) {
                Posttags::create([
                    'posts_id' => $data->id,
                    'tags_id' => $value
                ]);
            }
        }

        return response()->json([
            'message' => 'successfully added',
            'data' => $data
        ]);
    }

    public function index(){
        return (["data" => $this->model::all()]);
    }

    public function update(Request $request, string $id){
        // $request->validate([
        //     'title'=>'required',
        //     'description'=>'required',
        //     'content'=>'required',
        //     'tags' => 'array'
        // ]);
        // $data = Posts::find($id);
        // $data->title=$request->title;
        // $data->description=$request->description;
        // $data->content=$request->content;
        // $data->user_id=Auth::id();

        $data = $this->model::where('id', $id)->first();
        $data->update($request->all());
        return response()->json([
            'message' => 'successfully changed',
            'data' => $data
        ]);
    }

    public function delete(Request $request, string $id){
        $data = $this->model::where('id', $id)->first();
        $data->delete($request->all());
        return response()->json([
            'message' => 'successfully deleted',
            'data' => $data
        ]);
    }
}

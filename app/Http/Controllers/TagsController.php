<?php

namespace App\Http\Controllers;

use App\Models\Tags;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    protected $model;
    protected $modelAlias;
    public function __construct() {
        $this->model = Tags::class;
        $this->modelAlias = class_basename($this->model);
    }

    public function register(Request $request){
        $data = $this->model::create($request->all());
        return response()->json([
            'message' => 'successfully added',
            'data' => $data
        ]);
    }

    public function index()
    {
        return (['data' => $this->model::all()]);
    }

    public function update(Request $request, string $id){
        $data = $this->model::where('id', $id)->first();
        $data->update($request->all());
        return response()->json([
            'message' => 'successfully updated',
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

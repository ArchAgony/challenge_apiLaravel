<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CityController extends Controller
{
    protected $model;
    protected $modelAlias;

    public function __construct() {
        $this->model = City::class;
        $this->modelAlias = class_basename($this->model);
    }

    public function index(){
        return (["data" => $this->model::all()]);
    }

    public function register(Request $request){
        $data = $this->model::create($request->all());
        return response()->json([
            'message' => 'successfully added',
            'data' => $data
        ]);
    }

    public function update(Request $request, string $id){
        $data = $this->model::where("id", $id)->first();
        $data->update($request->all());
        return response()->json([
            'message' => 'data updated successfully',
            'data' => $data
        ]);
    }

    public function delete(Request $request, string $id){
        $data = $this->model::where("id", $id)->first();
        $data->delete($request->all());
        return response()->json([
            'message' => 'data deleted successfully',
            'data' => $data
        ]);
    }
}

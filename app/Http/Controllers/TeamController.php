<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
class TeamController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),$this->validationRoles());
        if($validator->fails()) 
        {
            return response()->json(['errors'=>$validator->errors(),'status_code'=>400],400);
        }

        $team = Team::create($request->all());
        return response()->json(['message'=>'Team created successfully','data'=>$team, 'status_code'=>201],201);
    }

    public function show(Team $team)
    {
        $data = array();
        $data = Team::where('name','=', session()->get('name'))->first();
        return view('teams', compact('data'));
    }

    public function update(Request $request, Team $team)
    {
        $team->update($request->all());
        return response()->json(['message'=>'Team updated','data'=>$team, 'status_code'=>200],200);
    }

    public function destroy(Team $team)
    {
        $team->delete();
        return response()->json([],204);
    }

    private function validationRoles()
    {
        return [
            'name' => 'required',
            'rank' => 'required',
        ];
    }
}

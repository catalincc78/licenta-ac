<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Closure;
use App\Models\Player;
use App\Models\Team;
use yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PlayerController extends Controller
{
    public function index()
    {
        $players = Player::all();
        return view('dashboard.user.home', compact('players'));
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->validationRoles());
        if($validator->fails())
        {
        return response()->json(['errors'=>$validator->errors(),'status_code'=>400],400);
        }

        $player = Player::create($request->all);
        $query = DB::table('players')->insert([
            'first_name' =>$request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'age' => $request->input('age'),
            'market_value' => $request->input('market_value'),
            'post'=>$request->input('post')
        ]);
        if($query)
        {
            return back()->with('success','Player added successfully');
        }
        else
        {
            return back()->with('fail','Something went wrong');
        }
    }

    public function show(Player $player)
    {
        return response()->json(['data'=>$player,'status_code'=>200],200);
    }


    public function update(Request $request, Player $player)
    {
        $player->update($request->all);
        return response()->json(['message'=>'Player Updated', 'data'=>$player,'status_code'=>200],200);
    }


    public function destroy(Player $player)
    {
        $player->delete();
        return response()->json([],204);
    }


    public function addPlayer(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'first_name' => 'required',
            'last_name' => 'required',
            'age' => 'required',
            'market_value' => 'required',
            'post'=>'sometimes|required|array'
        ]);
        if($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors(),'status_code' => 400],400);
        }else{
                $player = new Player();
                $player->first_name= $request->first_name;
                $player->last_name= $request->last_name;
                $player->age= $request->age;
                $player->market_value= $request->market_value;
                $player->post= $request->post;
                $query = $player->save();

            if(!$query)
            {
                return response()->json(['code'=>0,'msg'=>'Something went wrong']);
            }else{
                return response()->json(['code'=>1,'msg'=>'Player added successfully']);
            }
        }
    }

    public function validationRolse()
    {
        return[
            'first_name' => 'required',
            'last_name' => 'required',
            'age' => 'required',
            'market_value' => 'required',
            'post'=>'sometimes|required|array'
        ];
    }
}

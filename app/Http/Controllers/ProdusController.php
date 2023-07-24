<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produs;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class ProdusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
        //
    }
    public static function listaProduse(){
        $viewProdus = DB::table('produs')->select('id', 'nume_produs', 'cantitate', 'valoare_produs')->get();
        return view('dashboard.user.produse.lista-produse', ['produse' => $viewProdus]);
    }
    public static function viewAdaugareProdus()
    {
        return view('dashboard.user.produse.adaugare-produs');
    }
    public static function adaugareProdus(Request $request)
    {
        try {
            if (!is_null($request->input('nume_produs'))
                && !is_null($request->input('cantitate'))
                && !is_null($request->input('valoare_produs'))) {
                $data = [];
                $data['nume_produs'] = $request->input('nume_produs');
                $data['cantitate'] = $request->input('cantitate');
                $data['valoare_produs'] = $request->input('valoare_produs');
                $validator = Validator::make($request->all(),[
                    'nume_produs' => 'required|min:3|max:100',
                    'cantitate' => 'required|integer|min:1',
                    'valoare_produs' => 'required|numeric|min:0.1'],
                    [

                        'nume_produs.required' => 'Numele produsului este un camp obligatoriu',
                        'cantitate.required' => 'Cantitatea este un numar obligatoriu',
                        'valoare_produs.required' => 'Valoare produs este un numar obligatoriu',
                        'nume_produs.min' => 'Numele produsului trebuie sa contina cel putin 3 caractere',
                        'nume_produs.max' => 'Numele produsului nu poate depasi 100 de caractere',
                        'cantitate.min' => 'Valoarea cantitatii trebuie sa aiba valoarea egala sau mai mare decat 1',
                        'valoare_produs.min' => 'Valoarea cantitatii trebuie sa aiba minim 0.1',
                        'cantitate.integer' => 'Cantitatea trebuie sa fie o valoare numerica intreaga',
                        'valoare_produs.numeric' => 'Valoarea produsului trebuie sa fie o valoare numerica',
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'error' => true,
                        'message' => $validator->errors()->all(),
                    ], 422);
                }
                $dateProdus =  DB::table("produs")->insert([
                    'nume_produs' => $data['nume_produs'],
                    'cantitate' => $data['cantitate'],
                    'valoare_produs' => $data['valoare_produs']
                ]);
                if($dateProdus) {
                    return response()->json(['success' => 1, 'message' => 'Produsul a fost adaugat']);
                }else{
                    return response()->json(['error' => 1, 'message' => 'Produsul nu a fost adaugat!']);
                }
            }
        } catch (Exception $e) {
            return response()->json(['error' => 1, 'message' => 'Ceva nu a functionat la adaugarea produsului!']);
        }
    }
    public static function editareProdus($id, Request $request)
    {
        try {
            if (!is_null($request->input('nume_produs'))
                && !is_null($request->input('cantitate'))
                && !is_null($request->input('valoare_produs'))) {
                $data = [];
                $data['nume_produs'] = $request->input('nume_produs');
                $data['cantitate'] = $request->input('cantitate');
                $data['valoare_produs'] = $request->input('valoare_produs');
                $validator = Validator::make($request->all(),[
                    'nume_produs' => 'required|min:3|max:100',
                    'cantitate' => 'required|integer|min:1',
                    'valoare_produs' => 'required|numeric|min:0.1'],
                    [

                        'nume_produs.required' => 'Numele produsului este un camp obligatoriu',
                        'cantitate.required' => 'Cantitatea este un numar obligatoriu',
                        'valoare_produs.required' => 'Valoare produs este un numar obligatoriu',
                        'nume_produs.min' => 'Numele produsului trebuie sa contina cel putin 3 caractere',
                        'nume_produs.max' => 'Numele produsului nu poate depasi 100 de caractere',
                        'cantitate.min' => 'Valoarea cantitatii trebuie sa aiba valoarea egala sau mai mare decat 1',
                        'valoare_produs.min' => 'Valoarea cantitatii trebuie sa aiba minim 0.1',
                        'cantitate.integer' => 'Cantitatea trebuie sa fie o valoare numerica intreaga',
                        'valoare_produs.numeric' => 'Valoarea produsului trebuie sa fie o valoare numerica',
                    ]);
                if ($validator->fails()) {
                    return response()->json([
                        'error' => true,
                        'message' => $validator->errors()->all(),
                    ], 422);
                }
                $dateProdus =  DB::table("produs")->where('id', $id)->update([
                    'nume_produs' => $data['nume_produs'],
                    'cantitate'  => $data['cantitate'],
                    'valoare_produs' => $data['valoare_produs']
                ]);
                if($dateProdus) {
                    return response()->json(['success' => 1, 'message' => 'Produsul a fost actualizat']);
                }else{
                    return response()->json(['error' => 1, 'message' => 'Produsul nu a fost actualizat!']);
                }
            }
        } catch (Exception $e) {
            return response()->json(['error' => 1, 'message' => 'Ceva nu a functionat la editarea produsului!']);
        }
    }
    public static function stergereProdus($id)
    {
        try{
            $deleteCoupon = DB::table('produs')->where('id', $id)->delete();
            if($deleteCoupon) {
                return response()->json(['success' => 1, 'message' => 'Produsul a fost sters cu succes']);
            }else{
                return response()->json(['error' => 1, 'message' => 'Produsul nu a fost sters!']);
            }
        } catch (Exception $e) {
            return response()->json(['error' => 1, 'message' => 'Ceva nu a functionat la stergerea produsului!']);
        }
    }
}

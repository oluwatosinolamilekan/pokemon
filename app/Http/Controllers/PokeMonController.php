<?php

namespace App\Http\Controllers;

use App\Models\PokeMon;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PokeMonController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function filter(Request $request): JsonResponse
    {
        try {
            $paginate = $request->paginate_number ?? 10;
            $query =  PokeMon::orWhere('name', 'LIKE', '%' . $request->input('name') . '%')
                        ->when($request['hp'], function ($query)use($request){
                                return $query->where('hp',  $request['hp']['gte']);
                        })
                        ->when($request['defense'], function ($query)use($request){
                            return $query->where('defense', $request['defense']['lte']);
                        })
                        ->when($request['attack'], function ($query)use($request){
                            return $query->where('attack', $request['attack']['gte']);
                        })
                        ->paginate($paginate);
            return response()->json($query);
        }catch (Exception $exception){
            return response()->json([
                'status' => 'failed',
                'message' => $exception->getMessage(),
                'line' => $exception->getLine()
            ]);
        }
    }
}

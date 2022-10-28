<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return false|string
     */
    public function index()
    {
        $movies = Movie::paginate();
        return json_encode($movies);
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try {
            $input = $request->input('_value');
            DB::beginTransaction();

            Movie::create([
                'title' => $input['title'],
                'category' => $input['category'],
                'description' => $input['description'],
                'quantity' => $input['quantity'],
                'age' => $input['age']
            ]);
            DB::commit();
            return response()->json([
                'status' => true,
                'message' => 'Pelicula almacenada correctamente'
            ]);
        } catch (\Throwable|\Exception $e) {

            DB::rollBack();
            Log::error('Error almacenando el recurso', ['error' => $e]);
            return response()->json([
                'status' => false,
                'message' => 'Ocurrio un error al crear el registro'
            ]);

        }
    }

    /**
     * Display the specified resource.
     *
     * @return false|string
     */
    public function show(Movie $movie)
    {
        return json_encode($movie);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Movie $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests $request
     * @param \App\Models\Movie $movie
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Movie $movie)
    {
        try {

            $input = $request->input('_value');
            DB::beginTransaction();
            Movie::where('id', $movie->id)
                ->update([
                    'title' => $input['title'],
                    'category' => $input['category'],
                    'description' => $input['description'],
                    'quantity' => $input['quantity'],
                    'age' => $input['age']
                ]);
            DB::commit();
            return response()->json([
                'status' => true,
                'message' => 'Pelicula almacenada correctamente'
            ]);
        } catch (\Throwable|\Exception $e) {
            DB::rollBack();
            Log::error('Error almacenando el recurso', ['error' => $e]);
            return response()->json([
                'status' => false,
                'message' => 'Ocurrio un error al crear el registro'
            ]);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Movie $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        //
    }
}

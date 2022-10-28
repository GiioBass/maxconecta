<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return false|string
     */
    public function index()
    {
        $users = User::paginate();
        return json_encode($users);
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try {
            $input = $request->input('_value');
            DB::beginTransaction();
            User::create([
                'name' => $input['name'],
                'user_name' => $input['user_name'],
                'email' => $input['email'],
                'password' =>bcrypt( $input['password'])
            ]);
            DB::commit();
            return response()->json([
                'status' => true,
                'title' => 'success',
                'message' => 'Usario almacenado correctamente'
            ]);
        }catch(\Throwable | \Exception $e)
        {
            DB::rollBack();
            Log::error('Error almacenando el recurso', ['error' => $e]);
            return response()->json([
                'status' => false,
                'title' => 'error',
                'message' => 'Ocurrio un error al crear el registro'
            ]);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return json_encode($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return false|string
     */
    public function edit(User $user)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        try {
            $input = $request->input('_value');
            DB::beginTransaction();
            User::where('id', $id)
                ->update([
                    'name' => $input['name'],
                    'user_name' => $input['user_name'],
                    'email' => $input['email'],
                    'password' =>bcrypt( $input['password'])
                ]);
            DB::commit();
            return response()->json([
                'status' => true,
                'title' => 'success',
                'message' => 'Usario almacenado correctamente'
            ]);
        }catch(\Throwable | \Exception $e)
        {
            DB::rollBack();
            Log::error('Error almacenando el recurso', ['error' => $e]);
            return response()->json([
                'status' => false,
                'title' => 'error',
                'message' => 'Ocurrio un error al crear el registro'
            ]);

        }
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
}

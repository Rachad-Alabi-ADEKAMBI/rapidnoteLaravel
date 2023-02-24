<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function getUsers()
    {
        $data = User::all();

        return response()->json($data);
    }

    public function getUser($id)
    {
        $data = User::find($id);

        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        return json_encode($data, JSON_UNESCAPED_UNICODE);
    }
}
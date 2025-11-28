<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Tampilkan daftar semua pengguna (Hanya untuk Admin).
     */
    public function index()
    {
        // Karena rute ini sudah melewati AdminMiddleware, kita tahu bahwa 
        // yang mengakses adalah admin yang terotentikasi.
        $users = User::all();

        return response()->json($users);
    }
}
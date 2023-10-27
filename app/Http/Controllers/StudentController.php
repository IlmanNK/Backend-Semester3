<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    // Menampilkan data
    public function index()
    {
        $student = Student::all();

        $data = [
            'message' => 'Get all Student',
            'data' => $student
        ];

        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        // menangkap data request
        $input = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan
        ];

        // menggunakan model Student untuk insert data
        $student = Student::create($input);

        $data = [
            'message' => 'Data berhasil ditambahkan',
            'data' => $student,
        ];

        return response()->json($data, 201);
    }
}

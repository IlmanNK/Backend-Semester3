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

        // jika data kosong maka kirim status code 204
        if ($student->isEmpty()) {
            $data = [
                "message" => "Resource is empty",
            ];

            return response()->json($data, 204);
        }

        $data = [
            'message' => 'Get all Student',
            'data' => $student
        ];

        return response()->json($data, 200);
    }

    public function show($id)
    {
        // mencari data sesuai id yang diinginkan 
        $student = Student::find($id);

        if (!$student) {
            $data = [
                'message' => 'Data detail student tidak ditemukan',
            ];

            // mengembalikan data (json) dan kode 200
            return response()->json($data, 404);
        } else {

            $data = [
                "message" => "Detail Data Siswa ditemukan",
                "data"=> $student,
            ];
    
            // Mengembalikan data (json) dan kode 404
            return response()->json($data, 200);
        }

    }

    public function store(Request $request)
    {

        // memberi validasi untuk request
        $request->validate([
            "nama" => "required",
            "nim" => "required",
            "email" => "required|email",
            "jurusan" => "required"
        ]);

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

    public function update($id, Request $request)
    {
        // menangkap id dari parameter
        $student = Student::find($id);
        // cek apakah ada student dengan id tersebut
        if (!$student) {
            $data = [
                'message' => 'Data tidak ditemukan',
            ];
            return response()->json($data, 404);
        }

        // $student->update($request->all());

        $student->update([



            'nama' => $request->nama ?? $student->nama,
            'nim' => $request->nim ?? $student->nim,
            'email' => $request->email ?? $student->email,
            'jurusan' => $request->jurusan ?? $student->jurusan
        ]);



        $data = [
            'message' => 'Data Berhasil Diubah',
            'data' => $student
        ];
        return response()->json($data, 200);
    }

    public function destroy($id)

    {
        // mencari data siswa berdasarkan id
        $student = Student::find($id);

        // mengecek apakah data tersebut ada atau tidak
        if (!$student) {
            $data = [
                'message' => 'Data tidak berhasil ditemukan',
            ];

            return response()->json($data, 404);
        }

        // menghapus data siswa 
        $student->delete();

        $data = [
            'message' => 'Data berhasil dihapus',
        ];
        return response()->json($data, 203);
    }

}

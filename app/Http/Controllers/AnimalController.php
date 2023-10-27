<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    // property animals0
    public $animals = ['kambing','monyet'];

    // methode untuk menampilkan data hewan
    public function index()
    {
        echo "menampilkan data animals <br>";

        // loop property animals
        foreach($this->animals as $animal){
            echo "- $animal <br>";
        }
    }

    // method untuk menambahkan data hewan
    public function store(Request $request)
    {
        // echo "Nama hewan: ";
        echo "<br>";
        echo "untuk menambahkan hewan baru <br>";

        // menambahkan data ke property animals
        array_push($this->animals, $request->animal);

        // memanggil method index
        $this->index();
    }


    // Method untuk mengedit data hewan
    public function update(Request $request, $id)
    {
        echo "Nama hewan: $request->nama";
        echo "<br>";
        echo "untuk mengubah data hewan id $id";

        // update data di property
        $this->animals[$id] = $request->animal;

        // panggil methode index
        $this->index();
    }


    // Method untuk menghapus data hewan
    public function destroy($id)
    {
        echo "untuk menghapus hewan ID $id";

        unset($this->animals[$id]);
        // panggil methode index
        $this->index();
    }
}

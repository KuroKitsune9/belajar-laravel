<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{

    private $arr = [
        ['id' => 1, 'nama' => 'faza', 'kelas' => 'XI RPL 1'],
        ['id' => 2, 'nama' => 'Ubed', 'kelas' => 'XI RPL 2'],
        ['id' => 3, 'nama' => 'Cemen', 'kelas' => 'XI RPL 3'],
    ];
    public function index() // memberikan daftar nama
    {
        $siswa = session('siswa_data', $this->arr);
        return view('siswa.index', ['siswa' => $siswa]);
    }

    public function show($id)
    {
        $siswa = collect($this->arr)->firstWhere('id', $id);
        // dd($siswa); // untuk cek data
        if (!$siswa) {
            abort(404);
        }
        return view('siswa.show', compact('siswa'));
    }

    public function create()
    {
        return view('siswa.create');
    }

    public function store(Request $request)
    {
        $siswa = session('siswa_data', $this->arr);
        // membuat id increment otomatis
        $newId = collect($siswa)->max('id') + 1;

        // tambah data siswa
        $siswa[] = [
            'id' => $newId,
            'kelas' => $request->kelas,
            'nama' => $request->nama,
        ];

        // dd($request->all());

        // simpan ke array siswa
        session(['siswa_data' => $siswa]);

        // return
        return redirect('/siswa');
    }

    public function edit($id)
    {
        $data = session('siswa_data', $this->arr);
        // membuat id increment otomatis
        $siswa = collect($data)->firstWhere('id', $id);

        if (!$siswa) {
            abort(404);
        }

        // dd($siswa);

        return view('siswa.edit', compact('siswa'));
    }

    public function update(Request $request, $id)
    {
        $data = session('siswa_data', $this->arr);

        foreach ($data as &$item) {
            if ($item['id'] == $id) {
                $item['nama'] = $request->nama;
                $item['kelas'] = $request->kelas;
                break;
            }
        }
        // dd($request->all());x    
        session(['siswa_data' => $data]);
        return redirect('siswa');
    }

    public function destroy($id)
    {
        $siswa = session('siswa_data', $this->arr);
        // mencari array yang sama dari column id
        $index = array_search($id, array_column($siswa, 'id'));

        // hapus data berdasarkan id dari index array nya
        array_splice($siswa, $index, 1);

        // merefresh data di session
        session(['siswa_data' => $siswa]);

        return redirect('/siswa');
    }
}

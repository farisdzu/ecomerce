<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validasi = Validator::make($data, [
            'nomer_hp' => 'required|max:15|min:10',
            'tgl_lahir' => 'required|date|',
            'jenis_kelamin' => 'required',
            'foto-profile' => 'required'
        ]);

        if($validasi->fails())
        {
            return back()->withErrors($validasi)->withInput();
        }

        if ($request->hasFile('foto-profile')) {
            $folder = 'public/images/profile'; // membuat folder penyimpanan file
            $gambar = $request->file('foto-profile'); // mengambil data dari request foto_profile
            $nama_gambar = $gambar->getClientOriginalName(); // memberikan nama pada file yang diupload
            $path = $request->file('foto-profile')->storeAs($folder, $nama_gambar); // mengirimkan gambar ke folder
            $data['foto-profile'] = $nama_gambar; // memberikan nama yang dikirimkan ke database 
        }

        Profile::create($data);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
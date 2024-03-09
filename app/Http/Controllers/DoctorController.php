<?php

namespace App\Http\Controllers;

use App\Http\Requests\DoctorCreateRequest;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Image;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = Doctor::latest()->get();
        return view('pages.doctors.index', compact(
            'doctors'
        ));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.doctors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DoctorCreateRequest $request, Doctor $doctor)
    {
        $newDoctor = $request->all();
        if ($request->hasFile('photo')) {
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('photo')->getClientOriginalExtension();
            $filenameSimpan = Hash::make($filename) . '_' . time() . '.' . $extension;
            $request->file('photo')->storeAs('public/doctor_photos', $filenameSimpan);
            $newDoctor['photo']   = 'doctor_photos/' . $filenameSimpan;
        };
        $process = $doctor->create($newDoctor);
        return $process ?
            redirect()->route('doctor.index')->with('success', 'Data dokter berhasil disimpan.') :
            redirect()->back()->with('error', 'Gagal menyimpan data dokter.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Doctor $doctor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();

        return redirect()->route('doctor.index')->with('success', 'Data dokter berhasil dihapus.');
    }
}

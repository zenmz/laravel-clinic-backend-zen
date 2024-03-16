<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = Doctor::when($request->input('name'), function ($query, $name) {
            return $query->where('name', 'like', '%' . $name . '%');
        })
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('pages.doctors.index', compact('data'));
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
    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'specialist' => 'required',
            'address' => 'required',
            'photo' => 'nullable',
            'sip' => 'required',
        ]);

        if ($request->hasFile('photo')) {
            $validator['photo'] = $request->file('photo')->store('doctor');
        }

        Doctor::create($validator);
        return redirect('doctor')->with('success', 'Data doctor berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Doctor::find($id);

        return view('pages.doctors.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Doctor::find($id);

        return view('pages.doctors.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'specialist' => 'required',
            'address' => 'required',
            'photo' => 'nullable',
            'sip' => 'required',
        ]);

        $data = Doctor::find($id);

        if ($request->hasFile('photo')) {
            $validator['photo'] = $request->file('photo')->store('doctor');
        } else {
            $validator['photo'] = $data->photo;
        }

        $data->update($validator);
        return redirect('doctor')->with('success', 'Data doctor berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Doctor::find($id)->delete();
        return redirect('doctor')->with('success', 'Data doctor berhasil dihapus');
    }
}

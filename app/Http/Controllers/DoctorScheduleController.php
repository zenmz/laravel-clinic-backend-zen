<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\DoctorSchedule;
use Illuminate\Http\Request;

class DoctorScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data = DoctorSchedule::select('doctor_schedules.id as id', 'day', 'time', 'note', 'doctors.name as doctor_name')
        //     ->join('doctors', 'doctors.id', '=', 'doctor_schedules.doctor_id')
        //     ->orderBy('doctor_name', 'asc')->paginate(10);

        $data = Doctor::with('schedule')->orderBy('name', 'asc')->paginate(10);

        return view('pages.doctor-schedules.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $doctor = Doctor::orderBy('name', 'asc')->get();

        return view('pages.doctor-schedules.create', compact('doctor'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        foreach ($request->day as $key => $value) {
            $schedule = new DoctorSchedule();
            $schedule->doctor_id = $request->doctor_id;
            $schedule->day = $value;
            $schedule->time = $request->start[$key] ? $request->start[$key] . ' - ' . $request->end[$key] : ' ';
            $schedule->note = $request->note;
            $schedule->save();
        }

        return redirect('schedule')->with('success', 'Data doctor schedule berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = DoctorSchedule::find($id);

        return view('pages.doctor-schedules.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = DoctorSchedule::with('doctor')->where('doctor_id', $id)->get();
        $doctor = Doctor::all();
        $schedule = [];

        foreach ($data as $item) {
            $schedule['id'] = $item->doctor_id;
            $schedule['name'] = $item->doctor->name;
            $schedule['day'][] = $item->day;
            $schedule['time'][] = explode(" - ", $item->time);
            $schedule['note'] = $item->note;
        }
        // dd($schedule);

        return view('pages.doctor-schedules.edit', compact('doctor', 'schedule'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request);
        foreach ($request->day as $key => $value) {
            $schedule = DoctorSchedule::where('doctor_id', $id)->where('day', $value)->first();
            $schedule->doctor_id = $request->doctor_id;
            $schedule->day = $value;
            $schedule->time = $request->start[$key] . ' - ' . $request->end[$key];
            $schedule->note = $request->note;
            $schedule->save();
        }

        // $validator = $request->validate([
        //     'doctor_id' => 'required',
        //     'day' => 'required',
        //     'time' => 'required',
        //     'note' => 'required',
        //     'status' => 'required',
        // ]);

        // $data = DoctorSchedule::find($id);
        // $data->update($validator);
        return redirect('schedule')->with('success', 'Data doctor schedule berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DoctorSchedule::where('doctor_id', $id)->delete();
        return redirect('schedule')->with('success', 'Data doctor schedule berhasil dihapus');
    }
}

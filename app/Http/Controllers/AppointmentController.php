<?php


namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointments = Appointment::orderBy('date')->orderBy('hour')->paginate(15);
        return view('appointments', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->merge(['user_id' => auth()->user()->id]);
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'doctor_id' => 'required|exists:users,id', // Changed to users table
            'hour' => 'required|string',
            'date' => 'required|date',
        ]);

        // Check if an appointment with the same doctor, date, and hour already exists
        $existingAppointment = Appointment::where('doctor_id', $request->doctor_id)
            ->where('date', $request->date)
            ->where('hour', $request->hour)
            ->exists();

        if ($existingAppointment) {
            return redirect()->route('appointments.index')->with('error', 'Appointment with the same date and hour already exists.');
        }

        // Make sure the doctor_id refers to a user with isAdmin flag set
        $doctor = \App\Models\User::where('id', $request->doctor_id)->where('isAdmin', 1)->first();
        if (!$doctor) {
            return redirect()->route('appointments.index')->with('error', 'The selected doctor does not exist.');
        }

        $appointment = new Appointment($validatedData);
        $appointment->save();

        return redirect()->route('appointments.index')->with('success', 'Appointment created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $query = Appointment::query();

        if ($request->filled('doctor_id')) {
            $query->where('doctor_id', $request->doctor_id);
        }

        if ($request->filled('hour') && $request->filled('date')) {
            $query->where('hour', $request->hour)->where('date', $request->date);
        } elseif ($request->filled('hour')) {
            $query->where('hour', $request->hour);
        } elseif ($request->filled('date')) {
            $query->where('date', $request->date);
        }

        $appointments = $query->paginate(15);
        return view('appointments', compact('appointments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (auth()->user()->isAdmin != 1)

            return redirect('/appointments')->with('error', 'You are not admin!');
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();
        return redirect('/admin')->with('success', 'Student data is successfully deleted');
    }
}

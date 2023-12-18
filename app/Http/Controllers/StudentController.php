<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //        $students = Student::all();
        $students = Student::paginate(15);

        return view('index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //		die ($request->hasFile('picture'));

        if ($request->hasFile('picture')) {

            $fileName = time() . '.' . $request->picture->getClientOriginalExtension();

            $request->picture->move(public_path('pics'), $fileName);

            $request->merge(['file_name' => $fileName]);
        }

        $request->merge(['user_id' => auth()->user()->id]);


        $validatedData = $request->validate([
            'fn' => 'required|integer',
            'name' => 'required|max:255',
            'score' => 'required|integer|between:0,100',
            'file_name' => 'nullable',
            'user_id' => 'required|integer',
        ]);

        $student = Student::create($validatedData);

        return redirect('/students')->with('success', 'The Student is successfully saved');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (auth()->user()->isAdmin != 1)

            return redirect('/students')->with('error', 'You are not admin!');
        $student = Student::findOrFail($id);

        return view('edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (auth()->user()->isAdmin != 1)

            return redirect('/students')->with('error', 'You are not admin!');

        $validatedData = $request->validate([

            'fn' => 'required|numeric',
            'name' => 'required|max:255',
            'score' => 'required|integer|between:0,100',

        ]);

        Student::whereId($id)->update($validatedData);

        return redirect('/students')->with('success', 'Student data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (auth()->user()->isAdmin != 1)

            return redirect('/students')->with('error', 'You are not admin!');
        $student = Student::findOrFail($id);

        $student->delete();

        return redirect('/students')->with('success', 'Student data is successfully deleted');
    }
}

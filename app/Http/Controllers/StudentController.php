<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Address;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $students = Student::with('address')->get();
        //return $students;
        return view('students.index')->with('students', $students);
    }
 
    
    public function create()
    {
        return view('students.create');
    }
 
  
    public function store(Request $request)
    {
        $request->validate([
            'studname' => 'required',
            'course' => 'required',
            'fee' => 'required'
        ]);

        try{
            $student = Student::create($request->all());
            $stud = Student::where('studname',$request->studname)->first();
            $data = [
                'student_id' => $stud->id,
                'country' => $request->input('country'),
                'city' => $request->input('city')
            ];
    
            $student->address()->create($data);
    
    
            return redirect()->route('students.index')->with('success', 'Student created successfully');
        }catch(\Throwable $excep){
            return $excep->getMessage();
        }

        
    }
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }
 
    
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }
 
  
    public function update(Request $request, Student $student)
    {
        $request->validate([]);

        $student->update([

            'studname' => $request->studname,
            'course' => $request ->course,
            'fee' => $request -> fee
        ]);

        $student->update([

            'studname' => $request->studname,
            'course' => $request ->course,
            'fee' => $request -> fee,
            'country' => $request -> student -> country,
            'city' => $request -> student -> city
        ]);

        $student->address()->update([

            'country' =>$request->country,
            'city' => $request->city
        ]);


        return redirect()->route('students.index')->with('success', 'Student updated successfully');
    }
 
  
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully');
    }
}

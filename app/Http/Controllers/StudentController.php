<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Student;
use Exception;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return json_encode(DB::table('students')->paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'course_id' => 'required'
        ]);

        Student::create($validated);
        return json_encode(["Message" => "Guardado con exito", $validated]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'course_id' => 'required'
        ]);
        try{
            $Student = Student::find($id);
            $Student->update($validated);

            return json_encode(["Message" => "Actualizado con exito", $Student]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $Student = Student::find($id);
            $Student->delete();
            return json_encode(["Message" => "Borrado con exito", $Student]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    //get Students By Course
    public function show(string $course_id)
    {
        return json_encode(DB::table('students')->where('course_id', $course_id)->get());
    }

    //get Students By Note
    public function getStudentsByNote(string $note)
    {
        $students = Student::whereHas('notes', function ($query) use ($note) {
            $query->where('note', $note);
        })->with('notes')->get();
    
        return $students;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Teacher;
use Exception;

class TeacherController extends Controller
{
    public function index()
    {
        return json_encode(DB::table('teachers')->paginate(10));
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

        Teacher::create($validated);
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
            $Teacher = Teacher::find($id);
            $Teacher->update($validated);

            return json_encode(["Message" => "Actualizado con exito", $Teacher]);
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
            $Teacher = Teacher::find($id);
            $Teacher->delete();
            return json_encode(["Message" => "Borrado con exito", $Teacher]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    //get Teacherss By Course
    public function show(string $course_id)
    {
        return json_encode(DB::table('teachers')->where('course_id', $course_id)->get());
    }
}

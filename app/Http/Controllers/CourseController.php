<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Course;
use Exception;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        return json_encode(DB::table('courses')->paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required'
        ]);

        Course::create($validated);
        return json_encode(["Message" => "Guardado con exito", $validated]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required'
        ]);
        try{
            $Course = Course::find($id);
            $Course->update($validated);

            return json_encode(["Message" => "Actualizado con exito", $Course]);
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
            $Course = Course::find($id);
            $Course->delete();
            return json_encode(["Message" => "Borrado con exito", $Course]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}

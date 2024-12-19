<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Note;

class NoteController extends Controller
{
    public function index()
    {
        return json_encode(DB::table('notes')->paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required',
            'course_id' => 'required',
            'note' => 'required'
        ]);

        Note::create($validated);
        return json_encode(["Message" => "Guardado con exito", $validated]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'note' => 'required'
        ]);
        try{
            $Note = Note::find($id);
            $Note->update($validated);

            return json_encode(["Message" => "Actualizado con exito", $Note]);
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
            $Note = Note::find($id);
            $Note->delete();
            return json_encode(["Message" => "Borrado con exito", $Note]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}

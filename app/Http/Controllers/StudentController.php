<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'dob' => 'required|date|before:' . Carbon::now()->addDay()->format('Y-m-d') . '',
            'id_teacher' => 'required',
        ]);
        $student = Student::find($request->id);
        if ($student === null) {
            abort(404);
        }
        $student->name = $request->name;
        $student->email = $request->email;
        $student->dob = $request->dob;
        $student->id_teacher = $request->id_teacher;
        $student->save();
        return redirect(url('/student'));
    }

    public function edit(Request $request, $id)
    {
        $student = Student::find($id);
        if ($student === null) {
            abort(404);
        }
        return view('content.student.edit', [
            'student' => $student // Correct variable name here
        ]);
    }



    public function delete(Request $request)
    {
        $idStudent = $request->id;
        $student = Student::find($idStudent);
        if ($student === null) {
            return response()->json([], 404);
        }
        $student->delete();
        return response()->json([], 200);
    }

    public function insert(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'dob' => 'required|date|before:' . Carbon::now()->addDay()->format('Y-m-d') . '',
            'id_teacher' => 'required',
        ]);
        #sudah tervalidasi
        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->dob = $request->dob;
        $student->id_teacher = $request->id_teacher;
        $student->save();
        return redirect(url('/student'));

    }

    public function list()
    {
        $students = Student::query()->paginate(5);
        return view('content.student.list', [
            'students' => $students
        ]);
    }

    public function add()
    {
        return view('content.student.add');
    }
}

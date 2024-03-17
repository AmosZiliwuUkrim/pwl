<?php

namespace App\Http\Controllers;


use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function changePassword()
    {
        return view('content.user.change-password');
    }

    public function updatePassword(Request $request)
    {
        $validate = $request->validate([
            'old_password' => 'required',
            'password' => 'min:6|required_with:password_confirmation',
            'password_confirmation' => 'min:6|required_with:password|same:password',
        ]);

        // Cek apakah password lama benar
        if (password_verify($request->old_password, Auth::user()->password)) {
            // Periksa apakah konfirmasi password sesuai dengan password baru
            if ($request->password == $request->password_confirmation) {
                $user = Auth::user();
                $user->password = password_hash($request->password, PASSWORD_DEFAULT);
                $user->save();
                return back()->with('berhasil', 'Password Berhasil diubah');
            } else {
                return back()->with('gagal', 'Konfirmasi Password tidak sesuai')->withErrors(['password_confirmation' => 'Konfirmasi Password tidak sesuai']);
            }
        }
        return back()->with('gagal', 'Gagal Mengubah Password');
    }


//    public function student()
//    {
//        $students = Student::query()
//            ->with('teacher')
//            ->paginate(1);
//        return view('student', [
//            'students' => $students
//        ]);
//    }
//
//    public function teacher()
//    {
//        $teachers = Teacher::with('students')
//            ->get();
//        return view('teacher', [
//            'teachers' => $teachers
//        ]);
//    }
//
//    public function index()
//    {
//        $name = "Cak Imin";
//        return view('test', [
//            'namaCawapres1' => $name
//        ]);
//    }
//
//    public function read($judul)
//    {
//        echo $judul;
//    }


}

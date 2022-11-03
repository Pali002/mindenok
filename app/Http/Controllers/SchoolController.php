<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;
use App\Models\School;


class SchoolController extends Controller {
    
    // public function listStudent() {

    //     $students = Student::with("course")->get();

    //     // foreach ($students as $student ) {

    //     //     echo "<pre>";
    //     //     print_r($student->name . " ");
    //     //     print_r($student->course->course);
    //     // }
    //     return view("list_student", [
            
    //         "students" => $students
    //     ]);
    // }
    public function index() {

        $students = Student::with("course")->get();

        return view("list_student", [
            "students" => $students
        ]);
    }

    public function newStudent() {
        return view("new_student");
    }

    public function storeStudent(REQUEST $request) {
        
        $course = $request->course;
        $courses = Course::where("name","php")->get();
        $course_id = 0;
        foreach($courses as $course)
            $course_id = $course->id;


        $student = new Student;
        $student->name=$request->name;
        $student->email=$request->email;
        $student->course_id= $course_id;
        $student->save();
        
        $request->session()->flash("succes","sikeres írás");
        return redirect("/");

    }
        public function showStudent(Request $request) {

            $name = $request->name;
            $student = Student::with("course")->where("name", $name)->get();

            return view("list_student", [
                "student" => $student
            ]);
        }

        public function showUpdateStudent(Request $request) {
            $name = $request->name;
            $student = Student::with("course")->where("name", $name)->get();

            return view("update-student", [
                "student" => $student
            ]);
        }

        public function updateStudent(Request $request) {
            $courese = $request->course;
            $course = Course::where("name", $course)->get();
            $course_id = 0;
            foreach($courses as $course)

                $course_id = $course->id;

            $student = Student::where("name", $request->name)->first();

            $student->name = $request->name;
            $student->email = $request->email;
            $student->course_id = $course_id;
            
            $student->save();
            return redirect("/");
        }

        public function deleteStudent(Request $request) {
            $student = Student::where("name", $request->name)->first();
            $id = $student->id;

            $student->delete($id);
            return redirect("/");
        }
};  

        



<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddResultController extends Controller {

    function getAllStudentsAndSubjects() {
        //get studentList
        $studentList = DB::table('users')
            ->selectRaw('users.id as student_id, users.name')
            ->where('users.type', '=', 2)
            ->get();
        //get subjectList
        $subjectList = DB::table('subjects')
            ->selectRaw('subjects.id as subject_id, subjects.subject')
            ->get();
        // Store subjectList in the session
        session()->put('subjectList', $subjectList);
        return view('addResult')
            ->with('studentList', $studentList)->with('subjectList', $subjectList);
    }

    function saveResult(Request $request) {
        // Retrieve subjectList from the session
        $subjectList = session()->get('subjectList');
        foreach ($subjectList as $data2) {
            $request->validate([
                'student' => 'required',
                $data2->subject => 'required'
            ]);
        }

        $resultsData = [];
        foreach ($subjectList as $subject) {
            // Retrieve marks from the request using subject names as keys
            $marks = $request->input($subject->subject);
            // Prepare data for each other subject
            $resultsData[] = [
                'user_id' => $request->student,
                'subject_id' => $subject->subject_id,
                'marks' => $marks,
            ];
        }
        // Insert multiple rows into the results table
        $result = Result::insert($resultsData);
        if (!$result) {
            return redirect()->route('addResultPage')->with("error", "Adding Result error!");
        }
        return redirect()->route('addResultPage')->with("success", "Result Added successfully!");
    }
}

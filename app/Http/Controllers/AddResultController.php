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
        $studentId = $request->input('student');

        foreach ($subjectList as $subject) {
            // Retrieve marks from the request using subject names as keys
            $marks = $request->input($subject->subject);

            // Check if result already exists for the given student and subject
            $existingResult = Result::where('user_id', $studentId)
                ->where('subject_id', $subject->subject_id)
                ->first();

            if ($existingResult) {
                // If result exists, update the existing record
                $existingResult->update(['marks' => $marks]);
            } else {
                // Prepare data for each other subject
                $resultsData[] = [
                    'user_id' => $request->student,
                    'subject_id' => $subject->subject_id,
                    'marks' => $marks,
                ];
            }
        }
        // Use the updateOrInsert method to handle both update and insert
        Result::upsert($resultsData, ['user_id', 'subject_id'], ['marks']);
        return redirect()->route('addResultPage')->with("success", "Result Added successfully!");
    }
}

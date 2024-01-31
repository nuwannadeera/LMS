<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ViewResultsController extends Controller {

    function goToResultView() {
        $resultList = DB::table('results')
            ->selectRaw('results.id as result_id, results.marks, 
            subjects.subject as subject_name')
            ->join('subjects', 'results.subject_id', '=', 'subjects.id')
            ->where('results.user_id', '=', Auth::id())
            ->get();
        return view('viewResults')->with('resultList', $resultList);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\StudyMode;
use Illuminate\Http\Request;

class StudyModeController extends Controller
{
    //
    function addMode(Request $request)
    {
      StudyMode::create([
          'name' => $request->name,
      ]);
      return back();
    }
    function deleteMode($mode){
        StudyMode::destroy($mode);
        return back();
    }

}

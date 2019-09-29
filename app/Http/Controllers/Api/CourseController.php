<?php

namespace App\Http\Controllers\Api;

use App\Course;
use App\Filters\Course\DifficultyFilter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Request $request)
    {
    	$courses = Course::with(['subjects'])->filter($request, $this->getFilters())->get();

        return response()->json($courses, 200);
    }

    protected function getFilters()
    {
    	return [
    		
    	];
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Course;
use App\Filters\Course\CourseFilters;
use App\Filters\Course\DifficultyFilter;
use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Request $request)
    {
    	return CourseResource::collection(
            Course::with(['subjects', 'users'])->filter($request, $this->getFilters())->paginate(2)

        );
    }

    public function filters()
    {
        return response()->json([ 
            'data' => CourseFilters::mappings()
        ], 200);
    }

    protected function getFilters()
    {
    	return [
    		
    	];
    }
}

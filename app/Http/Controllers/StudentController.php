<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    function students() {
        $data = Student::orderBy('id', 'desc')->paginate(10);
        // $data = Student::paginate(10);
        // return response()->json($data, 200);

        return response()->json([
            'status' => true,
            'message' => 'Data fetched successfully.',
            'data' => $data->items(),
            'pagination' => [
                'total' => $data->total(),
                'per_page' => $data->perPage(),
                'current_page' => $data->currentPage(),
                'last_page' => $data->lastPage(),
                'from' => $data->firstItem(),
                'to' => $data->lastItem(),
            ],
        ],200);
    }
}

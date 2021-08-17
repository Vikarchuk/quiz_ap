<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function show(Test $test)
    {
        $questions = $test->questions;
        $questions = $this->transform($questions);
        return response()->json(['test' =>$test, 'questions' => $questions]);
    }

    private function transform($collection) {
        return $collection->map(function($item) {
            return [
                'id' => $item->id,
                'description' => $item->description,
                'type' => $item->type,
            ];
        });
    }

}

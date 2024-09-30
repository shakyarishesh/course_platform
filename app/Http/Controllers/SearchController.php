<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class SearchController extends Controller
{
    public function test(Request $request)
{
    $userInput = $request->input('query');

    $process = new Process(['C:\\Python312\\python.exe', base_path('scripts/category.py'), $userInput]);

    $process->run();

    // Check if the process was successful
    if (!$process->isSuccessful()) {
        throw new ProcessFailedException($process);
    }

    $output = $process->getOutput();

    return response()->json(['result' => $output]);
}
}

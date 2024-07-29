<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Process as LaravelProcess;
use Symfony\Component\Process\Process as SymphonyProcess;

class CodeCompilerController
{
    public function index()
    {
        return view('interpreter.index');
    }

    public function compile(string $code) : string
    {
        $filePath = tempDir() . 'code.php';
        file_put_contents($filePath, $code);

        $process = new SymphonyProcess(["php $filePath"]);
        $process->run();

//        unlink($filePath);

        if ($process->isSuccessful()) {
            return json_encode([
                'result' => $process->getOutput(),
            ]);
        } else {
            return json_encode([
                'result' => [],
                'error' => $process->getErrorOutput(),
            ]);
        }
    }
}
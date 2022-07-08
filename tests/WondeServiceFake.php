<?php

namespace Tests;

class WondeServiceFake
{
    public $loggedIn = true;

    public function getTeacherWithClasses()
    {
        return $this->readStubs('employee')->data;
    }

    private function readStubs($fileName)
    {
        $stub = sprintf(__DIR__.'/responses/%s.json', $fileName);
        return json_decode(file_get_contents($stub));
    }

    public function login(): bool
    {
        return $this->loggedIn;
    }
}

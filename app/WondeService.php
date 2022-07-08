<?php

namespace App;

use GuzzleHttp\Exception\ClientException;
use Wonde\Client;
use Cache;

class WondeService
{
    /**
     * Wonde HTTP Client
     *
     * @var Client
     */
    private $wondeClient;

    public function __construct(Client $wondeClient)
    {
        $this->wondeClient = $wondeClient;
    }

    public function login(string $schoolId, string $teacherId): bool
    {
        try {
            $this->wondeClient->school($schoolId)->employees->get($teacherId);
            session([
                'schoolId' => $schoolId,
                'teacherId' => $teacherId
            ]);
            return true;
        } catch (ClientException $exception) {
            return false;
        }

        return false;
    }

    public function getTeacherWithClasses($cache = true): mixed
    {
        if ($cache) {
            return Cache::remember('teacher', 1000, function () {
                return $this->wondeClient->school($this->getSchoolId())->employees->get($this->getTeacherId(), ['classes']);
            });
        }

        return $this->wondeClient->school($this->getSchoolId())->employees->get($this->getTeacherId(), ['classes']);
    }

    public function getClassWithStudents(string $classId): mixed
    {
        $school = $this->wondeClient->school($this->getSchoolId());

        return $school->classes->get($classId, ['students', 'lessons.period']);
    }

    public function getSchool()
    {
        return $this->wondeClient->school($this->getSchoolId());
    }

    public function getSchools()
    {
        return $this->wondeClient->schools->all();
    }

    public function getClient(): Client
    {
        return $this->wondeClient;
    }

    public function getTeacherId(): string
    {
        return session('teacherId');
    }

    public function getSchoolId(): string
    {
        return session('schoolId');
    }
}

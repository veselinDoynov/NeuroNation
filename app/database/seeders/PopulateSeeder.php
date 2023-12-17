<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use function Webmozart\Assert\Tests\StaticAnalysis\uuid;

class PopulateSeeder extends Seeder
{
    public function run()
    {
        $userId = DB::table('users')->insertGetId([
            'username' => "NeuroNation",
            'password' => md5("password"),
        ]);

        $categoryOne = DB::table('categories')->insertGetId([
            'name' => "NeuroNation Category 1",
        ]);

        $categoryTwo = DB::table('categories')->insertGetId([
            'name' => "NeuroNation Category 2",
        ]);

        $courseOne = DB::table('courses')->insertGetId([
            'name' => "NeuroNation Course 1",
        ]);

        $courseTwo = DB::table('courses')->insertGetId([
            'name' => "NeuroNation Course 2",
        ]);

        $courseThree = DB::table('courses')->insertGetId([
            'name' => "NeuroNation Course 3",
        ]);

        $exerciseOneCatOne = DB::table('exercises')->insertGetId([
            'name' => "NeuroNation Exercise 1",
            'score' => 20,
            'category_id' => $categoryOne
        ]);

        $exerciseTwoCatOne = DB::table('exercises')->insertGetId([
            'name' => "NeuroNation Exercise 2",
            'score' => 50,
            'category_id' => $categoryOne
        ]);

        $exerciseThreeCaTwo = DB::table('exercises')->insertGetId([
            'name' => "NeuroNation Exercise 3",
            'score' => 25,
            'category_id' => $categoryTwo
        ]);

        $sessionUuid = md5("session1");

        $this->generateSession($sessionUuid, $courseOne, $exerciseOneCatOne, $userId, 5);
        $this->generateSession($sessionUuid, $courseOne, $exerciseTwoCatOne, $userId, 10);
        $this->generateSession($sessionUuid, $courseTwo, $exerciseThreeCaTwo, $userId, 15);
        $this->generateSession($sessionUuid, $courseThree, $exerciseThreeCaTwo, $userId, 6);

    }


    private function generateSession($sessionUuid, $courseId, $exerciseId, $userId, $score) {

        DB::table('sessions')->insertGetId([
            'identifier' => $sessionUuid,
            'course_id' => $courseId,
            'user_id' => $userId,
            'exercise_id' => $exerciseId,
            'score' => $score,
        ]);
    }
}

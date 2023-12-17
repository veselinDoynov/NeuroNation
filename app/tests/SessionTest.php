<?php

namespace Tests;

use App\Models\Category;
use App\Models\Course;
use App\Models\Exercise;
use App\Models\Session;
use App\Models\User;


class SessionTest extends TestCase
{

    public function testGetSessionSummary()
    {
        $this->json('GET', '/session/user/1')
            ->assertResponseOk();
    }

    public function testGetSessionSummaryPerCategory()
    {

        $this->json('GET', '/session/user/1/per-category')
            ->assertResponseOk();
    }

    public function testGetSessionDate()
    {

        $this->json('GET', '/session/user/1/session/fake')
            ->assertResponseOk();
    }

    public function testGetSessionSummaryFail()
    {

        $this->json('GET', '/session/user/10')
            ->assertResponseStatus(404);
    }

    public function testGetSessionSummaryPerCategoryFail()
    {

        $this->json('GET', '/session/user/10/per-category')
            ->assertResponseStatus(404);
    }

    public function testGetSessionDateFail()
    {

        $this->json('GET', '/session/user/10/session/fake')
            ->assertResponseStatus(404);
    }

}

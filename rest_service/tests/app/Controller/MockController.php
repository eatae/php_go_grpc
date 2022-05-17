<?php

namespace Tests\App\Controller;

use App\Controller\Controller;

class MockController extends Controller
{
    public function actionFoo(): string
    {
        return '';
    }

    public function actionDefault(): string
    {
        return '';
    }
}

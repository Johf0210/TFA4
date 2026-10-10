<?php

namespace App\Controllers;

use CodeIgniter\Controller;

abstract class BaseController extends Controller
{
    protected function render(string $view, array $data = [])
    {
        return view('layout', array_merge($data, ['content' => view($view, $data)]));
    }
}

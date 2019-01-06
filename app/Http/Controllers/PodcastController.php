<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessPodcast;

class PodcastController extends Controller
{
    public function index()
    {
        ProcessPodcast::dispatch();
        return ['status' => 'ok'];
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Quality;
use App\Models\Realisation;
use App\Models\Sponsor;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        $realisations = Realisation::all();
        $qualities = Quality::all();
        $sponsors = Sponsor::all();
        return Inertia::render('test',compact('realisations','qualities','sponsors'));
    }
}

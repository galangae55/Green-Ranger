<?php
// app/Http/Controllers/AcaraController.php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Volunteer;
use App\Models\DetailAcara;
use Illuminate\Http\Request;

class AcaraController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('date', 'asc')->paginate(4);
        return view('event', compact('events'));
    }

    public function show($slug)
    {
        $event = Event::where('slug', $slug)->firstOrFail();
        
        // Ambil detail acara jika ada
        $detail = $event->detail;
        
        // Ambil volunteer dengan status accepted untuk event tersebut
        $volunteers = Volunteer::where('status', 'accepted')
            ->where('event', $event->title) // Match dengan title event
            ->get(['username', 'umur', 'event', 'created_at']);

        return view('acara', compact('event', 'detail', 'volunteers'));
    }
}
<?php
// app/Http/Controllers/AcaraController.php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Volunteer;
use App\Models\DetailAcara;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AcaraController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('date', 'asc')->paginate(4);
        return view('event', compact('events'));
    }

    // Di AcaraController.php method show()
    public function show($slug)
    {
        $event = Event::with('detail')->where('slug', $slug)->firstOrFail();
        
        // Ambil detail acara jika ada
        $detail = $event->detail;
        
        // Pastikan schedule dan gallery berbentuk array dengan struktur baru
        if ($detail) {
            $detail->schedule = $detail->schedule ?? [];
            
            // Konversi struktur lama ke baru jika perlu
            if (!empty($detail->schedule)) {
                $scheduleArray = [];
                foreach ($detail->schedule as $key => $item) {
                    // Jika struktur lama (hanya activity), konversi ke struktur baru
                    if (isset($item['activity']) && !isset($item['title'])) {
                        $scheduleArray[] = [
                            'time' => $item['time'] ?? '',
                            'title' => $item['title'] ?? 'Aktivitas',
                            'description' => $item['description'] ?? ''
                        ];
                    } else {
                        $scheduleArray[] = [
                            'time' => $item['time'] ?? '',
                            'title' => $item['title'] ?? 'Aktivitas',
                            'description' => $item['description'] ?? ''
                        ];
                    }
                }
                $detail->schedule = $scheduleArray;
            }
            
            $detail->gallery = $detail->gallery ?? [];
        }
        
        // Ambil volunteer dengan status accepted untuk event tersebut
        $volunteers = Volunteer::where('status', 'accepted')
            ->where('event', $event->title)
            ->get(['username', 'umur', 'event', 'created_at']);

        return view('acara', compact('event', 'detail', 'volunteers'));
    }
}

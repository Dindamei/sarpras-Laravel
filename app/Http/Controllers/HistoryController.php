<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History; // Sesuaikan dengan model history jika ada

class HistoryController extends Controller
{
    // Menampilkan halaman history
    public function index()
    {
        $history = History::latest()->get(); // Ambil semua data history terbaru
        return view('history.history', compact('history'));
    }

    // Menampilkan detail history tertentu
    public function show($id)
    {
        $history = History::findOrFail($id);
        return view('history.show', compact('history'));
    }

    // Jika perlu fitur hapus history
    public function destroy($id)
    {
        $history = History::findOrFail($id);
        $history->delete();

        return redirect()->route('history.index')->with('success', 'History berhasil dihapus!');
    }
}

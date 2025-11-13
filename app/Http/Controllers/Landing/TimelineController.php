<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TimelineController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $timelines = [
            [
                'startDate' => '2025-11-10',
                'endDate' => '2025-11-12',
                'range' => '10-12 November',
                'name' => 'Registration',
                'description' => 'Periode pendaftaran calon ketua dan wakil ketua HMSI untuk periode mendatang',
                'icon' => 'user-plus',
            ],
            [
                'startDate' => '2025-11-13',
                'endDate' => '2025-11-14',
                'range' => '13-14 November',
                'name' => 'Extended Phase',
                'description' => 'Perpanjangan periode pendaftaran untuk memberikan kesempatan lebih luas kepada calon',
                'icon' => 'calendar-plus',
            ],
            [
                'startDate' => '2025-11-15',
                'endDate' => '2025-11-15',
                'range' => '15 November',
                'name' => 'Verification',
                'description' => 'Proses verifikasi kelengkapan berkas dan perbaikan data pendaftaran calon',
                'icon' => 'check-double',
            ],
            [
                'startDate' => '2025-11-16',
                'endDate' => '2025-11-16',
                'range' => '16 November',
                'name' => 'Announcement',
                'description' => 'Pengumuman calon yang lolos verifikasi administrasi',
                'icon' => 'bell',
            ],
            [
                'startDate' => '2025-11-17',
                'endDate' => '2025-11-17',
                'range' => '17 November',
                'name' => 'Draw Number',
                'description' => 'Pengundian nomor urut kandidat secara transparan dan adil',
                'icon' => 'dice-6',
            ],
            [
                'startDate' => '2025-11-18',
                'endDate' => '2025-11-18',
                'range' => '18 November',
                'name' => 'Publication',
                'description' => 'Pengumuman resmi kandidat yang akan bertarung dalam PEMIRA 2025',
                'icon' => 'file',
            ],
            [
                'startDate' => '2025-11-19',
                'endDate' => '2025-11-21',
                'range' => '19-21 November',
                'name' => 'Campaign',
                'description' => 'Periode publikasi video kampanye kandidat untuk memperkenalkan visi dan misi',
                'icon' => 'video',
            ],
            [
                'startDate' => '2025-11-22',
                'endDate' => '2025-11-22',
                'range' => '22 November',
                'name' => 'Debate Point',
                'description' => 'Sesi orasi dan tanya jawab langsung antara kandidat dengan konstituen',
                'icon' => 'microphone',
            ],
            [
                'startDate' => '2025-11-23',
                'endDate' => '2025-11-23',
                'range' => '23 November',
                'name' => 'Silent Period',
                'description' => 'Periode tenang sebelum pemilihan, tidak ada kegiatan kampanye',
                'icon' => 'volume-mute',
            ],
            [
                'startDate' => '2025-11-24',
                'endDate' => '2025-11-24',
                'range' => '24 November',
                'name' => 'Voting Day',
                'description' => 'Hari pelaksanaan pemilihan raya - suara Anda menentukan masa depan!',
                'icon' => 'calendar-check',
            ],
            [
                'startDate' => '2025-11-24',
                'endDate' => '2025-11-24',
                'range' => '24 November',
                'name' => 'Result',
                'description' => 'Pengumuman hasil pemilihan dan ketua terpilih',
                'icon' => 'bar-chart',
            ],
        ];

        return view('landing.timeline', compact('timelines'));
    }
}

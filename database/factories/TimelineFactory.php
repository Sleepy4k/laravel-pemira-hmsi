<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Timeline>
 */
class TimelineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $data = [
            [
                'startDate' => '11-10',
                'endDate' => '11-12',
                'range' => '10-12 November',
                'name' => 'Registration',
                'description' => 'Periode pendaftaran calon ketua dan wakil ketua HMSI untuk periode mendatang',
                'icon' => 'user-plus',
            ],
            [
                'startDate' => '11-13',
                'endDate' => '11-14',
                'range' => '13-14 November',
                'name' => 'Extended Phase',
                'description' => 'Perpanjangan periode pendaftaran untuk memberikan kesempatan lebih luas kepada calon',
                'icon' => 'calendar-plus',
            ],
            [
                'startDate' => '11-15',
                'endDate' => '11-15',
                'range' => '15 November',
                'name' => 'Verification',
                'description' => 'Proses verifikasi kelengkapan berkas dan perbaikan data pendaftaran calon',
                'icon' => 'check-double',
            ],
            [
                'startDate' => '11-16',
                'endDate' => '11-16',
                'range' => '16 November',
                'name' => 'Announcement',
                'description' => 'Pengumuman calon yang lolos verifikasi administrasi',
                'icon' => 'bell',
            ],
            [
                'startDate' => '11-17',
                'endDate' => '11-17',
                'range' => '17 November',
                'name' => 'Draw Number',
                'description' => 'Pengundian nomor urut kandidat secara transparan dan adil',
                'icon' => 'dice-6',
            ],
            [
                'startDate' => '11-18',
                'endDate' => '11-18',
                'range' => '18 November',
                'name' => 'Publication',
                'description' => 'Pengumuman resmi kandidat yang akan bertarung dalam PEMIRA 2025',
                'icon' => 'file',
            ],
            [
                'startDate' => '11-19',
                'endDate' => '11-21',
                'range' => '19-21 November',
                'name' => 'Campaign',
                'description' => 'Periode publikasi video kampanye kandidat untuk memperkenalkan visi dan misi',
                'icon' => 'video',
            ],
            [
                'startDate' => '11-22',
                'endDate' => '11-22',
                'range' => '22 November',
                'name' => 'Debate Point',
                'description' => 'Sesi orasi dan tanya jawab langsung antara kandidat dengan konstituen',
                'icon' => 'microphone',
            ],
            [
                'startDate' => '11-23',
                'endDate' => '11-23',
                'range' => '23 November',
                'name' => 'Silent Period',
                'description' => 'Periode tenang sebelum pemilihan, tidak ada kegiatan kampanye',
                'icon' => 'volume-mute',
            ],
            [
                'startDate' => '11-24',
                'endDate' => '11-24',
                'range' => '24 November',
                'name' => 'Voting Day',
                'description' => 'Hari pelaksanaan pemilihan raya - suara Anda menentukan masa depan!',
                'icon' => 'calendar-check',
            ],
            [
                'startDate' => '11-24',
                'endDate' => '11-24',
                'range' => '24 November',
                'name' => 'Result',
                'description' => 'Pengumuman hasil pemilihan dan ketua terpilih',
                'icon' => 'bar-chart',
            ]
        ];

        $currentTime = now();
        $currentYear = $currentTime->year;
        $uuids = collect(range(1, count($data)))
            ->map(fn() => (string) Str::uuid())
            ->sort()
            ->values()
            ->all();

        return array_map(function ($setting) use ($currentTime, $currentYear, &$uuids) {
            return [
                'id' => array_shift($uuids),
                'start_date' => $currentYear . '-' . $setting['startDate'] . ' 00:00:00',
                'end_date' => $currentYear . '-' . $setting['endDate'] . ' 23:59:59',
                'name' => $setting['name'],
                'description' => $setting['description'],
                'icon' => $setting['icon'],
                'range' => $setting['range'],
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
            ];
        }, $data);
    }
}

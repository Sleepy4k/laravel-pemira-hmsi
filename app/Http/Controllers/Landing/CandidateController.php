<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $candidates = Candidate::with(['missions', 'vision', 'programs'])->get();

        // $candidates = collect([
        //     [
        //         'number' => '01',
        //         'names' => 'Ahmad Firmansyah & Sari Indah',
        //         'photo_url' => 'https://images.unsplash.com/photo-1711993429175-83f6a2f5b848?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D?w=600',
        //         'programs' => [
        //             'Meningkatkan kualitas pendidikan di lingkungan kampus.',
        //             'Mengadakan pelatihan kewirausahaan bagi mahasiswa.',
        //             'Membangun fasilitas olahraga yang lebih lengkap.',
        //             'Mengoptimalkan penggunaan teknologi dalam proses pembelajaran.',
        //             'Meningkatkan kerjasama dengan industri untuk penempatan kerja mahasiswa.',
        //         ],
        //         'vision' => "Menciptakan generasi muda yang kompeten dan siap bersaing di era globalisasi. kami berkomitmen untuk membawa perubahan positif. lkkkkkkkkkkkkkkkmmmmmmmkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk",
        //         'mission' => [
        //             'Menyediakan sarana dan prasarana pendidikan yang memadai.',
        //             'Mendorong inovasi dan kreativitas di kalangan mahasiswa.',
        //             'Membangun jejaring yang kuat dengan berbagai pihak terkait.',
        //         ],
        //         'resume' => 'https://laravel-pemira-hmsi.test/resume_682b42d8a97a5.pdf',
        //         'attachment' => 'https://laravel-pemira-hmsi.test/resume_682b42d8a97a5.pdf',
        //     ],
        //     [
        //         'number' => '02',
        //         'names' => 'Budi Santoso & Lina Marlina',
        //         'photo_url' => 'https://images.unsplash.com/photo-1508214751196-bcfd4ca60f91?w=600',
        //         'programs' => [
        //             'Meningkatkan fasilitas perpustakaan dengan koleksi terbaru.',
        //             'Mengadakan seminar dan workshop rutin untuk pengembangan diri mahasiswa.',
        //             'Membangun komunitas seni dan budaya di kampus.',
        //             'Meningkatkan layanan kesehatan bagi mahasiswa.',
        //             'Mengembangkan program beasiswa untuk mahasiswa berprestasi.',
        //         ],
        //         'vision' => "Menjadi kampus yang unggul dalam mencetak lulusan berkualitas dan berkarakter. kami ingin memastikan bahwa setiap mahasiswa mendapatkan pengalaman terbaik.",
        //         'mission' => [
        //             'Meningkatkan kualitas sumber daya manusia di lingkungan kampus.',
        //             'Mendorong partisipasi aktif mahasiswa dalam kegiatan kampus.',
        //             'Membangun lingkungan kampus yang inklusif dan ramah bagi semua pihak.',
        //         ],
        //         'resume' => 'https://laravel-pemira-hmsi.test/resume_682b42d8a97a5.pdf',
        //         'attachment' => 'https://laravel-pemira-hmsi.test/resume_682b42d8a97a5.pdf',
        //     ],
        // ]);

        return view('landing.candidate', compact('candidates'));
    }
}

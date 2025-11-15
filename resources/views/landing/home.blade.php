<x-layout.landing title="Information Empowers Democracy">
    @pushOnce('vites')
        @vite(['resources/js/lib/boxicons.js', 'resources/js/addon/faq-page.js'])
    @endPushOnce

    <section class="hero">
        <div class="floating-avatar avatar1">🗳️</div>
        <div class="floating-avatar avatar2">👥</div>
        <div class="floating-avatar avatar3">💡</div>
        <div class="floating-avatar avatar4">✨</div>

        <div class="badge">
            <span>PEMIRA 2025</span>
        </div>

        <h1 class="hero-title">
            <span class="highlight underline">Information Empowers</span><br>
            Democracy
        </h1>

        <p class="hero-subtitle">
            Informed Minds, Empowered Votes! Suara Anda adalah kekuatan perubahan.
            Mari bersama membangun HMSI yang lebih baik dengan pilihan yang tepat dan berdasarkan informasi.
        </p>

        <div class="hero-buttons">
            <button class="btn-primary">Mulai Voting Sekarang</button>
            <button class="btn-secondary" id="view-candidates-btn" data-redirect="{{ route('candidates') }}">Lihat Kandidat</button>
        </div>
    </section>

    <section class="faq-container">
        <div class="faq-header">
            <div class="faq-badge">
                <i class="fas fa-question-circle"></i> Frequently Asked Questions
            </div>
            <h1 class="faq-title">Ada Pertanyaan?</h1>
            <p class="faq-subtitle">Temukan jawaban untuk pertanyaan umum seputar PEMIRA HMSI 2025. Jika pertanyaan Anda
                tidak terjawab di sini, jangan ragu untuk menghubungi kami.</p>
        </div>

        <div class="faq-grid" id="faqGrid">
            <div class="faq-item" data-category="umum">
                <div class="faq-question">
                    <div class="question-text">
                        <div class="question-icon"><box-icon name='info-circle' color='#16a085'></box-icon></div>
                        <div class="question-title">Apa itu PEMIRA HMSI?</div>
                    </div>
                    <div class="toggle-icon"><box-icon name='chevron-down' color='#16a085'></box-icon></div>
                </div>
                <div class="faq-answer">
                    <div class="answer-content">
                        <strong>PEMIRA</strong> (Pemilihan Raya) adalah agenda tahunan untuk memilih ketua dan wakil
                        ketua HMSI periode selanjutnya. Ini adalah momen penting dimana seluruh anggota HMSI memiliki
                        hak suara untuk menentukan pemimpin organisasi yang akan membawa visi dan misi untuk satu
                        periode ke depan.
                    </div>
                </div>
            </div>

            <div class="faq-item" data-category="umum">
                <div class="faq-question">
                    <div class="question-text">
                        <div class="question-icon">
                            <box-icon name='calendar' color='#16a085'></box-icon>
                        </div>
                        <div class="question-title">Kapan PEMIRA 2025 dilaksanakan?</div>
                    </div>
                    <div class="toggle-icon"><box-icon name='chevron-down' color='#16a085'></box-icon></div>
                </div>
                <div class="faq-answer">
                    <div class="answer-content">
                        PEMIRA HMSI 2025 akan dilaksanakan pada <strong>24 November 2025</strong>. Proses dimulai dari
                        pendaftaran pada 10 November hingga publikasi hasil pada hari yang sama dengan hari voting.
                    </div>
                </div>
            </div>

            <div class="faq-item" data-category="umum">
                <div class="faq-question">
                    <div class="question-text">
                        <div class="question-icon"><box-icon name='user' color='#16a085'></box-icon></div>
                        <div class="question-title">Siapa saja yang berhak mengikuti PEMIRA?</div>
                    </div>
                    <div class="toggle-icon"><box-icon name='chevron-down' color='#16a085'></box-icon></div>
                </div>
                <div class="faq-answer">
                    <div class="answer-content">
                        Semua mahasiswa aktif Program Studi Sistem Informasi yang terdaftar sebagai anggota HMSI berhak
                        untuk:
                        <ul>
                            <li><strong>Memilih:</strong> Memberikan suara dalam pemilihan</li>
                            <li><strong>Dipilih:</strong> Mencalonkan diri sebagai kandidat (dengan syarat tertentu)
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="faq-item" data-category="pendaftaran">
                <div class="faq-question">
                    <div class="question-text">
                        <div class="question-icon"><box-icon name='user-plus' color='#16a085'></box-icon></div>
                        <div class="question-title">Bagaimana cara mendaftar sebagai kandidat?</div>
                    </div>
                    <div class="toggle-icon"><box-icon name='chevron-down' color='#16a085'></box-icon></div>
                </div>
                <div class="faq-answer">
                    <div class="answer-content">
                        Untuk mendaftar sebagai kandidat:
                        <ul>
                            <li>Mendaftar pada periode 10-14 November 2025</li>
                            <li>Melengkapi formulir pendaftaran yang disediakan</li>
                            <li>Menyiapkan berkas persyaratan (KTM, transkrip nilai, dsb)</li>
                            <li>Mengajukan visi dan misi</li>
                            <li>Membentuk tim pasangan (ketua dan wakil ketua)</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="faq-item" data-category="voting">
                <div class="faq-question">
                    <div class="question-text">
                        <div class="question-icon"><box-icon name='upvote' color='#16a085'></box-icon></div>
                        <div class="question-title">Bagaimana cara melakukan voting?</div>
                    </div>
                    <div class="toggle-icon"><box-icon name='chevron-down' color='#16a085'></box-icon></div>
                </div>
                <div class="faq-answer">
                    <div class="answer-content">
                        Proses voting akan dilakukan secara:
                        <ul>
                            <li><strong>Online:</strong> Melalui platform voting yang akan diinformasikan kemudian</li>
                            <li>Setiap pemilih hanya dapat memberikan 1 suara</li>
                            <li>Voting dilaksanakan pada 24 November 2025</li>
                            <li>Gunakan kredensial yang telah diberikan</li>
                            <li>Pastikan koneksi internet stabil</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="faq-item" data-category="voting">
                <div class="faq-question">
                    <div class="question-text">
                        <div class="question-icon"><box-icon name='lock' color='#16a085'></box-icon></div>
                        <div class="question-title">Apakah voting dilakukan secara rahasia?</div>
                    </div>
                    <div class="toggle-icon"><box-icon name='chevron-down' color='#16a085'></box-icon></div>
                </div>
                <div class="faq-answer">
                    <div class="answer-content">
                        <strong>Ya, absolutely!</strong> Sistem voting dirancang untuk menjaga kerahasiaan pilihan
                        setiap pemilih. Identitas pemilih dan pilihan yang diberikan akan dijaga kerahasiaannya dan
                        hanya hasil akhir yang akan dipublikasikan.
                    </div>
                </div>
            </div>

            <div class="faq-item" data-category="voting">
                <div class="faq-question">
                    <div class="question-text">
                        <div class="question-icon"><box-icon name='trophy' color='#16a085'></box-icon></div>
                        <div class="question-title">Bagaimana cara menentukan pemenang?</div>
                    </div>
                    <div class="toggle-icon"><box-icon name='chevron-down' color='#16a085'></box-icon></div>
                </div>
                <div class="faq-answer">
                    <div class="answer-content">
                        Pemenang ditentukan berdasarkan:
                        <ul>
                            <li>Kandidat yang memperoleh suara terbanyak</li>
                            <li>Apabila ada seri, akan dilakukan voting ulang</li>
                            <li>Hasil akan dipublikasikan pada 24 November 2025</li>
                            <li>Keputusan panitia PEMIRA bersifat final</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="faq-item" data-category="voting">
                <div class="faq-question">
                    <div class="question-text">
                        <div class="question-icon"><box-icon name='question-mark' color='#16a085'></box-icon></div>
                        <div class="question-title">Apa yang harus dilakukan jika mengalami kendala saat voting?</div>
                    </div>
                    <div class="toggle-icon"><box-icon name='chevron-down' color='#16a085'></box-icon></div>
                </div>
                <div class="faq-answer">
                    <div class="answer-content">
                        Jika mengalami kendala:
                        <ul>
                            <li>Hubungi helpdesk panitia PEMIRA yang tersedia pada hari H</li>
                            <li>Screenshot error yang terjadi untuk mempermudah troubleshooting</li>
                            <li>Coba refresh browser atau gunakan browser lain</li>
                            <li>Pastikan kredensial yang digunakan benar</li>
                            <li>Laporkan segera agar dapat ditindaklanjuti</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="faq-item" data-category="umum">
                <div class="faq-question">
                    <div class="question-text">
                        <div class="question-icon"><box-icon name='phone' color='#16a085'></box-icon></div>
                        <div class="question-title">Bagaimana cara menghubungi panitia PEMIRA?</div>
                    </div>
                    <div class="toggle-icon"><box-icon name='chevron-down' color='#16a085'></box-icon></div>
                </div>
                <div class="faq-answer">
                    <div class="answer-content">
                        Anda dapat menghubungi panitia melalui:
                        <ul>
                            <li><strong>Email:</strong> pemira.hmsi@university.ac.id</li>
                            <li><strong>Instagram:</strong> @pemira.hmsi</li>
                            <li><strong>WhatsApp:</strong> Grup resmi PEMIRA HMSI 2025</li>
                            <li><strong>Langsung:</strong> Sekretariat HMSI pada jam kerja</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="no-results" id="noResults">
            <i class="fas fa-search"></i>
            <h3>Tidak ada hasil ditemukan</h3>
            <p>Coba gunakan kata kunci yang berbeda</p>
        </div>
    </section>
</x-layout.landing>

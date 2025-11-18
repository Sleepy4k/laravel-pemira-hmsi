<x-layout.landing title="Kandidat {{ date('Y') }}">
    @pushOnce('vites')
        @vite(['resources/js/lib/boxicons.js', 'resources/js/addon/candidate-landing-page.js', 'resources/css/addon/candidate.css'])
    @endPushOnce

    <div class="container">
        <div class="section-title">
            <h2>Kandidat Pasangan Calon</h2>
            <p>Pilih kandidat terbaik untuk masa depan yang lebih baik</p>
        </div>

        @foreach ($candidates as $candidate)
            <div class="candidate-card">
                <div class="card-content">
                    <div class="photo-section">
                        <div class="photo-wrapper">
                            <div class="candidate-number">{{ $candidate->number }}</div>
                            <img src="{{ $candidate->photo }}" alt="Kandidat {{ $candidate->number}}">
                        </div>
                        <div class="candidate-name">
                            <h3>{{ $candidate->name }}</h3>
                            <p>Ketua & Wakil Ketua</p>
                        </div>
                    </div>

                    <div class="info-section">
                        <div class="sub-section">
                            <h4><box-icon name='bullseye' color='#16a085'></box-icon> Visi</h4>
                            <p class="vision-text">
                                {{ Str::limit($candidate->vision->vision, 130, '...') }}
                            </p>
                        </div>
                        <div>
                            <h4><box-icon name='bullseye' color='#16a085'></box-icon> Misi</h4>
                            <ul class="info-list">
                                @foreach ($candidate->missions as $index => $mission)
                                    <li>
                                        <span class="number">{{ $index + 1 }}</span>
                                        <span>{{ $mission->point }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="info-section">
                        <h4><box-icon name='clipboard' color='#16a085'></box-icon> Program Kerja</h4>
                        <ul class="info-list">
                            @foreach ($candidate->programs as $index => $program)
                                <li>
                                    <span class="number">{{ $index + 1 }}</span>
                                    <span>{{ $program->point }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="button-section">
                        <button class="btn btn-pdf" id="download-resume-{{ $candidate->number }}"
                            data-url="{{ $candidate->resume }}">
                            <box-icon name='file-pdf' type='solid' color='#16a085'></box-icon>
                            <span>Download CV</span>
                        </button>
                        <button class="btn btn-visimisi" id="download-attachment-{{ $candidate->number }}"
                            data-url="{{ $candidate->attachment }}">
                            <box-icon name='file-pdf' type='solid' color='#16a085'></box-icon>
                            <span>Visi Misi & Proker</span>
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div id="pdf-modal" class="pdf-modal">
        <div class="pdf-modal-content" id="pdf-modal-content"></div>
    </div>
</x-layout.landing>

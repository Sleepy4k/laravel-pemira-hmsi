<x-layout.dashboard title="Candidates">
    @pushOnce('vites')
        @vite(['resources/css/lib/datatable.css', 'resources/js/lib/datatable.js', 'resources/js/handler/offcanvas.js', 'resources/js/addon/candidate-page.js'])
    @endPushOnce

    <header
        data-debug="{{ config('app.debug') ? 'true' : 'false' }}"
        data-routes='{
            "update": "{{ route('dashboard.candidates.update', ':id') }}",
            "destroy": "{{ route('dashboard.candidates.destroy', ':id') }}"
        }'
    ></header>

    <div class="mb-8 flex items-center justify-between">
        <h1 class="text-3xl font-bold text-neutral-900">
            List of Candidates
        </h1>
        <button id="add-new-record-btn" type="button" data-target="#add-new-record"
            class="inline-flex items-center gap-2 bg-primary-600 text-white px-4 py-2 rounded-lg font-medium hover:bg-primary-700 transition-colors cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                    clip-rule="evenodd" />
            </svg>
            Candidate
        </button>
    </div>

    {{ $dataTable->table() }}

    <x-canvas.wrapper id="add-new-record">
        <x-canvas.header title="New Record">
            <form id="add-candidate-form" class="space-y-4" method="POST">
                <div>
                    <label for="number" class="block text-sm font-semibold text-gray-700 mb-1.5">Candidate
                        Number</label>
                    <input type="number" id="number" placeholder="Enter candidate number" min="1" max="8"
                        class="w-full px-4 py-2.5 border border-gray-200 rounded-lg text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                </div>
                <div>
                    <label for="head_name" class="block text-sm font-semibold text-gray-700 mb-1.5">Head
                        Name</label>
                    <input type="text" id="head_name" placeholder="Enter head name"
                        class="w-full px-4 py-2.5 border border-gray-200 rounded-lg text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                </div>
                <div>
                    <label for="vice_name" class="block text-sm font-semibold text-gray-700 mb-1.5">Vice
                        Name</label>
                    <input type="text" id="vice_name" placeholder="Enter vice name"
                        class="w-full px-4 py-2.5 border border-gray-200 rounded-lg text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                </div>
                <div>
                    <label for="photo" class="block text-sm font-semibold text-gray-700 mb-1.5">Photo</label>
                    <img id="photo-preview" src="#" alt="Image Preview" class="hidden mb-2 max-h-40 rounded-lg" />
                    <input type="file" id="photo" accept="image/*"
                        class="w-full px-4 py-2.5 border border-gray-200 rounded-lg text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                </div>
                <div>
                    <label for="resume" class="block text-sm font-semibold text-gray-700 mb-1.5">Resume</label>
                    <input type="file" id="resume" accept=".pdf,.doc,.docx"
                        class="w-full px-4 py-2.5 border border-gray-200 rounded-lg text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" />
                    <div class="mt-2 text-sm text-gray-500">Accepted formats: .pdf, .doc, .docx</div>
                    <div id="resume-preview-container" class="mt-2 hidden">
                        <a id="resume-preview-link" href="#" target="_blank" class="text-blue-600 underline">View Uploaded Resume</a>
                    </div>
                </div>
                <div>
                    <label for="attachment" class="block text-sm font-semibold text-gray-700 mb-1.5">Visi Misi & Proker</label>
                    <input type="file" id="attachment" accept=".pdf,.doc,.docx"
                        class="w-full px-4 py-2.5 border border-gray-200 rounded-lg text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" />
                    <div class="mt-2 text-sm text-gray-500">Accepted formats: .pdf, .doc, .docx</div>
                    <div id="attachment-preview-container" class="mt-2 hidden">
                        <a id="attachment-preview-link" href="#" target="_blank" class="text-blue-600 underline">View Uploaded Visi Misi & Proker</a>
                    </div>
                </div>
            </form>
        </x-canvas.header>
        <x-canvas.footer :isCreate="true" />
    </x-canvas.wrapper>

    <x-canvas.wrapper id="show-record">
        <x-canvas.header title="Show Record">
            <div class="space-y-4">
                <div>
                    <h3 class="text-lg font-semibold text-gray-700 mb-1.5">Candidate Name</h3>
                    <p id="show-candidate-name" class="text-gray-600">Loading...</p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-700 mb-1.5">Description</h3>
                    <p id="show-candidate-description" class="text-gray-600">Loading...</p>
                </div>
            </div>
        </x-canvas.header>
        <x-canvas.footer type="show" />
    </x-canvas.wrapper>

    <x-canvas.wrapper id="edit-record">
        <x-canvas.header title="Edit Candidate">
            <form id="form-edit-record" class="space-y-4" method="PUT" action="#">
                <div>
                    <label for="edit-candidate-name" class="block text-sm font-semibold text-gray-700 mb-1.5">Candidate
                        Name</label>
                    <input type="text" id="edit-candidate-name" placeholder="Enter candidate name"
                        class="w-full px-4 py-2.5 border border-gray-200 rounded-lg text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                </div>
                <div>
                    <label for="edit-candidate-description"
                        class="block text-sm font-semibold text-gray-700 mb-1.5">Description</label>
                    <textarea id="edit-candidate-description" placeholder="Enter candidate description"
                        class="w-full px-4 py-2.5 border border-gray-200 rounded-lg text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"></textarea>
                </div>
            </form>
        </x-canvas.header>
        <x-canvas.footer />
    </x-canvas.wrapper>

    <form class="d-inline" id="form-delete-record" method="DELETE" action="#"></form>

    @pushOnce('scripts')
        {{ $dataTable->scripts(attributes: ['type' => 'module', 'nonce' => app('csp-nonce')]) }}
    @endPushOnce
</x-layout.dashboard>

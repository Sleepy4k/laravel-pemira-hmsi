<x-layout.dashboard title="Voters">
    @pushOnce('vites')
        @vite(['resources/css/lib/datatable.css', 'resources/js/lib/datatable.js', 'resources/js/handler/offcanvas.js', 'resources/js/addon/voter-page.js'])
    @endPushOnce

    <header data-debug="{{ config('app.debug') ? 'true' : 'false' }}"
        data-routes='{
            "update": "{{ route('dashboard.voters.update', ':id') }}",
            "destroy": "{{ route('dashboard.voters.destroy', ':id') }}"
        }'></header>

    <div class="mb-8 flex items-center justify-between">
        <h1 class="text-3xl font-bold text-neutral-900">
            List of Voters
        </h1>
        <button id="add-new-record-btn" type="button" data-target="#add-new-record"
            class="inline-flex items-center gap-2 bg-primary-600 text-white px-4 py-2 rounded-lg font-medium hover:bg-primary-700 transition-colors cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                    clip-rule="evenodd" />
            </svg>
            Voter
        </button>
    </div>

    {{ $dataTable->table() }}

    <x-canvas.wrapper id="add-new-record">
        <x-canvas.header title="New Record">
            <form class="space-y-4" method="POST" action="{{ route('dashboard.voters.store') }}"
                id="form-add-new-record">
                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-1.5">Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter voter name"
                        class="w-full px-4 py-2.5 border border-gray-200 rounded-lg text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                </div>
                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-1.5">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter voter email"
                        class="w-full px-4 py-2.5 border border-gray-200 rounded-lg text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                </div>
                <div>
                    <label for="batch_id" class="block text-sm font-semibold text-gray-700 mb-1.5">Batch</label>
                    <select id="batch_id" name="batch_id"
                        class="w-full px-4 py-2.5 border border-gray-200 rounded-lg text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                        <option value="" disabled selected>Select a batch</option>
                        @foreach ($batches as $batch)
                            <option value="{{ $batch->id }}">{{ $batch->name }}</option>
                        @endforeach
                    </select>
                </div>
            </form>
        </x-canvas.header>
        <x-canvas.footer :isCreate="true" />
    </x-canvas.wrapper>

    <x-canvas.wrapper id="show-record">
        <x-canvas.header title="Show Record">
            <div class="space-y-4">
                <div>
                    <h3 class="text-sm font-semibold text-gray-500 mb-1.5">Name</h3>
                    <p id="show-name" class="text-gray-700 text-body-lg">-</p>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-gray-500 mb-1.5">Email</h3>
                    <p id="show-email" class="text-gray-700 text-body-lg">-</p>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-gray-500 mb-1.5">Batch</h3>
                    <p id="show-batch" class="text-gray-700 text-body-lg">-</p>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-gray-500 mb-1.5">Voted At</h3>
                    <p id="show-voted-at" class="text-gray-700 text-body-lg">-</p>
                </div>
            </div>
        </x-canvas.header>
        <x-canvas.footer type="show" />
    </x-canvas.wrapper>

    <x-canvas.wrapper id="edit-record">
        <x-canvas.header title="Edit Candidate">
            <form id="form-edit-record" class="space-y-4" method="PUT" action="#">
                <div>
                    <label for="edit-name" class="block text-sm font-semibold text-gray-700 mb-1.5">Name</label>
                    <input type="text" id="edit-name" name="name" placeholder="Enter voter name"
                        class="w-full px-4 py-2.5 border border-gray-200 rounded-lg text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                </div>
                <div>
                    <label for="edit-email" class="block text-sm font-semibold text-gray-700 mb-1.5">Email</label>
                    <input type="email" id="edit-email" name="email" placeholder="Enter voter email"
                        class="w-full px-4 py-2.5 border border-gray-200 rounded-lg text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                </div>
                <div>
                    <label for="edit-batch_id" class="block text-sm font-semibold text-gray-700 mb-1.5">Batch</label>
                    <select id="edit-batch_id" name="batch_id"
                        class="w-full px-4 py-2.5 border border-gray-200 rounded-lg text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                        <option value="" disabled selected>Select a batch</option>
                        @foreach ($batches as $batch)
                            <option value="{{ $batch->id }}">{{ $batch->name }}</option>
                        @endforeach
                    </select>
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

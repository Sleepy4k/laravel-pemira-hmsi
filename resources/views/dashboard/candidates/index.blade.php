<x-layout.dashboard title="Candidates">
    @pushOnce('vites')
        @vite(['resources/css/lib/datatable.css', 'resources/js/lib/datatable.js', 'resources/js/handler/offcanvas.js'])
    @endPushOnce

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

    {{ $dataTable->table(['class' => 'w-full table-auto']) }}

    <x-canvas.wrapper id="add-new-record">
        <x-canvas.header title="New Record">
            <form id="add-candidate-form" class="space-y-4">
                <div>
                    <label for="candidate-name" class="block text-sm font-semibold text-gray-700 mb-1.5">Candidate
                        Name</label>
                    <input type="text" id="candidate-name" placeholder="Enter candidate name"
                        class="w-full px-4 py-2.5 border border-gray-200 rounded-lg text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                </div>
                <div>
                    <label for="candidate-description"
                        class="block text-sm font-semibold text-gray-700 mb-1.5">Description    </label>
                    <textarea id="candidate-description" placeholder="Enter candidate description"
                        class="w-full px-4 py-2.5 border border-gray-200 rounded-lg text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"></textarea>
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
            <form id="form-edit-record" class="space-y-4">
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
                <button type="submit"
                    class="w-full py-2.5 rounded-lg text-white font-medium hover:opacity-95 transition-opacity shadow-md cursor-pointer bg-gradient-to-br from-teal-700 via-teal-500 to-cyan-300">
                    Save Changes
                </button>
            </form>
        </x-canvas.header>
        <x-canvas.footer />
    </x-canvas.wrapper>

    @pushOnce('scripts')
        {{ $dataTable->scripts(attributes: ['type' => 'module', 'nonce' => app('csp-nonce')]) }}

        <script @cspNonce>
            document.addEventListener('DOMContentLoaded', function() {
                new OffcanvasHandler({
                    debug: {{ config('app.debug') ? 'true' : 'false' }},
                    tableId: '#candidate-table',
                    routes: {
                        update: "{{ route('dashboard.candidates.update', ':id') }}",
                        destroy: "{{ route('dashboard.candidates.destroy', ':id') }}"
                    },
                    offcanvas: {
                        add: {
                            id: '#add-new-record',
                            triggerBtnId: '#add-new-record-btn',
                        },
                        edit: {
                            id: '#edit-record',
                            fieldMap: {
                                first_name: '#edit-first_name',
                            },
                            fieldMapBehavior: {
                                first_name: function(el, data, rowData) {
                                    el.val(rowData.personal.first_name);
                                },
                            }
                        }
                    },
                });
            });
        </script>
    @endPushOnce
</x-layout.dashboard>

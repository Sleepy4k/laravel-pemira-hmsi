<x-layout.dashboard title="Profile Account">
    <nav class="mb-6">
        <div class="inline-flex items-center gap-1 p-1 bg-gray-50 border rounded-xl">
            <a href="{{ route('profile.account') }}"
                class="px-4 py-2 rounded-lg text-sm font-medium transition {{ request()->routeIs('profile.account') ? 'bg-blue-600 text-white shadow' : 'text-gray-600 hover:text-gray-900 hover:bg-white' }}">
                Account
            </a>
            <a href="#"
                class="px-4 py-2 rounded-lg text-sm font-medium transition {{ request()->routeIs('profile.settings') ? 'bg-blue-600 text-white shadow' : 'text-gray-600 hover:text-gray-900 hover:bg-white' }}">
                Settings
            </a>
            <a href="#"
                class="px-4 py-2 rounded-lg text-sm font-medium transition {{ request()->routeIs('profile.security') ? 'bg-blue-600 text-white shadow' : 'text-gray-600 hover:text-gray-900 hover:bg-white' }}">
                Security
            </a>
        </div>
    </nav>

    <section class="grid gap-6 md:grid-cols-3">
        <div class="p-6 bg-white border rounded-xl shadow-sm">
            <div class="flex items-center gap-4">
                <div
                    class="w-14 h-14 rounded-full bg-primary-500 text-white grid place-items-center text-lg font-semibold ring-2 ring-blue-100 shadow-sm">
                    {{ $initialName }}
                </div>
                <div>
                    <div class="font-semibold text-lg text-gray-900">{{ $user->name }}</div>
                    <div class="text-sm text-gray-500">{{ ucfirst($user->username) }}</div>
                </div>
            </div>
        </div>

        <div class="md:col-span-2 p-6 bg-white border rounded-xl shadow-sm">
            <h2 class="font-semibold text-gray-900 mb-4">Account Information</h2>
            <dl class="divide-y divide-gray-100">
                <div class="flex items-start justify-between py-3">
                    <dt class="text-xs uppercase tracking-wider text-gray-500">Name</dt>
                    <dd class="text-gray-900 font-medium">{{ $user->name }}</dd>
                </div>
                <div class="flex items-start justify-between py-3">
                    <dt class="text-xs uppercase tracking-wider text-gray-500">Username</dt>
                    <dd class="text-gray-900 font-medium">{{ ucfirst($user->username) }}</dd>
                </div>
                <div class="flex items-start justify-between py-3">
                    <dt class="text-xs uppercase tracking-wider text-gray-500">Member Since</dt>
                    <dd class="text-gray-900 font-medium">{{ $user->created_at->format('d M Y') }}</dd>
                </div>
            </dl>
        </div>
    </section>
</x-layout.dashboard>

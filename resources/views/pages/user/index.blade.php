<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <h1 class="text-2xl">User Page</h1>
                </div>

                @if ($user->isEmpty())
                    <p>No galleries available.</p>
                @else
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-12 py-3">No</th>
                                    <th scope="col" class="px-12 py-3">Nama</th>
                                    <th scope="col" class="px-12 py-3">Email</th>
                                    <th scope="col" class="px-12 py-3">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $index => $users)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row" class="px-12 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $index + 1 }}
                                        </th>
                                        <td class="px-12 py-4">{{ $users->name }}</td>
                                        <td class="px-12 py-4">{{ $users->email }}</td>
                                        <td class="px-12 py-4">
                                            <form action="{{ route('dashboard.user.destroy', $users->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>

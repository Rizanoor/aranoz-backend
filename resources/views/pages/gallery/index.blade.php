<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gallery') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <h1 class="text-2xl">Gallery Page</h1>
                    <a href="{{ route('dashboard.gallery.create') }}" class="text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">Create</a>
                </div>

                @if ($gallery->isEmpty())
                    <p>No galleries available.</p>
                @else
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-12 py-3">No</th>
                                    <th scope="col" class="px-12 py-3">Nama Product</th>
                                    <th scope="col" class="px-12 py-3">Photo</th>
                                    <th scope="col" class="px-12 py-3">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($gallery as $index => $gallerys)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row" class="px-12 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $index + 1 }}
                                        </th>
                                        <td class="px-12 py-4">{{ $gallerys->product->name }}</td>
                                        <td class="px-12 py-4"><img src="{{ Storage::url($gallerys->photos) }}" style="max-width: 40px;"></td>
                                        <td class="px-12 py-4">
                                            <form action="{{ route('dashboard.gallery.destroy', $gallerys->id) }}" method="POST" class="inline">
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

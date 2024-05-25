<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">

                <form action="{{ route('dashboard.product.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">nama
                            product</label>
                        <input type="name" id="name" name="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="input the name" required value="{{ old('name') ?? $item->name }}" />
                    </div>
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">category</label>
                        <select id="categories_id" name="categories_id"
                            class="block w-full mt-1 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                            <option value="">Choose Category</option>
                            @foreach ($category as $categories)
                            <option value="{{ $categories->id }}"
                                {{ $categories->id == $item->categories_id ? 'selected' : '' }}>
                                {{ $categories->name }}
                            </option>
                        @endforeach
                        </select>
                    </div>
                    <div class="mb-6">
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">price</label>
                        <input type="price" id="price" name="price"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="input the price" required value="{{ old('price') ?? $item->price }}"/>
                    </div>
                    <div class="mb-6">
                        <label for="availibility" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">availibility</label>
                        <input type="availibility" id="availibility" name="availibility"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="input the availibility" required value="{{ old('availibility') ?? $item->availibility }}"/>
                    </div>
               
                    <div class="mb-6">
                        <label for="short_description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">short description</label>
                        <textarea id="short_description" name="short_description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="input the short description...">{{ $item->short_description }}</textarea>
                    </div>
                    <div class="mb-6">
                        <label for="long_description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">long description</label>
                        <textarea id="long_description" name="long_description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="input the long description...">{{ $item->long_description }}</textarea>
                    </div>

                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

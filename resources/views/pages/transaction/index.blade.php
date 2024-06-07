<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Transaction') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <h1 class="text-2xl">Transaction Page</h1>
                </div>

                @if ($transaction->isEmpty())
                    <p>No transactions available.</p>
                @else
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-12 py-3">No</th>
                                    <th scope="col" class="px-12 py-3">Name</th>
                                    <th scope="col" class="px-12 py-3">Price</th>
                                    <th scope="col" class="px-12 py-3">Address</th>
                                    <th scope="col" class="px-12 py-3">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaction as $index => $transactions)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row"
                                            class="px-12 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $index + 1 }}
                                        </th>
                                        <td class="px-12 py-4">{{ $transactions->product->name }}</td>
                                        <td class="px-12 py-4">
                                            {{ number_format($transactions->transaction->total_price) }}</td>
                                        <td class="px-12 py-4">{{ $transactions->transaction->address }}</td>
                                        <td class="px-12 py-4">
                                            @php
                                                $statusClass = '';
                                                switch ($transactions->transaction->status) {
                                                    case 'PENDING':
                                                        $statusClass = 'bg-yellow-500 text-white';
                                                        break;
                                                    case 'SUCCESS':
                                                        $statusClass = 'bg-green-500 text-white';
                                                        break;
                                                    case 'CANCELLED':
                                                        $statusClass = 'bg-red-500 text-white';
                                                        break;
                                                    case 'FAILED':
                                                        $statusClass = 'bg-gray-500 text-white';
                                                        break;
                                                    case 'SHIPPING':
                                                        $statusClass = 'bg-blue-500 text-white';
                                                        break;
                                                    case 'SHIPPED':
                                                        $statusClass = 'bg-purple-500 text-white';
                                                        break;
                                                    default:
                                                        $statusClass = 'bg-gray-500 text-white';
                                                        break;
                                                }
                                            @endphp
                                            <span
                                                class="inline-block px-3 py-1 rounded-full text-sm font-semibold {{ $statusClass }}">
                                                {{ $transactions->transaction->status }}
                                            </span>
                                        </td>
                                      
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$transaction->links()}}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>

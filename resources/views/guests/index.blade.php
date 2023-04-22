<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Guests') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if ($guests->isEmpty())
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{ __('No records have been found!') }}
                    </div>
                </div>
            @else
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-4">
                    <table class="w-full text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Registration Date
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Full Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Phone Number
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($guests as $guest)
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="px-6 py-4 dark:text-white">
                                        {{ \Carbon\Carbon::parse($guest->created_at)->format('m-d-Y') }}
                                    </td>
                                    <td class="px-6 py-4 dark:text-white">
                                        {{ $guest->name }}
                                    </td>
                                    <td class="px-6 py-4 dark:text-white">
                                        {{ $guest->email }}
                                    </td>
                                    <td class="px-6 py-4 dark:text-white">
                                        {{ $guest->phone }}
                                    </td>
                                    <td class="px-6 py-4 dark:text-white">
                                        @if ($guest->is_present == '1')
                                            <form action="{{ route('guests.update', $guest->id) }}" method="POST">
                                                @method('PUT')
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $guest->id }}">
                                                <input type="hidden" name="is_present" value="0">
                                                <button type="submit"
                                                    class="bg-green-100 text-green-800 text-sm font-medium mr-2 px-2.5 py-0.5
                                                    rounded dark:bg-green-900 dark:text-green-300">PRESENT</button>
                                            </form>
                                        @else
                                            <form action="{{ route('guests.update', $guest->id) }}" method="POST">
                                                @method('PUT')
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $guest->id }}">
                                                <input type="hidden" name="is_present" value="1">
                                                <button type="submit"
                                                    class="bg-red-100 text-red-800 text-sm font-medium mr-2 px-2.5 py-0.5
                                                    rounded dark:bg-red-900 dark:text-red-300">MISSING</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

            @if ($message = Session::get('success'))
                <div id="toast-success"
                    class="fixed flex items-center justify-center w-full max-w-xs p-4 space-x-4 border border-green-500 text-gray-500 bg-white rounded-lg shadow top-5 right-5 space-x dark:text-gray-400 dark:bg-gray-800"
                    role="alert">
                    <div
                        class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Check icon</span>
                    </div>
                    <div class="ml-3 text-sm font-normal">{{ $message }}</div>
                    <button type="button"
                        class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                        data-dismiss-target="#toast-success" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            @endif

            <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>

        </div>
    </div>
</x-app-layout>

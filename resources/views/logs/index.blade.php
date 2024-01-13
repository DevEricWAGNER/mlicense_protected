<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard') }}
    </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="mx-auto max-w-10xl sm:px-6 lg:px-8">
            <div class="overflow-hidden ">
                <div class="flex flex-col p-6 text-gray-900 gap-9 dark:text-gray-100">
                    <div class="flex flex-col gap-3 p-3 bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                        <h3 class="text-xl font-bold">{{ __('Logs') }}</h3>
                        <table class="w-full mt-6 text-left whitespace-nowrap">
                            <colgroup>
                                <col class="w-full sm:w-4/12">
                                <col class="lg:w-4/12">
                                <col class="lg:w-2/12">
                                <col class="lg:w-1/12">
                                <col class="lg:w-1/12">
                            </colgroup>
                            <thead class="text-sm leading-6 text-white border-b border-white/10">
                                <tr>
                                    <th scope="col" class="px-3 py-2 font-semibold">#</th>
                                    <th scope="col" class="px-3 py-2 font-semibold">Category</th>
                                    <th scope="col" class="px-3 py-2 font-semibold">Title</th>
                                    <th scope="col" class="px-3 py-2 font-semibold">Text</th>
                                    <th scope="col" class="px-3 py-2 font-semibold">Time</th>
                                    <th scope="col" class="px-3 py-2 font-semibold">Settings</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-white/5">
                                @foreach ($logs as $log)
                                    <tr>
                                        <td class="px-3 py-5 font-semibold">
                                            <i class="mdi {{ $log->icon }} {{ $log->color }}"></i>
                                        </td>
                                        <td class="px-3 py-5 font-semibold">
                                            {{ $log->title}}
                                        </td>
                                        <td class="px-3 py-5 font-semibold">
                                            {{ $log->text }}
                                        </td>
                                        <td class="px-3 py-5 font-semibold">
                                            {{ $log->date }}
                                        </td>
                                        <td class="px-3 py-5 font-semibold">

                                        </td>
                                        <td class="flex gap-2 px-3 py-5 font-semibold">
                                            <form action="{{ route('logs.delete', $log) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="p-2 text-white bg-red-500 rounded-md hover:bg-red-400">Supprimer</button>
                                            </form>
                                            <a href="{{ route('logs.edit', $log) }}" class="p-2 text-white bg-blue-500 rounded-md hover:bg-blue-400">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

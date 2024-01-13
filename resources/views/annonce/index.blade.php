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
                        <div class="flex justify-between">
                            <h3 class="text-xl font-bold">{{ __('Annonces') }}</h3>
                            <a href="{{ route('annonce.create') }}" class="p-2 text-white capitalize bg-green-500 rounded-lg">Faire une Annonce</a>
                        </div>
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
                                    <th scope="col" class="px-3 py-2 font-semibold">Titre</th>
                                    <th scope="col" class="px-3 py-2 font-semibold">Data</th>
                                    <th scope="col" class="px-3 py-2 font-semibold">Auteur</th>
                                    <th scope="col" class="px-3 py-2 font-semibold">Status</th>
                                    <th scope="col" class="px-3 py-2 font-semibold">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-white/5">
                                @foreach ($annonces as $annonce)
                                    <tr>
                                        <td class="px-3 py-5 font-semibold">
                                            {{$annonce->id}}
                                        </td>
                                        <td class="px-3 py-5 font-semibold">
                                            {{ $annonce->title}}
                                        </td>
                                        <td class="px-3 py-5 font-semibold">
                                            {{ $annonce->data }}
                                        </td>
                                        <td class="px-3 py-5 font-semibold">
                                            {{ $annonce->author->name }}
                                        </td>
                                        <td class="px-3 py-5 font-semibold">
                                            @if ($annonce->public == 1)
                                            <span class="p-2 text-green-700 capitalize bg-green-300 rounded-lg">
                                                Public
                                            </span>
                                            @else
                                                <span class="p-2 text-red-700 capitalize bg-red-300 rounded-lg">
                                                    Privé
                                                </span>
                                            @endif
                                        </td>
                                        <td class="flex gap-2 px-3 py-5 font-semibold">
                                            <form action="{{ route('annonce.delete', $annonce) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="p-2 text-white bg-red-500 rounded-md hover:bg-red-400">Supprimer</button>
                                            </form>
                                            <a href="{{ route('annonce.edit', $annonce) }}" class="p-2 text-white bg-blue-500 rounded-md hover:bg-blue-400">Edit</a>
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

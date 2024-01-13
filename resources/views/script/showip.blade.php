<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-10xl sm:px-6 lg:px-8">
            <div class="overflow-hidden ">
                <div class="flex flex-col p-6 text-gray-900 gap-9 dark:text-gray-100">
                    <div class="flex flex-col p-3 bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                        <h3 class="text-3xl font-bold">{{ $script->script }}</h3>
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
                                    <th scope="col" class="px-3 py-2 font-semibold">Name</th>
                                    <th scope="col" class="px-3 py-2 font-semibold">IP</th>
                                    <th scope="col" class="px-3 py-2 font-semibold">Status</th>
                                    <th scope="col" class="px-3 py-2 font-semibold">Commentaire</th>
                                    <th scope="col" class="px-3 py-2 font-semibold">Date limite</th>
                                    <th scope="col" class="px-3 py-2 font-semibold">Paramètres</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-white/5">
                                @foreach ($licenses as $license)
                                <tr>
                                    <td class="px-3 py-5 font-semibold">
                                        {{$license->id}}
                                    </td>
                                    <td class="px-3 py-5 font-semibold">
                                        {{ $license->name}}
                                    </td>
                                    <td class="px-3 py-5 font-semibold">
                                        {{ $license->ip }}
                                    </td>
                                    <td class="px-3 py-5 font-semibold">
                                        @if ($license->status == 'active')
                                            <span class="px-4 py-2 text-green-700 capitalize rounded-lg">
                                                {{ $license->status }}
                                            </span>
                                        @else
                                            <span class="px-4 py-2 text-red-700 capitalize rounded-lg">
                                                {{ $license->status }}
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-3 py-5 font-semibold">
                                        {{ $license->variables }}
                                    </td>
                                    <td class="px-3 py-5 font-semibold">
                                        {{ date('d/m/Y', strtotime($license->deadline)) }}
                                    </td>
                                    <td class="flex gap-2 px-3 py-5 font-semibold">
                                        <form action="{{ route('license.delete', $license) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-4 py-2 text-white bg-red-500 rounded-md hover:bg-red-400">Supprimer</button>
                                        </form>
                                        <form action="{{ route('license.activation', $license) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            @if ($license->status == 'active')
                                                <button type="submit" class="px-4 py-2 text-white bg-red-500 rounded-md hover:bg-red-400">Do Deactivate</button>
                                            @else
                                                <button type="submit" class="px-4 py-2 text-white bg-green-500 rounded-md hover:bg-green-400">Do Activate</button>
                                            @endif
                                        </form>
                                        <a href="{{ route('license.edit', $license) }}" class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-400">Edit</a>
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

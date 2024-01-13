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
                    <div class="grid grid-cols-1 gap-9 sm:grid-cols-2 lg:grid-cols-4">
                        <div class="flex justify-between p-3 bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                            <div class="flex flex-col">
                                <span class="text-3xl font-bold">{{ Auth::user()->sc_count }}</span>
                                <span class="text-gray-500">Available Scripts</span>
                            </div>
                            <div class="relative">
                                <i
                                    class="fas fa-folder-plus absolute top-0 bottom-0 right-0 pt-[7px] text-5xl pr-3 text-blue-500"></i>
                            </div>
                        </div>
                        <div class="flex justify-between p-3 bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                            <div class="flex flex-col">
                                <span class="text-3xl font-bold">{{ Auth::user()->lc_count }}</span>
                                <span class="text-gray-500">Available Licenses</span>
                            </div>
                            <div class="relative">
                                <i
                                    class="fas fa-lock absolute top-0 bottom-0 right-0 pt-[7px] text-5xl pr-3 text-red-500"></i>
                            </div>
                        </div>
                        <div class="flex justify-between p-3 bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                            <div class="flex flex-col">
                                <span class="text-3xl font-bold">0</span>
                                <span class="text-gray-500">Script count</span>
                            </div>
                            <div class="relative">
                                <i
                                    class="fas fa-folder absolute top-0 bottom-0 right-0 pt-[7px] text-5xl pr-3 text-orange-400"></i>
                            </div>
                        </div>
                        <div class="flex justify-between p-3 bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                            <div class="flex flex-col">
                                @php
                                $permission = Auth::user()->permission;
                                if ($permission == 0){
                                $permission = 'None';
                                }elseif($permission == 1){
                                $permission = 'Bronze';
                                }elseif($permission == 2){
                                $permission = 'Silver';
                                }elseif($permission == 3){
                                $permission = 'Diamond';
                                }elseif($permission == 4){
                                $permission = 'Premium';
                                }elseif($permission == 5){
                                $permission = 'Admin';
                                }
                                @endphp
                                <span class="text-3xl font-bold">{{ $permission }}</span>
                                <span class="text-gray-500">Membership Status</span>
                            </div>
                            <div class="relative">
                                <i
                                    class="fas fa-user absolute top-0 bottom-0 right-0 pt-[7px] text-5xl pr-3 text-green-600"></i>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col gap-3 p-3 bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                        <h3 class="text-xl font-bold">{{ __('Annoucements') }}</h3>
                        @foreach ($annonces as $annonce)
                        <div class="flex items-center justify-between p-3 border-b border-b-gray-600">
                            <div class="flex gap-3">
                                <span class="p-3 text-xl bg-red-500 rounded-full"><i class="fas fa-bullhorn"></i></span>
                                <div>
                                    <h4 class="font-bold text-red-500">{{ $annonce->title }}</h4>
                                    <p class="text-gray-400">{{ $annonce->data }}</p>
                                </div>
                            </div>
                            <div>
                                <p class="text-gray-400">{{ $annonce->author->name }} {{ $annonce->created_at }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="flex flex-col gap-3 p-3 bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                        <h3 class="text-xl font-bold">{{ __('Mes Scripts') }}</h3>
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
                                    <th scope="col" class="px-3 py-2 font-semibold">Script</th>
                                    <th scope="col" class="px-3 py-2 font-semibold">IP Count</th>
                                    <th scope="col" class="px-3 py-2 font-semibold">Statut</th>
                                    <th scope="col" class="px-3 py-2 font-semibold">Comment</th>
                                    <th scope="col" class="px-3 py-2 font-semibold">Paramètres</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-white/5">
                                @foreach ($scripts as $script)
                                <tr>
                                    <td class="px-3 py-5 font-semibold">
                                        {{$script->id}}
                                    </td>
                                    <td class="px-3 py-5 font-semibold">
                                        {{ $script->script}}
                                    </td>
                                    <td class="px-3 py-5 font-semibold">
                                        @php
                                            $count = 0;
                                            foreach ($script->getLicenses as $key => $value) {
                                                $count++;
                                            }
                                        @endphp
                                        {{ $count }}
                                    </td>
                                    <td class="px-3 py-5 font-semibold">
                                        @if ($script->status == 'active')
                                            <span class="px-4 py-2 text-green-700 capitalize bg-green-300 rounded-lg">
                                                {{ $script->status }}
                                            </span>
                                        @else
                                            <span class="px-4 py-2 text-red-700 capitalize bg-red-300 rounded-lg">
                                                {{ $script->status }}
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-3 py-5 font-semibold">
                                        {{ $script->variables }}
                                    </td>
                                    <td class="flex gap-2 px-3 py-5 font-semibold">
                                        <a href="{{ route('license.addip', $script) }}" class="px-4 py-2 text-white bg-green-500 rounded-md hover:bg-green-400">Nouveau IP</a>
                                        <a href="{{ route('license.showips', $script) }}" class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-400">Voir les IPs</a>
                                        <form action="{{ route('script.delete', $script) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-4 py-2 text-white bg-red-500 rounded-md hover:bg-red-400">Supprimer</button>
                                        </form>
                                        <a href="{{ route('script.download', $script) }}" class="px-4 py-2 text-white bg-orange-500 rounded-md hover:bg-orange-400">Download</a>

                                        <form action="{{ route('script.activation', $script) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            @if ($script->status == 'active')
                                                <button type="submit" class="px-4 py-2 text-white bg-red-500 rounded-md hover:bg-red-400">Do Deactivate</button>
                                            @else
                                                <button type="submit" class="px-4 py-2 text-white bg-green-500 rounded-md hover:bg-green-400">Do Activate</button>
                                            @endif
                                        </form>
                                        <a href="{{ route('script.edit', $script) }}" class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-400">Edit</a>
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

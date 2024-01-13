<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-10xl sm:px-6 lg:px-8">
            <div class="overflow-hidden ">
                <div class="flex flex-col p-6 text-gray-900 gap-9 dark:text-gray-100">
                    <div class="flex flex-col p-3 bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                        <h3 class="text-3xl font-bold">Créer une License</h3>
                        <form action="{{ route('license.store') }}" method="POST" class="flex flex-col gap-3">
                            @csrf
                            @method('POST')

                            {{-- see all errors --}}
                            @if ($errors->any())
                                <div class="flex flex-col gap-2">
                                    @foreach ($errors->all() as $error)
                                        <span class="text-red-500">{{ $error }}</span>
                                    @endforeach
                                </div>
                            @endif
                            <div class="flex flex-col">
                                <label for="name" class="form-label">Nom pour la license <span class="text-red-500">*</span></label>
                                <input required type="text" class="bg-gray-600 rounded-md form-control" id="name" name="name" placeholder="es_extended" value="{{ old('name') }}">
                                @error('name')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <input type="hidden" name="script" value="{{ $script->id }}">
                            <div class="flex flex-col">
                                <label for="ip" class="form-label">IP <span class="text-red-500">*</span></label>
                                <input required type="text" class="bg-gray-600 rounded-md form-control" id="ip" name="ip" placeholder="es_extended" value="{{ old('ip') }}">
                                @error('ip')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="flex flex-col">
                                <label for="deadline" class="form-label">Date d'expiration <span class="text-red-500">*</span></label>
                                <input required type="date" class="bg-gray-600 rounded-md form-control" id="deadline" name="deadline" placeholder="es_extended" value="{{ old('deadline') }}">
                                @error('deadline')
                                <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="flex flex-col">
                                <label for="variables" class="form-label">Commentaire <span class="text-gray-600">(Optionnel)</span></label>
                                <textarea name="variables" class="bg-gray-600 rounded-md form-control" id="variables" cols="10" placeholder="Commentaire">{{ old('variables') }}</textarea>
                                @error('variables')
                                <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="px-5 py-2 bg-blue-600 rounded-lg w-fit">Ajouter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

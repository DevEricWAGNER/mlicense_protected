<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-10xl sm:px-6 lg:px-8">
            <div class="overflow-hidden ">
                <div class="flex flex-col p-6 text-gray-900 gap-9 dark:text-gray-100">
                    <div class="flex flex-col p-3 bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                        <h3 class="text-3xl font-bold">Faire une Annonce</h3>
                        <form action="{{ route('annonce.store') }}" method="POST" class="flex flex-col gap-3">
                            @csrf
                            @method('POST')
                            <div class="flex flex-col">
                                <label for="title" class="form-label">Titre <span class="text-red-500">*</span></label>
                                <input required type="text" class="bg-gray-600 rounded-md form-control" id="title" name="title" placeholder="es_extended" value="{{ old('title') }}">
                                @error('title')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="flex flex-col">
                                <label for="data" class="form-label">Message <span class="text-red-500">*</span></label>
                                <textarea required name="data" class="bg-gray-600 rounded-md form-control" id="data" cols="10" placeholder="Message de l'annonce">{{ old('data') }}</textarea>
                                @error('data')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="flex flex-col">
                                <label for="public" class="form-label">Public</label>
                                <select id="public" name="public" class="bg-gray-600 rounded-md">
                                  <option value="0" selected class="bg-gray-600">Privé</option> <!-- 0 ==> FALSE -->
                                  <option value="1" class="bg-gray-600">Public</option> <!-- 1 ==> TRUE -->
                                </select>
                                @error('public')
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

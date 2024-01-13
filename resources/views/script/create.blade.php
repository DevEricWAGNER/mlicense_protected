<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-10xl sm:px-6 lg:px-8">
            <div class="overflow-hidden ">
                <div class="flex flex-col p-6 text-gray-900 gap-9 dark:text-gray-100">
                    <div class="flex flex-col p-3 bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                        <h3 class="text-3xl font-bold">Créer un script</h3>
                        <form action="{{ route('script.store') }}" method="POST" class="flex flex-col gap-3">
                            @csrf
                            @method('POST')
                            <div class="flex flex-col">
                                <label for="script" class="form-label">Nom du script <span class="text-red-500">*</span></label>
                                <input required type="text" class="bg-gray-600 rounded-md form-control" id="script" name="script" placeholder="es_extended">
                            </div>
                            <div class="flex flex-col">
                                <label for="webhook" class="form-label">Discord Webhook <span class="text-red-500">*</span></label>
                                <input required type="text" class="bg-gray-600 rounded-md form-control" id="webhook" name="webhook" placeholder="https://discord.com/webhook/xxx">
                            </div>
                            <div class="flex flex-col">
                                <label for="serverside" class="form-label">Server Side Code <span class="text-red-500">*</span></label>
                                <textarea class="bg-gray-600 rounded-md form-control" id="serverside" name="serverside" placeholder="print('im working broo!')" rows="5" required></textarea>
                            </div>
                            <div class="flex flex-col">
                                <label for="variables" class="form-label">Commentaire</label>
                                <textarea class="bg-gray-600 rounded-md form-control" id="variables" name="variables" rows="3"></textarea>
                            </div>
                            <button type="submit" class="px-5 py-2 bg-blue-600 rounded-lg w-fit">Ajouter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

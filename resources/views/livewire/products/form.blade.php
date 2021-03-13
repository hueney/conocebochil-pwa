<div class=" md:mt-0 md:col-span-2">
    <form action="#" method="POST">
        <div class=" overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
                <div class="grid grid-cols-6 gap-6">


                    <input type="hidden"
                        class="mt-1 focus:ring-yellow-500 focus:border-yellow-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                        wire:model="supplier" value="{{$supplier}}">

                    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                        <label for="nombre_negocio" class="block text-sm font-medium text-gray-700">Titulo</label>
                        <input type="text"
                            class="mt-1 focus:ring-yellow-500 focus:border-yellow-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            wire:model="name">
                        @error('name') <span class="text-red-400">{{$message}}</span> @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-6 lg:col-span-6">
                        <label for="descrip" class="block text-sm font-medium text-gray-700">
                            Descripción
                        </label>
                        <div class="mt-1">
                            <textarea rows="3"
                                class="shadow-sm  focus:ring-yellow-500 focus:border-yellow-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"
                                placeholder="Escribe la descripción del producto..." wire:model="descrip"></textarea>
                        </div>
                        @error('descrip') <span class="text-red-400">{{$message}}</span> @enderror
                    </div>

                    <div class="col-span-3  lg:col-span-1">
                        <div class="col-span-3 ">
                            <label for="company_website" class="block text-sm font-medium text-gray-700">
                                Precio
                            </label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <span
                                    class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                                    $
                                </span>
                                <input type="text" name="company_website" id="company_website"
                                    class="focus:ring-yellow-500 focus:border-yellow-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                    wire:model="precio">
                            </div>
                            @error('precio') <span class="text-red-400">{{$message}}</span> @enderror
                        </div>
                    </div>

                    <fieldset class="col-span-6 sm:col-span-6 lg:col-span-3">
                        <label for="postal_code" class="block text-sm font-medium text-gray-700">Estatus</label>
                        <div class="mt-4 flex ">

                            <div class="flex items-center">
                                <input id="published" name="push_notifications" type="radio"
                                    class="focus:ring-yellow-500 h-4 w-4 text-yellow-600 border-gray-300"
                                    wire:model="status" value="PUBLISHED">
                                <label for="published" class="ml-3 block text-sm font-medium text-gray-700">
                                    Publicado
                                </label>
                            </div>
                            <div class="ml-4  flex items-center">
                                <input id="draft" name="push_notifications" type="radio"
                                    class="focus:ring-yellow-500 h-4 w-4 text-yellow-600 border-gray-300"
                                    wire:model="status" value="DRAFT">
                                <label for="draft" class="ml-3 block text-sm font-medium text-gray-700">
                                    Pausado
                                </label>
                            </div>
                        </div>
                        @error('status') <span class="text-red-400">{{$message}}</span> @enderror
                    </fieldset>

                    <div class="col-span-6 sm:col-span-6 lg:col-span-3">
                        <label class="block text-sm font-medium text-gray-700">
                            Imagen del producto
                        </label>
                        <div
                            class="mt-2 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                            <div class="space-y-1 text-center">

                                @if (($view == 'create' && $file ) || ($view == 'edit' && $file ))
                                Vista previa del logo:
                                <img src="{{ $file->temporaryUrl() }}" width-min="200px">
                                @else
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                    viewBox="0 0 48 48" aria-hidden="true">
                                    <path
                                        d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                @endif
                                <div class="flex  justify-center text-sm text-gray-600">
                                    <label for="file"
                                        class=" cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500 ">
                                        <span>Cargar Imagen del producto</span>
                                        <input id="file" name="file" type="file" class="sr-only" wire:model="file" > <br>
                                        <div wire:loading wire:target="file">
                                                <div class="flex items-center">
                                                    <img class="animate-spin -ml-1 mr-3 h-4 w-4 text-center text-white" src="{{asset('img/cargando.png')}}" alt="">
                                                    <span class="text-yellow-600">Subiendo...</span>

                                                </div>

                                        </div>
                                        @error('file') <span class="error">{{ $message }}</span> @enderror
                                    </label>

                                </div>
                                <p class="text-xs text-gray-500">
                                    PNG, JPG, JPEG up to 10MB

                                </p>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

        </div>
    </form>
</div>

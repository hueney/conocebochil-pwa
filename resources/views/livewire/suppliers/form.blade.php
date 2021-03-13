<div class=" md:mt-0 md:col-span-2">
    <form action="#" method="POST">
        <div class=" overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-2">
                        <label for="category" class="block text-sm font-medium text-gray-700">Categoria</label>
                        <select autocomplete="category"
                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm"
                            wire:model="category">
                            @error('category') <span>{{$message}}</span> @enderror
                            <option value="">Selecciona Su categoria</option>
                            @foreach ($categories as $cat)
                            <option value="{{$cat->id}}">{{$cat->name_cat}}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                        <label for="nombre_negocio" class="block text-sm font-medium text-gray-700">Nombre del
                            negocio</label>
                        <input type="text"
                            class="mt-1 focus:ring-yellow-500 focus:border-yellow-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            wire:model="nombre_negocio">
                        @error('nombre_negocio') <span class="text-red-400">{{$message}}</span> @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                        <label for="nombre_encargado" class="block text-sm font-medium text-gray-700">Nombre del
                            encargado</label>
                        <input type="text"
                            class="mt-1 focus:ring-yellow-500 focus:border-yellow-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            wire:model="nombre_encargado">
                        @error('nombre_encargado') <span class="text-red-400">{{$message}}</span> @enderror
                    </div>

                    <div class="col-span-6">
                        <label for="direccion" class="block text-sm font-medium text-gray-700">Dirección</label>
                        <input type="text" autocomplete="street-address"
                            class="mt-1 focus:ring-yellow-500 focus:border-yellow-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            wire:model="direccion">
                        @error('direccion') <span class="text-red-400">{{$message}}</span> @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                        <label for="ciudad" class="block text-sm font-medium text-gray-700">Ciudad</label>
                        <input type="text"
                            class="mt-1 focus:ring-yellow-500 focus:border-yellow-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            wire:model="ciudad">
                        @error('ciudad') <span class="text-red-400">{{$message}}</span> @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="state" class="block text-sm font-medium text-gray-700">Estado</label>
                        <input type="text"
                            class="mt-1 focus:ring-yellow-500 focus:border-yellow-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            wire:model="estado">
                        @error('estado') <span class="text-red-400">{{$message}}</span> @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="cp" class="block text-sm font-medium text-gray-700">Codigo postal</label>
                        <input type="text" autocomplete="postal-code"
                            class="mt-1 focus:ring-yellow-500 focus:border-yellow-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            wire:model="cp">
                        @error('cp') <span class="text-red-400">{{$message}}</span> @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="telefono" class="block text-sm font-medium text-gray-700">Telefono</label>
                        <input type="text"
                            class="mt-1 focus:ring-yellow-500 focus:border-yellow-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            wire:model="telefono">
                        @error('telefono') <span class="text-red-400">{{$message}}</span> @enderror
                    </div>

                    <fieldset class="col-span-6 sm:col-span-3 lg:col-span-2">
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

                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="productcant" class="block text-sm font-medium text-gray-700"> Cantidad de
                            productos</label>

                        <select autocomplete="productcant"
                            class="mt-1 block w-24 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm"
                            wire:model="productcant">
                            @error('productcant') <span>{{$message}}</span> @enderror

                            <option value="">cantidad</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
                            <option value="25">25</option>
                            <option value="30">30</option>
                            <option value="35">35</option>
                            <option value="40">40</option>

                        </select>

                    </div>

                    <!----file------>
                    <div class="col-span-6">
                        <label class="block text-sm font-medium text-gray-700">
                            Logo
                        </label>
                        <div
                            class="mt-2 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                            <div class="space-y-1 text-center">
                                @if (($view == 'create' && $file ) || ($view == 'edit' && $file ))
                                Vista previa del logo:
                                <img src="{{ $file->temporaryUrl() }}" width="200px">
                                @else
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                    viewBox="0 0 48 48" aria-hidden="true">
                                    <path
                                        d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                @endif
                                <div class="flex justify-center  text-sm text-gray-600">
                                    <label for="file-upload"
                                        class=" cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                        <span>Cargar archivo</span>
                                        <input id="file-upload" name="file-upload" type="file" class="sr-only"
                                            wire:model="file">
                                        @error('file') <span>{{$message}}</span> @enderror
                                    </label>

                                </div>
                                <p class="text-xs text-gray-500">
                                    PNG, JPG hasta 10MB
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form>
</div>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inicio') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="grid gap-4 justify-items-stretch grid-cols-1 md:grid-cols-3 lg:grid-cols-4">
                        @can('users_index')
                        <div class="p-6 shadow-xl flex justify-evenly  items-center   m-3 space-x-4 border-b-2 border-yellow-600  ">
                            <div class="flex-shrink-0">
                                <img  class="h-12 w-12" src="{{asset('img/customer.png')}}" alt="">
                            </div>
                            <div>
                                <div class="text-xl font-medium text-black">Usuarios</div>
                                <h1 class="font-bold text-4xl text-yellow-600 text-center">{{$users}}</h1>
                            </div>
                        </div>
                        @endcan

                        @can('suppliers_index')
                         <div class="p-6 shadow-xl flex justify-evenly  items-center   m-3 space-x-4 border-b-2 border-yellow-600 ">
                            <div class="flex-shrink-0">
                                <img  class="h-12 w-12" src="{{asset('img/inventory.png')}}" alt="">
                            </div>
                            <div>
                                <div class="text-xl font-medium text-black">Proveedores</div>
                                <h1 class="font-bold text-4xl text-yellow-600 text-center">{{$suppliers}}</h1>
                            </div>
                        </div>
                        @endcan

                        @can('products_index')
                         <div class="p-6 shadow-xl flex justify-evenly  items-center   m-3 space-x-4 border-b-2 border-yellow-600 ">
                            <div class="flex-shrink-0">
                                <img  class="h-12 w-12" src="{{asset('img/box.png')}}" alt="">
                            </div>
                            <div>
                                <div class="text-xl font-medium text-black">Productos</div>
                                <h1 class="font-bold text-4xl text-yellow-600 text-center">{{$products}}</h1>
                            </div>
                        </div>
                        @endcan

                        @can('categories_index')
                        <div class="p-6 shadow-xl flex justify-evenly  items-center   m-3 space-x-4 border-b-2 border-yellow-600 ">
                            <div class="flex-shrink-0">
                                <img  class="h-12 w-12" src="{{asset('img/categories.png')}}" alt="">
                            </div>
                            <div>
                                <div class="text-xl font-medium text-black">Categorias</div>
                                <h1 class="font-bold text-4xl text-yellow-600 text-center">{{$categories}}</h1>
                            </div>
                        </div>
                        @endcan

                        @can('clicks_index')
                         <div class="p-6 shadow-xl flex justify-evenly  items-center   m-3 space-x-4 border-b-2 border-yellow-600 ">
                            <div class="flex-shrink-0">
                                <img  class="h-12 w-12" src="{{asset('img/click.png')}}" alt="">
                            </div>
                            <div>
                                <div class="text-xl font-medium text-black">Clicks</div>
                                <h1 class="font-bold text-4xl text-yellow-600 text-center">{{$clicks}}</h1>
                            </div>
                        </div>
                        @endcan


                    </div>
            </div>
        </div>
    </div>

</x-app-layout>

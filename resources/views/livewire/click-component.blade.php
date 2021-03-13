<div>

    @section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Clicks-contacto') }}
    </h2>
    @endsection



    @include('livewire.components.edit_sin_createComponent')
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white  overflow-hidden shadow-xl sm:rounded-lg">
                <div>
                    @if (session())
                    @include('livewire.components.mensaje')
                    @endif
                </div>

                <div class="md:flex justify-center">
                    <div class="p-6 shadow-lg flex m-3 space-x-4 border-b-2 border-yellow-600 ">
                        <div class="flex-shrink-0">
                            <h1 class="font-bold text-4xl text-yellow-600 ">{{$clicksdia}}</h1>
                        </div>
                        <div>
                            <div class="text-xl font-medium  text-black">Clicks</div>
                            <p class="text-gray-500">Clicks del dia</p>
                        </div>
                    </div>
                    <div class="p-6 shadow-md flex m-3 space-x-4 border-b-2 border-yellow-600 ">
                        <div class="flex-shrink-0">

                            <h1 class="font-bold text-4xl text-yellow-600 ">{{$clicks}}</h1>
                        </div>
                        <div>
                            <div class="text-xl font-medium text-black">Total</div>
                            <p class="text-gray-500">Todos los clicks</p>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>

</div>

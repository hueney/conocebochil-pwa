<div>

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categorias') }}
                        </h2>
@endsection



    @include('livewire.components.createComponent')
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white  overflow-hidden shadow-xl sm:rounded-lg">
                <div >
                    @if (session())
                        @include('livewire.components.mensaje')
                    @endif
                </div>
                @include('livewire.components.search')
                @include('livewire.categories.table')
            </div>
        </div>
    </div>

</div>

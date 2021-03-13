<div>
   @section('header')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuario') }}
        </h2>
   @endsection



    @include('livewire.components.createComponent')
     <div class="pt-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white  overflow-hidden shadow-xl sm:rounded-lg">
                <div >
                    @if (session())
                        @include('livewire.components.mensaje')
                    @endif
                </div>
                @include('livewire.components.search')
                @include('livewire.users.table')
            </div>
        </div>
    </div>

</div>

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@endsection


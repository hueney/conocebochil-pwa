<header class="bg-white shadow">
                    <div class="flex items-center  justify-between max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        @yield('header')


                    </div>
</header>
@if($view == 'create' || $view == 'edit')
<div class="pt-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white  overflow-hidden shadow-xl sm:rounded-lg">
            <div class="bg-white px-4 py-3 border-t border-gray-200 text-gray-500 sm:px-6 ">
                @include("livewire.$modulo.$view")
            </div>
        </div>
    </div>
</div>
@endif

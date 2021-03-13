<header class="bg-white shadow">
                    <div class="flex items-center content-center justify-between max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        @yield('header')

                        @if($view == 'vacio')
                                <div class="">
                                            @if($products ?? '')
                                                @if (count($cant) < $user->supplier->productcant)
                                                <button wire:click="create()"
                                                    class="btn-create ">
                                                    <svg class="group-hover:text-light-red-600 text-light-red-500 mr-2" width="12" height="20"
                                                        fill="currentColor">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M6 5a1 1 0 011 1v3h3a1 1 0 110 2H7v3a1 1 0 11-2 0v-3H2a1 1 0 110-2h3V6a1 1 0 011-1z" />
                                                    </svg>
                                                    Nuevo
                                                </button>
                                                @endif
                                            @elseif ($categories ?? '' or $users)
                                                <button wire:click="create()"
                                                    class="btn-create ">
                                                    <svg class="group-hover:text-light-red-600 text-light-red-500 mr-2" width="12" height="20"
                                                        fill="currentColor">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M6 5a1 1 0 011 1v3h3a1 1 0 110 2H7v3a1 1 0 11-2 0v-3H2a1 1 0 110-2h3V6a1 1 0 011-1z" />
                                                    </svg>
                                                    Nuevo
                                                </button>
                                            @endif



                                </div>
                            @endif
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

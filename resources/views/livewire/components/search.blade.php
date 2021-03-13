<div class="flex  bg-white px-4 py-3 border-t border-gray-200 sm:px-6 ">
        <form class="relative w-full">
            <svg width="20" height="20" fill="currentColor" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />
            </svg>
            <input wire:model="search" class="focus:border-yellow-400 focus:ring-1 focus:ring-yellow-400 focus:outline-none w-full text-sm text-black placeholder-gray-500 border border-gray-200 rounded-md py-2 pl-10 " type="text" aria-label="Filter projects" placeholder="Buscar..." />
        </form>
        <form class=" ml-6">
            <select wire:model="perPage" class="focus:border-yellow-400 focus:ring-1 focus:ring-yellow-400 focus:outline-none outline-none text-gray-500 text-sm placeholder-gray-500 border border-gray-200 rounded-md py-2 pl-5">
                <option value="5">5 por página</option>
                <option value="10">10 por página</option>
                <option value="15">15 por página</option>
                <option value="25">25 por página</option>
                <option value="50">50 por página</option>
                <option value="100">100 por página</option>
            </select>

        </form>

        @if($search !== '')
            <button wire:click="clear"
                class="ml-6  items-center justify-center px-4 p-auto border  rounded-md shadow-sm text-sm font-medium text-red-600 bg-white hover:bg-red-500 hover:text-white">x</button>
        @endif
</div>

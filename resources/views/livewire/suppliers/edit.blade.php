<h2>Editar Proveedor</h2>
<div class="hidden sm:block" aria-hidden="true">
  <div class="py-5">
    <div class="border-t border-gray-200"></div>
  </div>
</div>

@include("livewire.suppliers.form")

<div class="px-4  text-left sm:px-6">
            <button class="btn-create"  wire:click="update">
              Actualizar
            </button>
            <button class="btn-cancelar"  wire:click="default">
              Cancelar
            </button>
</div>

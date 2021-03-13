<div>
    <section class="search">
    <div class=" container">
      <div class="box">
        <input wire:model="search" type="text" placeholder="Buscar negocio" class="src" autocomplete="off">

      </div>
    </div>
  </section>

  <section class="provider  section-provider ">
    <div class="container">
        @if($suppliers->count())
       @foreach ($suppliers as $supp)
       <a  href="{{ route('products.index', $supp->id) }}">
            <article class="provider-card  ">
                <img  loading="lazy" class="avatar" src="{{$supp->file_logo}}" alt="Logo">
                <aside>
                <h5>{{$supp->business_name}}</h5>
                <small>{{$supp->location->address.' '.$supp->location->city.' '. $supp->location->state.' '.$supp->location->cp }}</small>
                </aside>
            </article>
        </a>
        @endforeach
        @else
                <div class="search-nula container text-center ">
                    No hay resultados para la búsqueda "{{$search}}"
                </div>
        @endif
    </div>
  </section>

</div>



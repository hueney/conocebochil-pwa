@extends('layouts.conocebochil')

@section('title', 'productos')

@section('content')
  @if($products->count())
  <section class="products section">
    <div class="container">

      @foreach ($products as $product)
      <article class="product-card box-shadow-1">
        <div class="product-img">
          <img loading="lazy" src="{{asset($product->file)}}" alt="">
        </div>
        <aside class="product-info text-center">
          <h4>{{$product->name}}</h4>
          <small>{{$product->description}}</small>
          <h3>${{$product->precio}}</h3>

        </aside>
      </article>
      @endforeach
    </div>
  </section>
  <section class="contact section">
    <div class="container contactcontent">
      <h2 class="text-center pulse" >Haz tu pedido!!!</h2>
      <aside class="text-center redes">

        <a href="{{ route('whatsapp', $supplierpro->id) }}" target="_blank" >
            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	            viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                <path style="fill:#4CAF50;" d="M256.064,0h-0.128l0,0C114.784,0,0,114.816,0,256c0,56,18.048,107.904,48.736,150.048l-31.904,95.104
                l98.4-31.456C155.712,496.512,204,512,256.064,512C397.216,512,512,397.152,512,256S397.216,0,256.064,0z"/>
                <path style="fill:#FAFAFA;" d="M405.024,361.504c-6.176,17.44-30.688,31.904-50.24,36.128c-13.376,2.848-30.848,5.12-89.664-19.264
                C189.888,347.2,141.44,270.752,137.664,265.792c-3.616-4.96-30.4-40.48-30.4-77.216s18.656-54.624,26.176-62.304
                c6.176-6.304,16.384-9.184,26.176-9.184c3.168,0,6.016,0.16,8.576,0.288c7.52,0.32,11.296,0.768,16.256,12.64
                c6.176,14.88,21.216,51.616,23.008,55.392c1.824,3.776,3.648,8.896,1.088,13.856c-2.4,5.12-4.512,7.392-8.288,11.744
                c-3.776,4.352-7.36,7.68-11.136,12.352c-3.456,4.064-7.36,8.416-3.008,15.936c4.352,7.36,19.392,31.904,41.536,51.616
                c28.576,25.44,51.744,33.568,60.032,37.024c6.176,2.56,13.536,1.952,18.048-2.848c5.728-6.176,12.8-16.416,20-26.496
                c5.12-7.232,11.584-8.128,18.368-5.568c6.912,2.4,43.488,20.48,51.008,24.224c7.52,3.776,12.48,5.568,14.304,8.736
                C411.2,329.152,411.2,344.032,405.024,361.504z"/>
            </svg>
        </a>
        <a href="{{ route('llamar', $supplierpro->id) }}" target="_blank" >
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1"  x="0" y="0" viewBox="0 0 405.333 405.333" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g>
<path xmlns="http://www.w3.org/2000/svg" style="" d="M373.333,266.88c-24.696,0.048-49.241-3.856-72.704-11.563c-10.97-3.836-23.163-1.254-31.637,6.699  l-46.037,34.731c-49.441-24.823-89.557-64.931-114.389-114.368l33.813-44.928c8.537-8.543,11.59-21.136,7.915-32.64  C142.558,81.316,138.633,56.735,138.667,32c0-17.673-14.327-32-32-32H32C14.327,0,0,14.327,0,32  c0.235,206.089,167.244,373.098,373.333,373.333c17.673,0,32-14.327,32-32V298.88C405.333,281.207,391.006,266.88,373.333,266.88z" fill="#3d3d3d" data-original="#009688" class=""/>
<g xmlns="http://www.w3.org/2000/svg">
	<path style="" d="M394.667,170.667c-5.891,0-10.667-4.776-10.667-10.667   c-0.094-76.545-62.122-138.573-138.667-138.667c-5.891,0-10.667-4.776-10.667-10.667S239.442,0,245.333,0   c88.327,0.094,159.906,71.673,160,160C405.333,165.891,400.558,170.667,394.667,170.667z" fill="#456460" data-original="#455a64" class=""/>
	<path style="" d="M309.333,170.667c-5.891,0-10.667-4.776-10.667-10.667c0-29.455-23.878-53.333-53.333-53.333   c-5.891,0-10.667-4.776-10.667-10.667c0-5.891,4.776-10.667,10.667-10.667C286.571,85.333,320,118.763,320,160   C320,165.891,315.224,170.667,309.333,170.667z" fill="#456460" data-original="#455a64" class=""/>
</g>
</svg>
        </a>


      </aside>
    </div>
  </section>
  @else
  <div class="search-nula container text-center " style="margin-top: 120px">
    El proveedor no cuenta con productos o servicios!!
  </div>
  @endif
@endsection

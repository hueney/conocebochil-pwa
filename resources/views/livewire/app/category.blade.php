@extends('layouts.conocebochil')

@section('title', 'Inicio')



@section('content')
<section class="category  section ">
    <div class="container">

        @foreach ($categorias as $category)
        <a   href="{{ route('suppliers.index', $category->id) }}">
            <article class="hero-image box-shadow-1"
            style="--hero-image:url('{{$category->picture}}'); --hero-attachment:static;">
            <aside class="hero-image-opacity" style="--opacity-color:var(--black-alpha-color);">
                <div class="hero-image-content">
                <img class="icon"src="{{$category->file_icon}}" alt="">
                <h2>{{$category->name_cat}}</h2>
                </div>
            </aside>
            </article>
        </a>
        @endforeach
    </div>
  </section>
@endsection
@section('js')
    <script src="{{asset('pwa.js')}}"></script>
@endsection

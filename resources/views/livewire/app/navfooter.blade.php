
<header class="header">
    <section class="container">
      <nav class="menu">
        @if($supplierpro ?? '' or $supplier?? '')
        <a href="/"><svg width="28" height="28" viewBox="0 0 28 28" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path
              d="M26.9907 14.4413L14.9907 1.10797C14.4853 0.545307 13.5147 0.545307 13.0093 1.10797L1.00933 14.4413C0.655997 14.832 0.567997 15.3946 0.782663 15.876C0.995997 16.3573 1.47333 16.6666 2 16.6666H4.66666V26C4.66666 26.736 5.26266 27.3333 6 27.3333H10C10.7373 27.3333 11.3333 26.736 11.3333 26V20.6666H16.6667V26C16.6667 26.736 17.2627 27.3333 18 27.3333H22C22.7373 27.3333 23.3333 26.736 23.3333 26V16.6666H26C26.5267 16.6666 27.004 16.3573 27.2173 15.876C27.432 15.3946 27.344 14.8333 26.9907 14.4413Z" />
          </svg>
        </a>
        @endif

        <a href="{{ route('acerca.index') }}"><svg width="32" height="32" viewBox="0 0 32 32" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path
              d="M16 2.66669C8.648 2.66669 2.66666 8.64802 2.66666 16C2.66666 23.352 8.648 29.3334 16 29.3334C23.352 29.3334 29.3333 23.352 29.3333 16C29.3333 8.64802 23.352 2.66669 16 2.66669ZM16 26.6667C10.1187 26.6667 5.33333 21.8814 5.33333 16C5.33333 10.1187 10.1187 5.33335 16 5.33335C21.8813 5.33335 26.6667 10.1187 26.6667 16C26.6667 21.8814 21.8813 26.6667 16 26.6667Z" />
            <path d="M14.6667 14.6666H17.3333V22.6666H14.6667V14.6666ZM14.6667 9.33331H17.3333V12H14.6667V9.33331Z" />
          </svg>
        </a>
      </nav>
    </section>
  </header>


  <section class="logo-header ">
    <div class="container">
      <nav class="menu-logo">
        @if($supplierpro ?? '')
        <a  href="{{ route('suppliers.index', $supplierpro->category_id) }}">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M15 18L9 12L15 6" stroke="#E82C33" stroke-width="2" stroke-linecap="round"
              stroke-linejoin="round" />
          </svg>
        </a>
        @endif
        @if ($supplierpro ?? '')
            <div class="logo text-center ">
                <h3>{{$supplierpro->business_name}}</h3>

            </div>
        @else
            <a href="/" class="logo text-center ">
                <img class=" text-center conoce" src="{{asset('img/favicon.png')}}" alt="">
            </a>
        @endif
      </nav>
    </div>
  </section>

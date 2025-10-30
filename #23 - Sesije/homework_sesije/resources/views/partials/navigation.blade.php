<nav class="bg-blue-300 p-[10px] flex justify-center">
    <ul class="flex flex-col gap-[10px] p-[10px] cursor-pointer md:flex-row">
        <li class="hover:text-white"><a href="{{route('index')}}">Pocetna</a></li>
        <li class="hover:text-white"><a href="{{route('shop')}}">Prodavnica</a></li>
        
        <li class="hover:text-white"><a href="{{route('cart.index')}}">Korpa</a></li>
        <li class="hover:text-white"><a href="{{route('about')}}">O nama</a></li>
        <li class="hover:text-white"><a href="{{route('contact')}}">Kontakt</a></li>
        
        <li class="hover:text-white"><a href="{{route('product')}}">Dodaj proizvod</a></li>
        <li class="hover:text-white"><a href="{{route('product.index')}}">Proizvodi</a></li>
        <li class="hover:text-white"><a href="{{route('contact.index')}}">Kontakti</a></li>
        <li class="hover:text-white">
            @if(Illuminate\Support\Facades\Auth::check())
            <a href="{{route('logout')}}">Odjava</a>
        
            @else
                <a href="{{route('login')}}">Prijava</a>
            @endif
        </li>
    </ul>
</nav>
<nav class="flex justify-end p-[10px] gap-[10px] p-[15px] text-white text-bold">
   
    <a href="{{route('user.index')}}">Pocetna</a>
    @if(Illuminate\Support\Facades\Auth::check())
        <a href="{{route('logout')}}">Odjava</a>
    
    @else
        <a href="{{route('login')}}">Prijava</a>
    @endif

</nav>
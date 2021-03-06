<div class="fixed top-0 w-full py-4 px-4 md:px-12 flex justify-between items-center z-30 sticky-header {{request()->routeIs('home') ? '' : 'general-header'}}">
    <div class="min-w-max mr-8 md:mr-0">
        <a href="{{route('home')}}"><img width="80" src="/img/logo.jpg" alt=""></a>
    </div>

     <div class="w-full absolute top-20 left-0 bg-white md:bg-opacity-0 md:relative md:top-0 civanoglu-menu-items z-50 md:z-0">
         <ul class="md:flex justify-center">
             <li><a  class="inline-block p-4 text-white" href="{{route('properties')}}?type=0">Land</a></li>
             <li><a  class="inline-block p-4 text-white" href="{{route('properties')}}?type=2">{{__('Villa')}}</a></li>
             <li><a  class="inline-block p-4 text-white" href="{{route('properties')}}?type=1">Apartment</a></li>
             <li><a  class="inline-block p-4 text-white" href="{{route('page', 'about-us')}}">About Us</a></li>
             <li><a  class="inline-block p-4 text-white" href="{{route('page', 'contact-us')}}">Contact Us</a></li>
         </ul>
     </div>

    <div class="min-w-max mr-4 md:mr-10 text-2xl">
        <a href="{{route('currency-change', 'usd')}}" class="inline-block mr-5 text-white">$</a>
        <a href="{{route('currency-change', 'tl')}}" class="inline-block mr-5 text-white">₺</a>
    </div>

    <div class="min-w-max text-3xl">
        <a href="{{ LaravelLocalization::getLocalizedURL('en') }}">🏴</a>
        <a href="{{ LaravelLocalization::getLocalizedURL('tr') }}">🚩</a>
    </div>

    <div class="min-w-max ml-10 md:hidden">
        <button class="civanoglu-menu">
            <i class="text-white" data-feather="menu"></i>
        </button>
    </div>
</div>






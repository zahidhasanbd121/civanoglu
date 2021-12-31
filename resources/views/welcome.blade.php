<x-guest-layout>
    <div class="relative z-10 pt-52 pb-64 bg-cover bg-center opacity-50" style="background-image: url(/img/hero-bg.jpg)">
            <div class="absoulate h-full w-full bg-black opacity-30  top-0 left-0 z-10"></div>
            <div class="container relative z-20 text-white text-center text-2xl">
                <h2 class="font-bold text-5xl mb-8">Lorem ipsum dolor sit amet consectetur, <br> adipisicing elit. Eum, consectetur?</h2>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reprehenderit, asperiores.</p>
            </div>
    </div>

     <!-- Search From Area -->
     <div class="-mt-10">
         <div class="container">
            <div class="rounded-lg bg-white p-4 relative -m-10 z-30 shadow-lg home-search">
                @include('components.property-search-form', ['locations' => $locations])
            </div>
         </div>
     </div>
   

    <div class="py-32 text-center">
        <div class="container">
            <h2 class="font-bold text-4xl mb-6">Lorem ipsum dolor sit, amet consectetur <br> adipisicing elit. laudantium maxime <span class="underline">porro repellat.</span></h2>
            <p class="text-gray-500 text-2xl font-bold mb-7">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illum facilis recusandae debitis!</p>

            <a class="border-2 border-gray-700 rounded-2xl text-xl px-8 py-3 inline-block" href="">Strart The Searcing</a>

            <h2 class="font-bold text-4xl mt-12">Lorem ipsum dolor sit, amet consectetur <br> adipisicing elit. laudantium maxime</h2>
        </div>
    </div>
    
    <div class="container py-14">
        <h2 class="font-bold text-center text-5xl mb-10">Last added object</h2>
        <div class="flex flex-wrap -mx-2 justify-between mt-10">
        
           @foreach($latest_properties as $property)
                @include('components.single-property-card', ['property' => $property])
            @endforeach
            
       

        </div>
    </div>

</x-guest-layout>
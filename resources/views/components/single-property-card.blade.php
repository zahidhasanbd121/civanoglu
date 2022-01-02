            <div class="flex-1 mx-2 px-7 md:px-3 shadow-lg relative rounded-md mb-6">
                <a href="" class="absolute w-9 left-3 h-9 leading-10 self-center text-base top-3 bg-black text-white bg-opacity-25 text-center hover:bg-yellow-500 hover:text-white duration-200 rounded-full text-base"><i class="fa fa-heart-o"></i></a>
                <div class="py-20 bg-center" style="background-image: url('/img/hero-bg.jpg')"></div>
                <div class="p-3">
                    <h2 class="leading-0 text-base">{{$property->name}}</h2>
                    <h3 class="text-2xl py-3">{{$property->price}} TL</h3>
                    <div class="border-t-2">
                        <ul class="flex items-center -mx-1 my-4">
                            <li class="px-2 py-1 bg-blue-50 rounded-md text-xs mx-1 shadow-sm">7 bedrooms</li>
                            <li class="px-2 py-1 bg-blue-50 rounded-md text-xs mx-1 shadow-sm">5 bedrooms</li>
                            <li class="px-2 py-1 bg-blue-50 rounded-md text-xs mx-1 shadow-sm">1500 ft<sup>2</sup></li>
                       </ul>
                       <a href="{{route('single-property', $property->id)}}" class="btn w-full text-center">More details</a>
                    </div>
                </div>
            </div>
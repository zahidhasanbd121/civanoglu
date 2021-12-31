<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Add new property') }}
            </h2>

            <div class="min-w-max">
                <a href="{{route('dashboard-properties')}}" class="fullwidth-btn bg-green-500 py-2 px-4 text-white text-sm rounded">Back</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6">
                    <h3>Gallery Images</h3>
                    <div class="flex">
                        @foreach($property->gallery as $gallery)
                        <div style="min-width: 100px;" class="mr-4 relative">
                            <div class="flex items-center justify-between">
                                <img style="max-width: 100px" src="/uploads/{{$gallery->name}}" alt="">
                            </div>

                            <form method="post" action="{{route('delete-media', $gallery->id)}}" onsubmit="return confirm('Do you really want to delete the image');" class="absolute right-0 top-0"> @csrf
                                <button style="font-size: 8px" type="submit" class="text-white bg-red-600 px-3 py-1">Delete</button>
                            </form>
                        </div>
                        @endforeach
                    </div>
                </div>

                <form action="{{route('update-property', $property->id)}}" method="post" class="p-6 bg-white border-b border-gray-200" enctype="multipart/form-data"> 
                    @csrf
                    <div class="flex -mx-4 mb-6">
                        <div class="flex-1 px-4">
                            <label class="civanoglu-label" for="name">Title <span class="required-text">*</span></label>
                            <input class="civanoglu-input" type="text" id="name" name="name" value="{{$property->name}}" required>

                            @error('name')
                            <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                            @enderror
                        </div>
                        
                        <div class="flex-1 px-4">
                            <label class="civanoglu-label" for="name_tr">Title - Turkish <span class="required-text">*</span></label>
                            <input class="civanoglu-input" type="text" id="name_tr" name="name_tr" value="{{$property->name_tr}}" required>

                            @error('name_tr')
                            <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-6">
                            <label class="civanoglu-label" for="featured_image">Featured Image <span class="required-text">*</span></label>
                            <input class="civanoglu-input" type="file" id="featured_image" name="featured_image" required>

                            <div class="mt-3">
                                <img src="/uploads/{{$property->featured_image}}" alt="">
                            </div>

                            @error('featured_image')
                            <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                            @enderror
                    </div>

                    <div class="mb-6">
                        <label class="civanoglu-label" for="gallery_images">Gallery Images <span class="required-text">*</span></label>
                        <input class="civanoglu-input" type="file" id="gallery_images" name="gallery_images[]" multiple required>

                        @error('gallery_images')
                        <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                        @enderror
                    </div>
                    

                    <div class="flex -mx-4 mb-6">
                        <div class="flex-1 px-4">
                            <label class="civanoglu-label" for="location_id">Location <span class="required-text">*</span></label>
                            <select class="civanoglu-label" name="location_id" id="location_id" required>
                                <option value="">Select location</option>
                                @foreach($locations as $location)
                                    <option {{$property->location->id == $location->id ? 'selected="selected"' : ''}} value="{{$location->id}}">{{$location->name}}</option>
                                @endforeach
                            </select>

                            @error('location_id')
                            <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                            @enderror
                        </div>
                        
                        <div class="flex-1 px-4">
                            <label class="civanoglu-label" for="price">Price <span class="required-text">*</span></label>
                            <input class="civanoglu-input" type="number" id="price" name="price" value="{{$property->price}}" required>

                            @error('price')
                            <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="flex-1 px-4">
                            <label class="civanoglu-label" for="sale">For <span class="required-text">*</span></label>
                            <select class="civanoglu-label" name="sale" id="sale" required>
                                <option value="">Select type</option>
                                <option {{$property->sale == '0' ? 'selected="selected"' : ''}} value="0">Rent</option>
                                <option {{$property->sale == '1' ? 'selected="selected"' : ''}} value="1">Sale</option>
                            </select>

                            @error('sale')
                            <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                            @enderror
                        </div>
                        
                        <div class="flex-1 px-4">
                            <label class="civanoglu-label" for="type">Type <span class="required-text">*</span></label>
                            <select class="civanoglu-label" name="type" id="type" required>
                                <option  value="">Select property type</option>
                                <option {{$property->type == '0' ? 'selected="selected"' : ''}} value="0">Land</option>
                                <option {{$property->type == '1' ? 'selected="selected"' : ''}} value="1">Villa</option>
                                <option {{$property->type == '2' ? 'selected="selected"' : ''}}  value="2">Apartment</option>
                            </select>

                            @error('type')
                            <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex -mx-4 mb-6">

                    <div class="flex-1 px-4">
                            <label class="civanoglu-label" for="drawing_rooms">Drawing rooms</label>
                            <select class="civanoglu-input"  name="drawing_rooms" id="drawing_rooms">
                                <option value="">Select one</option>

                                @for($x = 0; $x <= 3; $x++)
                                    <option {{$property->drawing_rooms == $x ? 'selected="selected"' : ''}} value="{{$x}}">{{$x}}</option>
                                @endfor
                            </select>

                            @error('drawing_rooms')
                            <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="flex-1 px-4">
                            <label class="civanoglu-label" for="bedrooms">Bedrooms</label>
                            <select class="civanoglu-label" name="bedrooms" id="bedrooms">
                                <option value="">Select bedrooms</option>
                                <option value="1+1">1+1</option>
                                <option value="2+1">2+1</option>
                                <option value="3+1">3+1</option>
                                <option value="4+1">4+1</option>
                                <option value="5+1">5+1</option>
                                <option value="6+1">6+1</option>
                                <option value="">Select one</option>
                                @for($x = 0; $x <= 3; $x++)
                                    <option {{$property->bedrooms == $x ? 'selected="selected"' : ''}} value="{{$x}}">{{$x}}</option>
                                @endfor
                            </select>

                            @error('bedrooms')
                            <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                            @enderror
                        </div>
                        
                        <div class="flex-1 px-4">
                            <label class="civanoglu-label" for="bathrooms">Bathrooms</label>
                            <select class="civanoglu-label" name="bathrooms" id="bathrooms">
                                <option value="">Select bathrooms</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="">Select one</option>
                                @for($x = 0; $x <= 5; $x++)
                                    <option {{$property->bathrooms == $x ? 'selected="selected"' : ''}} value="{{$x}}">{{$x}}</option>
                                @endfor
                            </select>

                            @error('bathrooms')
                            <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="flex-1 px-4">
                            <label class="civanoglu-label" for="net_sqm">Net square meeter <span class="required-text">*</span></label>
                            <input class="civanoglu-input" type="number" id="net_sqm" name="net_sqm" value="{{$property->net_sqm}}" required>

                            @error('net_sqm')
                            <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="flex-1 px-4">
                            <label class="civanoglu-label" for="grass_sqm">Gross square meeter</label>
                            <input class="civanoglu-input" type="number" id="grass_sqm" name="grass_sqm" value="{{$property->grass_sqm}}">

                            @error('grass_sqm')
                            <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="flex-1 px-4">
                            <label class="civanoglu-label" for="type">Pool</label>
                            <select class="civanoglu-label" name="type" id="type">
                                <option value="">Select pool</option>
                                <option {{$property->pool == '0' ? 'selected="selected"' : ''}} value="0">No</option>
                                <option {{$property->pool == '1' ? 'selected="selected"' : ''}} value="1">Private</option>
                                <option {{$property->pool == '2' ? 'selected="selected"' : ''}} value="2">Public</option>
                                <option {{$property->pool == '3' ? 'selected="selected"' : ''}} value="3">Both</option>
                            </select>

                            @error('type')
                            <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                            @enderror
                        </div>
                        
                    </div>

                    <div class="flex -mx-4 mb-6">
                        <div class="flex-1 px-4">
                            <label class="civanoglu-label" for="overview">Overview <span class="required-text">*</span></label>
                            <textarea class="civanoglu-input" name="overview" id="overview" cols="30" rows="3" required>{{$property->overview}}</textarea>

                            @error('overview')
                            <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                            @enderror
                        </div>
                        
                        <div class="flex-1 px-4">
                            <label class="civanoglu-label" for="overview_tr">Overview - tr <span class="required-text">*</span></label>
                            <textarea class="civanoglu-input" name="overview_tr" id="overview_tr" cols="30" rows="3" required>{{$property->overview_tr}}</textarea>

                            @error('overview_tr')
                            <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="flex -mx-4 mb-6">
                        <div class="flex-1 px-4">
                            <label class="civanoglu-label" for="why_buy">Why buy <span class="required-text">*</span></label>
                            <textarea class="civanoglu-input" name="why_buy" id="why_buy" cols="30" rows="5" required>{{$property->why_buy}}</textarea>

                            @error('why_buy')
                            <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                            @enderror
                        </div>
                        
                        <div class="flex-1 px-4">
                            <label class="civanoglu-label" for="why_buy_tr">Why buy - tr <span class="required-text">*</span></label>
                            <textarea class="civanoglu-input" name="why_buy_tr" id="why_buy_tr" cols="30" rows="5" required>{{$property->why_buy_tr}}</textarea>

                            @error('why_buy_tr')
                            <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex -mx-4 mb-6">
                        <div class="flex-1 px-4">
                            <label class="civanoglu-label" for="description">Description <span class="required-text">*</span></label>
                            <textarea class="civanoglu-input" name="description" id="description" cols="30" rows="10" required>{{$property->description}}</textarea>

                            @error('description')
                            <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                            @enderror
                        </div>
                        
                        <div class="flex-1 px-4">
                            <label class="civanoglu-label" for="description_tr">Description - tr <span class="required-text">*</span></label>
                            <textarea class="civanoglu-input" name="description_tr" id="description_tr" cols="30" rows="10" required>{{$property->description_tr}}</textarea>

                            @error('description_tr')
                            <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                            @enderror
                        </div>
                    </div>

                    <button class="btn" type="submit">Save Property</button>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>

        

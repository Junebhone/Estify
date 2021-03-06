<x-main-layout>
    <x-main-heading>
        <div class="flex justify-center w-full">
            <div class="w-full flex items-center">
                <div class=" py-3 px-6 flex items-center rounded-full border border-gray-300 shadow-sm  gap-5">
                    <div class="border-r-[1px] pr-5 border-gray-300">
                        <p class="text-base font-semibold">Countries</p>
                    </div>
                    <div class="border-b-2 border-Rose">
                        <p class="text-base font-semibold">{{ $country->name }}</p>
                    </div>
                </div>
            </div>
            <div class="flex ml-auto gap-2">
                <button
                    class="flex border text-sm md:text-base border-gray-400 hover:border-black items-center justify-center gap-2 rounded-full p-4 sm:px-5 sm:py-2"
                    type="submit" id="delete-btn">
                    <i class="fa-solid fa-sliders"></i>
                    <span class="hidden sm:flex">Filter</span>
                </button>
            </div>
        </div>

    </x-main-heading>
    <div class="product-listing mt-4 pb-20 px-6 relative mx-auto overflow-x-hidden grid justify-center items-center
                       xl:grid-cols-5 lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-4 gap-y-14">
        @forelse ($listings as $listing)
        <div class="products rounded-2xl flex flex-col items-center aspect-square">
            <a href="{{ route('details',$listing->id) }}">
                <div class="swiper aspect-square rounded-2xl group">
                    <div class="heart w-6 z-50 absolute top-3 right-0 mr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
                            <path
                                d="M47 5c-6.5 0-12.9 4.2-15 10-2.1-5.8-8.5-10-15-10A15 15 0 0 0 2 20c0 13 11 26 30 39 19-13 30-26 30-39A15 15 0 0 0 47 5z">
                            </path>
                        </svg>
                    </div>
                    <div class="swiper-wrapper !aspect-square">
                        <img alt="image-1" class="swiper-slide object-cover object-center w-full min-h-full first-image"
                            src="{{ Storage::url($listing->featured_image) }}" />
                        <img alt="image-2" class="swiper-slide object-cover object-center w-full min-h-full"
                            src="{{ Storage::url($listing->image_one) }}" />
                        <img alt="images-3" class="swiper-slide object-cover object-center w-full min-h-full"
                            src="{{ Storage::url($listing->image_two) }}" />
                    </div>
                    <div class="swiper-pagination"></div>
                    <div
                        class="swiper-button-prev scale-0 opacity-40 group-hover:scale-100 hover:opacity-100 transition-all 2s ease-linear">
                        <i class="fa-solid fa-angle-left"></i>
                    </div>
                    <div
                        class="swiper-button-next scale-0 opacity-40 group-hover:scale-100 hover:opacity-100 transition-all 2s ease-linear">
                        <i class="fa-solid fa-angle-right"></i>
                    </div>
                </div>
                <div class="flex justify-between p-2 pt-4">
                    <div class="">
                        <p class="w-[100px] truncate">{{ $listing->title }}</p>
                        <p class="truncate text-sm opacity-40">{{ $listing->subcategory->name }} , {{
                            $listing->category->name }}</p>
                    </div>
                    <div class="">
                        <p class="text-right">{{ $listing->price}} $</p>
                        <p class="opacity-40 w-full flex justify-end text-sm">{{ $listing->created_at->diffForHumans()
                            }}</p>
                    </div>
                </div>
            </a>


        </div>
        @empty

        <div class="col-span-full flex justify-center  items-center  text-xl  font-extrabold">
            <lottie-player src="{{ asset('img/lf20_0zomy8eb.json') }}" background="transparent" class="w-[20rem]"
                speed="1.5" autoplay loop>
            </lottie-player>
        </div>
        <div class="col-span-full flex justify-center  items-center text-xl  font-extrabold">
            No Listing Found
        </div>
        @endforelse
    </div>

    <x-main-footer></x-main-footer>
    <script>
        function filterResults(){

             window.history.pushState("object or string", "Title", "/all-listings");

            let href = 'all-listings?';
            var title = document.getElementById("title").value;
            var country = document.getElementById("country").value;
            var category = document.getElementById("category").value;
            var maxPrice = document.getElementById("maxPrice").value;
            if(title.length){
                href += 'filter[title]=' + title;
            }
            if(category.length){
                href +='&filter[category_id]=' + category
            }

            if(country.length){
                
                href +='&filter[country_id]=' + country
            }
            if(maxPrice.length){
                href +='&filter[max_price]=' + maxPrice
            }
            document.location.href = href;
        }
        document.getElementById("filter").addEventListener("click",filterResults);
    </script>
</x-main-layout>
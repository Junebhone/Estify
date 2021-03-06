<div>
    <label class="p-2 m-2 flex justify-center text-gray-700">Old Images</label>
    <div class="flex flex-wrap gap-5 justify-center">
        @if ($oldFeaturedImage)
        <div class="flex">
            <img class="w-[150px] h-[150px] object-cover object-center rounded-md"
                src="{{ Storage::url($oldFeaturedImage) }}">
        </div>
        @endif
        @if ($oldImageOne)
        <div class="flex">
            <img class="w-[150px] h-[150px] object-cover object-center rounded-md"
                src="{{ Storage::url($oldImageOne) }}">
        </div>
        @endif
        @if ($oldImageTwo)
        <div class="flex">
            <img class="w-[150px] h-[150px] object-cover object-center rounded-md"
                src="{{ Storage::url($oldImageTwo) }}">
        </div>
        @endif
        @if ($oldImageThree)
        <div class="flex">
            <img class="w-[150px] h-[150px] object-cover object-center rounded-md"
                src="{{ Storage::url($oldImageThree) }}">
        </div>
        @endif
    </div>
    <label class="p-2 m-4 flex justify-center text-gray-700">New Images</label>
    <div class="mt-5 flex flex-wrap gap-5 justify-center">

        <div class="file-upload">
            <div class="mt-1 flex items-center">
                <div class="file-select file-select-box">
                    @if ($featuredImage)
                    <div class="imagePreview">
                        <img class="w-[150px] h-[150px] rounded object-cover object-center relative z-50"
                            src="{{ $featuredImage->temporaryUrl() }}">
                    </div>
                    @endif
                    <button class="file-upload-custom-btn flex items-center justify-center" id="imagebtn">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg></button>
                    <input wire:model="featuredImage" type="file" id="featured_image" name="featured_image"
                        class="relative z-10" />
                    @error('featured_image') <span class="error">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="file-upload">
            <div class="file-select file-select-box">
                @if ($imageOne)
                <div class="imagePreview">
                    <img class="w-[150px] h-[150px] rounded object-cover object-center relative z-50"
                        src="{{ $imageOne->temporaryUrl() }}">
                </div>
                @endif
                <button class="file-upload-custom-btn flex justify-center items-center" id="imagebtn"><svg
                        xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg></button>

                <input wire:model="imageOne" type="file" id="image_one" name="image_one" class="relative z-10" />
                @error('image_one') <span class="error">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="file-upload">
            <div class="file-select file-select-box">
                @if ($imageTwo)
                <div class="imagePreview">
                    <img class="w-[150px] h-[150px] rounded object-cover object-center relative z-50"
                        src="{{ $imageTwo->temporaryUrl() }}">
                </div>
                @endif
                <button class="file-upload-custom-btn flex justify-center items-center" id="imagebtn"><svg
                        xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg></button>

                <input wire:model="imageTwo" type="file" id="image_two" name="image_two"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                @error('image_two') <span class="error">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="file-upload">
            <div class="file-select file-select-box">
                @if ($imageThree)
                <div class="imagePreview z-10">
                    <img class="w-[150px] h-[150px] rounded object-cover object-center relative z-50"
                        src="{{ $imageThree->temporaryUrl() }}">
                </div>
                @endif
                <button class="file-upload-custom-btn flex justify-center items-center" id="imagebtn"><svg
                        xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 z-10" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg></button>
                @if ($imageThree)
                <div class="m-2 p-2">
                    <img class="w-[150px] h-[150px] rounded object-cover object-center relative z-50"
                        src="{{ $imageThree->temporaryUrl() }}">
                </div>
                @endif
                <input wire:model="imageThree" type="file" id="image_three" name="image_three"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md " />
                @error('image_three') <span class="error">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

</div>
@extends('layouts.layout')
@section('content')


{{$errors}}
        <div class="bg-white shadow p-4 py-8 flex-col" x-data="{ images: [], selectedDestination: '' }">
            <div class="heading text-center font-bold text-2xl m-5 text-gray-800 bg-white">New Post</div>
            <div class="editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl">
        <form action="{{route('post.store')}}" method="POST"  enctype="multipart/form-data" class="flex flex-col">
            @csrf <!-- Add this line to include the CSRF token -->

            <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none" spellcheck="false" placeholder="Title" name="title" type="text">
            @error('title')
            <p class="text-red-500">{{ $message }}</p>
            @enderror
            <textarea class="description bg-gray-100 sec p-3 h-60 border border-gray-300 outline-none" spellcheck="false" name="description" placeholder="Describe everything about this post here"></textarea>
            @error('description')
            <p class="text-red-500">{{ $message }}</p>
            @enderror
            <!-- Tips Textarea -->
            <label for="adventure_tips" class="text-lg font-semibold mb-2">Tips:</label>
            <textarea class="description bg-gray-100 sec p-3 h-60 border border-gray-300 outline-none" id="adventure_tips" name="tips" rows="4"></textarea>
            @error('adventure_tips')
            <p class="text-red-500">{{ $message }}</p>
            @enderror
            
            <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none" spellcheck="false" placeholder="placeNAME" name="placeName" type="text">
            @error('placeName')
            <p class="text-red-500">{{ $message }}</p>
            @enderror
            
            <!-- Select Destination -->
            <label class="block mb-2 text-gray-800" for="destination">Destination:</label>
            <select name="destination_id" id="destination" class="focus:bg-blue-600 border-none px-2 py-1 rounded-md w-full text-black">
            <option value="all">select option</option>
            @foreach ($destinations as $destination)
                <option value="{{ $destination->id }}">
                    {{ $destination->country }}
            </option>
        @endforeach
    </select>
            @error('destination')
            <p class="text-red-500">{{ $message }}</p>
            @enderror
            <!-- Image Upload Section -->
            <div class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md mt-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Select Images:</label>
                <input type="file" name="image[]" id="imageInput" class="hidden" multiple>
                <label for="imageInput" class="cursor-pointer bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition duration-300 ease-in-out">Select Images</label>
                <div id="selectedImages" class="mt-4"></div>
            </div>
            @error('image')
            <p class="text-red-500">{{ $message }}</p>
            @enderror
            <!-- Buttons -->
            <div class="buttons flex justify-end mt-4">
                <button type="submit" class="btn border border-indigo-500 p-1 px-4 font-semibold cursor-pointer text-gray-200 ml-2 bg-indigo-500">Post</button>
            </div>
        </form>
</div>

        </div>
        
        <script src="js/add_avnt.js">

        </script>
@endsection

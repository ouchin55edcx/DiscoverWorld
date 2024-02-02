@extends('layouts.layout')

@section('content')
<section class="bg-white dark:bg-gray-900 " style="background-image: url('storage/images/dest.png'); background-size: cover; object-fit: cover; width: 100%;  ">
    <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-12">
        <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">We invest in the world’s potential</h1>
        <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">Here at Flowbite we focus on markets where technology, innovation, and capital can unlock long-term value and drive economic growth.</p>
    </div>
</section>

<div class="relative bg-cover bg-center m-12" style="background-image: url('storage/images/about1.png'); height: 150px; width:400px;">
    <div class="absolute inset-0 flex items-center justify-center">
      <p class="text-gray-500 text-bold text-4xl text-center">
        Hey, <span class="text-amber-500">Where do</span> you want to
        go? 
      </p>
    </div>
</div>

    <div class="flex gap-12 w-full  max-w-2xl mx-auto m-5">

    <div class="flex gap-12 w-full max-w-2xl mx-auto m-5">
    <form action="{{ route('filterByDestination') }}" method="post" class="flex flex-auto justify-evenly border rounded-md w-full dark:border-gray-600/60 dark:text-white">
    @csrf
    <select name="destination" id="destination" class="focus:bg-blue-600 border-none px-2 py-1 rounded-md w-full text-black">
        <option value="all">All</option>
        @foreach ($adventures as $adventure)
            <option value="{{ $adventure->destination->id }}">
                {{ $adventure->destination->country }}
            </option>
        @endforeach
    </select>
    <button type="submit" class="focus:bg-blue-600 border-none px-2 py-1 rounded-md w-full text-white bg-blue-500">Search</button>
</form>

</div>

        <select id="pricingType" name="pricingType" class="w-full h-10 border-2 border-sky-500 focus:outline-none focus:border-sky-500 text-sky-500 rounded px-2 md:px-3 py-0 md:py-1 tracking-wider">
            <option value="All" {{ isset($sort) && $sort == 'All' ? 'selected' : '' }}>All</option>
            <option value="Récentes" {{ isset($sort) && $sort == 'Récentes' ? 'selected' : '' }}>Récentes</option>
            <option value="Anciennes" {{ isset($sort) && $sort == 'Anciennes' ? 'selected' : '' }}>Anciennes</option>
        </select>


    </div>

    <div class="grid gap-12 sm:grid-cols-2 ml-12 lg:grid-cols-2 ">

    @foreach ($adventures as $adventure)
        <article class="mb-4 break-inside break-inside-avoid rounded-xl bg-gray-200 flex flex-col bg-clip-border w-[90%] p-5">
            <!-- Date, Title, and Destination -->
            <div class="pb-6">
                <div class="text-slate-500 mb-2">
                {{ $adventure['created_at']}}

                </div>
                <h2 class="text-3xl font-extrabold">
                    {{ $adventure['title'] }}
                </h2>
                <div class="text-gray-600">
                placeName: {{ $adventure['placeName'] }}
                </div>
                <div class="text-gray-600">
                    Destination: {{ $adventure['country'] }}
                </div>
            </div>

            <!-- Adventure Images -->
            <div class="py-4">
                <div class="flex justify-between gap-1 mb-1">
                    @foreach ($adventure['photos'] as $photo)
                        <a class="flex" href="#">
                            <img class="max-w-full rounded-tl-lg"
                                src="{{ asset($photo['url']) }}" alt="Adventure Photo">
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Tips Input -->
            <div class="py-4">
                <h3 class="text-lg font-semibold mb-2">Tips:</h3>
                <p>
                    {{ $adventure['tips'] }}
                </p>
            </div>

            <!-- Adventure Description -->
            <p class="mb-4">
                <h2 class="font-semibold">Description:</h2>
                {{ $adventure['description'] }}
            </p>

            <!-- Adventure Details -->
            <div class="py-4">
                <a class="inline-flex items-center" href="#">
                    <span class="mr-2">
                        <svg class="fill-rose-600" style="width: 24px; height: 24px;" viewBox="0 0 24 24">
                            <path d="M12,21.35L10.55,20.03C5.4,15.36 2,12.27 2,8.5C2,5.41 4.42,3 7.5,3C9.24,3 10.91,3.81 12,5.08C13.09,3.81 14.76,3 16.5,3C19.58,3 22,5.41 22,8.5C22,12.27 18.6,15.36 13.45,20.03L12,21.35Z">
                            </path>
                        </svg>
                    </span>
                    <span class="text-lg font-bold">{{ count($adventure['photos']) }}</span>
                </a>
            </div>
        </article>
    @endforeach


    </div>  
    <script src="js/landing.js"></script>
@endsection

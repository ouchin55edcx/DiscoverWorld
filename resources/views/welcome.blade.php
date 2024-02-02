@extends('layouts.layout')

@section('content')


    <section class=" py-16 md:py-32"
        style="background-image: url('storage/images/bg1.png'); background-size: cover; background-position: center;">
        <div class="container mx-auto px-4 md:px-8 text-center">
            <h1 class="text-white font-bold text-4xl md:text-6xl leading-tight mb-6">Welcome to our <br>Colorful World</h1>
            <p class="text-white text-lg md:text-2xl mb-12">Explore a World </p>
            <a href="#"
                class="hover:bg-blue-700 bg-white text-amber-500 font-bold py-2 px-10 m-4 rounded-full  transition duration-200">Add
                One Now
            </a>
        </div>
    </section>

<!-- Display Total Adventures -->


<!-- Display Total Destinations -->


<!-- Display Adventures per Destination -->



    <section clas   s="container flex flex-col items-center justify-center ">
        <div class="">
            <div class="relative bg-cover bg-center m-12"
                style="background-image: url('storage/images/about1.png'); height: 200px;">
                <div class="absolute inset-0 flex items-center justify-center">
                    <p class="text-gray-500 text-bold text-4xl text-center">
                        Hey, We are the Red Explorers Brief History <span class="text-amber-500">About Us.</span>
                    </p>
                </div>
            </div>
            <div class="mb-32 text-center lg:text-left">
                <div
                    class="block rounded-lg bg-gray-200 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] ">
                    <div class="flex flex-wrap items-center">
                        <div class="block w-full shrink-0 grow-0 basis-auto lg:flex lg:w-6/12 xl:w-4/12">
                            <img src="storage/images/pexels-element-digital-1051075.jpg" alt="Trendy Pants and Shoes"
                                class="w-full rounded-t-lg lg:rounded-tr-none lg:rounded-bl-lg" />
                        </div>
                        <div class="w-full shrink-0 grow-0 basis-auto lg:w-6/12 xl:w-8/12">
                            <div class="px-6 py-12 md:px-12">
                                <h2 class="display-5 mb-6 text-4xl font-bold text-primary dark:text-primary-400">
                                    Why is it so great?
                                </h2>
                                <p class="mb-12 text-neutral-500 dark:text-neutral-300">
                                    Nunc tincidunt vulputate elit. Mauris varius purus malesuada
                                    neque iaculis malesuada. Aenean gravida magna orci, non
                                    efficitur est porta id. Donec magna diam.
                                </p>

                                <div class="grid md:grid-cols-3 lg:gap-x-12">
                                    <div class="mb-12 md:mb-0">
                                        <h2 class="mb-4 text-3xl font-bold text-primary dark:text-primary-400">
                                            1000
                                        </h2>
                                        <h5 class="mb-0 text-lg font-medium text-neutral-500 dark:text-neutral-300">
                                            Happy customers
                                        </h5>
                                    </div>

                                    <div class="mb-12 md:mb-0">
                                        <h2 class="mb-4 text-3xl font-bold text-primary dark:text-primary-400">
                                        {{ $totalAdventures }}
                                        </h2>
                                        <h5 class="mb-0 text-lg font-medium text-neutral-500 dark:text-neutral-300">
                                            Total Advanture
                                        </h5>
                                    </div>

                                    <div class="">
                                        <h2 class="mb-4 text-3xl font-bold text-primary dark:text-primary-400">
                                        {{ $totalDestinations }}
                                        </h2>
                                        <h5 class="mb-0 text-lg font-medium text-neutral-500 dark:text-neutral-300">
                                        Destinations
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <h2 class="mb-4 text-4xl font-extrabold leading-tight text-gray-800 mt-8 text-center">Destinations les plus
                populaires</h2>
            <p class="mb-8 text-lg text-center text-gray-700">Lorem Ipsum is simply dummy text of the printing and
                typesetting
                industry. <br>
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
    </section>
    <!-- Adventure Cards Section -->
    <div class="grid gap-12 sm:grid-cols-2 ml-12 lg:grid-cols-2 ">
<!-- Destination.blade.php -->

@foreach($adventures as $adventure)
    <article class="mb-4 break-inside break-inside-avoid rounded-xl bg-gray-200 flex flex-col bg-clip-border w-[90%] p-5">
        <!-- Date, Title, and Destination -->
        <div class="pb-6">
            <div class="text-slate-500 mb-2">
                {{ \Carbon\Carbon::parse($adventure['created_at'])->format('F j, Y') }}
            </div>
            <h2 class="text-3xl font-extrabold">
                {{ $adventure['title'] }}
            </h2>
            <div class="text-gray-600">
                Destination: {{ $adventure['placeName'] }}
            </div>
        </div>

        <!-- Adventure Images -->
        <div class="py-4">
            @foreach($adventure['photos'] as $photo)
                <a class="flex" href="#">
                    <img class="max-w-full" src="{{ asset($photo['url']) }}" />
                </a>
            @endforeach
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
            <!-- Add more details as needed -->
            <a class="inline-flex items-center" href="#">
                <span class="mr-2">
                    <svg class="fill-rose-600" style="width: 24px; height: 24px;" viewBox="0 0 24 24">
                        <path d="M12,21.35L10.55,20.03C5.4,15.36 2,12.27 2,8.5C2,5.41 4.42,3 7.5,3C9.24,3 10.91,3.81 12,5.08C13.09,3.81 14.76,3 16.5,3C19.58,3 22,5.41 22,8.5C22,12.27 18.6,15.36 13.45,20.03L12,21.35Z">
                        </path>
                    </svg>
                </span>
                <span class="text-lg font-bold">34</span>
            </a>
        </div>
    </article>
@endforeach




    </div>
@endsection

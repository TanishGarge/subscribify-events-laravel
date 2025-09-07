{{-- resources/views/events/show.blade.php --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{-- Display the event's name in the header --}}
            {{ $event->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h3 class="text-2xl font-bold mb-4">{{ $event->title }}</h3>

                    <p class="text-gray-600 dark:text-gray-400 mb-4">
                        {{-- Use Carbon to format the date nicely --}}
                        <strong>Starts at:</strong> {{ $event->starts_at->format('F j, Y, g:i a') }}
                    </p>
                    <p class="text-gray-600 dark:text-gray-400 mb-4">
                        {{-- Use Carbon to format the date nicely --}}
                        <strong>Ends at:</strong> {{ $event->ends_at->format('F j, Y, g:i a')}}
                    </p>

                    <div class="prose dark:prose-invert max-w-none">
                        {{-- Display the event's description --}}
                        {!! $event->description !!}
                    </div>

                    <div class="prose dark:prose-invert max-w-none">
                        <strong>Location:</strong> {!! $event->venue !!}, {{$event->city}}
                    </div>

                    <div class="prose dark:prose-invert max-w-none">
                        <strong>Capacity: </strong> {!! $event->capacity !!}
                    </div>

                    <div class="prose dark:prose-invert max-w-none">
                        <strong>Price: </strong> {!! $event->public_price_cents !!}
                    </div>

                    <div class="prose dark:prose-invert max-w-none">
                        <strong>member Discount percent: </strong> {!! $event->member_discount_percent !!}
                    </div>

                    <p class="prose dark:prose-invert max-w-none">
                        {{-- Use Carbon to format the date nicely --}}
                        <strong>Public Sale starts at: </strong> {{ $event->public_sales_start->format('F j, Y, g:i a')}}
                    </p>

                    <p class="prose dark:prose-invert max-w-none">
                        {{-- Use Carbon to format the date nicely --}}
                        <strong>Sale ends at: </strong> {{ $event->sales_end->format('F j, Y, g:i a')}}
                    </p>

                    {{-- <form method="POST" action="{{ route('') }}">
                        @csrf
                        <input type="hidden" name="planId", value="">
                        <button type="submit" @disabled($event->sales_end->isPast()) class="mt-10 block w-full bg-gray-200 text-gray-800 font-semibold py-3 px-6 rounded-lg hover:bg-gray-300 dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-indigo-600 transition-colors duration-300">
                            Buy
                        </button>
                    </form> --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

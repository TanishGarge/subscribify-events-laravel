<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pricing Plans') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse ($events as $event)
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden flex flex-col">
                    <div class="p-6 flex flex-col flex-grow">
                        <h3 class="text-2xl font-semibold text-gray-900 dark:text-white">{{$event->title}}</h3>
                        <div class="text-sm font-medium text-gray-500 dark:text-gray-400 mt-2">
                            <span>{{$event->starts_at->format('M j, Y')}}</span> &middot; <span>{{$event->venue}}</span>
                        </div>
                        <p class="mt-4 text-gray-600 dark:text-gray-300 flex-grow">
                            {{$event->slug}}
                        </p>
                        <div class="mt-6">
                            <a href="{{ route('event-details', $event)}}" class="w-full text-center inline-block bg-indigo-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-indigo-700 dark:hover:bg-indigo-500 transition-colors duration-300">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                    <p>No Events Listed</p>
                @endforelse

            </div>
        </div>
    </div>
</x-app-layout>

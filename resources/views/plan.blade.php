<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pricing Plans') }}
        </h2>
    </x-slot>

    <!-- Main container for the pricing cards -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container mx-auto p-4 sm:p-6 lg:p-8">
                <!-- Use CSS Grid instead of Flexbox for better control -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 place-items-center">
                    @forelse ($plans as $plan)
                        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-8 w-full max-w-sm flex flex-col text-center h-full">
                            <h3 class="text-2xl font-semibold text-gray-700 dark:text-gray-200">{{ $plan->name }}</h3>

                            <div class="mt-6">
                                <span class="text-5xl font-bold text-gray-900 dark:text-white">{{ $plan->price_cents }}</span>
                                <span class="text-lg font-medium text-gray-500 dark:text-gray-400"> cents</span>
                            </div>

                            <ul class="mt-8 space-y-4 text-left flex-grow">
                                <li class="flex items-center">
                                    <svg class="w-5 h-5 text-green-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="text-gray-600 dark:text-gray-300">Discount {{ $plan->member_discount_percent}}%</span>
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-5 h-5 text-green-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="text-gray-600 dark:text-gray-300">Early Access by {{ $plan->early_access_hours }} hours</span>
                                </li>
                            </ul>

                            <form method="POST" action="{{ route('subscribe') }}" class="mt-auto">
                                @csrf
                                <input type="hidden" name="planId" value="{{ $plan->id }}">
                                <button type="submit" class="!mt-10 !block !w-full !bg-indigo-600 !text-white !font-semibold !py-3 !px-6 !rounded-lg hover:!bg-indigo-700 dark:!bg-indigo-700 dark:!text-white dark:hover:!bg-indigo-600 !transition-colors !duration-300 !border-0 focus:!outline-none focus:!ring-2 focus:!ring-indigo-500 focus:!ring-offset-2">
                                    Subscribe
                                </button>
                            </form>
                        </div>
                    @empty
                        <div class="col-span-full text-center py-12">
                            <p class="text-gray-500 dark:text-gray-400 text-lg">No Plans Available.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

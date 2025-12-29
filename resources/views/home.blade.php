@extends('layouts.app')

@section('content')
<div x-data="{ city: 'Abuja' }" class="max-w-7xl mx-auto px-4 py-6">

    <!-- City Selector -->
    <div class="flex gap-3 mb-6">
        <template x-for="c in ['Abuja','Lagos','Port Harcourt']">
            <button
                @click="city = c"
                :class="city === c
                    ? 'bg-green-600 text-white'
                    : 'bg-gray-100 text-gray-700'"
                class="px-4 py-2 rounded-lg font-medium">
                <span x-text="c"></span>
            </button>
        </template>
    </div>

    <!-- Apartment Grid -->
    @foreach($apartments as $city => $list)
        <div x-show="city === '{{ $city }}'" class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($list as $apartment)
                <div class="bg-white rounded-xl shadow overflow-hidden">

                    <!-- Cloudinary Image -->
                    <img
                        src="{{ $apartment->images->first()?->url }}"
                        class="h-48 w-full object-cover"
                        alt="{{ $apartment->name }}">

                    <div class="p-4">
                        <h3 class="font-semibold text-lg">{{ $apartment->name }}</h3>
                        <p class="text-sm text-gray-500">
                            {{ $apartment->property->city }}
                        </p>

                        <p class="mt-2 font-bold text-green-600">
                            ₦{{ number_format($apartment->price_per_month) }} / month
                        </p>

                        <a href="{{ url('/apartments/'.$apartment->id) }}"
                           class="mt-4 block text-center bg-green-600 text-white py-2 rounded-lg hover:bg-green-700">
                            View & Book
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach

</div>
@endsection

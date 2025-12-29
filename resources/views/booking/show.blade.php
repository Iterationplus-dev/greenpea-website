@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-6">

    <!-- Apartment info -->
    <div class="bg-white rounded-xl shadow p-4 mb-6">
        <img
            src="{{ $apartment->images->first()?->url }}"
            class="w-full h-56 object-cover rounded-lg mb-4">

        <h2 class="text-xl font-bold">{{ $apartment->name }}</h2>
        <p class="text-gray-500">{{ $apartment->property->city }}</p>

        <p class="mt-2 text-green-600 font-semibold">
            ₦{{ number_format($apartment->price_per_month) }} / month
        </p>
    </div>

    <!-- Booking form -->
    <form
        x-data="bookingForm({{ $apartment->price_per_month }})"
        method="POST"
        action="{{ url('/book/'.$apartment->id) }}"
        class="bg-white rounded-xl shadow p-6 space-y-4"
    >
        @csrf

        <div>
            <label class="text-sm text-gray-600">Full Name</label>
            <input name="name" required class="w-full border rounded p-2">
        </div>

        <div>
            <label class="text-sm text-gray-600">Email</label>
            <input type="email" name="email" required class="w-full border rounded p-2">
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="text-sm text-gray-600">Start Date</label>
                <input type="date" x-model="start" name="start_date" required class="w-full border rounded p-2">
            </div>

            <div>
                <label class="text-sm text-gray-600">End Date</label>
                <input type="date" x-model="end" name="end_date" required class="w-full border rounded p-2">
            </div>
        </div>

        <!-- Price -->
        <div class="bg-gray-50 p-4 rounded-lg">
            <p class="text-gray-600">Total Amount</p>
            <p class="text-xl font-bold text-green-600">
                ₦<span x-text="total.toLocaleString()"></span>
            </p>
        </div>

        <button
            type="submit"
            class="w-full bg-green-600 text-white py-3 rounded-lg hover:bg-green-700"
        >
            Request Booking
        </button>

        <p class="text-xs text-gray-500 text-center">
            Your booking will be reviewed and approved before payment.
        </p>
    </form>

</div>

<script>
function bookingForm(price) {
    return {
        start: '',
        end: '',
        total: 0,
        calculate() {
            if (!this.start || !this.end) return;

            let s = new Date(this.start);
            let e = new Date(this.end);
            let months = (e.getFullYear() - s.getFullYear()) * 12 + (e.getMonth() - s.getMonth());

            this.total = Math.max(months, 1) * price;
        },
        init() {
            this.$watch('start', () => this.calculate());
            this.$watch('end', () => this.calculate());
        }
    }
}
</script>
@endsection

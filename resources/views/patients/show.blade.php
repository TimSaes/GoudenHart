@extends('base')

<title>Patiënt inzien</title>

@section('body')
    @if ($errors->any())
        <div class="alert alert-danger bg-red-500 text-black rounded-lg p-2 mt-5 mx-4 sm:mx-12">
            <ul>
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="mx-4 sm:mx-12 p-6 sm:p-12 mb-12 bg-background rounded-lg">
        <div class="flex flex-row items-center gap-5 pb-5 border-b-2 border-black">
            <button onclick="window.location='{{ route('patients.index') }}'"
                class="px-2 py-2 bg-black text-white text-xl rounded-lg hover:text-black hover:bg-white duration-300">
                <i class="fa-solid fa-arrow-left"></i>
            </button>
            <h1 class="text-2xl font-bold">Patiënt: {{ $patient->name }}</h1>
        </div>
        <div class="flex justify-center mt-10">
            <div class="p-6 sm:p-12 w-full max-w-[600px] bg-black text-white rounded-lg">
                <div class="flex flex-wrap sm:flex-nowrap items-center py-2">
                    <label for="adress" class="text-xl font-bold w-full sm:w-[270px]">Adres:</label>
                    <p class="w-full sm:w-auto">{{ $patient->adress }}</p>
                </div>
                <div class="flex flex-wrap sm:flex-nowrap items-center py-2">
                    <label for="postal_code" class="text-xl font-bold w-full sm:w-[270px]">Postcode:</label>
                    <p class="w-full sm:w-auto">{{ $patient->postal_code }}</p>
                </div>
                <div class="flex flex-wrap sm:flex-nowrap items-center py-2">
                    <label for="hometown" class="text-xl font-bold w-full sm:w-[270px]">Woonplaats:</label>
                    <p class="w-full sm:w-auto">{{ $patient->hometown }}</p>
                </div>
                <div class="flex flex-wrap sm:flex-nowrap items-center py-2">
                    <label for="phone_number" class="text-xl font-bold w-full sm:w-[270px]">Telefoonnummer:</label>
                    <p class="w-full sm:w-auto">{{ $patient->phone_number }}</p>
                </div>
                <div class="flex flex-wrap sm:flex-nowrap items-center py-2">
                    <label for="email" class="text-xl font-bold w-full sm:w-[270px]">Email:</label>
                    <p class="w-full sm:w-auto">{{ $patient->email }}</p>
                </div>
                <div class="flex flex-wrap sm:flex-nowrap items-center py-2">
                    <label for="gender" class="text-xl font-bold w-full sm:w-[270px]">Geslacht:</label>
                    <p class="w-full sm:w-auto">{{ $patient->gender }}</p>
                </div>
                <div class="flex flex-wrap sm:flex-nowrap items-center py-2">
                    <label for="date_of_birth" class="text-xl font-bold w-full sm:w-[270px]">Geboortedatum:</label>
                    <p class="w-full sm:w-auto">{{ $patient->date_of_birth }}</p>
                </div>
                @if ($patient->particulars != null)
                    <div class="flex flex-wrap sm:flex-nowrap items-center py-2">
                        <label for="particulars" class="text-xl font-bold w-full sm:w-[270px]">Bijzonderheden:</label>
                        <p class="w-full sm:w-auto">{{ $patient->particulars }}</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

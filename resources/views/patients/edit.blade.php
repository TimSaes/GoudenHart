@extends('base')

<title>Patiënt bewerken</title>

@section('body')
    @if ($errors->any())
        <div class="alert alert-danger mb-3 bg-red-500 text-black rounded-lg p-2 mt-5 mx-4 sm:mx-12">
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
            <h1 class="text-2xl font-bold">Patiënt bewerken</h1>
        </div>
        <div class="py-5 flex justify-center">
            <form method="POST" action="{{ route('patients.update', $patient->id) }}" enctype="multipart/form-data"
                class="w-full max-w-[620px]">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div class="flex flex-col gap-2">
                        <label for="name" class="text-xl font-bold">Naam:</label>
                        <input class="border-2 border-black rounded-lg h-10 w-full px-2" id="name" type="text"
                            name="name" value="{{ $patient->name }}" required />
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="adress" class="text-xl font-bold">Adres:</label>
                        <input class="border-2 border-black rounded-lg h-10 w-full px-2" id="adress" type="text"
                            name="adress" value="{{ $patient->adress }}" required />
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="postal_code" class="text-xl font-bold">Postcode:</label>
                        <input class="border-2 border-black rounded-lg h-10 w-full px-2" id="postal_code" type="text"
                            name="postal_code" value="{{ $patient->postal_code }}" required />
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="hometown" class="text-xl font-bold">Woonplaats:</label>
                        <input class="border-2 border-black rounded-lg h-10 w-full px-2" id="hometown" type="text"
                            name="hometown" value="{{ $patient->hometown }}" required />
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="phone_number" class="text-xl font-bold">Telefoonnummer:</label>
                        <input class="border-2 border-black rounded-lg h-10 w-full px-2" id="phone_number" type="text"
                            name="phone_number" value="{{ $patient->phone_number }}" required />
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="email" class="text-xl font-bold">Email:</label>
                        <input class="border-2 border-black rounded-lg h-10 w-full px-2" id="email" type="text"
                            name="email" value="{{ $patient->email }}" required />
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="gender" class="text-xl font-bold">Geslacht:</label>
                        <select class="border-2 border-black rounded-lg h-10 w-full px-2" id="gender" name="gender"
                            required>
                            <option value="Man" {{ $patient->gender == 'Man' ? 'selected' : '' }}>Man</option>
                            <option value="Vrouw" {{ $patient->gender == 'Vrouw' ? 'selected' : '' }}>Vrouw</option>
                        </select>
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="date_of_birth" class="text-xl font-bold">Geboortedatum:</label>
                        <input class="border-2 border-black rounded-lg h-10 w-full px-2" id="date_of_birth" type="date"
                            name="date_of_birth" value="{{ $patient->date_of_birth }}" required />
                    </div>
                </div>
                <div class="flex flex-col gap-2 mt-5">
                    <label for="particulars" class="text-xl font-bold">Bijzonderheden:</label>
                    <textarea class="border-2 border-black rounded-lg h-[150px] w-full px-2 py-2" id="particulars" name="particulars">{{ $patient->particulars }}</textarea>
                </div>
                <div class="flex justify-end mt-5">
                    <button type="submit"
                        class="bg-black text-white hover:bg-white hover:text-black duration-300 py-2 px-4 rounded-lg">Opslaan</button>
                </div>
            </form>
        </div>
    </div>
@endsection

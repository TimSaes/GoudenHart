@extends('base')

<title>Patiënten beheren</title>

@section('body')
    @if (session()->has('message'))
        <div class="alert alert-success bg-green-500 text-white rounded-xl p-2 my-5 mx-12">
            {{ session()->get('message') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger bg-red-500 text-black rounded-xl p-2 mt-5 mx-12">
            <ul>
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="mx-12 p-12 bg-background rounded-xl mb-5">
        <div class="flex flex-row justify-between items-center pb-5 border-b-2 border-black">
            <h1 class="text-2xl font-bold">Patiënten beheer</h1>
            <a href="{{ route('patients.create') }}"
                class="bg-black text-white hover:bg-white hover:text-black duration-300 text-base rounded-xl px-4 py-2">
                <p>Voeg patiënt toe</p>
            </a>
        </div>
        <div class="py-5">
            <!-- Headers -->
            <div class="hidden xl:grid grid-cols-6 text-left text-xl text-white">
                <div class="bg-black rounded-tr-xl py-2 px-4">Naam</div>
                <div class="bg-black rounded-tr-xl py-2 px-4">Adres</div>
                <div class="bg-black rounded-tr-xl py-2 px-4">Postcode</div>
                <div class="bg-black rounded-tr-xl py-2 px-4">Telefoon</div>
                <div class="bg-black rounded-tr-xl py-2 px-4">Email</div>
                <div class="bg-black rounded-tr-xl py-2 px-4">Beheer</div>
            </div>
            <!-- Patients List -->
            @foreach ($patients as $patient)
                <div
                    class="border-black border-b-[1px] bg-white py-2 px-4 mb-5 xl:grid md:grid-cols-6 md:gap-4 xl:mb-0 items-center">
                    <div class="font-bold xl:hidden">Naam:</div>
                    <div>{{ $patient->name }}
                        @if ($patient->particulars != null)
                            <i class="fa-solid fa-exclamation text-red-500"></i>
                        @endif
                    </div>

                    <div class="font-bold xl:hidden">Adres:</div>
                    <div>{{ $patient->adress }}</div>

                    <div class="font-bold xl:hidden">Postcode:</div>
                    <div>{{ $patient->postal_code }}</div>

                    <div class="font-bold xl:hidden">Telefoon:</div>
                    <div>{{ $patient->phone_number }}</div>

                    <div class="font-bold xl:hidden">Email:</div>
                    <div>{{ $patient->email }}</div>

                    <div class="font-bold xl:hidden">Beheer:</div>
                    <div class="flex flex-row gap-2 items-center">
                        <!-- View Button -->
                        <button class="bg-view text-black rounded-xl px-4 py-4 hover:bg-black hover:text-white duration-300"
                            onclick="window.location='{{ route('patients.show', $patient->id) }}'">
                            <i class="fa-solid fa-eye"></i>
                        </button>
                        <!-- Edit Button -->
                        <button class="bg-edit text-black rounded-xl px-4 py-4 hover:bg-black hover:text-white duration-300"
                            onclick="window.location='{{ route('patients.edit', $patient->id) }}'">
                            <i class="fa-solid fa-pencil"></i>
                        </button>
                        <!-- Delete Button -->
                        <form action="{{ route('patients.destroy', $patient->id) }}" method="post" class="m-0">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Weet u zeker dat u deze patiënt wilt verwijderen?')"
                                class="bg-delete text-black rounded-xl px-4 py-4 hover:bg-black hover:text-white duration-300">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

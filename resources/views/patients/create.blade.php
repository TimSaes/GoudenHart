@extends('base')

<title>Patiënt toevoegen</title>

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
            <h1 class="text-2xl font-bold">Patiënt toevoegen</h1>
        </div>
        <div class="py-5 flex justify-center">
            <form method="POST" action="{{ route('patients.store') }}" enctype="multipart/form-data"
                class="w-full max-w-[620px]">
                @csrf
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div class="flex flex-col gap-2">
                        <label class="text-xl font-bold" for="name">Naam*</label>
                        <input class="border-2 border-black rounded-lg h-10 w-full px-2" id="name" type="text"
                            name="name" required />
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-xl font-bold" for="adress">Adres*</label>
                        <input class="border-2 border-black rounded-lg h-10 w-full px-2" id="adress" type="text"
                            name="adress" required />
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-xl font-bold" for="postal_code">Postcode*</label>
                        <input class="border-2 border-black rounded-lg h-10 w-full px-2" id="postal_code" type="text"
                            name="postal_code" required />
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-xl font-bold" for="hometown">Woonplaats*</label>
                        <input class="border-2 border-black rounded-lg h-10 w-full px-2" id="hometown" type="text"
                            name="hometown" required />
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-xl font-bold" for="phone_number">Telefoonnummer*</label>
                        <input class="border-2 border-black rounded-lg h-10 w-full px-2" id="phone_number" type="text"
                            name="phone_number" required />
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-xl font-bold" for="email">Email*</label>
                        <input class="border-2 border-black rounded-lg h-10 w-full px-2" id="email" type="text"
                            name="email" required />
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-xl font-bold" for="gender">Geslacht*</label>
                        <select class="border-2 border-black rounded-lg h-10 w-full px-2" id="gender" name="gender"
                            required>
                            <option value="" selected hidden>Selecteer een optie</option>
                            <option value="Man">Man</option>
                            <option value="Vrouw">Vrouw</option>
                        </select>
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-xl font-bold" for="date_of_birth">Geboortedatum*</label>
                        <input class="border-2 border-black rounded-lg h-10 w-full px-2" id="date_of_birth" type="date"
                            name="date_of_birth" required />
                    </div>
                </div>
                <div class="flex flex-col gap-2 mt-5">
                    <label class="text-xl font-bold" for="particulars">Bijzonderheden</label>
                    <textarea id="particulars" class="text-black h-[150px] w-full border-2 border-black rounded-lg px-2 py-2"
                        name="particulars"></textarea>
                </div>

                <div>
                    <h1 class="text-2xl font-bold mt-5">Recept:</h1>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mt-5">
                    <div class="flex flex-col gap-2">
                        <label class="text-xl font-bold" for="product">Product</label>
                        <input class="border-2 border-black rounded-lg h-10 w-full px-2" id="product" type="text"
                            name="product" />
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-xl font-bold" for="quantity">Aantal</label>
                        <input class="border-2 border-black rounded-lg h-10 w-full px-2" id="quantity" type="text"
                            name="quantity" />
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-xl font-bold" for="repeat">Herhaalrecept</label>
                        <select class="border-2 border-black rounded-lg h-10 w-full px-2" id="repeat" name="repeat">
                            <option value="" selected hidden>Selecteer een optie</option>
                            <option value="Ja">Ja</option>
                            <option value="Nee">Nee</option>
                        </select>
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-xl font-bold" for="instruction">Instructie</label>
                        <textarea class="border-2 border-black rounded-lg h-[150px] w-full px-2 py-2" id="instruction" name="instruction"></textarea>
                    </div>
                </div>
                <div class="flex justify-end mt-5">
                    <button type="submit"
                        class="bg-black text-white hover:bg-white hover:text-black duration-300 py-2 px-4 rounded-lg">Opslaan</button>
                </div>
            </form>
        </div>
    </div>
@endsection

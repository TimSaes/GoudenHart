@extends('base')

<title>Recept aanmaken</title>

@section('body')
    @if ($errors->any())
        <div class="alert alert-danger mb-3 bg-red-500 text-black rounded-lg p-2 mt-5 mx-12">
            <ul>
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="mx-4 sm:mx-12 p-6 sm:p-12 mb-12 bg-background rounded-lg">
        <div class="flex flex-row items-center gap-5 pb-5 border-b-2 border-black">
            <button onclick="window.location='{{ route('recipes.index') }}'"
                class="px-2 py-2 bg-black text-white text-xl rounded-lg hover:text-black hover:bg-white duration-300">
                <i class="fa-solid fa-arrow-left"></i>
            </button>
            <h1 class="text-2xl font-bold">Recept aanmaken</h1>
        </div>
        <div class="py-5 flex justify-center">
            <form method="POST" action="{{ route('recipes.store') }}" enctype="multipart/form-data"
                class="w-full max-w-[620px]">
                @csrf
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div class="flex flex-col gap-2">
                        <label class="text-xl font-bold" for="patient_id">Patiënt*</label>
                        <select class="border-2 border-black rounded-lg h-10 w-full px-2" id="patient_id" name="patient_id"
                            required>
                            <option value="" selected hidden>Selecteer een patiënt</option>
                            @foreach ($patients as $patient)
                                <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-xl font-bold" for="product">Product*</label>
                        <input class="border-2 border-black rounded-lg h-10 w-full px-2" id="product" type="text"
                            name="product" required />
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-xl font-bold" for="quantity">Aantal*</label>
                        <input class="border-2 border-black rounded-lg h-10 w-full px-2" id="quantity" type="text"
                            name="quantity" required />
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-xl font-bold" for="repeat">Herhaalrecept*</label>
                        <select class="border-2 border-black rounded-lg h-10 w-full px-2" id="repeat" name="repeat"
                            required>
                            <option value="" selected hidden>Selecteer een optie</option>
                            <option value="Ja">Ja</option>
                            <option value="Nee">Nee</option>
                        </select>
                    </div>
                </div>
                <div class="flex flex-col gap-2 mt-5">
                    <label class="text-xl font-bold" for="instruction">Instructie*</label>
                    <textarea class="text-black h-[150px] w-full border-2 border-black rounded-lg px-2 py-2" id="instruction"
                        name="instruction" required></textarea>
                </div>
                <div class="flex justify-end mt-5">
                    <button type="submit"
                        class="bg-black text-white hover:bg-white hover:text-black duration-300 py-2 px-4 rounded-lg">Opslaan</button>
                </div>
            </form>
        </div>
    </div>
@endsection

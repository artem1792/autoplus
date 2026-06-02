<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Подача заявки на ремонт
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('requests.store') }}">
                        @csrf
                        <div class="mb-4">
                            <label class="block font-medium text-sm text-gray-700" for="car_id">Выберите автомобиль</label>
                            <select id="car_id" name="car_id" class="border-gray-300 focus:border-sky-500 rounded-md shadow-sm mt-1 block w-full" required>
                                @foreach($cars as $car)
                                    <option value="{{ $car->id }}">{{ $car->brand }} {{ $car->model }} ({{ $car->reg_number }})</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('car_id')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <label class="block font-medium text-sm text-gray-700" for="description">Описание проблемы</label>
                            <textarea id="description" name="description" rows="4" class="border-gray-300 focus:border-sky-500 rounded-md shadow-sm mt-1 block w-full" required>{{ old('description') }}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="bg-sky-500 text-white px-4 py-2 rounded hover:bg-sky-600">
                                Подать заявку
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
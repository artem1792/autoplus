<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Добавление автомобиля
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(session('error'))
                        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">{{ session('error') }}</div>
                    @endif

                    <form method="POST" action="{{ route('cars.store') }}">
                        @csrf

                        <div class="mb-4">
                            <label class="block font-medium text-sm text-gray-700" for="brand">Марка</label>
                            <input id="brand" name="brand" type="text" class="border-gray-300 focus:border-sky-500 rounded-md shadow-sm mt-1 block w-full" value="{{ old('brand') }}" required>
                        </div>

                        <div class="mb-4">
                            <label class="block font-medium text-sm text-gray-700" for="model">Модель</label>
                            <input id="model" name="model" type="text" class="border-gray-300 focus:border-sky-500 rounded-md shadow-sm mt-1 block w-full" value="{{ old('model') }}" required>
                        </div>

                        <div class="mb-4">
                            <label class="block font-medium text-sm text-gray-700" for="reg_number">Регистрационный номер</label>
                            <input id="reg_number" name="reg_number" type="text" class="border-gray-300 focus:border-sky-500 rounded-md shadow-sm mt-1 block w-full" value="{{ old('reg_number') }}" required>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="bg-sky-500 text-white px-4 py-2 rounded hover:bg-sky-600">
                                Создать карточку
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
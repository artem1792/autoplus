<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Добавление автомобиля
        </h2>
    </x-slot>
    <div class="py-8 md:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl mx-auto">
                <div class="bg-white shadow rounded-lg overflow-hidden">
                    <div class="p-6 sm:p-8">
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-gray-900">Новый автомобиль</h3>
                            <p class="text-sm text-gray-500 mt-1">
                                Заполните данные вашего автомобиля
                            </p>
                        </div>
                        <form method="POST" action="{{ route('cars.store') }}" class="space-y-5">
                            @csrf
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1.5" for="brand">
                                    Марка
                                    <span class="text-red-500">*</span>
                                </label>
                                <input id="brand" name="brand" type="text"
                                       class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-teal-500 focus:ring-2 focus:ring-teal-500 placeholder-gray-400"
                                       value="{{ old('brand') }}" required>
                                <x-input-error :messages="$errors->get('brand')" class="mt-1.5" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1.5" for="model">
                                    Модель
                                    <span class="text-red-500">*</span>
                                </label>
                                <input id="model" name="model" type="text"
                                       class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-teal-500 focus:ring-2 focus:ring-teal-500 placeholder-gray-400"
                                       value="{{ old('model') }}" required>
                                <x-input-error :messages="$errors->get('model')" class="mt-1.5" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1.5" for="reg_number">
                                    Регистрационный номер
                                    <span class="text-red-500">*</span>
                                </label>
                                <input id="reg_number" name="reg_number" type="text"
                                       class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-teal-500 focus:ring-2 focus:ring-teal-500 placeholder-gray-400"
                                       value="{{ old('reg_number') }}" required>
                                <x-input-error :messages="$errors->get('reg_number')" class="mt-1.5" />
                            </div>
                            <div class="flex flex-col-reverse sm:flex-row sm:justify-end gap-3 pt-4 border-t border-gray-100">
                                <a href="{{ route('requests.index') }}"
                                   class="inline-flex justify-center items-center px-4 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg transition-all duration-200 hover:bg-gray-50 hover:border-gray-400 active:scale-95">
                                    Отмена
                                </a>
                                <button type="submit"
                                        class="inline-flex justify-center items-center px-5 py-2.5 text-sm font-medium text-white bg-teal-500 rounded-lg transition-all duration-200 hover:bg-teal-600 hover:shadow-md active:scale-95 focus:outline-none focus:ring-2 focus:ring-teal-500/50 focus:ring-offset-2">
                                    Создать карточку
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
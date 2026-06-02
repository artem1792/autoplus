<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Подача заявки на ремонт
        </h2>
    </x-slot>
    <div class="py-8 md:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl mx-auto">
                <div class="bg-white shadow rounded-lg overflow-hidden">
                    <div class="p-6 sm:p-8">
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-gray-900">Новая заявка</h3>
                            <p class="text-sm text-gray-500 mt-1">
                                Выберите автомобиль и опишите проблему
                            </p>
                        </div>
                        <form method="POST" action="{{ route('requests.store') }}" class="space-y-5">
                            @csrf
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1.5" for="car_id">
                                    Автомобиль
                                    <span class="text-red-500">*</span>
                                </label>
                                <select id="car_id" name="car_id"
                                        class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-teal-500 focus:ring-2 focus:ring-teal-500"
                                        required>
                                    @foreach($cars as $car)
                                        <option value="{{ $car->id }}">
                                            {{ $car->brand }} {{ $car->model }} ({{ $car->reg_number }})
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('car_id')" class="mt-1.5" />
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1.5" for="description">
                                    Описание проблемы
                                    <span class="text-red-500">*</span>
                                </label>
                                <textarea id="description" name="description" rows="5"
                                          class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-teal-500 focus:ring-2 focus:ring-teal-500"
                                          required>{{ old('description') }}</textarea>
                                <div class="flex items-center justify-between mt-1.5">
                                    <x-input-error :messages="$errors->get('description')" />
                                </div>
                            </div>

                            <div class="flex flex-col-reverse sm:flex-row sm:justify-end gap-3 pt-4 border-t border-gray-100">
                                <a href="{{ route('requests.index') }}"
                                   class="inline-flex justify-center items-center px-4 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg transition-all duration-200 hover:bg-gray-50 hover:border-gray-400 active:scale-95">
                                    Отмена
                                </a>
                                <button type="submit"
                                        class="inline-flex justify-center items-center px-5 py-2.5 text-sm font-medium text-white bg-teal-500 rounded-lg transition-all duration-200 hover:bg-teal-600 hover:shadow-md active:scale-95 focus:outline-none focus:ring-2 focus:ring-teal-500/50 focus:ring-offset-2">
                                    Подать заявку
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
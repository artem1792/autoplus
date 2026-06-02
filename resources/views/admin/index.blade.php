<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Административная панель
        </h2>
    </x-slot>
    <div class="py-8 md:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg overflow-hidden">
                <div class="p-6">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-6">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Заявки на ремонт</h3>
                        </div>
                    </div>

                    <div class="hidden lg:block overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ФИО</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Автомобиль</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Описание</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Назначить дату / Статус</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($requests as $req)
                                    <tr class="transition-colors duration-150 hover:bg-gray-50">
                                        <td class="px-4 py-4 align-top">
                                            <div class="font-medium text-gray-900 whitespace-nowrap">
                                                {{ $req->user->lastname }} {{ $req->user->name }} {{ $req->user->middlename }}
                                            </div>
                                        </td>
                                        <td class="px-4 py-4 align-top">
                                            <div class="font-medium text-gray-900 whitespace-nowrap">
                                                {{ $req->car->brand }} {{ $req->car->model }}
                                            </div>
                                            <div class="text-xs text-gray-500 mt-1">{{ $req->car->reg_number }}</div>
                                        </td>
                                        <td class="px-4 py-4 align-top">
                                            <p class="text-sm text-gray-700 max-w-xs" title="{{ $req->description }}">
                                                {{ Str::limit($req->description, 80) }}
                                            </p>
                                        </td>
                                        <td class="px-4 py-4 align-top">
                                            <form method="POST" action="{{ route('admin.updateDate', $req->id) }}" class="space-y-2">
                                                @csrf
                                                @method('POST')

                                                <input type="date" name="planned_date"
                                                       value="{{ $req->planned_date ? $req->planned_date->format('Y-m-d') : '' }}"
                                                       class="block w-full rounded-lg border-gray-300 shadow-sm text-sm focus:border-teal-500 focus:ring-2 focus:ring-teal-500">
                                                <select name="status_id"
                                                        class="block w-full rounded-lg border-gray-300 shadow-sm text-sm focus:border-teal-500 focus:ring-2 focus:ring-teal-500">
                                                    @foreach($statuses as $status)
                                                        <option value="{{ $status->id }}" {{ $req->status_id == $status->id ? 'selected' : '' }}>
                                                            {{ $status->name }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                                <button type="submit"
                                                        class="inline-flex items-center justify-center px-3 py-2.5 text-xs font-medium text-white bg-teal-500 rounded-lg transition-all duration-200 hover:bg-teal-600 hover:shadow-md active:scale-95 focus:outline-none focus:ring-2 focus:ring-teal-500/50 focus:ring-offset-1 w-full">
                                                    Сохранить
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-4 py-12 text-center text-gray-500">
                                            Пока нет заявок
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="lg:hidden space-y-4">
                        @forelse($requests as $req)
                            <div class="border border-gray-200 rounded-lg p-4 transition-shadow duration-200">
                                <div class="flex items-start justify-between gap-3 mb-3 pb-3 border-b border-gray-100">
                                    <div class="flex-1 min-w-0">
                                        <div class="font-medium text-gray-900 truncate">
                                            {{ $req->user->lastname }} {{ $req->user->name }} {{ $req->user->middlename }}
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="text-xs text-gray-500 mb-1">Автомобиль</div>
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ $req->car->brand }} {{ $req->car->model }}
                                    </div>
                                    <div class="text-xs text-gray-500 mt-0.5">{{ $req->car->reg_number }}</div>
                                </div>

                                <div class="mb-3">
                                    <div class="text-xs text-gray-500 mb-1">Описание</div>
                                    <p class="text-sm text-gray-700">{{ $req->description }}</p>
                                </div>

                                <form method="POST" action="{{ route('admin.updateDate', $req->id) }}" class="space-y-2 pt-3 border-t border-gray-100">
                                    @csrf
                                    @method('POST')
                                    <div>
                                        <label class="block text-xs font-medium text-gray-600 mb-1">Дата ремонта</label>
                                        <input type="date" name="planned_date"
                                               value="{{ $req->planned_date ? $req->planned_date->format('Y-m-d') : '' }}"
                                               class="block w-full rounded-lg border-gray-300 shadow-sm text-sm focus:border-teal-500 focus:ring-2 focus:ring-teal-500">
                                    </div>

                                    <div>
                                        <label class="block text-xs font-medium text-gray-600 mb-1">Статус</label>
                                        <select name="status_id"
                                                class="block w-full rounded-lg border-gray-300 shadow-sm text-sm focus:border-teal-500 focus:ring-2 focus:ring-teal-500">
                                            @foreach($statuses as $status)
                                                <option value="{{ $status->id }}" {{ $req->status_id == $status->id ? 'selected' : '' }}>
                                                    {{ $status->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <button type="submit"
                                            class="inline-flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-white bg-teal-500 rounded-lg transition-all duration-200 hover:bg-teal-600 hover:shadow-md active:scale-95 focus:outline-none focus:ring-2 focus:ring-teal-500/50 focus:ring-offset-1">
                                        Сохранить изменения
                                    </button>
                                </form>
                            </div>
                        @empty
                            <div class="text-center py-12 text-gray-500">
                                Пока нет заявок
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
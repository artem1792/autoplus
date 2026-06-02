<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            История моих заявок
        </h2>
    </x-slot>
    <div class="py-8 md:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg overflow-hidden">
                <div class="p-6">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
                        <h3 class="text-lg font-semibold text-gray-900">Список заявок</h3>
                        <a href="{{ route('requests.create') }}"
                           class="inline-flex justify-center items-center px-4 py-2 bg-teal-500 text-white text-sm font-medium rounded-lg transition-all duration-200 hover:bg-teal-600 hover:shadow-md active:scale-95">
                            Подать новую заявку
                        </a>
                    </div>

                    <div class="hidden md:block overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Авто</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Описание проблемы</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Статус / Дата</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Действия</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($requests as $req)
                                    <tr class="transition-colors duration-150 hover:bg-gray-50">
                                        <td class="px-4 py-4">
                                            <div class="font-medium text-gray-900">{{ $req->car->brand }} {{ $req->car->model }}</div>
                                            <div class="text-sm text-gray-500 mt-0.5">{{ $req->car->reg_number }}</div>
                                        </td>
                                        <td class="px-4 py-4 text-gray-700 max-w-xs">
                                            <p class="truncate" title="{{ $req->description }}">{{ $req->description }}</p>
                                        </td>
                                        <td class="px-4 py-4">
                                            <x-status-badge :status-name="$req->status->name" />
                                            @if($req->planned_date)
                                                <div class="text-sm text-gray-600 mt-1">
                                                    {{ $req->planned_date->format('d.m.Y') }}
                                                </div>
                                            @endif
                                        </td>
                                        <td class="px-4 py-4">
                                            <form method="POST" action="{{ route('requests.destroy', $req->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="text-sm text-red-600 font-medium transition-colors duration-150 hover:text-red-800">
                                                    Удалить
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-4 py-12 text-center text-gray-500">
                                            У вас пока нет заявок.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="md:hidden space-y-3">
                        @forelse($requests as $req)
                            <div class="border border-gray-200 rounded-lg p-4 transition-shadow duration-200 hover:shadow-md">
                                <div class="flex items-start justify-between gap-3 mb-2">
                                    <div class="flex-1 min-w-0">
                                        <div class="font-medium text-gray-900 truncate">
                                            {{ $req->car->brand }} {{ $req->car->model }}
                                        </div>
                                        <div class="text-sm text-gray-500 mt-0.5">{{ $req->car->reg_number }}</div>
                                    </div>
                                    <x-status-badge :status-name="$req->status->name" />
                                </div>
                                <p class="text-sm text-gray-700 mb-2 line-clamp-3">{{ $req->description }}</p>
                                @if($req->planned_date)
                                    <div class="text-sm text-gray-600 mb-3">
                                        Запланировано: {{ $req->planned_date->format('d.m.Y') }}
                                    </div>
                                @endif
                                <form method="POST" action="{{ route('requests.destroy', $req->id) }}" class="pt-2 border-t border-gray-100">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="text-sm text-red-600 font-medium transition-colors duration-150 hover:text-red-800">
                                        Удалить
                                    </button>
                                </form>
                            </div>
                        @empty
                            <div class="text-center py-12 text-gray-500">
                                У вас пока нет заявок.
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
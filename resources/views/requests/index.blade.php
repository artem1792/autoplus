<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            История моих заявок
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between mb-4">
                        <h3 class="text-lg font-bold">Список заявок</h3>
                        <a href="{{ route('requests.create') }}" class="bg-sky-500 text-white px-4 py-2 rounded hover:bg-sky-600">
                            Подать новую заявку
                        </a>
                    </div>

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-2 text-left">Авто</th>
                                <th class="px-4 py-2 text-left">Описание проблемы</th>
                                <th class="px-4 py-2 text-left">Статус / Дата</th>
                                <th class="px-4 py-2 text-left">Действия</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($requests as $req)
                            <tr>
                                <td class="px-4 py-2">
                                    <div class="font-bold">{{ $req->car->brand }} {{ $req->car->model }}</div>
                                    <div class="text-sm text-gray-500">{{ $req->car->reg_number }}</div>
                                </td>
                                <td class="px-4 py-2">{{ $req->description }}</td>
                                <td class="px-4 py-2">
                                    <x-status-badge :status-name="$req->status->name" />

                                    @if($req->planned_date)
                                    <div class="text-sm text-gray-600 mt-1">
                                        {{ $req->planned_date->format('d.m.Y') }}
                                    </div>
                                    @endif
                                </td>
                                <td class="px-4 py-2">
                                    <form method="POST" action="{{ route('requests.destroy', $req->id) }}" onsubmit="return confirm('Вы уверены, что хотите удалить заявку?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 text-sm">
                                            Удалить
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="px-4 py-2 text-center text-gray-500">У вас пока нет заявок.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
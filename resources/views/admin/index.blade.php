<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Административная панель
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold mb-4">Все заявки на ремонт</h3>

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-2 text-left">Пользователь (ФИО)</th>
                                <th class="px-4 py-2 text-left">Автомобиль</th>
                                <th class="px-4 py-2 text-left">Описание</th>
                                <th class="px-4 py-2 text-left">Назначить дату / Статус</th>
                                <th class="px-4 py-2 text-left">Действие</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($requests as $req)
                            <tr>
                                <td class="px-4 py-2">
                                    {{ $req->user->lastname }} {{ $req->user->name }} {{ $req->user->middlename }}
                                    <br>
                                    <span class="text-xs text-gray-500">{{ $req->user->tel }}</span>
                                </td>
                                <td class="px-4 py-2">
                                    {{ $req->car->brand }} {{ $req->car->model }}
                                    <br>
                                    <span class="text-xs text-gray-500">{{ $req->car->reg_number }}</span>
                                </td>
                                <td class="px-4 py-2">{{ $req->description }}</td>
                                <td class="px-4 py-2">
                                    <form method="POST" action="{{ route('admin.updateDate', $req->id) }}">
                                        @csrf
                                        @method('POST')
                                        <div class="flex flex-col gap-2">
                                            <input type="date" name="planned_date" value="{{ $req->planned_date ? $req->planned_date->format('Y-m-d') : '' }}" class="border-gray-300 rounded-md shadow-sm text-sm">

                                            <select name="status_id" class="border-gray-300 rounded-md shadow-sm text-sm">
                                                @foreach($statuses as $status)
                                                <option value="{{ $status->id }}" {{ $req->status_id == $status->id ? 'selected' : '' }}>
                                                    {{ $status->name }}
                                                </option>
                                                @endforeach
                                            </select>

                                            <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded text-xs hover:bg-green-600">
                                                Сохранить
                                            </button>
                                        </div>
                                    </form>
                                </td>
                                <td class="px-4 py-2 text-sm text-gray-500">
                                    Создано: {{ $req->created_at->format('d.m.Y') }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
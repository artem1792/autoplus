@props(['statusName'])

@php
    $colors = [
        'На рассмотрении' => 'bg-yellow-100 text-yellow-800',
        'Дата назначена' => 'bg-blue-100 text-blue-800',
        'Выполнено' => 'bg-green-100 text-green-800',
    ];
    $colorClass = $colors[$statusName] ?? 'bg-gray-100 text-gray-800';
@endphp

<span class="inline-flex items-center px-2.5 py-0.5 rounded-lg text-xs font-medium {{ $colorClass }}">
    {{ $statusName }}
</span>
@php
    $isContained = $isContained();
@endphp

<x-dynamic-component :component="$getEntryWrapperView()" :entry="$entry">
    <div
        {{
            $attributes
                ->merge([
                    'id' => $getId(),
                ], escape: false)
                ->merge($getExtraAttributes(), escape: false)
                ->class([
                    'fi-in-repeatable',
                    'fi-contained' => $isContained,
                ])
        }}
    >
        @if (count($childComponentContainers = $getChildComponentContainers()))
            <ol
                @class([
                    'relative border-gray-200 border-s dark:border-gray-700',
                    'grid gap-2',
                    match ($getGridColumns('default')) {
                        1 => 'grid-cols-1',
                        2 => 'grid-cols-2',
                        3 => 'grid-cols-3',
                        4 => 'grid-cols-4',
                        default => 'grid-cols-1',
                    },
                    match ($getGridColumns('sm')) {
                        1 => 'sm:grid-cols-1',
                        2 => 'sm:grid-cols-2',
                        3 => 'sm:grid-cols-3',
                        4 => 'sm:grid-cols-4',
                        default => '',
                    },
                    match ($getGridColumns('md')) {
                        1 => 'md:grid-cols-1',
                        2 => 'md:grid-cols-2',
                        3 => 'md:grid-cols-3',
                        4 => 'md:grid-cols-4',
                        default => '',
                    },
                    match ($getGridColumns('lg')) {
                        1 => 'lg:grid-cols-1',
                        2 => 'lg:grid-cols-2',
                        3 => 'lg:grid-cols-3',
                        4 => 'lg:grid-cols-4',
                        default => '',
                    },
                    match ($getGridColumns('xl')) {
                        1 => 'xl:grid-cols-1',
                        2 => 'xl:grid-cols-2',
                        3 => 'xl:grid-cols-3',
                        4 => 'xl:grid-cols-4',
                        default => '',
                    },
                    match ($getGridColumns('2xl')) {
                        1 => '2xl:grid-cols-1',
                        2 => '2xl:grid-cols-2',
                        3 => '2xl:grid-cols-3',
                        4 => '2xl:grid-cols-4',
                        default => '',
                    },
                ])
            >
                @foreach ($childComponentContainers as $container)
                    <li
                        @class([
                            'mb-4 ms-6',
                            'fi-in-repeatable-item block',
                            'rounded-xl bg-white p-4 shadow-sm ring-1 ring-gray-950/5 dark:bg-white/5 dark:ring-white/10' => $isContained,
                        ])
                    >
                        {{ $container }}
                    </li>
                @endforeach
            </ol>
        @elseif (($placeholder = $getPlaceholder()) !== null)
            <div class="fi-in-placeholder px-3 py-4 text-sm text-gray-400 dark:text-gray-600">
                {{ $placeholder }}
            </div>
        @endif
    </div>
</x-dynamic-component>
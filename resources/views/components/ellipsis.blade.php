@props([
    'text',
    'limit' => 200
])

<p title="{{ $text }}">
    {{ \Illuminate\Support\Str::limit($text, $limit, '...') }}
</p>

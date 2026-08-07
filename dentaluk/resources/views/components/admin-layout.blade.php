@props([
    'title' => 'Admin CMS Panel | Icon Dental Wembley',
    'headerTitle' => 'Practice Management Console'
])
<x-layouts.admin :title="$title" :headerTitle="$headerTitle">
    {{ $slot }}
</x-layouts.admin>

<x-app-layout title="{{ $page->meta_title ?? ($page->title . ' | Icon Dental Wembley') }}" description="{{ $page->meta_description ?? 'Legal and compliance policy details for Icon Dental Wembley.' }}">
    <section class="section-padding bg-light">
        <div class="container custom-container py-4">
            <div class="bg-white p-5 rounded-4 shadow-sm border-0">
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none text-muted">Home</a></li>
                        <li class="breadcrumb-item active fw-bold" aria-current="page">{{ $page->title }}</li>
                    </ol>
                </nav>

                <h1 class="welcome-title text-start mb-4" style="font-size: 36px; color: var(--primary-blue);">{{ $page->title }}</h1>
                <hr class="mb-4" style="border-color: rgba(177, 152, 111, 0.3);">

                <div class="legal-content-body" style="font-size: 16px; line-height: 1.8; color: #4a5568;">
                    {!! $page->content !!}
                </div>
            </div>
        </div>
    </section>
</x-app-layout>

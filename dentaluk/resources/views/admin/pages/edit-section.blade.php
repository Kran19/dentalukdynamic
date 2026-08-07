<x-layouts.admin title="Edit Section | Icon Dental CMS" headerTitle="Edit Page Section Content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="h4 text-light font-serif mb-1">Edit Section: <span class="text-warning">{{ $section->section_key }}</span></h2>
            <p class="text-white-50 small mb-0">Page: {{ $section->page->title }}</p>
        </div>
        <a href="{{ route('admin.pages.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="fa-solid fa-arrow-left me-1"></i> Back to Pages
        </a>
    </div>

    <div class="cms-card">
        <div class="cms-card-body">
            <form action="{{ route('admin.pages.sections.update', $section) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row g-4">
                    <div class="col-md-6">
                        <label class="form-label small text-light">Section Heading Title</label>
                        <input type="text" name="title" class="form-control bg-dark text-light border-secondary" value="{{ old('title', $section->title) }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label small text-light">Section Subtitle / Badge</label>
                        <input type="text" name="subtitle" class="form-control bg-dark text-light border-secondary" value="{{ old('subtitle', $section->subtitle) }}">
                    </div>

                    @if ($section->content)
                        <div class="col-12">
                            <h5 class="text-warning text-uppercase fw-bold border-bottom border-secondary pb-2 mb-3" style="font-size: 13px;">
                                Dynamic Content Attributes
                            </h5>
                        </div>

                        @foreach ($section->content as $cKey => $cValue)
                            <div class="col-md-6">
                                <label class="form-label small text-light">{{ ucfirst(str_replace('_', ' ', $cKey)) }}</label>
                                @if (is_string($cValue) && strlen($cValue) > 80)
                                    <textarea name="content[{{ $cKey }}]" class="form-control bg-dark text-light border-secondary" rows="3">{{ old("content.{$cKey}", $cValue) }}</textarea>
                                @else
                                    <input type="text" name="content[{{ $cKey }}]" class="form-control bg-dark text-light border-secondary" value="{{ old("content.{$cKey}", is_array($cValue) ? json_encode($cValue) : $cValue) }}">
                                @endif
                                <small class="text-white-50" style="font-size: 11px;">Field: <code>{{ $cKey }}</code></small>
                            </div>
                        @endforeach
                    @endif
                </div>

                <div class="mt-4 pt-3 border-top border-secondary">
                    <button type="submit" class="btn btn-gold">
                        <i class="fa-solid fa-floppy-disk me-1"></i> Save Section Content
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.admin>

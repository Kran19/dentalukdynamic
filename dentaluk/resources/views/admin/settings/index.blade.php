<x-layouts.admin title="Global Settings | Icon Dental CMS" headerTitle="Global Clinic Settings">
    <div class="cms-card">
        <div class="cms-card-header">
            <h3 class="cms-card-title"><i class="fa-solid fa-sliders me-2"></i> Global Clinic Settings</h3>
        </div>
        <div class="cms-card-body">
            <form action="{{ route('admin.settings.update') }}" method="POST">
                @csrf
                
                <div class="row g-4">
                    @foreach ($settings as $group => $items)
                        <div class="col-12">
                            <h5 class="text-warning text-uppercase fw-bold border-bottom border-secondary pb-2 mb-3" style="font-size: 13px; letter-spacing: 1px;">
                                {{ ucfirst($group) }} Settings
                            </h5>
                        </div>

                        @foreach ($items as $item)
                            <div class="col-md-6">
                                <label class="form-label text-light fw-medium small">{{ $item->label ?? ucfirst(str_replace('_', ' ', $item->key)) }}</label>
                                
                                @if ($item->type === 'textarea')
                                    <textarea name="{{ $item->key }}" class="form-control bg-dark text-light border-secondary" rows="3">{{ old($item->key, $item->value) }}</textarea>
                                @else
                                    <input type="text" name="{{ $item->key }}" class="form-control bg-dark text-light border-secondary" value="{{ old($item->key, $item->value) }}">
                                @endif
                                <small class="text-white-50" style="font-size: 11px;">Key: <code>{{ $item->key }}</code></small>
                            </div>
                        @endforeach
                    @endforeach
                </div>

                <div class="mt-4 pt-3 border-top border-secondary">
                    <button type="submit" class="btn btn-gold">
                        <i class="fa-solid fa-floppy-disk me-1"></i> Save All Settings
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.admin>

@props([
    'name' => 'image_path',
    'label' => 'Select Asset Image',
    'value' => null,
    'placeholder' => 'assets/images/temp-img.jpeg'
])

@php
    $currentImage = $value ? asset($value) : asset($placeholder);
@endphp

<div class="media-picker-component mb-3">
    @if ($label)
        <label class="form-label text-gold small fw-bold mb-2">{{ $label }}</label>
    @endif

    <div class="d-flex align-items-center gap-3 p-3 bg-dark border border-secondary rounded-3">
        <div class="media-preview-box overflow-hidden rounded-2 border border-secondary" style="width: 70px; height: 70px; background: #0b120a;">
            <img id="preview_{{ $name }}" src="{{ $currentImage }}" alt="Preview" class="w-100 h-100 object-fit-cover">
        </div>
        
        <div class="flex-grow-1">
            <input type="text" id="input_{{ $name }}" name="{{ $name }}" value="{{ $value }}" class="form-control form-control-sm bg-secondary text-light border-0 mb-2" placeholder="Path or image URL">
            <button type="button" class="btn btn-outline-warning btn-sm" onclick="openMediaPickerModal('{{ $name }}')">
                <i class="fa-regular fa-images me-1"></i> Choose From Media Library
            </button>
        </div>
    </div>
</div>

<!-- Standardized Global Media Picker Modal Handler -->
@once
<div class="modal fade" id="globalMediaPickerModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-dark text-light border border-secondary">
            <div class="modal-header border-secondary">
                <h5 class="modal-title font-serif text-warning"><i class="fa-regular fa-images me-2"></i> Central Media Asset Library</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="input-group mb-3">
                    <span class="input-group-text bg-secondary text-light border-0"><i class="fa-solid fa-magnifying-glass"></i></span>
                    <input type="text" id="mediaSearchInput" class="form-control bg-secondary text-light border-0" placeholder="Search media assets...">
                </div>

                <div class="row g-3" id="mediaGridContainer" style="max-height: 350px; overflow-y: auto;">
                    @php
                        $mediaAssets = \App\Models\Media::latest()->take(24)->get();
                    @endphp
                    @forelse ($mediaAssets as $asset)
                        <div class="col-4 col-md-3 col-lg-2">
                            <div class="media-select-card border border-secondary rounded p-1 text-center style-pointer" onclick="selectMediaAsset('{{ $asset->file_path }}')">
                                <img src="{{ asset($asset->file_path) }}" alt="{{ $asset->alt_text ?? 'Asset' }}" class="img-fluid rounded mb-1" style="height: 60px; object-fit: cover;">
                                <div class="text-truncate text-white-50" style="font-size: 10px;">{{ $asset->filename }}</div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center text-white-50 py-4">
                            <i class="fa-regular fa-folder-open fs-2 mb-2 d-block text-warning"></i>
                            <p class="mb-0">No media assets stored yet. Upload new images via the Media Library menu.</p>
                        </div>
                    @endforelse
                </div>
            </div>
            <div class="modal-footer border-secondary">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    let activeTargetInputName = null;

    function openMediaPickerModal(fieldName) {
        activeTargetInputName = fieldName;
        const modal = new bootstrap.Modal(document.getElementById('globalMediaPickerModal'));
        modal.show();
    }

    function selectMediaAsset(filePath) {
        if (activeTargetInputName) {
            document.getElementById('input_' + activeTargetInputName).value = filePath;
            document.getElementById('preview_' + activeTargetInputName).src = '/' + filePath;
            
            const modalEl = document.getElementById('globalMediaPickerModal');
            const modal = bootstrap.Modal.getInstance(modalEl);
            if (modal) modal.hide();
        }
    }
</script>
@endonce

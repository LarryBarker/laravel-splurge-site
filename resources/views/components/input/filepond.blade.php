<div wire:ignore x-data x-init="
        FilePond.registerPlugin(FilePondPluginImagePreview);
        FilePond.setOptions({
            server: {
                process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                    @this.upload('{{ $attributes['wire:model'] }}', file, load, error, progress);
                },
                revert: (filename, load) => {
                    @this.removeUpload('{{ $attributes['wire:model'] }}', filename, load)
                }
            },
        });
        FilePond.create($refs.input)
    ">
    <input x-ref="input" type="file" {{ $attributes }}>
</div>

@push('styles')
<link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
@endpush

@push('scripts')
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src="https://unpkg.com/filepond/dist/filepond.js"></script>
@endpush
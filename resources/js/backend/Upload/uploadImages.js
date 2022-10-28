import * as FilePond from 'filepond';
import FilePondPluginImageCrop from 'filepond-plugin-image-crop';
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';
import FilePondPluginImageResize from 'filepond-plugin-image-resize';
import FilePondPluginImageEdit from 'filepond-plugin-image-edit';
import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type';

FilePond.registerPlugin(
    FilePondPluginImagePreview,
    FilePondPluginImageCrop,
    FilePondPluginImageResize,
    FilePondPluginImageEdit,
    FilePondPluginFileValidateType
);

const inputElement = document.querySelector('input[name="file"]');
let _token = document.querySelector('meta[name="csrf-token"]').getAttribute('content')
const pond = FilePond.create(inputElement, {
    labelIdle: `Glissez et déposez vos fichiers`,
    labelFileLoading: 'Chargement ...',
    allowImageCrop: true,
    acceptedFileTypes: ['image/*'],
});

pond.setOptions({
    server: {
        process: '/admins/upload-images',
        revert: '/admins/remove-images',
        headers: {
            'X-CSRF-Token': _token
        }
    }
})

import Jodit from 'jodit';

document.addEventListener('DOMContentLoaded', () => {
    const textareas = document.querySelectorAll('.jodit-editor');
    textareas.forEach(textarea => {
        Jodit.make(textarea, {
            height: 500,
            language: 'id',
            buttons: [
                'source', '|',
                'bold', 'italic', 'underline', 'strikethrough', '|',
                'font', 'fontsize', 'brush', '|',
                'ul', 'ol', '|',
                'align', '|',
                'table', 'link', 'image', 'video', '|',
                'hr', 'eraser', '|',
                'undo', 'redo', '|',
                'fullsize', 'print'
            ],
            uploader: {
                insertImageAsBase64URI: true,
            },
        });
    });
});
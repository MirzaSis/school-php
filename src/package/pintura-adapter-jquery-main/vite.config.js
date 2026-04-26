import { resolve } from 'path';

export default {
    build: {
        type: ['iife', 'es'],
        lib: {
            entry: resolve(__dirname, 'src/index.js'),
            name: 'useEditorWithJQuery',
            fileName: 'useEditorWithJQuery',
            formats: ['es', 'iife'],
        },
        rollupOptions: {
            output: {
                globals: 'useEditorWithJQuery',
            },
        },
    },
};

 <div {{ $attributes->only('class') }}>
     <div class="h-full w-full "
    x-data='{ editor: null, data: JSON.parse(@json($value)), base: "{{ isSet($template) ? base64_encode(view('pages.templates.template')->render()) : base64_encode('<div id="document"></div>') }}" }'
    x-init="

    [
        'https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest',
        'https://cdn.jsdelivr.net/npm/@editorjs/image@2.3.0',
        'https://cdn.jsdelivr.net/npm/@editorjs/attaches@latest',
        'https://cdn.jsdelivr.net/npm/@editorjs/table@latest',
        'https://cdn.jsdelivr.net/npm/@editorjs/header@latest',
        'https://cdn.jsdelivr.net/npm/@editorjs/nested-list@latest',
        'https://cdn.jsdelivr.net/npm/@editorjs/paragraph@latest'
    ].forEach((s)=> $refs.iframe.contentDocument.write('<script type=\'text/javascript\' src=\''+s+'\'></script>'));



    $refs.iframe.contentDocument.write(decodeURIComponent(escape(atob(base))));


    window.addEventListener('message', event => {$refs.output.value = JSON.stringify(event.data.data)}, false);
    $refs.iframe.contentDocument.write(`
    <script>
        editor = new EditorJS({
            holder: document.getElementById('document'),
            data: `+JSON.stringify(data)+`,
            onChange: () => editor.save().then((data) => {
                parent.postMessage({
                    $ref: '',
                    data
                })
                // $refs.output.value = JSON.stringify(data)

            }),
            tools: {
                image: {
                    class: window.ImageTool,
                    config: {
                        endpoints: {
                            byFile: '/api/upload-image',
                            byUrl: '/api/upload-image',
                        }
                    }
                },
                header: {
                    class: window.Header,
                    shortcut: 'CMD+SHIFT+H'
                },
                attaches: {
                    class: window.AttachesTool,
                    config: {
                        endpoint: 'http://localhost:8008/uploadFile'
                    }
                },
                table: {
                    class: window.Table,
                },
                paragraph: {
                    class: window.Paragraph
                },
                list: {
                    class: window.NestedList
                },
            }
        })
    </script>
    `);






">
    <input type="hidden"
        x-ref="output" {{ $attributes->except('class') }} />
    <iframe x-ref="iframe" class="w-full h-full" frameborder="0"></iframe>
</div>
</div>

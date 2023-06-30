@php
$style_bold = 'bg-gray-200 appearance-none border-2 border-gray-200  rounded w-full  p-6 pb-8 rounded flex flex-col items-center justify-center relative text-gray-700 leading-tight focus:outline-none';
$style_normal = 'border-2 border-dashed border-gray-300 p-6 pb-7 rounded flex flex-col items-center justify-center relative';
@endphp
<div x-data='{
    name: "",
    status: "",
    progress: 0,
    signature: @json(App\Models\File::signed_transfer()),
    upload(e){


        axios.put(this.signature.url, this.$refs.file.files[0], {
            headers: this.signature.headers,
            onUploadProgress: (progressEvent) => {
                this.progress = (progressEvent.loaded / progressEvent.total)*100;
            }
        }).then(()=>{
            this.status = "uploaded";
            $wire.set("{{ $name }}.id", this.signature.uuid)
            $wire.set("{{ $name }}.name", this.$refs.file.files[0].name)
        }).catch(()=>{
            this.status = "failed";
        })

} }'>



    <div class="{{ isset($bold) ? $style_bold : $style_normal }}">

        <div class="h-10 w-10 text-blue-500 items-center justify-center flex">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
            </svg>
        </div>
        <div class="text-gray-700 mt-3 text-sm">Upload a file<span class="text-gray-400 ml-1">or drag and drop</span>
        </div>
        <div class="text-gray-400 text-xs mt-2">PNG, JPEG, GIF, DOC, EXCEL</div>
        <input x-ref="file" type="file" accept="*" x-on:change="upload($event)"
            {{ isset($autofocus) && $autofocus === true ? 'autofocus' : '' }} class="opacity-0 absolute inset-0" />

    </div>


    <div x-show="status === 'failed'">Upload failed</div>


    <div class="flex items-center mt-4" x-show="progress > 0" x-cloak>
        <span x-show="status === ''" class="mr-2 text-xs uppercase text-gray-500">Uploading</span>
        <span x-show="status === 'uploaded'" class="mr-2 text-xs uppercase text-green-500 flex items-center">
            READY
        </span>

        <div class="flex-grow h-2 rounded-full bg-gray-200">
            <div class="h-2 bg-green-500 rounded-full" :style="`width: ${progress}%;`"></div>
        </div>

    </div>



</div>

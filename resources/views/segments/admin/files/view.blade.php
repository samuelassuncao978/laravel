   <div class="fixed inset-0 bg-black bg-opacity-50 z-50">
       <div
           class="bg-white absolute flex flex-col top-20 rounded-t-3xl shadow-2xl bottom-0 left-1/2 transform -translate-x-1/2 w-4/6 z-20">


           <x-modal.masthead :title="$file->name">
               @slot('information')


                   <div>
                       Size:
                       <span class="text-blue-500">{{ human_filesize($file->size ?? 0) }}</span>
                   </div>
                   <div>
                       Kind:
                       @if ($file->mime === 'application/vnd.openxmlformats-officedocument.wordprocessingml.document')
                           <span class="text-blue-500">Document</span>
                       @elseif($file->mime === 'application/pdf')
                           <span class="text-blue-500">Document</span>
                       @elseif($file->mime === 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet')
                           <span class="text-blue-500">Spreadsheet</span>
                       @elseif($file->mime === 'txt')
                           <span class="text-blue-500">Text</span>
                       @elseif($file->mime === 'image/png' || $file->mime === 'image/jpeg')
                           <span class="text-blue-500">Image</span>
                       @endif
                   </div>
                   <div>
                       Created at:
                       <span class="text-blue-500">
                           <x-ui.timestamp :date="$file->created_at" local="Y-m-d H:i" />
                       </span>
                   </div>
                   <div>
                       Updated at:
                       <span class="text-blue-500">
                           <x-ui.timestamp :date="$file->updated_at" local="Y-m-d H:i" />
                       </span>
                   </div>
               @endslot
           </x-modal.masthead>

           <div class="bg-gray-50 flex-grow border-t border-gray-200 scrollbar">

               @if ($file->mime === 'application/vnd.openxmlformats-officedocument.wordprocessingml.document')
                   <span>Cannot render</span>
               @elseif($file->mime === 'application/pdf')
                   <iframe src="{{ $file->uri() }}" class="h-full w-full" frameborder="0"></iframe>
               @elseif($file->mime === 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet')
                   <span>Cannot render</span>
               @elseif($file->mime === 'image/png' || $file->mime === 'image/jpeg')
                   <span wire:ignore class="h-full w-full flex items-center justify-center p-20 bg-preview"
                       x-data="{loading:true}"
                       x-init="
                        $refs.image.setAttribute('src',  $refs.image.getAttribute('data-src'));
                       $refs.image.addEventListener('load', (e) =>{ e.target.classList.remove('opacity-0'); loading = false; });">
                       <img x-ref="image" class="opacity-0 object-contain shadow rounded-lg"
                           src="{{ $file->thumbnail('sm') }}" data-src="{{ $file->uri() }}" />
                       <div x-show="loading" class="absolute inset-0 rounded overflow-hidden">
                           <x-ui.loading-indicator :loading="true" spinner="border-gray-500" bg="bg-none" />
                       </div>
                   </span>
               @elseif($file->mime === 'txt')
                   <span class="text-blue-500">Text</span>
               @endif
           </div>



           <button type="button" wire:click="close"
               class="absolute top-5 text-gray-700 right-5 z-30 rounded-full bg-gray-200 p-2 hover:bg-gray-300 focus:bg-gray-800 focus:text-white focus:outline-none">
               <svg class="fill-current w-4 h-4 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                   <path
                       d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z" />
               </svg>

           </button>

       </div>
   </div>

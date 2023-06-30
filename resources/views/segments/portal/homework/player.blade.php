 <div
 x-data="{open: false}"
 x-init="
open = true;
  


   "
   
 
 class="fixed inset-0 bg-gray-700 bg-opacity-75 z-50 flex flex-col items-center justify-center">
     <div
         class="flex w-full overflow-hidden flex-col items-center shadow-2xl  bg-white h-full w-full lg:h-5/6 lg:w-2/3 lg:rounded-3xl lg:p-8 lg:pt-0 relative">
         <div class="p-3 bg-gray-700 lg:bg-gray-100 rounded-b-xl flex w-full text-white lg:text-gray-700 flex items-center justify-center ">
             <div class="mr-10 flex-1 truncate text-sm md:text-3xl">{{ $this->homework->name }}</div>
             <button wire:click="close" type="button"
             class=" text-gray-700 overflow-hidden  right-5 z-30 rounded-full bg-gray-200 p-2 hover:bg-gray-300 focus:bg-gray-800 focus:text-white focus:outline-none">
             <svg class="fill-current w-4 h-4 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                 <path
                     d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z" />
             </svg>
         </button>
         </div>
       
         @php
            $file = optional($this->homework->files())->first();
         @endphp

        <div class="w-full flex-grow bg-white flex flex-col overflow-y-scroll" style="scroll-snap-type: y mandatory;">
            @foreach( optional($file)->pages() ?? [] as $page )
            <div class="flex items-center justify-center" style="flex:0 0 100%; scroll-snap-align: start;"><img src="{{ $page }}" alt=""></div>
            @endforeach
        </div>

         <!-- <iframe class="flex-grow w-full rounded-t-3xl lg:rounded-3xl " src="{{ optional(optional($this->homework->files())->first())->uri() }}
        " frameborder="0"></iframe> -->
     </div>

 </div>

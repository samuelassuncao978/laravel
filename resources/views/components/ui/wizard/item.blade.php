 <div>
     <div class="relative mb-2">
         @if (!isset($last))
             <!-- style="width: calc(100% - 3.5rem - 1rem); top: 50%; transform: translate(calc(100% + 1rem), -50%)" -->
             <div
                 class="absolute flex align-center items-center align-middle content-center top-1/2 left-full w-1/2 transform -translate-y-1/2 -translate-x-1/2">
                 <div class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1">
                     @if (isset($complete) && $complete === true)
                         <div class="w-0 bg-blue-500 py-1 rounded" style="width: 100%;"></div>
                     @elseif($active)
                         <div class="w-0 bg-blue-300 py-1 rounded" style="width: 33%;"></div>
                     @else
                         <div class="w-0 bg-blue-300 py-1 rounded" style="width: 0%;"></div>
                     @endif
                 </div>
             </div>
         @endif
         <div
             class="w-6 h-6 p-1 mx-auto {{ $active ? 'bg-blue-500 border-blue-500 text-white' : 'bg-white border-gray-200 text-blue-500' }} rounded-full border-2 flex items-center">
             <x-icon.solid :icon="$icon" />
         </div>
     </div>

     <div class="text-center {{ $active ? 'text-gray-700' : 'text-gray-500' }}">{{ $label ?? '' }}</div>
 </div>

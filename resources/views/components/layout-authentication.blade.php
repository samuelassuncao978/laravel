<div class="bg-gray-100 text-gray-600 h-screen flex overflow-hidden items-center justify-center flex-grow">
    <div
        class="flex flex-col overflow-hidden bg-blue-500 rounded-md shadow-lg max md:flex-row md:flex-1 lg:max-w-screen-md">
        <div class="p-4 py-6 text-white  md:w-80 md:flex-shrink-0 flex md:flex-col items-center md:justify-evenly">
            <div class="my-3 text-4xl font-bold tracking-wider text-center">
                <a href="/" tabindex="-1" class="block w-40">
                    <x-logo />
                </a>
            </div>
            <!-- <p class="mt-4 px-6 block font-normal text-sm md:text-center text-gray-300">
            With the power of Sihq, you can now focus only on improving your profit margins, while leaving the
            heavy lifting to us!
          </p> -->

            <div class="mt-6 text-xs text-center text-white text-opacity-40 flex-grow items-end hidden md:flex">
                <p>&copy; <a href="/" tabindex="-1">Sihq</a> 2021</p>
            </div>
        </div>
        <div class="p-14 bg-white  md:flex-1">
            {{ $slot }}
        </div>
    </div>
</div>

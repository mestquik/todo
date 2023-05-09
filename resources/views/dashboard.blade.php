 <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('To-doQuie') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100"><a href="{{route('done')}}">
                        {{ __("To do Listesine gitmek için dokunabilirsin!") }}
                    </a>

                </div>
            </div>
        </div>
    </div>
     <div class="py-12">
         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                 <div class="p-6 text-gray-900 dark:text-gray-100"><a href="{{route('create')}}">
                         {{ __("Yeni bir görev oluşturmak için de buraya dokunablirsin!") }}
                     </a>

                 </div>
             </div>
         </div>
     </div>
</x-app-layout>

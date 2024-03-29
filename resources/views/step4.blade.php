 @php($type = request()->query('type'))
 @php($placeid = request()->query('id'))
 @extends('layouts.app')

 @section('main')
     <div data-barba="container">

         <div class="flex flex-col h-screen mx-auto">
  <div id="message" class="fixed p-2 font-bold text-white bg-green-500 border rounded top-5 right-5"></div>
                <div class="flex flex-row justify-between pt-2">
                     <a href="/" class="prevent"> <i class="mt-4 ml-4 text-2xl text-gray-900 fas fa-close"></i></a> <button id="skip" class="text-gray-800 text-sm mt-6 mr-4">Skip</button>
                 </div>
             <form action="upload-image" method="POST" enctype="multipart/form-data">
                 @csrf
                 <div class="flex flex-col items-center justify-center">
                     <h1 class="pt-[8%] mx-8 text-3xl font-bold text-center text-gray-900">{{ __('messages.Would you change something in this space?') }}
                     </h1>
                     <div class="">
                         <div x-data="{ total_value: 50 }" class="max-w-screen-md pt-10 pb-16 mx-auto">
                             <input name="change" id="change" class="hidden" type="input" x-model="total_value" />
                             <div class="flex justify-between">
                                 <label for="default-range"
                                     class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('messages.nothing at all') }}</label>
                                 <label for="default-range"
                                     class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('messages.many things') }}</label>
                             </div>
                             <div class="flex justify-between w-full px-2 text-xs pb-2">
                                 <span>0</span>
                                 <span>1</span>
                                 <span>2</span>
                                   <span>3</span>
                                     <span>4</span>
                                       <span>5</span>
                                            <span>6</span>
                                            <span>7</span>
                                                <span>8</span>
                                                <span>9</span>
                                                    <span>10</span>
                             </div>
                             <input id="range"
                                 class="block h-3 bg-gray-300 rounded-lg appearance-none cursor-pointer w-80 range-lg"
                                 type="range" x-model="total_value" min="0" max="100" step="5">


                         </div>
                     </div>
                     <div x-data="{ modelOpen: false }" class="bg-[#CDB8EB] w-full p-4">
                         <div class="flex justify-center">
                             <button type="button" id="modalform" @click="modelOpen =!modelOpen"
                                 class="px-2 py-8 text-3xl font-bold text-center bg-white rounded-xl">
                                 {{ __('messages.Describe and share a photo!') }}
                             </button>
                         </div>

                         <div x-cloak x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto"
                             aria-labelledby="modal-title" role="dialog" aria-modal="true">
                             <div class="flex items-center justify-center min-h-screen px-4 text-center sm:block sm:p-0">
                                 <div x-cloak @click="modelOpen = false" x-show="modelOpen"
                                     x-transition:enter="transition ease-out duration-300 transform"
                                     x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                     x-transition:leave="transition ease-in duration-200 transform"
                                     x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                     class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40" aria-hidden="true">
                                 </div>

                                 <div x-cloak x-show="modelOpen"
                                     x-transition:enter="transition ease-out duration-300 transform"
                                     x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                     x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                     x-transition:leave="transition ease-in duration-200 transform"
                                     x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                     x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                     class="z-50 inline-block w-full max-w-xl p-8 overflow-hidden transition-all transform">

                                     <div class="w-full">
                                         <div class="flex flex-col p-4 mt-4 font-bold bg-[#CDB8EB] shadow rounded-lg mynav">
                                             <div class="flex flex-col space-y-4">
                                                 <div class="flex flex-col space-y-2">
                                                     <label for="description"
                                                         class="text-sm font-bold text-gray-700">{{ __('messages.Describe what you would change!') }}</label>
                                                     <textarea name="description2" id="description2" cols="10" rows="10"
                                                         class="w-full px-4 py-2 text-gray-700 border rounded-lg focus:outline-none focus:border-purple-300" placeholder=""></textarea>
                                                 </div>
                                                 <div class="flex flex-col space-y-2">
                                                     <input type="file" name="image" id="image" class="hidden"
                                                        accept="image/*;capture=camera">
                                                     <label for="image" class="cursor-pointer">
                                                         <div
                                                             class="w-full px-4 py-4 font-bold text-black bg-white rounded-lg hover:bg-gray-200 focus:outline-none focus:shadow-outline">
                                                             {{ __('messages.Upload a photo') }}</div>
                                                     </label>
                                                      <div id="success-message" class="hidden font-bold text-green-500">{{ __('messages.File selected successfully!') }}</div>
                                                 </div>
                                                 <button type="submit"
                                                     class="w-full px-4 py-4 font-bold text-black bg-white rounded-lg hover:bg-gray-200 focus:outline-none focus:shadow-outline">{{ __('messages.Save') }}</button>
                                                 <input type="hidden" name="type" value="{{ $type }}">
                                                 <input type="hidden" name="placeid" value="{{ $placeid }}">
                                             </div>

                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <button id="saveplace" type="submit"
                         class="px-4 text-2xl py-2 text-gray-800 bg-[#CDB8EB] hover:bg-purple-300 active:bg-purple-400 border focus:outline-none rounded-xl font-bold mt-16  mb-4">
                         {{ __('messages.Next challenge!') }}
                     </button>
                 </div>
             </form>
         </div>
     </div>
     <script>
         const fileInput = document.getElementById('image');
         const successMessage = document.getElementById('success-message');

         fileInput.addEventListener('change', () => {
             successMessage.classList.remove('hidden');
         });


                  function showMessage(message) {
             var messageBox = document.getElementById("message");
             messageBox.innerHTML = message;
             messageBox.style.display = "block"; // set display to block to show the message
             setTimeout(function() {
                 messageBox.style.display = "none"; // hide the message after 3 seconds
             }, 2000);
         }

        $('#skip').click(function() {
          var btn = document.getElementById("saveplace");
          btn.click();
         });

     </script>
     <style>
         input[type="range"]::-webkit-slider-thumb {
             -webkit-appearance: none;
             appearance: none;
             background: #CDB8EB;
         }


         #message {
             display: none;
         }

     </style>
 @endsection

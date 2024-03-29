@extends('layouts.app')

@section('main')
    <div data-barba="container">

        <div class="flex flex-col h-screen mx-auto">
  <div id="message" class="fixed p-2 font-bold text-white bg-green-500 border rounded top-5 right-5"></div>
                  <div class="flex flex-row justify-between pt-2">
                     <a href="/" class="prevent"> <i class="mt-4 ml-4 text-2xl text-gray-900 fas fa-close"></i></a> <button id="skip" class="text-gray-800 text-sm mt-6 mr-4">Skip</button>
                 </div>
            <form action="protected" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col items-center justify-center">
                    <h1 class="mx-8 text-3xl font-bold text-center text-gray-900">{{ __('messages.Let others know how protected the space is!') }}
                    </h1>
                    <div class="pb-8">
                        <div x-data="{ total_value: 50 }" class="max-w-screen-md pt-4 pb-16 mx-auto">
                            <input name="protected" id="protected" class="hidden" type="input" x-model="total_value" />
                            <div class="flex justify-between">
                                <label for="default-range"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('messages.very unsafe') }}</label>
                                <label for="default-range"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('messages.very safe') }}</label>
                            </div>
                           <div class="flex justify-between w-full px-2 text-xs py-2">
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
                                class="block h-3 bg-gray-300 rounded-lg appearance-none cursor-pointer w-80 range-lg "
                                type="range" x-model="total_value" min="0" max="100" step="5">
                            <input type="hidden" name="type" id="type" value="{{ $type }}">
                            <input type="hidden" name="placeid" id="placeid" value="{{ $placeid }}">

                        </div>
                    </div>
                    <div class="relative flex items-center justify-center w-64 h-64">

                
                        <div x-data="{ modelOpen: false }">
                            <button type="button" id="play" @click="modelOpen =!modelOpen"
                               class="absolute rounded-full bg-[#CDB8EB] w-28 h-28 text-white font-bold"
                                style="bottom: 100%; right: 50%; transform: translate(50%, 50%)">{{ __('messages.traffic safety') }}</button>

                            <div x-cloak x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto"
                                aria-labelledby="modal-title" role="dialog" aria-modal="true">
                                <div class="flex items-center justify-center min-h-screen px-4 text-center sm:block sm:p-0">
                                    <div x-cloak @click="modelOpen = false" x-show="modelOpen"
                                        x-transition:enter="transition ease-out duration-300 transform"
                                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                        x-transition:leave="transition ease-in duration-200 transform"
                                        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                        class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40 myclass"
                                        aria-hidden="true">
                                    </div>

                                    <div x-cloak x-show="modelOpen"
                                        x-transition:enter="transition ease-out duration-300 transform"
                                        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                        x-transition:leave="transition ease-in duration-200 transform"
                                        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                        class="mymodal inline-block w-full max-w-xl overflow-hidden transition-all transform bg-[#CDB8EB] rounded-lg shadow-xl 2xl:max-w-2xl z-60 md:mt-60">

                                        <div class="items-center pt-3 space-x-4 bloc">
                                            <div class="flex flex-col justify-center">
                                                <h1 class="py-4 text-3xl font-bold">{{ __('messages.Protection from traffic') }}</h1>
                                                <div x-data="{ total_value: 50 }" class="max-w-screen-md pb-4 mx-auto">
                                                    <input name="protection" id="protection" class="hidden" type="input"
                                                        x-model="total_value" />

                                                    <input id="range2"
                                                        class="block h-3 bg-white rounded-lg appearance-none cursor-pointer w-80 range-lg "
                                                        type="range" x-model="total_value" min="0" max="100"
                                                        step="5">
                                                   <div class="flex justify-between w-full px-2 text-xs py-2">
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
                                                    <div class="flex justify-between">
                                                        <label for="default-range"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('messages.poor') }}</label>
                                                        <label for="default-range"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('messages.great!') }}</label>
                                                    </div>

                                                </div>

                                                      <div>
                                                    <input type="text" name="protection_text" id="protection_text"
                                                        class="w-80 h-10 rounded-lg focus:outline-none focus:ring-1 focus:ring-[#CDB8EB] focus:border-transparent"
                                                        placeholder="Describe!">
                                                </div>
                                                
                                                <button type="button" id="activitiesbtn" onclick="newAction('protection')"
                                                    class="px-4 py-2 mt-4 text-2xl font-bold text-gray-800 bg-white hover:bg-gray-100 active:bg-gray-200 focus:outline-none">{{ __('messages.Save') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- place to rest --}}
                        <div x-data="{ modelOpen: false }">
                            <button type="button" id="play" @click="modelOpen =!modelOpen"
                                class="absolute rounded-full bg-[#CDB8EB] w-28 h-28 text-white font-bold"
                                style="top: 25%; right: 5%; transform: translate(50%, -50%)">{{ __('messages.Pollutants') }}<br> ({{ __('messages.dust, smells') }})</button>

                            <div x-cloak x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto"
                                aria-labelledby="modal-title" role="dialog" aria-modal="true">
                                <div
                                    class="flex items-center justify-center min-h-screen px-4 text-center sm:block sm:p-0">
                                    <div x-cloak @click="modelOpen = false" x-show="modelOpen"
                                        x-transition:enter="transition ease-out duration-300 transform"
                                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                        x-transition:leave="transition ease-in duration-200 transform"
                                        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                        class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40 myclass1"
                                        aria-hidden="true">
                                    </div>

                                    <div x-cloak x-show="modelOpen"
                                        x-transition:enter="transition ease-out duration-300 transform"
                                        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                        x-transition:leave="transition ease-in duration-200 transform"
                                        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                        class="inline-block w-full max-w-xl overflow-hidden transition-all transform bg-[#CDB8EB] rounded-lg shadow-xl 2xl:max-w-2xl z-60 md:mt-60">

                                        <div class="items-center pt-3 space-x-4 bloc">
                                            <div class="flex flex-col justify-center">
                                                <h1 class="py-4 text-3xl font-bold">{{ __('messages.Pollutants') }}</h1>
                                                <div x-data="{ total_value: 50 }" class="max-w-screen-md pb-4 mx-auto">
                                                    <input name="polluants" id="polluants" class="hidden" type="input"
                                                        x-model="total_value" />

                                                    <input id="range2"
                                                        class="block h-3 bg-white rounded-lg appearance-none cursor-pointer w-80 range-lg "
                                                        type="range" x-model="total_value" min="0"
                                                        max="100" step="5">
                                                    <div class="flex justify-between w-full px-2 text-xs py-2">
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
                                                    <div class="flex justify-between">
                                                        <label for="default-range"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('messages.poor') }}</label>
                                                        <label for="default-range"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('messages.great!') }}</label>
                                                    </div>

                                                </div>
                                                <div>
                                                    <input type="text" name="polluants_text" id="polluants_text"
                                                        class="w-80 h-10 rounded-lg focus:outline-none focus:ring-1 focus:ring-[#CDB8EB] focus:border-transparent"
                                                        placeholder="{{ __('messages.Tell us more!') }}">
                                                </div>
                                                <button type="button" id="restbtn" onclick="newAction('polluants')"
                                                    class="px-4 py-2 mt-4 text-2xl font-bold text-gray-800 bg-white hover:bg-gray-100 active:bg-gray-200 focus:outline-none">{{ __('messages.Save') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- walk roll --}}
                        <div x-data="{ modelOpen: false }">
                            <button type="button" id="play" @click="modelOpen =!modelOpen"
                                class="absolute rounded-full bg-[#CDB8EB] w-28 h-28 text-white font-bold"
                                style="top: 75%; right: 5%; transform: translate(50%, -50%)">{{ __('messages.night lighting') }}</button>

                            <div x-cloak x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto"
                                aria-labelledby="modal-title" role="dialog" aria-modal="true">
                                <div
                                    class="flex items-center justify-center min-h-screen px-4 text-center sm:block sm:p-0">
                                    <div x-cloak @click="modelOpen = false" x-show="modelOpen"
                                        x-transition:enter="transition ease-out duration-300 transform"
                                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                        x-transition:leave="transition ease-in duration-200 transform"
                                        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                        class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40 myclass2"
                                        aria-hidden="true">
                                    </div>

                                    <div x-cloak x-show="modelOpen"
                                        x-transition:enter="transition ease-out duration-300 transform"
                                        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                        x-transition:leave="transition ease-in duration-200 transform"
                                        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                        class="inline-block w-full max-w-xl overflow-hidden transition-all transform bg-[#CDB8EB] rounded-lg shadow-xl 2xl:max-w-2xl z-60 md:mt-60">

                                        <div class="items-center pt-3 space-x-4 bloc">
                                            <div class="flex flex-col justify-center">
                                                <h1 class="py-4 text-3xl font-bold">{{ __('messages.Night lighting') }}</h1>
                                                <div x-data="{ total_value: 50 }" class="max-w-screen-md pb-4 mx-auto">
                                                    <input name="night" id="night" class="hidden" type="input"
                                                        x-model="total_value" />

                                                    <input id="range2"
                                                        class="block h-3 bg-white rounded-lg appearance-none cursor-pointer w-80 range-lg "
                                                        type="range" x-model="total_value" min="0"
                                                        max="100" step="5">
                                                  <div class="flex justify-between w-full px-2 text-xs py-2">
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
                                                    <div class="flex justify-between">
                                                        <label for="default-range"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('messages.poor') }}</label>
                                                        <label for="default-range"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('messages.great!') }}</label>
                                                    </div>

                                                </div>
                                                <div>
                                                    <input type="text" name="night_text" id="night_text"
                                                        class="w-80 h-10 rounded-lg focus:outline-none focus:ring-1 focus:ring-[#CDB8EB] focus:border-transparent"
                                                        placeholder="{{ __('messages.Tell us more!') }}">
                                                </div>
                                                <button type="button" id="movementbtn" onclick="newAction('night')"
                                                    class="px-4 py-2 mt-4 text-2xl font-bold text-gray-800 bg-white hover:bg-gray-100 active:bg-gray-200 focus:outline-none">{{ __('messages.Save') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- visibility --}}
                        <div x-data="{ modelOpen: false }">
                            <button type="button" id="play" @click="modelOpen =!modelOpen"
                                class="absolute rounded-full bg-[#CDB8EB] w-28 h-28 text-white font-bold"
                                style="bottom: 0; left: 50%; transform: translate(-50%, 50%)">{{ __('messages.other hazards') }}</button>

                            <div x-cloak x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto"
                                aria-labelledby="modal-title" role="dialog" aria-modal="true">
                                <div
                                    class="flex items-center justify-center min-h-screen px-4 text-center sm:block sm:p-0">
                                    <div x-cloak @click="modelOpen = false" x-show="modelOpen"
                                        x-transition:enter="transition ease-out duration-300 transform"
                                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                        x-transition:leave="transition ease-in duration-200 transform"
                                        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                        class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40 myclass3"
                                        aria-hidden="true">
                                    </div>

                                    <div x-cloak x-show="modelOpen"
                                        x-transition:enter="transition ease-out duration-300 transform"
                                        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                        x-transition:leave="transition ease-in duration-200 transform"
                                        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                        class="inline-block w-full max-w-xl overflow-hidden transition-all transform bg-[#CDB8EB] rounded-lg shadow-xl 2xl:max-w-2xl z-60 md:mt-60">

                                        <div class="items-center pt-3 space-x-4 bloc">
                                            <div class="flex flex-col justify-center">
                                                <h1 class="py-4 mx-2 text-3xl font-bold">{{ __('messages.Let others know about other hazards!') }}</h1>
                                                <div>
                                                    <input type="text" name="hazards_text" id="hazards_text"
                                                        class="w-80 h-10 rounded-lg focus:outline-none focus:ring-1 focus:ring-[#CDB8EB] focus:border-transparent"
                                                        placeholder="{{ __('messages.Tell us more!') }}">
                                                </div>
                                                <button type="button" id="orientationbtn"
                                                    onclick="newAction('hazards')"
                                                    class="px-4 py-2 mt-4 text-2xl font-bold text-gray-800 bg-white hover:bg-gray-100 active:bg-gray-200 focus:outline-none">{{ __('messages.Save') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- rain --}}
                        <div x-data="{ modelOpen: false }">
                            <button type="button" id="play" @click="modelOpen =!modelOpen"
                                class="absolute rounded-full bg-[#CDB8EB] w-28 h-28 text-white font-bold"
                                style="top: 75%; left: 5%; transform: translate(-50%, -50%)">{{ __('messages.dangerous objects') }}</button>

                            <div x-cloak x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto"
                                aria-labelledby="modal-title" role="dialog" aria-modal="true">
                                <div
                                    class="flex items-center justify-center min-h-screen px-4 text-center sm:block sm:p-0">
                                    <div x-cloak @click="modelOpen = false" x-show="modelOpen"
                                        x-transition:enter="transition ease-out duration-300 transform"
                                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                        x-transition:leave="transition ease-in duration-200 transform"
                                        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                        class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40 myclass4"
                                        aria-hidden="true">
                                    </div>

                                    <div x-cloak x-show="modelOpen"
                                        x-transition:enter="transition ease-out duration-300 transform"
                                        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                        x-transition:leave="transition ease-in duration-200 transform"
                                        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                        class="inline-block w-full max-w-xl overflow-hidden transition-all transform bg-[#CDB8EB] rounded-lg shadow-xl 2xl:max-w-2xl z-60 md:mt-60">

                                        <div class="items-center pt-3 space-x-4 bloc">
                                            <div class="flex flex-col justify-center">
                                                <h1 class="py-4 text-3xl font-bold">{{ __('messages.Dangerous objects') }}</h1>
                                                <div x-data="{ total_value: 50 }" class="max-w-screen-md pb-4 mx-auto">
                                                    <input name="dangerous" id="dangerous" class="hidden" type="input"
                                                        x-model="total_value" />

                                                    <input id="range2"
                                                        class="block h-3 bg-white rounded-lg appearance-none cursor-pointer w-80 range-lg "
                                                        type="range" x-model="total_value" min="0"
                                                        max="100" step="5">
                                                     <div class="flex justify-between w-full px-2 text-xs py-2">
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
                                                    <div class="flex justify-between">
                                                        <label for="default-range"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('messages.none') }}</label>
                                                        <label for="default-range"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('messages.many') }}</label>
                                                    </div>

                                                </div>
                                                <div>
                                                    <input type="text" name="dangerous_text" id="dangerous_text"
                                                        class="w-80 h-10 rounded-lg focus:outline-none focus:ring-1 focus:ring-[#CDB8EB] focus:border-transparent"
                                                        placeholder="Describe!">
                                                </div>
                                                <button type="button" id="weatherbtn" onclick="newAction('dangerous')"
                                                    class="px-4 py-2 mt-4 text-2xl font-bold text-gray-800 bg-white hover:bg-gray-100 active:bg-gray-200 focus:outline-none">{{ __('messages.Save') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- facilities --}}
                        <div x-data="{ modelOpen: false }">
                            <button type="button" id="play" @click="modelOpen =!modelOpen"
                                class="absolute rounded-full bg-[#CDB8EB] w-28 h-28 text-white font-bold"
                                style="top: 25%; left: 5%; transform: translate(-50%, -50%)">{{ __('messages.safety from harm') }}</button>

                            <div x-cloak x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto"
                                aria-labelledby="modal-title" role="dialog" aria-modal="true">
                                <div
                                    class="flex items-center justify-center min-h-screen px-4 text-center sm:block sm:p-0">
                                    <div x-cloak @click="modelOpen = false" x-show="modelOpen"
                                        x-transition:enter="transition ease-out duration-300 transform"
                                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                        x-transition:leave="transition ease-in duration-200 transform"
                                        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                        class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40 myclass5"
                                        aria-hidden="true">
                                    </div>

                                    <div x-cloak x-show="modelOpen"
                                        x-transition:enter="transition ease-out duration-300 transform"
                                        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                        x-transition:leave="transition ease-in duration-200 transform"
                                        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                        class="inline-block w-full max-w-xl overflow-hidden transition-all transform bg-[#CDB8EB] rounded-lg shadow-xl 2xl:max-w-2xl z-60 md:mt-60">

                                        <div class="items-center pt-3 space-x-4 bloc">
                                            <div class="flex flex-col justify-center">
                                                <h1 class="py-4 text-3xl font-bold">{{ __('messages.Protection from harm') }}</h1>
                                                <div x-data="{ total_value: 50 }" class="max-w-screen-md pb-4 mx-auto">
                                                    <input name="protection_harm" id="protection_harm" class="hidden"
                                                        type="input" x-model="total_value" />

                                                    <input id="range2"
                                                        class="block h-3 bg-white rounded-lg appearance-none cursor-pointer w-80 range-lg "
                                                        type="range" x-model="total_value" min="0"
                                                        max="100" step="5">
                                                   <div class="flex justify-between w-full px-2 text-xs py-2">
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
                                                    <div class="flex justify-between">
                                                        <label for="default-range"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('messages.very unsafe') }}</label>
                                                        <label for="default-range"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('messages.very safe') }}</label>
                                                    </div>

                                                </div>
                                                <div>
                                                    <input type="text" name="protection_harm_text" id="protection_harm_text"
                                                        class="w-80 h-10 rounded-lg focus:outline-none focus:ring-1 focus:ring-[#CDB8EB] focus:border-transparent"
                                                        placeholder="Describe!">
                                                </div>
                                                <button type="button" id="facilitiesbtn"
                                                    onclick="newAction('protection_harm')"
                                                    class="px-4 py-2 mt-4 text-2xl font-bold text-gray-800 bg-white hover:bg-gray-100 active:bg-gray-200 focus:outline-none">{{ __('messages.Save') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
              

                    </div>
                    <button id="saveplace" type="submit"
                        class="px-4 text-2xl py-2 text-gray-800 bg-[#CDB8EB] hover:bg-purple-300 active:bg-purple-400 border focus:outline-none rounded-xl font-bold mt-20 mb-4">
                         {{ __('messages.Next challenge!') }} 
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script>
        placeid = document.getElementById('placeid').value;
        type = document.getElementById('type').value;

        function newAction(action) {
            console.log(action);
            url = "/protectedetail"
            var thisaction;
            switch (action) {
                case 'protection':
                    thisaction = "protection";
                    thisvalue = document.getElementById('protection').value;
                    thistext = document.getElementById('protection_text').value;
                    break;
                case 'polluants':
                    thisaction = "polluants";
                    thisvalue = document.getElementById('polluants').value;
                    thistext = document.getElementById('polluants_text').value;
                    break;
                case 'night':
                    thisaction = "night";
                    thisvalue = document.getElementById('night').value;
                    thistext = document.getElementById('night_text').value;
                    break;
                case 'hazards':
                    thisaction = "hazards";
                    thisvalue = "null";
                    thistext = document.getElementById('hazards_text').value;
                    break;
                case 'dangerous':
                    thisaction = "dangerous";
                    thisvalue = document.getElementById('dangerous').value;
                    thistext = document.getElementById('dangerous_text').value;
                    break;
                case 'protection_harm':
                    thisaction = "protection_harm";
                    thisvalue = document.getElementById('protection_harm').value;
                    thistext = document.getElementById('protection_harm_text').value;
                    break;
            }


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: url,
                data: {
                    placeid: placeid,
                    type: type,
                    value: thisvalue,
                    action: thisaction,
                    text: thistext
                },


                success: function(data) {
                var myElement = document.querySelector(".myclass");
                var myElement1 = document.querySelector(".myclass1");
                var myElement2 = document.querySelector(".myclass2");
                var myElement3 = document.querySelector(".myclass3");
                var myElement4 = document.querySelector(".myclass4");
                var myElement5 = document.querySelector(".myclass5");


  showMessage("New points");
                myElement.click();
                myElement1.click();
                myElement2.click();
                myElement3.click();
                myElement4.click();
                myElement5.click();
   
                }
            });
        }


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

        #range2::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            background: black;
        }

   
         #message {
             display: none;
         }
    </style>
@endsection

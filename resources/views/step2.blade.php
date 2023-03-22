@extends('layouts.app')

@section('main')
    <div data-barba="container">
        <div class="flex flex-col mx-auto">
            <div class="">
                <div id="map" class="h-[60vh] lg:h-[70vh] w-auto z-0"></div>
                <div x-data="{ modelOpen: true }">
                    <div x-cloak x-show="modelOpen" class="fixed bottom-0 overflow-y-auto w-screen"
                        aria-labelledby="modal-title" role="dialog" aria-modal="true">
                        <div class="flex justify-center text-center items-end">
                            <div x-cloak x-show="modelOpen" x-transition:enter="transition ease-out duration-300 transform"
                                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                x-transition:leave="transition ease-in duration-200 transform"
                                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                class="flex justify-center w-screen p-8 overflow-hidden text-left transition-all transform bg-[#CDB8EB] shadow-xl z-50">

                                <div class="items-center space-x-4 max-w-2xl">
                                    <h1 class="text-2xl font-bold text-center text-black">How do you feel in this space?
                                    </h1>
                                    <div class="flex flex-col pt-4 space-y-6">
                                        <div class="flex justify-between w-full">
                                            <button class="" @click="modelOpen = false"
                                                onclick="openModal('main-modal')">
                                                <img src="/img/happy.png" alt="happy" class="w-16 h-16 mb-2">
                                                <h1 class=" font-bold">happy</h1>
                                            </button>
                                            <button class="" @click="modelOpen = false">
                                                <img src="/img/sad.png" alt="sad" class="w-16 h-16 mb-2">
                                                <h1 class=" font-bold">sad</h1>
                                            </button>
                                            <button class="" @click="modelOpen = false">
                                                <img src="/img/stressed.png" alt="stressed" class="w-16 h-16 mb-2">
                                                <h1 class=" font-bold">stressed</h1>
                                            </button>

                                        </div>
                                        <div class="flex justify-between w-full">
                                            <button class="" @click="modelOpen = false">
                                                <img src="/img/angry.png" alt="angry" class="w-16 h-16 mb-2">
                                                <h1 class=" font-bold">angry</h1>
                                            </button>
                                            <button class="" @click="modelOpen = false">
                                                <img src="/img/worried.png" alt="worried" class="w-16 h-16 mb-2">
                                                <h1 class=" font-bold">worried</h1>
                                            </button>
                                            <button class="mr-2" @click="modelOpen = false">
                                                <h1 class="pt-4 font-bold">/choose<br>other</h1>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-modal">
                    <div class="modal-container">
                        <div class="modal-content">
                            <div class="fixed bottom-0 overflow-y-auto w-screen">
                                <div
                                    class="flex justify-center w-screen p-8 overflow-hidden text-left transition-all transform bg-[#CDB8EB] shadow-xl z-50">
                                    <div class="items-center space-x-4 max-w-2xl">
                                        <h1 class="text-3xl text-center text-black pb-8">Share what makes you feel that way!
                                        </h1>
                                        <div class="flex flex-col pt-4 space-y-6">
                                            <div class="flex justify-center w-full">
                                                <button class="" onclick="step3()">
                                                    <h1
                                                        class="text-3xl text-center font-bold bg-white rounded-xl py-8 px-4">
                                                        Describe and share a photo!</h1>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        markers = {};
        let marker = null;
        let mymap0 = L.map('map').setView([48.6890, 7.14086], 15);
        osmLayer0 = L.tileLayer(
            'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                apikey: 'choisirgeoportail',
                format: 'image/jpeg',
                style: 'normal'
            }).addTo(mymap0);
        mymap0.addLayer(osmLayer0);
        mymap0.touchZoom.enable();
        mymap0.scrollWheelZoom.enable();
        icon = L.icon({
            iconUrl: '/img/marker.png',
            iconSize: [40, 40],
            iconAnchor: [40, 40],
            popupAnchor: [0, -40]
        });

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                    mymap0.setView([position.coords.latitude, position.coords.longitude], 19);
                    L.marker([position.coords.latitude, position.coords.longitude], {
                        icon: icon
                    }).addTo(mymap0);
                },
                function(e) {}, {
                    enableHighAccuracy: true
                });
        }


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        function mapAction(id, type, action) {
            console.log(id);
            var url;
            switch (action) {
                case 'like':
                    url = "/place/like";
                    break;
                case 'dislike':
                    url = "/place/dislike";
                    break;
                case 'stars':
                    url = "/place/stars";
                    break;
                case 'bof':
                    url = "/place/bof";
                    break;
                case 'weird':
                    url = "/place/weird";
                    break;
                case 'ohh':
                    url = "/place/ohh";
                    break;
                case 'wtf':
                    url = "/place/wtf";
                    break;
            }

            $.ajax({
                type: 'POST',
                url: url,
                data: {
                    id: id,
                    type: type
                },
                success: function(data) {
                    if (data == 'already') {
                        document.getElementById('already').click();
                        //close popup after 3 seconds
                        setTimeout(function() {
                            document.getElementById('already').click();
                        }, 1000);
                    } else {
                        document.getElementById('point').click();
                        //close popup after 3 seconds
                        setTimeout(function() {
                            document.getElementById('point').click();
                        }, 1000);
                    }
                }
            });

        }

  $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });

        function step3() {
            //get url
            const url = new URL(window.location.href);
            // get the query parameters as an instance of URLSearchParams
            const searchParams = url.searchParams;

            // get the values of the "id" and "type" parameters
            const id = searchParams.get("id");
            const type = searchParams.get("type");
            console.log(id);
            console.log(type);
             $.ajax({
                     type: 'POST',
                     url: "/feeling",
                     data: {
                         id: id,
                         type: type,

                     },
                     success: function(data) {
                        alert(data);
                       open("/step3?id=" + data, "_self");
                     }
                 });

        }

        all_modals = ['main-modal']
        all_modals.forEach((modal) => {
            const modalSelected = document.querySelector('.' + modal);
            modalSelected.classList.remove('fadeIn');
            modalSelected.classList.add('fadeOut');
            modalSelected.style.display = 'none';
        })
        const modalClose = (modal) => {
            const modalToClose = document.querySelector('.' + modal);
            modalToClose.classList.remove('fadeIn');
            modalToClose.classList.add('fadeOut');
            setTimeout(() => {
                modalToClose.style.display = 'none';
            }, 500);
        }

        const openModal = (modal) => {
            const modalToOpen = document.querySelector('.' + modal);
            modalToOpen.classList.remove('fadeOut');
            modalToOpen.classList.add('fadeIn');
            modalToOpen.style.display = 'flex';
        }
    </script>
    <style>

    </style>
@endsection
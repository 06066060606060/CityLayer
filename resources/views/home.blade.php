@extends('layouts.app')

@section('main')
    <div data-barba="container">
        @include('parts.navbar')
        <div class="flex flex-col h-screen mx-auto">
            <div class="p-3 pt-16 lg:mx-16 md:pt-20">
                <div id="map" class="mt-4 rounded h-[75vh] lg:h-[70vh] w-auto z-10"></div>
                @if ($infos->score > 6)
                    <div x-data="{ modelOpen: false }">
                        <button @click="modelOpen =!modelOpen"
                            class="w-full px-4 py-6 text-2xl font-bold text-black bg-[#B8E7EB] hover:bg-blue-500">
                            Start Playing!
                        </button>

                        <div x-cloak x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto"
                            aria-labelledby="modal-title" role="dialog" aria-modal="true">
                            <div
                                class="flex justify-center min-h-screen px-4 text-center items-center sm:block sm:p-0">
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
                                    class="inline-block w-full max-w-xl p-8 my-20 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl z-50">

                                    <div class="items-center space-x-4 bloc">

                                        <div class="flex pt-6 justify-evenly">
                                            <button @click="modelOpen = false"
                                                class="px-6 my-4 py-6 text-gray-100 bg-blue-700 hover:bg-blue-800 rounded-lg focus:outline-none hover:text-gray-200">
                                                Current location mapping
                                            </button>
                                            <form class="mx-3" action="/deleteuser/{{ backpack_auth()->user()->id }}"
                                                method="post">
                                                @csrf
                                                <button type="submit"
                                                    class="px-6 my-4 py-6 text-gray-100 bg-blue-700 hover:bg-blue-800 rounded-lg focus:outline-none hover:text-gray-200">
                                                Select a location
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="w-full px-4 py-3 text-2xl font-bold text-center text-black bg-[#B8E7EB]">Tap on posts
                        and<br>
                        react to earn points!</div>
                @endif
            </div>
        </div>

    </div>

    <script>
        data = {!! json_encode($all_data) !!};
        markers = {};
        let marker = null;
        let mymap0 = L.map('map').setView([48.6890, 7.14086], 5);
        osmLayer0 = L.tileLayer(
            'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                apikey: 'choisirgeoportail',
                format: 'image/jpeg',
                style: 'normal'
            }).addTo(mymap0);
        mymap0.addLayer(osmLayer0);
        mymap0.touchZoom.enable();
        mymap0.scrollWheelZoom.disable();
        icon = L.icon({
            iconUrl: '/img/marker.png',
            iconSize: [40, 40],
            iconAnchor: [40, 40],
            popupAnchor: [0, -40]
        });
        icon2 = L.icon({
            iconUrl: '/img/search-icon.png',
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
            });

        } else {
            L.map('map').setView([48.6890, 11.14086], 5);
        }

        let count = 0;
        for (let i = 0; i < data.length; i++) {
            count = count + 1;
            place = data[i];
            placeid = place.id;
            placetype = place.type;
            placename = place.name;
            placelatitude = place.latitude;
            placelongitude = place.longitude;
            markerx = L.marker([placelatitude, placelongitude], {
                icon: icon2
            }).addTo(mymap0).bindPopup(
                '<div class="flex flex-col justify-center text-xl font-bold text-center text-black rounded-xl"><p class="">React to this place to earn points!</p><div class="flex flex-row justify-center pb-4"><img src="/img/1.png" class="w-8 h-8 mx-1 active:scale-110" onclick="mapAction(\'' +
                placeid + '\', \'' + placetype +
                '\', \'like\')"><img src="/img/2.png" class="w-8 h-8 mx-1 active:scale-110" onclick="mapAction(\'' +
                placeid + '\', \'' + placetype +
                '\', \'dislike\')"><img src="/img/3.png" class="w-8 h-8 mx-1 active:scale-110" onclick="mapAction(\'' +
                placeid + '\', \'' + placetype +
                '\', \'stars\')"><img src="/img/4.png" class="w-8 h-8 mx-1 active:scale-110" onclick="mapAction(\'' +
                placeid + '\', \'' + placetype +
                '\', \'bof\')"><img src="/img/5.png" class="w-8 h-8 mx-1 active:scale-110" onclick="mapAction(\'' +
                placeid + '\', \'' + placetype +
                '\', \'weird\')"><img src="/img/6.png" class="w-8 h-8 mx-1 active:scale-110" onclick="mapAction(\'' +
                placeid + '\', \'' + placetype +
                '\', \'ohh\')"><img src="/img/7.png" class="w-8 h-8 mx-1 active:scale-110" onclick="mapAction(\'' +
                placeid + '\', \'' + placetype + '\', \'wtf\')"></div></div>'
            );
            markers[place.id] = markerx;
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
                    alert("thanks for your feedback! you earned 1 points!");
                }
            });
            mymap0.closePopup();
        }
    </script>
@endsection

@extends('layouts.app')

@section('main')
    <div data-barba="container" class="p-6 lg:p-12">
        <a href="/profile">
            <img src="{{ asset('img/icons/arrow.png') }}" class="arrow">
        </a>

        <div class="flex flex-col h-screen mx-auto">
{{--            <div class="flex flex-col items-center pt-24 gap-x-6 lg:pt-32">--}}
{{--                <form action="avatar" method="POST" enctype="multipart/form-data">--}}
{{--                    @csrf--}}
{{--                    <input type="file" name="image" id="image" class="hidden" accept="image/*"--}}
{{--                           onchange="javascript:this.form.submit();">--}}
{{--                    <label for="image" class="cursor-pointer ">--}}
{{--                        <img class="object-cover w-24 h-24 border-7 border-blue-500 rounded-full  " style="border-width: 7px"--}}
{{--                             src="/storage/uploads/avatar/{{ backpack_auth()->user()->avatar }}" alt="">--}}
{{--                    </label>--}}
{{--                    <div class="bg-black rounded-full text-white  text-center text-lg relative mt-[-22%] text-2xl" style="width: 31px;font-size: 2rem">+</div>--}}
{{--                </form>--}}

{{--            </div>--}}
            <h1 class="pt-4 bold text-center text-gray-800 f15">{{ $name }}</h1>
            <br/>
            <h2 class="pt-2 pb-2 text-[#1876d2] font-bold text-center font-normal text-lg">
                @if (backpack_auth()->user()->score < 100)
                Level 1
            @elseif(backpack_auth()->user()->score < 200)
                Level 2
            @elseif(backpack_auth()->user()->score < 300)
                Level 3
            @elseif(backpack_auth()->user()->score < 400)
                Level 4
            @elseif(backpack_auth()->user()->score < 500)
                Level 5
            @elseif(backpack_auth()->user()->score < 600)
                Level 6
            @elseif(backpack_auth()->user()->score < 700)
                Level 7
            @elseif(backpack_auth()->user()->score < 800)
                Level 8
            @elseif(backpack_auth()->user()->score < 900)
                Level 9
            @elseif(backpack_auth()->user()->score < 1000)
                Level 10
            @endif
             !
            </h2>

            <div class="w-3/5 lg:w-3/6 mx-auto relative left-[17.5px]">
                <div class="absolute border-[#1876d2] text-[#1876d2] text-lg rounded-full text-center slider-circle">{{ backpack_auth()->user()->score }}</div>
                <div class="relative pt-1">

                    <div class="flex h-3 overflow-hidden text-xs bg-white border-2 border-[#1876d2]">
                        @php $score = backpack_auth()->user()->score / 10; @endphp
                        <div style="width:{{$score}}%"
                             class="flex flex-col bg-[#1876d2] justify-center text-center text-white  shadow-none whitespace-nowrap">
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-center pt-8">
                <div class="flex flex-col">
                    <div class="grid grid-cols-3 gap-4">
                        <button id="btn1">
                            @if ($explorer == 1)
                                <div class="flax ">
                                    <img src="{{ asset('images/color/CL_B-explorer.svg') }}"  alt="Your Image">
                                    <div class="font-style text-sm">explorer</div>
                                </div>
                            @else
                                <div class="flax grayscale">
                                    <img src="{{ asset('images/color/CL_B-explorer.svg') }}"  alt="Your Image">
                                    <div class="font-style text-sm">explorer</div>
                                </div>
                            @endif
                        </button>
                        <button id="btn2">
                            @if ($citymaker == 1)
                                <div class="flax">
                                    <img src="{{ asset('images/color/CL_B-citymaker.svg') }}"  alt="Your Image">
                                    <div class="font-style text-sm">city maker</div>
                                </div>
                            @else
                                <div class="flax grayscale">
                                    <img src="{{ asset('images/color/CL_B-citymaker.svg') }}"  alt="Your Image">
                                    <div class="font-style text-sm">city maker</div>
                                </div>
                            @endif
                        </button>

                        <button id="btn3">
                            @if ($architect == 1)
                                <div class="flax">
                                    <img src="{{ asset('images/color/CL_B-architect.svg') }}"  alt="Your Image">
                                    <div class="font-style text-sm">architect</div>
                                </div>
                            @else
                                <div class="flax grayscale">
                                    <img src="{{ asset('images/color/CL_B-architect.svg') }}"  alt="Your Image">
                                    <div class="font-style text-sm">architect</div>
                                </div>
                            @endif
                        </button>

                        <button id="btn3">
                            @if ($architect == 1)
                                <div class="flax">
                                    <img src="{{ asset('images/color/CL_B-architect.svg') }}"  alt="Your Image">
                                    <div class="font-style text-sm">architect</div>
                                </div>
                            @else
                                <div class="flax grayscale">
                                    <img src="{{ asset('images/color/CL_B-architect.svg') }}"  alt="Your Image">
                                    <div class="font-style text-sm">architect</div>
                                </div>
                            @endif
                        </button>

                        <button id="btn3">
                            @if ($architect == 1)
                                <div class="flax">
                                    <img src="{{ asset('images/color/CL_B-architect.svg') }}"  alt="Your Image">
                                    <div class="font-style text-sm">architect</div>
                                </div>
                            @else
                                <div class="flax grayscale">
                                    <img src="{{ asset('images/color/CL_B-architect.svg') }}"  alt="Your Image">
                                    <div class="font-style text-sm">architect</div>
                                </div>
                            @endif
                        </button>

                    

                    </div>


                </div>
            </div>

            


            
        </div>
    </div>

    <script>
        // Get references to all the buttons
        var button1 = document.getElementById("btn1");
        var button2 = document.getElementById("btn2");
        var button3 = document.getElementById("btn3");
        var button4 = document.getElementById("btn4");
        var button5 = document.getElementById("btn5");
        var button6 = document.getElementById("btn6");
        var button7 = document.getElementById("btn7");
        var button8 = document.getElementById("btn8");
        var button9 = document.getElementById("btn9");
        var button10 = document.getElementById("btn10");
        var popup = document.querySelector(".popup");

        // Add event listeners to each button
        button1.addEventListener("click", function() {
            var popupContent = "<img class='mx-auto' src='/img/icons/explorer.png'><br><p>Explorer - Map a space that was not mapped before!</p>";
            popup.querySelector(".popup-content").innerHTML = popupContent;
            popup.style.display = "block";
        });

        button2.addEventListener("click", function() {
            var popupContent = "<img class='mx-auto' src='/img/icons/citymaker.png'><br><p>City-maker – Map at least 10 spaces!</p>";
            popup.querySelector(".popup-content").innerHTML = popupContent;
            popup.style.display = "block";
        });

        button3.addEventListener("click", function() {
            var popupContent = "<img class='mx-auto' src='/img/icons/architect.png'><br><p>Architect - Map at least 10 buildings!</p>";
            popup.querySelector(".popup-content").innerHTML = popupContent;
            popup.style.display = "block";
        });

        button4.addEventListener("click", function() {
            var popupContent = "<img class='mx-auto' src='/img/icons/flaneur.png'><br><p>Flaneur - Map at least 10 streets!</p>";
            popup.querySelector(".popup-content").innerHTML = popupContent;
            popup.style.display = "block";
        });

        button5.addEventListener("click", function() {
            var popupContent = "<img class='mx-auto' src='/img/icons/urbanist.png'><br><p>Urbanist - Map at least 10 open spaces!</p>";
            popup.querySelector(".popup-content").innerHTML = popupContent;
            popup.style.display = "block";
        });

        button6.addEventListener("click", function() {
            var popupContent = "<img class='mx-auto' src='/img/icons/influencer.png'><br><p>Influencer – Receive 10+ comments by other users on one contribution!</p>";
            popup.querySelector(".popup-content").innerHTML = popupContent;
            popup.style.display = "block";
        });

        button7.addEventListener("click", function() {
            var popupContent = "<img class='mx-auto' src='/img/icons/star.png'><br><p>Star - Receive 20+ reactions by other users on one contribution!</p>";
            popup.querySelector(".popup-content").innerHTML = popupContent;
            popup.style.display = "block";
        });

        button8.addEventListener("click", function() {
            var popupContent = "<img class='mx-auto' src='/img/icons/guru.png'><br><p>Guru - Comment on 10 other people's posts!</p>";
            popup.querySelector(".popup-content").innerHTML = popupContent;
            popup.style.display = "block";
        });

        button9.addEventListener("click", function() {
            var popupContent = "<img class='mx-auto' src='/img/icons/investigator.png'><br><p>Investigator - Post more that 10 pictures!</p>";
            popup.querySelector(".popup-content").innerHTML = popupContent;
            popup.style.display = "block";
        });

        button10.addEventListener("click", function() {
            var popupContent = "<img class='mx-auto' src='/img/icons/supermapper.png'><br><p>Supermapper - Collect 500 points!</p>";
            popup.querySelector(".popup-content").innerHTML = popupContent;
            popup.style.display = "block";
        });

        popup.addEventListener("click", function(e) {
            // Check if the user clicked outside of the popup content
            if (e.target === popup) {
                // Hide the popup if the user clicked outside of it
                popup.style.display = "none";
            }
        });


        // Repeat the same pattern for the other buttons
    </script>
    <style>
        .popup {
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 100;
        }

        .popup-content {
            transform: translate(-50%, -50%);
        }
    </style>
@endsection

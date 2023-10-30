@extends('layouts.app')

@section('main')
    <div data-barba="container" class="">

        <div class="flex flex-col items-center justify-center mt-8">

            <section class="flex flex-col items-center justify-center text-gray-900">

                <img src="{{asset('images/logo.svg')}}" alt="" class="w-[100px] h-[100px] bg-no-repeat bg-cover">


                <div class="flex flex-col items-center justify-center mt-2 text-2xl italic font-extrabold">

                    <span>Introducing</span>
                    <span class="uppercase">City Layers!</span>


                </div>

            </section>

            <section class="">
                <div class="px-8 mt-8">
                    <div class="max-h-full lg:w-[1400px] md:w-[900px] px-12  w-[400px]">
                        <div class="w-full mysilder flex justify-center items-center gap-2">

                            <div class="">
                                <img class="object-cover saturate-120 md:w-[600px]   h-[330px] rounded"
                                    src="https://th.bing.com/th/id/R.869c978552ff253563b883e6f808f066?rik=%2b%2biVFdvlc%2fkfYA&riu=http%3a%2f%2fwww.hdwallpaper.nu%2fwp-content%2fuploads%2f2015%2f07%2f869c978552ff253563b883e6f808f066.jpg&ehk=rx%2f8Q%2fTPfE4eCNXaCEJ6y545Lj0ny4UsXQJOqgvvEv8%3d&risl=&pid=ImgRaw&r=0"
                                    alt="">
                            </div>

                            <div class="">
                                <img class="object-cover saturate-120 md:w-[600px]  h-[330px] rounded"
                                    src="https://th.bing.com/th/id/OIP.lXZVTGEcspIyDeXYxUiojQHaE7?pid=ImgDet&rs=1"
                                    alt="">
                            </div>


                        </div>

                        <div class="swiper-pagination"></div>
                    </div>



                </div>
            </section>




            <section class="" x-data="{ tab: 'username' }" x-cloak>


                <form role="form" method="POST" action="{{ route('auth.register') }}">
                    {!! csrf_field() !!}

                    <div class="flex flex-col items-center justify-center gap-4 mt-8">
                        <div>
                            <input type="text" placeholder="Email" name="email" value="{{ old('email') }}" id="email" class="form-input"required />
                            @if ($errors->has('email'))
                                <div class="text-red-500">{{ $errors->first('email') }}</div>
                            @endif
                        </div>

                        <div>
                            <input type="password" placeholder="Password" name="password" id="password" class="form-input" required />
                            @if ($errors->has('password'))
                                <div class="text-red-500">{{ $errors->first('password') }}</div>
                            @endif
                        </div>

                        <div>
                            <input type="password" placeholder="Confirm Password" name="password_confirmation" id="password_confirmation" class="form-input" required />
                            @if ($errors->has('password_confirmation'))
                                <div class="text-red-500">{{ $errors->first('password_confirmation') }}</div>
                            @endif

                        </div>

                        

                        <button type="submit" class="mb-3 cursor-pointer btn btn-primary">
                            <div class="text-center"> Signup</div>

                        </button>
                    </div>


                </form>



            </section>


            {{-- s --}}

        </div>


    </div>
@endsection
@push('scripts')
    <script>
        $('.mysilder').slick({
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            slidesToScroll: 1,

        });
    </script>
@endpush

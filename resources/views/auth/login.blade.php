@extends('layouts.auth')
@section('title')
    Iniciar
@endsection
<style>
    .background-login{
        background-image: url('https://images.pexels.com/photos/1238980/pexels-photo-1238980.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');
        background-repeat: repeat-x;
        background-origin: content-box;
    }
</style>
@section('content')
    <!-- Section: Design Block -->
    <section class="background-login vh-100">
        <div class="container px-4 py-5 px-md-5 text-center text-lg-start">
            <div class="row gx-lg-5 align-items-center mb-5">
                <div class="col-lg-6 d-none d-xl-block ">
                    <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                        The best offer <br />
                        <span style="color: hsl(218, 81%, 75%)">for your business</span>
                    </h1>
                    <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                        Temporibus, expedita iusto veniam atque, magni tempora mollitia
                        dolorum consequatur nulla, neque debitis eos reprehenderit quasi
                        ab ipsum nisi dolorem modi. Quos?
                    </p>
                </div>

                <div class="col-lg-6 mt-2 position-relative"  style="z-index: 10">
                    <login-component />
                </div>
            </div>
        </div>
    </section>
    <!-- Section: Design Block -->
@endsection

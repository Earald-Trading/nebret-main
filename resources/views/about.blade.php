@extends('layouts.app')

@section('content')
    <div class="container container-fluid">
        {{-- <div class="row justify-content-center mt-5">
            <h2 class="text-center">The Masters</h2>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="row justify-content-center my-4">
                    <img src="https://cdn.pixabay.com/photo/2014/03/24/17/19/teacher-295387_960_720.png" alt="Avatar" class="avatar">
                </div>
                <div class="text-center mt-5 mb-1 h3">Natnael Haile</div>
                <div class="lead text-center">Position</div>
            </div>
            <div class="col-6">
                <div class="row justify-content-center my-4">
                    <img src="https://cdn.pixabay.com/photo/2014/03/24/17/19/teacher-295387_960_720.png" alt="Avatar" class="avatar">
                </div>
                <div class="text-center mt-5 mb-1 h3">Yonatan Amha</div>
                <div class="lead text-center">Position</div>
            </div>
        </div> --}}

        <div class="row">
            <div class="col-6">
                <img class="img-fluid" src="../../public/storage/mela_penthouse_1.jpg">
            </div>
            <div class="col-6 align-self-center">
                <h2>Who Are We?</h2>
                <p class="lead font-italic">Nebret Property Management is a Asset management company founded by young ambitious entrepreneurs, Yonatan Amha and Natnael Girma.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <h2>What Do We Do?</h2>
                <p class="lead font-italic">They created the company because they wanted to creat a solution for seller, new homeowners and other buyers that are frustrated with the system in place.</p>
            </div>
            <div class="col-6 align-self-center">
                <img class="img-fluid" src="../../public/storage/mela_penthouse_2.jpg">
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <img class="img-fluid" src="../../public/storage/mela_penthouse_3.jpg">
            </div>
            <div class="col-6 align-self-center">
                <h2>Reliable</h2>
                <p class="lead font-italic">Nebret PM is here to solve the struggle  of buying new properties and create a simple and enjoyable  experience to our clients.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-6 align-self-center">
                <h2>Excellence</h2>
                <p class="lead font-italic">Our company is experienced to help customers  buy, sell, rent and manage assets such as commercial buildings, apartments and villas.</p>
            </div>
            <div class="col-6">
                <img class="img-fluid" src="../../public/storage/mela_penthouse_3.jpg">
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <img class="img-fluid" src="../../public/storage/mela_penthouse_3.jpg">
            </div>
            <div class="col-6 align-self-center">
                <h2>Professional</h2>
                <p class="lead font-italic">Nebret PM connects you to the right clients at the right time with the right price.</p>
                <p class="lead font-italic">We work with buyers and sellers across the world who are interested to get involved in Ethiopia’s real estate market and those who want to land their next home.</p>
            </div>
        </div>
        <div class="row justify-content-center mt-5 mb-3 pb-3">
            <div class="card" style="width: 80% !important; margin: auto !important;">
                <div class="card-header">
                    <p class="h3 text-center">Are you an agent?</p>
                    <p class="text-center font-italic my-1">We would love to work with you if you are intrested.</p>
                    <p class="text-center text-small mt-1">Leave us your details below.</p>
                </div>
                <div class="card-body">
                    <form>
                        <div>
                            <label class="form-label" for="name"><span style="color: red !important;">*</span>Name:</label>
                            <input class="form-control" type="text" name="name" id="name" placeholder="Your full name" required>
                        </div>
                        <div>
                            <label class="form-label mb-n1 pb-n1 mt-3" for="email"><span style="color: red !important;">*</span>Email:</label>
                            <small class="text-small row mt-0 mb-2 ml-1">(please put a valid email address, or the system will not accept your request)</small>
                            <input class="form-control" type="email" name="email" id="email" placeholder="your email address" required>
                        </div>
                        <div>
                            <label class="form-label mb-n1 pb-n1 mt-3" for="phone_number">Phone Number:</label>
                            <small class="text-small row mt-0 mb-2 ml-1">(optional)</small>
                            <input class="form-control" type="tel" name="phone_number" id="phone_number" placeholder="09-your-number">
                        </div>
                        <div>
                            <label class="form-label mt-3" for="desc"><span style="color: red !important;">*</span>Description:</label>
                            <textarea class="form-control" type="text" name="desc" id="desc" placeholder="A brief description about yourself ..." required></textarea>
                        </div>
                        <div class="row justify-content-end mr-1 mt-3 mb-3">
                            <button class="btn btn-outline-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

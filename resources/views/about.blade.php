@extends('layouts.app')

@section('content')
    <div class="container container-fluid">
        <div class="row justify-content-center mt-5">
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
        </div>

        <div class="row">
            <div class="col-6">
                <img class="img-fluid" src="../../public/storage/mela_penthouse_1.jpg">
            </div>
            <div class="col-6 align-self-center">
                <h2>We Know</h2>
                <p class="lead font-italic">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sed felis odio. Sed nisl velit, euismod in velit ut, fermentum elementum ipsum. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras mattis eget felis vitae ornare. Proin cursus ullamcorper dui. Mauris semper convallis enim, id blandit lorem fermentum quis. Nunc finibus facilisis risus id euismod. Donec et porta dolor.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <h2>Excellence</h2>
                <p class="lead font-italic">Nulla laoreet lacus egestas eros imperdiet, non pharetra neque tempus. Etiam laoreet consequat pulvinar. Mauris eu feugiat diam, sit amet mattis tortor. Aliquam lobortis sed dolor nec efficitur. Vestibulum lacinia feugiat tristique. Aliquam et eros sed arcu volutpat lacinia. Sed lacinia lacinia tincidunt. In sollicitudin neque ac mattis iaculis. Proin eu vestibulum turpis, eu gravida nulla. Sed ut venenatis lacus. Suspendisse placerat elit est, non placerat neque ultrices ac. Nunc varius, velit sed hendrerit cursus, lacus turpis imperdiet velit, ac pharetra lectus augue facilisis magna.</p>
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
                <h2>Professional</h2>
                <p class="lead font-italic">Sed et eleifend arcu. Donec eu sem ac erat dignissim dapibus hendrerit in augue. Integer sed quam bibendum nulla posuere ornare ac sed massa. Donec sem nulla, molestie sit amet dui et, imperdiet ultrices risus.</p>
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

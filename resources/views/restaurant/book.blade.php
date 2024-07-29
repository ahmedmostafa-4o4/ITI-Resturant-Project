@extends('restaurant.main')
@section('title','| Book Table')
@section('content')
<!-- book section -->
<section class="book_section layout_padding">
    <div class="container">
        <div class="heading_container">
            <h2>
                Book A Table
            </h2>
        </div>
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
        <div class="row">
            <div class="col-md-6">
                <div class="form_container">
                    <form action="{{route('storeTable')}}" method="post">
                        @csrf
                        @method('post')
                        <div>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Your Name" name="name" />
                        </div>
                        @error('name')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                        <div>
                            <input type="text" class="form-control @error('phoneNumber') is-invalid @enderror" placeholder="Phone Number" name="phoneNumber" />
                        </div>
                        @error('phoneNumber')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                        <div>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Your Email" name="email" />
                        </div>
                        @error('email')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                        <div>
                            <select class="form-control nice-select wide @error('persons') is-invalid @enderror" name="persons">
                                <option value="" disabled selected>
                                    How many persons?
                                </option>
                                <option value="1">
                                    1
                                </option>
                                <option value="2">
                                    2
                                </option>
                                <option value="3">
                                    3
                                </option>
                                <option value="4">
                                    4
                                </option>
                                <option value="5">
                                    5
                                </option>
                            </select>
                        </div>
                        @error('persons')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                        <div>
                            <input type="date" class="form-control @error('date') is-invalid @enderror" name="tableDate">
                        </div>
                        @error('date')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                        <div class="btn_box">
                            <button>
                                Book Now
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="map_container ">
                    <div id="googleMap"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end book section -->
@endsection
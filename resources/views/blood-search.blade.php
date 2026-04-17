@extends('layouts.app')
@section('title', 'Search')

@section('content')
    <div class="about search">
        <div class="wrap">
            <h4>Home > <span>Search a Blood Donor</span></h4>
        </div>
    </div>

    <div class="container-xxl pt-5 pb-2" id="about">
        <div class="container">
            <h5 class="section-title text-start text-primary text-uppercase">Search for blood donors</h5>
            <marquee class="mb-4 bg-primary" behavior="scroll">
                <h4 class="p-2 text-white">Find your nearest blood donor by filling the form below. Call: 01750965595.</h4>
            </marquee>
        </div>
    </div>

    <section class="contact-us pb-3">
        <div class="container">
            <div class="row">
                <form action="{{ route('blood.search') }}" method="GET">
                    <div class="mx-auto position-relative" style="max-width: 90%;">
                        <input type="text" class="form-control w-100 py-3 px-3" name="search" value="{{ $search ?? '' }}" placeholder="O+, John, Lakshmipur...">
                        <button class="btn btn-primary py-2 px-3 position-absolute top-0 end-0 mt-2 me-2" type="submit">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <div class="container py-3 text-center">
        <h1>Search Result For Related Blood Group</h1>
    </div>

    @if(isset($donars))
        <section class="search-box mt-4">
            <div class="container">
                <form action="{{ route('blood.search') }}" method="GET" class="mb-3">
                    <input type="hidden" name="search" value="{{ $search }}">
                    <div class="row">
                        <div class="col-md-4">
                            <select name="filter_address" class="form-select">
                                <option value="">Filter by Address</option>
                                @foreach($addressList as $address)
                                    <option value="{{ $address }}" {{ $filterAddress == $address ? 'selected' : '' }}>
                                        {{ $address }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-primary">Apply Filter</button>
                        </div>
                    </div>
                </form>

                @if($donars->count() > 0)
                    <div class="card">
                        <div class="card-body">
                            <table class="table text-center table-bordered" width="100%">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <th>Name</th>
                                        <th>Blood Group</th>
                                        <th>Mobile</th>
                                        <th>Address</th>
                                        <th>Last Donation</th>
                                        <th>Photo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($donars as $donar)
                                        <tr>
                                            <td>{{ $donar->firstName }} {{ $donar->lastName }}</td>
                                            <td>{{ $donar->blood_group }}</td>
                                            <td>{{ $donar->mobile }}</td>
                                            <td>{{ $donar->address }}</td>
                                            <td>{{ \Carbon\Carbon::parse($donar->last_donate_date)->format('d-M-Y') }}</td>
                                            <td>
                                                <img src="{{ asset('admin/upload/'.$donar->img) }}" alt="Photo" style="width:100px;">
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @else
                    <div class="alert alert-warning">No Donor Found. Try with a new keyword!</div>
                @endif
            </div>
        </section>
    @elseif(request()->has('search'))
        <div class="container text-center">
            <div class="alert alert-danger">Please fill the input field!!</div>
        </div>
    @endif
@endsection
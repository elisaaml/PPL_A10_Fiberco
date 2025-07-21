@extends('layouts.aps')

@section('content')
    <h3 style="color:black; font-weight:bold; font-size:60px; margin: 0;">About Us of Company Profile</h3>
    <br>
    <form action="{{ route('profilCompany.update', $profilCompany->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group-row d-flex mt-5">
            <div class="col-md-6 mb-3">
                <label for="banner1">Banner 1</label>
                <input type="file" name="banner1" class="form-control @error('banner1') is-invalid @enderror"
                    id="banner1">
                @error('banner1')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-dark mt-3">Upload</button>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <center>
                    <img src="{{ asset('img/' . $profilCompany->banner1) }}" width="300px">
                </center>
            </div>
        </div>

        <div class="form-group-row d-flex mt-5">
            <div class="col-md-6 mb-3">
                <label for="banner2">Banner 2</label>
                <input type="file" name="banner2" class="form-control @error('banner2') is-invalid @enderror"
                    id="banner2">
                @error('banner2')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-dark mt-3">Upload</button>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <center>
                    <img src="{{ asset('img/' . $profilCompany->banner2) }}" width="300px">
                </center>
            </div>
        </div>

        <hr>

                <div class="form-group">
            <label for="about1">About Section 1</label>
            <textarea type="text" class="form-control dark" name="about1" id="about1" required>{{ old('about1', $profilCompany->about1) }}</textarea>
            @error('about1')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="about2">About Section 2</label>
            <textarea type="text" class="form-control dark" name="about2" id="about2" required>{{ old('about2', $profilCompany->about2) }}</textarea>
            @error('about2')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-dark mb-5">Submit</button>
    </form>
@endsection

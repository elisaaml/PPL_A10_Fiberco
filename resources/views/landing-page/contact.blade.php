@extends('layouts.landing-page')

@section('content')
    <section id="product" class="padding-large overflow-hidden mt-5">
        <div class="container">
            <div class="section-header text-center">
                <h2 class="section-title under">Contact Us</h2>
            </div><br>
            <div class="mx-auto" style="max-width: 900px;">
                <div class="row">
                    <div class="col-md-6">
                        <div>
                            <h3 class="mb-3">Contact Now</h3>
                            <p><strong>Have any question or want to place an order?</strong></p>
                            <p>We're here to help. Feel free to reach out and we'll get back to you shortly.</p>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div style="background-color: #f2f2f2; padding: 20px; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                            <form action="{{ route('send.email') }}" method="POST">@csrf
                                <div class="form-group mt-3">
                                    <label for="email">Email</label>
                                    <textarea type="email" class="form-control" name="email" id="email" placeholder="Email" required></textarea>
                                    @error('email')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mt-3">
                                    <label for="subject">Subject</label>
                                    <textarea type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required></textarea>
                                    @error('subject')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mt-3">
                                    <label for="message">Message</label>
                                    <textarea type="text" class="form-control" name="message" id="message" placeholder="Message" required></textarea>
                                    @error('message')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <center><button type="submit" class="btn btnn mt-3">Submit</button></center>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if(session('success'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            // text: '{{ session("success") }}',
            text: 'Email has been sent successfully!',
            confirmButtonText: 'OK'
        });
    </script>
    @endif
@endsection

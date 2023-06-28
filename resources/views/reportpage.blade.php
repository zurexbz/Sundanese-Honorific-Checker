@extends('layout.main')

@section('container')
    <h1 class="text-center fw-semibold title-custom">Sundanese Honorific Checker</h1>

    <div style="height: 55%;" class="card card-custom mx-auto">
        <div  class="card-body">
            <div class="container">
                <div  class="form">
                    <form  action="/report" method="POST">
                        @csrf
                        <div class="input">
                            <input id="name" name="name" class="input1 @error('name')
                                is-invalid
                            @enderror" type="text" placeholder="Name" value="{{ old('name') }}">
                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input">
                            <input id="contact" name="contact" class="input1 @error('contact')
                                is-invalid
                            @enderror" type="text" placeholder="Email or Phone Number" value="{{ old('contact') }}">
                            @error('contact')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input">
                            <textarea id="text" name="text" class="input-textarea @error('text')
                                is-invalid
                            @enderror" placeholder="Describe Your Problem" value="{{ old('text') }}"></textarea>
                            @error('text')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- <div class="input">
                            <input type="submit" value="Submit">
                        </div> -->
                        <div>
                            <!-- <input class="file" type="file" id="#" name="#"> -->
                            {{-- <input id="file" type="file" class="custom-file-input"> --}}
                            <button class="submit" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        @if (Session::has('success'))
        toastr.success("{{ Session::get('success') }}");
        @endif
    </script>
@endsection
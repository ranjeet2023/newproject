@include('layout.header')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="w-75 mx-auto mt-5">
        <a href="{{ url('location') }}" class="float-right">
            <button type="button" class="btn btn-primary">View</button>
        </a>
        <form action="{{ url('store-location') }}"method="post">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlInput1">Name</label>
                <input type="name" name="name" class="form-control" placeholder=" enter your name">
                @error('name')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Discription</label>
                <textarea name="discription" id="" class="form-control"></textarea>
                @error('discription')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Country</label>
                <select name="country" id="country" class="form-control">
                    <option value="">Select Country</option>
                    @foreach ($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
                </select>
                @error('country')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect2">State</label>
                <select name="state" id="state" class="form-control">
                    <option value="">Select State</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect2">City</label>
                <select name="city" id="city" class="form-control">
                    <option value="">Select City</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">submit</button>
        </form>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#country').change(function() {
                var country_id = $(this).val();
                if (country_id) {
                    $.ajax({
                        type: "GET",
                        url: "{{ url('/states') }}",
                        data: {
                            country_id: country_id
                        },
                        dataType: 'json',
                        success: function(data) {
                            if (data) {
                                $('#state').empty();
                                $('#state').append('<option value="">Select State</option>');
                                $.each(data, function(key, value) {
                                    $('#state').append('<option value="' + value.id +
                                        '">' + value.name + '</option>');
                                });
                            } else {
                                $('#state').empty();
                            }
                        }
                    });
                } else {
                    $('#state').empty();
                }
            });

            $('#state').change(function() {
                var state_id = $(this).val();
                if (state_id) {
                    $.ajax({
                        type: "GET",
                        url: "{{ url('/cities') }}",
                        data: {
                            state_id: state_id
                        },
                        dataType: 'json',
                        success: function(data) {
                            if (data) {
                                $('#city').empty();
                                $('#city').append('<option value="">Select City</option>');
                                $.each(data, function(key, value) {
                                    $('#city').append('<option value="' + value.id +
                                        '">' + value.name + '</option>');
                                });
                            } else {
                                $('#city').empty();
                            }
                        }
                    });
                } else {
                    $('#city').empty();
                }
            });
        });
    </script>
</body>

</html>

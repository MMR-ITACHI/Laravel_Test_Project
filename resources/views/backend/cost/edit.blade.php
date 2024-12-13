@extends('backend.layouts.parents')

@section('css')

<!-- Stylesheets -->
<!-- Bootstrap is included in its original form, unaltered -->
<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

<!-- Related styles of various javascript plugins -->
<link rel="stylesheet" href="{{ asset('css/plugins.css') }}">

<!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
<link rel="stylesheet" href="{{ asset('css/main.css') }}">

<!-- Load a specific file here from css/themes/ folder to alter the default theme of the template -->

<!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
<link rel="stylesheet" href="{{ asset('css/themes.css') }}">
<!-- END Stylesheets -->

<!-- Modernizr (browser feature detection library) & Respond.js (Enable responsive CSS code on browsers that don't support it, eg IE8) -->
<script src="{{ asset('js/vendor/modernizr-respond.min.js') }}"></script>

@endsection


@section('breadcum')

<!-- Navigation info -->
<ul id="nav-info" class="clearfix">
    <li><a href="index.html"><i class="fa fa-home"></i></a></li>
    <li><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
    <li class="active"><a href="">Edited Form</a></li>
</ul>
<!-- END Navigation info -->
@endsection

@section('content')
<!-- Form Validation, Validation Initialization happens at the bottom of the page -->
<form id="form-validation" action="{{route('cost.update', $cost->id ) }}" method="post" class="form-horizontal form-box remove-margin" enctype="multipart/form-data" >
    @csrf
    @method('PUT')
    <!-- Form Header -->
    <h4 class="form-box-header">Edited Form </h4>

    <!-- Form Content -->
    <div class="form-box-content">

        <div class="form-group">
            <label class="control-label col-md-2" for="val_website">Unit Name *</label>
            <div class="col-md-3">
                <select name="unit_name" id="">
                    <option value="">Select One</option>
                    @foreach($units as $unit)


<option value="{{$unit->id}}" {{ $unit->id == $cost->unit_id ? 'selected' : '' }} >{{$unit->name}}</option>

@endforeach
                </select>
                @error('unit_name')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror


              

            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-2" for="val_username">Cost Rate *</label>
            <div class="col-md-3">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                    <input type="text" id="val_username" value="{{$cost->cost}}" name="cost" class="form-control">
                    @error('cost')
					<div class="alert alert-danger">{{$message}}</div>
					@enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-2" for="val_skill">Status *</label>
            <div class="col-md-2">
                <select id="val_skill" name="status" class="form-control">
                    <option value="">Please select</option>
                    <option value="active">ACTIVE</option>
                    <option value="inactive">INACTIVE</option>

                </select>
                @error('status')
				<div class="alert alert-danger">{{$message}}</div>
				@enderror
            </div>
        </div>




        <div class="form-group form-actions">
            <div class="col-md-10 col-md-offset-2">
                <button type="reset" class="btn btn-danger"><i class="fa fa-repeat"></i> Reset</button>
                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Submit</button>
            </div>
        </div>
    </div>
    <!-- END Form Content -->
</form>
<!-- END Form Validation -->

@endsection


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
    !window.jQuery && document.write(decodeURI('%3Cscript src="js/vendor/jquery-1.11.1.min.js"%3E%3C/script%3E'));
</script>

@section('js')

<!-- Bootstrap.js -->
<script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>

<!-- Jquery plugins and custom javascript code -->
<script src="{{ asset('js/plugins.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

@endsection


@section('javascript')
<!-- Javascript code only for this page -->
<script>
    $(function() {

        /* For advanced usage and examples please check out
         *  Jquery Validation   -> https://github.com/jzaefferer/jquery-validation
         */

        /* Initialize Form Validation */
        $('#form-validation').validate({
            errorClass: 'help-block',
            errorElement: 'span',
            errorPlacement: function(error, e) {
                e.parents('.form-group > div').append(error);
            },
            highlight: function(e) {
                $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
                $(e).closest('.help-block').remove();
            },
            success: function(e) {
                // You can use the following if you would like to highlight with green color the input after successful validation!
                e.closest('.form-group').removeClass('has-success has-error'); // e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
                e.closest('.help-block').remove();
                e.closest('.help-inline').remove();
            },
            rules: {
                val_username: {
                    required: true,
                    minlength: 2
                },
                val_password: {
                    required: true,
                    minlength: 5
                },
                val_confirm_password: {
                    required: true,
                    minlength: 5,
                    equalTo: '#val_password'
                },
                val_email: {
                    required: true,
                    email: true
                },
                val_website: {
                    required: true,
                    url: true
                },
                val_date: {
                    required: true,
                    date: true
                },
                val_range: {
                    required: true,
                    range: [1, 100]
                },
                val_number: {
                    required: true,
                    number: true
                },
                val_digits: {
                    required: true,
                    digits: true
                },
                val_skill: {
                    required: true
                },
                val_credit_card: {
                    required: true,
                    creditcard: true
                },
                val_terms: {
                    required: true
                }
            },
            messages: {
                val_username: {
                    required: 'Please enter a username',
                    minlength: 'Your username must consist of at least 2 characters'
                },
                val_password: {
                    required: 'Please provide a password',
                    minlength: 'Your password must be at least 5 characters long'
                },
                val_confirm_password: {
                    required: 'Please provide a password',
                    minlength: 'Your password must be at least 5 characters long',
                    equalTo: 'Please enter the same password as above'
                },
                val_email: 'Please enter a valid email address',
                val_website: 'Please enter your website!',
                val_date: 'Please select a date!',
                val_range: 'Please enter a number between 1 and 100!',
                val_number: 'Please enter a number!',
                val_digits: 'Please enter digits!',
                val_credit_card: 'Please enter a valid credit card!',
                val_skill: 'Please select a skill!',
                val_terms: 'You must agree to the terms!'
            }
        });
    });
</script>

@endsection
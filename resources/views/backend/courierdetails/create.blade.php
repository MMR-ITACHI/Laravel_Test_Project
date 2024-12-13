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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<script type="text/javascript">
    $(document).ready(function() {

        //aUTO mULTIPLE

        $("#quantity").change(function() {
            /*var quantity = document.getElementById("quantity").value;*/
            var cost = $("#unit_price").val();
            var qty = $("#quantity").val();

            var amt = (cost * qty);

            $('#total').val(amt);
            $("#subtotal").val(amt);
            $("#amt").val(amt);

        });


        //aUTO dROPDOWN sELECT

        $('#payment_type').change(function() {
            var PaymentType = $(this).val();

            if (PaymentType == 'sender payment') {
                $('#payment_status').val('Paid');
            } else {
                $('#payment_status').val('Unpaid');
            }
        });


        //aUTO uNIT cOST sELECT

        $('#unit_id').change(function() {
            var unitId = $(this).val();

            if (unitId) {
                $.ajax({
                    url: '/employee/get-cost/' + unitId,
                    method: 'GET',
                    success: function(response) {
                        //alert(response.cost['cost']);
                        $('#unit_price').val(response.cost !== null ? response.cost : 'No cost available');
                    },
                    error: function() {
                        // alert('Error fetching cost.');
                    }
                });
            } else {
                $('#unit_price').val(''); // Clear the cost field if no unit is selected
            }
        });



        //Company Field Show

        $('#sender_type').change(function() {
            var companyId = $(this).val();

            if (companyId == 'Company') {
                $.ajax({
                    url: '{{ route("companyForm") }}',
                    method: 'GET',
                    success: function(response) {
                        $('#company_name').html(response).show();
                    },
                    error: function() {
                        alert('Error loading company field.');
                    }
                });

            } else {
                $('#company_name').hide().html(''); // Hide and clear the field if not 'company'

            }

        });

    });
</script>

@endsection


@section('breadcum')

<!-- Navigation info -->
<ul id="nav-info" class="clearfix">
    <li><a href="index.html"><i class="fa fa-home"></i></a></li>
    <li><a href="{{ url('admin/dashboard') }}">Dasboard</a></li>
    <li class="active"><a href="">Add</a></li>
</ul>
<!-- END Navigation info -->
@endsection

@section('content')
<!-- Form Validation, Validation Initialization happens at the bottom of the page -->
<form id="form-validation" action="{{route('courierdetails.store')}}" method="post" class="form-horizontal form-box remove-margin" enctype="multipart/form-data">
    @csrf
    <!-- Form Header -->
    <h4 class="form-box-header">Courier Details </h4>
    @if('msg')
    <div class="alert alert-success">{{session('msg')}}</div>
    @endif

    <!-- Form Content -->
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Sender information</h4>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label>Sender Type</label>
                        <select name="sender_type" class="form-select" id="sender_type">
                            <option value="">Select Type</option>
                            <option value="Individual">Individual</option>
                            <option value="Company">Company</option>
                        </select>
                        @error('sender_type')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror

                    </div>



                    <div class="form-control" id="company_name" name="company_name" style="display: none;">
                        <!-- Company field will be loaded here -->
                        <label class="control-label col-md-2" for="company_name">Company Name </label>

                    </div>

                    {{--
                        <div class="mb-3">
                          <label>Company Name</label>
                          <input type="text" class="form-control" name="company_name" id="company_name" style="display: none;" placeholder="Company name">
                        @error('company_name')
                        <div class="alert alert-danger">{{$message}}
                </div>
                @enderror
            </div>


            --}}





            <div class="mb-3">
                <label>Sender Name</label>
                <input type="text" class="form-control" name="sender_name" id="sender_name" placeholder="Sender name">
                @error('sender_name')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>


            <div class="mb-3">
                <label>Sender Email</label>
                <input type="text" class="form-control" name="sender_email" id="sender_email" placeholder="Sender email">
                @error('sender_email')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>


            <div class="mb-3">
                <label>Sender Phone Number</label>
                <input type="text" class="form-control" name="sender_phone_number" id="sender_phone_number" placeholder="Sender phone number">
                @error('sender_phone_number')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>


            <div class="mb-3">
                <label>Sender Address</label>
                <textarea class="form-control" name="sender_address" id="sender_address" placeholder="Sender address"></textarea>
                @error('sender_address')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>


        </div>
    </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Receiver information</h4>
            </div>

            <div class="card-body">


                <div class="mb-3">
                    <label>Receiver Branch Name</label>
                    <select name="receiver_branch_id" class="form-select">
                        <option value="">Select Branch</option>
                        @foreach ($branches->where('id', '!=' ,Auth::user()->branch_id) as $branch)
                        <option value="{{ $branch->id }}">{{ $branch->branch_name }}</option>
                        @endforeach
                    </select>
                    <span class="text-danger error-text receiver_branch_id_error"></span>
                </div>

                <div class="mb-3">
                    <label>Receiver Name</label>
                    <input type="text" class="form-control" name="receiver_name" placeholder="Receiver name">
                    @error('receiver_name')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Receiver Email</label>
                    <input type="text" class="form-control" name="receiver_email" placeholder="Receiver email">
                    @error('receiver_email')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Receiver Phone Number</label>
                    <input type="text" class="form-control" name="receiver_phone_number" placeholder="Receiver phone number">
                    @error('receiver_phone_number')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Receiver Address</label>
                    <textarea class="form-control" name="receiver_address" placeholder="Receiver address"></textarea>
                    @error('receiver_address')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Courier Status</label>
                    <select name="status" class="form-select" id="status">
                        <option>Select Type</option>
                        <option value="Processing" selected>Processing</option>
                        <option value="On the way">On the way</option>
                        <option value="Out of Delivery">Out of Delivery</option>
                        <option value="Delivered">Delivered</option>
                    </select>
                    @error('courier_status')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>





            </div>
        </div>
    </div>
    </div>




    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Item Details</h4>
                </div>

                <div class="card-body" id="item_list">
                    <div class="row">

                        <div class="col-lg-4 mb-3">
                            <label>Item Description</label>
                            <textarea class="form-control" rows="1" name="item_description" placeholder="Item description"></textarea>
                        </div>

                        <div class="col-lg-8">
                            <div class="row">

                                <div class="col-lg-4 col-md-6 col-12 mb-3">
                                    <label>Unit Name</label>
                                    <select name="unit_name" class="form-select select_unit_id" id="unit_id">
                                        <option value="">Select Unit</option>
                                        @foreach ($units as $unit)
                                        <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('unit_name')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-2 col-md-6 col-12 mb-3">
                                    <label>Cost</label>
                                    <input type="text" class="form-control get_cost_rate" id="unit_price" name="unit_price" placeholder="Cost">
                                    @error('unit_price')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-2 col-md-6 col-12 mb-3">
                                    <label>Quantity</label>
                                    <input type="number" class="form-control get_item_quantity" id="quantity" name="quantity" placeholder="Quantity">
                                    @error('quantity')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-3 col-md-6 col-12 mb-3">
                                    <label>Total Cost</label>
                                    <input type="number" class="form-control total_cost_rate" id="total" name="total" style="cursor: pointer;" readonly placeholder="Total cost">
                                    @error('total')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <span class="text-danger" id="validation-errors"></span>
                <div class="card-footer">
                    <div class="row">

                        <div class="col-lg-8">
                            <label>Special Comment</label>
                            <textarea name="special_comment" rows="1" class="form-control" placeholder="Special comment"></textarea>
                        </div>

                        <div class="col-lg-4">
                            <label>Grand Total</label>
                            <input type="number" class="form-control" name="subtotal" id="subtotal" style="cursor: pointer;" readonly placeholder="Grand total">
                            @error('grand_total')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Payment Details</h4>
                </div>

                <div class="card-body">
                    <div class="row justify-content-end">
                        <div class="col-lg-3 mb-3">
                            <label>Payment Type</label>
                            <select name="payment_type" class="form-select" id="payment_type">
                                <option value="">Select Type</option>
                                <option value="sender payment">Sender Payment</option>
                                <option value="receiver payment">Receiver Payment</option>
                            </select>
                            @error('payment_type')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror

                        </div>


                        <div class="col-lg-3 mb-3">
                            <label>Payment Status</label>
                            <select name="payment_status" class="form-select" id="payment_status">
                                <option value="">Select Type</option>
                                <option value="Paid">Paid</option>
                                <option value="Unpaid">Unpaid</option>
                            </select>
                            @error('Payment Status')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror

                        </div>


                        <div class="col-lg-3 mb-3">
                            <label>Payment Amount</label>
                            <input type="number" class="form-control" name="amt" id="amt" style="cursor: pointer;" placeholder="Payment amount" readonly>
                            @error('amt')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror

                        </div>
                        <div class="col-lg-2 mb-3">
                            <button type="submit" class="btn btn-success mt-4 px-5"><i class="bi bi-cursor-fill"></i> Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- END Form Content -->
</form>
<!-- END Form Validation -->

@endsection


<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
    !window.jQuery && document.write(decodeURI('%3Cscript src="js/vendor/jquery-1.11.1.min.js"%3E%3C/script%3E'));
</script> -->

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
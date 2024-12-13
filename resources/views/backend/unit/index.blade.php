@extends('backend.layouts.parents')

@section('css')

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

<ul id="nav-info" class="clearfix">
                        <li><a href="{{ url('admin/dashboard') }}"><i class="fa fa-home"></i></a></li>
                        <li><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                        <li class="active"><a href="{{ url('admin/unit') }}">Unit List</a></li>
                        
                    </ul>

@section('content')

<h3 class="page-header page-header-top"> <a href="{{route('unit.create')}}" class="btn btn-success ">Add Unit</a> <br>  Branches List <small>All information about Branches</small></h3>

@if('msg')
<div class="alert alert-success">{{session('msg')}}</div>
@endif


                    <table id="example-datatables" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="cell-small">SL No</th>
                                <th><i class="fa fa-user"></i> Unit Name</th>
                                <th><i class="fa fa-bolt"></i> Status</th>
                                <th><i class="fa fa-pencil-square-o" aria-hidden="true"></i>|<i class="fa fa-trash" aria-hidden="true"></i> Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach($units as $unit)
                        <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$unit->name}}</td>
                        <td><span class="{{$unit->status=='active'?'label label-success':'label label-warning'}}">{{$unit->status}} </span> </td>
                        
                        <td>
                            <form action="{{route('unit.destroy', $unit->id)}}" method="post">
                                @csrf 
                                @method('DELETE')
                                
                                <a href="{{route('unit.edit', $unit->id)}}" class="btn btn-success">Edit</a>
                               <button type="submit" name="submit" class="btn btn-danger">Delete</button>

                            
                        
                        

                            </form>
                            
                            </td>
                        
                        </tr>

                        @endforeach
                            <!-- <tr>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-success"><i class="fa fa-pencil"></i></a>
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                                    </div>
                                </td>
                                <td class="text-center hidden-xs hidden-sm">1</td>
                                <td><a href="javascript:void(0)">username1</a></td>
                                <td class="hidden-xs hidden-sm hidden-md">user1@example.com</td>
                                <td><span class="label label-warning">Pending..</span></td>
                            </tr> -->
                            
                        </tbody>
                    </table>
                    <!-- END Datatables -->

@endsection

@endsection
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script>!window.jQuery && document.write(decodeURI('%3Cscript src="js/vendor/jquery-1.11.1.min.js"%3E%3C/script%3E'));</script>

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
            $(function () {
                /* Initialize Datatables */
                $('#example-datatables').dataTable({columnDefs: [{orderable: false, targets: [0]}]});
                $('#example-datatables2').dataTable();
                $('#example-datatables3').dataTable();
                $('.dataTables_filter input').attr('placeholder', 'Search');
            });
        </script>

@endsection



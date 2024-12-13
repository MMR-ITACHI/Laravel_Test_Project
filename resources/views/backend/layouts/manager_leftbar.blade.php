<nav id="primary-nav">
    <ul>
        <li>
            
            <a href="{{ url('manager/dashboard') }}" class="active"><i class="fa fa-fire"></i>Dashboard</a>
        </li>
        <li>
            <a href="{{route('staff.index')}}"><i class="fa fa-glass"></i>All Staff</a>
        </li>
       
        <li>
            <a href="#"><i class="fa fa-th-list"></i>Send Courier List</a>
            <ul>
                <li>
                    <a href="{{ route('courier.info') }}"><i class="fa fa-file-text"></i>Processing</a>
                </li>
                <li>
                    <a href="{{ route('ontheWay.info') }}"><i class="fa fa-exclamation-triangle"></i>On The Way</a>
                </li>

                

                {{-- <li>
                    <a href="{{ route('outofDelivary.info') }}"><i class="fa fa-exclamation-triangle"></i>Out Of Delivary</a>
                </li> --}}
                
            </ul>
        </li>


        <li>
            <a href="#"><i class="fa fa-th-list"></i>Delivery Courier List</a>
            <ul>
                <li>
                    <a href="{{ route('Shipped.info') }}"><i class="fa fa-file-text"></i>Shipped</a>
                </li>

                <li>
                    <a href="{{ route('ontheWay.info') }}"><i class="fa fa-exclamation-triangle"></i>Delivered

                </li>
            </ul>
        </li>
        
        
</nav>
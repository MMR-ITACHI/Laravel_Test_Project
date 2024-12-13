<nav id="primary-nav">
                    <ul>
                        <li>
                            <a href="{{ url('admin/dashboard') }}" class="active"><i class="fa fa-fire"></i>Dashboard</a>
                            <!-- <a href="{{ route('dashboard') }}" class="active"><i class="fa fa-fire"></i>Dashboard</a> -->
                        </li>
                        <li>
                            <!-- <a href="{{ route('branch.index') }}"><i class="fa fa-glass"></i>Branch</a> -->
                            <a href="{{ url('admin/branch') }}"><i class="fa fa-glass"></i>Branch</a>

                        </li>
                        <li>
                            <a href="{{ route('manager.index') }}"><i class="fa fa-font"></i>All Manager</a>
                        </li>
                        <li>
                            <a href="{{ route('unit.index') }}"><i class="fa fa-th-list"></i>Unit</a> 
                            
                        </li>
                        <li>
                            <a href="{{ route('cost.index') }}"><i class="fa fa-file-text"></i>Cost</a>
                        </li>
                        <li>
                            <a href="{{ route('company.index') }}"><i class="fa fa-exclamation-triangle"></i>Company Name</a>
                        </li>
                                
                        
                    </ul>
 </nav>
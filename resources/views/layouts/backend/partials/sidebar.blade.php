<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">



                @if(Request::is('admin*'))

                  <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}"> <a class="waves-effect waves-dark" href="{{ route('admin.dashboard') }}" aria-expanded="false">
                          <i class="mdi mdi-gauge"></i>
                            <span class="hide-menu">Dashboard</span>
                        </a>
                  </li>

                    <li class="{{ Request::is('admin/profile') ? 'active' : '' }}"> <a class="waves-effect waves-dark" href="{{ route('admin.profile') }}" aria-expanded="false">
                            <i class="mdi mdi-account-check"></i>
                            <span class="hide-menu">Profile</span>
                        </a>
                    </li>


                    <li class="{{ Request::is('admin/service*') ? 'active' : '' }}"> <a class="waves-effect waves-dark" href="{{ route('admin.service.index') }}" aria-expanded="false">
                            <i class="mdi mdi-table"></i>
                            <span class="hide-menu">Typr of service</span>
                        </a>
                    </li>

                    <li class="{{ Request::is('admin/category*') ? 'active' : '' }}"> <a class="waves-effect waves-dark" href="{{ route('admin.category.index') }}" aria-expanded="false">
                      <i class="mdi mdi-table"></i>
                         <span class="hide-menu">Category</span>
                      </a>
                    </li>

                    <li class="{{ Request::is('admin/subcategory*') ? 'active' : '' }}"> <a class="waves-effect waves-dark" href="{{ route('admin.subcategory.index') }}" aria-expanded="false">
                            <i class="mdi mdi-table"></i>
                            <span class="hide-menu">Sub Category</span>
                        </a>
                    </li>

                 <li class="{{ Request::is('admin/paymentname*') ? 'active' : '' }}"> <a class="waves-effect waves-dark" href="{{ route('admin.paymentname.index') }}" aria-expanded="false">
                       <i class="mdi mdi-table"></i>
                            <span class="hide-menu">Payament Method</span>
                      </a>
                 </li>

                    <li class="{{ Request::is('admin/blog*') ? 'active' : '' }}"> <a class="waves-effect waves-dark" href="{{ route('admin.blog.index') }}" aria-expanded="false">
                            <i class="mdi mdi-table"></i>
                            <span class="hide-menu">Blog</span>
                        </a>
                    </li>
                     <li class="{{ Request::is('admin/post*') ? 'active' : '' }}"> <a class="waves-effect waves-dark" href="{{ route('admin.post.index') }}" aria-expanded="false">
                                <i class="mdi mdi-table"></i>
                                <span class="hide-menu">Promote posts</span>
                            </a>
                    </li>


                    <li class="{{ Request::is('admin/changepassword*') ? 'active' : '' }}"> <a class="waves-effect waves-dark" href="{{ route('admin.changepassword.index') }}" aria-expanded="false">
                            <i class="mdi mdi-account-check"></i>
                            <span class="hide-menu">Change password</span>
                        </a>
                    </li>

               @endif


                <!--shop owner sidebar-->


                    @if(Request::is('shop*'))

                        <li class="{{ Request::is('shop/dashboard') ? 'active' : '' }}"> <a class="waves-effect waves-dark" href="{{ route('shop.dashboard') }}" aria-expanded="false">
                                <i class="mdi mdi-gauge"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="{{ Request::is('shop/profile') ? 'active' : '' }}"> <a class="waves-effect waves-dark" href="{{ route('shop.profile') }}" aria-expanded="false">
                                <i class="mdi mdi-account-check"></i>
                                <span class="hide-menu">Profile</span>
                                </a>
                        </li>

                        <li class="{{ Request::is('shop/product*') ? 'active' : '' }}"> <a class="waves-effect waves-dark" href="{{ route('shop.product.index') }}" aria-expanded="false">
                                <i class="mdi mdi-account-check"></i>
                                <span class="hide-menu">Product</span>
                            </a>
                        </li>




                        <li class="{{ Request::is('shop/order*') ? 'active' : '' }}"> <a class="waves-effect waves-dark" href="{{ route('shop.order.index') }}" aria-expanded="false">
                                <i class="mdi mdi-account-check"></i>
                                <span class="hide-menu">Order</span>
                            </a>
                        </li>

                        <li class="{{ Request::is('shop/paymentmethod*') ? 'active' : '' }}"> <a class="waves-effect waves-dark" href="{{ route('shop.paymentmethod.index') }}" aria-expanded="false">
                                <i class="mdi mdi-account-check"></i>
                                <span class="hide-menu">Payment Method</span>
                            </a>
                        </li>

                        <li class="{{ Request::is('shop/discount*') ? 'active' : '' }}"> <a class="waves-effect waves-dark" href="{{ route('shop.discount.index') }}" aria-expanded="false">
                                    <i class="mdi mdi-account-check"></i>
                                    <span class="hide-menu">Discount banner</span>
                                    </a>
                        </li>
                        <li class="{{ Request::is('shop/post*') ? 'active' : '' }}"> <a class="waves-effect waves-dark" href="{{ route('shop.post.index') }}" aria-expanded="false">
                                <i class="mdi mdi-account-check"></i>
                                <span class="hide-menu">Posts</span>
                            </a>
                        </li>

                        <li class="{{ Request::is('shop/contact*') ? 'active' : '' }}"> <a class="waves-effect waves-dark" href="{{ route('shop.contact.index') }}" aria-expanded="false">
                                <i class="mdi mdi-account-check"></i>
                                <span class="hide-menu">Message</span>
                            </a>
                        </li>

                         <li class="{{ Request::is('shop/shopinfo*') ? 'active' : '' }}"> <a class="waves-effect waves-dark" href="{{ route('shop.shopinfo.index') }}" aria-expanded="false">
                                <i class="mdi mdi-account-check"></i>
                                <span class="hide-menu">Contact information</span>
                            </a>
                        </li>

                        <li class="{{ Request::is('shop/shippingcost*') ? 'active' : '' }}"> <a class="waves-effect waves-dark" href="{{ route('shop.shippingcost.index') }}" aria-expanded="false">
                                <i class="mdi mdi-account-check"></i>
                                <span class="hide-menu">Update Shipping cost and text</span>
                            </a>
                        </li>


                        <li class="{{ Request::is('shop/changepassword*') ? 'active' : '' }}"> <a class="waves-effect waves-dark" href="{{ route('shop.changepassword.index') }}" aria-expanded="false">
                                <i class="mdi mdi-account-check"></i>
                                <span class="hide-menu">Change password</span>
                            </a>
                        </li>

                    @endif





                    <!--service provider-->


                    @if(Request::is('service_provider*'))

                        <li class="{{ Request::is('service_provider/dashboard') ? 'active' : '' }}"> <a class="waves-effect waves-dark" href="{{ route('service_provider.dashboard') }}" aria-expanded="false">
                                <i class="mdi mdi-gauge"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>

                        <li class="{{ Request::is('service_provider/profile') ? 'active' : '' }}"> <a class="waves-effect waves-dark" href="{{ route('service_provider.profile') }}" aria-expanded="false">
                                <i class="mdi mdi-account-check"></i>
                                <span class="hide-menu">Profile</span>
                                </a>
                        </li>

                        <li class="{{ Request::is('service_provider/service*') ? 'active' : '' }}"> <a class="waves-effect waves-dark" href="{{ route('service_provider.service.index') }}" aria-expanded="false">
                                <i class="mdi mdi-account-check"></i>
                                <span class="hide-menu">Service</span>
                            </a>
                        </li>

                        <li class="{{ Request::is('service_provider/reservation*') ? 'active' : '' }}"> <a class="waves-effect waves-dark" href="{{ route('service_provider.reservation.index') }}" aria-expanded="false">
                                <i class="mdi mdi-account-check"></i>
                                <span class="hide-menu">Reservation</span>
                            </a>
                        </li>

                        <li class="{{ Request::is('service_provider/paymentmethod*') ? 'active' : '' }}"> <a class="waves-effect waves-dark" href="{{ route('service_provider.paymentmethod.index') }}" aria-expanded="false">
                                <i class="mdi mdi-account-check"></i>
                                <span class="hide-menu">Payment method</span>
                            </a>
                        </li>

                        <li class="{{ Request::is('service_provider/discount*') ? 'active' : '' }}"> <a class="waves-effect waves-dark" href="{{ route('service_provider.discount.index') }}" aria-expanded="false">
                                    <i class="mdi mdi-account-check"></i>
                                    <span class="hide-menu">Discount banner</span>
                                    </a>
                        </li>
                        <li class="{{ Request::is('service_provider/post*') ? 'active' : '' }}"> <a class="waves-effect waves-dark" href="{{ route('service_provider.post.index') }}" aria-expanded="false">
                                <i class="mdi mdi-account-check"></i>
                                <span class="hide-menu">Posts</span>
                            </a>
                        </li>


                         <li class="{{ Request::is('service_provider/contact*') ? 'active' : '' }}"> <a class="waves-effect waves-dark" href="{{ route('service_provider.contact.index') }}" aria-expanded="false">
                                <i class="mdi mdi-account-check"></i>
                                <span class="hide-menu">Message</span>
                            </a>
                        </li>

                        <li class="{{ Request::is('service_provider/shopinfo*') ? 'active' : '' }}"> <a class="waves-effect waves-dark" href="{{ route('service_provider.shopinfo.index') }}" aria-expanded="false">
                                <i class="mdi mdi-account-check"></i>
                                <span class="hide-menu">Contact information</span>
                            </a>
                        </li>

                        <li class="{{ Request::is('service_provider/changepassword*') ? 'active' : '' }}"> <a class="waves-effect waves-dark" href="{{ route('service_provider.changepassword.index') }}" aria-expanded="false">
                                <i class="mdi mdi-account-check"></i>
                                <span class="hide-menu">Change password</span>
                            </a>
                        </li>





                    @endif









            </ul>
            <div class="text-center m-t-30">
                <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="btn waves-effect waves-light btn-warning hidden-md-down"> Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
    <!-- Bottom points-->
    <div class="sidebar-footer">
        <!-- item--><a href="" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a>
        <!-- item--><a href="" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
        <!-- item--><a href="" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a> </div>
    <!-- End Bottom points-->
</aside>

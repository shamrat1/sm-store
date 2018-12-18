
    <!-- header -->
        <div class="agileits_header">
            <div class="w3l_offers">
                <a href="products.html">Today's special Offers !</a>
            </div>
            <div class="w3l_search">
                <form action="#" method="post">
                    <input type="text" name="Product" value="Search a product..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search a product...';}" required="">
                    <input type="submit" value=" ">
                </form>
            </div>
            <div class="product_list_header" style="margin-top: 5px">
                @if(Cart::count() >= 1)
                <a href="{{ route('cart.index') }}" class="btn btn-success" style="margin-top: 10px;">View Your Cart
                    <span>({{ Cart::count() }})</span></a>
                    @else
                    <button class="btn btn-default" disabled="">Cart ( empty )</button>
                    @endif
            </div>
            <div class="w3l_header_right">
                <ul>
                    <li class="dropdown profile_details_drop">
                        @guest
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i><span class="caret"></span></a>
                        <div class="mega-dropdown-menu">
                            <div class="w3ls_vegetables">
                                <ul class="dropdown-menu drp-mnu">
                                    <li><a href="{{ route('login') }}">Login</a></li>
                                    <li><a href="{{ route('register') }}">Sign Up</a></li>
                                </ul>
                                    @else
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name  }}<i class="fa fa-user" aria-hidden="true"></i><span class="caret"></span></a>
                                    <div class="mega-dropdown-menu">
                                        <div class="w3ls_vegetables">
                                            <ul class="dropdown-menu drp-mnu">
                                                <li><a href="">Profile</a></li>
                                                <li><a href="">Messages</a></li>
                                                <li><a href="{{ route('logout') }}">Log Out</a></li>
                                            </ul>
                                @endguest

                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="w3l_header_right1">
                <h2><a href="mail.html">Contact Us</a></h2>
            </div>
            <div class="clearfix"> </div>
        </div>
    <!-- script-for sticky-nav -->
        <script>
        $(document).ready(function() {
             var navoffeset=$(".agileits_header").offset().top;
             $(window).scroll(function(){
                var scrollpos=$(window).scrollTop(); 
                if(scrollpos >=navoffeset){
                    $(".agileits_header").addClass("fixed");
                }else{
                    $(".agileits_header").removeClass("fixed");
                }
             });
             
        });
        </script>
    <!-- //script-for sticky-nav -->
        <div class="logo_products">
            <div class="container">
                <div class="w3ls_logo_products_left">
                    <h1><a href="{{ route('index') }}"><span>SM</span> Store</a></h1>
                </div>
                <div class="w3ls_logo_products_left1">
                    <ul class="special_items">
                        <li><a href="{{ route('events') }}">Events</a><i>/</i></li>
                        <li><a href="{{ route('about') }}">About Us</a><i>/</i></li>
                        <li><a href="{{ route('deals') }}">Best Deals</a><i>/</i></li>
                        <li><a href="{{ route('services') }}">Services</a></li>
                    </ul>
                </div>
                <div class="w3ls_logo_products_left1">
                    <ul class="phone_email">
                        <li><i class="fa fa-phone" aria-hidden="true"></i>(+0123) 234 567</li>
                        <li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:store@grocery.com">store@grocery.com</a></li>
                    </ul>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    <!-- //header -->
    
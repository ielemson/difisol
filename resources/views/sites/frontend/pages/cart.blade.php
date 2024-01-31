@extends('layouts.front')


@section('content')
@section('title', 'Cart')
@include('frontend.include.innerBanner', ['banner_title' => 'Cart'])


<section class="cart-wraps-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <form>
                    <div class="cart-wraps">
                        <div class="cart-table table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Magazine</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody id="cartPage">
                                </tbody>
                            </table>
                        </div>
                        <div class="cart-buttons">
                            <div class="row align-items-center">
                                <div class="col-lg-7 col-md-7">
                                    <div class="continue-shopping-box">
                                        <a href="{{ route('magazine.list') }}" class="default-btn">
                                            Continue Shopping
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4">
                <div class="cart-totals">
                    <h3>Order Summary</h3>
                    <ul>
                        <li>Subtotal
                            <span class="cartSubtotal"></span>
                        </li>
                        <li>Coupon
                            <span>0.00</span>
                        </li>
                        <li>Total
                            <span>
                                <b class="cartTotal"></b>
                            </span>
                        </li>
                    </ul>
                    @auth
                        @php
                            $total = 0;
                            // $attribute_price = 0;
                            foreach (Cart::content() as $key => $product) {
                                $total += $product->price * $product->qty;
                                $total += $product->options->attribute_price;
                            }
                        @endphp
                        {{-- <a href="{{route('pay')}}" class="default-btn border-radius-5">
                        Make Payment
                    </a> --}}
                        {{-- <form method="POST" action="{{ route('pay') }}" id="paymentForm">
                            {{ csrf_field() }}
                            <input type="number" name="amount" val id="">
                            <button type="submit" class="default-btn col-12 mx-auto">Proceed to make payment</button>
                        </form> --}}

                        <form id="paymentForm">
                            <div class="form-group">
                                {{-- <label for="email">Email Address</label> --}}
                                <input type="hidden" id="payer_email" value="{{ Auth::user()->email }}" />
                            </div>
                            <div class="form-group">
                                {{-- <label for="amount">Amount</label> --}}
                                <input type="hidden" id="amount" value="{{ $total }}" />
                            </div>
                            <div class="form-group">
                                {{-- <label for="first-name">First Name</label> --}}
                                <input type="hidden" id="name" value="{{ Auth::user()->name }}" />
                            </div>

                            <div class="form-submit">
                                <button type="submit" class="default-btn col-12 mx-auto" onclick="payWithPaystack()">
                                    Place Order </button>
                            </div>
                        </form>
                    @else
                        <div class="row mx-auto">
                            <h6>Login or Register to place order</h6>
                            <button class="default-btn col-md-4 loginModal" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Login
                            </button>
                            &nbsp;
                            <button class="default-btn two  col-md-4" data-bs-toggle="modal" data-bs-target="#registerModal">
                                Register
                            </button>

                        </div>
                        
                    @endauth

                </div>
            </div>
        </div>
    </div>
</section>
{{-- Login Modal Starts ::::::::::::::::::::::::-> --}}
{{-- <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#ModalForm">
    Launch Modal Form
  </button> --}}
<!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="col-lg-12">
            <div class="user-all-form">
                <div class="contact-form">
                    <h3 class="user-title">
                        Sign in</h3>
                  
                        <form action="{{ route('user.cart.login') }}" method="POST"  id="LoginForm">
                         @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="email" name="email" id="email" class="form-control" required data-error="Email Address*" placeholder="Email Address*" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" type="password" name="password" placeholder="Password*" required>
                                </div>
                            </div>
                            <div class="col-lg-12 form-condition">
                                <div class="agree-label">
                                    <input type="checkbox" id="chb1">
                                    <label for="chb1">
                                        Remember Me
                                        <a class="forget" href="{{route('password.forget')}}">Forgot Password?</a>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <button type="submit" class="default-btn">
                                    Login Now
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
{{-- Login Modal Ends ::::::::::::::::::::::::-> --}}


{{-- Registration Modal Starts::::::::::::::::::::::::-> --}}
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="col-lg-12">
            <div class="user-all-form">
                <div class="contact-form">
                    <h3 class="user-title">
                        Sign up</h3>
                  
                        <form action="{{ route('user.cart.register') }}" method="POST"  id="RegisterForm">
                         @csrf
                        <div class="row">
                            <div class="col-lg-12 ">
                                <div class="form-group">
                                    <input type="text" name="name" id="name" class="form-control" required placeholder="Full Name*" required>
                                </div>
                            </div>
                            <div class="col-lg-12 ">
                                <div class="form-group">
                                    <input type="email" name="email" id="email" class="form-control" required data-error="Email Address*" placeholder="Email Address*" required>
                                </div>
                            </div>
                            <div class="col-lg-12 ">
                                <div class="form-group">
                                    <input type="text" name="phone" id="phone" class="form-control" required data-error="Phone Number*" placeholder="Phone Number*" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" type="password" name="password" placeholder="Password*" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" type="password" name="cpassword" placeholder="Confirm Password*" required>
                                </div>
                            </div>
                            
                            <div class="col-lg-12 col-md-12">
                                <button type="submit" class="default-btn">
                                    Register
                                </button>
                            </div>
                           
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
{{-- Registration Modal Ends::::::::::::::::::::::::-> --}}
@push('extra-scripts')
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        })

        // START my cart page view
        function cart() {
            $.ajax({
                type: 'GET',
                url: '/my-cart/list',
                dataType: 'json',
                success: function(response) {
                    // console.log(response)
                    $(".cartSubtotal").html("₦" + response.sub_total)
                    $(".cartTotal").html("₦" + new Intl.NumberFormat().format(response.cart_total) + ".00")
                    var rows = ""
                    $.each(response.carts, function(key, value) {
                        rows += `<tr>
                                <td class="col-md-2 courses-thumbnail"><img src="assets/images/products/${value.options.image} " alt="imga" style="width:60px; height:60px;"></td>
                                <td class="col-md-2">
                                    <div class="product-name"><a href="#">${value.name}</a></div>
                                    <div class="price">₦${new Intl.NumberFormat().format(value.price)}</div>
                                </td>
                               
                                <td class="col-md-2">
                                
                                <input type="text" value="${value.qty}" min="1" max="100" disabled="" style="width:25px;">
                             
                                </td>

                                <td class="col-md-2"><strong>₦${new Intl.NumberFormat().format(value.subtotal)}</strong></td>

                                <td class="col-md-1 close-btn">
                                    <button type="button" class="" id="${value.rowId}" onclick="cartRemove(this.id)"><i class="ri-delete-bin-6-line text-danger"></i></button>
                                </td>
                            </tr>
                            `
                    });
                    $('#cartPage').html(rows);
                    $('#total_bill').text(response.cart_total)
                }
            });
        }
        cart();
        // END my cart page view


        // START product remove from my cart
        function cartRemove(id) {
            $.ajax({
                type: 'GET',
                url: '/remove/from-cart/' + id,
                dataType: 'json',
                success: function(data) {
                    cart();
                    // miniCart();
                    // couponCalField();
                    // $('#applyCouponField').show();
                    // $('#coupon_name').val('');
                    // Start Message
                    // const Toast = Swal.mixin({
                    //     toast: true,
                    //     position: 'top-end',
                    //     showConfirmButton: false,
                    //     timer: 3000
                    // })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            // type: 'success',
                            icon: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            // type: 'error',
                            icon: 'error',
                            title: data.error
                        })
                    }
                    // End Message
                }
            });
        }
        // END product remove from my cart

        // START product qty increment from my cart
        function cartIncrement(id) {
            $.ajax({
                type: 'GET',
                url: '/add/in-cart/' + id,
                dataType: 'json',
                success: function(data) {
                    cart();
                    // miniCart();
                    // couponCalField();
                    // Start Message
                    // const Toast = Swal.mixin({
                    //     toast: true,
                    //     position: 'top-end',
                    //     showConfirmButton: false,
                    //     timer: 3000
                    // })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            // type: 'success',
                            icon: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            // type: 'error',
                            icon: 'error',
                            title: data.error
                        })
                    }
                    // End Message
                }
            });
        }
        //End product qty increment from my cart

        // START product qty Decrement from my cart
        function cartDecrement(id) {
            $.ajax({
                type: 'GET',
                url: '/reduce/from-cart/' + id,
                dataType: 'json',
                success: function(data) {
                    cart();
                    // miniCart();
                    // couponCalField();
                    // Start Message
                    // const Toast = Swal.mixin({
                    //     toast: true,
                    //     position: 'top-end',
                    //     showConfirmButton: false,
                    //     timer: 3000
                    // })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            // type: 'success',
                            icon: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            // type: 'error',
                            icon: 'error',
                            title: data.error
                        })
                    }
                    // End Message
                }
            });
        }
        //End product qty Decrement from my cart

        $("#LoginForm").submit(function(e){
         e.preventDefault();

        var all = $(this).serialize();

        $.ajax({
            url:  $(this).attr('action'),
            type: "POST",
            data: all,
            beforeSend:function(){
                // $(document).find('span.error-text').text('');
            },
            //validate form with ajax. This will be communicating 
            success: function(data){
               
                if (data.status==0) {
                    $.each(data.error, function(prefix, val){
                        // $('span.'+prefix+'_error').text(val[0]);
                        Toast.fire({
                        icon: 'error',
                        title: val[0],
                             })
                    });
                }

                if(data == 1){
                    Toast.fire({
                        icon: 'success',
                        title: 'login successful',
                        })
                        
                        setTimeout(() => {
                            location.reload()  
                        }, 2000);
                   
                }else if(data == 2){
                    Toast.fire({
                        icon: 'error',
                        title: 'invalid login details',
                        })
                }
                

            }
            })

        });


        // Rgister user

        $("#RegisterForm").submit(function(e){
         e.preventDefault();

        var all = $(this).serialize();

        $.ajax({
            url:  $(this).attr('action'),
            type: "POST",
            data: all,
            beforeSend:function(){
                // $(document).find('span.error-text').text('');
            },
            //validate form with ajax. This will be communicating 
            success: function(data){ 

                if (data.status == "success") {
                    Toast.fire({
                        icon: 'success',
                        title: data.msg,
                    })

                    setInterval(() => {
                        location.reload()
                    }, 2000);
                }

                if (data.status == "error") {
                    Toast.fire({
                        icon: 'error',
                        title: data.msg,
                    })
                }
                // if (data.status==0) {
                //     console.log(data)
                //     $.each(data.error, function(val){
                //         Toast.fire({
                //         icon: 'error',
                //         title: val,
                //     })
                //     });
                // }
            }
            })

        });

    </script>
    <script src="https://js.paystack.co/v2/inline.js"></script>




    <script>
        const paymentForm = document.getElementById('paymentForm');
        paymentForm.addEventListener("submit", payWithPaystack, false);


        function payWithPaystack(e) {
            e.preventDefault();

            const paystack = new PaystackPop();
            paystack.newTransaction({
                key: 'pk_live_e1a9e2d2c647dc6ee867e1f2be54444f3c1011c8', // Replace with your public keyS
                email: document.getElementById("payer_email").value,
                amount: document.getElementById("amount").value * 100,


                onSuccess: (transaction) => {
                    // Payment complete! Reference: transaction.reference 
                    // let message = 'Payment complete! Reference: ' + transaction;
                    $.ajax({
                        type: 'POST',
                        url: "paystack/store",
                        data: {
                            ref: transaction.reference,
                        },
                        success: function(data) {
                            
                            if (data.status == 200) {
                                Toast.fire({
                                    icon: 'success',
                                    title: data.msg,
                                })
                            }

                            setTimeout(() => {
                            location.href=data.url
                            }, 2000);
                        },

                    });
                },
                onCancel: () => {
                    // user closed popup
                    Toast.fire({
                        icon: 'error',
                        title: 'Payment Canceled',
                    })
                }

            });

        }
    </script>
@endpush


@endsection

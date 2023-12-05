<section class="request__estimate p-bottom-80">
    <img src="assets/images/contactus.svg" alt="" class="request__estimate--contactus wow fadeInRightBig"
    data-wow-duration="1s" data-wow-delay="1s" />
    <div class="container request__estimate--wrapper wow animate__animated animate__fadeInLeftBig" data-wow-duration="1s" data-wow-delay=".8s">

      
        <div class="request__estimate--wrapper--left">
            <div class="--title">
                <h2>{{ __('taillis.ContactHelp') }}</h2>
            </div>

            @if ($errors->any() || session()->has('error') || session()->has('message'))
            <div class=" p-bottom-20">
                @if ($errors->any())
                    <div class="custom--alert--danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session()->has('error'))
                    <div class="custom--alert--danger">
                        <div>
                            {{ session()->get('error') }}
                        </div>
                    </div>
                @endif

                @if (session()->has('message'))
                    <div class="custom--alert--success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 29.25 29.25">
                            <path
                                d="M18,3.375A14.625,14.625,0,1,0,32.625,18,14.623,14.623,0,0,0,18,3.375Zm7.488,10.582-9.4,9.443H16.08a1.27,1.27,0,0,1-.816.387,1.231,1.231,0,0,1-.823-.4L10.5,19.448a.28.28,0,0,1,0-.4L11.756,17.8a.272.272,0,0,1,.394,0l3.122,3.122,8.578-8.641a.278.278,0,0,1,.2-.084h0a.255.255,0,0,1,.2.084l1.23,1.273A.277.277,0,0,1,25.488,13.957Z"
                                transform="translate(-3.375 -3.375)" fill="#00b166" />
                        </svg>
                        <div>
                            {{ session()->get('message') }}
                        </div>
                    </div>
                @endif
            </div>
        @endif

            <form action="{{ route('messageContact') }}" method="POST" class="form__area">
                @csrf
                <div class="item--group">
                    <div class="field--input">
                        <input class="form-control" type="text" name="name" id="form-name"
                            placeholder="{{ __('taillis.ContactName')}}" required>

                        @error('name')
                            <span class="invalid-feedback d-block" role="alert" style="color:red">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="item--group">
                    <div class="field--input">
                        <input class="form-control" type="email" name="email" id="form-email" placeholder="{{ __('taillis.ContactMsg')}}"
                            required>
                        @error('email')
                            <span class="invalid-feedback d-block" role="alert" style="color:red">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="item--group">
                    <div class="field--input">
                        <input class="form-control" type="text" name="phone" id="form-phone"
                            placeholder="{{ __('taillis.ContactPhone')}}">
                        @error('phone')
                            <span class="invalid-feedback d-block" role="alert" style="color:red">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="item--group">
                    <div class="field--input">
                        <textarea class="form-control " name="body" id="form-body" cols="10" rows="4" placeholder="{{ __('taillis.ContactMsg')}}" required></textarea>

                        @error('comment')
                            <span class="invalid-feedback d-block" role="alert" style="color:red">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="d-flex justify--between">
                    <div class="">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">{{ __('taillis.ContactGcu') }}
                        </label>
                    </div>
                    <button class="fronty--btn primary">{{ __('taillis.ContactSend') }}</button>
                </div>
            </form>

        </div>

        <div class="request__estimate--wrapper--right">
            <div class="--title">
                <h2>{{ __('taillis.ContactContactInfo') }}</h2>
            </div>
            <div class="request__estimate--wrapper--right--content">
                <div class="request__estimate--wrapper--right--content--item">
                    <h4>Email</h4>
                    <h6>contact@taillislabs.com<br />
                        sales@taillislabs.com</h6>
                </div>
                <div class="request__estimate--wrapper--right--content--item">
                    <h4>{{ __('taillis.ContactPhone') }}</h4>
                    <h6>+212 522 29 83 38<br />
                        +212 773 25 21 47</h6>
                </div>
                <div class="request__estimate--wrapper--right--content--item">
                    <h4>{{ __('taillis.ContactAddress') }}</h4>
                    <h6>164, {{ __('taillis.Floor') }}, Casablanca {{ __('taillis.Morocco') }} </h6>
                </div>
                <div class="request__estimate--wrapper--right--content--item">
                    <h4>{{ __('taillis.ContactJionUs') }}</h4>
                    <div class="request__estimate--wrapper--right--title--icons">
                        <a href="https://www.facebook.com/taillisinnovation"><i class="ri-facebook-fill"></i></a>
                        <a href="https://www.linkedin.com/company/taillis-labs/mycompany/"><i
                                class="ri-linkedin-fill"></i></a>
                        <a href="https://twitter.com/taillisartists"><i class="ri-twitter-fill"></i></a>
                        <a href="https://www.instagram.com/taillislabs/"><i class="ri-instagram-fill"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
</section>




<section class="request__estimate d-none p-bottom-80">
    <img src="assets/images/contactus.svg" alt="" class="request__estimate--contactus wow fadeInRightBig"
        data-wow-duration="1s" data-wow-delay="1s" />
    <div class="container ">
        <div class="request__estimate--wrapper wow fadeInLeftBig" data-wow-duration="1s" data-wow-delay=".8s"></div>
        <div class="request__estimate--wrapper--left">
            <div class="request__estimate--wrapper--left--title">
                <h2>{{ __('taillis.ContactHelp') }}</h2>
            </div>
            <div class="text-center">

                @if (Session::has('msg'))
                    <div class="alert {{ Session::get('alert-class', 'alert-success') }} fade show" role="alert">
                        {{ Session::get('msg') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if (Session::has('msg_error'))
                    <div class="alert {{ Session::get('alert-class', 'alert-danger') }} fade show" role="alert">
                        {{ Session::get('msg_error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div>
            <div class="request__estimate--wrapper--left--form">
                <form action="{{ route('contactMessage') }}" method="POST" class="form__area">
                    @csrf
                    <div class="item--group">
                        <div class="field--input">
                            <input class="form-control" type="text" name="name" id="form-name"
                                placeholder="Nom et Prenom" required>

                            @error('name')
                                <span class="invalid-feedback d-block" role="alert" style="color:red">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="item--group">
                        <div class="field--input">
                            <input class="form-control" type="email" name="email" id="form-email"
                                placeholder="Email" required>
                            @error('email')
                                <span class="invalid-feedback d-block" role="alert" style="color:red">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="item--group">
                        <div class="field--input">
                            <input class="form-control" type="text" name="phone" id="form-phone"
                                placeholder="Telephone">
                            @error('phone')
                                <span class="invalid-feedback d-block" role="alert" style="color:red">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="item--group">
                        <div class="field--input">
                            <input class="form-control" type="text" name="reason" id="form-reason"
                                placeholder="Raison Social">
                            @error('reason')
                                <span class="invalid-feedback d-block" role="alert" style="color:red">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="item--group">
                        <div class="field--input">
                            <textarea class="form-control " name="body" id="form-body" cols="10" rows="4" placeholder="Message"></textarea>

                            @error('comment')
                                <span class="invalid-feedback d-block" role="alert" style="color:red">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex justify--between">
                       <div class="">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">{{ __('taillis.ContactGcu')}}
                            </label>
                       </div>
                        <button class="fronty--btn primary--outline">{{ __('taillis.ContactSend')}}</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="request__estimate--wrapper--right">
            <div class="request__estimate--wrapper--right--title">
                <h2>{{ __('taillis.ContactContactInfo') }}</h2>
            </div>
            <div class="request__estimate--wrapper--right--content">
                <div class="request__estimate--wrapper--right--content--item">
                    <h4>Email</h4>
                    <h6>contact@taillislabs.com<br />
                        sales@taillislabs.com</h6>
                </div>
                <div class="request__estimate--wrapper--right--content--item">
                    <h4>{{ __('taillis.ContactPhone') }}</h4>
                    <h6>+212 522 29 83 38<br />
                        +212 773 25 21 47</h6>
                </div>
                <div class="request__estimate--wrapper--right--content--item">
                    <h4>{{ __('taillis.ContactAddress') }}</h4>
                    <h6>164, {{ __('taillis.Floor') }}, Casablanca {{ __('taillis.Morocco') }} </h6>
                </div>
                <div class="request__estimate--wrapper--right--content--item">
                    <h4>{{ __('taillis.ContactJionUs') }}</h4>
                    <div class="request__estimate--wrapper--right--title--icons">

                        <a href="https://www.facebook.com/taillisinnovation"><i
                                class="fab fa-facebook-square"></i></a>
                        <a href="https://www.linkedin.com/company/taillis-labs/mycompany/"><i
                                class="fab fa-linkedin"></i></a>
                        <a href="https://twitter.com/taillisartists"><i class="fab fa-twitter"></i></a>
                        <a href="https://www.instagram.com/taillislabs/"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="request__estimate--wrapper--right--title" style="display: none;">
                <h2>{{ __('taillis.ContactJionUs') }}</h2>

                <div class="request__estimate--wrapper--right--title--icons">
                    <a href="https://www.facebook.com/taillisinnovation"><i class="fab fa-facebook-square"></i></a>
                    <a href="https://www.linkedin.com/company/taillis-labs/mycompany/"><i
                            class="fab fa-linkedin"></i></a>
                    <a href="https://twitter.com/taillisartists"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.instagram.com/taillislabs/"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

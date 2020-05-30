
@include('partials/header')
    <!-- banner part start-->
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-xl-6">
                    <div class="banner_text">
                        <div class="banner_text_iner">
                            <h5>Every people yearns to learn</h5>
                            <h1>Making People's
                                World Better</h1>
                            <p>The more that you read, the more things you will know. The more that you learn, the more places you'll go.</p>
                            <a href="{{ route('login') }}" class="btn_1">View Books </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner part start-->

    @include('partials/footer')
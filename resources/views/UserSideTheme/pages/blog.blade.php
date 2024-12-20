@extends('UserSideTheme.masters.master')
@section('herotitle')
    Our Blogs
@endsection
@section('breadcrumbs')
    blogs
@endsection
@section('blog-active','active')
@section('content')
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4 ftco-animate">
                    <div class="blog-entry">
                        <a href="blog-single" class="block-20"
                            style="background-image: url('{{ asset('Userassets') }}/images/image_1.jpg');">
                        </a>
                        <div class="text pt-3 pb-4">
                            <div class="meta">
                                <div><a href="#">June 25, 2019</a></div>
                                <div><a href="#">Admin</a></div>
                            </div>
                            <h3 class="heading"><a href="#">Taste the delicious foods in Asia</a></h3>
                            <p class="clearfix">
                                <a href="#" class="float-left read">Read more</a>
                                <a href="#" class="float-right meta-chat"><span class="icon-chat"></span> 3</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 ftco-animate">
                    <div class="blog-entry">
                        <a href="blog-single" class="block-20"
                            style="background-image: url('{{ asset('Userassets') }}/images/image_2.jpg');">
                        </a>
                        <div class="text pt-3 pb-4">
                            <div class="meta">
                                <div><a href="#">June 25, 2019</a></div>
                                <div><a href="#">Admin</a></div>
                            </div>
                            <h3 class="heading"><a href="#">Taste the delicious foods in Asia</a></h3>
                            <p class="clearfix">
                                <a href="#" class="float-left read">Read more</a>
                                <a href="#" class="float-right meta-chat"><span class="icon-chat"></span> 3</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 ftco-animate">
                    <div class="blog-entry">
                        <a href="blog-single" class="block-20"
                            style="background-image: url('{{ asset('Userassets') }}/images/image_3.jpg');">
                        </a>
                        <div class="text pt-3 pb-4">
                            <div class="meta">
                                <div><a href="#">June 25, 2019</a></div>
                                <div><a href="#">Admin</a></div>
                            </div>
                            <h3 class="heading"><a href="#">Taste the delicious foods in Asia</a></h3>
                            <p class="clearfix">
                                <a href="#" class="float-left read">Read more</a>
                                <a href="#" class="float-right meta-chat"><span class="icon-chat"></span> 3</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 ftco-animate">
                    <div class="blog-entry">
                        <a href="blog-single.html" class="block-20"
                            style="background-image: url('{{ asset('Userassets') }}/images/image_4.jpg');">
                        </a>
                        <div class="text pt-3 pb-4">
                            <div class="meta">
                                <div><a href="#">June 25, 2019</a></div>
                                <div><a href="#">Admin</a></div>
                            </div>
                            <h3 class="heading"><a href="#">Taste the delicious foods in Asia</a></h3>
                            <p class="clearfix">
                                <a href="#" class="float-left read">Read more</a>
                                <a href="#" class="float-right meta-chat"><span class="icon-chat"></span> 3</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 ftco-animate">
                    <div class="blog-entry">
                        <a href="blog-single.html" class="block-20"
                            style="background-image: url('{{ asset('Userassets') }}/images/image_5.jpg');">
                        </a>
                        <div class="text pt-3 pb-4">
                            <div class="meta">
                                <div><a href="#">June 25, 2019</a></div>
                                <div><a href="#">Admin</a></div>
                            </div>
                            <h3 class="heading"><a href="#">Taste the delicious foods in Asia</a></h3>
                            <p class="clearfix">
                                <a href="#" class="float-left read">Read more</a>
                                <a href="#" class="float-right meta-chat"><span class="icon-chat"></span> 3</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 ftco-animate">
                    <div class="blog-entry">
                        <a href="blog-single.html" class="block-20"
                            style="background-image: url('{{ asset('Userassets') }}/images/image_6.jpg');">
                        </a>
                        <div class="text pt-3 pb-4">
                            <div class="meta">
                                <div><a href="#">June 25, 2019</a></div>
                                <div><a href="#">Admin</a></div>
                            </div>
                            <h3 class="heading"><a href="#">Taste the delicious foods in Asia</a></h3>
                            <p class="clearfix">
                                <a href="#" class="float-left read">Read more</a>
                                <a href="#" class="float-right meta-chat"><span class="icon-chat"></span> 3</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row no-gutters my-5">
                <div class="col text-center">
                    <div class="block-27">
                        <ul>
                            <li><a href="#">&lt;</a></li>
                            <li class="active"><span>1</span></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">&gt;</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

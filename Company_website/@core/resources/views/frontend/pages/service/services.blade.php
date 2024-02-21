@extends('frontend.frontend-page-master')
@section('site-title')
    {{ get_static_option('service_page_' . $user_select_lang_slug . '_name') }}
@endsection
@section('page-title')
    {{ get_static_option('service_page_' . $user_select_lang_slug . '_name') }}
@endsection
@section('page-meta-data')
    <meta name="description"
        content="{{ get_static_option('service_page_' . $user_select_lang_slug . '_meta_description') }}">
    <meta name="tags" content="{{ get_static_option('service_page_' . $user_select_lang_slug . '_meta_tags') }}">
@endsection
@section('content')
<section class="service-breadcrumb-area">
        <div class="container-fluid">
            <div class="row">
                <div class="service-banner">
                    <div class="banner-inner">
                        <h1 class="page-title">LEADING MANAGED SERVICES PROVIDER</h1>
                        <div class="page-desc"><p>Techstudio provides customized, flexible, reliable managed service solutions. With Wachter as your managed services provider, you’ll stop worrying about your technology and start focusing on your business.</p></div>
                    </div>
                </div>
                <div class="breadcrumb-inner">
                    <p><span><a href="{{url('/')}}">Techstudio</a></span><span><strong>@yield('page-title')</strong></span></p>
                    
                </div>
            </div>
        </div>
    </section>
    <div class="contact-section padding-bottom-120 padding-top-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="case-studies-masonry-wrapper">
                        <ul class="case-studies-menu style-01">
                            <li class="active" data-filter="*">{{__('All')}}</li>
                            @foreach($all_service_category as $data)
                                <li data-filter=".{{Str::slug($data->name)}}">{{$data->name}}</li>
                            @endforeach
                        </ul>
                        <div class="case-studies-masonry">
                            @foreach($all_services as $data)
                                <div class="col-lg-3 col-md-4 col-sm-6 masonry-item {{ Str::slug(get_service_category_name_by_id($data->categories_id)) }}">
                                    <div class="single-case-studies-item">
                                        <div class="thumb">

                                            {!! render_image_markup_by_attachment_id($data->image) !!}
                                        </div>
                                        <div class="cart-icon">
                                            <h4 class="title"><a href="{{route('frontend.services.single',$data->slug)}}"> {{$data->title}}</a></h4>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    
                    {{-- <div class="case-studies-masonry-wrapper">
                        <ul class="case-studies-menu style-01">
                            <li class="active" data-filter="*">{{ __('All') }}</li>
                            @foreach ($all_service_category as $data)
                                <li data-filter=".{{ Str::slug($data->name) }}">{{ $data->name }}</li>
                            @endforeach
                        </ul>
                        <div class="case-studies-masonry">
                            @foreach ($all_services as $data)
                                <a href="{{ url('service/' . $data->slug) }}">
                                    <div
                                        class="col-lg-4 col-md-6 masonry-item {{ Str::slug(get_service_category_name_by_id($data->categories_id)) }}">
                                        <div class="course-single-grid-item ">
                                            <div class="thumb">
                                                <img src="{{ asset('assets/frontend/img/service/serviceImg1.jpg') }}">
                                            </div>

                                            <div class="content">
                                                <h3 class="title">{{ $data->title }}</h3>
                                                <div class="description">
                                                    {{ $data->excerpt }}
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                    --}}
                    <div class="blog-pagination">
                        {!! $all_services->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('frontend.frontend-page-master')
@section('site-title')
{{get_static_option('work_page_'.$user_select_lang_slug.'_name')}}
@endsection
@section('page-title')
{{$service_item->title}}
@endsection
@section('page-meta-data')
<meta name="description" content="{{get_static_option('work_page_'.$user_select_lang_slug.'_meta_description')}}">
<meta name="tags" content="{{get_static_option('work_page_'.$user_select_lang_slug.'_meta_tags')}}">
@endsection
@section('content')
<style>
    .breadcrumb-area {
        display: none;
    }

    #service_tab::after {
        content: "/";
        position: absolute;
        right: 11px;
        top: 50%;
        transform: translateY(-50%);
        -webkit-transform: translateY(-50%);
        opacity: .33;
    }

    .ul {
        list-style: none;
    }

    .ul li:before {
        background-color: #0085ca;
        content: "";
        height: 2px;
        left: -42px;
        position: absolute;
        top: 15px;
        width: 22px;
    }
</style>
<section class="service-breadcrumb-area">
    <div class="container-fluid">
        <div class="row">
            @php
                $banner = get_attachment_image_by_id($service_item->banner, 'full')['img_url'];
               // echo $banner;
            @endphp
            <div class="service-banner" style="background-image: url({{$banner}})">
                <div class="banner-inner">
                    <h1 class="page-title">{{$service_item->excerpt}}</h1>
                    <div class="page-desc">{!!$service_item->description!!}</div>
                </div>
            </div>
            <div class="breadcrumb-inner">
                <p><span><a href="{{url('/')}}">Techstudio</a></span><span><a id="service_tab" href="{{url('/solution')}}">Solution</a></span><span><strong>@yield('page-title')</strong></span></p>

            </div>
        </div>
    </div>
</section>
<section class="service-area1">
    <div class="container-fluid">
        <div class="row">
            <div class="sect-connt">
                <h2>{{$service_item->excerpt2}}</h2>
                {!!$service_item->description2!!}

            </div>
        </div>
    </div>
</section>
<section class="service-area2">
    <div class="container-fluid">
        <div class="row">
            <div class="sect-connt">
                <h3>{{$service_item->text2}}</h3>
            </div>
        </div>
    </div>
</section>
@php
$count = count($service_details);
@endphp
@for($i=0;$i<$count;$i+=2) <?php
                            // print_r(get_attachment_image_by_id($service_details[$i]->img, 'full')['img_url']);
                            // die();
                            ?> <section class="service-area3">
    <div class="container-fluid">

        <div class="row">
            <div class="sect-connt">
                <div class="sect-count-img">
                    {!! render_image_markup_by_attachment_id($service_details[$i]->img) !!}

                </div>
                <div class="sect-count-inner">
                    <h3>{{$service_details[$i]->title}}</h3>
                    <p>{!!$service_details[$i]->description!!}</p>
                    @php
                    $all_points = json_decode($service_details[$i]->content);

                    @endphp
                    @if($all_points!=[] && $all_points[0]!='')
                    <ul class="ul">
                        @foreach($all_points as $point)

                        <li><i class="fas fa-minus" style="color: #0085ca;"></i> {{$point}}</li>


                        @endforeach
                    </ul>
                    @endif

                </div>
            </div>
        </div>
    </div>
    </section>
    @if(isset($service_details[$i+1]->title))

    <section class="service-area4">
        <div class="container-fluid">
            <div class="row">

                <div class="sect-connt">
                    <div class="sect-count-img">
                        {!! render_image_markup_by_attachment_id($service_details[$i+1]->img) !!}

                    </div>
                    <div class="sect-count-inner">
                        <h3>{{$service_details[$i+1]->title}}</h3>
                        <p>{!!$service_details[$i+1]->description!!}</p>
                        @php
                        $all_points = json_decode($service_details[$i+1]->content);

                        @endphp
                        @if($all_points[0]!='')
                        <ul class="ul">
                            @foreach($all_points as $point)

                            <li><i class="fas fa-minus" style="color: #0085ca;"></i> {{$point}}</li>


                            @endforeach
                        </ul>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    @endfor

    <section class="service-area11">
        <div class="container-fluid">
            <div class="row">
                <div class="sect-connt">
                    <h2>{{$service_item->text1}}</h2>
                    @php
                    $more_title = (array)json_decode($service_item->more_service_title);
                    $more_img = (array)json_decode($service_item->more_service_img);
                    $count = count($more_title);
                    @endphp
                    @for($i=0;$i<$count;$i+=4) <div class="ser-cat">
                        @for($j=0;$j<4;$j++) @if(isset($more_title[$i+$j])) <div class="cat1">
                            {!! render_image_markup_by_attachment_id($more_img[$i+$j]) !!}
                            <h3>{{$more_title[$i+$j]}}</h3>
                </div>
                @endif
                @endfor
            </div>
            @endfor

        </div>
        </div>
        </div>
    </section>
    <div class="page-content service-details padding-top-120 padding-bottom-115">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="service-details-item">


                        @if(!empty($price_plan))
                        <div class="price-plan-wrapper margin-top-40">
                            <div class="row">
                                @foreach($price_plan as $data)
                                <div class="col-lg-6">
                                    <div class="single-price-plan-01 margin-bottom-20">
                                        <div class="price-header">
                                            <div class="name-box">
                                                <h4 class="name">{{$data->title}}</h4>
                                            </div>
                                            <div class="price-wrap">
                                                <span class="price">{{amount_with_currency_symbol($data->price)}}</span><span class="month">{{$data->type}}</span>
                                            </div>
                                        </div>
                                        <div class="price-body">
                                            <ul>
                                                @php
                                                $features = explode("\n",$data->features);
                                                @endphp
                                                @foreach($features as $item)
                                                <li>{{$item}}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="btn-wrapper">
                                            @php
                                            $url = !empty($data->url_status) ? route('frontend.plan.order',['id' => $data->id]) : $data->btn_url;
                                            @endphp
                                            <a href="{{$url}}" class="boxed-btn">{{$data->btn_text}}</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="widget-area">
                        {!! App\WidgetsBuilder\WidgetBuilderSetup::render_frontend_sidebar('service',['column' => false]) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="service-area7">
        <div class="container-fluid">
            <div class="row">
                <div class="sect-connt">
                    <h3>SPEAK WITH AN EXPERT</h3>
                    <a class="cont-btn" href="{{url('/contact')}}">CONTACT US »</a>
                </div>
            </div>
        </div>
    </section>
    @endsection
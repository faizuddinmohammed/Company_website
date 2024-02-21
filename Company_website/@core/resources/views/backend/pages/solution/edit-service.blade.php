@extends('backend.admin-master')
@section('style')
<link rel="stylesheet" href="{{asset('assets/backend/css/summernote-bs4.css')}}">
<link rel="stylesheet" href="{{asset('assets/backend/css/dropzone.css')}}">
<link rel="stylesheet" href="{{asset('assets/backend/css/media-uploader.css')}}">
<link rel="stylesheet" href="{{asset('assets/backend/css/bootstrap-tagsinput.css')}}">
<link rel="stylesheet" href="{{asset('assets/backend/css/nice-select.css')}}">
@endsection
@section('site-title')
{{__('Edit Solution')}}
@endsection
@section('content')
<style>
    .curriculmn-repeater-wrap1 > .action-wrap {
    /* position: absolute; */
    right: 10px;
    top: 10px;
    text-align: right;
}
    .curriculmn-repeater-wrap1 > .action-wrap span {
    display: inline-block;
    width: 25px;
    height: 25px;
    line-height: 25px;
    text-align: center;
    background-color: #ddd;
    font-size: 14px;
    cursor: pointer;
}
.curriculmn-repeater-wrap1 > .action-wrap span.add {
    background-color: #339e4a;
    color: #fff;
}
.curriculmn-repeater-wrap1 > .action-wrap span.remove {
    background-color: #bb4b4c;
    color: #fff;
}
</style>
<div class="col-lg-12 col-ml-12 padding-bottom-30">
    <div class="row">
        <div class="col-lg-12">
            <div class="margin-top-40"></div>
            <x-error-msg />
            <x-flash-msg />
        </div>
        <div class="col-lg-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <div class="header-wrap d-flex justify-content-between">
                        <h4 class="header-title">{{__('Edit Solution')}}</h4>
                        <a href="{{route('admin.solutions')}}" class="btn btn-primary">{{__('All Solutions')}}</a>
                    </div>
                    <form action="{{route('admin.solutions.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$service->id}}">
                        <div class="form-group">
                            <label for="language">{{__('Language')}}</label>
                            <select name="lang" id="language" class="form-control">
                                @foreach(get_all_language() as $language)
                                <option @if($language->slug == $service->lang) selected @endif value="{{$language->slug}}">{{$language->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title">{{__('Title')}}</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{$service->title}}">
                        </div>
                        <div class="form-group">
                            <label for="title">{{__('Slug')}}</label>
                            <input type="text" class="form-control" id="slug" name="slug" value="{{$service->slug}}">
                        </div>
                        <div class="form-group">
                            <label for="edit_icon_type">{{__('Icon Type')}}</label>
                            <select name="icon_type" class="form-control" id="edit_icon_type">
                                <option @if($service->icon_type == 'icon') selected @endif value="icon">{{__("Font Icon")}}</option>
                                <option @if($service->icon_type == 'image') selected @endif value="image">{{__("Image Icon")}}</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="icon" class="d-block">{{__('Icon')}}</label>
                            <div class="btn-group ">
                                <button type="button" class="btn btn-primary iconpicker-component">
                                    <i class="{{$service->icon}}"></i>
                                </button>
                                <button type="button" class="icp icp-dd btn btn-primary dropdown-toggle" data-selected="{{$service->icon}}" data-toggle="dropdown">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu"></div>
                            </div>
                            <input type="hidden" class="form-control" id="icon" value="{{$service->icon}}" name="icon">
                        </div>
                        <div class="form-group">
                            <label for="img_icon">{{__('Image Icon')}}</label>
                            <div class="media-upload-btn-wrapper">
                                <div class="img-wrap">
                                    @php
                                    $service_section_img = get_attachment_image_by_id($service->img_icon,null,true);
                                    $image_btn_label = __('Upload Image Icon');
                                    @endphp
                                    @if (!empty($service_section_img))
                                    <div class="attachment-preview">
                                        <div class="thumbnail">
                                            <div class="centered">
                                                <img class="avatar user-thumb" src="{{$service_section_img['img_url']}}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                    $image_btn_label = __('Update Image Icon');
                                    @endphp
                                    @endif
                                </div>
                                <input type="hidden" id="img_icon" name="img_icon" value="{{$service->img_icon}}">
                                <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="{{__('Select Image')}}" data-modaltitle="{{__('Upload Image')}}" data-toggle="modal" data-target="#media_upload_modal">
                                    {{$image_btn_label}}
                                </button>
                            </div>
                            <small>{{__('Recommended image size 60x60')}}</small>
                        </div>
                        <div class="form-group">
                            <label for="excerpt">{{__('Excerpt 1')}}</label>
                            <textarea name="excerpt" id="excerpt" class="form-control max-height-150" cols="30" rows="10">{{$service->excerpt}}</textarea>
                            
                        </div>
                        <div class="form-group">
                            <label for="description">{{__('Description')}}</label>
                            <input type="hidden" name="description" id="description" value="{{$service->description}}">
                            <div class="summernote">{!! $service->description !!}</div>
                        </div>
                        <div class="form-group">
                            <label for="excerpt2">{{__('Excerpt 2')}}</label>
                            <textarea name="excerpt2" id="excerpt2" class="form-control max-height-150" cols="30" rows="10">{{$service->excerpt2}}</textarea>
                            
                        </div>
                        <div class="form-group">
                            <label for="description2">{{__('Description 2')}}</label>
                            <input type="hidden" name="description2" id="description2" value="{{$service->description2}}">
                            <div class="summernote">{!! $service->description2 !!}</div>
                        </div>
                        <div class="form-group">
                            <label for="text2">{{__('Heading Middle')}}</label>
                            <textarea name="text2" id="text2" class="form-control max-height-150" placeholder="{{__('Heading Middle')}}" cols="30" rows="10">{{$service->text2}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="text1">{{__('Text Bottom')}}</label>
                            <textarea name="text1" id="text1" class="form-control max-height-150" placeholder="{{__('Text Bottom')}}" cols="30" rows="10">{{$service->text1}}</textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="meta_tags">{{__('Meta Tags')}}</label>
                            <input type="text" name="meta_tags" class="form-control" value="{{$service->meta_tag}}" data-role="tagsinput" id="meta_tags">
                        </div>
                        <div class="form-group">
                            <label for="meta_description">{{__('Meta Description')}}</label>
                            <textarea name="meta_description" class="form-control" rows="5" id="meta_description">{{$service->meta_description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="category">{{__('Category')}}</label>
                            <select name="categories_id" id="category" class="form-control">
                                <option value="">{{__('Select Category')}}</option>
                                @foreach($service_category as $data)
                                <option @if($service->categories_id == $data->id) selected @endif value="{{$data->id}}">{{$data->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="price_plan">{{__('Price Plans')}}</label>
                            <select name="price_plan[]" multiple class="form-control nice-select wide" id="price_plan_select">
                                @php
                                $select_plan = !empty($service->price_plan) ? unserialize($service->price_plan) : [];
                                @endphp
                                @foreach($price_plans as $data)
                                <option value="{{$data->id}}" @if(is_array($select_plan) && in_array($data->id,$select_plan)) selected @endif>{{$data->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status">{{__('Status')}}</label>
                            <select name="status" id="status" class="form-control">
                                <option @if($service->status == 'publish') selected @endif value="publish">{{__('Publish')}}</option>
                                <option @if($service->status == 'draft') selected @endif value="draft">{{__('Draft')}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sr_order">{{__('Order')}}</label>
                            <input type="text" class="form-control" id="sr_order" name="sr_order" value="{{$service->sr_order}}">
                            <span class="info-text">{{__('if you set order for it, all solution will show in frontend as a per this order')}}</span>
                        </div>
                        <x-media-upload :id="$service->image" :name="'image'" :dimentions="'1920x1280'" :title="__('Image')" />
                        <x-media-upload :id="$service->banner" :name="'banner'" :dimentions="'3000x1680'" :title="__('Banner')" />
                        <div class="iconbox-repeater-wrapper dynamic-repeater">
                            <label for="additional_info" class="d-block">{{__('Details')}} <span class="d-none"><i class="fas fa-spinner fa-spin"></i></span></label>
                            @forelse($service_details as $sd_id => $service_detail)
                            <input type="hidden" name="service_detail_id[]" value="{{$service_detail->id}}">
                               <div class="curriculmn-outer-wrap">
                                   <div class="curriculmn-repeater-wrap">
                                       <div class="action-wrap">
                                           <span class="edit d-none"><a href="#"><i class="ti-pencil"></i></a></span>
                                           <span class="add"><i class="ti-plus"></i></span>
                                           <span class="remove"><i class="ti-trash"></i></span>
                                       </div>
                                       
                                       
                                       <div class="tab-content" >
                                            <div class="tab-pane fade  show active" id="repeater_tab" role="tabpanel">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="detail_title[{{$sd_id}}]" placeholder="{{__('Title')}}" value="{{$service_detail['title'] ?? ''}}">
                                                </div>
                                                <div class="form-group">
                                                    <textarea class="form-control max-height-120" name="detail_description[{{$sd_id}}]" cols="30" rows="10" placeholder="{{__('Description')}}">{{$service_detail['description'] ?? ''}}</textarea>
                                                </div>
                                                <x-media-upload :id="$service_detail->img" :name="'detail_img['.$sd_id.']'" :dimentions="'1920x1280'" :title="__('Image')" />
                                            </div>
                                       </div>
                                   </div>
                                   @php $all_points =  json_decode($service_detail['content']) ?? [];  @endphp
                                   @forelse($all_points as $point_id => $point)
                                  
                                   <div class="all-field-wrap lesson">
                                       <div class="form-group">
                                           
                                           <input type="text" class="form-control" name="detail_points[{{$sd_id}}][]" placeholder="{{__('add new point')}}" value="{{$point ?? ''}}">
                                       </div>
                                       <div class="action-wrap">
                                           
                                           <span class="add"><i class="ti-plus"></i></span>
                                           <span class="remove"><i class="ti-trash"></i></span>
                                       </div>
                                   </div>
                                   @empty
                                       <div class="all-field-wrap lesson">
                                           <div class="form-group">
                                               
                                               <input type="text" class="form-control" name="detail_points[{{$sd_id}}][]" placeholder="{{__('add new point')}}">
                                           </div>

                                           <div class="action-wrap">
                                               <span class="edit d-none"><a href="#"><i class="ti-pencil"></i></a></span>
                                               <span class="add"><i class="ti-plus"></i></span>
                                               <span class="remove"><i class="ti-trash"></i></span>
                                           </div>
                                       </div>
                                   @endforelse

                               </div>
                                @empty
                                <div class="curriculmn-outer-wrap">
                                <div class="curriculmn-repeater-wrap">
                                    <div class="action-wrap" style="">
                                        <span class="edit d-none"><a href="#"><i class="ti-pencil"></i></a></span>
                                        <span class="add"><i class="ti-plus"></i></span>
                                        <span class="remove"><i class="ti-trash"></i></span>
                                    </div>


                                    <div class="tab-content">

                                        <div class="tab-pane fade  show active" id="repeater_tab" role="tabpanel">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="detail_title[1]" placeholder="{{__('Title')}}">
                                            </div>
                                            <div class="form-group">
                                                <textarea class="form-control max-height-120" name="detail_description[1]" cols="30" rows="10" placeholder="{{__('Description')}}"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="detail_img[1]">{{__('Image')}}</label>
                                                <div class="media-upload-btn-wrapper">
                                                    <div class="img-wrap"></div>
                                                    <input  type="hidden"  name="detail_img[1]">
                                                    <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="{{__('Select Image')}}" data-modaltitle="{{__('Upload Image')}}" data-toggle="modal" data-target="#media_upload_modal">
                                                        {{__('Upload Image')}}
                                                    </button>
                                                </div>
                                                <small>{{__('Recommended image size 533x590')}}</small>
                                            </div>
                                            
                                        </div>

                                    </div>
                                </div>
                                <div class="all-field-wrap lesson">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="detail_points[1][]" placeholder="{{__('add new point')}}">
                                    </div>
                                    <div class="action-wrap">
                                        <span class="edit d-none"><a href="#"><i class="ti-pencil"></i></a></span>
                                        <span class="add"><i class="ti-plus"></i></span>
                                        <span class="remove"><i class="ti-trash"></i></span>
                                    </div>
                                </div>
                            </div>
                                @endforelse
                            
                        </div>
                        <div class="iconbox-repeater-wrapper dynamic-repeater">
                            <label for="additional_info" class="d-block">{{__('More Services')}} <span class="d-none"><i class="fas fa-spinner fa-spin"></i></span></label>
                            @php
                            $more_service_img = (array)json_decode($service->more_service_img)??[];
                            //print_r($more_service_img);
                            $more_service_title = (array)json_decode($service->more_service_title)??[];
                            //die();
                            $count = 0;
                            @endphp
                            @forelse($more_service_title as $mst => $title)
                            <div class="curriculmn-outer-wrap1">
                                <div class="curriculmn-repeater-wrap1">
                                    <div class="action-wrap" style="">
                                        <span class="edit d-none"><a href="#"><i class="ti-pencil"></i></a></span>
                                        <span class="add"><i class="ti-plus"></i></span>
                                        <span class="remove"><i class="ti-trash"></i></span>
                                    </div>


                                    <div class="tab-content">

                                        <div class="tab-pane fade  show active" id="repeater_tab" role="tabpanel">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="more_service_title[{{$count}}]" placeholder="{{__('Title')}}" value="{{$title ?? ''}}"  >
                                            </div>
                                            
                                            @php
                                            $img = $more_service_img[$mst];
                                            @endphp
                                            
                                            <x-media-upload :id="$img"  :name="'more_service_img['.$count.']'" :dimentions="'1920x1280'" :title="__('Image')" /> 
                                        </div>

                                    </div>
                                </div>
                                
                            </div>
                            @php
                            $count++;
                            @endphp
                            @empty
                            <div class="curriculmn-outer-wrap1">
                                <div class="curriculmn-repeater-wrap1">
                                    <div class="action-wrap" style="">
                                        <span class="edit d-none"><a href="#"><i class="ti-pencil"></i></a></span>
                                        <span class="add"><i class="ti-plus"></i></span>
                                        <span class="remove"><i class="ti-trash"></i></span>
                                    </div>


                                    <div class="tab-content">

                                        <div class="tab-pane fade  show active" id="repeater_tab" role="tabpanel">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="more_service_title[1]" placeholder="{{__('Title')}}">
                                            </div>
                                            
                                            
                                            
                                            <div class="form-group">
                                                <label for="more_service_img[1]">{{__('Icon')}}</label>
                                                <div class="media-upload-btn-wrapper">
                                                    <div class="img-wrap"></div>
                                                    <input class="form-control" type="hidden"  name="more_service_img[1]">
                                                    <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="{{__('Select Image')}}" data-modaltitle="{{__('Upload Image')}}" data-toggle="modal" data-target="#media_upload_modal">
                                                        {{__('Upload Image')}}
                                                    </button>
                                                </div>
                                                <small>{{__('Recommended image size 533x590')}}</small>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                
                            </div>  
                            @endforelse
                        </div>
                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Update Solution')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('backend.partials.media-upload.media-upload-markup')
@endsection
@section('script')
<script src="{{asset('assets/backend/js/summernote-bs4.js')}}"></script>
<script src="{{asset('assets/backend/js/bootstrap-tagsinput.js')}}"></script>
<script src="{{asset('assets/backend/js/jquery.nice-select.min.js')}}"></script>
<script>
    $(document).ready(function() {
        if ($('.nice-select').length > 0) {
            $('.nice-select').niceSelect();
        }

        $(document).on('change', 'select[name="icon_type"]', function(e) {
            e.preventDefault();
            var iconType = $(this).val();
            iconTypeFieldVal(iconType);
        });
        defaultIconType();

        function defaultIconType() {
            var iconType = $('select[name="icon_type"]').val();
            iconTypeFieldVal(iconType);
        }

        function iconTypeFieldVal(iconType) {
            if (iconType == 'icon') {
                $('input[name="img_icon"]').parent().parent().hide();
                $('input[name="icon"]').parent().show();
            } else if (iconType == 'image') {
                $('input[name="icon"]').parent().hide();
                $('input[name="img_icon"]').parent().parent().show();
            }
        }

        $('.summernote').summernote({
            height: 250, //set editable area's height
            codemirror: { // codemirror options
                theme: 'monokai'
            },
            callbacks: {
                onChange: function(contents, $editable) {
                    $(this).prev('input').val(contents);
                }
            }
        });

        $(document).on('change', '#language', function(e) {
            e.preventDefault();
            var selectedLang = $(this).val();
            $.ajax({
                url: "{{route('admin.solutions.category.by.slug')}}",
                type: "POST",
                data: {
                    _token: "{{csrf_token()}}",
                    lang: selectedLang
                },
                success: function(data) {
                    $('#category').html('');
                    $.each(data, function(index, value) {
                        $('#category').append('<option value="' + value.id + '">' + value.name + '</option>');
                    })
                }
            });
            $.ajax({
                url: "{{route('admin.solutions.price.plan.by.slug')}}",
                type: "POST",
                data: {
                    _token: "{{csrf_token()}}",
                    lang: selectedLang
                },
                success: function(data) {
                    $('#price_plan_select').html('');
                    $.each(data, function(index, value) {
                        $('#price_plan_select').append('<option value="' + value.id + '">' + value.title + '</option>');
                    });
                    $('#price_plan_select').niceSelect('update');
                }
            });
        });

        $('.icp-dd').iconpicker();
        $('.icp-dd').on('iconpickerSelected', function(e) {
            var selectedIcon = e.iconpickerValue;
            $(this).parent().parent().children('input').val(selectedIcon);
        });

    });
</script>
<script>
    (function() {
        "use strict";



        $(document).ready(function() {
            $('input[type="hidden"]').addClass("form-control");

            $(document).on('click', '.curriculmn-repeater-wrap .action-wrap .remove', function(e) {
                e.preventDefault();
                var el = $(this);
                var parent = el.parent().parent();
                var container = $('.curriculmn-outer-wrap');

                if (container.length > 1) {
                    el.show(300);
                    parent.parent().hide(300).remove();
                } else {
                    el.hide(300);
                }
            });

            $(document).on('click', '.curriculmn-repeater-wrap .action-wrap .add', function(e) {
                e.preventDefault();
                var el = $(this);
                var parent = el.parent().parent();
                var container = $('.curriculmn-repeater-wrap');
                var clonedDiv = $(this).parent().parent().parent().clone();
                var containerLength = container.length;
                var allFields = clonedDiv.find('.form-control');
                allFields.val('');
                allFields.each(function(item, index) {
                    var name = $(this).attr('name');
                    var number = name.replace(/\d+/g, containerLength + 1);
                    $(this).attr('name', number);
                });
                clonedDiv.find('.curriculmn-repeater-wrap > .action-wrap .remove').css({
                    'display': 'inline-block'
                });
                clonedDiv.find('.all-field-wrap.lesson').not(':first').remove();

                var allTab = clonedDiv.find('.tab-pane');
                allTab.each(function(index, value) {
                    var el = $(this);
                    var oldId = el.attr('id');
                    el.attr('id', oldId + containerLength);
                });
                var allTabNav = clonedDiv.find('.nav-link');
                allTabNav.each(function(index, value) {
                    var el = $(this);
                    var oldId = el.attr('href');
                    el.attr('href', oldId + containerLength);
                });
                container.parent().parent().append(clonedDiv);
                if (container.length > 0) {
                    parent.parent().find('.remove').show(300);
                }
            });

        });

        $(document).on('click', '.all-field-wrap .action-wrap .add', function(e) {
            e.preventDefault();
            var el = $(this);
            var parent = el.parent().parent();
            var container = $('.all-field-wrap');
            var clonedData = parent.clone();
            var containerLength = container.length;
            clonedData.find('#myTab').attr('id', 'mytab_' + containerLength);
            clonedData.find('#myTabContent').attr('id', 'myTabContent_' + containerLength);
            clonedData.find('.action-wrap .edit').remove();


            var allFields = clonedData.find('.form-control');
            allFields.val('');


            var allTab = clonedData.find('.tab-pane');
            allTab.each(function(index, value) {
                var el = $(this);
                var oldId = el.attr('id');
                el.attr('id', oldId + containerLength);
            });
            var allTabNav = clonedData.find('.nav-link');
            allTabNav.each(function(index, value) {
                var el = $(this);
                var oldId = el.attr('href');
                el.attr('href', oldId + containerLength);
            });

            parent.parent().append(clonedData);

            if (containerLength > 0) {
                parent.parent().find('.remove').show(300);
            }
            parent.parent().find('.iconpicker-popover').remove();
            parent.parent().find('.icp-dd').iconpicker();

        });

        $(document).on('click', '.all-field-wrap .action-wrap .remove', function(e) {
            e.preventDefault();
            var el = $(this);
            var parent = el.parent().parent();
            var container = $(this).parent().parent().parent().find('.all-field-wrap');

            if (container.length > 1) {
                el.show(300);
                parent.hide(300).remove();
            } else {
                el.hide(300);
            }
        });        
        
        $(document).ready(function() {

$(document).on('click', '.curriculmn-repeater-wrap1 .action-wrap .remove', function(e) {
    e.preventDefault();
    var el = $(this);
    var parent = el.parent().parent();
    var container = $('.curriculmn-outer-wrap1');

    if (container.length > 1) {
        el.show(300);
        parent.parent().hide(300).remove();
    } else {
        el.hide(300);
    }
});

$(document).on('click', '.curriculmn-repeater-wrap1 .action-wrap .add', function(e) {
    e.preventDefault();
    var el = $(this);
    var parent = el.parent().parent();
    var container = $('.curriculmn-repeater-wrap1');
    var clonedDiv = $(this).parent().parent().parent().clone();
    var containerLength = container.length;
    var allFields = clonedDiv.find('.form-control');
    allFields.val('');
    allFields.each(function(item, index) {
        var name = $(this).attr('name');
        var number = name.replace(/\d+/g, containerLength + 1);
        $(this).attr('name', number);
    });
    clonedDiv.find('.curriculmn-repeater-wrap1 > .action-wrap .remove').css({
        'display': 'inline-block'
    });
    clonedDiv.find('.all-field-wrap.lesson').not(':first').remove();

    var allTab = clonedDiv.find('.tab-pane');
    allTab.each(function(index, value) {
        var el = $(this);
        var oldId = el.attr('id');
        el.attr('id', oldId + containerLength);
    });
    var allTabNav = clonedDiv.find('.nav-link');
    allTabNav.each(function(index, value) {
        var el = $(this);
        var oldId = el.attr('href');
        el.attr('href', oldId + containerLength);
    });
    container.parent().parent().append(clonedDiv);
    if (container.length > 0) {
        parent.parent().find('.remove').show(300);
    }
});

});

    })(jQuery);
</script>
<script src="{{asset('assets/backend/js/dropzone.js')}}"></script>
@include('backend.partials.media-upload.media-js')
@endsection
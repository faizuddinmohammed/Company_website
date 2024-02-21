@extends('backend.admin-master')
@section('style')
<link rel="stylesheet" href="{{asset('assets/backend/css/summernote-bs4.css')}}">
<link rel="stylesheet" href="{{asset('assets/backend/css/dropzone.css')}}">
<link rel="stylesheet" href="{{asset('assets/backend/css/media-uploader.css')}}">
<link rel="stylesheet" href="{{asset('assets/backend/css/nice-select.css')}}">
<link rel="stylesheet" href="{{asset('assets/backend/css/bootstrap-tagsinput.css')}}">
@endsection
@section('site-title')
{{__('Services')}}
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
        </div>
        <x-flash-msg />
        <x-error-msg />
        <div class="col-lg-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <div class="header-wrap d-flex justify-content-between">
                        <h4 class="header-title">{{__('New Service')}}</h4>
                        <a href="{{route('admin.services')}}" class="btn btn-primary">{{__('All Services')}}</a>
                    </div>

                    <form action="{{route('admin.services')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="language">{{__('Language')}}</label>
                            <select name="lang" id="language" class="form-control">
                                <option value="">{{__('Select Language')}}</option>
                                @foreach(get_all_language() as $language)
                                <option value="{{$language->slug}}">{{$language->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title">{{__('Title')}}</label>
                            <input type="text" class="form-control" value="{{old('title')}}" name="title" placeholder="{{__('Title')}}">
                        </div>
                        <div class="form-group">
                            <label for="title">{{__('Slug')}}</label>
                            <input type="text" class="form-control" value="{{old('slug')}}" name="slug" placeholder="{{__('Slug')}}">
                        </div>
                        <div class="form-group">
                            <label for="edit_icon_type">{{__('Icon Type')}}</label>
                            <select name="icon_type" class="form-control" id="edit_icon_type">
                                <option value="icon">{{__("Font Icon")}}</option>
                                <option value="image">{{__("Image Icon")}}</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="icon" class="d-block">{{__('Icon')}}</label>
                            <div class="btn-group ">
                                <button type="button" class="btn btn-primary iconpicker-component">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </button>
                                <button type="button" class="icp icp-dd btn btn-primary dropdown-toggle" data-selected="fas fa-exclamation-triangle" data-toggle="dropdown">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu"></div>
                            </div>
                            <input type="hidden" class="form-control" id="icon" value="fas fa-exclamation-triangle" name="icon">
                        </div>
                        <div class="form-group">
                            <label for="img_icon">{{__('Image Icon')}}</label>
                            <div class="media-upload-btn-wrapper">
                                <div class="img-wrap"></div>
                                <input type="hidden" id="img_icon" name="img_icon">
                                <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="{{__('Select Image')}}" data-modaltitle="{{__('Upload Image')}}" data-toggle="modal" data-target="#media_upload_modal">
                                    {{__('Upload Image Icon')}}
                                </button>
                            </div>
                            <small>{{__('Recommended image size 60x60')}}</small>
                        </div>
                        <div class="form-group">
                            <label for="excerpt">{{__('Title 1')}}</label>
                            <textarea name="excerpt" id="excerpt" class="form-control max-height-150" placeholder="{{__('Title 1')}}" cols="30" rows="10"></textarea>
                            
                        </div>
                        <div class="form-group">
                            <label for="description">{{__('Description 1')}}</label>
                            <input type="hidden" name="description" id="description">
                            <div class="summernote"></div>
                        </div>

                        <div class="form-group">
                            <label for="excerpt2">{{__('Title 2')}}</label>
                            <textarea name="excerpt2" id="excerpt2" class="form-control max-height-150" placeholder="{{__('Title 2')}}" cols="30" rows="10"></textarea>
                            
                        </div>
                        <div class="form-group">
                            <label for="description2">{{__('Description 2')}}</label>
                            <input type="hidden" name="description2" id="description2">
                            <div class="summernote"></div>
                        </div>
                        <div class="form-group">
                            <label for="text2">{{__('Heading Middle')}}</label>
                            <textarea name="text2" id="text2" class="form-control max-height-150" placeholder="{{__('Heading Middle')}}" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="text1">{{__('Text Bottom')}}</label>
                            <textarea name="text1" id="text1" class="form-control max-height-150" placeholder="{{__('Text Bottom')}}" cols="30" rows="10"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="meta_tags">{{__('Meta Tags')}}</label>
                            <input type="text" name="meta_tags" class="form-control" value="{{old('meta_tags')}}" data-role="tagsinput" id="meta_tags">
                        </div>
                        <div class="form-group">
                            <label for="meta_description">{{__('Meta Description')}}</label>
                            <textarea name="meta_description" class="form-control" rows="5" id="meta_description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="category">{{__('Category')}}</label>
                            <select name="categories_id" id="category" class="form-control">
                                <option value="">{{__('Select Category')}}</option>
                            </select>
                            <span class="info-text">{{__('select language to get category by language')}}</span>
                        </div>
                        <div class="form-group">
                            <label for="price_plan">{{__('Price Plans')}}</label>
                            <select name="price_plan[]" multiple class="form-control nice-select wide" id="price_plan_select"> </select>
                            <span class="info-text">{{__('select language to get price plan by language')}}</span>
                        </div>

                        <div class="form-group">
                            <label for="status">{{__('Status')}}</label>
                            <select name="status" id="status" class="form-control">
                                <option value="publish">{{__('Publish')}}</option>
                                <option value="draft">{{__('Draft')}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sr_order">{{__('Order')}}</label>
                            <input type="text" class="form-control" value="{{old('sr_order')}}" name="sr_order" placeholder="{{__('eg: 1')}}">
                            <span class="info-text">{{__('if you set order for it, all service will show in frontend as a per this order')}}</span>
                        </div>
                        <div class="form-group">
                            <label for="image">{{__('Image')}}</label>
                            <div class="media-upload-btn-wrapper">
                                <div class="img-wrap"></div>
                                <input type="hidden" name="image">
                                <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="{{__('Select Service Image')}}" data-modaltitle="{{__('Upload Service Image')}}" data-toggle="modal" data-target="#media_upload_modal">
                                    {{__('Upload Image')}}
                                </button>
                            </div>
                            <small>{{__('Recommended image size 1920x1280')}}</small>
                        </div>

                        <div class="form-group">
                            <label for="banner">{{__('Banner')}}</label>
                            <div class="media-upload-btn-wrapper">
                                <div class="img-wrap"></div>
                                <input type="hidden" name="banner">
                                <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="{{__('Select Service Banner')}}" data-modaltitle="{{__('Upload Service Banner')}}" data-toggle="modal" data-target="#media_upload_modal">
                                    {{__('Upload Banner')}}
                                </button>
                            </div>
                            <small>{{__('Recommended image size 3000x1688')}}</small>
                        </div>

                        <div class="iconbox-repeater-wrapper dynamic-repeater">
                            <label for="additional_info" class="d-block">{{__('Details')}} <span class="d-none"><i class="fas fa-spinner fa-spin"></i></span></label>
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
                                                    <input class="form-control" type="hidden"  name="detail_img[1]">
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
                        </div>

                        <div class="iconbox-repeater-wrapper dynamic-repeater">
                            <label for="additional_info" class="d-block">{{__('More Services')}} <span class="d-none"><i class="fas fa-spinner fa-spin"></i></span></label>
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
                        </div>


                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Add Service')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('backend.partials.media-upload.media-upload-markup')
@endsection
@section('script')
<script src="{{asset('assets/backend/js/dropzone.js')}}"></script>
<script src="{{asset('assets/backend/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('assets/backend/js/bootstrap-tagsinput.js')}}"></script>
<script src="{{asset('assets/backend/js/summernote-bs4.js')}}"></script>
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
                url: "{{route('admin.service.category.by.slug')}}",
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
                url: "{{route('admin.service.price.plan.by.slug')}}",
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
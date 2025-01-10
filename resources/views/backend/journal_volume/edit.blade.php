@extends('layouts.master')
@section('title')
    Journal Books
@endsection
@section('content')
    <!-- page title start-->
    @component('components.breadcrumb')
        @slot('first_breadcrumb')
            Journal Books
        @endslot
        @slot('sub_breadcrumb')
            Edit
        @endslot
    @endcomponent
    <!-- page title end-->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h4 class="card-title mb-0">Edit Journal Books</h4>
                        </div>
                        <div class="col-md-6 text-end">
                            @can('volume-journal.index')
                                <a href="{{ route('admin.volume-journal.index') }}" class="btn dark-icon btn-danger"><i
                                        class="fa fa-reply"></i> Back to list</a>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <form action="{{ route('admin.volume-journal.update',$volume_journal->id) }}" method="post" id="newForm" enctype="multipart/form-data" >
                        @csrf
                        @method('PUT')
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="new-user-info">
                                                <div class="row">
                                                    <div class="mb-3 col-md-12">
                                                        <label for="title">{{ __('Journal Volume Title') }}: <strong
                                                                class="text-danger">*</strong></label>
                                                        <input id="title" type="text"  class="form-control @error('title') is-invalid @enderror"  value="{{ $volume_journal->title }}" name="title" required>
                                                        @error('title')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3 col-md-12">
                                                        <label for="writer_name">{{ __('Writer Name') }}: <strong
                                                                class="text-danger">*</strong></label>
                                                        <input id="writer_name" type="text"  class="form-control @error('writer_name') is-invalid @enderror"  value="{{ $volume_journal->writer_name }}" name="writer_name" required>
                                                        @error('writer_name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3 col-md-4">
                                                        <label for="journal_id">{{ __('Journal:') }}</label> <strong
                                                            class="text-danger">*</strong>
                                                        <select name="journal_id" required id="journal_id" class="form-control form-control-lg select2">
                                                            <option value="" selected disabled>Select Journal</option>
                                                            @forelse($journals as $journal)
                                                                <option value="{{ $journal->id }}" {{$volume_journal->journal_id == $journal->id?'selected':''}}>{{ $journal->title }}</option>
                                                            @empty
                                                            @endforelse
                                                        </select>
                                                        @error('journal_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3 col-md-4">
                                                        <label for="volume_id">{{ __('Volume:') }}</label> <strong
                                                            class="text-danger">*</strong>
                                                        <select name="volume_id" required id="volume_id" class="form-control form-control-lg select2">
                                                            <option value="" selected disabled>Select Volume</option>
                                                            @forelse($volumes as $volume)
                                                                <option value="{{ $volume->id }}" {{$volume_journal->volume_id == $volume->id?'selected':''}}>{{ $volume->title }}</option>
                                                            @empty
                                                            @endforelse
                                                        </select>
                                                        @error('volume_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3 col-md-4">
                                                        <label for="issue_id">{{ __('Issue:') }}</label> <strong
                                                            class="text-danger">*</strong>
                                                        <select name="issue_id" required id="issue_id" class="form-control form-control-lg select2">
                                                            <option value="" selected disabled>Select Volume</option>
                                                            @forelse($issues as $issue)
                                                                <option value="{{ $issue->id }}" {{$volume_journal->issue_id == $issue->id?'selected':''}}>{{ $issue->title }}</option>
                                                            @empty
                                                            @endforelse
                                                        </select>
                                                        @error('issue_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-3 col-md-12">
                                                        <label for="keywords">{{ __('Keywords') }}:</label>
                                                        <input id="keywords" type="text"  class="form-control @error('keywords') is-invalid @enderror"  value="{{ $volume_journal->keywords }}" name="keywords">
                                                        @error('keywords')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3 col-md-12">
                                                        <label for="abstract">{{ __('Abstract') }}:</label>
                                                        <textarea name="abstract" class="form-control @error('abstract') is-invalid @enderror" id="abstract" rows="5">{{ $volume_journal->abstract }}</textarea>
                                                        @error('abstract')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="mb-3">
                                                <label for="image">Attachment <strong class="text-danger">* <br><small>(JPG,JPEG,PNG,PDF only | Max: 150 MB)</small></strong></label>
                                                <input class="file-upload dropify" name="attachment" id="image" type="file" data-allowed-file-extensions="jpg jpeg png pdf"
                                                       data-default-file="{{ $volume_journal->attachment != null ? asset($volume_journal->attachment) : '' }}">
                                                @error('attachment')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3 py-4">
                                                <label>Status: <strong class="text-danger">*</strong></label> &nbsp;
                                                <div class="pretty p-icon p-round p-pulse">
                                                    <input type="radio" id="active"  name="status" value="1" {{$volume_journal->status=='1'?'checked':''}} />
                                                    <div class="state p-success">
                                                        <i class="icon mdi mdi-check"></i>
                                                        <label for="active">Published</label>
                                                    </div>
                                                </div>
                                                <div class="pretty p-icon p-round p-pulse">
                                                    <input type="radio" id="inactive"   name="status" value="0" {{$volume_journal->status=='0'?'checked':''}}/>
                                                    <div class="state p-danger">
                                                        <i class="icon mdi mdi-check"></i>
                                                        <label for="inactive">Unpublished</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="text-center my-4">
                                    <button type="submit" class="btn btn-primary rounded-1 fw-bold">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18">
                                            <path d="M12 2C17.52 2 22 6.48 22 12C22 17.52 17.52 22 12 22C6.48 22 2 17.52 2 12C2 6.48 6.48 2 12 2ZM12 20C16.42 20 20 16.42 20 12C20 7.58 16.42 4 12 4C7.58 4 4 7.58 4 12C4 16.42 7.58 20 12 20ZM13 12V16H11V12H8L12 8L16 12H13Z" fill="rgba(255,255,255,1)"></path>
                                        </svg> UPDATE
                                    </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('css')
    <link href="{{ asset('build/libs/pretty_checkbox/pretty-checkbox.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('build/libs/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('build/libs/dropify/css/dropify.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('build/libs/summernote/summernote-lite.min.css') }}" rel="stylesheet">
@endpush
@push('page_js')
    <script src="{{ asset('build/js/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('build/libs/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('build/libs/dropify/js/dropify.min.js') }}"></script>
    <script src="{{ asset('build/libs/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('build/libs/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('build/js/pages/form-pickers.init.js') }}"></script>
    <script src="{{ asset('build/libs/summernote/summernote-lite.min.js') }}"></script>
@endpush
@push('page_script')
    <script>

        $(document).ready(function() {
            $('.select2').select2();
            $('.dropify').dropify();
        });


        $().ready(function() {
            var validator = $("#newForm").validate({
                ignore: ".ql-container *",
                messages: {
                    title: {
                        required: 'Title is required'
                    },
                    writer: {
                        required: 'Writer is required'
                    },
                    journal_id: {
                        required: 'Journal is required'
                    },
                    volume_id: {
                        required: 'Volume is required'
                    },
                    issue_id: {
                        required: 'Issue is required'
                    }
                }
            });
            $(".cancel").click(function() {
                validator.resetForm();
            });
        });

        $(function () {
            $(document).on('change','#journal_id',function () {
                var journal_id = $(this).val();

                // ajax
                $.ajax({
                    type:"GET",
                    {{--url: "{{url('/product/get-subcategory-by-category')}}",--}}
                    // or
                    url: "{{route('admin.get-volume')}}",
                    data: {id:journal_id},
                    dateType: "JSON",
                    success: function (response) {
                        console.log(response)
                        var volume_section = $('#volume_id');
                        volume_section.empty();
                        var option = '<option value="" selected disabled>Select Volume</option>';
                        $.each(response, function (key, value){
                            option+= '<option value="'+value.id+'">'+value.title+'</option>'
                        })

                        volume_section.append(option);
                        $("#volume_id").attr('disabled',false);

                    }
                });
            })
            $(document).on('change','#volume_id',function () {
                var volume_id = $(this).val();
                console.log(volume_id)

                // ajax
                $.ajax({
                    type:"GET",
                    {{--url: "{{url('/product/get-subcategory-by-category')}}",--}}
                    // or
                    url: "{{route('admin.get-issue')}}",
                    data: {id:volume_id},
                    dateType: "JSON",
                    success: function (response) {
                        console.log(response)
                        var issue_section = $('#issue_id');
                        issue_section.empty();
                        var option = '<option value="" selected disabled>Select Issue</option>';
                        $.each(response, function (key, value){
                            option+= '<option value="'+value.id+'">'+value.title+'</option>'
                        })

                        issue_section.append(option);
                        $("#issue_id").attr('disabled',false);

                    }
                });
            })
        })


    </script>
@endpush

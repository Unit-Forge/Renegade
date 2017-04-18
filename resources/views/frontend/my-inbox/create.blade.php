@extends('frontend.layouts.app')

@section('after-styles')
    <link href="/plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="row">

        <div class="col-xs-12">

            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('navs.frontend.my-inbox.create') }}</div>

                <div class="panel-body">
                    <h3>Compose new message</h3>
                    <hr>
                    <form action="{{route('frontend.user.inbox.store')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="autocomplete" class="control-label">Users</label>
                            <select name="autocomplete[]" multiple id="names" class="form-control"></select>
                        </div>

                        <div class="form-group">
                            <label for="subject" class="control-label">Subject</label>
                            <input type="subject" class="form-control" name="subject">
                        </div>

                        <div class="form-group">
                            <label for="message" class="control-label">Message</label>
                            <textarea name="message"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="files" class="control-label">Files</label>
                            <input type="file" name="file[]" accept="media_type" multiple>
                        </div>

                        <div class="form-group pull-right">
                            <input type="submit" class="btn btn-primary">
                        </div>

                    </form>
                </div><!--panel body-->

            </div><!-- panel -->

        </div><!-- col-xs-12 -->

    </div><!-- row -->
@endsection

@section('after-scripts')
    <script type="text/javascript" src="/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
    <!-- Select2 -->
    <script src="/plugins/select2/select2.full.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            CKEDITOR.replace( 'message', {
                height: 400
            });
        });
        $('#names').select2({
            placeholder: 'Search Users',
            minimumInputLength: 3,
            ajax: {
                url: '/autocomplete/users',
                dataType: 'json',
                data: function (params) {
                    return {
                        q: params.term
                    };
                },
                results: function (data, page) {
                    return {results: data};
                }
            },
        });
    </script>
@endsection
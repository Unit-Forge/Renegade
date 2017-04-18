@extends('frontend.layouts.app')

@section('after-styles')
    <link href="/plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="row">

        <div class="col-xs-3">

            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>Participants</h3>
                    @foreach($thread->participants as $par)
                        <div class="media">
                            <div class="media-left">
                                <a href="/roster/{{$par->user->id}}">
                                    <img class="media-object img-circle"  src="{{$par->user->getAvatar()}}" style="max-height: 40px; max-width: 40px;">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="/roster/{{$par->user->id}}">{{$par->user->name}}</a></h4>
                                <p><small>Last Viewed: {{(null !== $par->last_read) ? $par->last_read->diffForHumans() : "Unread"}}</small></p>
                            </div>
                        </div>
                    @endforeach
                    <br>
                    <form action="{{route('frontend.user.inbox.update',$thread->id)}}" method="post">
                        <input type="hidden" name="_method" value="put">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="autocomplete_add" class="control-label">Users</label>
                            <select name="autocomplete_add[]" multiple id="names" class="form-control"></select>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="action" value="addUsers">
                            <input type="submit" class="btn btn-xs btn-success" value="Add Participants">
                        </div>
                    </form>
                    <hr>
                    @include('frontend.my-inbox.includes.sidebar')
                </div><!--panel body-->

            </div><!-- panel -->

        </div><!-- col-xs-3 -->


        <div class="col-xs-9">

            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('navs.frontend.my-inbox.edit') }}</div>

                <div class="panel-body">
                    <h3>{!! $thread->subject !!}</h3>
                    <h4>Edit Message</h4>
                    <form action="{{route('frontend.user.inbox.edit.message.update',$message->id)}}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="put">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="message" class="control-label">Message</label>
                            <textarea name="body"> {!! \Crypt::decrypt($message->body) !!}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="files" class="control-label">Files</label>
                            <input type="file" name="file[]" accept="media_type" multiple>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group pull-right">
                            <input type="submit" class="btn btn-primary">
                        </div>
                    </form>
                </div><!--panel body-->

            </div><!-- panel -->

        </div><!-- col-xs-9 -->

    </div><!-- row -->
@endsection

@section('after-scripts')
    <script type="text/javascript" src="/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
    <!-- Select2 -->
    <script src="/plugins/select2/select2.full.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            CKEDITOR.replace( 'body', {
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
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
                <div class="panel-heading">{{ trans('navs.frontend.my-inbox.show') }}</div>

                <div class="panel-body">
                    <h3>{!! $thread->subject !!}</h3>

                    @foreach($thread->messages as $message)
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img src="{{$message->user->getAvatar()}}" alt="{!! $message->user->name !!}" style="max-width: 100px; max-height: 100px;" class="img-circle">
                            </a>
                            <div class="media-body">
                                <h5 class="media-heading"><strong>{!! $message->user->name !!}</strong></h5>
                                {!! \Crypt::decrypt($message->body) !!}
                                {!! $message->user->signature or '' !!}
                                <br>
                                @if($message->getMedia('attachments')->count())

                                    <div class="attachment">
                                        <h4>Attachment</h4>
                                        @foreach($message->getMedia('attachments') as $attachment)
                                            <a href="{{$attachment->getUrl()}}"><i class="fa fa-unlink"></i> {{$attachment->file_name}}</a><br>
                                        @endforeach
                                    </div>

                                @endif


                                <div class="text-muted"><small>Posted {!! $message->created_at->diffForHumans() !!} {{($message->created_at != $message->updated_at) ? '| Edited '.$message->updated_at->diffForHumans() : ''}}</small></div>
                                @if($user->id == $message->user->id)
                                    <small><a href="{{route('frontend.user.inbox.edit.message',$message->id)}}">Edit Message</a></small>
                                @endif
                            </div>
                        </div>
                        <hr>
                    @endforeach
                    <h2>Add a new message</h2>
                    <form action="{{route('frontend.user.inbox.update',$thread->id)}}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="put">
                        <input type="hidden" name="action" value="AddReply">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="message" class="control-label">Message</label>
                            <textarea name="message"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="files" class="control-label">Files</label>
                            <input type="file" name="file[]" accept="media_type" multiple>
                        </div>
                        <!-- Submit Form Input -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
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
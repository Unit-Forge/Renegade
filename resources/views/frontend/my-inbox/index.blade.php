@extends('frontend.layouts.app')

@section('content')
    <div class="row">

        <div class="col-xs-12">

            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('navs.frontend.my-inbox.inbox') }}</div>

                <div class="panel-body">
                    <form action="{{route('frontend.user.inbox.removeThreads')}}" method="post">
                        {{csrf_field()}}
                        <div class="mailbox-controls">
                            <!-- Check all button -->
                            <div class="btn-group">
                                <a href="{{route('frontend.user.inbox.create')}}" class="btn btn-default btn-sm"><i class="fa fa-pencil-square-o "></i></a>
                                <button class="btn btn-default btn-sm" type="submit"><i class="fa fa-trash-o"></i></button>
                            </div><!-- /.btn-group -->
                        </div>
                        <div class="mailbox-messages">
                            <table class="table table-hover table-striped">
                                <tr>
                                    <td></td>
                                    <td class="mailbox-name">{{ trans('strings.frontend.my-inbox.table.creator') }}</td>
                                    <td class="mailbox-subject">{{ trans('strings.frontend.my-inbox.table.subject') }}</td>
                                    <td class="mailbox-date">{{ trans('strings.frontend.my-inbox.table.last_response') }}</td>
                                </tr>
                                <tbody>
                                @if($threads->count() > 0)
                                    @foreach($threads as $thread)
                                        <tr class="{{($thread->isUnread($user->id) == true) ? 'info' : ''}}">
                                            <td class="col-lg-1"><input type="checkbox" name="delete[{{$thread->id}}]" value="{{$thread->id}}"/></td>
                                            <td class="mailbox-name col-lg-3"><img class="img-circle" style="max-height: 30px; max-width: 30px;" src="{{$thread->creator()->getAvatar()}}">   <a href="{{route('frontend.user.inbox.show',$thread->id)}}">{{$thread->creator()->name}}</a></td>
                                            <td class="mailbox-subject col-lg-6"><a href="{{route('frontend.user.inbox.show',$thread->id)}}">{{$thread->subject}}</a></td>
                                            <td class="mailbox-date col-lg-2">{{$thread->latestMessage->user->name}}<br> {{$thread->latestMessage->updated_at->diffForHumans()}}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td class="mailbox-name">No Messages Found</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table><!-- /.table -->
                        </div>
                    </form>
                    <div class="text-center">
                        {!! $threads->render() !!}
                    </div>
                </div>

                </div><!--panel body-->

            </div><!-- panel -->

        </div><!-- col-xs-12 -->

    </div><!-- row -->
@endsection
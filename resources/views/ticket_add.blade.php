@section('title')
    提交新工单
@stop
@include('header')
@include('nav')

@if(Auth::user())
    <section class="container grid-960">
        <div class="container">
            <div class="columns">
                <div class="column col-3 col-md-12">
                    @include("sidebar")
                </div>
                <div class="column col-9 col-md-12">
                    <div class="item-title">
                        您的工单提问共 <b>{{Auth::user()->ticket->count()}}</b> 个
                        <a href="/my_ticket/new" class="new_ticket_btn"> 提交新工单</a>
                    </div>

                    <div class="padding-30 card">
                        {!!  Form::open(['url'=>'/my_ticket/new']) !!}
                        <div class="form-group">
                            {!! Form::label('标题',null,["class"=>"form-label"]) !!}
                            {!! Form::text('title',null,["class"=>"form-input"]) !!}
                            {!! Form::label('正文（支持HTML）',null,["class"=>"form-label"]) !!}
                            {!! Form::textarea('content',null,["class"=>"form-input"]) !!}
                        </div>
                        <div class="form-group" style="margin-top: 20px;">
                            {!! Form::submit('提交工单',["class"=>"btn btn-default"]) !!}
                        </div>
                        {!!  Form::close() !!}
                    </div>



                    <div class="host-tips toast">
                        {!! \App\Setings::whereRaw("name='ticket_text'")->first()->value !!}
                    </div>

                </div>

            </div>
        </div>
    </section>
@else
    <section class="container grid-960">
        <div class="card user-info">
            <div class="empty">
                <div class="empty-icon">
                    <i class="icon icon-people"></i>
                </div>
                <h4 class="empty-title">您还没有登录</h4>
                <p class="empty-subtitle">您还没有登录系统，请登录之后再进行操作哦！</p>
                <div class="empty-action">
                    <a href="/auth/login" class="btn btn-primary">登录</a>
                    <a href="/auth/resigter" class="btn">注册</a>
                </div>
            </div>
        </div>
    </section>

@endif
@include('footer')
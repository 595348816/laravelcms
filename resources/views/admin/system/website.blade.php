@extends('admin.layouts.app')

@section('content')
    <form method="post" action="{{ route('admin.system.store') }}">
        {{ csrf_field() }}
        <div class="layui-fluid">
        <div class="layui-row layui-col-space15">
            <div class="layui-col-md12">
                <div class="layui-card">
                    <div class="layui-tab layui-tab-card">
                        <ul class="layui-tab-title">
                            @foreach($groups as $group)
                                @if ($group['selected'])
                                    <li class="layui-this">{{ $group['name'] }}</li>
                                    @else
                                    <li>{{ $group['name'] }}</li>
                                @endif
                            @endforeach
                        </ul>
                        <div class="layui-tab-content">
                            @foreach($groups as $group)
                                <div class="layui-tab-item @if ($group['selected']) layui-show @endif">
                                    @foreach($group['value'] as $value)
                                        <div class="layui-form-item">
                                            <label class="layui-form-label">{{ $value->title }}</label>
                                            <div class="layui-input-block">
                                                <input type="text" name="{{ $value->name }}" value="{{$value->value}}" class="layui-input">
                                                 @if( !empty($value->describe))
                                                    <div class="layui-form-mid layui-word-aux">{{ $value->describe }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                        <div class="layui-form-item">
                            <div class="layui-input-block">
                                <button class="layui-btn" lay-submit>确认保存</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
@stop

@section('js')
    <script>
        layui.use(['index', 'set'])
    </script>
@stop
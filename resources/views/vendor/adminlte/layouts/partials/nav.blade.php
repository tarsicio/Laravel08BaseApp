<div id="navigation" class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>                
            </div>
            <div class="navbar-collapse collapse">                
                <ul class="nav navbar-nav">
                    <li class="active"><a href="{{ url('/') }}" class="smoothScroll">{{ trans('message.home_1') }}</a></li>                    
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if (config('local.status') && count(config('local.languages')) > 1)                        
                            @foreach (array_keys(config('local.languages')) as $lang)
                                @if ($lang != App::getLocale())
                                   <li><a href="{!! route('idioma.cambioLenguaje', $lang) !!}">
                                            <b>{!! $lang !!} <small>{!! $lang !!}</small></b>
                                    </a></li>
                                @endif
                            @endforeach                        
                    @endif
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">{{ trans('message.login') }}</a></li>
                        <li><a href="{{ url('/register') }}">{{ trans('message.register') }}</a></li>
                    @else
                        <li><a href="{{ url('/dashboard') }}">{{ Auth::user()->name }}</a></li>
                    @endif
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
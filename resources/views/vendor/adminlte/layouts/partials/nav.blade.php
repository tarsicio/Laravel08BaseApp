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
                    @if (config('locale.status') && count(config('locale.languages')) > 1)                        
                            @foreach (array_keys(config('locale.languages')) as $lang)
                                @if ($lang != App::getLocale())
                                   <li><a href="{!! route('idioma.cambioLenguaje', $lang) !!}">
                                            <b>{!! $lang !!} <small>{!! $lang !!}</small></b>
                                            @if ($lang == 'en')
                                                <img src="{{ url ('/banderas/us.png') }}" class="user-image" alt="Bandera Image"/>
                                            @else
                                                <img src="{{ url ('/banderas/es.png') }}" class="user-image" alt="Bandera Image"/>
                                            @endif
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

@if(config('setting.homepage') == 1)

    @include('frontend.includes.header1')

@endif
@if(config('setting.homepage') == 2)

    @include('frontend.includes.header2')

@endif   
@if(config('setting.homepage') == 3)

    @include('frontend.includes.header3')

@endif    
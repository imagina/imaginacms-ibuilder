@if(isset($layout) && isset($layout->options))
    @php
        $options = $layout->options;
    @endphp

    @if(!empty($options['customJs']))
        {!! $options['customJs'] !!}
    @endif
    <style>
        :root {
            @if(!empty($options['brandPrimary']))
                --primary: {{ $options['brandPrimary'] }};
            @endif
            @if(!empty($options['brandSecondary']))
                --secondary: {{ $options['brandSecondary'] }};
            @endif
            @if(!empty($options['brandTertiary']))
                --tertiary: {{ $options['brandTertiary'] }};
            @endif
            @if(!empty($options['brandQuaternary']))
                --quaternary: {{ $options['brandQuaternary'] }};
        @endif
        }

        @if(!empty($options['customCss']))
            {!! $options['customCss'] !!}
        @endif
    </style>
@endif
<div class="breadcrumbs noPrint" id="breadcrumbs">
    <ul class="breadcrumb" style="background-color: #fff">
        <li>
            <i class="fa fa-home" aria-hidden="true"></i>

            <a href="javascript:void(0)">{{$module?? ""}} </a>
        </li>
        @if(isset($title))
            <li class="fa fa-angle-right">
                <a href="javascript:void(0)">{{$title??""}} </a>
            </li>
        @endif
        <li class="pull-right" style="margin-right: 5px;">
            @if(isset($link_page_url) && isset($link_page_name))

                <a class=" btn btn-xs green" href="{{route($link_page_url)}}">
                    @if(isset($link_page_url))
                        {!!  $link_page_icon!!}
                    @endif
                    {{get_phrase($link_page_name)}}
                </a>
            @endif
        </li>
        @if(isset($second_link_page_url) && isset($second_link_page_url))
            <li class="pull-right" style="margin-right: 5px;">
                @if(isset($second_link_page_url) && isset($second_link_page_name))

                    <a class=" btn btn-xs green" href="{{route($second_link_page_url)}}">
                        @if(isset($second_link_page_url))
                            {!!  $second_link_page_icon!!}
                        @endif
                        {{get_phrase($second_link_page_name)}}
                    </a>
                @endif
            </li>
        @endif
    </ul>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<ul class="as-pagination">


    <li><a href="{{ $paginator->previousPageUrl() }}"><i class="fa fa-angle-left"></i></a></li>



    @foreach($elements as $element)

        @foreach($element as $page => $url)

        @if($paginator->currentPage()==$page)
                <li class="active"><a href="{{ $url }}">{{ $page }}</a></li>
            @else
                <li><a href="{{ $url }}">{{ $page }}</a></li>
            @endif
        @endforeach
    @endforeach



    <li><a  href="{{ $paginator->nextPageUrl() }}"><i class="fa fa-angle-right"></i></a></li>


    
    
</ul>
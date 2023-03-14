<form class="form-horizontal poststars" action="{{ $route }}" id="addStar" method="POST">
    {{ csrf_field() }}
    <div class="form-group required">
        <div class="col-sm-12">
            @for ($i = 1; $i < 6; $i++)
                <input class="star star-{{ $i }}" value="{{ $i }}" id="star-{{ $i }}" type="radio" name="star" onchange="addStar.submit();" {{ $i == $puntaje ? 'checked' : '' }} />
            @endfor
        </div>
    </div>
</form>

<style>
    .rating {
    display: flex;
    flex-direction: row-reverse;
    justify-content: center
}

.rating>input {
    display: none
}

.rating>label {
    position: relative;
    width: 1em;
    font-size: 30px;
    font-weight: 300;
    color: #FFD600;
    cursor: pointer
}

.rating>label::before {
    content: "\2605";
    position: absolute;
    opacity: 0
}

.rating>label:hover:before,
.rating>label:hover~label:before {
    opacity: 1 !important
}

.rating>input:checked~label:before {
    opacity: 1
}

.rating:hover>input:checked~label:before {
    opacity: 0.2
}
</style>

<form class="form-horizontal poststars" action="{{ $route }}" id="addStar" method="POST">
    {{ csrf_field() }}
    <div class="form-group required">
        <div class="col-sm-12 rating">
            @for ($i = 1; $i < 6; $i++)
                <input class="star star-{{ $i }}" value="{{ $i }}" id="star-{{ $i }}" type="radio" name="star" onchange="addStar.submit();" {{ $i == $puntaje ? 'checked' : '' }} />
                <label class="star star-{{ $i }}" for="star-{{ $i }}">☆</label>
            @endfor
        </div>
    </div>
</form>
<form class="form-horizontal poststars" action="{{ $route }}" id="addStar" method="POST">
    {{ csrf_field() }}
    <div class="form-group required">
        <div class="col-sm-12">
            <input class="star star-1" value="1" id="star-1" type="radio" name="star" onchange="addStar.submit();" />
            <label class="star star-1" for="star-1"></label>
            <input class="star star-2" value="2" id="star-2" type="radio" name="star" onchange="addStar.submit();" />
            <label class="star star-2" for="star-2"></label>
            <input class="star star-3" value="3" id="star-3" type="radio" name="star" onchange="addStar.submit();" />
            <label class="star star-3" for="star-3"></label>
            <input class="star star-4" value="4" id="star-4" type="radio" name="star" onchange="addStar.submit();" />
            <label class="star star-4" for="star-4"></label>
            <input class="star star-5" value="5" id="star-5" type="radio" name="star" onchange="addStar.submit();" />
            <label class="star star-5" for="star-5"></label>
        </div>
    </div>
</form>

<script>
    $('#addStar').change('.star', function(e) {
        $(this).submit();
    });
</script>

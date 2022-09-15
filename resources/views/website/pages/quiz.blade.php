@extends('website.layouts.app')
@section('contents')
<div class="col-sm-2"></div>
<div class="col-12" style="margin-top: 70px">
    <div id="quiz-section" class="quiz-title bg-dark">
        <h1 class="text-light text-center">Quiz</h1>
    </div>

    <div class="quiz-content">
        <form method="post" action="">
            <fieldset>
                <h6>What is Your Favorite Pet?</h6>
                <input type="checkbox" name="favorite_pet" value="Cats">
                <span class="mr-1">Cats</span><br>
                <input type="checkbox" name="favorite_pet" value="Dogs">
                <span class="mr-1">Dogs</span><br>
                <input type="checkbox" name="favorite_pet" value="Birds">
                <span class="mr-1">Birds</span><br>
                <br>
            </fieldset>
            <fieldset>
                <h6>What is Your Favorite Pet?</h6>
                <input type="checkbox" name="favorite_pet" value="Cats">
                <span class="mr-1">Cats</span><br>
                <input type="checkbox" name="favorite_pet" value="Dogs">
                <span class="mr-1">Dogs</span><br>
                <input type="checkbox" name="favorite_pet" value="Birds">
                <span class="mr-1">Birds</span><br>
                <br>
            </fieldset>

            <fieldset>
                <h6>What is Your Favorite Pet?</h6>
                <input type="checkbox" name="favorite_pet" value="Cats">
                <span class="mr-1">Cats</span><br>
                <input type="checkbox" name="favorite_pet" value="Dogs">
                <span class="mr-1">Dogs</span><br>
                <input type="checkbox" name="favorite_pet" value="Birds">
                <span class="mr-1">Birds</span><br>
                <br>
            </fieldset>

            <fieldset>
                <h6>What is Your Favorite Pet?</h6>
                <input type="checkbox" name="favorite_pet" value="Cats">
                <span class="mr-1">Cats</span><br>
                <input type="checkbox" name="favorite_pet" value="Dogs">
                <span class="mr-1">Dogs</span><br>
                <input type="checkbox" name="favorite_pet" value="Birds">
                <span class="mr-1">Birds</span><br>
                <br>
            </fieldset>

            <input type="submit" class="btn btn-success" value="Submit now" />
        </form>
    </div>
</div>
@endsection
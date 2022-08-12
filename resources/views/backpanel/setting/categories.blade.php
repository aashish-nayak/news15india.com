<select class="single-select" required name="@isset($name){{$name}}@else{{'home_sections[]'}}@endisset">
    @foreach ($categories as $category)
    <option value="{{$category->id}}" @if(isset($edit) && $category->id==$edit) selected @endif>{{$category->cat_name}}</option>
    @endforeach                                           
</select>
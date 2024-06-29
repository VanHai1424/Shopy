@foreach ($colors as $item)
    <label class="btn text-{{$item->name}}">
        <input type="radio" value="{{$item->id}}" name="color" id="option-2-1" >
    </label>
@endforeach
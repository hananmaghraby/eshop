<select class="shipping_select" name="region">
    @if ($regions->first()->parent()->exists())
        <option class="reset">Reset</option>
    @endif
    <option class="not_selected" selected>Not Selected</option>
    @foreach ($regions as $region)
        <option data-value="{{ $region->id }}" aria-invalid="{{ $region->id }}" @if (!$region->children) value="{{ $region->id }}" @endif>{{ $region->name }}</option>
    @endforeach
</select>
<!-- just a single file without a class-->
@props(['value' => '=', 'type' => 'ok'])

<div {{ $attributes->merge(['class' => 'alert alert-'.$type]) }}>
    <input type="submit" class="btn btn-primary" value="{{ $value}}"/>
</div>
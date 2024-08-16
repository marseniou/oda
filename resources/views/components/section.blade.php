
<section {{$attributes->merge(['class' =>"flex flex-col justify-center bg-secondary-content"])}} id="{{$hashtag}}">
    <div class="container mx-auto md:w-3/5 xl:w-2/3">
        {{$slot}}
    </div>
</section>
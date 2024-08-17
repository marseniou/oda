
<section {{$attributes->merge(['class' =>"flex flex-col justify-center bg-secondary-content"])}} id="{{$hashtag}}">
    <div class="container mx-auto w-96 md:w-2/3 xl:w-3/5">
        {{$slot}}
    </div>
</section>
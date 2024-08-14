<div
  class="hero min-h-screen"
  style="background-image: url({{URL::to('/')}}/{{$image->value}});">
  <div class="hero-overlay bg-opacity-60"></div>
  <div class="hero-content text-neutral-content text-center">
    <div class="max-w-md">
      <h1 class="title mb-5 text-5xl font-bold">{{$name->value}}</h1>
      <p class="mb-5">
        {{$description->value}}
      </p>
      <button class="btn btn-primary">Get Started</button>
    </div>
  </div>
</div>
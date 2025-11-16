<header class="p-3 bg-dark text-white">
        <div class="row">
            <div class="col">
                <a class="text-light text-decoration-none" href="{{ url('/') }}"><h3>Blog {{ $title ?? 'Saruj'}}</h3></a>
                
            </div>
            <div class="col">
                <div class="d-flex justify-content-center gap-3">
                    <a class="text-light text-decoration-none" href="{{ route('posts.index') }}">Home</a>
                    <a class="text-light text-decoration-none" href="">About</a>
                    <a class="text-light text-decoration-none" href="{{ route('contact.form') }}">Contact</a>
                </div>
            </div>
        </div>
    </header>
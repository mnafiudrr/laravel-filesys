@extends('layouts.master')

@section('content')
    @php
        $paths = explode('/', str_replace($main_path, '', $file_path));
    @endphp
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">
            <a href="{{ route('find') }}">
                Root
            </a>
            @if ($paths[0] != '')
                /
            @endif
            @foreach ($paths as $idx => $path)
                @php
                  $this_path = '';
                  for ($i=0; $i < $idx+1; $i++) { 
                    $this_path .= $paths[$i];
                    if($i != $idx) $this_path .= '/';
                  }
                @endphp
                @if ($idx != count($paths) - 1)
                    <a href="{{ route('find') }}?path={{ $this_path }}">
                        {{ $path }}
                    </a> /
                @else
                </span>
                <a href="{{ route('find') }}?path={{ $this_path }}">
                    {{ $path }}
                </a>
                @endif
        @endforeach
    </h4>



    <div class="col-12">
      <div class="card">
          {{-- <h5 class="card-header">Vertical & Horizontal Scrollbars</h5> --}}
            {{-- <div class="card-body"> --}}
                @if ($type == 'image')
                    <img src="{{ route('uploads.index', [
                        'path' => str_replace($main_path, '', $file_path)
                    ]) }}" alt="scrollbar-image" />
                @elseif ($type == 'video')
                    <video controls>
                        <source src="{{ route('uploads.index', [
                        'path' => str_replace($main_path, '', $file_path)
                    ]) }}" type="video/mp4">
                        <source src="{{ route('uploads.index', [
                        'path' => str_replace($main_path, '', $file_path)
                    ]) }}" type="video/ogg">
                      Your browser does not support the video tag.
                    </video>
                @endif
            {{-- </div> --}}
      </div>
    </div>
@endsection



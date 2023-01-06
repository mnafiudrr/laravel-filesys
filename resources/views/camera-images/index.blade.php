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
                    for ($i = 0; $i < $idx + 1; $i++) {
                        $this_path .= $paths[$i];
                        if ($i != $idx) {
                            $this_path .= '/';
                        }
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


    <div class="card mb-4">
        <h5 class="card-header">List</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <small class="text-light fw-semibold">Folders</small>
                    <div class="demo-inline-spacing mt-3">
                        <ul class="list-group">
                            @foreach ($dirs as $dir)
                                <a
                                    href="{{ route('find', [
                                        'path' => str_replace($main_path, '', $dir),
                                    ]) }}">
                                    <li class="list-group-item d-flex align-items-center">
                                        <i
                                            class='bx bxs-folder'></i>{{ str_replace('/', '', str_replace($file_path, '', $dir)) }}
                                    </li>
                                </a>
                            @endforeach
                        </ul>
                    </div>
                </div>
                {{-- <div class="col-lg-6">
                    <small class="text-light fw-semibold">Files</small>
                    <div class="demo-inline-spacing mt-3">
                        <ul class="list-group">
                            @foreach ($files as $file)
                                <a
                                    href="{{ route('file.file-open', [
                                        'path' => str_replace($main_path, '', $file),
                                    ]) }}">
                                    <li class="list-group-item d-flex align-items-center">
                                        {{ str_replace('/', '', str_replace($file_path, '', $file)) }}
                                    </li>
                                </a>
                            @endforeach
                        </ul>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>


    <div class="row mb-5">
        @foreach ($files as $file)
            <div class="col-md-6 col-lg-4 mb-3">
                <div class="card h-100">
                  <a class="card h-100" href="{{ route('file.file-open', ['path' => str_replace($main_path, '', $file) ]) }}">
                    <div class="card-body">
                      <h5 class="card-title">{{ str_replace('/', '', str_replace($file_path, '', $file)) }}</h5>
                      {{-- <h6 class="card-subtitle text-muted">Support card subtitle</h6> --}}
                    </div>
                  </a>
                    <a class="card h-100" href="{{ route('file.file-open', ['path' => str_replace($main_path, '', $file) ]) }}">
                    @if (explode('/', getMimeType($file))[0] == 'image')
                        <img class="img-fluid"
                            src="{{ route('uploads.index', [
                                'path' => str_replace($main_path, '', $file),
                            ]) }}"
                            alt="Card image cap" style="height:450px; width: 450px;   background-position: center center;" />
                    @elseif (explode('/', getMimeType($file))[0] == 'video')
                    
                      <video class="img-fluid" preload="metadata">
                        <source src="{{ route('uploads.index', [
                        'path' => str_replace($main_path, '', $file)
                    ]) }}" type="video/mp4">
                    </video>
                    @endif
                    </a>
                    <div class="card-body">
                        <p class="card-text">Bear claw sesame snaps gummies chocolate.</p>
                        <a href="javascript:void(0);" class="card-link">Card link</a>
                        <a href="javascript:void(0);" class="card-link">Another link</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection


@php
    function getMimeType($filename)
    {
        $idx = explode('.', $filename);
        $count_explode = count($idx);
        $idx = strtolower($idx[$count_explode - 1]);
    
        $mimet = [
            'txt' => 'text/plain',
            'htm' => 'text/html',
            'html' => 'text/html',
            'php' => 'text/html',
            'css' => 'text/css',
            'js' => 'application/javascript',
            'json' => 'application/json',
            'xml' => 'application/xml',
            'swf' => 'application/x-shockwave-flash',
            'flv' => 'video/x-flv',
            'mkv' => 'video/mkv',
            'mp4' => 'video/mp4',
    
            // images
            'png' => 'image/png',
            'jpe' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'jpg' => 'image/jpeg',
            'gif' => 'image/gif',
            'bmp' => 'image/bmp',
            'ico' => 'image/vnd.microsoft.icon',
            'tiff' => 'image/tiff',
            'tif' => 'image/tiff',
            'svg' => 'image/svg+xml',
            'svgz' => 'image/svg+xml',
    
            // archives
            'zip' => 'application/zip',
            'rar' => 'application/x-rar-compressed',
            'exe' => 'application/x-msdownload',
            'msi' => 'application/x-msdownload',
            'cab' => 'application/vnd.ms-cab-compressed',
    
            // audio/video
            'mp3' => 'audio/mpeg',
            'qt' => 'video/quicktime',
            'mov' => 'video/quicktime',
    
            // adobe
            'pdf' => 'application/pdf',
            'psd' => 'image/vnd.adobe.photoshop',
            'ai' => 'application/postscript',
            'eps' => 'application/postscript',
            'ps' => 'application/postscript',
    
            // ms office
            'doc' => 'application/msword',
            'rtf' => 'application/rtf',
            'xls' => 'application/vnd.ms-excel',
            'ppt' => 'application/vnd.ms-powerpoint',
            'docx' => 'application/msword',
            'xlsx' => 'application/vnd.ms-excel',
            'pptx' => 'application/vnd.ms-powerpoint',
    
            // open office
            'odt' => 'application/vnd.oasis.opendocument.text',
            'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
        ];
    
        if (isset($mimet[$idx])) {
            return $mimet[$idx];
        } else {
            return 'application/octet-stream';
        }
    }
@endphp

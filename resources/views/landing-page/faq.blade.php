@extends('layouts.landing-page')

@section('content')
   <section id="product" class="padding-large overflow-hidden mt-5">
        <div class="container" style="max-width: 900px;">
            <div class="row">
                <div class="section-header text-center">
                    <h2 class="section-title under">Frequently Asked Question</h2>
                </div><br>
                <div class="container">
                    <div class="accordion" id="accordionExample">
                        @foreach ($faq as $item)
                            @php
                                $collapseId = 'collapse' . $loop->index;
                                $headingId = 'heading' . $loop->index;
                            @endphp
                            <div class="accordion-item mt-3" style="background-color: #9d7a56; color:#000">
                                <h2 class="accordion-header" id="{{ $headingId }}">
                                    <button class="accordion-button {{ $loop->first ? '' : 'collapsed' }}" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#{{ $collapseId }}"
                                        aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                                        aria-controls="{{ $collapseId }}">
                                        {{ $item->faq_quest }}
                                    </button>
                                </h2>
                                <div id="{{ $collapseId }}"
                                    class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                                    aria-labelledby="{{ $headingId }}" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <strong>{{ $item->faq_quest }}</strong>
                                        <p>{{ $item->faq_answ }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
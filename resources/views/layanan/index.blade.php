@extends('layouts.main')

@section('content')
    <section class="counts section-bg">
        <div class="section-title">
            <h2>Layanan</h2>
        </div>
        <div class="container">
            <div class="row">
                @foreach ($layanans as $layanan)
                    <div class="col-lg-4">
                        <div class="accordion" id="accordionExample{{ $layanan->id }}">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse{{ $layanan->id }}" aria-expanded="true"
                                        aria-controls="collapse{{ $layanan->id }}">
                                        {{ $layanan->layanan }}
                                    </button>
                                </h2>
                                <div id="collapse{{ $layanan->id }}" class="accordion-collapse collapse show"
                                    data-bs-parent="#accordionExample{{ $layanan->id }}">
                                    <div class="accordion-body">
                                        {!! $layanan->persyaratan !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

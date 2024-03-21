@extends('template.layout')

@push('style')

@endpush

@section('content')
<section>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">About This Page!</h3>
                <h4 class="card-titke">Title</h4>
                <h6>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, saepe aspernatur dolor rem quam, eius iusto eligendi alias quasi aperiam quia, unde ipsum quo ea error odit quod? Repellendus, sapiente?</h6>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
    </div>
</section>
@endsection
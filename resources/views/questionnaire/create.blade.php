@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('partials.validation-errors')
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create advertisement</div>

                <div class="card-body">
                    <form method="POST" id="dynamic_form">
                        <table class="table table-bordered table-striped" id="user_table">
                            <thead>
                                <tr>
                                    <td colspan="3">
                                        <input id="title" type="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" autocomplete="title" autofocus>
                                    </td>
                                </tr>
                            </thead>
                            <tbody class="answerContainer"></tbody>
                           <tfoot>
                                <tr>
                                    <td colspan="2" align="right">&nbsp;</td>
                                    <td>
                                        @csrf
                                        <input type="submit" name="save" id="save" class="btn btn-primary" value="Save" />
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script></script>
@endsection
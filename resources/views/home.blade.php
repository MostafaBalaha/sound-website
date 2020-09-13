@extends('layouts.app')

@section('content')
    <input type="hidden" value="{{csrf_token()}}" id="_csrfToken">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" id="soundToText">
                    <div class="card-header">Sound to text</div>

                    <div class="card-body">
                        <form action="">
                            <div class="form-group">
                                <label for="soundFile" style="display: block">Upload Sound File</label>
                                <input type="file"  name="soundFile" id="soundFile" class="ml-4">
                            </div>
                            <div class="form-group">
                                <input type="submit" id="uploadSoundFile" value="Submit" class="float-right">
                            </div>
                        </form>
                        <div style="margin-top: 5rem">
                            <div class="alert alert-info" role="alert">
                                Status: <span id="statusLabel">Waiting for submition</span>
                            </div>

                            <div id="output"></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card" id="soundToText">
                    <div class="card-header">Sound to Emotion</div>

                    <div class="card-body">
                        <form action="">
                            <div class="form-group">
                                <label for="soundFile2" style="display: block">Upload Sound File</label>
                                <input type="file"  name="soundFile2" id="soundFile2" class="ml-4">
                            </div>
                            <div class="form-group">
                                <input type="submit" id="uploadSoundFile2" value="Submit" class="float-right">
                            </div>
                        </form>
                        <div style="margin-top: 5rem">
                            <div class="alert alert-info" role="alert">
                                Status: <span id="statusLabel2">Waiting for submition</span>
                            </div>

                            <div id="output2"></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{asset('js/sound.js')}}"></script>
@endsection
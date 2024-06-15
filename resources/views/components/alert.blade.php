<div>
    <div class="text-center text-black-50" style="direction: rtl">
        @if($errors->any())
            <div class="alert alert-danger text-black-50">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    @if(session()->get('status'))
        <div class="text-center alert text-black-50 alert-{{session()->get('status')}}">
            {{session()->get('message')}}
        </div>
    @endif
</div>

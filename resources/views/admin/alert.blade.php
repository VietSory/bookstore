<style>
    #error {
        border: 1px solid red;
        border-radius: 5px;
        margin-bottom: -15px;
        margin-top: 20px;
        background-color: rgb(255, 235, 235);
        color: red;
    }
    #success {
        border-radius: 5px;
        margin-bottom: -15px;
        margin-top: 20px;
        background-color: rgb(223, 240, 216);
        color: rgb(53, 113, 54);
    }
</style>

@if ($errors->any())
    <div>
        <ul id="error">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (Session::has('error'))
    <div>
        <ul id="error">
            <li>{{ Session::get('error') }}</li>
        </ul>
    </div>
@endif

@if (Session::has('success'))
    <div>
        <ul id="success">
            <li>{{ Session::get('success') }}</li>
        </ul>
    </div>
@endif

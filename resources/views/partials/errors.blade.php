@if ($errors->any())
    <div class='alert alert-danger mt-1'>
        <ul style='list-style-type: none;'>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@include('layout.header')
<table class="table">
    <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>Discription</th>
            <th>Country</th>
            <th>City</th>
            <th>State</th>
        </tr>
    </thead>
    <tbody>
        @if (!empty($location))
            @foreach ($location as $record)
                <tr>
                    <td scope="row">{{ $record->id }}</td>
                    <td scope="row">{{ $record->name }}</td>
                    <td scope="row">{{ $record->discription }}</td>
                    <td scope="row">
                        @foreach ($countries as $country)
                            @if ($country->id == $record->country)
                                {{ $country->name }}
                            @endif
                        @endforeach
                    </td>
                    <td scope="row">
                        @foreach ($cities as $city)
                            @if ($city->id == $record->city)
                                {{ $city->name }}
                            @endif
                        @endforeach
                    </td>
                    <td scope="row">
                        @foreach ($states as $state)
                            @if ($state->id == $record->state)
                                {{ $state->name }}
                            @endif
                        @endforeach
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
@include('layout.footer');

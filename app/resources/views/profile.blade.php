{{-- @foreach ($users as $user)
    <h1>{{$user['name']}}</h1>
@endforeach --}}
{{-- <style>
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 20%;
    }

    td, th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    tr:nth-child(even) {
      background-color: #dddddd;
    }
</style> --}}

<table style=" border: 1px solid #c6b9b9; ">
    <tr>
        <th>Name</th>
        <th>Age</th>
    </tr>
    @foreach ($users as $user)
        <tr>
            <td>{{ $user['name'] }}</td>
            <td>{{ $user['age'] }}</td>
        </tr>
    @endforeach
</table>

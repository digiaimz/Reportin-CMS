<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
    </tr>
    </thead>
    <tbody>
    @foreach(\App\Zone::get() as $zone)



            @foreach(\App\District::where('id_zone',$zone->id_zone)->get() as $district)

            @if(count(\App\Tehsil::where('id_dist',$district->id_dist )->get()) > 0)

            @foreach(\App\Tehsil::where('id_dist',$district->id_dist )->get() as $tehsil)
            <tr>

            <td>{{ $zone->zone_name }}</td>
            <td>{{ $district->dist_name }}</td>
            <td>{{ $tehsil->tsl_name }}</td>
        </tr>
            @endforeach

            @else
            <tr>

                <td>{{ $zone->zone_name }}</td>
                <td>{{ $district->dist_name }}</td>
                <td>  </td>
            </tr>
            @endif


            @endforeach






    @endforeach
    </tbody>
</table>

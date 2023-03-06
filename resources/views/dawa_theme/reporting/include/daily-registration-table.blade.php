 <table border=1  id="mytable" style="width:100%;    text-align: center;">
                                    <thead>
                                        <tr style="    background-color: #8080803d;">
                                            <th colspan="3">Daily Progress Graph
                                                @if(App\Helpers\Helper::is_forum_level_user())   <br> {{App\Helpers\Helper::get_forum_name() }}  @endif
                                            </th>



                                        </tr>
                                        <tr>
                                            <th>Date</th>
                                            <th>Workers</th>
                                            <th>Wabasta</th>


                                        </tr>
                                    </thead>
                                    <tbody id="table1">


                                           <?php
 $i= 0;

                                           ?>
                                        @foreach ( $tables as $table )

                                     <tr>
                                        <td hidden>{{$table[0]}}</td>
                                        <td>{{\Carbon\Carbon::parse($table[0])->format('d-M-Y')}}</td>
                                            <td>{{$table[1]}}</td>
                                            <td>{{$table[2]}}</td>
                                     </tr>
                                     <?php
                                     $i++;
                                                                               ?>
                                        @endforeach



                                    </tbody>
                                </table>










                                <script>

function sort_name()
{
 var table=$('#mytable');
 var tbody =$('#table1');

 tbody.find('tr').sort(function(a, b)
 {
  if(false)
  {
   return $('td:first', a).text().localeCompare($('td:first', b).text());
  }
  else
  {
   return $('td:first', b).text().localeCompare($('td:first', a).text());
  }

 }).appendTo(tbody);

}
sort_name();

                                    </script>

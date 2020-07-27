
          @if(!$dealer->isEmpty())
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover">
                <thead class=" text-primary">
                  <th>
                    Name
                  </th>
                  <th>
                    Date of Establishment
                  </th>
                  <th>
                    Email
                  </th>
                  <th>
                    Address 
                  </th>
                  <th>
                    Pan no. 
                  </th>
                  <th>
                    Created at
                  </th>
                  <th>
                    Updated at
                  </th>
                  <th>
                    Verifiation
                  </th>
                  <th>
                    Action
                  </th>
                </thead>
                <tbody>
                  @forelse ($dealer as $dealers)
                  <tr>
                    <td data-id="{{ $dealers->id }}" class="DealerHover">
                      {{ $dealers->name }}
                    </td>
                    <td data-id="{{ $dealers->id }}" class="DealerHover">
                      {{ $dealers->date_of_establishment }}
                    </td>
                    <td data-id="{{ $dealers->id }}" class="DealerHover">
                      {{ $dealers->email }}
                    </td>
                    <td data-id="{{ $dealers->id }}" class="DealerHover">
                      {{ $dealers->address }}
                    </td>
                    <td data-id="{{ $dealers->id }}" class="DealerHover">
                      {{ $dealers->pan_no }}
                    </td>
                    <td class="text-primary" data-id="{{ $dealers->id }}" class="DealerHover">
                      {{ $dealers->created_at }}
                    </td>
                    <td class="text-primary" data-id="{{ $dealers->id }}" class="DealerHover">
                      {{ $dealers->updated_at }}
                    </td>
                    <td class="text-primary">
                      <label class="switch">
                        <input type="checkbox" class="dealerverifybox" data-idd="{{ Auth::user()->id }}" data-id="{{ $dealers->id }}" {!! $dealers->verified_by != 0?'Checked':'' !!}>
                        <span class="slider round"></span>
                     </label>
                    </td>
                    <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                             Select
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item DealerEditTable" data-id="{{ $dealers->id }}" href="#">Edit</a>
                            <a class="dropdown-item DealerDelete" data-id="{{ $dealers->id }}" href="#">Delete</a>
                          </div>
                        </div>
                    </td>
                  </tr>
                  @empty
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
          @else
            <h4 class="card-title text-center">No data to display....</h4>
          @endif
        </div>

      </div>
    </div>
  </div>


  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content" id="ajaxHolder">
        <!-- contents adds from ajax -->
      </div>
    </div>
  </div>

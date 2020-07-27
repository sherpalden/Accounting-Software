
          @if(!$leader->isEmpty())
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover">
                <thead class=" text-primary">
                  <th>
                    Photo
                  </th>
                  <th>
                    Name
                  </th>
                  <th>
                    Email
                  </th>
                  <th>
                    Temporary Address 
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
                  @forelse ($leader as $leaders)
                  <tr>
                    <td data-id="{{ $leaders->id }}" class="LeaderImageHover">
                      <img class="img-thumbnail" src="/images/Leaders/Profile/{{ $leaders->profile_photo }}" style="max-width: 100px; height: 100px;">
                    </td>
                    <td>
                      {{ $leaders->first_name.' '.$leaders->middle_name.' '.$leaders->last_name }}
                    </td>
                    <td>
                      {{ $leaders->email }}
                    </td>
                    <td>
                      {{ $leaders->temporary_address }}
                    </td>
                    <td class="text-primary">
                      {{ $leaders->created_at }}
                    </td>
                    <td class="text-primary">
                      {{ $leaders->updated_at }}
                    </td>
                    <td class="text-primary">
                      <label class="switch">
                        <input type="checkbox" class="verifybox" data-idd="{{ Auth::user()->id }}" data-id="{{ $leaders->id }}" {!! $leaders->verified_by != 0?'Checked':'' !!}>
                        <span class="slider round"></span>
                     </label>
                    </td>
                    <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                             Select
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item LeaderEditTable" data-id="{{ $leaders->id }}" href="#">Edit</a>
                            <a class="dropdown-item LeaderDelete" data-id="{{ $leaders->id }}" href="#">Delete</a>
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


  <!-- <div id="modalLoading" hidden> -->
    <!-- data comes from js -->
  <!-- </div> -->
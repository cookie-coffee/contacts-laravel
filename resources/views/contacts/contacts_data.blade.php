@foreach ($data ?? [] as $contact)
<tr>
    <th scope="row">{{$contact->id}}</th>
    <td>{{$contact->first_name}}</td>
    <td>{{$contact->last_name}}</td>
    <td>{{$contact->mobile}}</td>
    <td>{{$contact->email}}</td>
    <td>{{$contact->postcode}}</td>
    <td class="row flex-nowrap">
        <a href="{{route('contacts.edit', $contact->id)}}" class="btn btn-sm btn-primary mr-2" role="button" >
        Edit
        </a>
        
        <button type="button" class="btn btn-danger delete-btn" data-toggle="modal" data-target="#exampleModal"
    data-contact="{{$contact}}" >
            Delete
        </button>
    </td>
</tr>
@endforeach

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        
            <div class="modal-body">
            Do you really want to delete this contact: <span class="delete-contact-name"></span> ?
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <form class="delete-contact-form" method="POST" >
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-danger delete-btn">Delete</button>
            </form>
            </div> 
      </div>
    </div>
  </div>

  <script type="text/javascript">
    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var recipient = button.data('contact'); 
        var modal = $(this);
        modal.find('.delete-contact-name').text(recipient.first_name + ' ' + recipient.last_name);
        var url = '{{ route("contacts.destroy", "contactId") }}';
        url = url.replace('contactId', recipient.id);
        modal.find('.delete-contact-form').attr('action', url);
    });
</script>
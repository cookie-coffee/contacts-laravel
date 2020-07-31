@extends('static_pages.default')
@section('title', 'All Contacts')
    
@section('content')

        <div class="container box">
            <h3 align="center">Live search Contacts using AJAX</h3><br />
            <div class="panel panel-default">
             <div class="panel-heading">Search Contact</div>
             <div class="panel-body">
                <div class="form-group">
                    <input type="text" name="search" id="search" class="form-control" placeholder="Search Contact Data" />
                </div>
                <div class="table-responsive-md">
                <h3 align="center">Total Data : <span id="total_records"></span></h3>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col" class="sorting" data-sorting_type="asc" data-column_name="id" style="cursor: pointer">ID <span id="id_icon"></span></th>
                            <th scope="col" class="sorting" data-sorting_type="asc" data-column_name="first_name" style="cursor: pointer">First <span id="first_name_icon"></span></th>
                            <th scope="col" class="sorting" data-sorting_type="asc" data-column_name="last_name" style="cursor: pointer">Last <span id="last_name_icon"></span></th>
                            <th scope="col" class="sorting" data-sorting_type="asc" data-column_name="mobile" style="cursor: pointer">Mobile <span id="mobile_icon"></span></th>
                            <th scope="col" class="sorting" data-sorting_type="asc" data-column_name="email" style="cursor: pointer">Email <span id="email_icon"></span></th>
                            <th scope="col" class="sorting" data-sorting_type="asc" data-column_name="postcode" style="cursor: pointer">Postcode<span id="postcode_icon"></span></th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @include('contacts.contacts_data')
                        </tbody>
                    </table>
                    <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
                    <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="id" />
                    <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="asc" />
                </div>
             </div>
            </div>
        </div>


        
    


  <script type="text/javascript">
   
    $(document).ready(function() {
        // clear sorting icon
        function clear_icon() {
            $('#id_icon').html('');
            $('#first_name_icon').html('');
            $('#last_name_icon').html('');
            $('#mobile_icon').html('');
            $('#email_icon').html('');
            $('#postcode_icon').html('');
        }
        // get data from contact list with search, filting and sorting
        function fetch_data(sort_type,sort_by, query) {
            var trim_query = query ? $.trim(query) : '';
            $.ajax({
                url:"/contacts/fetch_data?sortby="+sort_by+"&sorttype="+sort_type+"&query="+trim_query,
                success:function(data)
                {
                    $('tbody').html('');
                    $('tbody').html(data);
                }
            });
        }
        // search input trigger fetch data.
        $(document).on('keyup', '#search', function() {
            var query = $('#search').val();
            var column_name = $('#hidden_column_name').val();
            var sort_type = $('#hidden_sort_type').val();
            fetch_data(sort_type, column_name, query);
        });
        // search input trigger fetch data.
        $(document).on('click', '.sorting', function() {
            var column_name = $(this).data('column_name');
            var order_type = $(this).data('sorting_type');
            var reverse_order = '';
            if (order_type === 'asc') {
                $(this).data('sorting_type', 'desc');
                reverse_order = 'desc';
                clear_icon();
                $('#' + column_name +'_icon').html('<span class="fa fa-caret-up" ></span>')
            }
            if (order_type === 'desc') {
                $(this).data('sorting_type', 'asc');
                reverse_order = 'asc';
                clear_icon();
                $('#' + column_name +'_icon').html('<span class="fa fa-caret-down" a></span>')
            }
            $('#hidden_column_name').val(column_name);
            $('#hidden_sort_type').val(reverse_order);
            var query = $('search').val();
            console.log(column_name, reverse_order, query);
            fetch_data(reverse_order, column_name, query);
            
        });
    
    });

</script>
    
@stop

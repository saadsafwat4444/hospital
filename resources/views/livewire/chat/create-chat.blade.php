<div>
   <style>
   .fixed-button {
  width: 150px; /* أو أي عرض يناسب التصميم */
  white-space: nowrap; /* عشان الاسم ما ينزلش لسطر تاني */
  overflow: hidden;
  text-overflow: ellipsis;
}

   </style>
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table wire:key="foo" style="text-align: center" class="table text-md-nowrap" id="example1">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>اسم الدكتور</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td><button class="btn btn-primary fixed-button"  wire:click="createConversation('{{$user->email}}')">{{$user->name}}</button></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!-- bd -->
            </div><!-- bd -->
        </div>
        <!--/div-->
        <!-- /row -->

    </div>

</div>

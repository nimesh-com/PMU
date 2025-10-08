 @extends('layouts.BackEnd')


 @section('content')

 <div class="container py-4">
     <div class="card shadow border-0 rounded-4">
         <div class="card-header bg-gradient text-white text-center py-3 rounded-top-4" style="background: linear-gradient(90deg, #4e73df 0%, #1cc88a 100%);">
             <h4 class="mb-0 fw-bold text-uppercase">Activity Report</h4>
         </div>
         <div class="card-body p-4">
             <div class="table-responsive">
                 <table class="table table-bordered table-hover align-middle">
                     <thead class="table-primary">
                         <tr>
                             <th>Activity Name</th>
                             <th>Allocation</th>
                             <th>Level 1</th>
                             <th>Level 2</th>
                             <th>Level 3</th>
                             <th>Budget Code</th>
                         </tr>
                     </thead>
                     <tbody>
                        
                         <tr>
                            @foreach($Activitys as $activity)
                             <td>{{ $activity->name}}</td>
                       
                           <td></td>
            
                             @endforeach
                         </tr>
            
                         <tr>
                             <td colspan="6" class="text-center">No activities found.</td>
                         </tr>
              
                     </tbody>
                 </table>
             </div>
         </div>
     </div>
 </div>

 @endsection


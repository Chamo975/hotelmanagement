<div class="form-group">
                    <label for="Name">Name</label>
                    <input type="text" class="form-control" placeholder=" floor Name" id="fname" name="fname">
                </div>


<!--------------------------------------floor number------------------------------------------------------------------------------------>               
                <div class="form-group">
                    <label for="number">Floor Number</label>
                    <input type="text" class="form-control" placeholder="floor number" id="fnumber" name="fnumber">
                </div>
<!--------------------------------------description------------------------------------------------------------------------------------>              
        <div class="row">
        <div class="col-md-2">
        <label for="room_description" class="form-control-label">Description</label><span class="required"  style="color:red;">*</span></label>
        <textarea class="form-control" id="fdescription" rows="10"  name="fdescription"></textarea>
        <span id="bdescriptionerror" style="color:red;"></span>
        </div>
        </div>
         
        <br>


<!--------------------------------------Active------------------------------------------------------------------------------------>         
          <div class="row">
          <div class="col-md-6">
          <label for="floor_active" class="form-control-label">Active</label>
          <br>
          <label class="custom-toggle">
          <input type="checkbox" checked id="factive" name="factive">
          <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
          </label>
    
          </div>
           </div>


        <div class="modal-footer">
          {{-- <input type="hidden" class="form-control" name="userid" id="huserid"> --}}
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="savefloor()">Add</button>
        </div>
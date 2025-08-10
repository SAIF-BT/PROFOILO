 <div class="modal">
     <div class="modal-content">
         <h2>{{ $formMode === 'edit' ? 'Edit Service' : 'Create Service' }}</h2>
         <span class="close-modal">×</span>
         <hr>
         <div>
             <label>Service Name</label>
             <input type="text" name="name" value="{{ isset($service->name) ? $service->name : '' }}" required/>
             {!! $errors->first('name', '<p class="alert">:message</p>') !!}

             <label>Icon Class <span style="color:#006fbb;">(Find your suitable icon: Font
                     Awesome)</span></label>

             <input type="text" name="icon" value="{{ isset($service->icon) ? $service->icon : '' }}" required/>
             {!! $errors->first('icon', '<p class="alert">:message</p>') !!}

             <label>Description</label>
             <textarea cols="10" rows="5" name="description">{{ isset($service->description) ? $service->description : '' }}</textarea>
             {!! $errors->first('description', '<p class="alert">:message</p>') !!}

         </div>
         <hr>
         <div class="modal-footer">
             <button class="close-modal">
                 Cancel
             </button>
             <button class="secondary close-modal">
                 <span><i class="fa fa-spinner fa-spin"></i></span>

                 <h2>{{ $formMode === 'edit' ? 'Update' : 'Save' }}</h2>

             </button>
         </div>

     </div>
 </div>

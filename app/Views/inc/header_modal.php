 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-1" id="exampleModalLabel">User Details</h1>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body p-3 d-flex">
                 <div class="col-3">
                     <div style="width:100px; height:100px;">
                         <img class="rounded-5 border border-4 border-primary" src="<?=base_url()?>assets\no_image.png"
                             style="width: 100%; height: 100%; object-fit:cover;">
                     </div>
                 </div>

                 <div class="col-6">
                     <b>Username:</b> <?=session()->get('username')?><br>
                     <b>Sex:</b> <?=session()->get('sex')?><br>
                     <b>Birthday:</b>
                     <?=$result = (session()->get('birthday') == '0000-00-00') ? '' : session()->get('birthday') ?><br>
                     <b>Phone:</b> <?=session()->get('phone')?><br>
                 </div>


             </div>
             <div class="modal-footer">
                 <a href="logout" class="btn btn-primary"><i class="fa-solid fa-right-from-bracket"></i>Logout</a>
                 <button data-bs-toggle="modal" data-bs-target="#edit" class="btn btn-primary"><i
                         class="fa-solid fa-pen"></i>Edit Profile</button>
             </div>
         </div>
     </div>
 </div>

 <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-1" id="exampleModalLabel">Edit Profile</h1>
                 <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#exampleModal"></button>
             </div>
             <div class="modal-body p-3">
                 <form action="save_profile/<?=session()->get('id')?>" method="post">
                     <div class="input-group input-group-lg mb-1">
                         <span class="input-group-text" id="inputGroup-sizing-sm"><b>Username</b></span>
                         <input type="text" class="form-control" name="username"
                             value="<?=session()->get('username')?>">
                     </div>
                     <div class="input-group input-group-lg mb-1">
                         <label class="input-group-text" for="inputGroupSelect01"><b>Sex</b></label>
                         <select class="form-select" id="inputGroupSelect01" name="sex">
                             <option value="" <?php echo $result = (session()->get('sex') == null) ? 'selected' : ''?>>
                                 Choose... </option>
                             <option value="Male" <?=$result = (session()->get('sex') == 'Male') ? 'selected' : ''?>>
                                 Male</option>
                             <option value="Female"
                                 <?=$result = (session()->get('sex') == 'Female') ? 'selected' : ''?>>
                                 Female</option>
                         </select>
                     </div>
                     <div class="input-group input-group-lg mb-1">
                         <span class="input-group-text" id="inputGroup-sizing-sm"><b>Birthday</b></span>
                         <input class="form-control" type="date" name="birthday"
                             value="<?=session()->get('birthday')?>">
                     </div>
                     <div class="input-group input-group-lg mb-1">
                         <span class="input-group-text" id="inputGroup-sizing-sm"><b>Number</b></span>
                         <input type="tel" class="form-control" value="<?=session()->get('phone')?>" name="phone">
                     </div>

             </div>
             <div class="modal-footer">
                 <a type="button" data-bs-toggle="modal" data-bs-target="#change_password"
                     class="btn text-decoration-none me-2">Change
                     Password</a>
                 <button type="submit" class="btn btn-primary">Save</button>
             </div>
             </form>
         </div>
     </div>
 </div>

 <div class="modal fade" id="change_password" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-1" id="exampleModalLabel">Change Password</h1>
                 <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#exampleModal"></button>
             </div>
             <div class="modal-body p-3">
                 <form action="change_password" method="post" id="change_password">
                     <div class="input-group input-group-lg mb-1">
                         <span class="input-group-text" id="inputGroup-sizing-sm"><b>Old Password
                                 <span class="text-danger">*</span></b></span>
                         <input type="text" class="form-control" name="old_password" id="old_password" required>
                     </div>
                     <div class="input-group input-group-lg mb-1">
                         <span class="input-group-text" id="inputGroup-sizing-sm"><b>New Password <span
                                     class="text-danger">*</span></b></span>
                         <input type="text" class="form-control" name="new_password" id="new_password" required>
                     </div>
                     <div class="input-group input-group-lg mb-1">
                         <span class="input-group-text" id="inputGroup-sizing-sm"><b>Confirm Password <span
                                     class="text-danger">*</span></b></span>
                         <input type="text" class="form-control" name="confirm_password" id="confirm_password" required>
                     </div>


             </div>
             <div class="modal-footer">
                 <button type="submit" class="btn btn-primary">Save</button>
             </div>
             </form>
         </div>
     </div>
 </div>
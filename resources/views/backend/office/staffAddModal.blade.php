<div class="modal fade" id="showAddModal" tabindex="-1"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0">
            <div class="modal-header bg-soft-info p-3">
                <h5 class="modal-title" id="exampleModalLabel">Add new staff</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close" id="close-modal"></button>
            </div>
            <form action="{{ route('admin.office.staff.store') }}" method="post" class="tablelist-form" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="office_id" value="{{ $office->id }}" />
                    <div class="row g-3">
                        <div class="col-lg-12">
                            <div class="text-center">
                                <div class="position-relative d-inline-block">
                                    <div class="position-absolute  bottom-0 end-0">
                                        <label for="customer-image-input" class="mb-0"  data-bs-toggle="tooltip" data-bs-placement="right" title="Select Image">
                                            <div class="avatar-xs cursor-pointer">
                                                <div class="avatar-title bg-light border rounded-circle text-muted">
                                                    <i class="ri-image-fill"></i>
                                                </div>
                                            </div>
                                        </label>
                                        <input class="form-control d-none" value="" name="profile_image" id="customer-image-input" type="file"
                                               accept="image/png, image/gif, image/jpeg">
                                    </div>
                                    <div class="avatar-lg p-1">
                                        <div class="avatar-title bg-light rounded-circle">
                                            <img src="{{ URL::asset('build/images/users/user-dummy-img.jpg') }}"
                                                 alt="" id="customer-img" class="avatar-md rounded-circle object-cover" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label for="name" class="form-label">Name</label>
                                <input type="text" id="name"  name="name" class="form-control" value="{{ old('name') }}" placeholder="Enter name"  required />
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div>
                                <label for="designation-field" class="form-label">Designation</label>
                                <input type="text" name="designation" list="suggestions" id="designation-field"  value="{{ old('designation') }}" class="form-control typeahead" placeholder="Enter Designation"  required/>
                                @error('designation')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <datalist id="suggestions">
                                @forelse($designations as $designation)
                                    <option value="{{ $designation }}">
                                @empty
                                @endforelse
                            </datalist>
                        </div>

                        <div class="col-lg-12">
                            <div>
                                <label for="email_id-field" class="form-label">Email ID</label>
                                <input type="text" name="email" id="email_id-field"  value="{{ old('email') }}" class="form-control" placeholder="Enter email"  required/>
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div>
                                <label for="phone-field" class="form-label">Phone</label>
                                <input type="number" min="0" name="phone" id="phone-field"  value="{{ old('phone') }}" class="form-control" placeholder="Enter phone no"  required />
                                @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div>
                                <label for="phone-field" class="form-label">Wing</label>
                                <input type="text" name="wing" id="wing"  value="{{ old('wing') }}" class="form-control" placeholder="Enter wing" />
                                @error('wing')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-7 d-flex align-items-center">
                            <div class="mb-3">
                                <label class="d-block">Choose user type</label>
                                {{--<div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="type" id="Head" value="Head" {{ old('type') =='Head'?'checked':'' }} required>
                                    <label class="form-check-label" for="Head">Head</label>
                                </div>--}}
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="type" id="Officer" value="Officer" {{ old('type') =='Officer'?'checked':'' }}  >
                                    <label class="form-check-label" for="Officer">Officer</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="type" id="Staff" value="Staff"    {{ old('type') =='Staff'?'checked':'' }}>
                                    <label class="form-check-label" for="Staff">Staff</label>
                                </div>
                                @error('type')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="mb-3">
                                <label for="sequence" class="form-label">Sequence</label>
                                <select class="form-control" name="sequence" id="sequence" required>
                                    <option value="" selected disabled>Select sequence</option>
                                    @for($i=1; $i<=100;$i++)
                                        <option {{ old('sequence') == $i?'selected':'' }} value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                                @error('sequence')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12 d-flex align-items-center">
                            <div class="form-check form-switch form-switch-md mt-4" dir="ltr">
                                <input type="checkbox" class="form-check-input" name="user_create" id="profileAllow">
                                <label class="form-check-label" for="profileAllow">Allow Profile Create</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" id="add-btn">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

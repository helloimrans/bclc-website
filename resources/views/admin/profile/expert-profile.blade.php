<form action="{{ route('user.update.profile') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="card card-body" style="border:2px dotted #ddd; background:#fafafa" id="personal_info">
        <h5 class="mb-2 text-primary">Personal Information</h5>
        <!-- header section -->
        <div class="d-flex mb-2">
            <a href="#" class="me-25">
                <img src="@if ($user->photo) {{ Storage::url($user->photo) }}
                @else
                {{ asset('defaults/avatar/avatar.png') }} @endif"
                    id="upImg1" class="upImg1 rounded me-50" alt="profile image" height="100" width="100" />
            </a>
            <!-- upload and reset button -->
            <div class="d-flex align-items-end mt-75 ms-1">
                <div>
                    <label for="upImgInput1" class="btn btn-sm btn-primary mb-75 me-75">Upload</label>
                    <input type="file" id="upImgInput1" name="photo" class="hidden">
                    <button type="button" id="upImgReset1"
                        class="btn btn-sm btn-outline-secondary mb-75">Reset</button>
                    <p class="mb-0">Allowed file types: png, jpg, jpeg.</p>
                </div>
                @error('photo')
                    <div class="text-danger"><small>{{ $message }}</small></div>
                @enderror
            </div>
            <!--/ upload and reset button -->
        </div>
        <!--/ header section -->
        <div class="row">
            <div class="col-md-4">
                <div class="mb-1">
                    <label class="form-label" for="">Full Name</label>
                    <input type="text" name="name" placeholder="Enter full name"
                        class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}">

                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-1">
                    <label class="form-label" for="">Email</label>
                    <input type="text" name="email" placeholder="Enter email"
                        class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email', $user->email) }}">

                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-1">
                    <label class="form-label" for="">Mobile</label>
                    <input type="text" name="mobile" placeholder="Enter number"
                        class="form-control @error('mobile') is-invalid @enderror"
                        value="{{ old('mobile', $user->mobile) }}">

                    @error('mobile')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-1">
                    <label class="form-label">Gender</label>
                    <select id="is_service" name="gender" class="form-control @error('gender') is-invalid @enderror">
                        <option value="">
                            Select Gender
                        </option>
                        <option value="Male" @if (old('gender', $user->gender) == 'Male') selected @endif>
                            Male
                        </option>
                        <option value="Female" @if (old('gender', $user->gender) == 'Female') selected @endif>
                            Female
                        </option>
                        <option value="Others" @if (old('gender', $user->gender) == 'Others') selected @endif>
                            Others
                        </option>
                    </select>
                    @error('gender')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-1">
                    <label class="form-label">Marital Status</label>
                    <select id="marital_status" name="marital_status"
                        class="form-control @error('marital_status') is-invalid @enderror">
                        <option value="">
                            Select Marital Status
                        </option>
                        <option value="Married" @if (old('marital_status', $user->marital_status) == 'Married') selected @endif>
                            Married
                        </option>
                        <option value="Unmarried" @if (old('marital_status', $user->marital_status) == 'Unmarried') selected @endif>
                            Unmarried
                        </option>
                    </select>
                    @error('marital_status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-1">
                    <label class="form-label" for="fp-default">Date of Birth</label>
                    <input type="date" id="fp-default" name="dob"
                        class="form-control flatpickr-basic @error('present_location') is-invalid @enderror"
                        placeholder="YYYY-MM-DD" value="{{ old('dob', $user->dob) }}" />
                    @error('dob')
                        <div class="text-danger"><small>{{ $message }}</small></div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="mb-1">
                    <label class="form-label">Designation</label>
                    <input type="text" name="designation" class="form-control @error('designation') is-invalid @enderror"
                        placeholder="Enter designation..." value="{{ old('designation', $user->designation) }}">
                    @error('designation')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-1">
                    <label class="form-label">Workplace Name</label>
                    <input type="text" name="workplace_name" class="form-control @error('workplace_name') is-invalid @enderror"
                        placeholder="Enter workplace name..." value="{{ old('workplace_name', $user->workplace_name) }}">
                    @error('workplace_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="mb-1">
            <label class="form-label">About</label>
            <textarea name="about" class="form-control @error('about') is-invalid @enderror"
                placeholder="Enter about...">{{ old('about', $user->about) }}</textarea>
            @error('about')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-1">
            <label class="form-label">Address</label>
            <textarea name="address" class="form-control @error('address') is-invalid @enderror"
                placeholder="Enter present location...">{{ old('address', $user->address) }}</textarea>
            @error('address')
                <div class="text-danger"><small>{{ $message }}</small></div>
            @enderror
        </div>
        <div class="mb-1">
            <label class="form-label">Select Role</label>
            <div class="regi-expert-role mb-1">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="is_lawyer" name="is_lawyer"
                        value="1" @if (old('is_consultant', $user->is_lawyer) == '1') checked @endif>
                    <label class="custom-control-label" for="is_lawyer">Lawyer</label>
                </div>
            </div>
            <div class="regi-expert-role mb-1">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="is_consultant" name="is_consultant"
                        value="1" @if (old('is_consultant', $user->is_consultant) == '1') checked @endif>
                    <label class="custom-control-label" for="is_consultant">Consultant</label>
                </div>
            </div>
            <div class="regi-expert-role mb-1">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="is_trainer" name="is_trainer"
                        value="1" @if (old('is_trainer', $user->is_trainer) == '1') checked @endif>
                    <label class="custom-control-label" for="is_trainer">Trainer</label>
                </div>
            </div>
            <div class="regi-expert-role">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="is_writer" name="is_writer"
                        value="1" @if (old('is_writer', $user->is_writer) == '1') checked @endif>
                    <label class="custom-control-label" for="is_writer">Writer</label>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-2 float-end">
        <button type="submit" class="btn btn-info sub-btn"><i data-feather='save'></i>
            Update</button>
    </div>
</form>

@extends('layouts.BackEnd')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Assign Modules to Role</h4>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        @csrf

                        <!-- Role Selection -->
                        <div class="mb-4">
                            <label for="role" class="form-label fw-bold">Select Role</label>
                            <select name="role_id" id="role" class="form-select" required>
                                <option value="">-- Select Role --</option>
                                @foreach($Roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Modules Selection -->
                        <div class="mb-4">
                            <label class="form-label fw-bold">Select Modules</label>

                            @foreach($Modules as $module)
                            <div class="row">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="modules[]" value="{{ $module->id }}" id="module{{ $module->id }}">
                                    {{$module->name}}
                                </div>
                            </div>

                            @endforeach
                        </div>
                </div>

                <!-- Submit Button -->
                <div class="text-end">
                    <button type="submit" class="btn btn-primary px-4 py-2 fw-bold">
                        <i class="bi bi-check-circle me-2"></i> Assign Modules
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection